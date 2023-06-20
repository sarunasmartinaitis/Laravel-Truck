<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TruckSubunitController;

// Display trucks
Route::get('/', [TruckController::class, 'index']);

// Create Truck
Route::get('/trucks/create', [TruckController::class, 'create']);

// Store Truck
Route::post('/trucks', [TruckController::class, 'store']);

// Edit Truck
Route::get('/trucks/{truck}/edit', [TruckController::class, 'edit']);

// Update Truck
Route::put('/trucks/{truck}', [TruckController::class, 'update']);

// Delete Truck
Route::delete('/trucks/{truck}', [TruckController::class, 'destroy']);

// Create Subunits
Route::get('/subunits/create', [TruckSubunitController::class, 'create']);

// Create Subunits
Route::post('/subunits', [TruckSubunitController::class, 'store']);
