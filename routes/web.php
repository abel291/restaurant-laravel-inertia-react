<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;

use App\Http\Livewire\Category\ListCategories;
use App\Http\Livewire\DiscountCode\ListDiscountCode;
use App\Http\Livewire\Gallery\ListGallery;
use App\Http\Livewire\GiftCard\ListGiftCard;
use App\Http\Livewire\Order\ListOrder;
use App\Http\Livewire\Page\ListPage;
use App\Http\Livewire\Product\ListProducts;
use App\Http\Livewire\Promo\ListPromo;
use App\Http\Livewire\User\ListUsers;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/locations', [PageController::class, 'locations'])->name('locations');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/gift_cards', [PageController::class, 'gift_cards'])->name('gift_cards');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/product/{slug}', [PageController::class, 'product'])->name('product');



// Route::get('/dashboard', function () {
//     //return Inertia::render('Dashboard');
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/my-account', [ProfileController::class,'my_account'])->name('my_account');
    Route::get('/orders', [ProfileController::class,'orders'])->name('orders');
    Route::get('/account-details', [ProfileController::class,'account_details'])->name('account_details');
    Route::post('/account-details', [ProfileController::class,'store_account_details'])->name('store_account_details');
    Route::get('/order-details/{order}', [ProfileController::class, 'order_details'])->name('order_details');
    Route::get('/change-password', [ProfileController::class, 'change_password'])->name('change_password');
    Route::post('/change-password', [ProfileController::class, 'store_change_password'])->name('store_change_password');

    Route::resource('shopping-cart', ShoppingCartController::class)->only([
        'index', 'store', 'destroy'
    ]);
    Route::get('/shopping-cart/apply-cupon-discount', [ShoppingCartController::class, 'apply_cupon_discount'])
        ->name('apply_cupon_discount');        

    Route::get('/shopping-cart/remove-cupon-discount', [ShoppingCartController::class, 'remove_cupon_discount'])
        ->name('remove_cupon_discount');

    Route::post('/checkout', [CheckoutController::class,'checkout'])->name('checkout');
    
    Route::middleware(['auth', 'isAdmin'])->prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('/', function () {
            return view('dashboard');
        })->name('home');

        Route::get('/users', ListUsers::class)->name('users');
        Route::get('/categories', ListCategories::class)->name('categories');
        Route::get('/products', ListProducts::class)->name('products');
        Route::get('/gift_card', ListGiftCard::class)->name('gift_card');
        Route::get('/discount_code', ListDiscountCode::class)->name('discount_code');
        Route::get('/gallery', ListGallery::class)->name('gallery');
        Route::get('/page', ListPage::class)->name('page');
        Route::get('/promo', ListPromo::class)->name('promo');
        Route::get('/order', ListOrder::class)->name('order');
    });
    
});

require __DIR__ . '/auth.php';

//mejorar lista order agregar badge al estado de la orden
//terminar change password
