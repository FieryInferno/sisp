@extends('template')
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="alert alert-info">
            <div class="row d-flex justify-content-center">
              <div>
                <h3>
                  @if ((date('H') + 7) >= 1 && (date('H') + 7) <= 4)
                    Selamat Malam
                  @elseif ((date('H') + 7) >= 5 && (date('H') + 7) <= 11)
                    Selamat Pagi
                  @elseif ((date('H') + 7) > 11 && (date('H') + 7) <= 15)
                    Selamat Siang
                  @elseif ((date('H') + 7) > 15 && (date('H') + 7) <= 17)
                    Selamat Sore
                  @else
                    Selamat Malam
                  @endif
                  {{ auth()->user()->name }}
                </h3>
              </div>
            </div>
            <div class="row d-flex justify-content-center">
              <div>
                <h3 id="jam"></h3>
              </div>
            </div>
          </div>
          @if (((strtotime('now') + 25200) - strtotime(auth()->user()->update_password)) >= 86400)
            <div class="alert alert-danger">Ganti password <a href="{{ url('ganti_password') }}">disini</a></div>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="row">
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $penjualan }}</h3>
                  <p>Penjualan Bulan Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ formatRupiah(round($pendapatan, 0)) }}</h3>
                  <p>Pendapatan Bulan Lalu</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ formatRupiah(round($pendapatanHariIni, 0)) }}</h3>
                  <p>Pendapatan Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ formatRupiah(round($pendapatan7Hari, 0)) }}</h3>
                  <p>Pendapatan 7 Hari Terakhir</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ formatRupiah(round($pendapatanBulanIni, 0)) }}</h3>
                  <p>Pendapatan Bulan Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <div id="calendar" style="width: 100%"></div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection