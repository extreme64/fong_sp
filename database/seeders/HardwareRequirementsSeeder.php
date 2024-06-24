<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HardwareRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $hardwareRequirements = [
            [
                'name' => 'Q6600',
                'family' => 'Q 6XXX',
                'tag' => 'CPU',
                'manufacturer' => 'Intel',
                'created_at' => Carbon::parse('2024-06-20 14:37:39'),
                'updated_at' => Carbon::parse('2024-06-20 14:37:39'),
            ],
            [
                'name' => 'i7 10700K',
                'family' => 'i7 10XXX',
                'tag' => 'CPU',
                'manufacturer' => 'Intel',
                'created_at' => Carbon::parse('2024-06-21 14:40:24'),
                'updated_at' => Carbon::parse('2024-06-21 14:40:24'),
            ],
            [
                'name' => 'GT 240',
                'family' => 'GT 2XX',
                'tag' => 'GPU',
                'manufacturer' => 'Nvidia',
                'created_at' => Carbon::parse('2024-06-21 14:40:24'),
                'updated_at' => Carbon::parse('2024-06-21 14:40:24'),
            ],
            [
                'name' => 'GT 540',
                'family' => 'GT 4XX',
                'tag' => 'GPU',
                'manufacturer' => 'Nvidia',
                'created_at' => Carbon::parse('2024-06-21 14:40:24'),
                'updated_at' => Carbon::parse('2024-06-21 14:40:24'),
            ],
            [
                'name' => 'GT 1050 TI',
                'family' => 'GT 10XX',
                'tag' => 'GPU',
                'manufacturer' => 'Nvidia',
                'created_at' => Carbon::parse('2024-06-22 14:40:36'),
                'updated_at' => Carbon::parse('2024-06-22 14:40:36'),
            ],
            [
                'name' => 'GTX 1080',
                'family' => 'GTX 10XX',
                'tag' => 'GPU',
                'manufacturer' => 'Nvidia',
                'created_at' => Carbon::parse('2024-06-22 14:40:36'),
                'updated_at' => Carbon::parse('2024-06-22 14:40:36'),
            ],
            [
                'name' => 'Raspberry Pi Zero',
                'family' => '',
                'tag' => '',
                'manufacturer' => '',
                'created_at' => Carbon::parse('2024-06-23 14:40:45'),
                'updated_at' => Carbon::parse('2024-06-23 14:40:45'),
            ],
            [
                'name' => 'PS 4',
                'family' => 'PS',
                'tag' => 'Console',
                'manufacturer' => 'Sony',
                'created_at' => Carbon::parse('2024-06-23 14:40:52'),
                'updated_at' => Carbon::parse('2024-06-23 14:40:56'),
            ],
            [
                'name' => 'XBox 360',
                'family' => 'XBox',
                'tag' => 'Console',
                'manufacturer' => 'Microsoft',
                'created_at' => Carbon::parse('2024-06-23 14:41:01'),
                'updated_at' => Carbon::parse('2024-06-23 14:41:08'),
            ]
        ];

        DB::table('hardware_requirements')->insert($hardwareRequirements);
    }
}