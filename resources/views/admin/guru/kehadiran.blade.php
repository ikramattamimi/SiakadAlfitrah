@extends('template_backend.home')
@section('heading', 'Absensi Guru')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('guru.absensi') }}">Absensi guru</a></li>
    {{-- <li class="breadcrumb-item active">{{ $guru->nama_guru }}</li> --}}
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header">
            <a href="{{ route('guru.index') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div> --}}
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                        data-target=".bd-example-modal-lg">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Absensi Guru
                    </button>
                    <a href="{{ route('guru.absensi.export') }}" class="btn btn-success btn-sm my-3" target="_blank"><i
                            class="nav-icon fas fa-file-export"></i> &nbsp; EXPORT EXCEL</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                        <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                    </button>
                </h3>
            </div>
            <div class="modal fade" id="dropTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('guru.absensi.deleteAll') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk menghapus semua data?
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Drop</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Absensi Guru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('absenguru.simpan.admin') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input id="tanggal" class="form-control" name="tanggal" type="date"
                                                required />
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Nama Guru</label>
                                            <select id="id" name="id"
                                                class="select2bs4 form-control @error('id') is-invalid @enderror" required>
                                                <option value="">-- Pilih Guru --</option>
                                                @foreach ($guru as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="kehadiran_id">Kehadiran</label>
                                            <select id="kehadiran_id" name="kehadiran_id"
                                                class="select2bs4 form-control @error('kehadiran_id') is-invalid @enderror"
                                                required>
                                                <option value="">-- Pilih Status Kehadiran --</option>
                                                @foreach ($kehadiran as $data)
                                                    <option value="{{ $data->id }}">{{ $data->ket }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                    class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                                Tambahkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absen as $index => $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('l, d F Y', strtotime($data->tanggal)) }}</td>
                                <td>{{ $data->guru->nip }}</td>
                                <td>{{ $data->guru->nama_guru }}</td>
                                <td>{{ $data->kehadiran->ket }}</td>
                                <td>
                                    <a href="{{ route('absenguru.edit.admin', Crypt::encrypt($data->id)) }}"
                                        class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp;
                                        Edit</a>
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
        $("#AbsensiGuru").addClass("active");
    </script>
@endsection
