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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="{{ url('/penyakit/kat/add') }}">
                                            <button type="button" class="btn btn-info mb-2">
                                                + Tambah Kategori
                                            </button>
                                        </a>
                                        <div class="top-campaign">
                                            <h3 class="title-3 mb-2">Kategori</h3>
                                            <div class="table-responsive">
                                                <table class="table table-top-campaign">
                                                    <tbody>
                                                        @php($no_kategori=1)
                                                        @foreach($kategori as $dataKategori)
                                                        <tr>
                                                            <td>{{ $no_kategori++ }}. {{ $dataKategori->nama }}</td>
                                                            <td>
                                                                <a href="{{ url('/penyakit/kat/edit/' .$dataKategori->id) }}">Edit</a> |
                                                                <a href="javascript:if(confirm('Apakah anda yakin ingin menghapus data ?')) window.location.href = '{{ url('/penyakit/kat/delete/' .$dataKategori->id) }}'">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="{{ url('/penyakit/add') }}">
                                                    <button type="button" class="btn btn-info mb-2">
                                                        + Tambah Data
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-8">
                                                <form action="{{ url('/penyakit') }}" method="get">
                                                <div class="input-group">
                                                    <input type="text" id="input1-group2" name="keywords" placeholder="Cari Nama Penyakit" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary" type="submit">
                                                            <i class="fa fa-search"></i> Cari
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Penyakit</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php($no=1)
                                                    @foreach($penyakit as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->nama }}</td>
                                                        <td>
                                                            <a href="{{ url('/penyakit/detail/' .$data->id) }}">
                                                                <button type="button" class="btn btn-info btn-sm text-white">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                            </a>
                                                            <a href="{{ url('/penyakit/edit/' .$data->id) }}">
                                                                <button type="button" class="btn btn-warning btn-sm text-white">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </button>
                                                            </a>
                                                            <a href="javascript:if(confirm('Apakah anda yakin ingin menghapus data ?')) window.location.href = '{{ url('/penyakit/delete/' .$data->id) }}'">
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
                                        <?php echo $penyakit->render(); ?>
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
