<?php

namespace App\Http\Controllers;

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
}
