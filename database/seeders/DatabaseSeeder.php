<?php

namespace Database\Seeders;

use App\Models\DiscountCode;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Image::truncate();
        $this->call([
            
            CategorySeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            ShoppingCartSeeder::class,
            PageSeeder::class,
            GallerySeeder::class,
            PromoSeeder::class,
        ]);
        DiscountCode::factory(10)->create();
    }
}
