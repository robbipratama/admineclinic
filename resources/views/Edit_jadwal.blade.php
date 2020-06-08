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
                                        <a href="{{ url('/jadwal') }}">
                                            <button type="button" class="btn btn-info mb-2">
                                                < Kembali
                                            </button>
                                        </a>
                                        <div class="card">
                                            @foreach($jadwal as $data)
                                            <form action="{{ url('/jadwal/update') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="card-body card-block">
                                                    Poli {{ $data->poli }} - @if($data->gelar_depan != null){{ $data->gelar_depan }}. @endif
                                                                             {{ $data->nama_dokter }}
                                                                             @if($data->gelar_belakang != null), {{ $data->gelar_belakang }}@endif
                                                    <br/><br/>
                                                    <input type="hidden" value="{{ $data->id }}" name="id">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="hari" class="form-control-label">Hari</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="hari" id="hari" class="form-control">
                                                                <option value="">Pilih Hari</option>
                                                                <option <?php if($data->hari == 1){ ?> selected="selected" <?php }?> value="1">Senin</option>
                                                                <option <?php if($data->hari == 2){ ?> selected="selected" <?php }?>value="2">Selasa</option>
                                                                <option <?php if($data->hari == 3){ ?> selected="selected" <?php }?>value="3">Rabu</option>
                                                                <option <?php if($data->hari == 4){ ?> selected="selected" <?php }?>value="4">Kamis</option>
                                                                <option <?php if($data->hari == 5){ ?> selected="selected" <?php }?>value="5">Jumat</option>
                                                                <option <?php if($data->hari == 6){ ?> selected="selected" <?php }?>value="6">Sabtu</option>
                                                                <option <?php if($data->hari == 7){ ?> selected="selected" <?php }?>value="7">Minggu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="jam" class="form-control-label">Jam</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" value="{{ $data->jam }}" id="jam" name="jam" class="form-control">
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
                                            @endforeach
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
