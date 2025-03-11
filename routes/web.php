<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;

// Display the list of ads
Route::get('/', [AdController::class, 'index'])->name('ads.index');

// Show the form to create a new ad
Route::get('/create', [AdController::class, 'create'])->name('ads.create');

// Store a new ad in the database
Route::post('/', [AdController::class, 'store'])->name('ads.store');
