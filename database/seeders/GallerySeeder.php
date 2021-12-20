<?php

namespace Database\Seeders;


use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Database\Seeder;


class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::truncate();

        $images = Image::factory()->count(8);
        Gallery::factory(5)->has($images)->create();
    }
}
