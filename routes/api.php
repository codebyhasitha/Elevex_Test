<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GpsLocationController;

// API route to store GPS data from Postman or mobile app
Route::post('/gps-locations', [GpsLocationController::class, 'store']);
