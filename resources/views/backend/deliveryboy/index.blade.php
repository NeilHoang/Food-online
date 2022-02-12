@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            DataTable DELIVERY BOY
            <a href="{{route('delivery.create')}}" class=" btn btn-sm btn-dark " style="float:right">Add Data</a>
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Added On</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($delivery_boys as $key => $delivery)
                            <tr style="text-align: center;vertical-align: middle">
                                <td>{{$key++}}</td>
                                <td>{{$delivery->name}}</td>
                                <td>{{$delivery->phone}}</td>
                                <td>
                                    @if($delivery->status == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>{{$delivery->added_on}}</td>
                                <td>
                                    <a href="{{route('delivery.edit',$delivery->id)}}"
                                       class="btn btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete?')"
                                       class="btn btn-outline-danger"
                                       href="{{route('delivery.destroy',$delivery->id)}}"> <i class="fas fa-trash"
                                                                                              title="Click to the destroy"></i></a>
                                    @if($delivery->status == 1)
                                        <a class="btn btn-outline-success"
                                           href="{{route('delivery.inactive',$delivery->id)}}">
                                            <i class="fas fa-arrow-up" title="Click to the Active"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-outline-success "
                                           href="{{route('delivery.active',$delivery->id)}}">
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Added On</th>
                            <th>Active</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
        </div>

@endsection
