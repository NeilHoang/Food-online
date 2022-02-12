@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            DataTable DISH
            <a href="{{route('dish.create')}}" class=" btn btn-sm btn-dark " style="float:right">Add Data</a>
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
                            <th>Dish Name</th>
                            <th>Dish Detail</th>
                            <th>Dish Status</th>
                            <th>Dish Cate</th>
                            <th>Dish Image</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dishes as $key => $dish)
                            <tr style="text-align: center;vertical-align: middle">
                                <td>{{$key++}}</td>
                                <td>{{$dish->dish_name}}</td>
                                <td>{{$dish->dish_detail}}</td>
                                <td>
                                    @if($dish->dish_status == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>{{$dish->category->category_name}}</td>
                                <td><img src="{{asset("upload/Dish/".$dish->dish_image)}}" width="100"/></td>
                                <td>
                                    <a href="{{route('dish.edit',$dish->id)}}"
                                       class="btn btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete?')"
                                       class="btn btn-outline-danger"
                                       href="{{route('dish.destroy',$dish->id)}}"> <i class="fas fa-trash"
                                                                                      title="Click to the destroy"></i></a>
                                    @if($dish->dish_status == 1)
                                        <a class="btn btn-outline-primary"
                                           href="{{route('dish.inactive',$dish->id)}}">
                                            <i class="fas fa-arrow-up" title="Click to the Active"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-outline-success "
                                           href="{{route('dish.active',$dish->id)}}">
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
                            <th>Dish Name</th>
                            <th>Dish Detail</th>
                            <th>Dish Status</th>
                            <th>Dish Cate</th>
                            <th>Dish Image</th>
                            <th>Active</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
        </div>

@endsection
