<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index']);

Route::get('/search', SearchController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products', ProductController::class);

// TODO: If necessary convert to POST
Route::get('/addProductToCart', [CartController::class, 'addProductToCart'])->middleware('auth');

// TODO: If necessary convert to POST
Route::get('/emptyCart', [CartController::class, 'emptyCart'])->middleware('auth');

Route::get('cart', [CartController::class, 'showCart'])->name('cart');

Route::get('newOrder', [OrderController::class, 'showOrder'])->middleware('auth');

Route::get('myOrders', [OrderController::class, 'showMyOrders'])->middleware('auth');

Route::get('notifications', [NotificationController::class, 'show'])->middleware('auth');


require __DIR__.'/auth.php';
