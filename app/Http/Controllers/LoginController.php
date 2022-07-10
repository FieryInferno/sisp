<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail; 
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\DB;

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

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }

  public function lupaPassword()
  {
    return view('lupaPassword');
  }

  public function sendEmail(Request $request)
  {
    $request->validate(['email' => ['required']]);

    if (DB::table('users')->where('email', '=', $request->email)->first()) {
      Mail::to($request->email)->send(new ForgotPasswordEmail($request->email));
      return redirect('/')->with('success', 'Berhasi mengirim email');
    } else {
      return redirect()->back()->with('failed', 'Email tidak ditemukan');
    }
  }

  public function passwordBaru(Request $request)
  {
    return view('passwordBaru', ['email' => $request->get('email')]);
  }

  public function changePassword(Request $request)
  {
    $request->validate(['password' => ['required']]);

    DB::table('users')
      ->where('email', $request->email)
      ->update(['password' => password_hash($request->password, PASSWORD_DEFAULT)]);

    return redirect('/')->with('success', 'Berhasil ganti password');
  }
}
