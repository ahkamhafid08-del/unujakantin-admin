<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Table;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::select(
                'id',
                'table_number',
                'capacity',
                'status'
            )
            ->where('status', 1)
            ->orderBy('table_number')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data meja berhasil diambil.',
            'data' => $tables
        ]);
    }
}