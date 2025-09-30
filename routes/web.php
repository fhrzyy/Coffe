<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;


Route::resource('transactions', TransactionController::class);

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});
