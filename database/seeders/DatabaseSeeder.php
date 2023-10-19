<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DivisiSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(RuangSeeder::class);
        $this->call(JenisPemeliharaanSeeder::class);
        $this->call(AnggaranDanaSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(AsetSeeder::class);
        $this->call(JadwalPemeliharaanSeeder::class);
        $this->call(PeminjamanSeeder::class);

    }
}
