<?php

use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Manager::create([
            'name' => 'Manager GMC',
            'email' => 'gmctegal@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
    }
}
