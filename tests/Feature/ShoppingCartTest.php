<?php

namespace Tests\Feature;

use App\Models\DiscountCode;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShoppingCartTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_shopping_cart()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get(route('shopping-cart.index'));
        $response->assertStatus(200);
    }
    public function test_shopping_cart_store()
    {
        $user = User::first();
        $response = $this->actingAs($user)->post(route('shopping-cart.store'), [
            'id' => Product::get()->random()->id,
            'quantity' => rand(1, 10)
        ]);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
    public function test_shopping_cart_destroy()
    {
        $user = User::first();
        $product_id = $user->shopping_cart->first()->id;
        $response = $this->actingAs($user)->delete(route('shopping-cart.destroy', $product_id));
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_shopping_cart_apply_cupon_discount()
    {
        $user = User::first();
        $code = DiscountCode::where('active', 1)->first()->code;
        $response = $this->actingAs($user)
            ->get(route('apply_cupon_discount', ['code' => $code]));
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
    public function test_shopping_cart_remove_cupon_discount()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get(route('remove_cupon_discount'));
        $response->assertSessionMissing('discount_code');
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
    public function test_checkout()
    {
        $user = User::first();
        $response = $this->actingAs($user)->post(route('checkout'), [
            'phone' => $user->phone,
            'note' => 'test',
            'address' => $user->address,
            'paymentMethod' => 'test',
        ]);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
}
