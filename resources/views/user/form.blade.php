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
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ url($mode === 'add' ? 'user' : 'user/' . $id) }}" method="POST">
              @csrf
              {{ $mode === 'edit' ? method_field('PUT') : '' }}
              <div class="card-body">
                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control select2" style="width: 100%;" name="level">
                    <option></option>
                    <option value="admin" <?= $mode === 'edit' && $level === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?= $mode === 'edit' && $level === 'user' ? 'selected' : ''; ?>>User</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>NIP</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="NIP"
                    name="nip"
                    value="<?= $mode === 'edit' ? $nip : '' ; ?>"
                  >
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Nama Lengkap"
                    name="nama_lengkap"
                    value="<?= $mode === 'edit' ? $nama_lengkap : '' ; ?>"
                  >
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Username"
                    name="username"
                    value="<?= $mode === 'edit' ? $username : '' ; ?>"
                  >
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Password"
                    name="password"
                  >
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    name="email"
                    value="<?= $mode === 'edit' ? $email : '' ; ?>"
                  >
                </div>
                <div class="form-group">
                  <label>No. Hape</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="No. Hape"
                    name="no_hp"
                    value="<?= $mode === 'edit' ? $no_hp : '' ; ?>"
                  >
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea
                    name="alamat"
                    cols="30"
                    rows="10"
                    class="form-control"
                  ><?= $mode === 'edit' ? $alamat : '' ; ?></textarea>
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