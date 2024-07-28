<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categoryIds = DB::table('categories')->pluck('id');
        foreach ($categoryIds as $categoryId) {
            for ($i = 1; $i <= 2; $i++) {
                DB::table('products')->insert([
                    'name' => $faker->name,
                    'description' => $faker->paragraph,
                    'base_price' => $faker->randomFloat(2, 10, 100),
                    'quantity' => $faker->numberBetween(1, 100),
                    'base_image' => $faker->imageUrl(),
                    'is_variation' => $faker->boolean,
                    'image' => $faker->imageUrl(),
                    'status' => $faker->randomElement([0, 1]),
                    'category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
