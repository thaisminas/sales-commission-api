<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalespersonController;
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

Route::group(['prefix' => 'salesperson'], function () {
    Route::get('', [SalespersonController::class, 'getSallers']);
    // Route::get('{id}', [SalesController::class, 'getAllSales']);
    Route::post('',[SalespersonController::class, 'create']);
});

Route::group(['prefix' => 'sales'], function () {
    Route::get('', [SalesController::class, 'getAllSales']);
    Route::get('{id}', [SalesController::class, 'getSalesBySalllersId']);
    Route::post('',[SalesController::class, 'create']);
});
