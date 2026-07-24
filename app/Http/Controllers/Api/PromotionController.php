<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::select(
                'id',
                'title',
                'description',
                'image',
                'start_date',
                'end_date',
                'status'
            )
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data promo berhasil diambil.',
            'data' => $promotions
        ]);
    }
}