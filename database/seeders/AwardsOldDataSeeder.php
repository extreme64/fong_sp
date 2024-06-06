<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Award;

class AwardsOldDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $awardsOld = [
            ["id" => "1", "project_id" => "1", "product_id" => "1", "type" => "item", "title" => "Best SSD Adapter Award", "description" => "This award is given to the UGREEN M2 SSD Adapter for its outstanding performance and reliability.", "image" => "1", "created_at" => "2023-07-24 20:03:49", "updated_at" => "2023-12-01 16:43:37", "status" => "1", "media_id" => "18"],
            ["id" => "2", "project_id" => "1", "product_id" => "2", "type" => "achievement", "title" => "Drone Photography Champion", "description" => "The Lenovo P11S Drone receives this prestigious award for its exceptional aerial photography capabilities.", "image" => "2", "created_at" => "2023-07-24 20:03:49", "updated_at" => "2023-11-22 22:56:59", "status" => "1", "media_id" => "3"],
            ["id" => "3", "project_id" => "2", "product_id" => "3", "type" => "achievement", "title" => "Best Drone Award", "description" => "Award for innovative design and features.", "image" => "3", "created_at" => "2023-07-24 20:03:49", "updated_at" => "2023-07-24 20:03:49", "status" => "1", "media_id" => "3"],
            ["id" => "4", "project_id" => "4", "product_id" => "4", "type" => "achievement", "title" => "Fastest SSD Award", "description" => "Recognized as the fastest in the market.", "image" => "2", "created_at" => "2023-07-24 20:03:49", "updated_at" => "2023-10-21 18:21:48", "status" => "1", "media_id" => "2"],
            ["id" => "5", "project_id" => "1", "product_id" => "NULL", "type" => "achievement", "title" => "Space People", "description" => "Mars people sunset", "image" => "1", "created_at" => "2023-08-03 04:36:50", "updated_at" => "2023-11-29 11:00:51", "status" => "0", "media_id" => "16"],
            ["id" => "6", "project_id" => "1", "product_id" => "2", "type" => "achievement", "title" => "ASUS Epic Coder Setup", "description" => "Advanced 3 monitor setup.", "image" => "2", "created_at" => "2023-08-03 04:59:48", "updated_at" => "2023-11-27 20:48:46", "status" => "1", "media_id" => "2"],
            ["id" => "11", "project_id" => "1", "product_id" => "NULL", "type" => "item", "title" => "Hot Space", "description" => "Hot Coding  Red Marin", "image" => "NULL", "created_at" => "2023-12-01 19:10:07", "updated_at" => "2023-12-01 19:10:07", "status" => "1", "media_id" => "25"],
            ["id" => "12", "project_id" => "1", "product_id" => "NULL", "type" => "item", "title" => "Code Like Lego", "description" => "So close more code, more legoes.", "image" => "NULL", "created_at" => "2023-12-01 19:42:31", "updated_at" => "2023-12-01 19:42:31", "status" => "0", "media_id" => "26"]
        ];


        foreach ($awardsOld as $entry) {
            Award::create($entry);
        }
    }
}
