<?php

use App\Http\Controllers\Api\AuthenticateController;
use App\Http\Controllers\Api\PostController;
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

Route::post('/login', [AuthenticateController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/posts', PostController::class)->except('index');
    Route::get('/user', [AuthenticateController::class, 'user']);
    Route::post('/logout', [AuthenticateController::class, 'logout']);
});

Route::get('/posts', [PostController::class, 'index']);
