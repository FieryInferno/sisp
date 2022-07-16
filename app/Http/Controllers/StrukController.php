<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class StrukController extends Controller
{
  public function index(Request $request)
  {
    $tanggal_awal = $request->query('tanggal_awal');
    $tanggal_akhir = $request->query('tanggal_akhir');
    $cabang       = $request->query('cabang');
    $struk        = DB::table('rekap');
    $type         = $request->query('type');
    
    if ($tanggal_awal && $tanggal_akhir) {
      $struk  = $struk->whereBetween('PODTPO', [$tanggal_awal . ' 00:00:00', $tanggal_akhir . ' 23:59:59']);
    }
    
    if ($cabang) {
      $struk  = $struk->where('id_lokasi', '=', $cabang);
    }

    if (auth()->user()->id_lokasi !== 'semua') {
      $struk->where('id_lokasi', '=', auth()->user()->id_lokasi);
    }

    if ($type) {
      switch ($type) {
        case 'pdf':
          $pdf = PDF::loadview('struk.excel', [
            'struk'     => $struk->orderBy('PODTPO', 'desc')->get(),
            'terbesar'  => $struk->max('NOMINAL'),
            'terkecil'  => $struk->min('NOMINAL'),
          ]);
          return $pdf->stream('rekap');
          break;
  
        case 'excel':
          return Excel::download(new RekapExport($struk), 'rekap.xlsx');
          break;
      }
    }

    return view('struk.index', [
      'struk'   => $struk->orderBy('PODTPO', 'desc')->get(),
      'title'   => 'Struk',
      'active'  => 'struk',
      'cabang'  => DB::table('lokasi')->get(),
      'tanggalAwal'   => $tanggal_awal,
      'tanggalAkhir'  => $tanggal_akhir,
      'valueCabang'   => $cabang,
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

  public function excel()
  {
    return Excel::download(new RekapExport, 'rekap.xlsx');
  }

  public function pdf()
  {
    $pdf = PDF::loadview('struk.excel', [
      'struk'     => DB::table('rekap')->get(),
      'terbesar'  => DB::table('rekap')->max('NOMINAL'),
      'terkecil'  => DB::table('rekap')->min('NOMINAL'),
    ]);
    return $pdf->stream('rekap');
  }
}
