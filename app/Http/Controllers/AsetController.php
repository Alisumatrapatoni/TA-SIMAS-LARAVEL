<?php

namespace App\Http\Controllers;

use App\Exports\AsetExport;
use App\Imports\AsetImport;

use App\Models\Aset;
use App\Models\Ruang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\AnggaranDana;
use Illuminate\Http\Request;
use App\Models\JenisPemeliharaan;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AsetController extends Controller
{
    public function index()
    {
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $anggaran_dana = AnggaranDana::where('aktif', '=', 'y')->get();
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $supplier = Supplier::where('aktif', '=', 'y')->get();
        return view('aset.index', [
            'aset'                  => $aset,
            'kategori'              => $kategori,
            'anggaran_dana'         => $anggaran_dana,
            'ruang'                 => $ruang,
            'jenis_pemeliharaan'    => $jenis_pemeliharaan,
            'supplier'              => $supplier,
            'kondisi'               => ['Baik', 'Rusak Ringan', 'Rusak Berat']
        ]);
    }

    public function store(Request $request)
    {
        $gambar = null;
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('public/gambar_aset');
            $gambar = str_replace('public/', '', $gambar);
        }

        $aset = Aset::where(['kode' => $request->kode])->first();
        if ($aset) {
            Alert::error('Warning', 'Kode sudah terpakai oleh aset' . $aset->nama . '| Silahkan Ganti Kode Anda');
            return redirect()->route('aset.index');
        }

        $request->qrcode == $request->kode;
        Aset::create([
            'kode'                  => $request->kode,
            'nama'                  => $request->nama,
            'jumlah'                => $request->jumlah,
            'satuan'                => $request->satuan,
            'tanggal_pembelian'     => $request->tanggal_pembelian,
            'tanggal_akhir_garansi' => $request->tanggal_akhir_garansi,
            'nilai_harga'           => $request->nilai_harga,
            'brand'                 => $request->brand,
            'kondisi'               => $request->kondisi,
            'gambar'                => ($gambar) ? $gambar : null,
            'nama_penerima'         => $request->nama_penerima,
            'tempat'                => $request->tempat,
            'deskripsi'             => $request->deskripsi,
            'kategori_id'           => $request->kategori_id,
            'anggaran_dana_id'      => $request->anggaran_dana_id,
            'jenis_pemeliharaan_id' => $request->jenis_pemeliharaan_id,
            'ruang_id'              => $request->ruang_id,
            'supplier_id'           => $request->supplier_id
        ]);
        Alert::success('Success', 'Aset Berhasil Ditambahkan');
        return redirect()->route('aset.index');
    }

    public function show($id)
    {
        $aset               = Aset::find($id);
        $supplier           = Supplier::where('aktif', '=', 'y')->get();
        $kategori           = Kategori::where('aktif', '=', 'y')->get();
        $anggaran_dana      = AnggaranDana::where('aktif', '=', 'y')->get();
        $ruang              = Ruang::where('aktif', '=', 'y');
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y');

        return view('aset.show', [
            'aset'                  => $aset,
            'supplier'              => $supplier,
            'kategori'              => $kategori,
            'anggaran_dana'         => $anggaran_dana,
            'ruang'                 => $ruang,
            'jenis_pemeliharaan'    => $jenis_pemeliharaan,
            'kondisi'               => ['Baik', 'Rusak Ringan', 'Rusak Berat']
        ]);
    }

    public function update(Request $request, $id)
    {
        $aset = Aset::find($id);
        if (!$aset) {
            Alert::error('Error', 'Aset Tidak Ditemukan');
            return redirect()->route('aset.index');
        }

        $gambar = null;
        if ($request->file('gambar')) {
            $gambar_extension = $request->file('gambar')->extension();
            if (in_array($gambar_extension, array('jpg', 'jpeg', 'png', 'gif')) == false) {
                Alert::error('Error', 'Type gambar yang diijinkan jpg,jpeg,png,gif!');
                return redirect()->route('aset.index');
            }
            $gambar = $request->file('gambar')->store('public/gambar_aset');
            $gambar = str_replace('public/', '', $gambar);
        }

        $request->qrcode == $request->kode;
        $aset = Aset::where(['kode' => $request->kode])->first();
        $data_aset = [
            'kode'                  => $request->kode,
            'nama'                  => $request->nama,
            'jumlah'                => $request->jumlah,
            'satuan'                => $request->satuan,
            'tanggal_pembelian'     => $request->tanggal_pembelian,
            'tanggal_akhir_garansi' => $request->tanggal_akhir_garansi,
            'nilai_harga'           => $request->nilai_harga,
            'brand'                 => $request->brand,
            'kondisi'               => $request->kondisi,
            'nama_penerima'         => $request->nama_penerima,
            'tempat'                => $request->tempat,
            'deskripsi'             => $request->deskripsi,
            'kategori_id'           => $request->kategori_id,
            'anggaran_dana_id'      => $request->anggaran_dana_id,
            'jenis_pemeliharaan_id' => $request->jenis_pemeliharaan_id,
            'ruang_id'              => $request->ruang_id,
            'supplier_id'           => $request->supplier_id
        ];
        if ($gambar)
            $data_aset['gambar'] = $gambar;

        $aset->where(['id' => $id])->update($data_aset);
        Alert::success('Success', 'Aset Berhasil Di Update!');
        return redirect()->route('aset.index');
    }

    public function destroy($id)
    {
        $aset = Aset::find($id);
        if (!$aset) {
            Alert::error('Error', 'Data Aset Tidak Ditemukan');
            return redirect()->route('aset.index');
        }
        $aset->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Aset Berhasil Dihapus');
        return redirect()->route('aset.index');
    }

    public function restore($id)
    {
        $aset = Aset::find($id);
        if (!$aset) {
            Alert::error('Error', 'Data Aset Tidak Ditemukan');
            return redirect()->route('aset.index');
        }
        $aset->where(['id' => $id])->update(['aktif' => 'y']);
        Alert::success('Success', 'Data Aset Berhasil Dipulihkan');
        return redirect()->route('aset.index');
    }

    public function qrcode($id)
    {
        $qrcode = Aset::where('kode', $id)->first();
        return view('aset.qrcode', [
            'qrcode'  => $qrcode
        ]);
    }

    public function scan_qrcode(Request $request)
    {
        if ($request->keyword) {
            $aset = Aset::search($request->keyword)->get();
        } else {
            $aset = Aset::where('aktif', '=', 'y')->get();
        }
        return view('aset.scan_qrcode', [
            'aset' => $aset
        ]);
    }

    public function cetakqrcode($id)
    {
        $qrcode = Aset::where('kode', $id)->first();
        return view('aset.cetakqrcode', [
            'qrcode'  => $qrcode
        ]);
    }

    public function history()
    {
        $aset = Aset::where('aktif', '=', 't')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $anggaran_dana = AnggaranDana::where('aktif', '=', 'y')->get();
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $supplier = Supplier::where('aktif', '=', 'y')->get();
        return view('aset.history', [
            'aset'                  => $aset,
            'kategori'              => $kategori,
            'anggaran_dana'         => $anggaran_dana,
            'ruang'                 => $ruang,
            'jenis_pemeliharaan'    => $jenis_pemeliharaan,
            'supplier'              => $supplier,
            'kondisi'               => ['Baik', 'Rusak Ringan', 'Rusak Berat']
        ]);
    }

    public function destroy_history($id)
    {
        $aset = Aset::find($id);
        if (!$aset) {
            Alert::error('Error', 'Data Divisi Tidak Ditemukan');
            return redirect()->route('aset.index');
        }
        $aset->where(['id' => $id])->delete();
        Alert::success('Success', 'Data dari history Aset Berhasil Dihapus | Data tidak bisa Dikembalikan');
        return redirect()->route('aset.index');
    }

    public function aset_export()
    {
        return Excel::download(new AsetExport, 'data-aset.xlsx');
    }

    public function aset_import(Request $request)
    {
        $file = $request->file('file');

        // Periksa ekstensi file
        $allowedExtensions = ['xlsx'];
        $extension = $file->getClientOriginalExtension();
        if (!in_array($extension, $allowedExtensions)) {
            // Jika ekstensi file tidak valid, tampilkan pesan error
            Alert::error('Error', 'File yang diunggah harus memiliki ekstensi XLSX.');
            return redirect()->route('aset.index');
        }

        $namaFile = $file->getClientOriginalName();
        $file->move('DataAset', $namaFile);

        try {
            // Import data dari file Excel
            Excel::import(new AsetImport, public_path('/DataAset/' . $namaFile));
            Alert::success('Success', 'Data Berhasil Di Import');
        } catch (\Exception $e) {
            // Tangani kesalahan saat mengimpor data Excel
            Alert::error('Error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
            return redirect()->route('aset.index');
        }
        return redirect()->route('aset.index');
    }
}
