<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISP |  title </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist') }}/css/adminlte.min.css">
  <style>
    .watermark-image {
      content: "";
      background:url("{{ asset('images/watermark.jpeg') }}");
      opacity: 0.1;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      position: absolute;
      margin-top: 20%;
    }
  </style>
</head>
<body>
  @foreach ($struk as $key)
    <?php $key  = json_decode($key); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('images') }}/kop.PNG" alt="" style="width: 100%;">
              <div class="watermark-image"></div>
              <div class="d-flex justify-content-center mb-5">
                <h3><strong>Nomor Ref {{ $key->POREFN }}</strong></h3>
              </div>
              <table width="100%">
                <tr>
                  <td>Kode</td>
                  <td>:</td>
                  <td>{{ $key->POTRCO }}</td>
                  <td>Cab</td>
                  <td>:</td>
                  <td>{{ $key->nama_lokasi }}</td>
                </tr>
                <tr>
                  <td>Rek</td>
                  <td>:</td>
                  <td>{{ $key->PORECO }}</td>
                  <td>Tgl.</td>
                  <td>:</td>
                  <td>{{ substr($key->created_at, 0, 10) }}</td>
                </tr>
                <tr>
                  <td>Berita</td>
                  <td>:</td>
                  <td>{{ $key->PODESC }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nominal</td>
                  <td>:</td>
                  <td>{{ formatRupiah(round($key->NOMINAL, 0)) }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Terbilang</td>
                  <td>:</td>
                  <td>{{ terbilang((int) round($key->NOMINAL, 0)) }} rupiah</td>
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
                        'nominal: ' . formatRupiah(round($key->NOMINAL, 0)) .
                        ',cabang: ' . $key->nama_lokasi .
                        ',tanggal: ' . substr($key->created_at, 0, 10) .
                        ',berita: ' . $key->PODESC
                      ); !!}
                    </div>
                  </td>
                </tr>
              </table>
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
    </div>
  @endforeach
  <script>
    window.print();
  </script>
</body>
</html>
