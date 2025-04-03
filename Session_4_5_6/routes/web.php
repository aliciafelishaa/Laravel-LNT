<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//HTTP Method(get, post)
Route :: get('/', [ProductController::class, 'getProducts'])->name('product.view');
Route :: get('/create-product', [ProductController::class, 'createProductPage'])->name('product.create.page');
Route :: post('/create', [ProductController::class, 'createProduct'])->name('product.create');

//Session 5: Update, Delete
Route :: get('/update-product/{id}', [ProductController::class, 'updateProductPage']) -> name('product.update.page');
Route :: put('/update/{id}', [ProductController::class, 'updateProduct']) ->name('product.update');
Route :: delete('/delete/{id}', [ProductController::class, 'deleteProduct']) ->name('product.delete');

//tambahan, search
Route :: post('/search', [ProductController::class, 'searchProduct'])->name('product.search');


//Brand
Route :: get('/brand', [BrandController::class, 'getBrand'])->name('brand.create.page');
Route :: post('/brandcreate', [BrandController::class, 'createBrand'])->name('brand.store');
