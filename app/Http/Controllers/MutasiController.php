<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Mutasi;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class MutasiController extends Controller
{
    public function index(Request $request)
    {
        $keyword_search = $request->get('keyword_search');

        $aset = Aset::join('kategori', 'kategori.id', '=', 'aset.kategori_id')
            ->join('ruang', 'ruang.id', '=', 'aset.ruang_id')
            ->select(
                'aset.*',
                'kategori.nama as nama_kategori',
                'ruang.nama as nama_ruang'
            )
            ->where(function ($query) use ($keyword_search) {
                $query->where(function ($query) use ($keyword_search) {
                    $query->where('aset.nama', 'like', '%' . strtolower($keyword_search) . '%')
                        ->orWhere('aset.kode', 'like', '%' . strtolower($keyword_search) . '%')
                        ->orWhere('aset.tempat', 'like', '%' . strtolower($keyword_search) . '%')
                        ->orWhere('kategori.nama', 'like', '%' . strtolower($keyword_search) . '%')
                        ->orWhere('ruang.nama', 'like', '%' . strtolower($keyword_search) . '%')
                        ->orWhere('aset.nilai_harga', 'like', '%' . strtolower($keyword_search) . '%');
                });
            })
            ->where('aset.aktif', '=', 'y')
            ->paginate(3);

        $kategori = Kategori::where('aktif', '=', 'y')->get();
        return view('mutasi.index', [
            'asets'     => $aset,
            'kategori'  => $kategori,
            'status'    => ['Bertambah', 'Berkurang']
        ]);
    }

    public function store_tambah(Request $request)
    {
        $aset_id = $request->aset_id;
        $user = session('userdata')['id'];
        $aset = Aset::find($aset_id);
        if (!$aset) {
            Alert::error('Error', 'Aset tidak ditemukan!');
            return redirect()->route('mutasi.index');
        }
        $gambar = null;
        if ($request->file('gambar')) {
            $gambar_extension = $request->file('gambar')->extension();
            if (in_array($gambar_extension, array('jpg', 'jpeg', 'png', 'gif', 'jfif')) == false) {
                Alert::error('Error', 'Type gambar yang diijinkan jpg,jpeg,png,gif,jfif!');
                return redirect()->route('mutasi.index');
            }
            $gambar = $request->file('gambar')->store('public/gambar_mutasi');
            $gambar = str_replace('public/', '', $gambar);
        }

        $mutasi = Mutasi::where('aset_id', $aset_id)
            ->where('aktif', '=', 'y')->first();
        Mutasi::create([
            'aset_id'               => $aset_id,
            'user_id'               => $user,
            'jumlah_request'        => $request->jumlah_request,
            'nilai_harga_request'   => $request->nilai_harga_request,
            'gambar'                => ($gambar) ? $gambar : null,
            'keterangan'            => $request->keterangan,
            'status'                => 'Bertambah'
        ]);
        if ($mutasi && $mutasi->aktif == 'y' || $mutasi === null) {
            $aset->jumlah += $request->jumlah_request;
            $aset->nilai_harga += $request->nilai_harga_request;
            $aset->save();
        }
        Alert::success('Success', 'Aset berhasil dimutasi!');
        return redirect()->route('mutasi.index');
    }

    public function store_kurang(Request $request)
    {
        $gambar = null;
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('public/gambar_mutasi');
            $gambar = str_replace('public/', '', $gambar);
        }
        $aset_id = $request->aset_id;
        $user = session('userdata')['id'];
        $aset = Aset::find($aset_id);
        if (!$aset) {
            Alert::error('Error', 'Aset tidak ditemukan!');
            return redirect()->route('mutasi.index');
        }
        $gambar = null;
        if ($request->file('gambar')) {
            $gambar_extension = $request->file('gambar')->extension();
            if (in_array($gambar_extension, array('jpg', 'jpeg', 'png', 'gif', 'jfif')) == false) {
                Alert::error('Error', 'Type gambar yang diijinkan jpg,jpeg,png,gif,jfif!');
                return redirect()->route('mutasi.index');
            }
            $gambar = $request->file('gambar')->store('public/gambar_mutasi');
            $gambar = str_replace('public/', '', $gambar);
        }

        $mutasi = Mutasi::where('aset_id', $aset_id)
            ->where('aktif', '=', 'y')->first();

        Mutasi::create([
            'aset_id'               => $aset_id,
            'user_id'               => $user,
            'jumlah_request'        => $request->jumlah_request,
            'nilai_harga_request'   => $request->nilai_harga_request,
            'status'                => 'Berkurang',
            'gambar'                => ($gambar) ? $gambar : null,
            'keterangan'            => $request->keterangan,
        ]);
        if ($mutasi && $mutasi->aktif == 'y' || $mutasi === null) {
            $aset->jumlah -= $request->jumlah_request;
            $aset->nilai_harga -= $request->nilai_harga_request;
            $aset->save();
        }
        Alert::success('Success', 'Aset berhasil dimutasi!');
        return redirect()->route('mutasi.index');
    }

    public function data()
    {
        $mutasi = Mutasi::where('aktif', '=', 'y')->get();
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $user = User::where('aktif', '=', 'y')->get();

        return view('mutasi.data', [
            'mutasi'    => $mutasi,
            'aset'      => $aset,
            'kategori'  => $kategori,
            'user'      => $user
        ]);
    }

    public function destroy($id)
    {
        $mutasi = Mutasi::find($id);
        if (!$mutasi) {
            Alert::error('Error', 'Data Aset Tidak Ditemukan');
            return redirect()->route('aset.index');
        }
        $mutasi->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Mutasi Berhasil Dihapus');
        return redirect()->route('mutasi.data');
    }

}
