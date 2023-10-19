<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Kategori::truncate();
        Kategori::create(
            [
                'nama' => 'Belum Terisi',
            ]
        );
        Kategori::create(
            [
                'nama' => 'Elektronik',
            ]
        );
        Kategori::create(
            [
                'nama' => 'Non Elektronik',
            ]
        );
        Kategori::create(
            [
                'nama' => 'Mebel',
            ]
        );
    }
}
