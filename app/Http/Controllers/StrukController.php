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
    $tanggal_awal = $request->query('tanggal_awal');
    $tanggal_akhir = $request->query('tanggal_akhir');
    $cabang       = $request->query('cabang');
    $struk        = DB::table('rekap');
    
    if ($tanggal_awal && $tanggal_akhir) {
      $struk  = $struk->whereBetween('created_at', [$tanggal_awal . ' 00:00:00', $tanggal_akhir . ' 23:59:59']);
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
  
  public function print(Request $request)
  {
    return view('struk.print', ['struk' => $request->struk]);
  }
}
