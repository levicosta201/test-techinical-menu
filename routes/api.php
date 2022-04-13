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
Route::name('categories')->prefix('categories')->group(function() {
    Route::get('', [\App\Http\Controllers\CategoryController::class, 'get']);
    Route::post('', [\App\Http\Controllers\CategoryController::class, 'save']);
});

Route::name('products')->prefix('products')->group(function() {
    Route::get('', [\App\Http\Controllers\ProductsController::class, 'get']);
    Route::post('', [\App\Http\Controllers\ProductsController::class, 'save']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
