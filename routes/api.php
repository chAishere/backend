<?php

use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::post('/auth/login', [AppController::class, 'Signin']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/register', [AppController::class, 'register']);

Route::any('/show_models', [AppController::class, 'show_models']);
Route::any('/show_cars', [AppController::class, 'show_cars']);
Route::any('/quote-request', [AppController::class, 'quote_request']);