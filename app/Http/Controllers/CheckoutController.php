<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Stripe;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {

        $request->validate([

            'phone' => 'required|string|max:255',
            'note' => 'string|max:1000',
            'address' => 'required|string|max:255',
            'paymentMethod' => 'required|string|max:255',
        ]);

        //dd($request->all());
        DB::beginTransaction();

        $order = new Order();
        $user = auth()->user();
        $order->user()->associate($user->id);

        $order->phone = $request->phone;
        $order->note = $request->note;
        $order->address = $request->address;

        $order->products = $user->shopping_cart->map(function ($item, $key) {
            return [
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->pivot->quantity,
                'total_price_quantity' => $item->pivot->total_price_quantity,
            ];
        });

        $total_price = $user->total_price; //mutator

        if ($total_price['discount']) {
            $discount = $total_price['discount'];
            $order->discount = [
                'code' => $discount['code'],
                'type' => $discount['type'],
                'value' => $discount['value'],
                'applied' => $discount['applied'],
            ];
        }
        //dd($total_price['tax_percent']);
        $order->tax_percent = $total_price['tax_percent'];
        $order->tax_amount = $total_price['tax_amount'];
        $order->shipping = $total_price['shipping'];
        $order->sub_total = $total_price['sub_total'];
        $order->total = $total_price['total'];
        $order->order = rand(1000, 9999) . date('md') . $user->id;

        try {

            $description_stripe = $user->name . " - " . $user->shopping_cart->count() . " plato(s)";
            if (env('APP_ENV') != "testing") {
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
                $payment = $stripe->paymentIntents->create([
                    'amount' => $order->total * 100,
                    'currency' => 'usd',
                    'description' => $description_stripe,
                    'payment_method' => $request->paymentMethod,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
                $order->stripe_id = $payment->id;
            } else {
                $order->stripe_id = Str::random();
            }

            $order->save();
            session()->forget('discount_code');

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            $error = 'Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.';
            return response()->json(['error' => $error], 500);
        }
        return Redirect::route('order_details', [$order->order])->with(
            'success',
            'Orden completada con exito'
        );
    }
}
