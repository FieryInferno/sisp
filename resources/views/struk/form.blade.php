@extends('template')
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <!-- form start -->
            <form action="{{ url('struk/store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Ref</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nomor Ref" name="nomor_ref">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kode" name="kode">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rek</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Rek" name="rek">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Berita</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Berita" name="berita">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nominal</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nominal" name="nominal">
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
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection