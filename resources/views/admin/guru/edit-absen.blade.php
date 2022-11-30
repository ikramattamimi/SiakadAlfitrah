@extends('template_backend.home')
@section('heading', 'Edit Absen Guru')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Guru</a></li>
    <li class="breadcrumb-item active">Edit Absen Guru</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Absen Guru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('absenguru.update.admin', Crypt::encrypt($absen->id)) }}" method="post">
                @csrf
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input id="tanggal" class="form-control" name="tanggal" type="date" value="{{ $absen->tanggal }}" required />
                            </div>
                            <div class="form-group">
                                <label for="id">Nama Guru</label>
                                <input type="text" id="nama_guru" name="nama_guru" value="{{ $absen->guru->nama_guru }}"
                                    class="form-control @error('nama_guru') is-invalid @enderror">
                                <input type="text" name="id" value="{{ $absen->guru->id }}"
                                    class="form-control @error('nama_guru') is-invalid @enderror" hidden>
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label for="kehadiran_id">Kehadiran</label>
                                <select id="kehadiran_id" name="kehadiran_id"
                                    class="select2bs4 form-control @error('kehadiran_id') is-invalid @enderror" required>
                                    <option value="{{ $absen->kehadiran->id }}" selected>{{ $absen->kehadiran->ket }}</option>
                                    <option value="">-- Pilih Status Kehadiran --</option>
                                    @foreach ($kehadiran as $data)
                                        <option value="{{ $data->id }}">{{ $data->ket }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/guru/absensi" name="kembali" class="btn btn-default" id="back"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Update</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('script')
    <script>
        $("#AbsensiGuru").addClass("active");
    </script>
@endsection
