<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storageVariants = [
            '32GB', '64GB', '128GB', '256GB'
        ];

        foreach ($storageVariants as $storageVariant) {
            DB::table('storage_variants')->insert([
                'size' => $storageVariant,
            ]);
        }
    }
}
