<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = User::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'Email tidak ditemukan!');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Password salah!');
        }

        session([
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
        ]);

        return redirect('/dashboard');
    }

    // Logout
    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}