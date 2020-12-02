<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Cours;
class CoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cours::factory()
            ->times(20)
            ->create();
    }
}
