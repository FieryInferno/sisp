<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrukController extends Controller
{
  public function index(Request $request)
  {
    // dd($request->query('tanggal_awal'));s
    $tanggal_awal = $request->query('tanggal_awal');
    $tanggal_akhir = $request->query('tanggal_akhir');
    $cabang       = $request->query('cabang');
    $struk        = DB::table('rekap');
    
    if ($tanggal_awal && $tanggal_akhir) {
      $struk  = $struk->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir]);
    }
    
    if ($cabang) {
      $struk  = $struk->where('id_lokasi', '=', $cabang);
    }

    return view('struk.index', [
      'struk'   => $struk->get(),
      'title'   => 'Struk',
      'active'  => 'struk',
      'cabang'  => DB::table('lokasi')->get(),
    ]);
  }
  
  public function create()
  {
    return view('struk.form', [
      'title'   => 'Struk',
      'active'  => 'struk',
      'cabang'  => DB::table('lokasi')->get(),
    ]);
  }
  
  public function store(Request $request)
  {
    // dd($request);
    DB::table('penawaran')->insert([
      'POREFN'    => $request->nomor_ref,
      'POTRCO'    => $request->kode,
      'PORECO'    => $request->rek,
      'PODESC'    => $request->berita,
      'NOMINAL'   => $request->nominal,
      'lokasi_id' => $request->cabang
    ]);

    return redirect('struk')->with('success', 'Berhasil menambah struk');
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
