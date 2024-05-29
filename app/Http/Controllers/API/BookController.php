<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     *  @OA\Get(
     *      path="/api/book",
     *      tags={"book"},
     *      summary="Display list of items",
     *      operationId="index",
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent()
     *      ),
     * )
     */
    public function index()
    {
        return Book::get();
    }

    /**
     *  @OA\Post(
     *      path="/api/book",
     *      tags={"book"},
     *      summary="create item",
     *      operationId="create",
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent()
     *      ),
     *      security={{"passport_token_ready:{}, "passport":{}}}
     * )
     */
    public function create()
    {
        //
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     */
    public function show(string $id)
    {
        //
    }

    /**
     *  @OA\Post(
     *      path="/api/book",
     *      tags={"book"},
     *      summary="edit item",
     *      operationId="edit",
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent()
     *      ),
     *      security={{"passport_token_ready:{}, "passport":{}}}
     * )
     */
    public function edit(string $id)
    {
        //
    }

    /**
     *  @OA\Post(
     *      path="/api/book",
     *      tags={"book"},
     *      summary="update item",
     *      operationId="update",
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent()
     *      ),
     *      security={{"passport_token_ready:{}, "passport":{}}}
     * )
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     *  @OA\Post(
     *      path="/api/book",
     *      tags={"book"},
     *      summary="update item",
     *      operationId="update",
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent()
     *      ),
     *      security={{"passport_token_ready:{}, "passport":{}}}
     * )
     */
    public function destroy(string $id)
    {
        //
    }
}