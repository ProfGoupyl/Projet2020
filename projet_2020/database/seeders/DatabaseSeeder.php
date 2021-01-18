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
        $this->call(UserTableSeeder::class);
        $this->call(CoursTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(CommentaireTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(InvitationTableSeeder::class);
        $this->call(NoteTableSeeder::class);
        $this->call(Cours_userTableSeeder::class);
        
        
        
        
        // \App\Models\User::factory(10)->create();
    }
}

