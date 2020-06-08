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
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
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
                            <center><img src="{{ url('assets/template/images/header.png')}}" style="width: 200px; height: auto" alt="CoolAdmin" /></center>
                            <h1 class="text-center m-4 text-secondary">Login.</h1>
                            <form action="{{ url('/cek-login') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label><b>Email / Username</b></label>
                                    <input class="form-control" type="text" name="useremail">
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
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('include/javascript')

    <script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));

        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    </script>
</body>
</html>
<!-- end document-->
