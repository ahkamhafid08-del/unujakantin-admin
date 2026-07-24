<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan
     */
    public function index()
    {
        $orders = Order::latest()->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Menampilkan form tambah pesanan
     */
    public function create()
    {
        $tables = Table::where('status', 1)
                        ->orderBy('table_number')
                        ->get();

        return view('orders.create', compact('tables'));
    }

    /**
     * Menyimpan pesanan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:100',
            'table_number' => 'required|integer',
            'payment_method' => 'required|in:QRIS,Cash',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,ready,completed',
        ]);

        Order::create([
            'customer_name' => $request->customer_name,
            'table_number' => $request->table_number,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pesanan
     */
    public function edit(Order $order)
    {
        $tables = Table::where('status', 1)
                        ->orderBy('table_number')
                        ->get();

        return view('orders.edit', compact('order', 'tables'));
    }

    /**
     * Mengupdate pesanan
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|max:100',
            'table_number' => 'required|integer',
            'payment_method' => 'required|in:QRIS,Cash',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,ready,completed',
        ]);

        $order->update([
        'customer_name' => $request->customer_name,
        'table_number' => $request->table_number,
        'payment_method' => $request->payment_method,
        'total' => $request->total,
        'status' => $request->status,
    ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Menghapus pesanan
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}