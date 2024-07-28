<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 3; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->name,
                'status' => $faker->randomElement([0, 1]),
                'image_url' => $faker->randomElement(['Starry Night Diamond Painting Kit (Full Drill).jpg', 'The only known photograph of Chopin, circa 1849_ Photograph by Louis-Auguste Bisson.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
