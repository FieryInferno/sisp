<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use App\Models\Rekap;
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
  
  public function show(Rekap $rekap)
  {
    $rekap['title']  = 'Struk';
    $rekap['active'] = 'struk'; 
    return view('struk.detail', $rekap);
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
