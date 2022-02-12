<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    function register()
    {
        return view('frontend.customer.register');
    }

    function store(Request $request)
    {
        $customers = new Customer();
        $customers->username = $request->username;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->password = bcrypt($request->password);
        $customers->save();

        $customer_id = $customers->customer_id;
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $customers->username);

//        $data = $customers->toArray();
//        Mail::send('frontend.mail.welcome-mail', $data, function ($message) use ($data) {
//            $message->to($data['email']);
//            $message->subject('Welcome to Food Online');
//        });
        return redirect()->route('shipping');
    }

    function shipping()
    {
        $customers = Customer::find(Session::get('customer_id'));
        return view('frontend.checkout.shipping', compact('customers'));
    }

    function save(Request $request)
    {
        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shipping_id', $shipping->id);
        return redirect()->route('checkout-payment');
    }

    function login(Request $request)
    {
        $customers = Customer::where('email', $request->email)->first();
        if (password_verify($request->password, $customers->password)) {
            Session::put('customer_id', $customers->customer_id);
            Session::put('customer_name', $customers->username);
            return redirect()->route('shipping');
        } else {
            return redirect()->route('form-login')->with('msg','email or password incorrect, Please try again');

        }
    }

    function logout(){
        session()->forget(['customer_id']);
        session()->forget(['customer_name']);
        return redirect('/');
    }

    function formLogin()
    {
        return view('frontend.customer.login');
    }
}
