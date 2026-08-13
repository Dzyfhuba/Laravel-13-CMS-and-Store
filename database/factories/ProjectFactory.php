<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->text(20),
            "description_short" => fake()->text(20),
            "description_long" => fake()->text(20),
            "thumbnail" => "public/storage/fff.png",
            "carousel",
            "content",
            "tags",
            "related_projects",
            "related_services",
            "related_products",
            "related_blogs",
        ];
    }
}
