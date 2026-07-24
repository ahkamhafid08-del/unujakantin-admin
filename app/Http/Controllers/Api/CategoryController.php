<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Menampilkan semua kategori yang aktif.
     */
    public function index()
    {
        $categories = Category::select(
                'id',
                'name',
                'status'
            )
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kategori berhasil diambil.',
            'data' => $categories
        ]);
    }
}