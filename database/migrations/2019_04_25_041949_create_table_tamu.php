<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTamu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tamu',150);
            $table->integer('jumlah_tamu')->unsigned();
            $table->date('tanggal');
            $table->time('jam');
            $table->string('instansi');
            $table->string('telp',15);
            $table->text('keperluan');
            // $table->integer('status_id')->unsigned();
            // $table->text('tanggapan')->nullable();
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
        Schema::dropIfExists('agenda');
    }
}
