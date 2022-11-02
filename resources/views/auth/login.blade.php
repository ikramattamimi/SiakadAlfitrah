@extends('layouts.app')
@section('content')
    <div class="card-body login-card-body">
        <h3 class="login-box-msg text-dark font-weight-bold">Selamat Datang</h3>
        <p class="login-box-msg text-dark font-weight-light subMsg">SMPIT AL-FITRAH BANDUNG</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group p-3">
                <label for="username">Username</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Masukkan Username') }}" name="email" value="{{ old('email') }}"
                    autocomplete="off" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group p-3" style="margin-top: -40px">
                <label for="password">Password</label>
                <input id="password" type="password" placeholder="{{ __('Masukkan Password') }}"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="current-password">
                <span class="show-hide ">
                  <i class='fas fa-eye'></i>
                </span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row p-3">
                {{-- <div class="col-7">
          <div class="icheck-primary">
            <input type="checkbox" id="remember" class="form-check-input" type="checkbox" name="remember"
              {{ old('remember') ? 'checked' : '' }} disabled>
            <label for="remember">
              {{ __('Ingat Saya') }}
            </label>
          </div>
        </div> --}}
                <!-- /.col -->
                {{-- <div class="col-5"> --}}
                <button type="submit" id="btn-login" class="btn btn-block buttonLogin">{{ __('Login') }} &nbsp;</button>
                {{-- </div> --}}
                <!-- /.col -->
            </div>
        </form>

        {{-- <p class="mb-1">
      @if (Route::has('password.request'))
        <a class="text-center" href="{{ route('password.request') }}">
          {{ __('Lupa Password?') }}
        </a>
      @endif
    </p> --}}
        {{-- <p class="mb-0">
      <a class="text-center" href="{{ route('register') }}">Buat Akun Baru</a>
    </p> --}}
    </div>
@endsection
@section('script')
<script>
  const password1 = document.getElementById("password");
  const btn_show = document.querySelector("i");
  btn_show.addEventListener("click", function(){
    if(password1.type === "password"){
      password1.type = "text";
      btn_show.classList.add("hide");
    } else{
      password1.type = "password";
      btn_show.classList.remove("hide");
    }
  })
</script>
    <script>
        $("#email").keyup(function() {
            var email = $("#email").val();

            if (email.length >= 5) {
                $.ajax({
                    type: "GET",
                    data: {
                        email: email
                    },
                    dataType: "JSON",
                    url: "{{ url('/login/cek_email/json') }}",
                    success: function(data) {
                        if (data.success) {
                            $("#email").removeClass("is-invalid");
                            $("#email").addClass("is-valid");
                            $("#password").val('');
                            $("#password").removeAttr("disabled", "disabled");
                        } else {
                            $("#email").removeClass("is-valid");
                            $("#email").addClass("is-invalid");
                            $("#password").val('');
                            $("#password").attr("disabled", "disabled");
                            $("#remember").attr("disabled", "disabled");
                            $("#btn-login").attr("disabled", "disabled");
                        }
                    },
                    error: function() {}
                });
            } else {
                $("#email").removeClass("is-valid");
                $("#email").removeClass("is-invalid");
                $("#password").val('');
                $("#password").attr("disabled", "disabled");
                $("#remember").attr("disabled", "disabled");
                $("#btn-login").attr("disabled", "disabled");
            }
        });

        $("#password").keyup(function() {
            var email = $("#email").val();
            var password = $("#password").val();

            if (password.length >= 8) {
                $.ajax({
                    type: "GET",
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: "JSON",
                    url: "{{ url('/login/cek_password/json') }}",
                    success: function(data) {
                        if (data.success) {
                            $("#password").removeClass("is-invalid");
                            $("#password").addClass("is-valid");
                            $("#remember").removeAttr("disabled", "disabled");
                            $("#btn-login").removeAttr("disabled", "disabled");
                        } else {
                            $("#password").removeClass("is-valid");
                            $("#password").addClass("is-invalid");
                            $("#remember").attr("disabled", "disabled");
                            $("#btn-login").attr("disabled", "disabled");
                        }
                    },
                    error: function() {}
                });
            } else {
                $("#password").removeClass("is-valid");
                $("#password").removeClass("is-invalid");
                $("#remember").attr("disabled", "disabled");
                $("#btn-login").attr("disabled", "disabled");
            }
        });
    </script>
@endsection
