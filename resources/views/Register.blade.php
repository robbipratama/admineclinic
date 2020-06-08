<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Header Icon -->
    <link rel="icon" href="http://eclinic.rifqiiardhian.my.id/assets/logo.ico">

    <!-- Title Page-->
    <title>{{ $title }}</title>

    @include('include/css')
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content bg-light">
            <div class="container">
                <div class="login-wrap pb-5">
                    @if ($message = Session::get('success'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="login-content">
                        <div class="login-form">
                            <h1 class="text-center m-4 text-secondary">Register.</h1>
                            <form action="{{ url('/register/save') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label><b>Nama</b></label>
                                    <input type="text" id="nama" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><b>Username</b></label>
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><b>Email</b></label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><b>Password</b></label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control">
                                        <div class="input-group-addon">
                                            <i toggle="#password" class="fa fa-eye toggle-password"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Konfirmasi Password</b></label>
                                    <div class="input-group">
                                        <input type="password" id="password_konfirm" name="password_konfirm" class="form-control">
                                        <div class="input-group-addon">
                                            <i toggle="#password_konfirm" class="fa fa-eye toggle-password"></i>
                                        </div>
                                    </div>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" id="register-save" type="submit">Register</button>
                            </form>
                            <a href="{{ url('/') }}"><button class="au-btn au-btn--block au-btn--blue m-b-20 text-center">Login</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('include/javascript')
    <script>
    //Password Toggle Function
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));

        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    //Password Validation
    $(function () {
        $("#register-save").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#password_konfirm").val();

            if (password != confirmPassword) {
                alert("Password tidak sesuai.");
                return false;
            }
            return true;
        });
    });
    </script>
</body>
</html>
<!-- end document-->
