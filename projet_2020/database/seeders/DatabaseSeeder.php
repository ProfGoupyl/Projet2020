<?php

namespace Database\Seeders;

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
        $this->call(Users_coursTableSeeder::class);
        $this->call(InvitationTableSeeder::class);
        $this->call(NoteTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(CommentaireTableSeeder::class);
        $this->call(CoursTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}

