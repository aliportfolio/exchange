<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CurrencyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/* ===============      Projects    =============== */
Route::group(['prefix' => 'projects', 'as' => 'projects.'], function() {
    // All Projects
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    // Create Project
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    // Create Project Cost
    Route::post('/store-costs/{project}', [ProjectController::class, 'store_costs'])->name('costs.store');
    // Get Project Cost (In Base Currency Or Any Currency)
    Route::get('/get-total/{project}/{currency?}', [ProjectController::class, 'get_total'])->name('get_total');
});

/* ===============      Currencies    =============== */
Route::group(['prefix' => 'currencies', 'as' => 'currencies.'], function() {
    // All Currency
    Route::get('/', [CurrencyController::class, 'index'])->name('index');
    // Create Currency
    Route::post('/store', [CurrencyController::class, 'store'])->name('store');
    // Exchange Currencies
    Route::get('/exchange/{amount}/{from}/{to}', [CurrencyController::class, 'exchange'])->name('exchange');
});
