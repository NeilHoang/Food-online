@extends('backend.include.master')
@section('title')
    Show Order
@endsection
@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            @if (\Session::has('msg'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('msg') !!}</li>
                    </ul>
                </div>
            @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr style="text-align: center;vertical-align: middle">
                            <th>STT</th>
                            <th>Order Name</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Order Date</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key => $order)
                            <tr style="text-align: center;vertical-align: middle">
                                <td>{{$key++}}</td>
                                <td>{{$order->username}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_type}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->created_at}}</td>
                                {{--                                <td><img src="{{asset("upload/Dish/".$dish->dish_image)}}" width="100"/></td>--}}
                                <td>
                                        <a class="btn btn-outline-primary"
                                           href="{{route('order.view',$order->order_id)}}">
                                            <i class="fas fa-search" title="View Order Detail"></i>
                                        </a>
                                        <a class="btn btn-outline-success "
                                           href="{{route('order.viewInvoiced',$order->order_id)}}">
                                            <i class="fas fa-search-plus" title="View Order Invoice"></i>
                                        </a>
                                    <a class="btn btn-outline-dark "
                                       href="{{route('order.downloadInvoiced',$order->order_id)}}">
                                        <i class="fas fa-arrow-circle-down" title="Download Invoice"></i>
                                    </a>
                                    <a class="btn btn-outline-danger" id="delete"
                                       href="{{route('order.destroy',$order->order_id)}}"> <i class="fas fa-trash"
                                                                                              title="Click to the destroy"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr style="text-align: center;vertical-align: middle">
                            <th>STT</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Order Date</th>
                            <th>Active</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
        </div>

@endsection
