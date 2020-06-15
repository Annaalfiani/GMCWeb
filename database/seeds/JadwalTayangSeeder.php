<?php

use Illuminate\Database\Seeder;

class JadwalTayangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\JadwalTayang::create([
            'id_film' => '1',
            'id_studio' => '1',
            'harga' => 30000,
            'jam_tayang' => "13.00,15.00,17.00",
            'tanggal_mulai' => "2020-06-10",
            'tanggal_selesai' => "2020-06-30",
        ]);
        \App\JadwalTayang::create([
            'id_film' => '2',
            'id_studio' => '2',
            'harga' => 30000,
            'jam_tayang' => "13.00,15.00,17.00",
            'tanggal_mulai' => "2020-06-09",
            'tanggal_selesai' => "2020-06-29",
        ]);
    }
}
