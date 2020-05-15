<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTayangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_tayangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_film');
            $table->unsignedInteger('id_studio');
            $table->integer('harga');
            $table->string('jam_tayang');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();
            $table->foreign('id_film')->references('id')->on('data_films')->onDelete('CASCADE');
            $table->foreign('id_studio')->references('id')->on('studios')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_tayangs');
    }
}
