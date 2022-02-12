@extends('frontend.master')
@section('title', 'Checkout')
@section('content')

    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    <div class="card-header text-muted">
                        <h3 style="text-align: center">Dear {{\Illuminate\Support\Facades\Session::get('customer_name')}}.</h3>
                        <h4 class="text-center">We've to know which payment method you want.</h4>
                        <div class="card md-4">
                            <h5 class="card-header mt-4 text-center text-muted">Please you select payment mothod</h5>
                            <div class="card-body">
                                <div class="checkout-left">
                                    <div class="address_form_agile mt-sm-5 mt-4">
                                        <form action="{{route('new-order')}}" method="POST">
                                            @csrf
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Cash on Delivery</th>
                                                    <td><input type="radio" class="mr-5" name="payment_type" value="Cash"> Cash</td>
                                                </tr>
                                                <tr>
                                                    <th>Stripe Card</th>
                                                    <td><input type="radio" class="mr-5" name="payment_type" value="Stripe"> Stripe</td>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td><input type="submit" name="btn" class="btn btn-success" value="Confirm Order"></td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
