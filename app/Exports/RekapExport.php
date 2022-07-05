<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapExport implements FromView, ShouldAutoSize
{
  protected $struk;

  public function __construct($struk)
  {
      $this->struk = $struk;
  }
  public function view(): View
  {
    return view('struk.excel', [
      'struk'     => $this->struk->get(),
      'terbesar'  => $this->struk->max('NOMINAL'),
      'terkecil'  => $this->struk->min('NOMINAL'),
    ]);
  }
}
