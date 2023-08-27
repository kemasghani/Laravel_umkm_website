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
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>

                                <form action="{{route('login')}}" method="POST" class="row g-3 needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                placeholder="Username" required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Password</label>
                                        <div class="input-group mb-3">
                                            <input name="password" type="password" value="" class="input form-control"
                                                id="password" placeholder="Password" required="true"
                                                aria-label="password" aria-describedby="basic-addon1" />
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <!-- Session Status -->
                                        <x-auth-session-status style="color: red;" class="mb-4"
                                            :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors-login style="color: red;" class="mb-4"
                                            :errors="$errors" />
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Belum punya akun ? <a href="{{ route('register') }}">Buat
                                                Akun</a></p>
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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@endsection

@push('js')
<script>
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
</script>
@endpush