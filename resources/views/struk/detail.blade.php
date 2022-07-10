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
              <div class="watermark-image"></div>
              <div class="d-flex justify-content-center mb-5">
                <h3><strong>Nomor Ref {{ $POREFN }}</strong></h3>
              </div>
              <table width="100%">
                <tr>
                  <td>Kode</td>
                  <td>:</td>
                  <td>{{ $POTRCO }}</td>
                  <td>Cab</td>
                  <td>:</td>
                  <td>{{ $nama_lokasi }}</td>
                </tr>
                <tr>
                  <td>Rek</td>
                  <td>:</td>
                  <td>{{ $PORECO }}</td>
                  <td>Tgl.</td>
                  <td>:</td>
                  <td>{{ substr($PODTPO, 0, 10) }}</td>
                </tr>
                <tr>
                  <td>Berita</td>
                  <td>:</td>
                  <td>{{ $PODESC }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nominal</td>
                  <td>:</td>
                  <td>{{ formatRupiah(round($NOMINAL, 0)) }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Terbilang</td>
                  <td>:</td>
                  <td>{{ terbilang((int) round($NOMINAL, 0)) }} rupiah</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td colspan="3">
                    <div>
                      {!! QrCode::size(125)->generate(
                        'nominal: ' . formatRupiah(round($NOMINAL, 0)) .
                        ',cabang: ' . $nama_lokasi .
                        ',tanggal: ' . substr($PODTPO, 0, 10) .
                        ',berita: ' . $PODESC
                      ); !!}
                    </div>
                  </td>
                </tr>
              </table>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <h2 class="d-flex justify-content-center">
                <strong>Terima Kasih</strong>  
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection