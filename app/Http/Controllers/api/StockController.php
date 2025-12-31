<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Mock API endpoint untuk cek stock
     * URL: http://localhost:8001/api/product/stock/check?productId=1&storeId=1
     */
    public function check(Request $request)
    {
        $productId = $request->query('productId');
        $storeId = $request->query('storeId');

        // Validate parameters
        if (!$productId || !$storeId) {
            return response('Invalid parameters', 400)
                ->header('Content-Type', 'text/plain');
        }

        // Find stock in database
        $stock = ProductStock::where('product_id', $productId)
            ->where('store_id', $storeId)
            ->first();

        if (!$stock) {
            return response('Product not found', 404)
                ->header('Content-Type', 'text/plain');
        }

        // Return hanya angka (sesuai format API original)
        return response($stock->quantity, 200)
            ->header('Content-Type', 'text/plain');
    }
}
