<?php

use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Studio::create([
            'nama_studio' => 'Studio 1',
        ]);
        \App\Studio::create([
            'nama_studio' => 'Studio 2',
        ]);
        \App\Studio::create([
            'nama_studio' => 'Studio 3',
        ]);
    }
}
