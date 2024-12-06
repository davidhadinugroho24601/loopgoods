<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ChatController;

Route::get('/', [DisplayController::class, 'index'])->name('home');

Route::get('/dashboard',  [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');
Route::get('/chats', [ChatController::class, 'chatList'])->name('chat.list')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chat/{receiverId}', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/{receiverId}', [ChatController::class, 'store'])->name('chat.store');

});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('upload', [UserController::class, 'index'])->name('item.upload');
    Route::post('store', [UserController::class, 'store'])->name('item.store');
    Route::get('edit', [UserController::class, 'edit'])->name('item.edit');
    Route::post('update', [UserController::class, 'update'])->name('item.update');
    Route::get('items/{id}', [DisplayController::class, 'show'])->name('item.show');
});




require __DIR__.'/auth.php';
