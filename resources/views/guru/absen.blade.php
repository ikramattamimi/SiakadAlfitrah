@extends('template_backend.home')
@section('heading', 'Absen Guru')
@section('heading')
  Absen Guru {{ Auth::user()->guru(Auth::user()->id)->nama_guru }}
@endsection
@section('page')
  <li class="breadcrumb-item active">Absen Guru</li>
@endsection
@section('content')
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table id="example2" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>Hari</th>
              <th>Kelas</th>
              <th>Jam Mengajar</th>
              <th>Ruang Kelas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jadwal as $data)
              <tr>
                <td>{{ $data->hari->nama_hari }}</td>
                <td>{{ $data->kelas->nama_kelas }}</td>
                <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                <td>{{ $data->ruang->nama_ruang }}</td>
                <td>
                  <form action="{{ route('absen.simpan') }}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{ Auth::user()->id_guru }}" hidden>
                    <input type="text" name="kehadiran_id" value="1" hidden>
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                      Absen</button>

                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
@endsection
@section('script')
  <script>
    $("#AbsenGuru").addClass("active");
  </script>
@endsection
