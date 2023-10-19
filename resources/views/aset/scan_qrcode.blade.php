@extends('includes.template')

@section('menunya')
<h2>
    Aset <i class="fa fa-solid fa-arrow-right"></i> Scann Qr-Code
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Scanner Qr-Code</b></h4>
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
                                        {{-- <button onclick="showTable()" type="submit">Submit</button>
                                        <table class="table table-striped hidden" id="myTable">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Gambar</th>
                                                    <th>Kondisi</th>
                                                    <th>Ruang</th>
                                                    <th>Supplier</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($aset as $item)
                                                    <tr class="text-center">

                                                        <td>{{ $item->kode }}</td>
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
                                                        <td>{{ $item->supplier->nama }}</td>
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
                                                @endforeach
                                            </tbody>
                                        </table> --}}
                                    </div>
                                </form>
                                <b>
                                    <hr>
                                </b>

                                @if (app('request')->input('keyword'))
                                    <table class="table table-striped" class="display" id="example5">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Gambar</th>
                                                <th>Kondisi</th>
                                                <th>Ruang</th>
                                                <th>Supplier</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($aset as $item)
                                                <tr class="text-center">

                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if ($item['gambar'])
                                                            <img class="img-thumbnail"
                                                                src="{{ asset('storage/' . $item['gambar']) }}"
                                                                alt="" width="60px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->kondisi }}</td>
                                                    <td>{{ $item->ruang->nama }}</td>
                                                    <td>{{ $item->supplier->nama }}</td>
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
    </div>
@endsection
@section(' footer')
@endsection
