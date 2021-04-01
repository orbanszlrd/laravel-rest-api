<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WebcamController;

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

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/users/search/{name}', [UserController::class, 'search']);
Route::middleware('auth:sanctum')->resource('/users', UserController::class);

Route::middleware('auth:sanctum')->resource('/photos', PhotoController::class);

Route::get('/webcams', [WebcamController::class, 'index']);
Route::get('/webcams/{id}', [WebcamController::class, 'show']);
Route::get('/webcams/search/{name}', [WebcamController::class, 'search']);
Route::middleware('auth:sanctum')->post('/webcams', [WebcamController::class, 'store']);
Route::middleware('auth:sanctum')->put('/webcams/{id}', [WebcamController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/webcams/{id}', [WebcamController::class, 'destroy']);

