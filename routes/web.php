<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;

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
    Route::post('/order', [OrderController::class, 'store'])->middleware('web');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
});

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/menu/create', [AdminController::class, 'create'])->name('admin.menu.create');
    Route::post('/menu/store', [AdminController::class, 'store'])->name('admin.menu.store');
    Route::get('/menu/show', [AdminController::class, 'show'])->name('admin.menu.show');
    Route::get('/menu/{id}/edit', [AdminController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/menu/{id}', [AdminController::class, 'update'])->name('admin.menu.update');
    Route::delete('/menu/{id}', [AdminController::class, 'destroy'])->name('admin.menu.destroy');
});
