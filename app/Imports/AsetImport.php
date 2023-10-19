<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use App\Models\Aset;
use App\Models\Ruang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\AnggaranDana;
use App\Models\JenisPemeliharaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AsetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $tanggalPembelian = null;
        if (is_numeric($row['tanggal_pembelian'])) {
            $tanggalPembelian = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_pembelian']))->toDateString();
        }

        $tanggalAkhirGaransi = null;
        if (is_numeric($row['tanggal_akhir_garansi'])) {
            $tanggalAkhirGaransi = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_akhir_garansi']))->toDateString();
        }

        return new Aset([
            // dd($row)
            'kode'                  => $row['kode'],
            'nama'                  => $row['nama'],
            'jumlah'                => $row['jumlah'],
            'satuan'                => $row['satuan'],
            'tanggal_pembelian'     => $tanggalPembelian,
            'nilai_harga'           => $row['nilai_harga'],
            'brand'                 => $row['brand'],
            'kondisi'               => $row['kondisi'],
            'gambar'                => $row['gambar'],
            'tanggal_akhir_garansi' => $tanggalAkhirGaransi,
            'nama_penerima'         => $row['nama_penerima'],
            'tempat'                => $row['tempat'],
            'deskripsi'             => $row['deskripsi'],
            'aktif'                 => $row['aktif'],
            'kategori_id'           => Kategori::where('nama', $row['kategori'])->value('id'),
            'anggaran_dana_id'      => AnggaranDana::where('nama', $row['anggaran_dana'])->value('id'),
            'jenis_pemeliharaan_id' => JenisPemeliharaan::where('nama', $row['jenis_pemeliharaan'])->value('id'),
            'ruang_id'              => Ruang::where('nama', $row['ruang'])->value('id'),
            'supplier_id'           => Supplier::where('nama', $row['supplier'])->value('id'),
        ]);
    }
}
