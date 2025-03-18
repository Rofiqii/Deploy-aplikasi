<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InitialAssessmentController;
use App\Http\Controllers\Admin\RadiologyController;
use App\Http\Controllers\Admin\SheepController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VitalSignController;
use App\Models\InitialAssessment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.landingpage');
})->name('landingpage');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart-data', [DashboardController::class, 'getChartData'])->name('chart.data');

    Route::resource('/sheep', SheepController::class);
    Route::get('sheep/{id}/download', [SheepController::class, 'downloadQrCode'])->name('sheep.download');

    Route::resource('/assessment', InitialAssessmentController::class);
    
    Route::resource('/vital-sign', VitalSignController::class);
    Route::post('/check-health', [VitalSignController::class, 'predictHealth']);
    
    Route::resource('/radiology', RadiologyController::class);
    Route::post('/predict-usg', [RadiologyController::class, 'predictPregnant']);

    Route::resource('/user', UserController::class);
});
