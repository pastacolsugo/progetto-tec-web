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

Route::get('/', HomeController::class)->name('home');

Route::get('/search', SearchController::class)->name('search');

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::get('/product/id/{id}', [ProductController::class, 'showProduct'])->name('product');

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');

Route::post('/cart/add-product', [CartController::class, 'addProductToCart'])->middleware('auth')->name('addProductToCart');

Route::post('/cart/remove-product', [CartController::class, 'removeProduct'])->middleware('auth')->name('removeProductFromCart');

// TODO: If necessary convert to POST
// TODO: redirect to /cart once the empty operation is completed
Route::get('/cart/empty-cart', [CartController::class, 'emptyCart'])->middleware('auth');

Route::get('/cart', [CartController::class, 'showCart'])->middleware('auth')->name('cart');

Route::get('/order/new-order', [OrderController::class, 'showOrder'])->middleware('auth')->name('new-order');

Route::get('/order/my-orders', [OrderController::class, 'showMyOrders'])->middleware('auth')->name('my-orders');

Route::get('/notifications', [NotificationController::class, 'show'])->middleware('auth')->name('notifications');

Route::get('/notifications/mark-as-read/{id}', [NotificationController::class, 'markNotification'])->middleware('auth')->name('markNotification');

Route::get('/seller/listings', SellerListingController::class)->middleware('auth')->name('sellerListing');

Route::get('/seller/edit-listing/{product_id}', [ProductController::class, 'editProductPage'])->
    whereNumber('product_id')->middleware('auth')->name('editProductListing');

Route::post('/seller/edit-product', [ProductController::class, 'editProductRequest'])->middleware('auth')->name('editProduct');

Route::get('/product/image/{product_id}', ImagesController::class)->middleware('cache.headers:public;max_age=2628000;etag')->name('product-image');

Route::post('/product/delete/{product_id}', [ProductController::class, 'deleteProductRequest'])->middleware('auth')->name('deleteProduct');

Route::post('/order/place', [OrderController::class, 'placeOrder'])->middleware('auth')->name('placeOrder');

Route::post('/payments', [PaymentController::class, 'show'])->middleware('auth')->name('payments');

Route::post('/order/confirm', [OrderController::class, 'showConfirmOrder'])->middleware('auth')->name('confirmOrder');

Route::get('/product/create', [ProductController::class, 'createProductPage'])->middleware('auth')->name('createProduct');

Route::post('/product/create', [ProductController::class, 'createProductRequest'])->middleware('auth')->name('api-create-product');

require __DIR__.'/auth.php';
