<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    private static $i = 1;

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
            "portion_size" => rand(200, 250) . "g",
            "calories" => rand(300, 750) . "Kj",
            "allergies" => $this->faker->words(3, true),
            "description_max" =>$this->faker->text(1000),
            "description_min" =>$this->faker->text(100),
            "img" => "",
            "banner" => "",
            "stars" => rand(4, 5),
            //"price_default" => $price_default,
            //"offer" => $offer,
            "price" => rand(10, 200),

            //'max_quantity' => rand(10, 30),
            'stock' => rand(1, 100),

        ];
    }
}
