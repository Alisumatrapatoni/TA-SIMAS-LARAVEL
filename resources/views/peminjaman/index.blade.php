@extends('includes.template')

@section('menunya')
@if (session('userdata')['status'] == 'ADMIN')
    <h2>
        Transaksi <i class="fa fa-solid fa-arrow-right"></i> Peminjaman
    </h2>
@else
<h2>
    Peminjaman <i class="fa fa-solid fa-arrow-right"></i> Manual
</h2>
@endif
@endsection

@section('content')
    @php
        $kat = old('kategori_id');
        $rua = old('ruang_id');
    @endphp
    <div class="row">
        <div class="col-md-6">
            <form action="" method="get">
                <div class="input">
                    <div class="input-group mb-3">
                        <input type="text" id="keyword_search" name="keyword_search" class="form-control" placeholder="Search"
                            value="{{ request('keyword_search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="row">
        @foreach ($asets as $aset)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-1"><b>{{ $aset->nama }}</b></strong>
                        <p class="btn btn-stok text-white"> Stok {{ $aset->jumlah }}</p>
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
                                class="btn btn-primary btn-block btn-peminjaman">Pinjam
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

    <!-- Center modal tambah data -->
    <div class="modal fade modal" id="peminjamanModal" tabindex="-1" aria-labelledby="peminjamanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt="" width="70px">
                    <h5 class="modal-title" id="peminjamanModalLabel">Form Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('peminjaman.store') }}" method="post" id="form-peminjaman">
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
                                    <label for="tanggal_pinjam"><b>Tanggal Peminjaman</b></label>
                                    <input type="date" class="form-control" id="tanggal_pinjam"
                                        placeholder="Tanggal Pinjam" name="tanggal_pinjam" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="tanggal_kembali"><b>Tanggal Pengembalian</b></label>
                                    <input type="date" class="form-control" id="tanggal_kembali"
                                        placeholder="Tanggal Pengembalian" name="tanggal_kembali" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="jumlah_request"><b>Jumlah</b></label>
                                    <input type="number" class="form-control" id="jumlah_request"
                                        placeholder="Jumlah Request" name="jumlah_request" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-2">
                                    <label for="keperluan"><b>Keperluan</b></label>
                                    <textarea name="keperluan" id="keperluan" cols="30" rows="5" class="form-control"
                                        placeholder="Keperluan" name="keperluan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex mt-2">
                            <button type="button" class="btn btn-danger light text-center"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary btn-pinjam-aset">Pinjam Aset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section(' footer')
@endsection
