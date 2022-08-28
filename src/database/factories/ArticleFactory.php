<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(30),
            'area' => $this->faker->numberBetween(1, 47),
            'category' => $this->faker->numberBetween(1, 6),
            'body' => $this->faker->realText(200),
            'can_display_id' => $this->faker->numberBetween(0, 1),
            'uid' => substr(base64_encode(random_bytes(10)), 0, 9),
            'ip_address' => $this->faker->ipv4
        ];
    }
}
