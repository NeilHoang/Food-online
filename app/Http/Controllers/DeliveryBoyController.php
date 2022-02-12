<?php

namespace App\Http\Controllers;

use App\Models\Delivery_boy;
use Illuminate\Http\Request;

class DeliveryBoyController extends Controller
{
    function index(){
        $delivery_boys = Delivery_boy::all();
        return view('backend.deliveryboy.index',compact('delivery_boys'));
    }

    function create(){
        return view('backend.deliveryboy.add');
    }

    function store(Request $request){
        $delivery_boys = new Delivery_boy();
        $delivery_boys->name = $request->name;
        $delivery_boys->phone = $request->phone;
        $delivery_boys->password = $request->password;
        $delivery_boys->status = $request->status;
        $delivery_boys->added_on = $request->added_on;
        $delivery_boys->save();
        return redirect(route('delivery.index'))->with('msg', 'Data has been added');
    }

    public function destroy($id)
    {
        $delivery_boys = Delivery_boy::findOrFail($id);
        $delivery_boys->delete();
        return redirect()->route('delivery.index')->with('msg', 'Data has been delete');
    }

    public function edit($id)
    {
        $delivery_boys = Delivery_boy::findOrFail($id);
        return view('backend.deliveryboy.edit', compact('delivery_boys'));
    }

    public function update(Request $request, $id)
    {
        $delivery_boys = Delivery_boy::find($id);
        $delivery_boys->name = $request->name;
        $delivery_boys->phone = $request->phone;
        $delivery_boys->password = $request->password;
        $delivery_boys->status = $request->status;
        $delivery_boys->added_on = $request->added_on;
        $delivery_boys->save();
        return redirect(route('delivery.index'))->with('msg', 'Data has been updated.');
    }

    public function active($cate_id){
        $delivery_boys = Delivery_boy::find($cate_id);
        $delivery_boys->status = 1;
        $delivery_boys->save();
        return back();
    }

    public function in_active($cate_id){
        $delivery_boys = Delivery_boy::find($cate_id);
        $delivery_boys->status = 0;
        $delivery_boys->save();
        return back();
    }
}
