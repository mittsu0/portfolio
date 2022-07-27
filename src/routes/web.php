<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/test', [App\Http\Controllers\TestController::class,'test']);

Route::get('/',[App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::post('/articles/confirm',[App\Http\Controllers\ArticleController::class, 'confirm'])->name('articles.confirm');
Route::resource('/articles',App\Http\Controllers\ArticleController::class)->only(['create']);
Route::resource('/articles',App\Http\Controllers\ArticleController::class)->only(['store','show'])->middleware('create_uid');

Route::post('/articles/{article}/comments/confirm',[App\Http\Controllers\CommentController::class, 'confirm'])->name('comments.confirm');
Route::post('/articles/{article}/comments',[App\Http\Controllers\CommentController::class, 'store'])->name('comments.store')->middleware('create_uid');

Route::put('/articles/{article}/good',[App\Http\Controllers\ArticleController::class, 'good'])->name('articles.good')->middleware('create_uid');
Route::delete('/articles/{article}/good',[App\Http\Controllers\ArticleController::class, 'ungood'])->middleware('create_uid');

Route::put('/articles/{article}/bad',[App\Http\Controllers\ArticleController::class, 'bad'])->name('articles.bad')->middleware('create_uid');
Route::delete('/articles/{article}/bad',[App\Http\Controllers\ArticleController::class, 'unbad'])->middleware('create_uid');
