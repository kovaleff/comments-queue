<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('houses', HouseController::class, ['only'=>['index', 'show']]);
Route::apiResource('categories', CategoryController::class, ['only'=>['index', 'show']]);
Route::apiResource('products', ProductController::class, ['only'=>['index', 'show']]);

