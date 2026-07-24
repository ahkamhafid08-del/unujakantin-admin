<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Menampilkan daftar notifikasi
     */
    public function index()
    {
        $notifications = Notification::orderBy('id', 'desc')->get();

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Form tambah notifikasi
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Simpan notifikasi
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'message' => 'required',
        ]);

        Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'is_read' => 0,
        ]);

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notifikasi berhasil ditambahkan.');
    }

    /**
     * Form edit
     */
    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    /**
     * Update notifikasi
     */
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => 'required|max:150',
            'message' => 'required',
            'is_read' => 'required|boolean',
        ]);

        $notification->update([
            'title' => $request->title,
            'message' => $request->message,
            'is_read' => $request->is_read,
        ]);

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notifikasi berhasil diperbarui.');
    }

    /**
     * Hapus notifikasi
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notifikasi berhasil dihapus.');
    }
}