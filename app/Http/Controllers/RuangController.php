<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RuangController extends Controller
{
    public function index()
    {
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        return view('ruang.index', [
            'ruang' => $ruang
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'nama' => 'required|min:4'
        ]);

        Ruang::where(['id' => $request->id])->first();
        Ruang::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);
        Alert::success('Success', 'Data Ruang berhasil ditambahkan');
        return redirect()->route('ruang.index');
    }

    public function show($id)
    {
        $ruang = Ruang::all()->find($id);
        return view('ruang.show', [
            'ruang'=> $ruang
        ]);
    }

    public function update(Request $request, $id)
    {
        $ruang = Ruang::find($id);
        if(!$ruang) {
            Alert::error('Error', 'Data Ruang tidak ditemukan');
            return redirect()->route('ruang.index');
        }

        $data_ruang = [
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi
        ];

        $ruang->where(['id' => $id])->update($data_ruang);
        Alert::success('Success', 'Data Ruang Berhasil Di Update');
        return redirect()->route('ruang.index');
    }

    public function destroy($id)
    {
        $ruang = Ruang::find($id);
        if(!$ruang) {
            Alert::error('Error', 'Ruang Tidak Ditemukan');
            return redirect()->route('ruang.index');
        }
        $ruang->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Ruang Berhasil dihapus');
        return redirect()->route('ruang.index');
    }
}
