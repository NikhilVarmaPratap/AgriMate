<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FarmerController;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\PricePredictionController;

// Farmer Routes
Route::get('/farmers', [FarmerController::class, 'index'])->name('farmers.index');
Route::get('/farmers/create', [FarmerController::class, 'create'])->name('farmers.create');
Route::post('/farmers', [FarmerController::class, 'store'])->name('farmers.store');

// Product Routes
Route::get('/prods', [ProdController::class, 'index'])->name('prods.index');
Route::get('/prods/create', [ProdController::class, 'create'])->name('prods.create');
Route::post('/prods', [ProdController::class, 'store'])->name('prods.store');

// Contact Routes
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Retailer Routes
Route::get('/retailers', [RetailerController::class, 'index'])->name('retailers.index');
Route::get('/retailers/create', [RetailerController::class, 'create'])->name('retailers.create');
Route::post('/retailers', [RetailerController::class, 'store'])->name('retailers.store');


// Farmer Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FarmerController::class, 'dashboard'])->name('dashboard');
    Route::get('/sell', [FarmerController::class, 'sell'])->name('sell.create');
    Route::get('/storage/nearby', [StorageController::class, 'nearby'])->name('storage.nearby');
});

Route::get('/predict', [PricePredictionController::class, 'showPredictionForm'])->name('predict.form');
Route::post('/predict', [PricePredictionController::class, 'getPrediction'])->name('predict.price');