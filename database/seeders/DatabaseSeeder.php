<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Car;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\message;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
       \App\Models\User::factory(10)->create();
       \App\Models\Category::factory(5)->create();
       \App\Models\Car::factory(7)->create();
       \App\Models\Testimonial::factory(3)->create();
       \App\Models\Message::factory(3)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
