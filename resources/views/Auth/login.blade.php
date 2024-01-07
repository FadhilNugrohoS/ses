<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="icon" href="{{ asset('img/Logo_Login.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('login_vendor/css/style.css') }}">

</head>

<body>
    @include('sweetalert::alert')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img"
                            style="background-image: url(login_vendor/images/Logo_Halaman.png);background-color:#343A40 ;border-radius: 10px; max-height: auto">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4"><b>Sign In</b></h3>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" class="signin-form" method="POST">
                                @csrf
                                <div class="form-group mt-3">
                                    <input type="text" name="username" class="form-control" required>
                                    <label class="form-control-placeholder" name="username" for="username"
                                        required>Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" name="password" type="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password" name="password "
                                        required>Password</label>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('login_vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('login_vendor/js/popper.js') }}"></script>
    <script src="{{ asset('login_vendor/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_vendor/js/main.js') }}"></script>
</body>

</html>
