<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Product::truncate();
        $categories = Category::get();
        $faker = Faker\Factory::create();
        foreach ($categories->where('type', 'menu') as $category) {
            for ($i = 1; $i < 8; $i++) {
                //solo hay 8 imagenes de productos por caategoria  asi que solo se crearan 8 productos por categoria
                Product::factory()
                    ->has(Image::factory()->count(3))
                    ->create([
                        "img" => "$category->slug/img-" . $i . ".jpg",
                        "banner" => "$category->slug/banner-1.jpg",
                        "category_id" => $category->id,
                    ]);
            }
        }
        $category_gift_card = $categories->where('type', 'gift_cards')->first();
        $gift_card = [50, 85, 125];
        foreach ($gift_card as $amount) {
            $name = 'Gift Card ' . $amount;
            Product::factory()->create([
                "name" => $name,
                "slug" => Str::slug($name),
                "img" => "gift_cards/card-$amount.png",
                "banner" => "gift_cards/banner.jpg",
                "description_min" =>$faker->text(100),
                "price" => $amount,
                'category_id' => $category_gift_card->id,
                "portion_size" => null,
                "calories" => null,
                "allergies" => null,
            ]);
        }
    }
}
