<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.category.add_category');
    }

    public function store(Request $request)
    {
        $categories = new Category();
        $categories->category_name = $request->category_name;
        $categories->order_number = $request->order_number;
        $categories->category_status = $request->category_status;
        $categories->added_on = $request->added_on;
        $categories->save();
        return redirect(route('category.index'))->with('msg', 'Data has been added');
    }

    public function active($cate_id){
        $category = Category::find($cate_id);
        $category->category_status = 1;
        $category->save();
        return back();
    }

    public function in_active($cate_id){
        $category = Category::find($cate_id);
        $category->category_status = 0;
        $category->save();
        return back();
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('category.index')->with('msg', 'Data has been delete');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->category_name = $request->category_name;
        $categories->order_number = $request->order_number;
        $categories->category_status = $request->category_status;
        $categories->added_on = $request->added_on;
        $categories->save();
        return redirect(route('category.index'))->with('msg', 'Data has been updated.');
    }

}
