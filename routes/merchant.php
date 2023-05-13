<?php

use App\Http\Controllers\Merchant\MerchantController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isMerchant']], function () {

    Route::get('/merchant/home', [MerchantController::class, 'home'])->name('merchant.panel.index');
    Route::get('/merchant/products', [MerchantController::class, 'allProducts'])->name('merchant.panel.products');


    Route::get('/merchant/product/{slug}', [MerchantController::class, 'viewProduct'])->name('merchant.panel.product.view');
    Route::get('/merchant/product/create/new', [MerchantController::class, 'createProduct'])->name('merchant.panel.product.create');


    Route::post('/merchant/product/update', [MerchantController::class, 'updateProduct'])->name('merchant.panel.update.product');

    Route::post('/merchant/profile/update', [MerchantController::class, 'updateMerchantProfile'])->name('merchant.panel.profile.update');

    Route::post('/merchant/product/store', [MerchantController::class, 'storeProduct'])->name('merchant.panel.product.store');
    Route::get('/merchant/related-orders', [MerchantController::class, 'relatedOrders'])->name('merchant.panel.related.order');
    Route::get('/merchant/completed-orders', [MerchantController::class, 'completedItems'])->name('merchant.panel.completed.order');
    Route::get('/merchant/related-items-counter', [MerchantController::class, 'relatedItemsCounter'])->name('merchant.panel.related.items.counter');
});
// merchant.panel.panel ...etc
