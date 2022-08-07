<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class GoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $article_ids = Article::pluck('id');
        return [
            'article_id' => $this->faker->randomElement($article_ids),
            'uid' => substr(base64_encode(random_bytes(10)), 0, 9)
        ];
    }
}
