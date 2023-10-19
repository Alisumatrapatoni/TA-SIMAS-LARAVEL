<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login SIMAS SMKN 1 Kalianget</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('simas/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('simas/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('simas/login/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>
    @include('sweetalert::alert')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('simas/login/images/halaman-smk.jpg') }}');">
            <div class="wrap-login100">
                <form action="{{ route('login') }}" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-logo">
                        <img src="{{ asset('simas/login/images/smk.png') }}" width="120px" height="110px"
                            alt="">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="Username"
                            value="{{ old('username') }}">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="sign-in-btn">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('simas/login/js/main.js') }}"></script>
</body>
</html>
