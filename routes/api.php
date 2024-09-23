<?php

use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    // Route::apiResource('customers', CustomerController::class);
    // Route::apiResource('admin', AdminController::class);

    // Storing on tablet
    Route::post('reservations', [CustomerController::class, 'store']);

    //  Retrieving
    Route::get('/dashboard', [AdminController::class, 'index']);


    // Show each customer
    Route::get('/customer/{id}', [AdminController::class, 'show']);
});
