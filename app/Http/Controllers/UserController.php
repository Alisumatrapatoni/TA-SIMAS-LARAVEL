<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('aktif', '=', 'y')->get();
        $divisi = Divisi::where('aktif', '=', 'y')->get();
        return view('user.index', [
            'user'      => $user,
            'divisi'    => $divisi
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|min:4'
        ]);

        $gambar = null;
        if ($request->file('gambar')) {
            $gambar_extension = $request->file('gambar')->extension();
            if (in_array($gambar_extension, array('jpg', 'jpeg', 'png', 'gif', 'jfif')) == false) {
                return back()->withInput()->with('error', 'Type gambar yang diijinkan jpg,jpeg,png,gif,jfif!');
            }
            $gambar = $request->file('gambar')->store('public/gambar_user');
            $gambar = str_replace('public/', '', $gambar);
        }

        $user = User::where(['nip' => $request->nip])->first();
        if ($user) {
            Alert::error('Warning', 'NIP sudah terpakai oleh pegawai bernama ' . $user->nama . '!');
            return redirect()->route('user.index');
        }

        User::create([
            'nip'               => $request->nip,
            'nama'              => $request->nama,
            'jenis_kelamin'     => $request->jk,
            'no_telepon'        => $request->no_telepon,
            'alamat'            => $request->alamat,
            'status'            => $request->status,
            'divisi_id'         => $request->divisi,
            'gambar'            => ($gambar) ? $gambar : null,
            'email'             => $request->email,
            'username'          => strtolower($request->username),
            'password'          => Hash::make($request->password),
            'created_at'        => date('Y-m-d H:m:s'),
        ]);
        Alert::success('Success', 'User Berhasil Ditambahkan');
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        $divisi = Divisi::where('aktif', '=', 'y')->get();
        return view('user.show', [
            'user'      => $user,
            'divisi'    => $divisi
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            Alert::error('Error', 'User Tidak Ditemukan');
            return redirect()->route('user.index');
        }

        $gambar = null;
        if ($request->file('gambar')) {
            $gambar_extension = $request->file('gambar')->extension();
            if (in_array($gambar_extension, array('jpg', 'jpeg', 'png', 'gif', 'jfif')) == false) {
                Alert::error('Error', 'Type gambar yang diijinkan jpg,jpeg,png,gif!');
                return redirect()->route('user.index');
            }
            $gambar = $request->file('gambar')->store('public/gambar_user');
            $gambar = str_replace('public/', '', $gambar);
        }

        $data_user = [
            'nama'              => $request->nama,
            'jenis_kelamin'     => $request->jk,
            'no_telepon'        => $request->no_telepon,
            'alamat'            => $request->alamat,
            'status'            => (session('userdata')['status'] == 'ADMIN') ? $request->status : 'USER',
            'divisi_id'         => $request->divisi_id,
            'email'             => $request->email,
            'username'          => $request->username,
            'updated_at'        => date('Y-m-d H:m:s')
        ];
        if($request->password) {
            $data_user['password'] = Hash::make($request->password);
        }
        $user->where(['nip' => $id])->update($data_user);

        if ($gambar){
            $data_user['gambar'] = $gambar;
        }
        $user->where(['id' => $id])->update($data_user);
        Alert::success('Success', 'User Berhasil Di Update!');
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->withInput()->with('error', 'User tidak ditemukan!');
        }
        $user->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'User Berhasil Dihapus');
        return redirect()->route('user.index');
    }
}
