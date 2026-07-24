<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

    'customer_name' => 'required|string|max:100',

    'table_number' => 'required|integer',

    'payment_method' => 'required|string',

    'notes' => 'nullable|string',

    'subtotal' => 'required|numeric',

    'service_fee' => 'required|numeric',

    'total' => 'required|numeric',

    'items' => 'required|array|min:1',

    'items.*.product_id' => 'required|exists:products,id',

    'items.*.quantity' => 'required|integer|min:1',

    'items.*.price' => 'required|numeric',

]);

        DB::beginTransaction();

        try {

            $order = Order::create([

    'order_code' => 'ORD-' . now()->format('YmdHis'),

    'customer_name' => $request->customer_name,

    'table_number' => $request->table_number,

    'notes' => $request->notes,

    'payment_method' => $request->payment_method,

    'subtotal' => $request->subtotal,

    'service_fee' => $request->service_fee,

    'total' => $request->total,

    'status' => 'pending',

]);

            foreach ($request->items as $item) {

                OrderItem::create([

                    'order_id' => $order->id,

                    'product_id' => $item['product_id'],

                    'quantity' => $item['quantity'],

                    'price' => $item['price'],

                    'subtotal' => $item['price'] * $item['quantity']

                ]);

            }

            DB::commit();

            return response()->json([

                'success' => true,

                'message' => 'Pesanan berhasil dibuat.',

                'data' => $order->load('items.product')

            ],201);

        } catch (\Exception $e){

            DB::rollBack();

            return response()->json([

                'success'=>false,

                'message'=>$e->getMessage()

            ],500);

        }
    }


public function show($id)
{
    $order = Order::with('items.product')->find($id);

    if (!$order) {

        return response()->json([
            'success' => false,
            'message' => 'Order tidak ditemukan'
        ], 404);

    }

    return response()->json([
        'success' => true,
        'message' => 'Order berhasil ditemukan',
        'data' => $order
    ]);
}
}