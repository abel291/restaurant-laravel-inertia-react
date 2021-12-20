<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class GalleryFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "description" => $this->faker->sentence(),
            "active" => rand(0,1),
        ];
    }
}
