<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Menyimpan review dari aplikasi Android.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        // Cek apakah pesanan sudah selesai
        $order = Order::find($request->order_id);

        if ($order->status != 'completed') {
            return response()->json([
                'success' => false,
                'message' => 'Review hanya bisa diberikan setelah pesanan selesai.'
            ], 400);
        }

        // Cek apakah pesanan sudah pernah direview
        if (Review::where('order_id', $request->order_id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan ini sudah memiliki review.'
            ], 400);
        }

        $review = Review::create([
            'order_id' => $request->order_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review berhasil dikirim.',
            'data' => $review
        ], 201);
    }
}