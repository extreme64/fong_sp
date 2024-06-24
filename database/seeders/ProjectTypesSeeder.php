<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $projectTypes = [
            [
                'name' => 'browser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'desktop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mobile',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'plugin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'console',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('project_types')->insert($projectTypes);
    }
}
