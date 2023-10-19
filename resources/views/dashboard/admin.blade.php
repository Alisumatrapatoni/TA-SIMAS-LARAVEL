@extends('includes.template')

@section('title')
    SIMAS SMKN 1 Kalianget
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@include('sweetalert::alert')

@section('menunya')
    <div>
        <button type="button" class="btn btn-link btn-xs" style="color: black;" data-bs-toggle="modal" data-bs-target=".modal">
            <i class="fa fa-bell-o fa-lg text-primary" style="font-size: 23px;">
                @if ($total_jp_notif > 0)
                    <input id="button_notif" style="background-color: red; width: 20px; height: 20px; border-radius: 100%; text-align: center; border: none; font-size: 15px; line-height: 20px; color: white;" value="{{ $total_jp_notif }}" readonly />
                @endif
            </i>
        </button>
    </div>
@endsection

@section('content')

    <head>
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/AdminLTE.min.css') }}">
    </head>
    <div class="row">
        <!-- center modal notification -->
        <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt="" width="70px">
                        <h3 class="modal-title"><b>Notifikasi</b></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($alert_maintenance as $alert)
                            <tr>
                                <?php
                                $nama_aset = $alert->aset->nama;
                                if ($alert->tanggal_mulai == date('Y-m-d', strtotime('+1 day'))) {
                                    $tanggal_mulai = $alert->tanggal_mulai;
                                    echo
                                        "<div style='padding:5px' style='width:50px'>
                                            <i class='bi bi-info-circle icon-Glyphicon-info'></i>Aset
                                            <a style='color:red'>" . $nama_aset . "</a>
                                                Besok akan dilakukan maintenance di tanggal
                                            <a style='color:red'>" . date('d-m-Y', strtotime($alert->tanggal_mulai)) . "</a>, Tolong dipersiapkan!  ||
                                            <button class='badge badge-primary' onclick=\"window.location.href='" .
                                                route('jadwal_pemeliharaan.index') . "'\">Check
                                            </button>
                                        </div>";
                                } elseif ($alert->tanggal_mulai == date('Y-m-d', strtotime('+2 day'))) {
                                    echo
                                        "<div style='padding:5px' style='width:50px'>
                                            <i class='bi bi-info-circle icon-Glyphicon-info'></i> Aset
                                            <a style='color:red'>" . $nama_aset . "</a>
                                                2 hari lagi akan dilakukan maintenance di tanggal
                                            <a style='color:red'>" . date('d-m-Y', strtotime($alert->tanggal_mulai)) . "</a>,
                                                Tolong dipersiapkan!  ||
                                            <button class='badge badge-primary' onclick=\"window.location.href='" .
                                                route('jadwal_pemeliharaan.index') . "'\">Check
                                            </button>
                                        </div>";
                                } elseif ($alert->tanggal_mulai == date('Y-m-d', strtotime('+3 day'))) {
                                    echo
                                        "<div style='padding:5px' style='width:50px'>
                                            <i class='bi bi-info-circle icon-Glyphicon-info'></i> Aset
                                            <a style='color:red'>" . $nama_aset . "</a>
                                                3 hari lagi akan dilakukan maintenance di tanggal
                                            <a style='color:red'>" . date('d-m-Y', strtotime($alert->tanggal_mulai)) . "</a>
                                                , Tolong dipersiapkan!  ||
                                            <button class='badge badge-primary' onclick=\"window.location.href='" .
                                                route('jadwal_pemeliharaan.index') . "'\">Check
                                            </button>
                                        </div>";
                                } elseif ($alert->tanggal_mulai == $today) {
                                    echo
                                        "<div style='padding:5px' style='width:50px'>
                                            <i class='bi bi-info-circle icon-Glyphicon-info'></i>
                                                Hari ini adalah waktunya maintenance Aset
                                            <a style='color:red'>" . $nama_aset . "</a>
                                                tepat di tanggal
                                            <a style='color:red'>" . date('d-m-Y', strtotime($alert->tanggal_mulai)) . "</a>
                                                , Segera lakukan maintenance!  ||
                                            <button class='badge badge-primary' onclick=\"window.location.href='" .
                                                route('jadwal_pemeliharaan.index') . "'\">Check
                                            </button>
                                        </div>";
                                }elseif ($alert->tanggal_selesai == $today) {
                                    echo
                                        "<div style='padding:5px' style='width:50px'>
                                            <i class='bi bi-info-circle icon-Glyphicon-info'></i>
                                                Hari ini adalah batas waktu selesai maintenance Aset
                                            <a style='color:red'>" . $nama_aset . "</a>
                                                tepat di tanggal
                                            <a style='color:red'>" . date('d-m-Y', strtotime($alert->tanggal_selesai)) . "</a>
                                                , Segera lakukan konfirmasi perubahan maintenance!  ||
                                            <button class='badge badge-primary' onclick=\"window.location.href='" .
                                                route('jadwal_pemeliharaan.index') . "'\">Check
                                            </button>
                                        </div>";
                                } elseif ($alert->tanggal_mulai < $today) {
                                    $datetime1 = new DateTime($today);
                                    $datetime2 = new DateTime($alert->tanggal_mulai);
                                    $interval = $datetime1->diff($datetime2);
                                    $daysDiff = $interval->format('%a');
                                    echo
                                        "<div style='padding:5px' style='width:50px'>
                                            <i class='bi bi-info-circle icon-Glyphicon-info'></i>
                                                Aset
                                            <a style='color:red'>" . $nama_aset .
                                                "<span style='color:black'> Jadwal maintenance </span>" .
                                                date('d-m-Y', strtotime($alert->tanggal_mulai)) .
                                            "</a>
                                            , Telah melewati batas maintenance aset yang dijadwalkan selama {$daysDiff} hari ||
                                            <button class='badge badge-primary' onclick=\"window.location.href='" .
                                                route('jadwal_pemeliharaan.index') . "'\">Check
                                            </button>
                                        </div>";
                                } else {
                                    echo '';
                                }
                                ?>
                            </tr>
                        @endforeach
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card tryal-gradient">
                                <div class="card-body tryal row">
                                    <div class="col-xl-7 col-sm-6">
                                        <h2>Selamat Datang,
                                            {{ session('userdata')['nama'] }}
                                        </h2>
                                        <span>Terus pantau dan kelola aset agar dapat terkelola dengan baik</span>
                                        <a href="{{ route('aset.index') }}" class="btn btn-rounded  fs-18 font-w500">Lihat
                                            Daftar Aset</a>
                                    </div>
                                    <div class="col-xl-5 col-sm-6">
                                        <img src="{{ asset('simas/images/chart.png') }}" alt="" class="sd-shape">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-sm-12">
                                            @php
                                                $aa = 0;
                                                $bb = 0;
                                            @endphp
                                            @foreach ($viewTotalPeminjaman as $x)
                                                @if ($x->status == 'PROSES')
                                                    @php
                                                        $aa = $x->jumlah;
                                                    @endphp
                                                @elseif ($x->status == 'DITERIMA')
                                                    @php
                                                        $bb = $x->jumlah;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @php
                                                $hsl = $aa + $bb;
                                                $hslpersenanbaru = ($hsl * 100) / $jml_aset;
                                            @endphp

                                            <span class="text-center d-block fs-18 font-w600 mb-2">
                                                Total
                                                <span class="text-success">{{ $jml_peminjaman }}</span>
                                                yang melakukan peminjaman <br> <b>Go to</b>
                                                <i class="fa fa-arrow-right"></i>
                                                <a class="" href="{{ route('peminjaman.data') }}">
                                                    <p class="text-primary"><b>Data Peminjaman</b></p>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card small-box rounded">
                                        <div class="card-body ">
                                            <div class="mb-3">
                                                <div class="col">
                                                    <h3 class="fs-42 font-w700">{{ $jml_user }}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <span class="fs-18 font-w500 d-block text-center text-dark">Jumlah
                                                Pengguna</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card small-box rounded">
                                        <div class="card-body ">
                                            <div class="mb-3">
                                                <div class="col">
                                                    <h3 class="fs-42 font-w700">{{ $jml_kategori }}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-list-alt"></i>
                                                </div>
                                            </div>
                                            <span class="fs-18 font-w500 d-block text-center text-dark">Jumlah
                                                Kategori</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card small-box rounded">
                                        <div class="card-body ">
                                            <div class="mb-3">
                                                <div class="col">
                                                    <h3 class="fs-42 font-w700">{{ $jml_ruang }}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-warehouse"></i>
                                                </div>
                                            </div>
                                            <span class="fs-18 font-w500 d-block text-center text-dark">Jumlah Ruang</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card small-box rounded">
                                        <div class="card-body ">
                                            <div class="mb-3">
                                                <div class="col">
                                                    <h3 class="fs-42 font-w700">{{ $jml_divisi }}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-bookmark"></i>
                                                </div>
                                            </div>
                                            <span class="fs-18 font-w500 d-block text-center text-dark">Jumlah
                                                Divisi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card small-box rounded">
                                        <div class="card-body ">
                                            <div class="mb-3">
                                                <div class="col">
                                                    <h3 class="fs-42 font-w700">{{ $jml_jp }}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-wrench"></i>
                                                </div>
                                            </div>
                                            <span class="fs-15 font-w500 d-block text-center text-dark">Jumlah Jadwal
                                                Pemeliharaan</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card small-box rounded">
                                        <div class="card-body ">
                                            <div class="mb-3">
                                                <div class="col">
                                                    <h3 class="fs-42 font-w700">{{ $jml_ad }}</h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-file"></i>
                                                </div>
                                            </div>
                                            <span class="fs-15 font-w500 d-block text-center text-dark">Jumlah Jenis
                                                Anggaran Dana</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-12">

                        <div class="card-header">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary text-white shadow me-1"
                                href="{{ route('peminjaman.data-history') }}">
                                Go to History Peminjaman
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" id="cetak">
                            @csrf
                            <table class="table table-striped" id="example3" class="display">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Aset</th>
                                        <th>Gambar</th>
                                        <th>Tanggal Pinjam</th>

                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($history_peminjaman as $item)
                                    <?php
                                    $btn = '';
                                    if ($item->status == 'PROSES'):
                                        $badge = 'badge-info';
                                        $btn =
                                            '<button data-id="' .
                                            $item->id .
                                            '" data-status="diterima" data-href="' .
                                            url('peminjaman/update?id=' . $item->id . '&status=diterima') .
                                            '" class="btn btn-success btn-sm btn-terima">Diterima</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <button data-id="' .
                                            $item->id .
                                            '" data-status="ditolak" data-href="' .
                                            url('peminjaman/update?id=' . $item->id . '&status=ditolak') .
                                            '" class="btn btn-danger btn-sm btn-tolak">Ditolak</button>';
                                    elseif ($item->status == 'DITERIMA'):
                                        $badge = 'badge-success';
                                        $btn = '<button data-id="' . $item->id . '" data-status="selesai" data-href="' . url('peminjaman/update?id=' . $item->id . '&status=selesai') . '" class="btn btn-selesai btn-sm">Selesai</button>';
                                    elseif ($item->status == 'SELESAI'):
                                        $badge = 'badge-success';
                                    else:
                                        $badge = 'badge-danger';
                                    endif;
                                    ?>
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td><span
                                                class="badge {{ $badge }} text-center">{{ $item->status }}</span>
                                        </td>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->aset->nama }}</td>
                                            <td>
                                                @if ($item->aset->gambar)
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('storage/' . $item->aset->gambar) }}" alt=""
                                                        width="60px">
                                                @endif
                                            </td>
                                            <td>{{ $item->tanggal_pinjam }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
