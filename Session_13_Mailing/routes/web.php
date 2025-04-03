<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sent', [EmailController::class, "send"]);
Route::get('/homepage', [EmailController::class, "viewPage"]);
Route::get('/contact-pages', [EmailController::class, "contactPage"]);
Route::post('/contact-us', [EmailController::class, "contact"])->name('contactme');
