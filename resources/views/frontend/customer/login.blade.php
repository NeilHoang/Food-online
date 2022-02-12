@extends('frontend.master')
@section('title','Login')

@section('content')

    <div class="login-page about">
        <img class="login-w3img" src="{{asset('frontend')}}/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Login to your account</h3>
            <strong class="text-center" style="color: red">{{\Illuminate\Support\Facades\Session::get('msg')}}</strong>
            <div class="login-agileinfo">
                <form action="{{route('customer-login')}}" method="post">
                    @csrf
                    <input class="agile-ltext" type="email" name="email" placeholder="Email" required="">
                    <input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
                    <div class="wthreelogin-text">
                        <ul>
                            <li>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                    <span> Remember me ?</span>
                                </label>
                            </li>
                            <li><a href="#">Forgot password?</a> </li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>

@endsection
