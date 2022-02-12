@extends('frontend.master')
@section('title','Register a Customer')

@section('content')
    <div class="login-page about">
        <img class="login-w3img" src="{{asset('frontend')}}/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Sign Up to your account</h3>
            <div class="login-agileinfo">
                <form action="{{route('customer-store')}}" method="post">
                    @csrf
                    <input class="agile-ltext" type="text" name="username" placeholder="Enter you name ..." required="">
                    <input class="agile-ltext" type="email" name="email" placeholder="Your Email ..." required="">
                    <input class="agile-ltext" type="text" name="phone" placeholder="Your Phone Number ..." required="">
                    <input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
                    <div class="wthreelogin-text">
                        <ul>
                            <li>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                    <span> I agree to the terms of service</span>
                                </label>
                            </li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </div>
    </div>

@endsection
