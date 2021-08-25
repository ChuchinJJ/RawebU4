<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RESTController;
use App\Http\Controllers\AdministradorController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', [App\Http\Controllers\AdministradorController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('/places', [App\Http\Controllers\RESTController::class, 'index']);
    Route::get('/places/search', [App\Http\Controllers\RESTController::class, 'show']);
    Route::post('/places/save', [App\Http\Controllers\RESTController::class, 'store']);
});

