<?php

namespace Database\Seeders;

use App\Models\AnggaranDana;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AnggaranDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        AnggaranDana::truncate();

        //1
        AnggaranDana::create([
            'nama' => 'APBD',
        ]);

        //2
        AnggaranDana::create([
            'nama' => 'Pusat',
        ]);

        //3
        AnggaranDana::create([
            'nama' => 'Bt. Siswa',
        ]);

        //4
        AnggaranDana::create([
            'nama' => 'BBE',
        ]);

        //5
        AnggaranDana::create([
            'nama' => 'BOMM',
        ]);

        //6
        AnggaranDana::create([
            'nama' => 'PEMKAB',
        ]);

        //7
        AnggaranDana::create([
            'nama' => 'Rutin',
        ]);

        //8
        AnggaranDana::create([
            'nama' => 'B2P',
        ]);

        //9
        AnggaranDana::create([
            'nama' => 'BKSM',
        ]);

        //10
        AnggaranDana::create([
            'nama' => 'Bant. SMK',
        ]);

        //11
        AnggaranDana::create([
            'nama' => 'BOSS',
        ]);

        //12
        AnggaranDana::create([
            'nama' => 'Prakerin',
        ]);

        //13
        AnggaranDana::create([
            'nama' => 'ISO',
        ]);

        //14
        AnggaranDana::create([
            'nama' => 'RSBI',
        ]);

        //15
        AnggaranDana::create([
            'nama' => 'Bant. Prop ICT',
        ]);

        //16
        AnggaranDana::create([
            'nama' => 'Bant. Diknas',
        ]);

        //17
        AnggaranDana::create([
            'nama' => 'APBN',
        ]);
    }
}
