@extends('includes.template')

@section('menunya')
<h2>
    Aset <i class="fa fa-solid fa-arrow-right"></i> Mutasi Aset
</h2>
@endsection

@section('content')
    @php
        $kat = old('kategori_id');
        $rua = old('ruang_id');
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-md-6">
                    <form action="" method="get">
                        <div class="input-group mb-3">
                            <input type="text" id="keyword_search" name="keyword_search" class="form-control"
                                placeholder="Search" value="{{ request('keyword_search') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-dataMutasi btn-primary text-white" href="{{ route('mutasi.data') }}">Histori Mutasi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        @foreach ($asets as $aset)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-1"><b>{{ $aset->nama }}</b></strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <div class="img-blok" style="min-height: 150px">
                                @if ($aset->gambar)
                                    <img class="mx-auto d-block" src="{{ asset('storage/' . $aset->gambar) }}"
                                        alt="" width="150px">
                                @endif
                            </div>
                            <hr>
                            <h5 class="text-sm-center mt-2 mb-1"></h5>
                            <div class="location text-sm-left">
                                <u>Jumlah / Stok </u>{{ $aset->jumlah }} <br>
                                <u>Kode </u>{{ $aset->kode }} <br>
                                <u>Kategori </u>{{ $aset->kategori->nama }} <br>
                                <u>Ruang </u>{{ $aset->ruang->nama }} <br>
                                <u>Tempat </u>{{ $aset->tempat }}
                                @if (session('userdata')['status'] == 'ADMIN')
                                    <br>
                                    <u>Nilai Harga </u>Rp. {{ number_format($aset->nilai_harga, 0, ',', '.') }}
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center text-center">
                            <button type="button" data-id="{{ $aset->id }}" data-nama="{{ $aset->nama }}"
                                class="btn btn-success btn-block btn-mutasi-tambah">Mutasi Bertambah
                            </button>
                        </div>
                        <div class="card-text text-sm-center text-center mt-2">
                            <button type="button" data-id="{{ $aset->id }}" data-nama="{{ $aset->nama }}"
                                class="btn btn-danger btn-block btn-mutasi-kurang">Mutasi Berkurang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $asets->links() }}
            </ul>
        </nav>
    </div>

    <!-- Center modal tambah data mutasi -->
    <div class="modal fade modal" id="mutasiTambahModal" tabindex="-1" aria-labelledby="mutasiTambahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt="" width="70px">
                    <h5 class="modal-title" id="mutasiTambahModalLabel">Form Mutasi Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mutasi.store_tambah') }}" method="post" id="form-mutasi-tambah" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="aset_id" value="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nama"><b>Nama Aset</b></label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama Aset"
                                        name="nama" readonly required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="jumlah_request"><b>Jumlah</b></label>
                                    <input type="number" class="form-control" id="jumlah_request"
                                        placeholder="Jumlah request yang ingin di tambah mutasi" name="jumlah_request"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="nilai_harga_request"><b>Nilai Harga</b></label>
                                    <input type="number" class="form-control" id="nilai_harga_request"
                                        placeholder="Nilai total harga yang ingin di tambah mutasi"
                                        name="nilai_harga_request" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="gambar"><b>Gambar</b></label>
                                    <input class="form-control" type="file" id="gambar" name="gambar"
                                        placeholder="Pilih Gambar" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label><b>Deskripsi</b></label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"
                                        placeholder="Masukkan Keterangan" value="{{ old('keterangan') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex mt-2">
                            <button type="button" class="btn btn-danger light text-center"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary btn-tambah-mutasi-aset">Mutasi Aset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Center modal kurang data mutasi -->
    <div class="modal fade modal" id="mutasiKurangModal" tabindex="-1" aria-labelledby="mutasiKurangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt="" width="70px">
                    <h5 class="modal-title" id="mutasiTambahModalLabel">Form Mutasi Kurang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mutasi.store_kurang') }}" method="post" id="form-mutasi-kurang" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="aset_id" value="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nama"><b>Nama Aset</b></label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama Aset"
                                        name="nama" readonly required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="jumlah_request"><b>Jumlah</b></label>
                                    <input type="number" class="form-control" id="jumlah_request"
                                        placeholder="Jumlah request yang ingin di kurang mutasi" name="jumlah_request"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="nilai_harga_request"><b>Nilai Harga</b></label>
                                    <input type="number" class="form-control" id="nilai_harga_request"
                                        placeholder="Nilai total harga yang ingin di kurang mutasi"
                                        name="nilai_harga_request" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="gambar"><b>Gambar</b></label>
                                    <input class="form-control" type="file" id="gambar" name="gambar"
                                        placeholder="Pilih Gambar" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label><b>Deskripsi</b></label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"
                                        placeholder="Masukkan Keterangan" value="{{ old('keterangan') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex mt-2">
                            <button type="button" class="btn btn-danger light text-center"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary btn-kurang-mutasi-aset">Mutasi Aset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section(' footer')
@endsection
