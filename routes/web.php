<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});


Route::prefix('admin')->group(function () {
    Route::get('users', [AdminController::class, 'index']);
});

Route::prefix('user')->group(function () {
    Route::get('{userid}/upload', [UserController::class, 'index']);
    Route::post('{userid}/store', [UserController::class, 'store']);
});

