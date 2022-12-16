<?php

//allow us to use the factory and seed the fake data into the user table. to do that create a seeder user table
//php artisan make:seed UserSeeder
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Str;
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
        //User::factory(10)->create();
        //Task::factory(10)->create();

        //permet de creer les donnees factices pour les utilisateurs normals.
        //User::factory(10)->create();

        //des donnees factices pour admin
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password'=>bcrypt('password'),
            'remember_token' => Str::random(10),
            'approved_at'=>now(),
            
            
        ]);

    }
}
