<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/pnb-logo.png')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .login100-form-logo {
            transition: transform 1.9s ease;
        }

        .login100-form-logo:hover {
            animation: shake-grow 1.5s ease-in-out infinite;
        }

        @keyframes shake-grow {
            0% {
                transform: scale(1.3) translateX(0);
            }

            25% {
                transform: scale(1.3) translateX(-5px);
            }

            50% {
                transform: scale(1.3) translateX(5px);
            }

            75% {
                transform: scale(1.3) translateX(-5px);
            }

            100% {
                transform: scale(1.3) translateX(0);
            }
        }
    </style>




    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/img/ai.jpg');">
            <div class="wrap-login100">
                @if($errors->has('login'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ $errors->first('login') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: gray;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-logo mb-3 mt-3">
                        <!-- <i class="zmdi zmdi-landscape"></i> -->
                        <img src="{{ asset('assets/img/pnb-logo.png')}}" width="166" height="136" alt="logo">
                    </span>

                    <span class="login100-form-title p-b-15 p-t-30">
                        Log In
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @error('username')
                        <small class="text-danger">{{ $message == 'The username field is required.' ? 'Kolom username tidak boleh kosong' : $message }}</small>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @error('password')
                        <small class="text-danger">{{ $message == 'The password field is required.' ? 'Kolom password tidak boleh kosong' : $message }}</small>
                        @enderror
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <!-- <a class="txt1" href="">
                            Forgot Password?
                        </a><br> -->
                        <a class="txt1" href="{{ route('register') }}">
                            Belum Memiliki Akun?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>