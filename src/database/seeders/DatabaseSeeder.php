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
        \App\Models\Article::factory()->count(50)->create();
        \App\Models\Comment::factory()->count(100)->create();
        \App\Models\Good::factory()->count(200)->create();
    }
}
