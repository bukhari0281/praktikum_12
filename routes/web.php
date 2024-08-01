<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('supplier', SupplierController::class);
Route::resource('order', OrderController::class);
 
Route::get('supplier/{id}/product', [ProductController::class, 'index'])->name('supplier.product');
Route::post('supplier/{id}/product', [ProductController::class, 'store'])->name('supplier.product.store');
Route::get('supplier/product/{id}/delete', [ProductController::class, 'destroy'])->name('supplier.product.destroy');
Route::put('supplier/product/{product}', [ProductController::class, 'update'])->name('supplier.product.update');



