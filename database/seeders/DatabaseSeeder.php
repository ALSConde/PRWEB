<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::factory()->count(1000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'photo' => fake()->imageUrl(),
        // ]);
    }
}
