<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('aset_id');
            $table->foreign('aset_id')->references('id')->on('aset');

            $table->integer('jumlah_request');
            $table->bigInteger('nilai_harga_request');
            $table->string('status', 100);
            $table->enum('aktif', ['y', 't'])->default('y');
            $table->string('gambar', 200);
            $table->text('keterangan');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE mutasi MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ON UPDATE CURRENT_TIMESTAMP COMMENT 'Asia/Jakarta'");
        DB::statement("ALTER TABLE mutasi MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ON UPDATE CURRENT_TIMESTAMP COMMENT 'Asia/Jakarta'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi');
    }
}
