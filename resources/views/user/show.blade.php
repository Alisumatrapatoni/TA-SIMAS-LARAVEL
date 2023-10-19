@extends('includes.template')

@section('menunya')
<h2>
    Master <i class="fa fa-solid fa-arrow-right"></i> Data Pengguna <i class="fa fa-solid fa-arrow-right"></i> Detail
</h2>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class=" mt-2 mt-sm-0">
                        <a href="{{ route('user.index') }}">
                            <span class="badge badge-pill badge-primary"><i class="	fa fa-arrow-circle-left"></i></span>
                        </a>
                    </div>
                    <div class="text-center">

                        <div class="clearfix"></div>
                        <div>
                            @if ($user->gambar != null)
                                <img class="avatar-lg  img-thumbnail"
                                    src="{{ asset('storage/' . $user['gambar']) }}" alt="" width="100px" />
                            @else
                                <img class="avatar-lg  img-thumbnail"
                                    src="{{ asset('simas/images/ava.png') }}" alt="" width="100px" />
                            @endif
                        </div>
                        <h5 class="mt-3 mb-1">
                            {{ $user->nama }}
                        </h5>
                        {{-- <div class="mt-4">
                            <button type="button" class="btn btn-primary btn-sm"><i class="uil uil-envelope-alt me-2"></i>
                                Kirim Pesan</button>
                        </div> --}}
                    </div>
                    <hr class="my-4">
                    <div class="text-muted">
                        <div class="table-responsive mt-4">
                            <div>
                                <p class="mb-1">Nama :</p>
                                <h5 class="font-size-16">
                                    {{ $user->nama }}
                                </h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">No Hp :</p>
                                <h5 class="font-size-16">
                                    0{{ $user->no_telepon }}
                                </h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">E-mail :</p>
                                <h5 class="font-size-16">{{ $user->email }}</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">Status :</p>
                                <h5 class="font-size-16">{{ $user->status }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
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
                                    $status = $user->status;
                                    $div = $user->divisi_id;
                                    $jk = $user->jenis_kelamin;
                                @endphp
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                        class="nav-link active show">Profil</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                        class="nav-link">Pengaturan</a>
                                </li>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="about-me" class="tab-pane fade active show">
                                    <div class="profile-personal-info">
                                        <br>
                                        @if ($user->no_telepon == null || $user->jenis_kelamin == null || $user->alamat == null)
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" class="me-2">
                                                    <path
                                                        d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                                    </path>
                                                    <line x1="12" y1="9" x2="12" y2="13">
                                                    </line>
                                                    <line x1="12" y1="17" x2="12.01" y2="17">
                                                    </line>
                                                </svg>
                                                <strong>Peringatan!</strong> Data belum lengkap. Silahkan lengkapi profilmu
                                                sekarang.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="btn-close">
                                                </button>
                                            </div>
                                        @endif
                                        <br>
                                        <h4 class="text-primary mb-4">Informasi Pribadi</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">NIP </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">{{ $user->nip }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Username
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                {{ $user->username }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Nama</h5>
                                            </div>
                                            <div class="col-sm-9 col-7">{{ $user->nama }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Jenis Kelamin </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                {{ $user->jenis_kelamin }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Alamat
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                {{ $user->alamat }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">Kontak Pribadi</h4>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-6 col-6">
                                                <h5 class="f-w-500"><i class="fas fa-phone-alt"></i>
                                                    0{{ $user->no_telepon }}

                                                </h5>
                                            </div>
                                            <div class="col-sm-6 col-6">
                                                <h5 class="f-w-500"><i class="fas fa-envelope"></i>
                                                    {{ $user->email }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <br>
                                            <h4 class="text-primary">Pengaturan Profil</h4>
                                            <form action="{{ route('user.update', $user->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Nama</label>
                                                        <input type="text" value="{{ $user->nama }}"
                                                            class="form-control" name="nama">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Status</label>
                                                        <input type="text" value="{{ $user->status }}"
                                                            class="form-control" name="status" readonly>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Divisi</label>
                                                        <select class="form-control" name="divisi_id" id="divisi_id"
                                                            required>
                                                            <option value="">Please select</option>
                                                            @foreach ($divisi as $divisi)
                                                                <option value="{{ $divisi->id }}"
                                                                    {{ $div == $divisi->id ? 'selected' : '' }}>
                                                                    {{ $divisi->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">No Hp</label>
                                                        <input type="number" value="0{{ $user->no_telepon }}"
                                                            class="form-control" name="no_telepon" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" class="form-control-file"
                                                    value="{{ $user->id }}">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        <div class="radio">
                                                            <div class="mr-5">
                                                                <label for="jk_l" class="form-check-label">
                                                                    <input type="radio"
                                                                        {{ $jk == 'Laki-laki' ? 'checked' : '' }} checked
                                                                        required id="jk_l" name="jk"
                                                                        value="Laki-laki" class="form-check-input"> Laki -
                                                                    laki
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label for="jk_p" class="form-check-label ml-5 ">
                                                                    <input type="radio"
                                                                        {{ $jk == 'Perempuan' ? 'checked' : '' }} checked
                                                                        required id="jk_p" name="jk" value="Perempuan"
                                                                        class="form-check-input"> Perempuan
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" value="{{ $user->email }}"
                                                            class="form-control" name="email" readonly>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Foto Profil</label>
                                                        <div>
                                                            @if ($user->gambar)
                                                                <img class="img-thumbnail"
                                                                    src="{{ asset('storage/' . $user->gambar) }}"
                                                                    alt="" width="100px">
                                                            @endif
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input form-control"
                                                                    name="gambar">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="gambar" id="gambar"
                                                            class="form-control-file">

                                                    </div>
                                                </div>
                                                <div class="row">

                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $user->alamat }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" id="username" value="{{ $user->username }}"
                                                        class="form-control" name="username">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" id="password" value="{{ $user->password }}"
                                                        class="form-control" name="password">
                                                </div>
                                                <button class="btn btn-primary" type="submit">Update Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
@endsection
