@extends('includes.template')

@section('menunya')
<h2>
    Aset <i class="fa fa-solid fa-arrow-right"></i> Histori Mutasi
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('mutasi.index') }}" class="btn btn-danger mb-2"> Kembali</a>
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header">
                            <h4 class="card-title"> History Mutasi Aset</h4>

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
                            @endphp
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="cetak">
                                @csrf
                                <table class="table table-striped" id="example3" class="display">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Username Pemutasi</th>
                                            <th>Kode Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Gambar</th>
                                            <th>Jumlah Mutasi</th>
                                            <th>Status</th>
                                            <th>Tanggal Mutasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($mutasi as $item)
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->user->username }}</td>
                                                <td>{{ $item->aset->kode }}</td>
                                                <td>{{ $item->aset->nama }}</td>
                                                <td>
                                                    @if ($item->aset['gambar'])
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $item->aset['gambar']) }}"
                                                            alt="" width="60px">
                                                    @endif
                                                </td>
                                                <td>{{ $item->jumlah_request }} {{ $item->aset->satuan }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a onclick="confirmation(event)"
                                                            href="{{ route('mutasi.destroy', ['id' => $item->id]) }}"
                                                            class="btn btn-delete text-white" title="Hapus">Hapus</a>
                                                    </div>
                                                </td>
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
    </div>
@endsection
@section(' footer')
@endsection
