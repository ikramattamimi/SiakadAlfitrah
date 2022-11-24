@extends('template_backend.home')
@section('heading', 'Data User')
@section('page')
    <li class="breadcrumb-item active">Data User</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-user">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data User
                    </button>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Level User</th>
                            <th>Jumlah User</th>
                            <th>Lihat User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $role => $data)
                            <tr>
                                <td>{{ $role }}</td>
                                <td>{{ $data->count() }}</td>
                                <td>
                                    <a href="{{ route('user.show', Crypt::encrypt($role)) }}" class="btn btn-info btn-sm"><i
                                            class="nav-icon fas fa-search-plus"></i> &nbsp; Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-md tambah-user" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="text" placeholder="{{ __('E-Mail Address') }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Level User --}}
                                <div class="form-group">
                                    <label for="role">Level User</label>
                                    <select id="role" type="text"
                                        class="form-control @error('role') is-invalid @enderror select2bs4" name="role"
                                        value="{{ old('role') }}" autocomplete="role" required>
                                        <option value="">-- Select {{ __('Level User') }} --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Operator">Operator</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Siswa">Siswa</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Nama Berdasarkan Level User Guru --}}
                                <div id="user-guru" class="form-group d-none">
                                    <label for="id_guru">Nama Guru</label>
                                    <select id="id_guru" type="text" class="form-control select2bs4" name="id_guru">
                                        <option value="">-- Select Nama Guru --</option>
                                        @foreach ($guru as $item)
                                            <option value={{ $item->id }}>
                                                <p>
                                                    {{ $item->nip }}
                                                </p>
                                                <p>
                                                    {{ $item->nama_guru }}
                                                </p>
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Nama Berdasarkan Level User Siswa --}}
                                <div id="user-siswa" class="form-group d-none">
                                    <label for="id_siswa">Nama Siswa</label>
                                    <select id="id_siswa" type="text" class="form-control select2bs4" name="no_induk">
                                        <option value="">-- Select Nama Siswa --</option>
                                        @foreach ($siswa as $item)
                                            <option value={{ $item->no_induk }}>
                                              <p>{{ $item->no_induk }}</p>
                                              {{ $item->nama_siswa }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Nama Berdasarkan Level User Admin --}}
                                <div id="user-admin" class="form-group d-none">
                                    <label for="name">Nama</label>
                                    <input id="name" type="text" class="form-control" name="name" />
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Nama Berdasarkan Level User Guru --}}
                                {{-- <div id="apapun" class="form-group d-none">
                                    <label for="id_guru">Nama Guru</label>
                                    <select id="id_guru" type="text" class="form-control select2bs4" name="id_guru">
                                        <option value="">-- Select Nama Guru --</option>
                                        @foreach ($guru as $item)
                                            <option value={{ $item->id }}>{{ $item->nama_guru }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}


                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" placeholder="{{ __('Password') }}"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password"
                                        placeholder="{{ __('Confirm Password') }}"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password_confirmation" autocomplete="new-password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                            class='nav-icon fas fa-arrow-left'></i>
                        &nbsp; Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#role').change(function() {
                var kel = $('#role option:selected').val();
                if (kel == "Guru") {
                    $("#user-guru").removeClass("d-none");
                    $("#user-siswa").addClass("d-none");
                } else if (kel == "Siswa") {
                    $("#user-siswa").removeClass("d-none");
                    $("#user-guru").addClass("d-none");
                } else {
                    $("#user-admin").removeClass("d-none");
                    $("#user-siswa").addClass("d-none");
                    $("#user-guru").addClass("d-none");
                }
                // else if (kel == "Siswa") {
                //     $("#noId").html(
                //         `<label for="nomer">Nomer Induk Siswa</label><input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="off">`
                //     );
                // } else if (kel == "Admin" || kel == "Operator") {
                //     $("#noId").html(
                //         `<label for="name">Username</label><input id="name" type="text" placeholder="Username" class="form-control" name="name" autocomplete="off">`
                //     );
                // } else {
                //     $("#noId").html("")
                // }
            });
        });

        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataUser").addClass("active");
    </script>
@endsection
