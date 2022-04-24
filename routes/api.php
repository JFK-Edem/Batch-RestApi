<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HmoController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\OrdersController;


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

Route::post('/createHmo', [HmoController::class, 'store']);

Route::get('/viewHmos', [HmoController::class, 'index']);


Route::post('/createOrder', [OrdersController::class, 'store']);

Route::get('/viewOrders', [OrdersController::class, 'index']);

Route::get('/batchOrders/{id}', [OrdersController::class, 'batchOrders']);



// Route::get('/createBatch/{id}', [BatchController::class, 'createBatchOrder']);

// Route::get('/batchByEncounter', [BatchController::class, 'batchByEncounter']);




