<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Award;
use App\Models\Product;

class AwardsIRLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve a specific product using the title (or any other unique identifier)
        $product1 = Product::where('title', 'UGREEN M2 SSD Adapter')->first();
        $product2 = Product::where('title', 'Lenovo P11S Drone')->first();
        $product3 = Product::where('title', 'KBDFA RG106 PRO Drone')->first();
        $product4 = Product::where('title', 'MOVESPEED 7450MB/s Internal SSD')->first();

        // Create seed data for awards and associate them with the products
        $awards = [
            [
                'project_id' => 1, // Replace with the actual project ID (if applicable)
                'product_id' => $product1->id,
                'type' => 'item',
                'title' => 'Best SSD Adapter Award',
                'description' => 'This award is given for outstanding performance and reliability.',
                'image' => 'award_image1.jpg',
            ],
            [
                'project_id' => 2, // Replace with the actual project ID (if applicable)
                'product_id' => $product2->id,
                'type' => 'achievement',
                'title' => 'Drone Photography Champion',
                'description' => 'Award for exceptional aerial photography capabilities.',
                'image' => 'award_image2.jpg',
            ],
            [
                'project_id' => 1, // Replace with the actual project ID (if applicable)
                'product_id' => $product3->id,
                'type' => 'item',
                'title' => 'Best Drone Award',
                'description' => 'Award for innovative design and features.',
                'image' => 'award_image3.jpg',
            ],
            [
                'project_id' => 3, // Replace with the actual project ID (if applicable)
                'product_id' => $product4->id,
                'type' => 'achievement',
                'title' => 'Fastest SSD Award',
                'description' => 'Recognized as the fastest in the market.',
                'image' => 'award_image4.jpg',
            ],
        ];

        // Insert the seed data into the database
        foreach ($awards as $awardData) {
            Award::create($awardData);
        }
    }
}
