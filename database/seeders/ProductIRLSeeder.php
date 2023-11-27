<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductIRLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $products = [
            [
                'title' => 'UGREEN M2 SSD Adapter',
                'description' => 'UGREEN M2 SSD Case NVME SATA Dual Protocol M.2 to USB Type C 3.1 SSD Adapter for NVME PCIE NGFF. Code: AAA724 [PST 2023/07/23 18:13:00 ~ 2023/07/31 23:59:59].',
                'image_url' => 'UGREEN-M2-SSD-Case-NVME-SATA-Dual-Protocol-M-2-to-USB-Type-C-3-1.jpg_640x640.jpg',
                'affiliate_url' => 'https://s.click.aliexpress.com/e/_ooqElUn',
            ],
            [
                'title' => 'Lenovo P11S Drone',
                'description' => 'Drone 8K 5G GPS Professional HD Aerial Photography Dual-Camera Omnidirectional Obstacle Avoidance Quadrotor',
                'image_url' => 'Lenovo-P11S-Drone-8K-5G-GPS-Professional-HD-Aerial-Photography-Dual-Camera-Omnidirectional-Obstacle-Avoidance-Quadrotor.jpg_.webp', 
                'affiliate_url' => 'https://s.click.aliexpress.com/e/_onvTm4T',
            ],
                        [
                'title' => 'KBDFA RG106 PRO Drone',
                'description' => '8K Professional Aerial Photography GPS 3KM RC Quadcopter 3 Axis PTZ Brushless 5G WiFi Helicopter Dron Toys',
                'image_url' => 'KBDFA-RG106-PRO-Drone-8K-Professional-Aerial-Photography-GPS-3KM-RC-Quadcopter-3-Axis-PTZ-Brushless.jpg_.webp',
                'affiliate_url' => 'https://s.click.aliexpress.com/e/_EJK9fXH',
            ],
            [
                'title' => 'MOVESPEED 7450MB/s Internal SSD',
                'description' => 'MOVESPEED 7450MB/s SSD NVMe M.2 2280 4TB 2TB 1TB Internal Solid State Hard Disk M2 PCIe 4.0x4 2280',
                'image_url' => 'MOVESPEED-7450MB-s-SSD-NVMe-M-2-2280-4TB-2TB-1TB-Internal-Solid-State-Hard-Disk.jpg_.webp', 
                'affiliate_url' => 'https://s.click.aliexpress.com/e/_EyjBpL5',
            ]
        ];

        // Insert the data into the products table
        DB::table('products')->insert($products);
    }
}


