<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DivisiController extends Controller
{

    public function index()
    {
        $divisi = Divisi::where('aktif', '=', 'y')->get();
        return view('divisi.index', [
            'divisi' => $divisi
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'  => 'required|min:4'
        ]);

        Divisi::where(['id' => $request->id])->first();
        Divisi::create([
            'nama'  => $request->nama,
        ]);
        Alert::success('Success', 'Data Divisi Berhasil ditambahkan');
        return redirect()->route('divisi.index');
    }

    public function update(Request $request, $id)
    {
        $divisi = Divisi::find($id);
        if (!$divisi) {
            Alert::error('Error', 'Data Divisi Tidak Ditemukan');
            return redirect()->route('divisi.index');
        }

        $data_divisi = [
            'nama'  => $request->nama,
        ];

        $divisi->where(['id' => $id])->update($data_divisi);
        Alert::success('Success', 'Data Divisi Berhasil Di Update!');
        return redirect()->route('divisi.index');
    }

    public function destroy($id)
    {
        $divisi = Divisi::find($id);
        if(!$divisi) {
            Alert::error('Error', 'Data Divisi Tidak Ditemukan');
            return redirect()->route('divisi.index');
        }
        $divisi->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Divisi Berhasil Di hapus');
        return redirect()->route('divisi.index');
    }
}
