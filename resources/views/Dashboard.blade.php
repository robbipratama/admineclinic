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
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c1">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-accounts-outline"></i>
                                                    </div>
                                                    <br/>
                                                    <div class="text mb-4">
                                                        <h2>{{ $jumlahmember }}</h2>
                                                        <span>Member Terdaftar</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c2">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-accounts-add"></i>
                                                    </div>
                                                    <br/>
                                                    <div class="text mb-4">
                                                        <h2>{{ $jumlahdokter }}</h2>
                                                        <span>Dokter</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c3">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-hospital"></i>
                                                    </div>
                                                    <br/>
                                                    <div class="text mb-4">
                                                        <h2>{{ $jumlahpoli }}</h2>
                                                        <span>Poli</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="overview-item overview-item--c4">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-calendar-note"></i>
                                                    </div>
                                                    <br/>
                                                    <div class="text mb-4">
                                                        <h2>{{ $jumlahjadwal }}</h2>
                                                        <span>Jadwal Praktik</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h1 class="mb-5">Selamat Datang di Brawijaya E-Clinic Admin Page</h1>
                                        <p class="text-justify mb-5">
                                            Segala kemudahan akses untuk mengelola seluruh data administrasi E-Clinic Unversitas Brawijaya ada disini.
                                            Dengan perkembangan teknologi saat ini, teknologi telah masuk ke berbagai bidang dan aspek salah satunya
                                            adalah kesehatan. Salah satu inovasi baru untuk dunia kesehatan yakni Brawijaya E-Clinic. Kemudahan dalam
                                            mendapatkan informasi terkait obat dan penyakit, kemudahan dalam mendapatkan antrean klinik tanpa harus
                                            langsung menuju klinik dan kemudahan - kemudahan lainnya hanya disini di Brawijaya E-Clinic.
                                        </p>
                                    </div>
                                    <div class="col-md-12 text-center mt-5 mb-5">
                                        <p><b>Powered by :</b></p>
                                        <img src="{{ url('assets/powered.png')}}" class="img-fluid text-center mt-4" style="max-width: 300px"/>
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
