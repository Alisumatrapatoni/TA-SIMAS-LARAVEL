@extends('includes.template')

@section('menunya')
<h2>
    Transaksi <i class="fa fa-solid fa-arrow-right"></i> Histori Peminjaman
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="row container text-center">
                            <a href="{{ route('peminjaman.data') }}" class="btn btn-primary col-1"> Kembali</a>
                            <b><h3>History Peminjaman</h3></b>
                        </div>
                        <div>
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
                        <div class="container">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button class="btn btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> Cetak PDF </i></button>
                                </div>
                                <div>
                                    <form action="{{ route('peminjaman.data-history') }}" method="get">
                                        <div class="input-group mb-3">
                                            <select class="form-select text-center" name="filter" aria-label="Filter">
                                                <option value="semua_history_aset" {{ $filter == 'semua_history_aset' ? 'selected' : '' }}>
                                                    Semua</option>
                                                <option value="aset_sering_dipinjam" {{ $filter == 'aset_sering_dipinjam' ? 'selected' : '' }}>
                                                    Aset Sering Dipinjam</option>
                                                <option value="user_sering_pinjam" {{ $filter == 'user_sering_pinjam' ? 'selected' : '' }}>
                                                    User Sering Pinjam</option>
                                            </select>
                                            <button class="btn btn-primary" type="submit">Filter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @if ($filter == 'aset_sering_dipinjam')
                            <div class="table-responsive" id="cetak">
                                @csrf
                                <table class="table table-striped" id="example3" class="display">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Aset</th>
                                            <th>Gambar</th>
                                            <th>Total Dipinjam</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($asetSeringDipinjam as $asetItem)
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $asetItem->nama }}</td>
                                                <td>
                                                    @if ($asetItem->gambar)
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $asetItem->gambar) }}"
                                                            alt="" width="60px">
                                                    @endif
                                                </td>
                                                <td>{{ $asetItem->total_peminjam }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.modal -->
                        @elseif ($filter == 'user_sering_pinjam')
                            <div class="table-responsive" id="cetak">
                                @csrf
                                <table class="table table-striped" id="example3" class="display">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Gambar</th>
                                            <th>Total Pinjam</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($userSeringPinjam as $userItem)
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $userItem->nama }}</td>
                                                <td>
                                                    @if ($userItem->gambar)
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $userItem->gambar) }}"
                                                            alt="" width="60px">
                                                    @endif
                                                </td>
                                                <td>{{ $userItem->total_pinjam }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.modal -->
                        @else
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
                                            <th>Tanggal Kembali</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($history_peminjaman as $item)
                                            <?php
                                            $asetItem = $aset->where('id', $item->aset_id)->first();
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
                                                <td>{{ $asetItem->nama }}</td>
                                                <td>
                                                    @if ($asetItem->gambar)
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $asetItem->gambar) }}"
                                                            alt="" width="60px">
                                                    @endif
                                                </td>
                                                <td>{{ $item->tanggal_pinjam }}</td>
                                                <td>{{ $item->tanggal_kembali }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a onclick="confirmation(event)"
                                                            href="{{ route('peminjaman.destroy_history', ['id' => $item->id]) }}"
                                                            class="btn btn-delete text-white shadow btn-xs sharp  me-1"
                                                            title="Hapus">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a class="btn btn-detail text-white shadow btn-xs sharp me-1"
                                                            href="{{ route('peminjaman.show', ['id' => $item->id]) }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.modal -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section(' footer')
@endsection
