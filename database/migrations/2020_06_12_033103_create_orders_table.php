<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->integer('id_studio')->unsigned();
            $table->integer('id_film')->unsigned();
            $table->integer('id_jadwal_tayang')->unsigned();
            $table->string('tanggal');
            $table->string('jam');
            $table->integer('total_harga');
            $table->string('snap')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('id_studio')->references('id')->on('studios')->onDelete('cascade');
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('id_film')->references('id')->on('data_films')->onDelete('cascade');
            $table->foreign('id_jadwal_tayang')->references('id')->on('jadwal_tayangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
