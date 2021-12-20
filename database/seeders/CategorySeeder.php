<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $categories_menu = ["Hamburguesas", "Ensaladas", "Pizza", "Bebidas"];
        foreach ($categories_menu as $key => $category) {
            Category::create([
                "name" => $category,
                "slug" =>  Str::slug($category),
                "img" => "categories/" . Str::slug($category) . "-img.jpg",
                "active" => 1
            ]);
        }
        
        Category::create([
            "name" => "Gift Card",
            "slug" =>  "gift_cards",
            "img" => "",
            "type"=>"gift_cards",
            "active" => 1
        ]);
    }
}
