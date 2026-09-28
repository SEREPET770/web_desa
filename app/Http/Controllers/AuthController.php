<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Opsional jika menggunakan Hash

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $username = strtolower(trim($credentials['username']));

        // Daftar user sementara sesuai dengan struktur data Anda sebelumnya
        $loginUsers = [
            'kepala_desa' => ['password' => 'kepala123', 'dashboardRole' => 'kepala-desa'],
            'super_admin' => ['password' => 'super123', 'dashboardRole' => 'super-admin'],
            'admin' => ['password' => 'admin123', 'dashboardRole' => 'admin'],
        ];

        $user = $loginUsers[$username] ?? null;

        // Gunakan perbandingan langsung (karena password di array berupa teks biasa)
        // Jangan menggunakan Hash::check jika password di array belum di-hash
        if ($user === null || !hash_equals($user['password'], $credentials['password'])) {
            return back()->withErrors(['username' => 'Username atau password tidak sesuai.'])->withInput();
        }

        // Regenerasi session & simpan data role
        $request->session()->regenerate();
        $request->session()->put('auth_role', $username);
        $request->session()->put('dashboard_role', $user['dashboardRole']);

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
=======
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function store(Request $request): RedirectResponse
  {
    $credentials = $request->validate([
      'username' => ['required', 'string'],
      'password' => ['required', 'string'],
    ], [
      'username.required' => 'Username wajib diisi.',
      'password.required' => 'Kata sandi wajib diisi.',
    ]);

    if (! Auth::attempt($credentials, $request->boolean('remember'))) {
      return back()
        ->withErrors(['username' => 'Username atau kata sandi tidak sesuai.'])
        ->onlyInput('username');
    }

    $request->session()->regenerate();

    return redirect()->intended('/')->with('login_success', 'Login berhasil.');
  }

  public function destroy(Request $request): RedirectResponse
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
  }
>>>>>>> origin/main
}
