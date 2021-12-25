<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'type' => 'home',
                'img' => 'home/banner.jpg',
                'title' => 'COMPARTE Y DISFRUTA',

            ],
            [
                'type' => 'menu',
                'img' => 'menu/banner.jpg',
                'title' => 'MENU',
            ],
            [
                'type' => 'about',
                'img' => 'about/banner.jpg',
                "title" => "Acerca de nosotros",
            ],
            [
                'type' => 'gallery',
                'img' => 'galleries/banner.jpg',
                "title" => "Galeria de imagenes",

            ],
            [
                'type' => 'locations',
                'img' => 'locations/banner.jpg',
                "title" => "NUESTRAS UBICACIONES",

            ],
            [
                'type' => 'team',
                'img' => 'team/banner.jpg',
                "title" => "NUESTRO EQUIPO",

            ],
            [
                'type' => 'faq',
                'img' => 'faq/banner.jpg',
                "title" => "PREGUNTAS FRECUENTES",

            ],
            [
                'type' => 'terms',
                'img' => 'terms/banner.jpg',
                "title" => "TERMINOS Y CONDICIONES",

            ],
            [
                'type' => 'gift_cards',
                'img' => 'gift_cards/banner.jpg',
                "title" => "TARJETAS  DE REGALO",

            ],
            [
                'type' => 'contact',
                'img' => 'contact/banner.jpg',
                "title" => "CONTÁCTENOS",
            ],
            // [
            //     'type' => 'order',
            //     'img' => 'order/banner.jpg',
            //     "title" => "",
            // ],
        ];
        Page::truncate();
        Page::factory()
            ->count(count($pages))
            ->state(new Sequence(...$pages))
            ->create();
        // foreach ($pages as $key => $page) {
        //     Page::create([
        //         'type' => $page['type'],
        //         'img' => $page['img'],
        //         "title" => $page['title'],
        //         'breadcrumb' => $page['breadcrumb'],
        //         'options' => $page['options'],

        //     ]);
        // }
    }
}
