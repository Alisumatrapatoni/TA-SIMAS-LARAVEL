@extends('includes.template')

@section('menunya')
    Peminjaman <i class="fa fa-solid fa-arrow-right"></i> Qr-Code
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Scanner Peminjaman Qr-Code</b></h4>
                </div>

                <div class="row">
                    <div class="col-12">
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

                        <div class="card-body">
                            <div class="container col-6 mb-3">
                                <div class="row">
                                    <div id="reader" width="400px"></div>
                                </div>
                            </div>
                            <div class="table-responsive" id="cetak">
                                <form id="kode-form" action="" method="GET">
                                    <div class="text-center mt-3">
                                        {{-- <input type="text" id="result" name="keyword" readonly>
                                        <input type="submit" value="Submit"> --}}
                                    </div>
                                </form>
                                <b>
                                    <hr>
                                </b>
                                @if (app('request')->input('keyword'))
                                <table class="table table-striped" class="display" id="example5">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nama</th>
                                            <th>Gambar</th>
                                            <th>Kondisi</th>
                                            <th>Ruang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($aset as $item)
                                            <tr class="text-center">
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    @if ($item['gambar'])
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $item['gambar']) }}" alt=""
                                                            width="60px">
                                                    @endif
                                                </td>
                                                <td>{{ $item->kondisi }}</td>
                                                <td>{{ $item->ruang->nama }}</td>

                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" data-id="{{ $item->id }}"
                                                            data-nama="{{ $item->nama }}"
                                                            class="btn btn-primary btn-block btn-peminjaman">Pinjam
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div><!-- /.modal -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
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
                                        name="nama" required>
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
                                    <label for="keperluan"><b>Keperluan</b></label>
                                    <textarea name="keperluan" id="keperluan" cols="30" rows="5" class="form-control" placeholder="Keperluan..."
                                        name="keperluan" required></textarea>
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
