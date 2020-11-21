<?php

use App\Application\Http\Controllers\ProductController;
use App\Application\Http\Controllers\ProductQuantityHistoryController;
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

Route::middleware('api')->apiResource('/products', ProductController::class);
Route::middleware('api')->get('/product-quantity-history', ProductQuantityHistoryController::class . '@index');
Route::middleware('api')->post('/bulk-create-update', ProductController::class . '@bulkProducts');
