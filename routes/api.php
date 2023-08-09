<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\ServiceController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthenticationController::class,'login']);
Route::post('/register', [AuthenticationController::class,'register']);

Route::middleware(['token'])->group(function () {

    Route::post('/log-out', [AuthenticationController::class,'log_out']);
    
    Route::post('/profile', [AuthenticationController::class,'profile']);
    Route::post('/profile-update', [AuthenticationController::class,'profile_update']);
    Route::post('/change-password', [AuthenticationController::class,'change_password']);

    Route::prefix('service')->group(function () {
        Route::post('/all',[ServiceController::class,'all']);
        Route::post('/category',[ServiceController::class,'by_category']);
        Route::post('/sub-category',[ServiceController::class,'by_sub_category']);
        Route::post('/detail',[ServiceController::class,'detail']);

    });
});

