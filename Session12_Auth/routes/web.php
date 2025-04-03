<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(isLogin::class)->get('/', [AuthenticationController::class, 'homePage'])->name('view.home');
Route::middleware(isLogin::class)->post('/signout', [AuthenticationController::class, 'signout'])->name('signout');
Route::get('/register', [AuthenticationController::class, 'getRegisterPage'])->name('view.register');
Route::get('/login', [AuthenticationController::class, 'getLoginPage'])->name('view.login');
Route::post('/register-user', [AuthenticationController::class, 'register'])->name('register-post');
Route::post('/login-user', [AuthenticationController::class, 'login'])->name('login-post');
