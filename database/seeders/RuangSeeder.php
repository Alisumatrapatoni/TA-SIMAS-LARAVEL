<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Ruang::truncate();
        Ruang::create(
            [
                'nama'      => 'Belum Terisi',
                'deskripsi' => ''
            ]
        );
        Ruang::create(
            [
                'nama'      => 'Laboratorium Instalasi Tenaga Listrik',
                'deskripsi' => ''
            ]
        );
        Ruang::create(
            [
                'nama'      => 'Laboratorium Kimia Industri',
                'deskripsi' => ''
            ]
        );
        Ruang::create(
            [
                'nama'      => 'Laboratorium kendaraan Ringan Otomotif',
                'deskripsi' => ''
            ]
        );
        Ruang::create(
            [
                'nama'      => 'Laboratorium Agribisnis Pengolahan Hasil Pertanian',
                'deskripsi' => ''
            ]
        );
        Ruang::create(
            [
                'nama'      => 'Laboratorium Nautika Kapal Penangkap Ikan',
                'deskripsi' => ''
            ]
        );
        Ruang::create(
            [
                'nama'      => 'Laboratorium Multimedia',
                'deskripsi' => ''
            ]
        );
    }
}
