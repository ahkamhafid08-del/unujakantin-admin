<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::orderBy('table_number', 'asc')->get();

        return view('tables.index', compact('tables'));
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required|max:50|unique:tables,table_number',
            'capacity' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        Table::create([
            'table_number' => $request->table_number,
            'capacity' => $request->capacity,
            'status' => $request->status
        ]);

        return redirect()
            ->route('tables.index')
            ->with('success', 'Meja berhasil ditambahkan.');
    }

    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $request->validate([
            'table_number' => 'required|max:50|unique:tables,table_number,' . $table->id,
            'capacity' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        $table->update([
            'table_number' => $request->table_number,
            'capacity' => $request->capacity,
            'status' => $request->status
        ]);

        return redirect()
            ->route('tables.index')
            ->with('success', 'Meja berhasil diperbarui.');
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()
            ->route('tables.index')
            ->with('success', 'Meja berhasil dihapus.');
    }
}