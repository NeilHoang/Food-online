@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    Category Edit
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                <div class="card">
                    <div class="card-header text-center">
                        Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('coupon.update',$coupon_codes->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <lable>Code</lable>
                                <input type="text" class="form-control" name="coupon_code" value="{{$coupon_codes->coupon_code}}">
                            </div>
                            <div class="form-group">
                                <lable>Cart Min</lable>
                                <input type="text" class="form-control" name="cart_min_value" value="{{$coupon_codes->cart_min_value}}">
                            </div>
                            <div class="form-group">
                                <lable>Value</lable>
                                <input type="text" class="form-control" name="coupon_value" value="{{$coupon_codes->coupon_value}}">
                            </div>
                            <div class="form-group" >
                                <lable>Type</lable>
                                <div class="ratio">
                                    <input type="radio" name="coupon_type" value="1">Percentage
                                    <input type="radio" name="coupon_type" value="2">Fixed
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Update</button>
                            <button type="button" name="btn" class="btn btn-outline-secondary btn-block">
                                <a href="{{route('coupon.index')}}">Return View</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
