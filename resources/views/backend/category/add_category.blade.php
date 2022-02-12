@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    Category Add

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                <div class="card">
                    <div class="card-header text-center">
                        Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <lable>Category Name</lable>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group">
                                <lable>Order Number</lable>
                                <input type="number" class="form-control" name="order_number">
                            </div>
                            <div class="form-group">
                                <lable>Added On</lable>
                                <input type="date" class="form-control" name="added_on">
                            </div>
                            <div class="form-group">
                                <lable>Category Status</lable>
                                <div class="ratio">
                                    <input type="radio" name="category_status" value="1">Active
                                    <input type="radio" name="category_status" value="2">Inactive
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Add Category</button>
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
