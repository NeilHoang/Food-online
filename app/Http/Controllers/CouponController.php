<?php

namespace App\Http\Controllers;

use App\Models\Coupon_code;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function index()
    {
        $coupon_codes = Coupon_code::all();
        return view('backend.coupon.index', compact('coupon_codes'));
    }

    function create()
    {
        return view('backend.coupon.add');
    }

    function store(Request $request)
    {
        $coupon_codes = new Coupon_code();
        $coupon_codes->coupon_code = $request->coupon_code;
        $coupon_codes->coupon_value = $request->coupon_value;
        $coupon_codes->cart_min_value = $request->cart_min_value;
        $coupon_codes->expired_on = $request->expired_on;
        $coupon_codes->added_on = $request->added_on;
        $coupon_codes->coupon_type = $request->coupon_type;
        $coupon_codes->coupon_status = $request->coupon_status;
        $coupon_codes->save();
        return redirect(route('coupon.index'))->with('msg', 'Data has been added');
    }

    function destroy($coupon_id)
    {
        $coupon_codes = Coupon_code::findOrFail($coupon_id);
        $coupon_codes->delete();
        return redirect()->route('coupon.index')->with('msg', 'Data has been delete');
    }

    function edit($id)
    {
        $coupon_codes = Coupon_code::findOrFail($id);
        return view('backend.coupon.edit', compact('coupon_codes'));
    }


    function update(Request $request, $id)
    {
        $coupon_codes = Coupon_code::find($id);
        $coupon_codes->coupon_code = $request->coupon_code;
        $coupon_codes->coupon_value = $request->coupon_value;
        $coupon_codes->cart_min_value = $request->cart_min_value;
        $coupon_codes->coupon_type = $request->coupon_type;
        $coupon_codes->save();
        return redirect(route('coupon.index'))->with('msg', 'Data has been updated.');
    }

    public function active($coupon_id){
        $coupon_codes = Coupon_code::find($coupon_id);
        $coupon_codes->coupon_status = 1;
        $coupon_codes->save();
        return back();
    }

    public function in_active($coupon_id){
        $coupon_codes = Coupon_code::find($coupon_id);
        $coupon_codes->coupon_status = 0;
        $coupon_codes->save();
        return back();
    }
}
