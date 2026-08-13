<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::where('email', 'hafidz@email.com')->count() == 0) {
            User::factory()->create([
                'name' => 'Hafidz',
                'email' => 'hafidz@email.com',
                'password' => '12345678',
            ]);
        }

        $this->callOnce(ProjectSeeder::class);
    }
}
