<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("Report")->insert([
            'id' => 0,
            'type' => "sound",
            'description' => "super description",
            "filename" => "_U4A1486 FINAL WEB.jpg",
            "original_name" => "_U4A1486 FINAL WEB.jpg",
            'file_path' => "reportFile/PJ5iDjDYPo0mqoBYia74ju39DSLWeXWsCVP6JxNq.jpg",
            'created_at' => "2024-03-20 21:01:01",
            "updated_at" => "2024-03-20 21:01:01"
        ]);
    }
}
