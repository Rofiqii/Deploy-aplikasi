<?php

use App\Http\Controllers\Api\InitialAssessmentController;
use App\Http\Controllers\Api\RadiologyController;
use App\Http\Controllers\Api\SheepController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VitalSignController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get-user', [UserController::class, 'getUser']);
    
    Route::get('/sheep', [SheepController::class, 'index']);
    Route::get('/sheep/{id}', [SheepController::class, 'show']);
    Route::post('/sheep/store', [SheepController::class, 'store']);

    Route::get('/assessment', [InitialAssessmentController::class, 'index']);
    Route::get('/assessment/{id}', [InitialAssessmentController::class, 'show']);

    Route::get('/vital', [VitalSignController::class, 'index']);
    Route::get('/vital/{id}', [VitalSignController::class, 'show']);

    Route::get('/radiology', [RadiologyController::class, 'index']);
    Route::get('/radiology/{id}', [RadiologyController::class, 'show']);

    Route::post('/logout', [UserController::class, 'logout']);
});