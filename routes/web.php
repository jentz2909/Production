<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Display all products when users first visit the application
Route::get('/', [ProductController::class, 'index'])->name('product.index');

// Display form to create a new product
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');

// Store a newly created product in the database
Route::post('product/', [ProductController::class, 'store'])->name('product.store');

// Display the specified product
Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');

// Display form to edit the specified product
Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Update the specified product in the database
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');

// Delete the specified product from the database
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

// Display the searching product
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

