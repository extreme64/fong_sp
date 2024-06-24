<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RequirementTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $requirementTypes = [
            [
                'name' => 'minimum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'required',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('requirement_types')->insert($requirementTypes);
    }
}
