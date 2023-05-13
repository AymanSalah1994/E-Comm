<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CountingController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\Store\SearchController;
use App\Http\Controllers\Customer\Store\StoreController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'isCustomer','verified']], function () {
    // PROFILE
    Route::get('/profile/view-profile', [ProfileController::class, 'viewProfile'])->name('profile.view');
    Route::post('/profile/update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    // PROFILE _END

    //CART & WISH LIST : CART CONTROLLER
    Route::get('store/view-cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('store/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('store/delete-cart-item', [CartController::class, 'deleteCartItem'])->name('cart.item.delete');
    Route::post('store/update-cart-item', [CartController::class, 'updateCartItem'])->name('cart.item.update');
    Route::get('store/view-wish-list', [CartController::class, 'viewWishList'])->name('wish.list.view');
    Route::post('store/delete-wish-list-item', [CartController::class, 'deleteWishListItem'])->name('wish.list.item.delete');
    //CART & WISH LIST : CART CONTROLLER END


    // ORDER : ORDER CONTROLLER :
    Route::get('store/cart-checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
    Route::post('store/order-confirm', [OrderController::class, 'confirmOrder'])->name('order.confirm');
    Route::get('store/all-orders', [OrderController::class, 'allOrders'])->name('orders.all');
    Route::get('store/order-details/{tracking_id}', [OrderController::class, 'orderDetails'])->name('order.details');
    Route::post('store/cancel-order', [OrderController::class, 'cancelOrder'])->name('order.cancel');
    Route::post('store/return-order-to-cart', [OrderController::class, 'returnOrderToCart'])->name('return.order.to.cart');
    // ORDER :ORDER CONTROLLER END  ;

    Route::get('/store/cart-count', [CountingController::class, 'cartCount'])->name('cart.counter');
    Route::get('/store/wish-list-count', [CountingController::class, 'wishListCount'])->name('wish.list.counter');
});


// GENERAL ROUTES : StoreController
Route::get('/', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/categories', [StoreController::class, 'categories'])->name('store.categories');
Route::get('/store/{slug}/products', [StoreController::class, 'categoryProducts'])->name('category.products');
Route::get('/store/product/{slug}', [StoreController::class, 'productDetails'])->name('product.details');
Route::get('/store/merchants/all', [StoreController::class, 'allMerchants'])->name('merchants.all');
Route::get('/store/merchant/info/{slug}', [StoreController::class, 'merchantDetails'])->name('merchant.details');
Route::get('/store/merchant/{slug}/products', [StoreController::class, 'merchantProducts'])->name('merchant.store.products');
// GENERAL ROUTES : StoreController END

// GENERAL ROUTES :
Route::get('/store/search', [SearchController::class, 'index'])->name('store.search');
Route::post('/add-to-cart', [CartController::class, 'addCartItem'])->name('cart.add');
Route::post('/add-to-wish-list', [CartController::class, 'addWishListItem'])->name('wish-list.add');
Route::post('/store/review/submit', [ReviewController::class, 'submitReview'])->name('review.submit');
// GENERAL ROUTES :END

Route::get('/store/verification/notify' , [StoreController::class , 'verifiyNotice'])->name('verification.notice') ;
