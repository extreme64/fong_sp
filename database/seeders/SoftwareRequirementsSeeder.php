<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SoftwareRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $softwareRequirements = [
            [
                'name' => 'Ubuntu 20.0',
                'family' => 'Linux',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-21 14:38:57'),
                'updated_at' => Carbon::parse('2024-06-21 14:38:57'),
            ],
            [
                'name' => 'Windows 7',
                'family' => 'Windows',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-21 14:38:57'),
                'updated_at' => Carbon::parse('2024-06-21 14:38:57'),
            ],
            [
                'name' => 'Android 4',
                'family' => 'Android',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-21 14:38:57'),
                'updated_at' => Carbon::parse('2024-06-21 14:38:57'),
            ],
            [
                'name' => 'Mac OS 5',
                'family' => 'Mac',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-22 14:39:13'),
                'updated_at' => Carbon::parse('2024-06-22 14:39:13'),
            ],
            [
                'name' => 'iOS 10',
                'family' => 'iOS',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-22 14:39:13'),
                'updated_at' => Carbon::parse('2024-06-22 14:39:13'),
            ],
            [
                'name' => 'Windows 10',
                'family' => 'Windows',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-22 14:39:13'),
                'updated_at' => Carbon::parse('2024-06-22 14:39:13'),
            ],
            [
                'name' => 'iOS 7',
                'family' => 'iOS',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-22 14:39:13'),
                'updated_at' => Carbon::parse('2024-06-22 14:39:13'),
            ],
            [
                'name' => 'Ubuntu 18.0',
                'family' => 'Linux',
                'tag' => 'OS',
                'created_at' => Carbon::parse('2024-06-23 14:39:27'),
                'updated_at' => Carbon::parse('2024-06-23 14:39:27'),
            ],
            [
                'name' => 'Chrome',
                'family' => '',
                'tag' => '',
                'created_at' => Carbon::parse('2024-06-23 14:39:27'),
                "updated_at" => Carbon::parse('2024-06-23 14:39:27'),
            ],
            [
                'name' => "Firefox",
                "family" => 'Firefox',
                "tag" => 'Web Browser',
                "created_at" => Carbon::parse('2024-06-23 14:39:39'),
                "updated_at" => Carbon::parse('2024-06-23 14:39:39'),
            ],
            [
                "name" => 'Brave 1.6',
                "family" => 'Chromium',
                "tag" => 'Web Browser',
                "created_at" => Carbon::parse('2024-06-23 14:39:39'),
                "updated_at" => Carbon::parse('2024-06-23 14:39:39'),
            ],
            [
                "name" => 'Edge 10',
                "family" => 'Edge',
                "tag" => 'Web Browser',
                "created_at" => Carbon::parse('2024-06-23 14:39:52'),
                "updated_at" => Carbon::parse('2024-06-23 14:39:52'),
            ],
            [
                "name" => 'React',
                "family" => 'React',
                "tag" => 'Framework',
                "created_at" => Carbon::parse('2024-06-23 14:39:52'),
                "updated_at" => Carbon::parse('2024-06-23 14:39:52'),
            ],
            [
                "name" => 'Wordpress 6',
                "family" => 'Wordpress',
                "tag" => 'Framework',
                "created_at" => Carbon::parse('2024-06-23 14:40:01'),
                "updated_at" => Carbon::parse('2024-06-23 14:40:01'),
            ],
            [
                "name" => 'Rollup',
                "family" => 'Rollup',
                "tag" => 'Tool',
                "created_at" => Carbon::parse('2024-06-23 14:40:07'), 
                "updated_at" => Carbon::parse('2024-06-23 14:40:10'),
            ],
        ];

        DB::table('software_requirements')->insert($softwareRequirements);
    }
}