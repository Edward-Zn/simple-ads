<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;

Route::get('/', [AdController::class, 'index'])->name('ads.index');
Route::get('/create', [AdController::class, 'create'])->name('ads.create');
Route::post('/', [AdController::class, 'store'])->name('ads.store');
// Route::get('/', function () {
//     return view('welcome');
// });
