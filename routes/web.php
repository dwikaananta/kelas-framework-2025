<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = "Home";
    $description = "This is home page !";
    $author = "Jack";
    $version = "1.0.0";
    $email = "mail@example.com";

    return view('welcome', [
        'title' => $title,
        'description' => $description,
        'author' => $author,
        'version' => $version,
        'email' => $email,
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

// route with params
// you can access this route at
// http://localhost:8000/custom/Test123
Route::get('/custom/{name}', function ($name) {
    return "Custom " . $name;
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
