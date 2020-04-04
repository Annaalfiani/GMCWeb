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
            $table->integer('id_jadwal_tayang')->unsigned();
            $table->time('jam_tayang');
            $table->timestamps();

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
        Schema::dropIfExists('jam_tayangs');
    }
}
