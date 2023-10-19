@extends('includes.template')

@section('menunya')
<h2>
    Aset <i class="fa fa-solid fa-arrow-right"></i> Jadwal Pemeliharaan
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Jadwal Pemeliharaan</b></h4>
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
                        $datas = old('aset');
                    @endphp
                    <div>
                        <button type="button" class="btn btn-primary mb-4 " data-bs-toggle="modal" data-bs-target=".modal"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambah Data</button>
                    </div>

                    <!-- center modal tambah data -->
                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt="" width="70px">
                                    <h3 class="modal-title"><b>Tambah Jadwal Pemeliharaan</b></h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('jadwal_pemeliharaan.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-12 mt-2">
                                                    <label for="aset"><b>Aset</b></label>
                                                    <select class="form-control" name="aset_id" id="aset_id" required>
                                                        <option value="" hidden>Please select</option>
                                                        @foreach ($aset as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $datas == $data->id ? 'selected' : '' }}>
                                                                {{ $data->kode }} - {{ $data->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 mt-2">
                                                    <label><b>Tanggal Pemeliharaan</b></label>
                                                    <input type="date" class="form-control" id="tanggal_mulai"
                                                        placeholder="Masukkan Tanggal Pemeliharaan" name="tanggal_mulai"
                                                        value="{{ old('tanggal') }}" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 mt-2">
                                                    <label><b>Tanggal Selesai</b></label>
                                                    <input type="date" class="form-control" id="tanggal_selesai"
                                                        placeholder="Masukkan Tanggal Selesai Pemeliharaan"
                                                        name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 mt-2">
                                                    <label><b>Status</b></label>
                                                    <select class="form-control" name="status" id="status" required>
                                                        <option value="" hidden>Pilih Status Maintenance</option>
                                                        @foreach ($status as $sts)
                                                            <option value="{{ $sts }}">
                                                                {{ $sts }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" name="add" class="btn btn-primary">Tambahkan
                                                Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>

                <div class="card-body" id="cetak">
                    <div class="table-responsive">
                        @csrf
                        <table class="table table-striped mb-2" id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    {{-- <th>Status</th> --}}
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Nama Aset</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Pemeliharaan</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($jp as $item)
                                    <?php
                                    $btn = '';
                                    if ($item->status == 'SELESAI'):
                                        $badge = 'badge-success';
                                    elseif ($item->status == 'PROSES'):
                                        $badge = 'badge-primary';
                                    else:
                                        $badge = 'badge-danger';
                                    endif;
                                    ?>
                                    <tr>
                                        <td><span class="badge {{ $badge }} text-center">{{ $item->status }}</span>
                                        </td>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->aset->nama }}</td>
                                        <td>
                                            @if ($item->aset->gambar)
                                                <img class="img-thumbnail"
                                                    src="{{ asset('storage/' . $item->aset['gambar']) }}" alt=""
                                                    width="60px">
                                            @endif
                                        </td>
                                        <td>{{ $item->tanggal_mulai }}</td>
                                        <td>{{ $item->tanggal_selesai }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-edit text-white shadow btn-xs sharp me-1" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target=".edit{{ $item->id }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a onclick="confirmation(event)"
                                                    href="{{ route('jadwal_pemeliharaan.destroy', ['id' => $item->id]) }}"
                                                    class="btn btn-delete text-white shadow btn-xs sharp me-1"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- center modal edit data -->
                                    <div class="modal fade edit{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <img src="{{ asset('simas/images/smkn1kalianget.png') }}"
                                                        alt="" width="70px">
                                                    <h3 class="modal-title"><b>Edit Jadwal</b></h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('jadwal_pemeliharaan.update', $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <label><b>Aset</b></label>
                                                                    <select class="form-control" name="aset_id"
                                                                        id="aset_id" required readonly hidden>
                                                                        @foreach ($aset as $data)
                                                                            <option value="{{ $data->id }}"
                                                                                {{ $datas == $data->id ? 'selected' : 'hidden' }}>
                                                                                {{ $data->kode }} -
                                                                                {{ $data->nama }} -
                                                                                {{ $data->kategori->nama }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $item->aset->nama }}" required readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12 mt-2">
                                                                    <label><b>Tanggal Mulai Pemeliharaan</b></label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal_mulai"
                                                                        placeholder="Masukkan Tanggal Pemeliharaan"
                                                                        name="tanggal_mulai"
                                                                        value="{{ $item->tanggal_mulai }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12 mt-2">
                                                                    <label><b>Tanggal Selesai Pemeliharaan</b></label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal_selesai"
                                                                        placeholder="Masukkan Tanggal Selesai Pemeliharaan"
                                                                        name="tanggal_selesai"
                                                                        value="{{ $item->tanggal_selesai }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12 mt-2">
                                                                    <label><b>Status Maintenance</b></label>
                                                                    <select class="form-control" name="status"
                                                                        id="status" required>
                                                                        <option value="{{ $item->status }}" hidden>
                                                                            {{ $item->status }}
                                                                        </option>
                                                                        @foreach ($status as $sts)
                                                                            <option value="{{ $sts }}">
                                                                                {{ $sts }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-top-0 d-flex">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" name="add"
                                                                class="btn btn-primary">Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endforeach
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
