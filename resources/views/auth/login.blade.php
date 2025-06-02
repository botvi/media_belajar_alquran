<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('env') }}/logo_text.jpg" type="image/jpg" />
    <!--plugins-->
    <link href="{{ asset('admin') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('admin') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('admin') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('admin') }}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('admin') }}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin') }}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('admin') }}/assets/css/app.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/assets/css/icons.css" rel="stylesheet">
    <title>Login - Pojok Islam</title>
    <style>
        body {
            background: linear-gradient(45deg, #FFB6C1, #87CEEB, #98FB98);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            font-family: 'Comic Neue', cursive;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .section-authentication-signin {
            min-height: 100vh;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border: none;
            background: rgba(255, 255, 255, 0.9);
        }

        .card-body {
            padding: 2rem;
        }

        img.img-fluid {
            max-height: 250px;
            transition: transform 0.3s ease;
        }

        img.img-fluid:hover {
            transform: scale(1.05);
        }

        .form-control {
            border-radius: 15px;
            padding: 12px;
            border: 2px solid #FFB6C1;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #87CEEB;
            box-shadow: 0 0 0 0.2rem rgba(135, 206, 235, 0.25);
        }

        .btn-primary {
            background: linear-gradient(45deg, #FFB6C1, #87CEEB);
            border: none;
            border-radius: 15px;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            transition: transform 0.2s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(45deg, #87CEEB, #FFB6C1);
        }

        .login-separater span {
            background: rgba(255, 255, 255, 0.9);
            padding: 0 15px;
            color: #666;
            font-size: 18px;
            font-weight: bold;
        }

        .form-label {
            font-size: 18px;
            color: #666;
            font-weight: bold;
        }

        .input-group-text {
            border-radius: 15px;
            border: 2px solid #FFB6C1;
            background: white;
        }
    </style>

</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Form -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    
                                    <div class="login-separater text-center mb-4">
                                        <span>🎮 MASUK KE DUNIA BELAJAR ISLAM 🎮</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <label for="username" class="form-label">👤 Username Kamu</label>
                                                <input type="text" class="form-control" name="username"
                                                    id="username" placeholder="Masukkan username kamu" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">🔑 Password Kamu</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="password" name="password" placeholder="Masukkan password kamu"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bx bxs-lock-open"></i> Yuk, Masuk!
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end wrapper-->
    @include('sweetalert::alert')
    <script src="{{ asset('admin') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <script src="{{ asset('admin') }}/assets/js/app.js"></script>
</body>

</html>
