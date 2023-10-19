@extends('includes.template')

@section('menunya')
    Pengguna
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class=" mt-2 mt-sm-0">
                    <a href="{{ route('user.index') }}">
                        <span class="badge badge-pill badge-primary"><i class="	fa fa-arrow-circle-left"></i></span>
                    </a>
                </div>

                <h4 class="card-title text-center"><b>Edit User</b></h4>
                <!-- center modal -->
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
                <div class="container">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>NIP</b></h5>
                                    </label>
                                    <input type="number" class="form-control" id="nip" name="nip"
                                        value="{{ $user->nip }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Nama</b></h5>
                                    </label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $user->nama }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Jenis Kelamin</b></h5>
                                    </label>

                                    <div class="radio">
                                        <label for="jk_l" class="form-check-label">
                                            <input type="radio" {{ $jk == 'Laki-laki' ? 'checked' : '' }} checked required
                                                id="jk_l" name="jk" value="Laki-laki" class="form-check-input">
                                            Laki -
                                            laki
                                        </label>
                                        <label for="jk_p" class="form-check-label ml-5 ">
                                            <input type="radio" {{ $jk == 'Perempuan' ? 'checked' : '' }} checked required
                                                id="jk_p" name="jk" value="Perempuan" class="form-check-input">
                                            Perempuan
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>No. Hp</b></h5>
                                    </label>
                                    <input type="number" class="form-control" id="no_telepon" placeholder="Masukkan No. HP"
                                        name="no_telepon" value="0{{ $user->no_telepon }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Divisi</b></h5>
                                    </label>
                                    <select class="form-control" name="divisi" id="divisi" required>
                                        @foreach ($divisi as $divisi)
                                            <option value="{{ $divisi->id }}"
                                                {{ $div == $divisi->id ? 'selected' : '' }}>
                                                {{ $divisi->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Alamat</b></h5>
                                    </label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat"
                                        name="alamat" value="{{ $user->alamat }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Status</b></h5>
                                    </label>
                                    <div class="radio">
                                        <label for="status_a" class="form-check-label ">
                                            <input type="radio" {{ $status == 'ADMIN' ? 'checked' : '' }} checked
                                                required id="status_a" name="status" value="ADMIN"
                                                class="form-check-input"> ADMIN
                                        </label>

                                        <label for="status_u" class="form-check-label">
                                            <input type="radio" {{ $status == 'USER' ? 'checked' : '' }} checked required
                                                id="status_u" name="status" value="USER" class="form-check-input">
                                            USER
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Gambar</b></h5>
                                    </label>
                                    <div>
                                        @if ($user->gambar)
                                            <img class="img-thumbnail" src="{{ asset('storage/' . $user->gambar) }}"
                                                alt="" width="100px">
                                            <input class="form-control" type="file" id="gambar" name="gambar"
                                                value="">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Email</b></h5>
                                    </label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Username</b></h5>
                                    </label>
                                    <input class="form-control" type="text" id="username" name="username"
                                        value="{{ $user->username }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <label>
                                        <h5><b>Password</b></h5>
                                    </label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        value="{{ $user->password }}">
                                </div>
                            </div>

                        </div>
                        <div class="text-center mb-4 mt-3">
                            <button type="submit" name="add" class="btn btn-primary">Update
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
