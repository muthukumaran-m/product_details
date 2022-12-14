<?php

use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductDetailController::class,'index'])->name('product.index');
Route::get('/create', [ProductDetailController::class,'create'])->name('product.create');
Route::post('/', [ProductDetailController::class, 'store'])->name('product.store');
