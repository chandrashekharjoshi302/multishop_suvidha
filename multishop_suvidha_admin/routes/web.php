<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\detailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

// main page
Route::get('/', [HomeController::class, 'index'])->name('home.index');



// cart page
Route::get('/cart', [cartController::class, 'index']);



// checkout page
Route::get('/checkout', [checkoutController::class, 'index']);



// contact page
Route::get('/contact', [contactController::class, 'index']);


// details page
Route::get('/details', [detailsController::class, 'index']);


// shop page

Route::get('/shop', [shopController::class, 'index']);



//inside auth

Route::middleware('auth')->group(function () {
    Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});


// inside admin

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin/add-brand', [AdminController::class, 'add_brand'])->name('admin.add-brand');

    Route::get('/admin/add-category', [AdminController::class, 'add_category'])->name('admin.add-category');

    Route::get('/admin/add-coupon', [AdminController::class, 'add_coupon'])->name('admin.add-coupon');

    Route::get('/admin/add-product', [AdminController::class, 'add_product'])->name('admin.add-product');

    Route::get('/admin/add-slider', [AdminController::class, 'slider'])->name('add-slider');

    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');

    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');

    Route::get('/admin/coupons', [AdminController::class, 'coupons'])->name('admin.coupons');

    Route::get('/admin/order-details', [AdminController::class, 'order_details'])->name('admin.order-details');

    Route::get('/admin/order-tracking', [AdminController::class, 'order_tracking'])->name('admin.order-tracking');

    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');

    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');

    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

    Route::get('/admin/slider', [AdminController::class, 'slider'])->name('admin.slider');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

    // to add product


    // product page

    Route::post('/product', [AdminController::class, 'add_product_data'])->name('add_product_data');
});
