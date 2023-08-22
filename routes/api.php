<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\CampaignController;

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
        Route::post('/all-category',[ServiceController::class,'all_category']);
        Route::post('/all-sub-category',[ServiceController::class,'all_sub_category']);
        Route::post('/category',[ServiceController::class,'by_category']);
        Route::post('/sub-category',[ServiceController::class,'by_sub_category']);
        Route::post('/vendor',[ServiceController::class,'by_vendor']);
        Route::post('/detail',[ServiceController::class,'detail']);
        Route::post('/review',[ServiceController::class,'review']);
    });

    Route::prefix('product')->group(function () {
        Route::post('/all',[ProductController::class,'all']);
        Route::post('/all-category',[ProductController::class,'all_category']);
        Route::post('/all-sub-category',[ProductController::class,'all_sub_category']);
        Route::post('/category',[ProductController::class,'by_category']);
        Route::post('/sub-category',[ProductController::class,'by_sub_category']);
        Route::post('/vendor',[ProductController::class,'by_vendor']);
        Route::post('/detail',[ProductController::class,'detail']);
        Route::post('/review',[ProductController::class,'review']);
    });

    Route::prefix('food')->group(function () {
        Route::post('/all',[FoodController::class,'all']);
        Route::post('/all-category',[FoodController::class,'all_category']);
        Route::post('/category',[FoodController::class,'by_category']);
        Route::post('/vendor',[FoodController::class,'by_vendor']);
        Route::post('/detail',[FoodController::class,'detail']);
        Route::post('/review',[FoodController::class,'review']);
    });

    Route::prefix('event')->group(function () {
        Route::post('/all',[EventController::class,'all']);
        Route::post('/vendor',[EventController::class,'by_vendor']);
        Route::post('/detail',[EventController::class,'detail']);
    });

    Route::prefix('campaign')->group(function () {
        Route::post('/all',[CampaignController::class,'all']);
        Route::post('/vendor',[CampaignController::class,'by_vendor']);
        Route::post('/detail',[CampaignController::class,'detail']);
    });
});

