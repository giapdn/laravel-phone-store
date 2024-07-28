<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'active',
            'blocked',
        ];
        $faker = Faker::create();
        $permissions = DB::table("permissions")->pluck("id");
        foreach ($permissions as $permission) {
            for ($i = 0; $i < 2; $i++) {
                DB::table('users')->insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => Hash::make('password'),
                    'image' => $faker->imageUrl(),
                    'permission_id' => $permission,
                    'status' => $faker->randomElement($status),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
