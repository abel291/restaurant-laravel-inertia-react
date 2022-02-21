<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\PromosResource;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {   
       
        $menus = Category::inRandomOrder()->take(2)->where('type', 'menu')->with('products')->get();

        $products_featured  = Product::inRandomOrder()->take(8)->whereHas('category', function (Builder $query) {
            $query->where('type', 'menu');
        })->get();

        $page = Page::where('type', 'home')->with(['promos' => function ($query) {
            $query->where('active', true)->with('product');
        }])->first();

        return Inertia::render('home/Home', [
            "menus" => CategoryResource::collection($menus),
            "page" => $page,
            "promos" => PromosResource::collection($page->promos),
            "products_featured" => ProductResource::collection($products_featured),
        ]);
    }
    public function menu()
    {
        $menus = Category::with('products')->where('type', 'menu')->get();
        $page = Page::where('type', 'menu')->with('promos')->first();

        return Inertia::render('menu/Menu', [
            "menu" => CategoryResource::collection($menus),
            "page" => $page,
        ]);
    }
    public function about()
    {

        $page = Page::where('type', 'about')->with('promos')->first();
        return Inertia::render('about/About', [
            "page" => $page,

        ]);
    }
    public function gallery()
    {
        $galleries = Gallery::with('images')->get();
        $page = Page::where('type', 'gallery')->with('promos')->first();
        return Inertia::render('gallery/Gallery', [
            "page" => $page,
            "galleries" => $galleries,
        ]);
    }
    public function locations()
    {
        $page = Page::where('type', 'locations')->with('promos')->first();
        return Inertia::render('location/Location', [
            "page" => $page,
        ]);
    }
    public function team()
    {
        $page = Page::where('type', 'team')->with('promos')->first();
        return Inertia::render('team/Team', [
            "page" => $page,
        ]);
    }
    public function faqs()
    {
        $page = Page::where('type', 'faq')->with('promos')->first();
        return Inertia::render('faq/Faq', [
            "page" => $page,
        ]);
    }
    public function terms()
    {
        $page = Page::where('type', 'terms')->with('promos')->first();
        return Inertia::render('terms/Terms', [
            "page" => $page,
        ]);
    }
    public function contacts()
    {
        $page = Page::where('type', 'contact')->with('promos')->first();
        return Inertia::render('contact/Contact', [
            "page" => $page,
        ]);
    }

    public function gift_cards()
    {
        $cards = Category::where('type', 'gift_cards')->with('products')->first()->products;
        $page = $page = Page::where('type', 'gift_cards')->with('promos')->first();

        return Inertia::render('gift_cards/GiftCards', [
            "cards" => $cards,
            "page" => $page,
        ]);
    }

    public function product($product_slug)
    {
        $product = Product::where('slug', $product_slug)->with('images')->firstOrFail();

        $related_products = Product::where('category_id', $product->category_id)->get();

        return Inertia::render('product/Product', [
            "product" => new ProductResource($product),
            "related_products" => ProductResource::collection($related_products)
        ]);
    }
}
