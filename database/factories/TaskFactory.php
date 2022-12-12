<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */


class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     /*
To create it : php artisan make:fctory <NameFactory>
 */
    public function definition()
    {
        // our factory that help us generate fake tasks. we used in a seeder
        return [
            'titre' => $this->faker->sentence(3), //3 words
            'description' => $this->faker->paragraph(2), //4 sentences
            'status'=>$this->faker-> randomElement(['En attente'])
        ];
    }
}
