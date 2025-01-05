<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use KhetamHamdy\CurrencyExchange\Http\Controllers\CurrencyController;
use KhetamHamdy\CurrencyExchange\Http\Controllers\ExchangeTransactionController;

Route::prefix('api/currency-exchange')->group(function () {
    Route::get('/currencies', [CurrencyController::class, 'index']);
    Route::post('/currencies-store', [CurrencyController::class, 'store']);
    Route::put('/currencies-update/{id}', [CurrencyController::class, 'update']);

    Route::get('/exchange', [ExchangeTransactionController::class, 'index']);
    Route::post('/exchange-store', [ExchangeTransactionController::class, 'store']);
    Route::put('/exchange-update/{id}', [ExchangeTransactionController::class, 'update']);
});
