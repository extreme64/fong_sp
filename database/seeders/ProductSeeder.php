<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create 50 sample products
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(15),
                'image_url' => $faker->imageUrl(640, 480, 'gadgets'),
                'affiliate_url' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
