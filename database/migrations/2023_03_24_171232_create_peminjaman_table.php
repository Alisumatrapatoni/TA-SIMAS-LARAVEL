<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('aset_id');
            $table->foreign('aset_id')->references('id')->on('aset');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');

            $table->integer('jumlah_request');
            $table->enum('status', ['PROSES', 'DITERIMA', 'DITOLAK', 'SELESAI']);
            $table->enum('aktif', ['y', 't'])->default('y');
            $table->text('keperluan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
