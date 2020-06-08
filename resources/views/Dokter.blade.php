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
                                        @if ($message = Session::get('success'))
                                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ url('/dokter/add') }}">
                                                    <button type="button" class="btn btn-info mb-2">
                                                        + Tambah Data Dokter
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ url('/dokter') }}" method="get">
                                                <div class="input-group">
                                                    <input type="text" id="input1-group2" name="keywords" placeholder="Cari Nama Dokter" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary" type="submit">
                                                            <i class="fa fa-search"></i> Cari
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Poli</th>
                                                        <th>Foto</th>
                                                        <th>Nama Dokter</th>
                                                        <th>Gender</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php($no=1)
                                                    @foreach($dokter as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->nama_poli }}</td>
                                                        <td><img src ="{{ url( $data->foto ) }}" style="max-width: 150px;"></td>
                                                        <td>@if($data->gelar_depan != null){{ $data->gelar_depan }}. @endif
                                                            {{ $data->nama_dokter }}
                                                            @if($data->gelar_belakang != null), {{ $data->gelar_belakang }}@endif
                                                        </td>
                                                        <td>
                                                            @if($data->gender == 0)
                                                            L
                                                            @elseif($data->gender == 1)
                                                            P
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('/dokter/edit/' .$data->id) }}">
                                                                <button type="button" class="btn btn-warning btn-sm text-white">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </button>
                                                            </a>
                                                            <a href="javascript:if(confirm('Apakah anda yakin ingin menghapus data ?')) window.location.href = '{{ url('/dokter/delete/' .$data->id) }}'">
                                                                <button type="button" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE-->
                                        <?php echo $dokter->render(); ?>
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
