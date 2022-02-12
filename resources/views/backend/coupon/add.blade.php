@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    Add Coupon Code

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                <div class="card">
                    <div class="card-header text-center">
                        Coupon
                    </div>
                    <div class="card-body">
                        <form action="{{route('coupon.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <lable>Code</lable>
                                <input type="text" class="form-control" name="coupon_code">
                            </div>
                            <div class="form-group">
                                <lable>Cart Min</lable>
                                <input type="text" class="form-control" name="cart_min_value">
                            </div>
                            <div class="form-group">
                                <lable>Value</lable>
                                <input type="text" class="form-control" name="coupon_value">
                            </div>
                            <div class="form-group">
                                <lable>Expired On</lable>
                                <input type="date" class="form-control" name="expired_on">
                            </div>
                            <div class="form-group">
                                <lable>Added On</lable>
                                <input type="date" class="form-control" name="added_on">
                            </div>
                            <div class="form-group">
                                <lable> Coupon Type</lable>
                                <div class="ratio">
                                    <input type="radio" name="coupon_type" value="1">Percentage
                                    <input type="radio" name="coupon_type" value="2">Fixed
                                </div>
                            </div>
                            <div class="form-group">
                                <lable>Status</lable>
                                <div class="ratio">
                                    <input type="radio" name="coupon_status" value="1">Active
                                    <input type="radio" name="coupon_status" value="2">Inactive
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Add Coupon
                            </button>
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
