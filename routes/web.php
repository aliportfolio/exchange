<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CurrencyController;



// Project Show & Create
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/create', [HomeController::class, 'create'])->name('projects.create');
Route::post('/', [HomeController::class, 'store'])->name('store');

// Get Project Cost In Any Currency
Route::get('project/{id}/exchange/{currency}', [HomeController::class, 'project_exchange'])->name('projects.exchange');
// Exchange Currencies
Route::get('exchange', [HomeController::class, 'exchange'])->name('exchange');
Route::post('exchange', [HomeController::class, 'exchange_action'])->name('exchange_action');

// Project Resource
Route::resource('currencies', CurrencyController::class);
