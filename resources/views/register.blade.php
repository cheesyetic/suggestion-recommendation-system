<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ngudosuko</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 d-flex align-items-center" style="min-height: 100vh">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        @if (Session::has('errors'))
                            <div class="alert alert-danger">
                                {{ Session::get('errors') }}
                                @php
                                    Session::forget('errors');
                                @endphp
                            </div>
                        @endif
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block my-auto">
                                <div class="row-lg-4 d-flex justify-content-center">
                                    <img src="img/NS2.png" alt="logo" width="50%">
                                </div>
                                <div class="row-lg-4">
                                    <p class="text-center mb-0">Pesan Menteri Keuangan</p>
                                    <a href="/" class="d-flex justify-content-center" href="">Lihat
                                        Disini</a>
                                </div>
                                <div class="row-lg-4 mb-4">
                                    <p class="text-center mt-4 mb-0">Materi terkait ZIWBK</p>
                                    <a href="/" class="d-flex justify-content-center">Lihat Disini</a>
                                </div>
                            </div>
                            <div class="col-lg-6 my-auto">
                                <div class="p-5">
                                    <div class="">
                                        <h1 class="h4 text-gray-900 mb-4">Ayo Daftar di Ngudosuko!</h1>
                                    </div>
                                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-outline mb-4 mt-4">
                                            <input type="number" id="nip" name="nip"
                                                class="form-control form-control-lg" value="{{ old('nip') }}"
                                                placeholder="Masukkan NIP anda disini" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-lg"
                                                placeholder="Masukkan password anda disini" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="confirm_password" name="confirm_password"
                                                class="form-control form-control-lg"
                                                placeholder="Konfirmasi password anda disini" />
                                        </div>

                                        <div class="text-lg-start mt-4 pt-2">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="text-lg-start mt-4 pt-2">
                                        <p>Sudah punya akun? <a href="{{ route('login') }}">Login
                                                disini</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
