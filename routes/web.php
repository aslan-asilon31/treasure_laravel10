<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CategoryDetailController;


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

// Route::get('/', function () {
//     return view('visitor.landingpage');
// });
Route::get('/', [App\Http\Controllers\VisitorController::class, 'index'])->name('visitor');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('carts', CartController::class);
Route::resource('categories', CategoryController::class);
Route::resource('categorydetails', CategoryDetailController::class);
Route::resource('customers', CustomerController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('orders', OrderController::class);

Route::resource('products', ProductController::class);

Route::resource('reviews', ReviewController::class);
Route::resource('transactions', TransactionController::class);

// Route::resource('visitors', VisitorController::class);