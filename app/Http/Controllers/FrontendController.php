<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $dishes = Dish::where('dish_status', 1)->get();
        return view('frontend.include.home', compact('dishes'));
    }

    function dish_show($id)
    {
        $categoryDishes = Dish::where('category_id',$id)->where('dish_status', 1)->get();
        return view('frontend.food.dish', compact('categoryDishes'));
    }
}
