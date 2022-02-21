<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $reservation_date = $this->faker->dateTimeInInterval('-1 week','+1 month');
        
        $start_date = $reservation_date->format('Y-m-d');
        $night=rand(10,20);
        $end_date = $reservation_date->modify('+'.$night.' day')->format('Y-m-d');
        return [
            "title" => $this->faker->sentence(2),
            "sub_title" => $this->faker->sentence(2),
            "img" => $this->faker->randomElement(['home/card-banner-1.jpg','home/card-banner-2.jpg']),            
            "active" => 1,            
            "start_date" => $start_date,            
            "end_date" => $end_date,            
            "product_id" => Product::get()->random()->id,            
        ];
    }
}
