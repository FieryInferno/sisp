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
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Awal" name="tanggal_awal">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal akhir</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Akhir" name="tanggal_akhir">
                  </div>
                  <div class="form-group">
                    <label>Cabang</label>
                    <select class="form-control select2" style="width: 100%;" name="cabang">
                      <option></option>
                      @foreach ($cabang as $key)
                        <option value="{{ $key->id }}">{{ $key->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <hr>
                <form action="{{ url('struk') }}" method="post">
                  @csrf
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
                                class="form-check-input"
                                type="checkbox"
                                name="struk[]"
                                value="{{ json_encode($key) }}"
                              >
                            </div>
                          </td>
                          <td>{{ $key->created_at }}</td>
                          <td>{{ $key->POREFN }}</td>
                          <td>{{ $key->nama_lokasi }}</td>
                          <td>{{ $key->PODESC }}</td>
                          <td>
                            <a class="btn btn-primary" href="{{ url('struk/' . $key->POREFN) }}">Detail</a>
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