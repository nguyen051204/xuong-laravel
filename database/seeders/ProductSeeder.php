<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory(15)->create();

        foreach (['S','M','L','XL','XXL'] as $item) {
            Product::query()->create([
                'name' => $item,
            ]);

        }
        foreach (['#FF00FF','#C0C0C0','#FFFF00','#FF0000'] as $item) {
            ProductColor::query()->create([
                'name' => $item,
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            $name=fake()->text('100'),
            Product::query()->create([
                'catelogue_id'=>rand(2,7),
                'name'=>$name,
                'slug'=> Str::slug($name) . '-' . Str::random(8),
                'sku'=> Str::random(8) . $i,
                'img_thumbnail'=>'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                'price_regular'=>99999,
                'price_sale'=>99888,

            ]);
        }
        for ($i = 0; $i < 1000; $i++) {
            ProductGallery::query()->insert([
              [
                  'product_id'=>$i,
                  'image'=>'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
              ], [
                  'product_id'=>$i,
                  'image'=>'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
              ],

            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            DB::table('product_tag')->insert([
                [$i,rand(1,8)] ,
                [$i,rand(9,15)]
            ]);
        }

        for ($product_id = 1; $product_id < 1000; $product_id++) {
            for ($sizeId = 1; $sizeId<6; $sizeId++){
                for ($colorId = 1; $colorId < 1000; $colorId++){
                    ProductVariant::query()->create([

                    ]);
                }
            }
        }
    }
}
