<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/products'),
                $imageName
            );
        }

        Product::create([
            'category_id'  => $request->category_id,
            'name' => $request->name,
            'description'  => $request->description,
            'price'        => $request->price,
            'image'        => $imageName,
            'status'       => $request->status
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status', 1)->get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required'
        ]);

        $imageName = $product->image;

        if ($request->hasFile('image')) {

            if (
                $product->image &&
                file_exists(public_path('uploads/products/' . $product->image))
            ) {
                unlink(public_path('uploads/products/' . $product->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/products'),
                $imageName
            );
        }

        $product->update([
            'category_id'  => $request->category_id,
            'name' => $request->name,
            'description'  => $request->description,
            'price'        => $request->price,
            'image'        => $imageName,
            'status'       => $request->status
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if (
            $product->image &&
            file_exists(public_path('uploads/products/' . $product->image))
        ) {
            unlink(public_path('uploads/products/' . $product->image));
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}