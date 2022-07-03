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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
