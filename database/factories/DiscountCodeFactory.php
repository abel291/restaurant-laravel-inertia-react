<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Discount;
use App\Models\DiscountCode;

class DiscountCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiscountCode::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->sentence(),
            'code' => $this->faker->regexify('[A-Z]{5}[0-9]{3}'),
            'type' => $this->faker->randomElement(['amount', 'percent']),
            'value' => rand(1, 100),
            'stock' => rand(1, 100),
            'active' => rand(1,0),
        ];
    }
}
