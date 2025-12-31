<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StockController;

// Mock API endpoint - sesuai format original
Route::get('/product/stock/check', [StockController::class, 'check']);
