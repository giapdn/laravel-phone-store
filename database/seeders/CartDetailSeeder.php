<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $carts = DB::table("carts")->pluck("id")->all();
        $products = DB::table("products")->pluck("id")->all();
        $cart_details = [];

        foreach ($products as $product) {
            $cart_details[] = [
                'quantity' => $faker->numberBetween(1, 10),
                'cart_id' => $faker->randomElement($carts),
                'product_id' => $product,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('cart_details')->insert($cart_details);
    }
}
