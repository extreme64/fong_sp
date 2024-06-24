<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectHardwareRequirementsSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectHardwareRequirements = [
            [
                'id' => 1,
                'project_id' => 1,
                'requirement_id' => 1,
                'type_id' => 1,
                'created_at' => Carbon::parse('2024-06-20 14:38:57'),
                'updated_at' => Carbon::parse('2024-06-20 14:38:57'),
            ],
            [
                'id' => 2,
                'project_id' => 1,
                'requirement_id' => 3,
                'type_id' => 1,
                'created_at' => Carbon::parse('2024-06-20 14:38:58'),
                'updated_at' => Carbon::parse('2024-06-20 14:38:58'),
            ],
            [
                'id' => 3,
                'project_id' => 1,
                'requirement_id' => 6,
                'type_id' => 2,
                'created_at' => Carbon::parse('2024-06-21 14:38:59'),
                'updated_at' => Carbon::parse('2024-06-21 14:38:59'),
            ],
            [
                'id' => 4,
                'project_id' => 1,
                'requirement_id' => 2,
                'type_id' => 2,
                'created_at' => Carbon::parse('2024-06-22 14:39:00'),
                'updated_at' => Carbon::parse('2024-06-22 14:39:00'),
            ],
            [
                'id' => 5,
                'project_id' => 3,
                'requirement_id' => 4,
                'type_id' => 1,
                'created_at' => Carbon::parse('2024-06-24 16:40:55'),
                'updated_at' => Carbon::parse('2024-06-24 16:40:55'),
            ],
            [
                'id' => 6,
                'project_id' => 3,
                'requirement_id' => 5,
                'type_id' => 2,
                'created_at' => Carbon::parse('2024-06-24 16:40:55'),
                'updated_at' => Carbon::parse('2024-06-24 16:40:55'),
            ],
        ];

        DB::table('project_hardware_requirements')->insert($projectHardwareRequirements);
    }

}