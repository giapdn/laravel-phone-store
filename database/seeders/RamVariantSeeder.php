<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ramVariants = [
            '2GB',
            '3GB',
            '4GB',
            '6GB',
        ];

        foreach ($ramVariants as $ramVariant) {
            DB::table('ram_variants')->insert([
                'size' => $ramVariant,
            ]);
        }
    }
}
