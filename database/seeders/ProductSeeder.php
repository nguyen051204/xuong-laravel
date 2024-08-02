<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // Truncate tables to start with a clean slate
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();

        // Seed Tags
        Tag::factory(15)->create();

        // Seed Product Sizes
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item,
            ]);
        }

        // Seed Product Colors
        foreach (['#FF00FF', '#C0C0C0', '#FFFF00', '#FF0000'] as $item) {
            ProductColor::query()->create([
                'name' => $item,
            ]);
        }

        // Seed Products
        $faker = Faker::create();
        for ($i = 1; $i <= 1000; $i++) {
            $name = $faker->text(100);
            Product::query()->create([
                'catelogue_id' => rand(2, 7),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(8) . $i,
                'img_thumbnail' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                'price_regular' => 6000000,
                'price_sale' => 4000000,
            ]);
        }

        // Seed Product Galleries
        for ($i = 1; $i <= 1000; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                ],
            ]);
        }

        // Seed Product Tags
        for ($i = 1; $i <= 1000; $i++) {
            DB::table('product_tag')->insert([
                [
                    'product_id' => $i,
                    'tag_id' => rand(1, 8),
                ],
                [
                    'product_id' => $i,
                    'tag_id' => rand(9, 15),
                ],
            ]);
        }

        // Seed Product Variants
        for ($productId = 1; $productId <= 1000; $productId++) {
            $data = [];
            for ($sizeId = 1; $sizeId <= 5; $sizeId++) {
                for ($colorId = 1; $colorId <= 4; $colorId++) {
                    $data[] = [
                        'product_id' => $productId,
                        'product_size_id' => $sizeId,
                        'product_color_id' => $colorId,
                        'quantity' => 100, // Corrected 'quality' to 'quantity'
                        'image' => 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                    ];
                }
            }
            DB::table('product_variants')->insert($data);
        }

        Schema::enableForeignKeyConstraints(); // Re-enable foreign key constraints
    }
}
