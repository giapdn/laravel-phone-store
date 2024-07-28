<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = DB::table("users")->pluck('id');
        $products = DB::table("products")->pluck('id');
        $coupons = DB::table("coupons")->pluck('id');

        foreach (range(1, 15) as $index) {
            DB::table('orders')->insert([
                'user_id' => $faker->randomElement($users),
                'product_id' => $faker->randomElement($products),
                'coupon_id' => $faker->randomElement($coupons),
                'total_price' => $faker->randomFloat(2, 10, 100),
                'payment_method' => $faker->randomElement(['COD', 'Momo']),
                'status' => $faker->randomElement(['pending', 'processing', 'delivering', 'delivered', 'completed', 'cancelled']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
