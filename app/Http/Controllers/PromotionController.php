<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Notification;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Menampilkan daftar promo
     */
    public function index()
    {
        $promotions = Promotion::orderBy('id', 'asc')->get();

        return view('promotions.index', compact('promotions'));
    }

    /**
     * Menampilkan form tambah promo
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Menyimpan promo baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:150',
            'description' => 'nullable',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'status'      => 'required'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/promotions'),
                $imageName
            );
        }

        $promotion = Promotion::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imageName,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'status'      => $request->status
        ]);

        // Membuat notifikasi otomatis ketika promo ditambahkan
        Notification::create([
            'title'   => '🎉 Promo Baru',
            'message' => $promotion->title,
            'is_read' => 0,
        ]);

        return redirect()
            ->route('promotions.index')
            ->with('success', 'Promo berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit promo
     */
    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Mengupdate promo
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title'       => 'required|max:150',
            'description' => 'nullable',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'status'      => 'required'
        ]);

        $imageName = $promotion->image;

        if ($request->hasFile('image')) {

            if (
                $promotion->image &&
                file_exists(public_path('uploads/promotions/' . $promotion->image))
            ) {
                unlink(public_path('uploads/promotions/' . $promotion->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/promotions'),
                $imageName
            );
        }

        $promotion->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imageName,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'status'      => $request->status
        ]);

        return redirect()
            ->route('promotions.index')
            ->with('success', 'Promo berhasil diperbarui.');
    }

    /**
     * Menghapus promo
     */
    public function destroy(Promotion $promotion)
    {
        if (
            $promotion->image &&
            file_exists(public_path('uploads/promotions/' . $promotion->image))
        ) {
            unlink(public_path('uploads/promotions/' . $promotion->image));
        }

        $promotion->delete();

        return redirect()
            ->route('promotions.index')
            ->with('success', 'Promo berhasil dihapus.');
    }
}