<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HitungController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [HitungController::class, 'hitung']);
