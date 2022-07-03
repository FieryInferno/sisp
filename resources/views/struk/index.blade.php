@extends('template')
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a class="btn btn-success" href="{{ url('struk/create') }}">Tambah</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
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
                        <td>{{ $no++ }}</td>
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
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection