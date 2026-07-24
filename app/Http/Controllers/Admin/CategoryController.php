<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required'
    ]);

    Category::create([
        'name' => $request->name,
        'status' => $request->status
    ]);

    return redirect()->route('categories.index')
            ->with('success','Kategori berhasil ditambahkan');
}

   public function edit($id)
{
    $category = Category::findOrFail($id);

    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required'
    ]);

    $category->update([
        'name' => $request->name,
        'status' => $request->status
    ]);

    return redirect()->route('categories.index')
            ->with('success','Kategori berhasil diupdate');
}

public function destroy(Category $category)
{
    $category->delete();

    return redirect()->route('categories.index')
            ->with('success','Kategori berhasil dihapus');
}
}