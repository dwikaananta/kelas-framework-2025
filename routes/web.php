<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
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
})->name('login');

// route with params
// you can access this route at
// http://localhost:8000/custom/Test123
Route::get('/custom/{name}', function ($name) {
    return "Custom " . $name;
});

// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/create', [UserController::class, 'create']);
// Route::post('/users', [UserController::class, 'store']);
// Route::get('/users/{id}', [UserController::class, 'edit']);
// Route::patch('/users/{id}', [UserController::class, 'update']);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// private route
Route::middleware("auth")->group(function () {
    Route::get('/dashboard', function () {
        $total_user = App\Models\User::count();
        $total_car = App\Models\Car::count();

        $my_car = App\Models\Car::where(
            'user_id',
            auth()->user()->id
        )->get();

        return view('dashboard', [
            'total_user' => $total_user,
            'total_car' => $total_car,
            'my_car' => $my_car,
        ]);
    });

    Route::resource('/users', UserController::class);
    Route::resource('/cars', CarController::class);
});
