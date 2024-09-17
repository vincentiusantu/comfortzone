<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->name('user.')->group(function (){
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::post('/login-post', [UserController::class, 'login'])->name('login-post');
    });
    Route::middleware(['auth:web'])->group(function (){
        Route::get('/chat', [UserController::class, 'chat'])->name('chat');
        Route::post('/create-chat', [UserController::class, 'createChat'])->name('create-chat');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function (){
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/login-post', [AdminController::class, 'login'])->name('login-post');
    });
    Route::middleware(['auth:admin'])->group(function (){
        Route::get('/list-chat', [AdminController::class, 'listChat'])->name('list-chat');
        Route::post('/go-home', [AdminController::class, 'goHome'])->name('go-home');
        Route::get('/chat/{id}', [AdminController::class, 'chatView'])->name('chat');
        Route::post('/create-chat/{id}', [AdminController::class, 'createChat'])->name('create-chat');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
