<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::factory()->create([
            'email' => 'user@user.com',
            'is_admin' => 1,
        ]);
        User::factory()->create([
            'email' => 'user@user2.com',
        ]);
        User::factory()
            ->count(20)
            ->has(
                Order::factory()
                    ->count(3)
                    ->state(function (array $attributes, User $user) {
                        $products = Product::get()->random(10);
                        $sub_total = $products->sum('price');
                        $tax_percent = 12;
                        $tax_amount = $sub_total * ($tax_percent / 100);
                        return [
                            'phone' => $user->phone,
                            'address' => $user->address,
                            'note' => '',
                            'products' => $products->map(function ($item) {
                                return [
                                    'name' => $item->name,
                                    'price' => $item->price,
                                    'quantity' => 1,
                                    'total_price_quantity' => $item->price,
                                ];
                            }),
                            'order' => rand(1000, 9999) . date('md') . $user->id,
                            'tax_percent' => 12,
                            'tax_amount' => $tax_amount,
                            'shipping' => 12,
                            'sub_total' => $sub_total,
                            'total' => $sub_total,
                            'stripe_id' => 'test',
                        ];
                    })
            )
            ->create();
    }
}
