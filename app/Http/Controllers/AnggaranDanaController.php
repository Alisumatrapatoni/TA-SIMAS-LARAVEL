<?php

namespace App\Http\Controllers;

use App\Models\AnggaranDana;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnggaranDanaController extends Controller
{

    public function index()
    {
        $anggaran_dana = AnggaranDana::where('aktif', '=', 'y')->get();
        return view('anggaran_dana.index', [
            'anggaran_dana' => $anggaran_dana
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4'
        ]);

        AnggaranDana::where(['id' => $request->id])->first();
        AnggaranDana::create([
            'nama' => $request->nama,
        ]);
        Alert::success('Success', 'Data Anggaran Dana Berhasil Ditambahkan');
        return redirect()->route('anggaran_dana.index');
    }

    public function update(Request $request, $id)
    {
        $anggaran_dana = AnggaranDana::find($id);
        if (!$anggaran_dana) {
            Alert::error('Error', 'Data Anggaran Dana Tidak Ditemukan');
            return redirect()->route('anggaran_dana');
        }

        $data_anggaran_dana = [
            'nama' => $request->nama,
        ];

        $anggaran_dana->where(['id' => $id])->update($data_anggaran_dana);
        Alert::success('Success', 'Data Anggaran Dana Berhasil Di Update!');
        return redirect()->route('anggaran_dana.index');
    }

    public function destroy($id)
    {
        $anggaran_dana = AnggaranDana::find($id);
        if (!$anggaran_dana) {
            Alert::error('Error', 'Data Anggaran dana TIdak Ditemukan');
            return redirect()->route('anggaran_dana.index');
        }
        $anggaran_dana->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Anggaran Dana Berhasil Di Hapus');
        return redirect()->route('anggaran_dana.index');
    }
}
