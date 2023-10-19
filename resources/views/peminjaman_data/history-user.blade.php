@extends('includes.template')

@section('menunya')
    Peminjaman <i class="fa fa-solid fa-arrow-right"></i> History
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="row container text-center">
                            <h3><b>History Pinjam</b></h3>
                        </div>
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
                        <div class="card-body">
                            <div class="table-responsive" id="cetak">
                                @csrf
                                <table class="table table-striped" id="example3" class="display">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Keperluan</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($history_peminjaman as $item)
                                            <?php
                                            if ($item['status'] == 'PROSES'):
                                                $badge = 'badge-info';
                                            elseif ($item['status'] == 'DITERIMA'):
                                                $badge = 'badge-success';
                                            elseif ($item['status'] == 'SELESAI'):
                                                $badge = 'badge-primary';
                                            else:
                                                $badge = 'badge-danger';
                                            endif;
                                            ?>
                                            <tr class="text-center">
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <span class="badge {{ $badge }} text-center">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                                <td>{{ $item->aset->nama }}</td>
                                                <td>{{ $item->aset->kategori->nama }}</td>
                                                <td>
                                                    @if ($item->aset['gambar'])
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $item->aset['gambar']) }}"
                                                            alt="" width="60px">
                                                    @endif
                                                </td>
                                                <td>{{ $item->tanggal_pinjam }}</td>
                                                <td>{{ $item->tanggal_kembali }}</td>
                                                <td>{{ $item->keperluan }}</td>
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
    </div>
    </div>
@endsection
@section(' footer')
@endsection
