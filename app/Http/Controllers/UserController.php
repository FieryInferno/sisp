<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    return view('user.index', [
      'title'   => 'User',
      'active'  => 'user',
      'user'    => User::all(),
    ]);
  }

  public function create()
  {
    return view('user.form', [
      'title'   => 'User',
      'active'  => 'user',
      'mode'    => 'add',
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
    ]);

    User::create($request->all());

    return redirect('user')->with('success', 'Berhasil mendapatkan user');
  }
  
  public function edit(User $user)
  {
    $user['title']  = 'User';
    $user['active'] = 'user';
    $user['mode']   = 'edit';

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

    $user->update($request->all());

    return redirect('user')->with('success','Berhasil edit user.');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
