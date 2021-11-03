<?php

use App\Http\Controllers\API\Books\BookAPIController;
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
Route::get('/book/list', [BookAPIController::class, 'getBookList']);
Route::post('/book/create', [BookAPIController::class, 'createBook']);
Route::get('/book/{bookId}',  [BookAPIController::class, 'getBookById']);
Route::post('/book/{bookId}', [BookAPIController::class, 'updateBook']);
Route::delete('/book/delete/{bookId}', [BookAPIController::class, 'deleteBookById']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
