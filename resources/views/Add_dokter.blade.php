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
                                        @if ($message = Session::get('error'))
                                        <div class="sufee-alert alert with-close alert-error alert-dismissible fade show">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <a href="{{ url('/dokter') }}">
                                            <button type="button" class="btn btn-info mb-2">
                                                < Kembali
                                            </button>
                                        </a>
                                        <div class="card">
                                            <form action="{{ url('/dokter/save') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="card-body card-block">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="foto" class=" form-control-label">Foto</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="foto" name="foto" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="gelar_depan" class=" form-control-label">Gelar Depan</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="gelar_depan" name="gelar_depan" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="nama_dokter" class=" form-control-label">Nama Dokter</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_dokter" name="nama_dokter" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="gelar_belakang" class=" form-control-label">Gelar Belakang</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="gelar_belakang" name="gelar_belakang" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="gender" class=" form-control-label">Gender</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <div class="form-check-inline form-check">
                                                                <label for="inline-radio1" class="form-check-label ">
                                                                    <input type="radio" id="gender" name="gender" value="0" class="form-check-input">Laki - Laki &nbsp;
                                                                </label>
                                                                <label for="inline-radio2" class="form-check-label ">
                                                                    <input type="radio" id="gender" name="gender" value="1" class="form-check-input">Perempuan
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="poli" class=" form-control-label">Poli</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="poli" id="poli" class="form-control">
                                                                <option value="">Pilih Poli</option>
                                                                @foreach($poli as $data)
                                                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Reset
                                                    </button>
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i> Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
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

</body>

</html>
<!-- end document-->
