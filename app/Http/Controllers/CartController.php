<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    function index()
    {
        $cartDishes = Cart::content();
        return view('cart.indexCart', compact('cartDishes'));
    }

    function addToCart(Request $request)
    {
        $dish = Dish::where('id', $request->id)->first();
        Cart::add([
            'id' => $request->id,
            'qty' => $request->qty,
            'name' => $dish->dish_name,
            'price' => $dish->full_price,
            'weight' => 550,
            'options' =>
                [
                    'half_price' => $dish->half_price,
                    'image' => $dish->dish_image,
                ]
        ]);
        return redirect()->back()->with('Add to cart success');
    }

    function removeDishIntoCart($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

    function updateDIshIntoCart(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        return back();
    }
}
