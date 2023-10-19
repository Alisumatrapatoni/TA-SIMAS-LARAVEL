@extends('includes.template')

@section('menunya')
<h2>
    Master <i class="fa fa-solid fa-arrow-right"></i> Data Pengguna
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b><h3 class="">Data Pengguna</h3></b>
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
                        $status = old('status');
                        $jk = old('jk');
                        $div = old('divisi');
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
                                    <h3 class="modal-title"><b>Tambah Pengguna</b></h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <label for="nip">
                                                        <b>NIP</b>
                                                    </label>
                                                    <input type="number" class="form-control" id="nip"
                                                        placeholder="Masukkan NIP" name="nip"
                                                        value="{{ old('nip') }}" required>
                                                </div>

                                                <div class="col-xl-7 ">
                                                    <label for="iduser"><b>Nama Pengguna</b></label>
                                                    <input type="text" class="form-control" id="nama"
                                                        placeholder="Masukkan Nama Pengguna" name="nama"
                                                        value="{{ old('nama') }}" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-5 mt-2">
                                                    <label for="jeniskelamin"><b>Jenis Kelamin</b></label>
                                                    <div class="radio">

                                                        <label for="jk_p" class="form-check-label ">
                                                            <input type="radio" {{ $jk == 'Perempuan' ? 'checked' : '' }}
                                                            required id="jk_p" name="jk" value="Perempuan"
                                                            class="form-check-input">
                                                            Perempuan
                                                        </label>
                                                        <label for="jk_l" class="form-check-label">
                                                            <input type="radio" {{ $jk == 'Laki-laki' ? 'checked' : '' }}
                                                                checked required id="jk_l" name="jk"
                                                                value="Laki-laki" class="form-check-input">Laki - laki
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl-7 mt-2">
                                                    <label for="nohp"><b>No. Hp</b></label>
                                                    <input type="number" class="form-control" id="no_telepon"
                                                        placeholder="Masukkan No. HP" name="no_telepon"
                                                        value="{{ old('no_telepon') }}" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 mt-2">
                                                    <label for="divisi"><b>Divisi</b></label>
                                                    <select class="form-control" name="divisi" id="divisi" required>
                                                        <option value="">Please select</option>
                                                        @foreach ($divisi as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $div == $data->id ? 'selected' : '' }}>
                                                                {{ $data->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 mt-2">
                                                    <label for="alamat"><b>Alamat</b></label>
                                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Masukkan Alamat"
                                                        name="alamat" value="{{ old('alamat') }}" required></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 mt-2">
                                                    <label for="gambar">
                                                        <b>Gambar</b>
                                                    </label>
                                                    <input class="form-control" type="file" id="gambar"
                                                        name="gambar" placeholder="Pilih Gambar">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-4 mt-2">
                                                    <label for="status">
                                                        <b>Role</b>
                                                    </label>
                                                    <div class="radio">
                                                        <label for="status_a" class="form-check-label ">
                                                            <input type="radio"
                                                                {{ $status == 'ADMIN' ? 'checked' : '' }} checked required
                                                                id="status_a" name="status" value="ADMIN"
                                                                class="form-check-input"> ADMIN
                                                        </label>

                                                        <label for="status_u" class="form-check-label">
                                                            <input type="radio" {{ $status == 'USER' ? 'checked' : '' }}
                                                                required id="status_u" name="status" value="USER"
                                                                class="form-check-input">
                                                            USER
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8 mt-2">
                                                    <label for="email">
                                                        <b>Email</b>
                                                    </label>
                                                    <input class="form-control" type="email" id="email"
                                                        name="email" placeholder="Masukkan Email" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6 mt-2">
                                                    <label for="username">
                                                        <b>Username</b>
                                                    </label>
                                                    <input class="form-control" type="text" id="username"
                                                        name="username" placeholder="Masukkann Username" required>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="password">
                                                        <b>Password</b>
                                                    </label>
                                                    <input class="form-control" type="password" id="password"
                                                        name="password" placeholder="Masukkan Password" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer border-top-0 d-flex mt-2">
                                            <button type="button" class="btn btn-danger light text-center"
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
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Role</th>
                                    <th>Divisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nip }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            @if ($item['gambar'])
                                                <img class="img-thumbnail"
                                                    src="{{ asset('storage/' . $item['gambar']) }}" alt=""
                                                    width="60px">
                                            @endif
                                        </td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->divisi->nama }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-detail text-white shadow btn-xs sharp me-1"
                                                    href="{{ route('user.show', ['id' => $item->id]) }}"><i
                                                        class="fas fa-eye"></i></a>
                                                <a class="btn btn-edit text-white shadow btn-xs sharp me-1" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target=".edit{{ $item->id }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a onclick="confirmation(event)"
                                                    href="{{ route('user.destroy', ['id' => $item->id]) }}"
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
                                                    <h3 class="modal-title"><b>Edit Pengguna</b></h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.update', $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-5">
                                                                    <label for="nip">
                                                                        <b>NIP</b>
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        id="nip" placeholder="Masukkan NIP"
                                                                        name="nip" value="{{ $item->nip }}" required>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <label for="iduser"><b>Nama Pengguna</b></label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama"
                                                                        placeholder="Masukkan Nama Pengguna"
                                                                        name="nama" value="{{ $item->nama }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-5 mt-2">
                                                                    <label for="jeniskelamin"><b>Jenis Kelamin</b></label>
                                                                    <div class="radio">

                                                                        <label for="jk_p" class="form-check-label ">
                                                                            <input type="radio"
                                                                            {{ $jk == 'Perempuan' ? 'checked' : '' }}
                                                                            checked required id="jk_p"
                                                                            name="jk" value="Perempuan"
                                                                            class="form-check-input">
                                                                            Perempuan
                                                                        </label>
                                                                        <label for="jk_l" class="form-check-label">
                                                                            <input type="radio"
                                                                                {{ $jk == 'Laki-laki' ? 'checked' : '' }}
                                                                                checked required id="jk_l"
                                                                                name="jk" value="Laki-laki"
                                                                                class="form-check-input">
                                                                            Laki - laki
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7 mt-2">
                                                                    <label for="nohp"><b>No. Hp</b></label>
                                                                    <input type="number" class="form-control"
                                                                        id="no_telepon" placeholder="Masukkan No. HP"
                                                                        name="no_telepon"
                                                                        value="0{{ $item->no_telepon }}" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-12 mt-2">
                                                                    <label><b>Divisi</b></label>
                                                                    <select class="form-control wide" title="divisi id"
                                                                        name="divisi_id" required>
                                                                        <option value="{{ $item->divisi_id }}" selected hidden>
                                                                            {{ $item->divisi->nama }}
                                                                        </option>
                                                                        @foreach ($divisi as $data)
                                                                            <option value="{{ $data->id }}"
                                                                                {{ $div == $data->id ? 'selected' : '' }}>
                                                                                {{ $data->nama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-12 mt-2">
                                                                    <label for="alamat"><b>Alamat</b></label>
                                                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"
                                                                        placeholder="Masukkan Alamat" name="alamat" required>{{ $item->alamat }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-12 mt-2">
                                                                    <label for="gambar">
                                                                        <b>Gambar</b>
                                                                    </label>
                                                                    <div>
                                                                        @if ($item->gambar)
                                                                            <img class="img-thumbnail"
                                                                                src="{{ asset('storage/' . $item->gambar) }}"
                                                                                alt="" width="100px">
                                                                            <input class="form-control" type="file"
                                                                                id="gambar" name="gambar"
                                                                                value="">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-4 mt-2">
                                                                    <label for="status">
                                                                        <b>Role</b>
                                                                    </label>
                                                                    <div class="radio">
                                                                        <label for="status_a" class="form-check-label ">
                                                                            <input type="radio"
                                                                                {{ $status == 'ADMIN' ? 'checked' : '' }}
                                                                                checked required id="status_a"
                                                                                name="status" value="ADMIN"
                                                                                class="form-check-input"> ADMIN
                                                                        </label>

                                                                        <label for="status_u" class="form-check-label">
                                                                            <input type="radio"
                                                                                {{ $status == 'USER' ? 'checked' : '' }}
                                                                                checked required id="status_u"
                                                                                name="status" value="USER"
                                                                                class="form-check-input">
                                                                            USER
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-8 mt-2">
                                                                    <label for="email">
                                                                        <b>Email</b>
                                                                    </label>
                                                                    <input class="form-control" type="email"
                                                                        id="email" name="email"
                                                                        value="{{ $item->email }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-12 mt-2">
                                                                    <label for="username">
                                                                        <b>Username</b>
                                                                    </label>
                                                                    <input class="form-control" type="text"
                                                                        id="username" name="username"
                                                                        value="{{ $item->username }}" required>
                                                                </div>
                                                                <div class="col-xl-12 mt-2">
                                                                    <label for="password">
                                                                        <b>Password</b>
                                                                    </label>
                                                                    <input class="form-control" type="password"
                                                                        id="password" name="password"
                                                                        value="{{ $item->password }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="modal-footer border-top-0 d-flex">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="add"
                                                                    class="btn btn-primary">Update Data</button>
                                                            </div>
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
