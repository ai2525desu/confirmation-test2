<?php

use App\Http\Controllers\ProductController;
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

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'list']);
    Route::get('/register', [ProductController::class, 'register']);
    Route::post('/register', [ProductController::class, 'store']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/{productId}', [ProductController::class, 'detail'])->name('detail');
    Route::patch('/{productId}/update', [ProductController::class, 'update']);
    Route::delete('/{productId}/delete', [ProductController::class, 'delete']);
});
