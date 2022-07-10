<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
    $pendapatan             = 0;
    $pendapatanHariIni      = 0;
    $pendapatan7Hari        = 0;
    $pendapatanBulanIni     = 0;
    $rekap                  = DB::table('rekap');
    $rekapPendapatan        = DB::table('rekap')->whereMonth('PODTPO', date('m', strtotime('-1 months')))->whereYear('PODTPO', date('Y', strtotime('-1 months')))->get();
    $rekapPendapatanHariIni = DB::table('rekap')->whereDay('PODTPO', date('d'))->whereMonth('PODTPO', date('m'))->whereYear('PODTPO', date('Y'))->get();
    $rekapPendapatan7Hari   = DB::table('rekap')
      ->whereBetween('PODTPO', [date('d', strtotime('-1 week')), date('d')])
      ->whereMonth('PODTPO', date('m'))
      ->whereYear('PODTPO', date('Y'))
      ->get();
    $rekapPendapatanBulanIni  = DB::table('rekap')->whereMonth('PODTPO', date('m'))->whereYear('PODTPO', date('Y'))->get();

    foreach ($rekapPendapatan as $key) {
      $pendapatan += $key->NOMINAL;
    }
    
    foreach ($rekapPendapatanHariIni as $key) {
      $pendapatanHariIni  += $key->NOMINAL;
    }
    
    foreach ($rekapPendapatan7Hari as $key) {
      $pendapatan7Hari  += $key->NOMINAL;
    }
    
    foreach ($rekapPendapatanBulanIni as $key) {
      $pendapatanBulanIni  += $key->NOMINAL;
    }

    return view('dashboard', [
      'title'               => 'Dashboard',
      'active'              => 'dashboard',
      'penjualan'           => DB::table('rekap')->whereMonth('PODTPO', date('m'))->whereYear('PODTPO', date('Y'))->count(),
      'pendapatan'          => $pendapatan,
      'pendapatanHariIni'   => $pendapatanHariIni,
      'pendapatan7Hari'     => $pendapatan7Hari,
      'pendapatanBulanIni'  => $pendapatanBulanIni,
    ]);
  }
}
