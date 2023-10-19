<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Aset;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AsetSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Aset::truncate();
        Aset::create(
            [
                'kode'                  =>'01010101',
                'nama'                  => 'Komputer',
                'jumlah'                => '13 ',
                'satuan'                => 'unit',
                'tanggal_pembelian'     => Carbon::parse('2023-06-01'),
                'nilai_harga'           => 83850000,
                'brand'                 => 'Testing',
                'kondisi'               => 'Baik',
                'gambar'                => 'gambar_aset/monitor.jpg',
                'tanggal_akhir_garansi' => Carbon::parse('2023-12-01'),
                'nama_penerima'         => 'testing',
                'tempat'                => 'Testing',
                'deskripsi'             => '',
                'kategori_id'           =>  1,
                'anggaran_dana_id'      =>  1,
                'jenis_pemeliharaan_id' =>  1,
                'ruang_id'              =>  1,
                'supplier_id'           =>  1
            ]
        );

        // Aset::create(
        //     [
        //         'kode'                  => '02.06.03.05.03',
        //         'nama'                  => 'Sean Cannon Lide',
        //         'jumlah'                => '1',
        //         'satuan'                => 'buah',
        //         'tanggal_pembelian'     => Carbon::parse('2012-01-01'),
        //         'nilai_harga'           => 1830000,
        //         'brand'                 => '-',
        //         'kondisi'               => 'Baik',
        //         'gambar'                => 'gambar_aset/aset_example.jpg',
        //         'tanggal_akhir_garansi' => Carbon::parse('2012-01-01'),
        //         'nama_penerima'         => 'Amin',
        //         'tempat'                => 'lemari 1 Rak Nomor 2',
        //         'deskripsi'             => '',
        //         'kategori_id'           =>  2,
        //         'anggaran_dana_id'      =>  1,
        //         'jenis_pemeliharaan_id' =>  3,
        //         'ruang_id'              =>  6,
        //         'supplier_id'           =>  1
        //     ]
        // );

        // Aset::create(
        //     [
        //         'kode'                  => '02.05.03.06.02',
        //         'nama'                  => 'Webcamp Prolink',
        //         'jumlah'                => '8',
        //         'satuan'                => 'buah',
        //         'tanggal_pembelian'     => Carbon::parse('2012-01-01'),
        //         'nilai_harga'           => 6000000,
        //         'brand'                 => '-',
        //         'kondisi'               => 'Baik',
        //         'gambar'                => 'gambar_aset/aset_example.jpg',
        //         'tanggal_akhir_garansi' => Carbon::parse('2012-01-01'),
        //         'nama_penerima'         => 'Amin',
        //         'tempat'                => 'lemari 1 Rak Nomor 2',
        //         'deskripsi'             => '',
        //         'kategori_id'           =>  3,
        //         'anggaran_dana_id'      =>  1,
        //         'jenis_pemeliharaan_id' =>  3,
        //         'ruang_id'              =>  6,
        //         'supplier_id'           =>  1
        //     ]
        // );

        // Aset::create(
        //     [
        //         'kode'                  => '02.06.02.06.22',
        //         'nama'                  => 'Kamera Digital',
        //         'jumlah'                => '1',
        //         'satuan'                => 'buah',
        //         'tanggal_pembelian'     => Carbon::parse('2012-01-01'),
        //         'nilai_harga'           => 1830000,
        //         'brand'                 => '',
        //         'kondisi'               => 'Baik',
        //         'gambar'                => 'gambar_aset/aset_example.jpg',
        //         'tanggal_akhir_garansi' => Carbon::parse('2012-01-01'),
        //         'nama_penerima'         => 'Amin',
        //         'tempat'                => 'lemari 1 Rak Nomor 2',
        //         'deskripsi'             => '',
        //         'kategori_id'           =>  5,
        //         'anggaran_dana_id'      =>  1,
        //         'jenis_pemeliharaan_id' =>  3,
        //         'ruang_id'              =>  6,
        //         'supplier_id'           =>  1
        //     ]
        // );
        // Aset::create(
        //     [
        //         'kode'                  => '02.05.03.06.04',
        //         'nama'                  => 'Speker',
        //         'jumlah'                => '1',
        //         'satuan'                => 'buah',
        //         'tanggal_pembelian'     => Carbon::parse('2012-01-01'),
        //         'nilai_harga'           => 1200000,
        //         'brand'                 => '',
        //         'kondisi'               => 'Baik',
        //         'gambar'                => 'gambar_aset/aset_example.jpg',
        //         'tanggal_akhir_garansi' => Carbon::parse('2012-01-01'),
        //         'nama_penerima'         => 'Amin',
        //         'tempat'                => 'lemari 1 Rak Nomor 2',
        //         'deskripsi'             => '',
        //         'kategori_id'           =>  6,
        //         'anggaran_dana_id'      =>  1,
        //         'jenis_pemeliharaan_id' =>  3,
        //         'ruang_id'              =>  6,
        //         'supplier_id'           =>  1
        //     ]
        // );

        // Aset::create(
        //     [
        //         'kode'                  => '02.06.02.01.34',
        //         'nama'                  => 'Meja Komputer',
        //         'jumlah'                => '8',
        //         'satuan'                => 'buah',
        //         'tanggal_pembelian'     => Carbon::parse('2012-01-01'),
        //         'nilai_harga'           => 3600000,
        //         'brand'                 => '',
        //         'kondisi'               => 'Baik',
        //         'gambar'                => 'gambar_aset/aset_example.jpg',
        //         'tanggal_akhir_garansi' => Carbon::parse('2012-01-01'),
        //         'nama_penerima'         => 'Amin',
        //         'tempat'                => 'lemari 1 Rak Nomor 2',
        //         'deskripsi'             => '',
        //         'kategori_id'           =>  8,
        //         'anggaran_dana_id'      =>  1,
        //         'jenis_pemeliharaan_id' =>  3,
        //         'ruang_id'              =>  6,
        //         'supplier_id'           =>  1
        //     ]
        // );

        // Aset::create(
        //     [
        //         'kode'                  => '02.06.02.04.04',
        //         'nama'                  => 'AC Spirit',
        //         'jumlah'                => '1',
        //         'satuan'                => 'Unit',
        //         'tanggal_pembelian'     => Carbon::parse('2012-01-01'),
        //         'nilai_harga'           => 5500000,
        //         'brand'                 => '',
        //         'kondisi'               => 'Baik',
        //         'gambar'                => 'gambar_aset/aset_example.jpg',
        //         'tanggal_akhir_garansi' => Carbon::parse('2012-01-01'),
        //         'nama_penerima'         => 'Amin',
        //         'tempat'                => 'lemari 1 Rak Nomor 2',
        //         'deskripsi'             => 'Ukuran : 1/2 PK',
        //         'kategori_id'           =>  9,
        //         'anggaran_dana_id'      =>  1,
        //         'jenis_pemeliharaan_id' =>  3,
        //         'ruang_id'              =>  6,
        //         'supplier_id'           =>  1
        //     ]
        // );
    }
}
