<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalespersonController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api', 'prefix' => 'salesperson'], function () {
    Route::get('', [SalespersonController::class, 'getSallers']);
    Route::post('',[SalespersonController::class, 'create']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'sales'], function () {
    Route::get('', [SalesController::class, 'getAllSales']);
    Route::get('{id}', [SalesController::class, 'getSalesBySalllersId']);
    Route::post('',[SalesController::class, 'create']);
    Route::get('report/{id}', [SalesController::class, 'getSalesReportBySalesperson']);
});


Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});


Route::get('healthy', function (){
        return response()->json([
            'status' => 'Server running!',
            'version' => app()->version()
        ]);
    }
);

