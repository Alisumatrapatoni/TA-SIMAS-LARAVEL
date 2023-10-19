<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Peminjaman::truncate();
        Peminjaman::create(
            [
                'user_id'                  => 1,
                'aset_id'                  => 1,
                'tanggal_pinjam'           => Carbon::parse('2023-01-01'),
                'tanggal_kembali'          => Carbon::parse('2023-02-01'),
                'jumlah_request'           => 1,
                'status'                   => 'SELESAI',
                'keperluan'                => 'pribadi'
            ]
        );
    }
}
