<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeliharaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisPemeliharaanController extends Controller
{

    public function index()
    {
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y')->get();
        $jenis_pemeliharaan = JenisPemeliharaan::all();
        return view('jenis_pemeliharaan.index', [
            'jenis_pemeliharaan' => $jenis_pemeliharaan
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4'
        ]);

        JenisPemeliharaan::where(['id' => $request->id])->first();
        JenisPemeliharaan::create([
            'nama' => $request->nama,
        ]);
        Alert::success('Success', 'Data Jenis Pemeliharaan Berhasil Ditambahkan');
        return redirect()->route('jenis_pemeliharaan.index');
    }

    public function show($id)
    {
        $jenis_pemeliharaan = JenisPemeliharaan::find($id);
        return view('jenis_pemeliharaan.show', [
            'jenis_pemeliharaan' => $jenis_pemeliharaan
        ]);
    }

    public function update(Request $request, $id)
    {
        $jenis_pemeliharaan = JenisPemeliharaan::find($id);
        if(!$jenis_pemeliharaan) {
            Alert::error('Error', 'Jenis Pemeliharaan Tidak Ditemukan');
            return redirect()->route('jenis_pemeliharaan.index');
        }

        $data_jenis_pemeliharaan = [
            'nama' => $request->nama,
        ];

        $jenis_pemeliharaan->where(['id' => $id])->update($data_jenis_pemeliharaan);
        Alert::success('Success', 'Jenis Pemeliharaan Berhasil Di Update');
        return redirect()->route('jenis_pemeliharaan.index');
    }

    public function destroy($id)
    {
        $jenis_pemeliharaan = JenisPemeliharaan::find($id);
        if(!$jenis_pemeliharaan) {
            Alert::error('Error', 'Jenis Pemeliharaan Tidak Ditemukan');
            return redirect()->route('jenis_pemeliharaan.index');
        }
        $jenis_pemeliharaan->where(['id' => $id])->update(['aktif' => 't']);
        Alert::succes('Success', 'Data Berhasil Dihapus');
        return redirect()->route('jenis_pemeliharaan.index');
    }
}
