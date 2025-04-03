<?php

use App\Http\Controllers\NetworkController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [NetworkController::class, 'get'])->name('show');
Route::post('/upload', [NetworkController::class, 'create'])->name('upload');
Route::delete('/delete/{id}', [NetworkController::class, 'delete'])->name('delete');
Route::post('/download/{id}', [NetworkController::class, 'download'])->name('download');
