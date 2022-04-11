<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellerListingController;
use App\Http\Controllers\PaymentController;
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

// TODO: Refactor routes and route names for style consistency!

Route::get('/', HomeController::class);

Route::get('/search', SearchController::class);

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::resource('products', ProductController::class);

Route::post('/addProductToCart', [CartController::class, 'addProductToCart'])->middleware('auth')->name('addProductToCart');

Route::post('/removeProductFromCart', [CartController::class, 'removeProduct'])->middleware('auth')->name('removeProductFromCart');

// TODO: If necessary convert to POST
// TODO: redirect to /cart once the empty operation is completed
Route::get('/emptyCart', [CartController::class, 'emptyCart'])->middleware('auth');

Route::get('cart', [CartController::class, 'showCart'])->middleware('auth')->name('cart');

Route::get('new-order', [OrderController::class, 'showOrder'])->middleware('auth')->name('new-order');

Route::get('my-orders', [OrderController::class, 'showMyOrders'])->middleware('auth')->name('my-orders');

Route::get('notifications', [NotificationController::class, 'show'])->middleware('auth')->name('notifications');

Route::get('/mark-as-read/{id}', [NotificationController::class, 'markNotification'])->middleware('auth')->name('markNotification');

Route::get('/sellerListing', SellerListingController::class)->middleware('auth')->name('sellerListing');

Route::get('/editProductListing/{product_id}', [EditProductController::class, 'editProductForm'])->
    whereNumber('product_id')->middleware('auth')->name('editProductListing');

Route::post('/editProduct', [EditProductController::class, 'editProductRequest'])->middleware('auth')->name('editProduct');

Route::get('/product-image/{product_id}', ImagesController::class)->name('product-image');

Route::post('/deleteProduct/{product_id}', [EditProductController::class, 'deleteProductRequest'])->middleware('auth')->name('deleteProduct');

Route::post('/placeOrder', [OrderController::class, 'placeOrder'])->middleware('auth')->name('placeOrder');

Route::post('/payments', [PaymentController::class, 'show'])->middleware('auth')->name('payments');

Route::post('/confirmOrder', [OrderController::class, 'showConfirmOrder'])->middleware('auth')->name('confirmOrder');

require __DIR__.'/auth.php';
