@extends('includes.template')

@section('menunya')
    Report
@endsection

@section('content')
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laporan</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin-lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('admin-lte/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/AdminLTE.min.css') }}">
    </head>

    <body class="">
        <section class="content">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->

                    <div class="small-box bg-white rounded">
                        <div class="inner">
                            <h3 class="text-white"></h3>
                            <p class="text-primary"><b>Report <br> Ruang</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <a href="{{ route('report.ruang') }}" class="small-box bg-primary text-white text-center">Print <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-white rounded">
                        <div class="inner">
                            <h3 class="text-white"></h3>
                            <p class="text-primary"><b>Report <br>Pengguna</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <a href="{{ route('report.pengguna') }}" class="small-box bg-primary text-white text-center">Print <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-white rounded">
                        <div class="inner">
                            <h3 class="text-white"></h3>
                            <p class="text-primary"><b>Report <br> Supplier</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <a href="{{ route('report.supplier') }}" class="small-box bg-primary text-white text-center">Print <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-white rounded">
                        <div class="inner">
                            <h3 class="text-white"></h3>
                            <p class="text-primary"><b>Report <br> Aset</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                        </div>
                        <a href="{{ route('report.aset') }}" class="small-box bg-primary text-white text-center">Print <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-white rounded">
                        <div class="inner">
                            <h3 class="text-white"></h3>
                            <p class="text-primary"><b>Report <br> Peminjaman Aset</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-th-list"></i>
                        </div>
                        <a href="{{ route('report.peminjaman') }}" class="small-box bg-primary text-white text-center">Print <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-white rounded">
                        <div class="inner">
                            <h3 class="text-white"></h3>
                            <p class="text-primary"><b>Report <br> History Peminjaman</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <a href="{{ route('report.history_peminjaman') }}" class="small-box bg-primary text-white text-center">Print <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./wrapper -->
    </body>

    </html>
@endsection
@section(' footer')
@endsection
