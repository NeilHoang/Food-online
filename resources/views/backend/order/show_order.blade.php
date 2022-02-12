@extends('backend.include.master')
@section('title')
    View Order
@endsection
@section('content')
    <div class="offset-1 col-md-8">
        <div class="card my-5">
            <div class="card-body">
                <h1 class="text-center text-muted">Customer Info This Order</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{$customers->username}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$customers->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$customers->phone}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card my-5">
            <div class="card-body">
                <h1 class="text-center text-muted">Order Detail Info This Order</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>Order No</th>
                        <td>{{$orders->order_id}}</td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td>{{$orders->order_total}}</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>{{$orders->order_status}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card my-5">
            <div class="card-body">
                <h1 class="text-center text-muted">Shipping Info This Order</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{$shipping->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$shipping->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$shipping->phone}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$shipping->address}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card my-5">
            <div class="card-body">
                <h1 class="text-center text-muted">Payment Info This Order</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>Payment Type</th>
                        <td>{{$payments->payment_type}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{$payments->payment_status}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card my-5">
        <div class="card-body">
            <h1 class="text-center text-muted">Dish Detail Info This Order</h1>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center;vertical-align: middle">
                    <th>STT</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                    <tr style="text-align: center;vertical-align: middle">
                        <td>{{$i++}}</td>
                        <td>{{$orderDetails->dish_id}}</td>
                        <td>{{$orderDetails->dish_name}}</td>
                        <td>{{$orderDetails->dish_price}}</td>
                        <td>{{$orderDetails->dish_qty}}</td>
                        <td>{{$orderDetails->dish_price * $orderDetails->dish_qty}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
