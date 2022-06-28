@extends('template')
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('images') }}/kop.PNG" alt="" style="width: 100%;">
              <div class="d-flex justify-content-center mb-5">
                <h3><strong>Nomor Ref 0012345</strong></h3>
              </div>
              <div class="row">
                <div class="col-xl-6">Kode : 1000</div>
                <div class="col-xl-6">Cab : Jakarta</div>
              </div>
              <div class="row">
                <div class="col-xl-6">Rek : 123</div>
                <div class="col-xl-6">Tgl : 2022-06-02</div>
              </div>
              <div>Berita : Pemasangan Router</div>
              <div>Nominal : Rp. 250.000</div>
              <div>Terbilang : Dua ratus lima puluh ribu rupiah</div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection