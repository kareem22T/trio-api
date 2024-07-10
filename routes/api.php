<?php

use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\SponsorController;

// Sponsors endpoints
Route::get("/sponsors/get-top", [SponsorController::class, 'getTop']);
Route::get("/sponsors/get-other", [SponsorController::class, 'getOther']);
Route::post("/sponsors/search-top", [SponsorController::class, 'searchTop']);
Route::post("/sponsors/search-other", [SponsorController::class, 'searchOther']);

// Service endpoints
Route::get("/services/get", [ServiceController::class, 'get']);
Route::post("/services/search", [ServiceController::class, 'search']);
Route::get("/services/service", [ServiceController::class, 'service']);

// email endpoints
Route::post("/send-msg", [ContactController::class, 'subscribe']);

// settings endpoints
Route::get("/settings/get", [HomeController::class, 'get']);
