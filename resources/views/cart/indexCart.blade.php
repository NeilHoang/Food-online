@extends('frontend.master')
@section('title',)
    List Cart
@endsection

@section('content')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    <h3 class="card-header my-5 text-center mt-3" style="background-color: lightyellow">
                        Cart Items
                    </h3>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-responsive">
                            <caption>List of users</caption>
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Active</th>
                                <th scope="col">Dish Name</th>
                                <th scope="col">Dish Image</th>
                                <th scope="col">Dish Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Grand Total Price</th>
                            </tr>
                            </thead>
                            @php($i =1)
                            @php($sum = 0)
                            @foreach($cartDishes as $key => $cartDish)
                                <tbody>
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <th scope="row">
                                        <a href="{{route("remove-item",$cartDish->rowId)}}" type="button"
                                           class="btn btn-danger">
                                            <span aria-hidden="true">x</span>
                                        </a></th>
                                    <td>{{$cartDish->name}}</td>
                                    <td><img src="{{asset("upload/Dish/".$cartDish->options->image)}}" width="100"/>
                                    </td>
                                    @if($cartDish->options->half_price == null)
                                        <td>{{$cartDish->price}}</td>
                                    @else
                                        <td>{{$cartDish->options->half_price}}<sup>VNĐ</sup></td>
                                    @endif
                                    <td>
                                        <form action="{{route('cart.UpdateDishInToCart',$cartDish->rowId)}}"
                                              method="POST">
                                            @csrf
                                            <input type="number" name="qty" value="{{$cartDish->qty}}"
                                                   style="width: 50px; height: 25px" min="1" max="125">
                                            <input type="submit" name="btn" value="Update" class="btn btn-success"
                                                   style="width: 57px;height: 25px; padding-top: 0;padding-left: 0;padding-bottom: 0;padding-right: 0">
                                        </form>
                                    </td>
                                    @if($cartDish->options->half_price == null)
                                        <td>{{$subTotal = $cartDish->price*$cartDish->qty}}</td>
                                    @else
                                        <td>{{$subTotal = $cartDish->options->half_price*$cartDish->qty}}<sup>VNĐ</sup>
                                        </td>
                                    @endif
                                    <td>{{$cartDish->subTotal}}</td>
                                    <input type="hidden" value="{{$sum = $sum + $subTotal}}">
                                </tr>
                                </tbody>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center"> = {{$sum}}VNĐ</td>
                                <?php
                                \Illuminate\Support\Facades\Session::put('sum', $sum);
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @if(\Illuminate\Support\Facades\Session::get('customer_id','shipping_id'))
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{route('checkout-payment')}}" class="btn btn-danger" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @elseif(\Illuminate\Support\Facades\Session::get('customer_id'))
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{route('shipping')}}" class="btn btn-danger" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @else
                <div class="col-md-9 product-w3ls-right">
                    <a href="" data-toggle="modal" data-target="#login_or_register" class="btn btn-danger"
                       style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @endif

        </div>
        <!-- Modal -->
        <div class="modal fade" id="login_or_register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3> Welcome.. To Staple Food</h3>
                                    <div class="text-center" style="
                                    margin-top: 25px;
                                    height: 160px;
                                    width: 160px;
                                    border-radius: 50%;
                                    background-color: darksalmon;
                                    color: ghostwhite;
                                    padding-top: 65px;
                                    font-size: 20px;">
                                        Keep you smile...
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4>You are a new member ... !</h4>
                                    <a href="{{route('customer-register')}}"
                                       class="btn btn-block btn-primary text-center"
                                       style="
                                            height: 60px;
                                            width: auto;
                                            padding-top: 12px;
                                            margin-top: 12px;
                                            font-size: 25px;
                                         ">
                                        <span class="mt-5">Register</span>
                                    </a>
                                    <h3 class="mt-lg-5 text-center">Or</h3>
                                    <h4 class="mt-5">Already have a account ... !</h4>
                                    <a href="{{route('form-login')}}" class="btn btn-block btn-success text-center"
                                       style="
                                            height: 60px;
                                            width: auto;
                                            padding-top: 12px;
                                            margin-top: 12px;
                                            font-size: 25px;
                                         ">
                                        <span class="mt-5">Login</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                        {{--                        <button type="button" class="btn btn-primary">Understood</button>--}}
                    </div>
                </div>
            </div>
        </div>
@endsection
