@extends('layouts.app')
@section('content')
<main>
    <div class="container p-0 m-0" style='max-width:100%'>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="{{asset('/img/LOGOLOGIN.png')}}" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form action="{{route('registerr')}}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                      <label  class="form-label">Username</label>
                      <input type="text" name="username" value="{{old('username')}}" class="form-control" id="username" placeholder="isi dengan Username" required>
                      <div class="invalid-feedback">Please, enter your username!</div>
                    </div>

                    <div class="col-12">
                      <label  class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password" required>
                        <div class="input-group-append">
                          <span class="input-group-text" onclick="password_show_hide();">
                            <i class="bi bi-eye" id="show_eye"></i>
                            <i class="bi bi-eye-slash d-none" id="hide_eye"></i>
                          </span>
                        </div>
                        <div class="invalid-feedback">Please enter a valid password!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label  class="form-label">Password Confirmation</label>
                      <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="password_confirmation" required>
                        <div class="input-group-append">
                          <span class="input-group-text" onclick="password_show_hide2();">
                            <i class="bi bi-eye" id="show_eye2"></i>
                            <i class="bi bi-eye-slash d-none" id="hide_eye2"></i>
                          </span>
                        </div>
                      </div>
                      <div class="invalid-feedback">Please enter a valid password!</div>
                    </div>

                    <div class="col-12">
                     <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                        ↻
                        </button>
                      </div>
                    </div>
                    <div class="col-12">
                      <label  class="form-label">Jumlah</label>
                      <input type="text" name="captcha" value="{{old('captcha')}}" class="form-control" id="captcha" required>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Saya telah menyetujui <a href="#">syarat dan ketentuan</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <x-auth-validation-errors style="color:red ;" class="mb-4" :errors="$errors" />
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                  &copy; Copyright <strong></strong>All Rights Reserved
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@push('js')
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript">
  $('#reload').click(function () {  
    $.ajax({
      type: 'GET',
      url: "{{route('reloadCaptcha')}}",
      success: function (data) {
        $(".captcha span").html(data.captcha);
      }
    });
  });
  function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
          x.type = "text";
          show_eye.style.display = "none";
          hide_eye.style.display = "block";
        } else {
          x.type = "password";
          show_eye.style.display = "block";
          hide_eye.style.display = "none";
        }
      }
  function password_show_hide2() {
        var x = document.getElementById("password_confirmation");
        var show_eye = document.getElementById("show_eye2");
        var hide_eye = document.getElementById("hide_eye2");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
          x.type = "text";
          show_eye.style.display = "none";
          hide_eye.style.display = "block";
        } else {
          x.type = "password";
          show_eye.style.display = "block";
          hide_eye.style.display = "none";
        }
      }
</script>
  
@endpush
@endsection