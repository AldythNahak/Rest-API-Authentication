
# LARAVEL Rest-API-Authentication

Rest api auth using Laravel Passport that support oAuth2




## Installation

Install Rest-API-Authentication
>1. First Clone this project
>2. open CMD or Bash command and move into directory project
>3. install laravel using composer
```bash
  composer install
```
>4. Enable extension sodium in your PHP config (php.ini)
```bash
  extension=sodium
```
>5. Run command bellow step by step  

```bash
  composer require laravel/passport
  php artisan install:api --passport
  php artisan passport:keys 
  php artisan passport:client --personal
```

>6. Run this project
```bash
  php artisan serve
```
## API Reference

#### Register User

```http
  POST /api/user/register
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**, **max:255** |
| `email` | `string` | **Required**, **email**, **max:255** |
| `password` | `string` | **Required**, **min:6** |
| `password_confirmation` | `string` | **Required**, **min:6** |

#### Login User

```http
  POST /api/user/login
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email` | `string` | **Required**. **max:255** |
| `password` | `string` | **Required**, **min:6** |

#### Login User

```http
  POST /api/user/logout
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email` | `string` | **Required**. **max:255** |
| `password` | `string` | **Required**, **min:6** |

