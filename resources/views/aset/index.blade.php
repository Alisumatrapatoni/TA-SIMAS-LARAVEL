@extends('includes.template')

@section('menunya')
<h2>
    Aset <i class="fa fa-solid fa-arrow-right"></i> Data Aset
</h2>
@endsection

@section('content')
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
                            @php
                                $kat = old('kategori_id');
                                $ad = old('anggaran_dana_id');
                                $jp = old('jenis_pemeliharaan_id');
                                $rua = old('ruang_id');
                                $sup = old('supplier_id');
                            @endphp
                            <div>
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target=".modal" style="margin-bottom: 1rem;"><i
                                        class="mdi mdi-plus me-1"></i>Tambah Data
                                </button>
                                <a href="{{ route('aset.scan_qrcode') }}">
                                    <button type="button" class="btn btn-qrcode mb-2 text-white"
                                        style="margin-bottom: 1rem;">
                                        <i class="fa fa-qrcode"></i> By Qr-Code
                                    </button>
                                </a>
                                <a href="{{ route('aset.export') }}">
                                    <button type="button" class="btn btn-export-excel mb-2 text-white"
                                        style="margin-bottom: 1rem;">
                                        <i class="fa fa-file-excel"></i> Export Excel
                                    </button>
                                </a>
                                <a href="#" id="modalTrigger" class="btn btn-import-excel mb-2 text-white"
                                    style="margin-bottom: 1rem;">
                                    <i class="fa fa-file-excel"></i> Import Excel
                                </a>
                            </div>
                            <div>
                            </div>
                            <a href="{{ route('aset.history') }}">
                                <button type="button" class="btn btn-primary-history mb-2 text-white"
                                    style="margin-bottom: 1rem;">
                                    <i class="fas fa-history"></i> History
                                </button>
                            </a>

                            <!-- center modal tambah data -->
                            <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt=""
                                                width="70px">
                                            <h3 class="modal-title"><b>Tambah Data Aset</b>
                                            </h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('aset.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <label><b>Kode</b></label>
                                                            <input type="text" class="form-control" id="kode"
                                                                placeholder="Masukkan Kode" name="kode"
                                                                value="{{ old('kode') }}" required>
                                                        </div>

                                                        <div class="col-xl-6 ">
                                                            <label><b>Nama Aset</b></label>
                                                            <input type="text" class="form-control" id="nama"
                                                                placeholder="Masukkan Nama Aset" name="nama"
                                                                value="{{ old('nama') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Supplier</b></label>
                                                            <select class="form-control" name="supplier_id" id="supplier_id"
                                                                required>
                                                                <option value="" hidden>Pilih
                                                                    Supplier</option>
                                                                @foreach ($supplier as $data)
                                                                    <option value="{{ $data->id }}"
                                                                        {{ $sup == $data->id ? 'selected' : '' }}>
                                                                        {{ $data->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-xl-6 mt-2 ">
                                                            <label><b>Nama
                                                                    Penerima</b></label>
                                                            <input type="text" class="form-control" id="nama_penerima"
                                                                placeholder="Masukkan Nama Penerima" name="nama_penerima"
                                                                value="{{ old('nama_penerima') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Tanggal Pembelian</b></label>
                                                            <input type="date" class="form-control"
                                                                id="tanggal_pembelian"
                                                                placeholder="Masukkan Tanggal Pembelian"
                                                                name="tanggal_pembelian"
                                                                value="{{ old('tanggal_pembelian') }}" required>
                                                        </div>
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Tanggal Akhir Garansi</b></label>
                                                            <input type="date" class="form-control"
                                                                id="tanggal_akhir_garansi"
                                                                placeholder="Masukkan Tanggal Akhir Garansi"
                                                                name="tanggal_akhir_garansi"
                                                                value="{{ old('tanggal_akhir_garansi') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-12 mt-2">
                                                            <label>
                                                                <b>Gambar</b>
                                                            </label>
                                                            <input class="form-control" type="file" id="gambar"
                                                                name="gambar" placeholder="Pilih Gambar" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Brand</b></label>
                                                            <input type="text" class="form-control" id="brand"
                                                                placeholder="Masukkan Brand Aset" name="brand"
                                                                value="{{ old('brand') }}" required>
                                                        </div>
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Harga</b></label>
                                                            <input type="number" class="form-control" id="nilai_harga"
                                                                placeholder="Masukkan Harga Aset" name="nilai_harga"
                                                                value="{{ old('nilai_harga') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Kondisi</b></label>
                                                            <select class="form-control" name="kondisi" id="kondisi"
                                                                required>
                                                                <option value="" hidden>Pilih Kondisi Aset</option>
                                                                @foreach ($kondisi as $kondisis)
                                                                    <option value="{{ $kondisis }}">
                                                                        {{ $kondisis }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Kategori</b></label>
                                                            <select class="form-control" name="kategori_id"
                                                                id="kategori_id" required>
                                                                <option value="" hidden>
                                                                    Pilih Kategori Aset
                                                                </option>
                                                                @foreach ($kategori as $data)
                                                                    <option value="{{ $data->id }}"
                                                                        {{ $kat == $data->id ? 'selected' : '' }}>
                                                                        {{ $data->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-12 mt-2">
                                                            <label><b>Anggaran Dana
                                                                </b></label>
                                                            <select class="form-control" name="anggaran_dana_id"
                                                                id="anggaran_dana_id" required>
                                                                <option value="" hidden>Pilih
                                                                    Anggaran Dana
                                                                </option>
                                                                @foreach ($anggaran_dana as $data)
                                                                    <option value="{{ $data->id }}"
                                                                        {{ $ad == $data->id ? 'selected' : '' }}>
                                                                        {{ $data->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Ruang
                                                                    Aset</b></label>
                                                            <select class="form-control" name="ruang_id" id="ruang_id"
                                                                required>
                                                                <option value="" hidden>Pilih
                                                                    Ruang
                                                                    Aset</option>
                                                                @foreach ($ruang as $data)
                                                                    <option value="{{ $data->id }}"
                                                                        {{ $rua == $data->id ? 'selected' : '' }}>
                                                                        {{ $data->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Penempatan
                                                                    Aset</b></label>
                                                            <input type="text" class="form-control" id="tempat"
                                                                placeholder="Masukkan Penempatan Aset" name="tempat"
                                                                value="{{ old('tempat') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Jenis
                                                                    Pemeliharan</b></label>
                                                            <select class="form-control" name="jenis_pemeliharaan_id"
                                                                id="jenis_pemeliharaan_id" required>
                                                                <option value="" hidden>Pilih
                                                                    Jenis
                                                                    Pemeliharaan
                                                                </option>
                                                                @foreach ($jenis_pemeliharaan as $data)
                                                                    <option value="{{ $data->id }}"
                                                                        {{ $jp == $data->id ? 'selected' : '' }}>
                                                                        {{ $data->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Jumlah</b></label>
                                                            <input type="number" class="form-control" id="jumlah"
                                                                placeholder="Masukkan Jumlah Stok" name="jumlah"
                                                                value="{{ old('jumlah') }}" required>
                                                        </div>
                                                        <div class="col-xl-6 mt-2">
                                                            <label><b>Satuan</b></label>
                                                            <input type="text" class="form-control" id="satuan"
                                                                placeholder="Masukkan Satuan Aset" name="satuan"
                                                                value="{{ old('satuan') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12 mt-2">
                                                            <label><b>Deskripsi</b></label>
                                                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"
                                                                placeholder="Masukkan Deskripsi" value="{{ old('deskripsi') }}"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="modal-footer border-top-0 d-flex mt-2">
                                                    <button type="button" class="btn btn-danger light text-center"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="add"
                                                        class="btn btn-primary">Tambahkan
                                                        Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


                            <!-- center modal import excel data aset  -->
                            <div class="modal fade" id="modalImportExcel" tabindex="-1" role="dialog"
                                aria-labelledby="modalImportExcelLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt=""
                                                width="70px">
                                            <h3 class="modal-title"><b>Import Data Aset</b>
                                            </h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('aset.import') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-12 mt-2">
                                                            <input class="form-control" type="file" name="file"
                                                                placeholder="Pilih Gambar" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer border-top-0 d-flex mt-2">
                                                    <button type="button" class="btn btn-danger light text-center"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="add"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="cetak">
                                @csrf
                                <table class="table table-striped" id="example3" class="display">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Gambar</th>
                                            <th>Kondisi</th>
                                            <th>Ruang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($aset as $item)
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->kode }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->jumlah }} {{ $item->satuan }}</td>
                                                <td>
                                                    @if ($item['gambar'])
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $item['gambar']) }}"
                                                            alt="" width="60px">
                                                    @endif
                                                </td>
                                                <td>{{ $item->kondisi }}</td>
                                                <td>{{ $item->ruang->nama }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-qrcode text-white shadow btn-xs sharp me-1"
                                                            title="Qr-Code"
                                                            href="{{ route('aset.qrcode', ['id' => $item->kode]) }}">
                                                            <i class="fa fa-qrcode"></i></a>
                                                        <a class="btn btn-detail text-white shadow btn-xs sharp me-1"
                                                            title="Detail"
                                                            href="{{ route('aset.show', ['id' => $item->id]) }}">
                                                            <i class="fas fa-eye"></i></a>
                                                        <a class="btn btn-edit text-white shadow btn-xs sharp me-1"
                                                            title="Edit" data-bs-toggle="modal"
                                                            data-bs-target=".edit{{ $item->id }}">
                                                            <i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmation(event)"
                                                            href="{{ route('aset.destroy', ['id' => $item->id]) }}"
                                                            class="btn btn-delete text-white shadow btn-xs sharp me-1"
                                                            title="Hapus">
                                                            <i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- center modal edit data -->
                                            <div class="modal fade edit{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <img src="{{ asset('simas/images/smkn1kalianget.png') }}"
                                                                alt="" width="70px">
                                                            <h3 class="modal-title">
                                                                <b>Edit Aset</b>
                                                            </h3>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('aset.update', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <label><b>Kode</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="kode" placeholder="Masukkan Kode"
                                                                                name="kode"
                                                                                value="{{ $item->kode }}" required>
                                                                        </div>

                                                                        <div class="col-xl-6 ">
                                                                            <label><b>Nama
                                                                                    Aset</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="nama"
                                                                                placeholder="Masukkan Nama Aset"
                                                                                name="nama"
                                                                                value="{{ $item->nama }}" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Supplier</b></label>
                                                                            <select class="form-control"
                                                                                name="supplier_id" id="supplier_id"
                                                                                required>
                                                                                <option value="{{ $item->supplier_id }}"
                                                                                    hidden>
                                                                                    {{ $item->supplier->nama }}
                                                                                </option>
                                                                                @foreach ($supplier as $data)
                                                                                    <option value="{{ $data->id }}"
                                                                                        {{ $sup == $data->id ? 'selected' : '' }}>
                                                                                        {{ $data->nama }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-xl-6 mt-2 ">
                                                                            <label><b>Nama
                                                                                    Penerima</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="nama_penerima"
                                                                                placeholder="Masukkan Nama Penerima"
                                                                                name="nama_penerima"
                                                                                value="{{ $item->nama_penerima }}"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Tanggal
                                                                                    Pembelian</b></label>
                                                                            <input type="date" class="form-control"
                                                                                id="tanggal_pembelian"
                                                                                placeholder="Masukkan Tanggal Pembelian"
                                                                                name="tanggal_pembelian"
                                                                                value="{{ $item->tanggal_pembelian }}"
                                                                                required>
                                                                        </div>
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Tanggal
                                                                                    Akhir
                                                                                    Garansi</b></label>
                                                                            <input type="date" class="form-control"
                                                                                id="tanggalakhirgaransi"
                                                                                placeholder="Masukkan Tanggal Akhir Garansi"
                                                                                name="tanggal_akhir_garansi"
                                                                                value="{{ $item->tanggal_akhir_garansi }}"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-12 mt-2">
                                                                            <label>
                                                                                <b>Gambar</b>
                                                                            </label>
                                                                            <div>
                                                                                @if ($item->gambar)
                                                                                    <img class="img-thumbnail"
                                                                                        src="{{ asset('storage/' . $item->gambar) }}"
                                                                                        alt="" width="100px">
                                                                                    <input class="form-control mt-1"
                                                                                        type="file" id="gambar"
                                                                                        name="gambar">
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Brand</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="brand"
                                                                                placeholder="Masukkan Brand Aset"
                                                                                name="brand"
                                                                                value="{{ $item->brand }}" required>
                                                                        </div>
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Harga</b></label>
                                                                            <input type="number" class="form-control"
                                                                                id="nilai_harga"
                                                                                placeholder="Masukkan Harga Aset"
                                                                                name="nilai_harga"
                                                                                value="{{ $item->nilai_harga }}" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Kondisi</b></label>
                                                                            <select class="form-control" name="kondisi"
                                                                                id="kondisi" required>
                                                                                <option value="{{ $item->kondisi }}"
                                                                                    hidden>
                                                                                    {{ $item->kondisi }}
                                                                                </option>
                                                                                @foreach ($kondisi as $kondisis)
                                                                                    <option value="{{ $kondisis }}">
                                                                                        {{ $kondisis }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Kategori</b></label>
                                                                            <select class="form-control"
                                                                                name="kategori_id" id="kategori_id"
                                                                                required>
                                                                                <option value="{{ $item->kategori_id }}"
                                                                                    hidden>
                                                                                    {{ $item->kategori->nama }}
                                                                                </option>
                                                                                @foreach ($kategori as $data)
                                                                                    <option value="{{ $data->id }}"
                                                                                        {{ $kat == $data->id ? 'selected' : '' }}>
                                                                                        {{ $data->nama }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-12 mt-2">
                                                                            <label><b>Anggaran
                                                                                    Dana
                                                                                </b></label>
                                                                            <select class="form-control"
                                                                                name="anggaran_dana_id"
                                                                                id="anggaran_dana_id" required>
                                                                                <option
                                                                                    value="{{ $item->anggaran_dana_id }}"
                                                                                    hidden>
                                                                                    {{ $item->anggaran_dana->nama }}
                                                                                </option>
                                                                                @foreach ($anggaran_dana as $data)
                                                                                    <option value="{{ $data->id }}"
                                                                                        {{ $ad == $data->id ? 'selected' : '' }}>
                                                                                        {{ $data->nama }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Ruang
                                                                                    Aset</b></label>
                                                                            <select class="form-control" name="ruang_id"
                                                                                id="ruang_id" required>
                                                                                <option value="{{ $item->ruang_id }}"
                                                                                    hidden>
                                                                                    {{ $item->ruang->nama }}
                                                                                </option>
                                                                                @foreach ($ruang as $data)
                                                                                    <option value="{{ $data->id }}"
                                                                                        {{ $rua == $data->id ? 'selected' : '' }}>
                                                                                        {{ $data->nama }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Penempatan
                                                                                    Aset</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="tempat"
                                                                                placeholder="Masukkan Penempatan Aset"
                                                                                name="tempat"
                                                                                value="{{ $item->tempat }}" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Jenis
                                                                                    Pemeliharaan</b></label>
                                                                            <select class="form-control"
                                                                                name="jenis_pemeliharaan_id"
                                                                                id="jenis_pemeliharaan_id" required>
                                                                                <option
                                                                                    value="{{ $item->jenis_pemeliharaan_id }}"
                                                                                    hidden>
                                                                                    {{ $item->jenis_pemeliharaan->nama }}
                                                                                </option>
                                                                                @foreach ($jenis_pemeliharaan as $data)
                                                                                    <option value="{{ $data->id }}"
                                                                                        {{ $jp == $data->id ? 'selected' : '' }}>
                                                                                        {{ $data->nama }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Jumlah</b></label>
                                                                            <input type="number" class="form-control"
                                                                                id="jumlah"
                                                                                placeholder="Masukkan Jumlah Stok"
                                                                                name="jumlah"
                                                                                value="{{ $item->jumlah }}" required>
                                                                        </div>
                                                                        <div class="col-xl-6 mt-2">
                                                                            <label><b>Satuan</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="satuan"
                                                                                placeholder="Masukkan satuan aset"
                                                                                name="satuan"
                                                                                value="{{ $item->satuan }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-12 mt-2">
                                                                            <label><b>Deskripsi</b></label>
                                                                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"
                                                                                placeholder="Masukkan Deskripsi">{{ $item->deskripsi }}
                                                                                                                </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="modal-footer border-top-0 d-flex">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="add"
                                                                    class="btn btn-primary">Update
                                                                    Data</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        @endforeach
                            </div><!-- /.modal -->
                            </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section(' footer')
@endsection
