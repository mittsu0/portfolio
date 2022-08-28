<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class CommentFactory extends Factory
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
            'comment' => $this->faker->realText(100),
            'can_display_id' => $this->faker->numberBetween(0, 1),
            'uid' => substr(base64_encode(random_bytes(10)), 0, 9),
            'ip_address' => $this->faker->ipv4
        ];
    }
}
