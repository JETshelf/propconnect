@extends('layouts.auth.index')

@section('css_scripts')
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{ asset('assets/images/login.jpg') }})"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form action="{{ route('password.change') }}" method="POST" class="form">

                    @csrf
                    @include('layouts.portal.alerts_block')

                    <div class="header">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                        </div>
                        <h5>Reset Password</h5>
                    </div>
                    <div class="content">
                        <input type="hidden" class="form-control h-45px fs-13px @error('token') is-invalid @enderror" name="token" id="token" value="{{ $token }}" placeholder="Token" />
                        <div class="input-group">
                            <input type="email" class="form-control text-danger @error('email') is-invalid @enderror"
                                name="email" id="email" value="{{ $email }}" placeholder="Enter email" readonly />

                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                            @error('email')
                                <div class="invalid-feedback text-bold" style="color: #fff;">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" value="{{ old('password') }}" placeholder="Password" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                            @error('password')
                                <div class="invalid-feedback text-bold" style="color: #fff;">{{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}" placeholder="Confirm Password" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                            @error('confirm_password')
                                <div class="invalid-feedback text-bold" style="color: #fff;">{{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block ">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector(".password-toggle i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
