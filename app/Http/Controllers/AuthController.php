<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
{
    // Validasi input email dan password
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Jika login berhasil
    if (Auth::attempt($credentials, $request->remember)) {

        // Mengarahkan berdasarkan role pengguna
        if (Auth::user()->role === 'user') {
            return redirect()->route('user.profile');  // Arahkan ke halaman profil user
        } else {
            return redirect()->route('admin.dashboard');  // Jika role admin, arahkan ke dashboard admin
        }
    }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
            'role'     => 'user',                         // Default role "user"
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        $request->session()->invalidate();      // Hapus sesi
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect('/')->with('success', 'Anda berhasil logout.');
    }
}
