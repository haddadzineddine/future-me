<?php

use Carbon\Carbon;
use App\Models\Lettre;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifyEmailController;



Route::get('/lettres/{lettre}/email/confirm', VerifyEmailController::class)
    ->name('lettres.confirmEmail');

Route::view('/', 'home');
