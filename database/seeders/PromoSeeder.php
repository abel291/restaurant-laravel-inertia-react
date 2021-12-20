<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    

        Promo::truncate();
        DB::table('page_promo')->truncate();
        Promo::factory(20)->create();
        
        $data=[];
        $promos=Promo::get();
        foreach (Page::get() as $key => $page) {
            foreach ($promos->random(2) as $key => $promo) {
               array_push($data,[
                    'page_id'=>$page->id,
                    'promo_id'=>$promo->id,
               ]);
            }
            
        }
        
        DB::table('page_promo')->insert($data);
        

        
    }
}
