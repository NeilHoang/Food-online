@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            DataTable DELIVERY BOY
            <a href="{{route('coupon.create')}}" class=" btn btn-sm btn-dark " style="float:right">Add Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session()->has('msg'))
                <div class="text-dark">
                    {{ session()->get('msg') }}
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr style="text-align: center;vertical-align: middle">
                            <th>STT</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Cart Min</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Added On</th>
                            <th>Expired On</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupon_codes as $key => $coupon)
                            <tr style="text-align: center;vertical-align: middle">
                                <td>{{$key++}}</td>
                                <td>{{$coupon->coupon_code}}</td>
                                <td>{{$coupon->coupon_value}}</td>
                                <td>{{$coupon->cart_min_value}}</td>
                                <td>
                                    @if($coupon->coupon_type == 1)
                                        Percentage
                                    @else
                                        Fixed
                                    @endif
                                </td>
                                <td>{{$coupon->coupon_status}}</td>
                                <td>{{$coupon->expired_on}}</td>
                                <td>{{$coupon->added_on}}</td>
                                <td>
                                    <a href="{{route('coupon.edit',$coupon->id)}}"
                                       class="btn btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete?')"
                                       class="btn btn-outline-danger"
                                       href="{{route('coupon.destroy',$coupon->id)}}"> <i class="fas fa-trash"
                                                                                          title="Click to the destroy"></i></a>
                                    @if($coupon->coupon_status == 1)
                                        <a class="btn btn-outline-success"
                                           href="{{route('coupon.inactive',$coupon->id)}}">
                                            <i class="fas fa-arrow-up" title="Click to the Active"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-outline-success "
                                           href="{{route('coupon.active',$coupon->id)}}">
                                            <i class="fas fa-arrow-down" title="Click to the Inactive"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr style="text-align: center;vertical-align: middle">
                            <th>STT</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Cart Min</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Added On</th>
                            <th>Expired On</th>
                            <th>Active</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
        </div>

@endsection
