<!doctype html>
<html lang="">
<head>
    <style>
        .padding {
            padding: 2rem !important
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2
        }

        h3 {
            font-size: 20px
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium'
        }

        .text-dark {
            color: #3d405c !important
        }

    </style>
    <title></title>
</head>
<body>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
        <div class="card-header p-4">
            <a class="pt-2 d-inline-block" href="{{ url('/') }}" data-abc="true">Staple Food</a>
            <div class="float-right">
                <h3 class="mb-0">Invoice {{ $orders->order_id }}</h3>
                Date: {{ $orders->created_at }}
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>
                    <h3 class="text-dark mb-1">Staple Food</h3>
                    <div>Hai Chau, Da Nang, Stress</div>
                    <div>Email: hoangbuivan0962654936@gmail.com</div>
                    <div>Phone: 0862096685</div>
                </div>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">To:</h5>
                    <h3 class="text-dark mb-1"> {{ $shipping->name }}</h3>
                    <div>{{ $shipping->address }}</div>
                    <div>{{ $shipping->email }}</div>
                    <div>{{ $shipping->phone }}</div>
                </div>
            </div>
            <div>
                <table class="border-1">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Item</th>
                        <th class="right">Price</th>
                        <th class="center">Qty</th>
                        <th class="right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @php($sum = 0)
                    <tr>
                        <td class="center">{{ $i++ }}</td>
                        <td class="left strong">{{ $orderDetails->dish_name }}</td>
                        <td class="right">VNĐ. {{$orderDetails->dish_price }}</td>
                        <td class="center">{{ $orderDetails->dish_qty }}</td>
                        <td class="right">VNĐ. {{ $total = $orderDetails->dish_price * $orderDetails->dish_qty}}</td>
                    </tr>
                    @php($sum = $sum + $total)
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Total</strong>
                            </td>
                            <td class="right">VNĐ. {{ $sum}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0">Staple Food, Welcome ... !</p>
        </div>
    </div>
</div>
</body>
</html>
