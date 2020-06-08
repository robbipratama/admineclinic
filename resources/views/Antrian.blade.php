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
                                        <h3 class="mb-3">Antrian Pending</h3>
                                        <!-- DATA TABEL PENDING -->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Berobat</th>
                                                        <th>User</th>
                                                        <th>Dokter</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pending as $datapending)
                                                    <tr>
                                                        <td>{{ $datapending->tanggal }}</td>
                                                        <td>{{ $datapending->unama_depan }} {{ $datapending->unama_belakang }}</td>
                                                        <td>
                                                            @if($datapending->gelar_depan != null){{ $datapending->gelar_depan }}. @endif
                                                            {{ $datapending->nama_dokter }}
                                                            @if($datapending->gelar_belakang != null), {{ $datapending->gelar_belakang }}@endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('antrian/detail/' .$datapending->id) }}">LIHAT DETAIL</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABEL PENDING-->
                                        <h3 class="mb-3">Antrian Terdaftar / Selesai</h3>
                                        <!-- DATA TABEL SUKSES -->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Berobat</th>
                                                        <th>No Antrian</th>
                                                        <th>User</th>
                                                        <th>Dokter</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($success as $datasuccess)
                                                    <tr>
                                                        <td>{{ $datasuccess->tanggal }}</td>
                                                        <td>{{ $datasuccess->no_antrian }}</td>
                                                        <td>{{ $datasuccess->unama_depan }} {{ $datasuccess->unama_belakang }}</td>
                                                        <td>
                                                            @if($datasuccess->gelar_depan != null){{ $datasuccess->gelar_depan }}. @endif
                                                            {{ $datasuccess->nama_dokter }}
                                                            @if($datasuccess->gelar_belakang != null), {{ $datasuccess->gelar_belakang }}@endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('antrian/detail/' .$datasuccess->id) }}">LIHAT DETAIL</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABEL SUKSES -->
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
