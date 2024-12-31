<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])
    ->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginPost'])
    ->name('login.post');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])
    ->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerPost'])
    ->name('register.post');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])
    ->name('menu');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
        ->name('logout');
});
