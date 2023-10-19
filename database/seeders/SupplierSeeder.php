<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Supplier::truncate();
        Supplier::create(
            [
                'nama'      => '-',
                'alamat'    => '-',
                'deskripsi' => ''
            ]
        );
    }
}
