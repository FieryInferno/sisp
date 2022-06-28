@extends('template')
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button class="btn btn-success">Tambah</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Ref</th>
                      <th>Cabang</th>
                      <th>Desc</th>
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
                          <button class="btn btn-warning">PDF</button>
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