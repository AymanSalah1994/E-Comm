<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//Auth Routes
Auth::routes(['verify' => true]);


Route::get('/auth/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('callback.google');
