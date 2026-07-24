<?php

namespace App\Http\Controllers;

use App\Models\Review;


class ReviewController extends Controller
{
    /**
     * Menampilkan daftar review
     */
    public function index()
    {
        $reviews = Review::with([
                'order',
                'order'
            ])
            ->orderBy('id', 'desc')
            ->get();

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Menampilkan detail review
     */
    public function show(Review $review)
    {
        $review->load([
            'order',
            'order.table'
        ]);

        return view('reviews.show', compact('review'));
    }

    /**
     * Menghapus review
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review berhasil dihapus.');
    }
}