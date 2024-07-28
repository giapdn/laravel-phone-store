<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = DB::table('users')->pluck('id');

        foreach ($users as $user) {
            foreach (range(1, 2) as $index) {
                DB::table('coupons')->insert([
                    'code' => Str::upper(Str::random(10)),
                    'name' => $faker->word,
                    'type' => $faker->randomElement(['percentage', 'fixed']),
                    'discount' => $faker->numberBetween(100, 10000),
                    'active' => $faker->boolean,
                    'expired_at' => $faker->dateTimeBetween('now', '+1 year'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'user_id' => $user,
                ]);
            }
        }


    }
}
