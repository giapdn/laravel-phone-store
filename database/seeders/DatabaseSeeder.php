<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//            PermissionSeeder::class,
//            UserSeeder::class,
            CategorySeeder::class,
//            ColorVariantSeeder::class,
//            RamVariantSeeder::class,
//            StorageVariantSeeder::class,
            ProductSeeder::class,
//            CouponSeeder::class,
//            OrderSeeder::class,
//            CartSeeder::class,
//            CartDetailSeeder::class,
//            ProductVariantSeeder::class,
        ]);
    }
}
