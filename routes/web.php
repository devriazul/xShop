<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class);

Route::get('/customers/{customer}/send-promotional-email', 'CustomerController@sendPromotionalEmail')
    ->name('customers.sendPromotionalEmail');

