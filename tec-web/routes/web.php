<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', HomeController::class);

Route::get('/search', SearchController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products', ProductController::class);

// TODO: If necessary convert to POST
Route::get('/addProductToCart', [CartController::class, 'addProductToCart'])->middleware('auth');

// TODO: If necessary convert to POST
Route::get('/removeProductFromCart', [CartController::class, 'removeProductFromCart'])->middleware('auth');

// TODO: If necessary convert to POST
// TODO: redirect to /cart once the empty operation is completed
Route::get('/emptyCart', [CartController::class, 'emptyCart'])->middleware('auth');

Route::get('cart', [CartController::class, 'showCart'])->middleware('auth')->name('cart');

Route::get('newOrder', [OrderController::class, 'showOrder'])->middleware('auth');

Route::get('myOrders', [OrderController::class, 'showMyOrders'])->middleware('auth');

Route::get('notifications', [NotificationController::class, 'show'])->name('notifications');

Route::get('/mark-as-read/{id}', [NotificationController::class, 'markNotification'])->name('markNotification');


require __DIR__.'/auth.php';
