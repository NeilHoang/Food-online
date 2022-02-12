@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    Add Delivery Boy

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                <div class="card">
                    <div class="card-header text-center">
                        Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('delivery.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <lable> Name</lable>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <lable> Password</lable>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <lable> Phone </lable>
                                <input type="number" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <lable>Date</lable>
                                <input type="date" class="form-control" name="added_on">
                            </div>
                            <div class="form-group">
                                <lable>Category Status</lable>
                                <div class="ratio">
                                    <input type="radio" name="status" value="1">Active
                                    <input type="radio" name="status" value="2">Inactive
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Add Category</button>
                            <button type="button" name="btn" class="btn btn-outline-secondary btn-block">
                                <a href="{{route('delivery.index')}}">Return View</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
