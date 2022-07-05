<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapExport implements FromView, ShouldAutoSize
{
  public function view(): View
  {
    return view('struk.excel', [
      'struk'     => DB::table('rekap')->get(),
      'terbesar'  => DB::table('rekap')->max('NOMINAL'),
      'terkecil'  => DB::table('rekap')->min('NOMINAL'),
    ]);
  }
}
