<?php

use App\Http\Controllers\Api\SensorController;

Route::middleware('api.key')->group(function () {
    Route::post('/sensor', [SensorController::class, 'store']);
    Route::get('/sensor/latest', [SensorController::class, 'latest']);
});