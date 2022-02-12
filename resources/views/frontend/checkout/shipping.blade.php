@extends('frontend.master')
@section('title','Shipping')
@section('content')

    <div class="login-page about">
        <img class="login-w3img" src="{{asset('frontend')}}/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Enter You Shipping Information</h3>
            <h4 class="w3ls-title w3ls-title1 text-center">You can change shipping information</h4>
            <div class="login-agileinfo">
                <form action="{{route('store-shipping')}}" method="post">
                    @csrf
                    <lable>Name</lable>
                    <input class="agile-ltext" type="text" name="name" placeholder="Enter you name ..." value="{{$customers->username}}">
                    <lable>Email</lable>
                    <input class="agile-ltext" type="email" name="email" placeholder="Your Email ..." value="{{$customers->email}}">
                    <lable>Phone</lable>
                    <input class="agile-ltext" type="text" name="phone" placeholder="Your Phone Number ..." value="{{$customers->phone}}">
                    <lable>Address</lable>
                    <input class="agile-ltext" type="text" name="address" placeholder="Your Address ...">
                    <div class="wthreelogin-text">
                        <ul>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>

@endsection
