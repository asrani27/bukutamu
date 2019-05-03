<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pemohon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',16);
            $table->string('nama',50);
            $table->string('jkel',10);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir',50);
            $table->text('alamat');
            $table->integer('kelurahan_id')->unsigned();
            $table->integer('agama_id')->unsigned();
            $table->string('pekerjaan',50);
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')
            ->onUpdate('cascade')->onDelete('restrict');
            
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemohon');
    }
}
