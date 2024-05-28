<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\User;
use OpenApi\Annotations as OA;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required|string|max:255",
                "email" => "required|string|email|max:255|unique:users",
                "password" => "required|string|min:6|confirmed",
            ]);

            if ($validator->fails()) {
                throw new HttpException(400, $validator->messages()->first());
            }

            $request["password"] = Hash::make($request["password"]);
            $request["remember_token"] = Str::random(10);
            $user = User::create($request->toArray());
            $token = $user->createToken("All Yours")->accessToken;

            return response()->json(
                array(
                    "name" => $request->name,
                    "email" => $request->get("email"),
                    "token" => $token
                ),
                200
            );
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data : {$exception->getMessage()}");
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "email" => "required|string|email|max:255",
                "password" => "required|string|min:6",
            ]);

            if ($validator->fails()) {
                throw new HttpException(400, $validator->messages()->first());
            }

            $user = User::where("email", $request->email)->first();

            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $token = $user->createToken("All Yours")->accessToken;
                    return response()->json(
                        array(
                            "email" => $request->get("email"),
                            "token" => $token
                        ),
                        200
                    );
                } else {
                    return response()->json(array("message" => "Password mismatch"), 400);
                }
            } else {
                return response()->json(array("message" => "User does not exists"), 400);
            }
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data : {$exception->getMessage()}");
        }
    }

    public function logout(Request $request)
    {
        try {
            $token = $request->user()->token();
            $token->revoke();
            return response()->json(array("message" => "You Have been successfully logged out!"), 200);
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data : {$exception->getMessage()}");
        }
    }
}
