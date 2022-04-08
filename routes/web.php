<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifyEmailController;


Route::get('/email', function () {
    return view('EmailVerified');
});


Route::get('/lettres/{lettre}/email/confirm', VerifyEmailController::class)
    ->name('lettres.confirmEmail');

Route::view('/', 'Home');
