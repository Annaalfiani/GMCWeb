<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_films', function (Blueprint $table) {
            $table->increments('id');
            $table->text('foto');
            $table->string('judul','50');
            $table->text('sinopsis');
            $table->string('genre','20');
            $table->time('durasi');
            $table->enum('status',['0', '1', '2'])->default('1');
            $table->string('sutradara', '60');
            $table->date('tanggal_rilis');
            $table->string('bahasa', '20');
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
        Schema::dropIfExists('data_films');
    }
}
