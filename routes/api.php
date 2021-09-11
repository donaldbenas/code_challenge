<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/customers', function (App\Http\Controllers\CustomerController $customers) {
    return $customers->index();
});

Route::get('/customers/{customerId}', function (App\Http\Controllers\CustomerController $customers, $customerId) {
    return $customers->show($customerId);
});

