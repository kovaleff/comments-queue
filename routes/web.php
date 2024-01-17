<?php

use App\Http\Middleware\TestMiddleWare;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('show-article');
Route::post('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'addComment'])->name('add-comment');
Route::post('/articles/like/{article}', [\App\Http\Controllers\ArticleController::class, 'like'])->name('like-article');
Route::get('/tags/{tag}', [\App\Http\Controllers\TagController::class, 'show'])->name('show-tag');
Route::get('/articles-by-tag/{tagTitle}', [\App\Http\Controllers\ArticleController::class, 'byTag'])->name('articles-by-tag');
Route::post('/inc-like/{article}', [\App\Http\Controllers\ArticleController::class, 'incLike'])->name('inc-like');

