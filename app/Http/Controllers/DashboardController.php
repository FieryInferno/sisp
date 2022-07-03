<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
    $pendapatan = 0;
    $rekap      = DB::table('rekap')->whereMonth('created_at', date('m', strtotime('-1 months')))->whereYear('created_at', date('Y', strtotime('-1 months')))->get();

    foreach ($rekap as $key) {
      $pendapatan += $key->NOMINAL;
    }

    return view('dashboard', [
      'title'       => 'Dashboard',
      'active'      => 'dashboard',
      'penjualan'   => DB::table('rekap')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count(),
      'pendapatan'  => $pendapatan,
    ]);
  }
}
