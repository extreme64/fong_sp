<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Config;

class ProjectIRLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'title' => 'Dev Game Widget',
                'description' => 'The Dev Game Widget is an innovative browser extension designed to enhance the productivity and engagement of developers and tech enthusiasts. This extension brings the excitement of gaming into the development environment, creating a unique and fun experience for users.',
                'app_type' => Config::get('app_types.browser_extension'),
                'license_id' => '1',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Path Assistant',
                'description' => 'Path Assistant is a cutting-edge mobile application designed for trail builders, engineers, and outdoor enthusiasts. This powerful tool enables users to design, analyze, and optimize paths and trails on maps, incorporating advanced features to enhance the trail-building experience and encourage collaboration among trail enthusiasts.',
                'app_type' => Config::get('app_types.mobile'),
                'license_id' => '2',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tanks Asylum',
                'description' => 'Tanks Asylum is an exhilarating 2D browser game that blends turn-based strategy and tactical gameplay, set in a post-apocalyptic world where players command tanks in intense battles. Drawing inspiration from classic games like Heroes of Might and Magic III, Tanks Asylum offers a unique twist by placing tanks at the center of the action.',
                'app_type' => Config::get('app_types.web'),
                'license_id' => '1',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Local Communities',
                'description' => 'Local Communities is an innovative social network designed to foster connections and collaboration among individuals within a specific locality. This platform empowers users to engage with their community, participate in local projects, and organize events based on shared interests and goals.',
                'app_type' => Config::get('app_types.web'),
                'license_id' => '3',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert the seed data into the 'projects' table
        Project::insert($projects);
    }
}
