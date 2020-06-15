<?php

use Illuminate\Database\Seeder;

class KursiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 14; $i++) {
            \App\Kursi::create([
                'id_studio' => '1',
                'nama_kursi' => "$i-A"
            ]);
            \App\Kursi::create([
                'id_studio' => '1',
                'nama_kursi' => "$i-B"
            ]);
            \App\Kursi::create([
                'id_studio' => '1',
                'nama_kursi' => "$i-C"
            ]);
            \App\Kursi::create([
                'id_studio' => '1',
                'nama_kursi' => "$i-D"
            ]);

            \App\Kursi::create([
                'id_studio' => '2',
                'nama_kursi' => "$i-A"
            ]);
            \App\Kursi::create([
                'id_studio' => '2',
                'nama_kursi' => "$i-B"
            ]);
            \App\Kursi::create([
                'id_studio' => '2',
                'nama_kursi' => "$i-C"
            ]);
            \App\Kursi::create([
                'id_studio' => '2',
                'nama_kursi' => "$i-D"
            ]);
        }
    }
}
