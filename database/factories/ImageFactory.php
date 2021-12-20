<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "alt" => $this->faker->sentence(3),
            "title" => $this->faker->sentence(3),
            'img' => 'galleries/img-' . rand(1,8) . '.jpg',
        ];
    }
}
