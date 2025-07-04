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
    Route::get('/detail/{productId}', [ProductController::class, 'detail'])->name('detail');
    Route::post('/register', [ProductController::class, 'store']);
    Route::patch('/{productId}/update', [ProductController::class, 'update']);
    Route::delete('/{productId}/delete', [ProductController::class, 'delete']);
    Route::get('/search', [ProductController::class, 'search']);
});
