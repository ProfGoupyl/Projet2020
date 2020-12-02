<?php

namespace Database\Seeders;


use App\Models\Faqs;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faqs::factory()
        ->times(48)
        ->create();
    }
}
