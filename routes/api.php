<?php

use App\Http\Controllers\ArticleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route CRUD for Articles
Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/get', [ArticleController::class, 'get']);
Route::post('update/{id}', [ArticleController::class, 'update']);
Route::post('/getdata', [ArticleController::class, 'getdata'])->name('getdata');
Route::delete('destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
