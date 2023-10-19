<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\JadwalPemeliharaan;
use Illuminate\Support\Facades\Schema;

class JadwalPemeliharaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        JadwalPemeliharaan::truncate();
        // JadwalPemeliharaan::create([
        //     'aset_id' => 1,
        //     'tanggal_mulai' =>   Carbon::parse('2021-10-01'),
        //     'tanggal_selesai' =>   Carbon::parse('2021-11-01'),
        //     'status'    => 'SELESAI'
        // ]);

        // JadwalPemeliharaan::create([
        //     'aset_id' => 2,
        //     'tanggal_mulai' =>   Carbon::parse('2021-11-01'),
        //     'tanggal_selesai' =>   Carbon::parse('2021-12-01'),
        //     'status'    => 'BELUM'
        // ]);

        // JadwalPemeliharaan::create([
        //     'aset_id' => 3,
        //     'tanggal_mulai' =>   Carbon::parse('2021-12-01'),
        //     'tanggal_selesai' =>   Carbon::parse('2022-01-01'),
        //     'status'    => 'SELESAI'
        // ]);
    }
}
