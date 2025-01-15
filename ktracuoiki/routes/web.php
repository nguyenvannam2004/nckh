<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tourController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tour',tourController::class);