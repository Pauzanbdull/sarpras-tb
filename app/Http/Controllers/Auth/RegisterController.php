<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses pendaftaran user
    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|in:user,admin', // Validasi role
        'password' => 'required|string|min:8|confirmed',
    ]);

    try {
        // Buat user baru
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect ke login setelah registrasi
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
        
    } catch (\Exception $e) {
        // Kalau gagal
        return redirect()->back()->with('error', 'Terjadi kesalahan saat registrasi.');
    }
}

}
