<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        return view('kategori.index', [
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4'
        ]);

        Kategori::where(['id' => $request->id])->first();
        Kategori::create([
            'nama' => $request->nama,
        ]);
        Alert::success('Success', 'Data kategori Berhasil Ditambahkan');
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.show', [
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            Alert::error('Error', 'Kategori Tidak Ditemukan');
            return redirect()->route('kategori.index');
        }

        $data_kategori = [
            'nama' => $request->nama,
        ];

        $kategori->where(['id' => $id])->update($data_kategori);
        Alert::success('Success', 'Kategori Berhasil Di Update!');
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if(!$kategori) {
            Alert::error('Error', 'Kategori Tidak Ditemukan');
            return redirect()->route('kategori.index');
        }
        $kategori->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('kategori.index');
    }
}
