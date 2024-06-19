<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RISTRATION FORM</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/login-logo.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::to('admin_assets/logo/books-logo.png') }}">
    <link rel="shortcut icon" href="{{ URL::to('admin_assets/logo/books-logo.png') }}" type="image/x-icon">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="text-center">
            <img class="title-logo" src="admin_assets/logo/books-logo.png" alt="logo">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <h1 class="h4 text-gray-900 mb-4">Login</h1>
        </div>
        <form action="{{ route('login') }}" method="POST" class="user">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail" class="form-label">Email Address</label>
                <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                    aria-describedby="emailHelp" placeholder="Enter Email Address...">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail" class="form-label">Password</label>
                <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword"
                    placeholder="Password">
                <div id="passwordHelp" class="form-text">Never share your password with anyone else.</div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-user">Login</button>
        </form><br>
        <div class="text-center">
            <a class="form-label" href="forgot-password">Forgot Password?</a><br>
            <a class="form-label" href="register">Register</a>
        </div>
        <hr>
    </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>

</html>