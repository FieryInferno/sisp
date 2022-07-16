<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function index()
  {
    $user = User::all();

    for ($i=0; $i < count($user); $i++) {
      $user[$i]->lokasi = DB::table('lokasi')->where('id', '=', $user[$i]->id_lokasi)->first();
    }
    
    return view('user.index', [
      'title'   => 'User',
      'active'  => 'user',
      'user'    => $user,
    ]);
  }

  public function create()
  {
    return view('user.form', [
      'title'   => 'User',
      'active'  => 'user',
      'mode'    => 'add',
      'lokasi'  => DB::table('lokasi')->get(),
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama_lengkap'  => 'required',
      'nip'           => 'required',
      'level'         => 'required',
      'username'      => 'required',
      'password'      => 'required',
      'email'         => 'required',
      'no_hp'         => 'required',
      'alamat'        => 'required',
      'id_lokasi'     => 'required',
    ]);

    $data             = $request->all();
    $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    
    User::create($data);

    return redirect('user')->with('success', 'Berhasil mendapatkan user');
  }
  
  public function edit(User $user)
  {
    $user['title']  = 'User';
    $user['active'] = 'user';
    $user['mode']   = 'edit';
    $user['lokasi'] = DB::table('lokasi')->get();

    return view('user.form', $user);
  }

  public function update(Request $request, User $user)
  {
    $request->validate([
      'nama_lengkap'  => 'required',
      'nip'           => 'required',
      'level'         => 'required',
      'username'      => 'required',
      'email'         => 'required',
      'no_hp'         => 'required',
      'alamat'        => 'required',
    ]);

    $data             = $request->all();

    if ($request->password) $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);

    $user->update($data);

    return redirect('user')->with('success','Berhasil edit user.');
  }
  
  public function destroy(User $user)
  {
    $user->delete();

    return redirect('user')->with('success','Berhasil hapus user.');
  }
}
