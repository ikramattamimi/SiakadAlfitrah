@extends('template_backend.home')
@section('heading', 'Absen Harian Guru')
@section('page')
  <li class="breadcrumb-item active">Absen Harian guru</li>
@endsection
@section('content')
  @php
    $no = 1;
  @endphp
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header" style="background-color: #0F4C81">
        <h3 class="card-title text-light">Absen Harian Guru</h3>
      </div>
      <form action="{{ route('absen.simpan') }}" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
            {{-- <label for="id">Nomor ID Card</label> --}}
            <input type="text" id="id" name="id" value="{{ Auth::user()->id_guru }}" hidden maxlength="5"
            onkeypress="return" class="form-control @error('id') is-invalid @enderror">
          </div>
          <div class="form-group">
            <label for="kehadiran_id">Keterangan Kehadiran</label>
            <select id="kehadiran_id" type="text"
            class="form-control @error('kehadiran_id') is-invalid @enderror select2bs4" name="kehadiran_id">
            <option value="">-- Pilih Keterangan Kehadiran --</option>
            @foreach ($kehadiran as $data)
            <option value="{{ $data->id }}">{{ $data->ket }}</option>
            @endforeach
            </select>
          </div>
          {{-- <div>
            <table class="table table-bordered table-striped table-hover">
              @foreach ($absen as $data)
              <tr>
                <td>{{ $data->kehadiran->ket }}</td>
                <td>{{ $data->created_at->format('H:i:s') }}</td>
              </tr>
              @endforeach
            </table>
          </div> --}}
          <div class="d-flex align-items-end flex-column">

            <button name="submit" class="btn btn-primary "><i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Absen</button>
          </div>
        </div>
        {{-- <div class="card-footer">
          
        </div> --}}
      </form>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Guru</th>
              <th>Ket.</th>
              <th width="80px">Jam Absen</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($absen as $data)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->guru->nama_guru }}</td>
                <td>{{ $data->kehadiran->ket }}</td>
                <td>{{ $data->created_at->format('H:i:s') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection
@section('script')
  <script>
    $("#AbsenGuru").addClass("active");
  </script>
@endsection
