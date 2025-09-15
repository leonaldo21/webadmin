<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        // Cari admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        // Cek password
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Simpan ke session
            Session::put('admin_id', $admin->id);
            Session::put('admin_username', $admin->username);
            Session::put('admin_name', $admin->name ?? $admin->username);

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah!',
        ])->withInput();
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        // Hapus semua session
        Session::flush();

        // Regenerasi ulang session ID
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
