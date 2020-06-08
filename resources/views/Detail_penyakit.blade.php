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
                                        <a href="{{ url('/penyakit') }}" class="mb-4">
                                            <button type="button" class="btn btn-info mb-2">
                                                < Kembali
                                            </button>
                                        </a>
                                        @foreach($penyakit as $data)
                                        <h1>{{ $data->nama_penyakit }}</h1>
                                        <hr>
                                        <br>
                                        <img src ="{{ url( $data->foto_penyakit ) }}">
                                        <br><br><br>
                                        <span class="role admin mt-2 mb-5">{{ $data->kategori }}</span>
                                        <br>
                                        {{ $data->deskripsi }}
                                        <br><br>
                                        <h4>Penyebab</h4>
                                        {{ $data->penyebab }}
                                        <br><br>
                                        <h4>Gejala</h4>
                                        {{ $data->gejala }}
                                        <br><br>
                                        <h4>Pengobatan</h4>
                                        {{ $data->pengobatan }}
                                        <br><br>
                                        <h4>Pencegahan</h4>
                                        {{ $data->pencegahan }}
                                        <br><br>
                                        <a href="{{ url('/penyakit/edit/' .$data->id) }}">
                                            <button type="button" class="btn btn-warning btn-sm text-white">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </button>
                                        </a>
                                        <a href="javascript:if(confirm('Apakah anda yakin ingin menghapus data ?')) window.location.href = '{{ url('/penyakit/delete/' .$data->id) }}'">
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </a>
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

</body>

</html>
<!-- end document-->
