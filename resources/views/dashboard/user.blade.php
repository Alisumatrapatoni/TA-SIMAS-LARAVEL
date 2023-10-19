@extends('includes.template')

@section('menunya')
    Dashboard
@endsection

@section('content')
        <div class="card tryal-gradient">
                <div class="card-body tryal row text-center mx-auto">
                    <div class="col-xl-12 col-sm-12">
                        <h2>Selamat Datang
                            {{ session('userdata')['nama'] }} di
                        </h2>
                    </div>
                    <div class="col-xl-4 col-sm-5 img-fluid mx-auto">
                        <img src="{{ asset('simas/images/chart.png') }}" alt="" class="sd-shape">
                    </div>
                    <div class="mt-3">
                        <h2 class="text-white">Aplikasi Sistem Informasi Management Aset</h2>
                    </div>
                </div>
        </div>
@endsection

@section(' footer')
@endsection
