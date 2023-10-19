@extends('includes.template')

@section('menunya')
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class=" mt-2 mt-sm-0">
                        <a href="{{ route('peminjaman.data') }}">
                            <span class="badge badge-pill badge-primary"><i class="	fa fa-arrow-circle-left"></i></span>
                        </a>
                    </div>
                    <div class="text-center">
                        <div class="clearfix"></div>
                        <div>
                            @if ($peminjaman->aset->gambar != null)
                                <img class="avatar-lg img-thumbnail" src="{{ asset('storage/' . $peminjaman->aset['gambar']) }}"
                                    alt="" width="170px" />
                            @else
                                <img class="avatar-lg rounded-circle img-thumbnail"
                                    src="{{ asset('simas/images/ava.png') }}" alt="" width="100px" />
                            @endif
                        </div>
                        <h5 class="mt-3 mb-1">
                            {{ $peminjaman->aset->nama }}
                        </h5>
                        <hr class="my-4">
                        <img src="data:image/png;base64,
                                {!! base64_encode(
                                    QrCode::format('png')->size(200)->errorCorrection('H')->generate($peminjaman->aset->kode),
                                ) !!} ">
                        <a href="{{ route('aset.cetakqrcode', ['id' => $peminjaman->aset->kode]) }}" class="btn btn-primary"
                            style="width:110px; margin:5px 0;">Cetak QR Code</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
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
                                @php
                                    $kat = old('kategori_id');
                                    $ad = old('anggaran_dana_id');
                                    $jp = old('jenis_pemeliharaan_id');
                                    $rua = old('ruang_id');
                                    $sup = old('supplier_id');
                                @endphp
                                <li class="nav-item"><a href="#detail-aset" data-bs-toggle="tab"
                                        class="nav-link active show">Detail Peminjaman Aset</a>
                                </li>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="detail-aset" class="tab-pane fade active show">
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mt-5 mb-4"><u>Detail Peminjaman Aset {{ $peminjaman->aset->nama }}</u></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Kode Aset :
                                                    {{ $peminjaman->aset->kode }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Nama Aset :
                                                    {{ $peminjaman->aset->nama }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Nama Peminjam Aset :
                                                    {{ $peminjaman->user->nama }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Username :
                                                    {{ $peminjaman->user->username }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Tanggal Pinjam :
                                                    {{ $peminjaman->tanggal_pinjam }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Tanggal Kembali :
                                                    {{ $peminjaman->tanggal_kembali }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Brand Aset :
                                                    {{ $peminjaman->aset->brand }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Harga Aset :
                                                    {{ $peminjaman->aset->nilai_harga }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Kondisi :
                                                    {{ $peminjaman->aset->kondisi }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Kategori :
                                                    {{ $peminjaman->aset->kategori->nama }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Ruang Aset :
                                                    {{ $peminjaman->aset->ruang->nama }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Tempat Peletakan :
                                                    {{ $peminjaman->aset->tempat }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="mt-2">Keperluan :
                                                    {{ $peminjaman->keperluan }}
                                                </h5>
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
    @endsection


    @section('footer')
    @endsection
