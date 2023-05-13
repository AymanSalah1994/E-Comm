<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('send-mail', [MailController::class, 'index'])->name('notify.with.email');
