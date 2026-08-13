<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $relatedIds = [];
        for ($i = 1; $i <= 5; $i++) {
            $relatedIds[] = rand(1, 20);
        }

        return [
            "name" => fake()->text(20),
            "description_short" => fake()->text(20),
            "description_long" => fake()->text(20),
            "thumbnail" => "fff.png",
            "carousel" =>[
                [
                    "image_file" => "01KZWZ3YCAD99CXFRGE9WVDFDG.png",
                    "embedded_video_url" => null,
                ],
                [
                    "image_file" => null,
                    "embedded_video_url" => "https://youtu.be/vktQrBwkTbY",
                ],
            ],
            "content" => fake()->paragraphs(10, true),
            "tags" => ['dummy', 'test'],
            "related_projects" => $relatedIds,
            "related_services" => $relatedIds,
            "related_products" => $relatedIds,
            "related_blogs" => $relatedIds,
        ];
    }
}
