<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminSeeder::class);
         $this->call(StudioSeeder::class);
         $this->call(DataFilmSeeder::class);
         $this->call(KursiSeeder::class);
         //$this->call(JadwalTayangSeeder::class);
    }
}
