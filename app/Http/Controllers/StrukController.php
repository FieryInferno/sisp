<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrukController extends Controller
{
  public function index()
  {
    return view('struk', [
      'struk'   => DB::table('rekap')->get(),
      'title'   => 'Struk',
      'active'  => 'struk'
    ]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function show(Struk $struk)
    {
        //
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
