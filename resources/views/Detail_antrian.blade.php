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
                                        @if ($message = Session::get('error'))
                                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <a href="{{ url('/antrian') }}">
                                            <button class="btn btn-info text-white">KEMBALI</button>
                                        </a>
                                        <h2 class="mt-3 mb-4">Detail Data Antrian</h2>
                                        @if($status == 'success')
                                        <p>Status : <b class="text-success">{{ $status }}</b></p>
                                        <p>Tanggal Berobat : {{ $tanggal }}</p>
                                        @else
                                        <p>Status : <b class="text-danger">{{ $status }}</b></p>
                                        <p>Tanggal : {{ $tanggal }}</p>
                                        @endif
                                        <table class="mt-3 mb-4">
                                            <tr>
                                                <td><p>NIM</p></td>
                                                <td><p> : </p></td>
                                                <td><p>{{ $nim }}</p></td>
                                            </tr>
                                            <tr>
                                                <td><p>Nama User</p></td>
                                                <td><p> : </p></td>
                                                <td><p>{{ $nama_depan }} {{ $nama_belakang }}</p></td>
                                            </tr>
                                            <tr>
                                                <td><p>Nama Dokter</p></td>
                                                <td><p> : </p></td>
                                                <td><p>
                                                    @if($gelar_depan != null){{ $gelar_depan }}. @endif
                                                    {{ $nama_dokter }}
                                                    @if($gelar_belakang != null), {{ $gelar_belakang }}@endif
                                                </p></td>
                                            </tr>
                                            <tr>
                                                <td><p>Poli</p></td>
                                                <td><p> : </p></td>
                                                <td><p>{{ $poli }}</p></td>
                                            </tr>
                                            <tr>
                                                <td><p>Jadwal Praktik</p></td>
                                                <td><p> : </p></td>
                                                <td><p>
                                                    @if($hari == '1')
                                                    Senin |
                                                    @elseif($hari == '2')
                                                    Selasa |
                                                    @elseif($hari == '3')
                                                    Rabu |
                                                    @elseif($hari == '4')
                                                    Kamis |
                                                    @elseif($hari == '5')
                                                    Jumat |
                                                    @elseif($hari == '6')
                                                    Sabtu |
                                                    @elseif($hari == '7')
                                                    Minggu |
                                                    @endif
                                                    {{ $jam }}
                                                </p></td>
                                            </tr>
                                        </table>
                                        @if($status == 'success')
                                        <a href="javascript:if(confirm('Apakah anda yakin ingin menghapus data ?')) window.location.href = '{{ url('/antrian/delete/' .$id_antrian) }}'">
                                            <button class="btn btn-danger text-white mt-3">HAPUS DATA</button>
                                        </a>
                                        @else
                                        <p>Jumlah pasien terdaftar pada tanggal {{ $tanggal }} = {{ $jumlahpasien }} Pasien</p>
                                        <form action="{{ url('/antrian/update') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $id_antrian }}"/>
                                            <div class="form-group">
                                                <label>Input No. Antrian Baru</label>
                                                <input type="number" class="form-control" style="width: 100px" name="noantrian"/>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">SUBMIT</button>
                                            </div>
                                        </form>
                                        @endif
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
