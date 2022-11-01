
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Akademik | Al-Fitrah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="shrotcut icon" href="{{ asset('img/alfitrah.jpg') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  <script src="jquery.js"></script>
</head>
<body class="hold-transition login-page bg">
  <div class="login-box">
    {{-- <div class="login-logo">
      <img src="{{ asset('img/alfitrah.jpg') }}" width="100px" alt="">
    </div> --}}

    <div class="login-logo" style="color: white;">
      @yield('page')
    </div>

    <div class="card cardField">
      @yield('content')
    </div>

    {{-- <footer style="color: white;">
      <p class="text-center">Copyright &copy; 2022 SMPIT Al Fitrah</a>. </p>
    </footer> --}}
  </div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- page script -->
<script>
  $(document).ready(function(){
      $('#role').change(function(){
          var kel = $('#role option:selected').val();
          if (kel == "Guru") {
            $("#noId").addClass("mb-3");
            $("#noId").html(`
              <input id="nomer" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control @error('nomer') is-invalid @enderror" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
              `);
            $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
          } else if(kel == "Siswa") {
            $("#noId").addClass("mb-3");
            $("#noId").html(`
              <input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            `);
            $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
          } else {
            $('#noId').removeClass("mb-3");
            $('#noId').html('');
          }
      });
  });
  function inputAngka(e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
    return true;
  }
</script>
@yield('script')

@error('id')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Guru SMPIT Al Fitrah!");
  </script>
@enderror
@error('guru')
  <script>
    toastr.error("Maaf Guru ini sudah terdaftar sebagai User!");
  </script>
@enderror
@error('no_induk')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Siswa SMPIT Al Fitrah!");
  </script>
@enderror
@error('siswa')
  <script>
    toastr.error("Maaf Siswa ini sudah terdaftar sebagai User!");
  </script>
@enderror
@if (session('status'))
  <script>
    toastr.success("{{ Session('success') }}");
  </script>
@endif
@if (Session::has('error'))
    <script>
        toastr.error("{{ Session('error') }}");
    </script>
@endif

</body>
</html>
