<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', [TestController::class, 'test']);
Route::post('/create-book', [BookController::class, 'createBook'])->name('create.book');
Route::get('/get-books', [BookController::class, 'getBook']);
Route::delete('/delete-books/{id}', [BookController::class,'delete']);
Route::put('/edit-books/{id}', [BookController::class,'edit']);
