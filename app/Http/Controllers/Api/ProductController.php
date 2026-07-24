<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->select(
                'id',
                'category_id',
                'name',
                'description',
                'price',
                'image',
                'status'
            )
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        $products->transform(function ($product) {

            $product->image = asset('uploads/products/' . $product->image);

            return $product;

        });

        return response()->json([
            'success' => true,
            'message' => 'Data produk berhasil diambil.',
            'data' => $products
        ]);
    }
}