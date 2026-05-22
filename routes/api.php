<?php

use App\Http\Controllers\Api\SensorController;

Route::post('/sensor', [SensorController::class, 'store']);
Route::get('/sensor/latest', [SensorController::class, 'latest']);