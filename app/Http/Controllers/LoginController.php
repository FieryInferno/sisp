<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index(Request $request)
  {
    $credentials = $request->validate([
      'username'  => ['required'],
      'password'  => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('dashboard');
    }

    return back()->withErrors([
      'username'  => 'The provided credentials do not match our records.',
    ])->onlyInput('username');
  }
}
