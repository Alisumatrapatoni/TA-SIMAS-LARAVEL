<?php

namespace Database\Seeders;

use App\Models\JenisPemeliharaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class JenisPemeliharaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        JenisPemeliharaan::truncate();
        JenisPemeliharaan::create(
            [
                'nama' => 'Belum Terisi',
            ]
        );
        JenisPemeliharaan::create(
            [
                'nama' => 'Tanpa Pemeliharaan',
            ]
        );
        JenisPemeliharaan::create(
            [
                'nama' => 'Jarang Pemeliharaan'
            ]
        );
        JenisPemeliharaan::create(
            [
                'nama' => 'Sering Pemeliharaan'
            ]
        );
    }
}
