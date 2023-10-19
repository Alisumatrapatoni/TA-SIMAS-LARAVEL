@extends('includes.template')

@section('menunya')
<h2>
    Aset <i class="fa fa-solid fa-arrow-right"></i> History Aset
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
             <a href="{{ route('aset.index') }}" class="btn btn-danger mb-2"> Kembali</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>History Aset</b></h4>
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
                    @endphp

                </div>
                <div class="card-body">
                    <div class="table-responsive" id="cetak">
                        @csrf
                        <table class="table table-striped mb-2" id="example3" class="display">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    {{-- <th>Kode</th> --}}
                                    <th>Kode</th>
                                    <th>Nama</th>
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
                                        <td>
                                            @if ($item['gambar'])
                                                <img class="img-thumbnail" src="{{ asset('storage/' . $item['gambar']) }}"
                                                    alt="" width="60px">
                                            @endif
                                        </td>
                                        <td>{{ $item->kondisi }}</td>
                                        <td>{{ $item->ruang->nama }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a onclick="confirmation_restore(event)"
                                                    href="{{ route('aset.restore', ['id' => $item->id]) }}"
                                                    class="btn btn-restore text-white shadow me-1 ">
                                                    <i class="fa fa-refresh"></i> Pulihkan
                                                </a>
                                                <a class="btn btn-detail text-white shadow me-1"
                                                    href="{{ route('aset.show', ['id' => $item->id]) }}">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                <a onclick="confirmation(event)"
                                                            href="{{ route('aset.destroy_history', ['id' => $item->id]) }}"
                                                            class="btn btn-delete text-white shadow  me-1"
                                                            title="Hapus">
                                                            <i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                    </div><!-- /.modal -->
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section(' footer')
@endsection
