@extends('template')
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
              <?php
                if (auth()->user()->level === 'admin') { ?>
                  <div class="card-header">
                    <a class="btn btn-success" href="{{ url('struk/create') }}">Tambah</a>
                  </div>
                <?php }
              ?>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif
                <form action="" method="get" class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Awal</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Awal" name="tanggal_awal" value="{{ $tanggalAwal }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal akhir</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Akhir" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                  </div>
                  <div class="form-group">
                    <label>Cabang</label>
                    <select class="form-control select2" style="width: 100%;" name="cabang" value="{{ $valueCabang }}">
                      <option></option>
                      @foreach ($cabang as $key)
                        <option value="{{ $key->id }}">{{ $key->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-primary" value="excel" name="type">Excel</button>
                  <button type="submit" class="btn btn-primary" value="pdf" name="type">PDF</button>
                </form>
                <hr>
                <form action="{{ url('struk') }}" method="post">
                  @csrf
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" onclick="checkAll(this)">
                    <label class="form-check-label" for="defaultCheck1">
                      Pilih semua
                    </label>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Struk</button>
                  <br>
                  <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Ref</th>
                        <th>Cabang</th>
                        <th>Berita</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach ($struk as $key)
                        <tr>
                          <td>
                            <div class="form-check">
                              <input
                                class="form-check-input checkStruk"
                                type="checkbox"
                                name="struk[]"
                                value="{{ json_encode($key) }}"
                              >
                            </div>
                          </td>
                          <td>{{ $key->PODTPO }}</td>
                          <td>{{ $key->POREFN }}</td>
                          <td>{{ $key->nama_lokasi }}</td>
                          <td>{{ $key->PODESC }}</td>
                          <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $key->POREFN }}">
                              Detail
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $key->POREFN }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Struk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
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
                                        <td>{{ substr($key->PODTPO, 0, 10) }}</td>
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
                                              ',tanggal: ' . substr($key->PODTPO, 0, 10) .
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
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection