<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{ $title }}</title>
    @include('include/css')
</head>

<body class="animsition">
    <div class="page-wrapper">

        @include('include/header')

        <!-- WELCOME-->
        <section class="welcome2 p-t-40 p-b-55">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome2-inner m-t-60">
                            <div class="welcome2-greeting">
                                <h1 class="title-6">{{ $welcome_title }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="au-breadcrumb3">
                            <div class="au-breadcrumb-left">
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="#">E-Clinic Admin</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">{{ $breadcrumb }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class=" p-t-70 p-b-70">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3">
                            @include('include/menu')
                        </div>
                        <div class="col-xl-9">
                            <div class="page-content">
                                <!-- MAIN CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($message = Session::get('success'))
                                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                        <div class="sufee-alert alert with-close alert-error alert-dismissible fade show">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="card">
                                            @foreach($profil as $data)
                                            <form action="{{ url('/profil/update') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <div class="card-body card-block">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="username" class=" form-control-label">Username</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="username" name="username" value="{{ $data->username }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="nama" class=" form-control-label">Nama</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama" name="nama" value="{{ $data->nama }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="nama" class=" form-control-label">Password</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <div class="input-group">
                                                                <input type="password" id="password" name="password" class="form-control">
                                                                <div class="input-group-addon">
                                                                    <i toggle="#password" class="fa fa-eye toggle-password"></i>
                                                                </div>
                                                            </div>
                                                            <span class="help-block text-danger">Kosongi jika tidak ingin mengganti password</span>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="nama" class=" form-control-label">Konfirmasi Password</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <div class="input-group">
                                                                <input type="password" id="password_konfirm" name="password_konfirm" class="form-control">
                                                                <div class="input-group-addon">
                                                                    <i toggle="#password_konfirm" class="fa fa-eye toggle-password"></i>
                                                                </div>
                                                            </div>
                                                            <span class="help-block text-danger">Kosongi jika tidak ingin mengganti password</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Reset
                                                    </button>
                                                    <button type="submit" id="profil-update" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i> Update
                                                    </button>
                                                </div>
                                            </form>
                                            @endforeach
                                    </div>
                                </div>
                                <!-- END MAIN CONTENT -->

                                <!-- FOOTER -->
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('include/footer')
                                    </div>
                                </div>
                                <!-- END FOOTER -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->
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
        $("#profil-update").click(function () {
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
