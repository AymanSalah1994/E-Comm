<?php

use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;

// Route::get('/store/features', [FooterController::class, 'features'])->name('footer.features');
// Route::get('/store/pricing', [FooterController::class, 'pricing'])->name('footer.pricing');
// Route::get('/store/faqs', [FooterController::class, 'faqs'])->name('footer.faqs');
// Route::get('/store/about', [FooterController::class, 'about'])->name('footer.about');
Route::get('/store/merchant-how-to', [FooterController::class, 'howToApply'])->name('footer.merchant.apply');
