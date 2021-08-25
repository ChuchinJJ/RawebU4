<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

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


Route::get('/', [App\Http\Controllers\PlaceController::class, 'index']);
Route::get('places', [App\Http\Controllers\PlaceController::class, 'index']);
Route::get('newPlace', [App\Http\Controllers\PlaceController::class, 'create']);
Route::get('mapa', [App\Http\Controllers\PlaceController::class, 'mapa']);
Route::post('setplace', [App\Http\Controllers\PlaceController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
