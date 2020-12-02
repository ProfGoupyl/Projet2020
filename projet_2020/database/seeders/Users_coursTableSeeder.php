<?php

namespace Database\Seeders;

use App\Models\Users_cours;
use Illuminate\Database\Seeder;

class Users_coursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users_cours::factory()
        ->times(100)
        ->create();
    }
}
