<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifyEmailController;


Route::get('/lettres/{lettre}/email/confirm',  [VerifyEmailController::class, 'send'])
    ->name('lettres.confirmEmail');

Route::get('/email-is-verified',  [VerifyEmailController::class, 'show'])
    ->name('email.isConfirmed');

Route::view('/', 'Home');
