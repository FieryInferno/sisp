<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrukController extends Controller
{
  public function index()
  {
    return view('struk.index', [
      'struk'   => DB::table('rekap')->get(),
      'title'   => 'Struk',
      'active'  => 'struk'
    ]);
  }
  
  public function create()
  {
      //
  }
  
  public function store(Request $request)
  {
      //
  }
  
  public function show($porefn)
  {
    $data           = DB::table('rekap')->where('POREFN', '=', $porefn)->get();
    $data['title']  = 'Struk';
    $data['active'] = 'struk'; 
    return view('struk.detail', $data);
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function edit(Struk $struk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struk $struk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struk $struk)
    {
        //
    }
}
