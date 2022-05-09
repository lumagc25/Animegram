<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creación usando DB
        DB::table('users')->insert([
            'name' => "Junior",
            'surname' => "Developer",
            'nick' => "admin",
            'email' => "admin@gmail.com",
            'password' => "pestillo",
            'photo' => 'sin foto'
        ]);
    }
}
