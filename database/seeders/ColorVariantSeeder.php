<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colorVariants = [
            'sliver',
            'gray',
        ];

        foreach ($colorVariants as $colorVariant) {
            DB::table('color_variants')->insert([
                'name' => $colorVariant,
            ]);
        }
    }
}
