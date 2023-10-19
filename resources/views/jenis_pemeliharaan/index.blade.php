@extends('includes.template')

@section('menunya')
<h2>
    Master <i class="fa fa-solid fa-arrow-right"></i> Data Jenis Pemeliharaan
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Jenis Pemeliharaan</h4>
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
                                    <h3 class="modal-title"><b>Tambah Jenis Pemeliharaan</b></h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('jenis_pemeliharaan.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="namadivisi"><b>Nama Jenis Pemeliharaan</b></label>
                                                    <input type="text" class="form-control" id="nama"
                                                        placeholder="Masukkan Nama Jenis Pemeliharaan" name="nama"
                                                        required>
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
                <div class="card-body">
                    <div class="table-responsive" id="cetak">
                        @csrf
                        <table class="table table-striped mb-2" id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($jenis_pemeliharaan as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-edit text-white shadow btn-xs sharp me-1" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target=".edit{{ $item->id }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a onclick="confirmation(event)"
                                                    href="{{ route('jenis_pemeliharaan.destroy', ['id' => $item->id]) }}"
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
                                                    <img src="{{ asset('simas/images/smkn1kalianget.png') }}" alt=""
                                                        width="70px">
                                                    <h3 class="modal-title"><b>Edit Divisi</b></h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('jenis_pemeliharaan.update', $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <label for="iduser"><b>Jenis Pemeliharaan</b></label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama" value="{{ $item->nama }}"
                                                                        placeholder="Masukkan Nama Jenis Pemeliharaan"
                                                                        name="nama" required>
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
