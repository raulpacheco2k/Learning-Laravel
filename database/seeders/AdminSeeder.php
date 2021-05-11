<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => env('ADMIN_NAME', 'Raul Pacheco'),
            'email' => env('ADMIN_EMAIL', 'eu@raulpacheco.com.br'),
            'password' => env('ADMIN_PASSWORD', '$2y$10$GowmUv3HLGnVvJT5Pep0TOoriNrtFjVfGUJ82mZjryxnYAV5b0bSu')
        ]);
    }
}
