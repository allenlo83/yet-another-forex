<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RateController;

Route::get('/', function () {
    return view('app');
});

Route::get('/get-rates', [RateController::class, 'index'])->name('index');