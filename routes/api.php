<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LettreController;



Route::post('/add-lettre',LettreController::class);
