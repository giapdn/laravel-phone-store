<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $baseProducts = DB::table('products')
            ->where('is_variation', '=', true)
            ->get();
        $colorVariants = DB::table('color_variants')->pluck('id')->toArray();
        $ramVariants = DB::table('ram_variants')->pluck('id')->toArray();
        $storageVariants = DB::table('storage_variants')->pluck('id')->toArray();
        $productVariants = [];

        foreach ($baseProducts as $baseProduct) {
            foreach ($colorVariants as $colorVariantId) {
                foreach ($ramVariants as $ramVariantId) {
                    foreach ($storageVariants as $storageVariantId) {
                        $variantName = $baseProduct->name . ' ' .
                            DB::table('color_variants')->where('id', $colorVariantId)->value('name') . ' ' .
                            DB::table('ram_variants')->where('id', $ramVariantId)->value('size') . ' ' .
                            DB::table('storage_variants')->where('id', $storageVariantId)->value('size');
                        $productVariants[] = [
                            'variant_name' => $variantName,
                            'quantity' => $faker->numberBetween(1, 10),
                            'price' => $faker->randomFloat(2, 0, 999999.99),
                            'product_id' => $baseProduct->id,
                            'color_variant_id' => $colorVariantId,
                            'ram_variant_id' => $ramVariantId,
                            'storage_variant_id' => $storageVariantId,
                            'created_at' => $faker->date(),
                            'updated_at' => $faker->date(),
                        ];
                    }
                }
            }
        }
        DB::table('product_variants')->insert($productVariants);

    }
}
