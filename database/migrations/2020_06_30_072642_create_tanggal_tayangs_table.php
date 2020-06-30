<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanggalTayangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggal_tayangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_film');
            $table->unsignedInteger('id_studio');
            $table->unsignedInteger('id_jadwal_tayang');
            $table->date('tanggal');
            $table->foreign('id_film')->references('id')->on('data_films')->onDelete('CASCADE');
            $table->foreign('id_studio')->references('id')->on('studios')->onDelete('CASCADE');
            $table->foreign('id_jadwal_tayang')->references('id')->on('jadwal_tayangs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggal_tayangs');
    }
}
