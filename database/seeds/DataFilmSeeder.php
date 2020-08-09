<?php

use Illuminate\Database\Seeder;

class DataFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DataFilm::create([
            'foto' => 'sample.jpg',
            'judul' => 'Avenger 1',
            'sinopsis' => "Sinopsis avenger 1",
            'genre' => 'sci-fi',
            'durasi' => '02:00',
            'pemain' => 'Van Diessel',
            'sutradara' => 'Barack Obama',
            'tanggal_rilis' => '2020-02-20',
            'bahasa' => 'Indonesia',
            'status' => 1,
        ]);

        \App\DataFilm::create([
            'foto' => 'sample.jpg',
            'judul' => 'Harry Potter',
            'sinopsis' => "Sinopsis Harry Potter",
            'genre' => 'sci-fi',
            'durasi' => '02:00',
            'pemain' => 'Van Diessel',
            'sutradara' => 'Barack Obama',
            'tanggal_rilis' => '2020-02-02',
            'bahasa' => 'Inggris',
            'status' => 1,
        ]);
    }
}
