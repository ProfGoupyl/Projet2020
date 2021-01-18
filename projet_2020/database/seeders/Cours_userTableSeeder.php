<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Cours_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '1',
            'cours_id' => '1'
        ]);

        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '1',
            'cours_id' => '2'
        ]);

        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '2',
            'cours_id' => '1'
        ]);
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '2',
            'cours_id' => '2'
        ]);
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '2',
            'cours_id' => '3'
        ]);
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '3',
            'cours_id' => '4'
        ]);
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '4',
            'cours_id' => '2'
        ]);
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '5',
            'cours_id' => '1'
        ]);
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '5',
            'cours_id' => '5'
        ]);
        DB::table('cours_user')->insert([
            'start_at' => '2021-09-01 15:09:55',
            'end_at' => '2022-06-30 15:09:55',
            'user_id' => '1',
            'cours_id' => '6'
        ]);


    }
}
