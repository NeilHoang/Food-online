<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    function payment()
    {
        return view('frontend.checkout.checkout-payment');
    }

    function order(Request $request)
    {
        $paymentType = $request->payment_type;
        if ($paymentType == 'Cash') {
            $orders = new Order();
            $orders->customer_id = Session::get('customer_id');
            $orders->shipping_id = Session::get('shipping_id');
            $orders->order_total = Session::get('sum');
            $orders->save();

            $payments = new Payment();
            $payments->order_id = $orders->order_id;
            $payments->payment_type = $paymentType;
            $payments->save();

            $cartDishes = Cart::content();
            foreach ($cartDishes as $cart) {
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $orders->order_id;
                $orderDetails->dish_id = $cart->id;
                $orderDetails->dish_name = $cart->name;
                if ($cart->half_price == null) {
                    $orderDetails->dish_price = $cart->price;
                } elseif ($cart->half_price !== null) {
                    $orderDetails->dish_price = $cart->price;
                    $orderDetails->dish_price = $cart->half_price;
                }
                $orderDetails->dish_qty = $cart->qty;
                $orderDetails->save();
            }
            Cart::destroy();

            return redirect()->route('order-complete');

        } elseif ($paymentType == 'Stripe') {
            $paymentType = $request->payment_type;
            if ($paymentType == 'Stripe') {
                $orders = new Order();
                $orders->customer_id = Session::get('customer_id');
                $orders->shipping_id = Session::get('shipping_id');
                $orders->order_total = Session::get('sum');
                $orders->save();

                $payments = new Payment();
                $payments->order_id = $orders->order_id;
                $payments->payment_type = $paymentType;
                $payments->save();

                $cartDishes = Cart::content();
                foreach ($cartDishes as $cart) {
                    $orderDetails = new OrderDetail();
                    $orderDetails->order_id = $orders->order_id;
                    $orderDetails->dish_id = $cart->id;
                    $orderDetails->dish_name = $cart->name;
                    if ($cart->half_price == null) {
                        $orderDetails->dish_price = $cart->price;
                    } elseif ($cart->half_price !== null) {
                        $orderDetails->dish_price = $cart->price;
                        $orderDetails->dish_price = $cart->half_price;
                    }
                    $orderDetails->dish_qty = $cart->qty;
                    $orderDetails->save();
                }
                Cart::destroy();
                return redirect()->route('stripe-payment');
            }
        }
    }

    function complete()
    {
        return view('frontend.checkout.order_complete');
    }

    function stripe(){
        return view('frontend.checkout.stripe_payment');
    }

    function stripe_pay(Request $request){
        \Stripe\Stripe::setApiKey(env('sk_test_51K9UV5FJcj7l23rDfvZQAzzaYe3z9YDOGh3ZDiuzotgie4bUWfEGTCDSZ5fZSwafRViOpyk1Zc4USGEWnKxhf9AT00SAyRfOn7'));
        \Stripe\Charge::create ([
            "amount" => $request->input('grandTotal'),
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => $request->name
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        return redirect()->route('order-complete');
    }
}

