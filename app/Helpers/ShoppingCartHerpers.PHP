<?php

namespace App\Helpers;

use App\Models\DiscountCode;

class ShoppingCartHerpers
{
    public static function total_price($user)
    {
        $sub_total = $user->shopping_cart->sum('pivot.total_price_quantity');
        $shipping = 11;
        $tax_percent = 12;
        $total = $sub_total;
        $tax_amount = $sub_total * ($tax_percent / 100);
        $discount_availables = DiscountCode::get()->random(5);
        $discount = null;

        $code = session('discount_code');
        if ($code) {
            $discount = DiscountCode::where('code', $code)->where('active', true)->first();
            if ($discount->type == 'percent') {
                $discount->applied  = $sub_total * ($discount->value / 100);
            } else {
                $discount->applied  = $discount->value;
            }
            $total -= $discount->applied;
            $total = ($total < 0) ? 0 : $total; //num positivos
        }

        $total += $tax_amount + $shipping;

        return [
            'tax_percent' => $tax_percent,
            'shipping' => $shipping,
            'sub_total' => round($sub_total, 2),
            'tax_amount' => round($tax_amount, 2),
            'total' => round($total, 2),
            'discount' => $discount,
            'discount_availables' => $discount_availables
        ];
    }
}
