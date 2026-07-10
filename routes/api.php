<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookControllerApi;

Route::apiResource('books', BookControllerApi::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
