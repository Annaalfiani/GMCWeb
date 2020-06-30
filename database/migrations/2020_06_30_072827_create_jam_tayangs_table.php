<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJamTayangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jam_tayangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_film');
            $table->unsignedInteger('id_studio');
            $table->unsignedInteger('id_jadwal_tayang');
            $table->unsignedInteger('id_tanggal_tayang');
            $table->time('jam');
            $table->foreign('id_film')->references('id')->on('data_films')->onDelete('CASCADE');
            $table->foreign('id_studio')->references('id')->on('studios')->onDelete('CASCADE');
            $table->foreign('id_jadwal_tayang')->references('id')->on('jadwal_tayangs')->onDelete('CASCADE');
            $table->foreign('id_tanggal_tayang')->references('id')->on('tanggal_tayangs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_tayangs');
    }
}
