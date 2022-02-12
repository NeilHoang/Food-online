<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DishController extends Controller
{
    function index()
    {
        $dishes = Dish::all();
        return view('backend.dish.index', compact('dishes'));
    }

    function create()
    {
        $categories = Category::all();
        return view('backend.dish.add', compact('categories'));
    }

    function store(Request $request)
    {
        if ($request->hasFile('dish_image')) {
            $file_1 = $request->file('dish_image');
            $extention_1 = $file_1->getClientOriginalExtension();
            $fileName_1 = time() . '.' . $extention_1;
            $file_1->move('upload/Dish', $fileName_1);
        } else {
            $fileName_1 = "Nal";
        }
        $dishes = new Dish();
        $dishes->dish_name = $request->dish_name;
        $dishes->dish_detail = $request->dish_detail;
        $dishes->dish_status = $request->dish_status;
        $dishes->category_id = $request->category;
        $dishes->full_price = $request->full_price;
        $dishes->half_price = $request->half_price;
        $dishes->dish_image = $fileName_1;
        $dishes->save();
        return redirect(route('dish.index'))->with('msg', 'Data has been added');
    }

    public function active($dish_id)
    {
        $dishes = Dish::find($dish_id);
        $dishes->dish_status = 1;
        $dishes->save();
        return back();
    }

    public function in_active($dish_id)
    {
        $dishes = Dish::find($dish_id);
        $dishes->dish_status = 0;
        $dishes->save();
        return back();
    }

    public function destroy($id)
    {
        $dishes = Dish::findOrFail($id);
        $destination_1 = 'upload/Dish/' . $dishes->dish_image;
        if (File::exists($destination_1)) {
            File::delete($destination_1);
        }
        $dishes->delete();
        return redirect()->route('dish.index')->with('msg', 'Data has been delete');

    }

    public function edit($id)
    {
        $dishes = Dish::find($id);
        $cates = Category::all();
        return view('backend.dish.edit', compact('dishes', 'cates'));
    }


    public function update(Request $request, $id)
    {

        $dishes = Dish::find($id);
        $dishes->category_id = $request->category;
        $dishes->dish_name = $request->dish_name;
        $dishes->dish_detail = $request->dish_detail;
        $dishes->dish_status = $request->dish_status;
        $dishes->full_price = $request->full_price;
        $dishes->half_price = $request->half_price;
        if ($request->hasFile('dish_image')) {
            $destination = 'upload/Dish/' . $dishes->dish_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file_1 = $request->file('dish_image');
            $extention_1 = $file_1->getClientOriginalExtension();
            $fileName_1 = time() . '.' . $extention_1;
            $file_1->move('upload/Dish', $fileName_1);
            $dishes->dish_image = $fileName_1;
        }
        $dishes->save();
        return redirect(route('dish.index'))->with('msg', 'Data has been updated.');
    }


}
