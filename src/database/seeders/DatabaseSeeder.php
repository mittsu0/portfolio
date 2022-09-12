<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::factory()->count(800)->create();
        \App\Models\Comment::factory()->count(1600)->create();
        \App\Models\Good::factory()->count(1600)->create();
    }
}
