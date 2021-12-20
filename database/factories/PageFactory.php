<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->sentence(2),
            'img' => 'banner.jpg',
            'alt_banner' => $this->faker->sentence(2),
            "title" => $this->faker->sentence(2),
        ];
    }
}
