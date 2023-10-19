<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip')->unique();
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 20);
            $table->bigInteger('no_telepon');
            $table->text('alamat');
            $table->string('status')->comment('ADMIN;USER;');
            $table->enum('aktif', ['y', 't'])->default('y');
            $table->string('username', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gambar', 200);
            $table->timestamps();

            $table->unsignedBigInteger('divisi_id');
            $table->foreign('divisi_id')->references('id')->on('divisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
