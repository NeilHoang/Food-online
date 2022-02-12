@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    Category Edit
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                <div class="card">
                    <div class="card-header text-center">
                        Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.update',$categories->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <lable>Category Name</lable>
                                <input type="text" class="form-control" name="category_name" value="{{$categories->category_name}}">
                            </div>
                            <div class="form-group">
                                <lable>Order Number</lable>
                                <input type="number" class="form-control" name="order_number" value="{{$categories->order_number}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="added_on" value="{{$categories->added_on}}">
                                <input type="hidden" class="form-control" name="category_status" value="{{$categories->category_status}}">
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Update</button>
                            <button type="button" name="btn" class="btn btn-outline-secondary btn-block">
                                <a href="{{route('category.index')}}">Return View</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
