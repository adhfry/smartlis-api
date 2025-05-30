<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// for arduino
Route::get("/mode", [ModeController::class, 'index']);
Route::post("/mode", [ModeController::class, 'store']);
Route::get("/device/attendance/{uid}", function () {
    return apiResponse(true);
});

// for auth
Route::post('/login', [AuthController::class, 'store']);

// middleware auth
Route::middleware(['auth:sanctum'])->group(function () {
    // logout
    Route::post('/logout', [AuthController::class, 'logout']);


});

// /api/device/attendance/{UID}