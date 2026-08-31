<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $initalData = [
            [
                "key" => "onboarding__full_name",
                "value" => "Hafidz Ubaidillah",
                "hint" => "Enter your full name",
                "sort_order" => 1,
                "image" => null
            ],
            [
                "key" => "onboarding__profession",
                "value" => "FULLSTACK WEB DEVELOPER",
                "hint" => "Enter your profession",
                "sort_order" => 2,
                "image" => null
            ],
            [
                "key" => "onboarding__resume",
                "value" => "Seorang fullstack web developer yang senang mengeksplorasi hal baru. Saya menikmati membangun solusi digital yang bermanfaat, responsif, dan mudah digunakan untuk kebutuhan bisnis maupun pengguna.",
                "hint" => "Enter your resume (max 200 characters)",
                "sort_order" => 3,
                "image" => null
            ],
            [
                "key" => "onboarding__message",
                "value" => "Terbuka untuk pekerjaan dan project.",
                "hint" => "Enter your message (max 40 characters), can be used for motto or tagline",
                "sort_order" => 4,
                "image" => null
            ],
            [
                "key" => "onboarding__photo",
                "value" => "initial/ma-photo.png",
                "hint" => "Upload your photo",
                "sort_order" => 5,
                "image" => null
            ],
        ];

        for ($i = 0; $i < count($initalData); $i++) {
            HomePage::set(
                $initalData[$i]['key'],
                $initalData[$i]['value'],
                $initalData[$i]['hint'],
                $initalData[$i]['sort_order'],
                $initalData[$i]['image']
            );
        }
    }
}
