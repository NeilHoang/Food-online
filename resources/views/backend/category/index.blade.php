@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            DataTable CATEGORY
            <a href="{{route('category.create')}}" class=" btn btn-sm btn-dark " style="float:right">Add Data</a>
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
                            <th>Category Name</th>
                            <th>Order Number</th>
                            <th>Category Status</th>
                            <th>Added On</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr style="text-align: center;vertical-align: middle">
                                <td>{{$key++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->order_number}}</td>
                                <td>{{$category->category_status}}</td>
                                <td>{{$category->added_on}}</td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete?')"
                                       class="btn btn-outline-danger" href="{{route('category.destroy',$category->id)}}"> <i class="fas fa-trash"
                                                                                  title="Click to the destroy"></i></a>
                                    @if($category->category_status == 1)
                                        <a class="btn btn-outline-success"
                                           href="{{route('category.inactive',$category->id)}}">
                                            <i class="fas fa-arrow-up" title="Click to the Active"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-outline-success "
                                           href="{{route('category.active',$category->id)}}">
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
                            <th>Category Name</th>
                            <th>Order Number</th>
                            <th>Category Status</th>
                            <th>Added On</th>
                            <th>Active</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
        </div>

@endsection
