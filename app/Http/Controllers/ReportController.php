<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\AnggaranDana;
use App\Models\JenisPemeliharaan;
use App\Models\Peminjaman;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function report_ruang()
    {
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        return view('report.ruang',[
            'ruang' => $ruang
        ]);
    }

    public  function report_pengguna()
    {
        $pengguna = User::where('aktif', '=', 'y')->get();
        return view('report.pengguna',[
            'pengguna' => $pengguna
        ]);
    }

    public  function report_supplier()
    {
        $supplier = Supplier::where('aktif', '=', 'y')->get();
        return view('report.supplier',[
            'supplier' => $supplier
        ]);
    }

    public  function report_aset()
    {
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $anggaran_dana = AnggaranDana::where('aktif', '=', 'y')->get();
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $supplier = Supplier::where('aktif', '=', 'y')->get();
        return view('report.aset', [
            'aset'                  => $aset,
            'kategori'              => $kategori,
            'anggaran_dana'         => $anggaran_dana,
            'ruang'                 => $ruang,
            'jenis_pemeliharaan'    => $jenis_pemeliharaan,
            'supplier'              => $supplier,
            'kondisi'               => ['Baik', 'Kurang Baik', 'Rusak']
        ]);
    }

    public function report_peminjaman()
    {
        $peminjaman = Peminjaman::where('aktif', 'y')->get();
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $anggaran_dana = AnggaranDana::where('aktif', '=', 'y')->get();
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $supplier = Supplier::where('aktif', '=', 'y')->get();
        return view('report.peminjaman', [
            'peminjaman'            => $peminjaman,
            'aset'                  => $aset,
            'kategori'              => $kategori,
            'anggaran_dana'         => $anggaran_dana,
            'ruang'                 => $ruang,
            'jenis_pemeliharaan'    => $jenis_pemeliharaan,
            'supplier'              => $supplier,
            'kondisi'               => ['Baik', 'Kurang Baik', 'Rusak']
        ]);
    }

    public function report_history_peminjaman()
        {
            $history_peminjaman = Peminjaman::where('status', '=', 'SELESAI')->get();
            $aset = Aset::where('aktif', '=', 'y')->get();
            $kategori = Kategori::where('aktif', '=', 'y')->get();
            $ruang = Ruang::where('aktif', '=', 'y')->get();
            $user = User::where('aktif', '=', 'y')->get();
            return view('report.history_peminjaman', [
                'history_peminjaman'    => $history_peminjaman,
                'user'                  => $user,
                'kategori'              => $kategori,
                'aset'                  => $aset,
                'ruang'                 => $ruang
            ]);
        }

}

