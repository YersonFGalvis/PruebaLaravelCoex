<?php

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

Route::get('/listar',[App\Http\Controllers\UserController::class, 'index']);
Route::post('/crear',[App\Http\Controllers\UserController::class, 'store']);
Route::delete('/borrar/{id}',[App\Http\Controllers\UserController::class, 'destroy']);
Route::put('/update/{id}',[App\Http\Controllers\UserController::class, 'update']);
