<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('tenants', \App\Http\Controllers\Api\TenantController::class);
Route::apiResource('access-logs', \App\Http\Controllers\Api\AccessLogController::class);
