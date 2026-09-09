<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug' => 'privacy-policy',
                'title' => 'Privacy Policy',
                'thumbnail' => null,
                'carousel' => null,
                'content' => fake()->paragraphs(5, true),
            ],
            [
                'slug' => 'terms-of-service',
                'title' => 'Terms of Service',
                'thumbnail' => null,
                'carousel' => null,
                'content' => fake()->paragraphs(5, true),
            ],
            [
                'slug' => 'sitemap',
                'title' => 'Sitemap',
                'thumbnail' => null,
                'carousel' => null,
                'content' => fake()->paragraphs(5, true),
            ],
        ];

        foreach ($data as $item) {
            if (!\App\Models\SpecialPage::where('slug', $item['slug'])->exists()) {
                \App\Models\SpecialPage::create($item);
            }
        }
    }
}
