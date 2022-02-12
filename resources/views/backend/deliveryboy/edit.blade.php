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
                        <form action="{{route('delivery.update',$delivery_boys->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <lable>Name</lable>
                                <input type="text" class="form-control" name="name" value="{{$delivery_boys->name}}">
                            </div>
                            <div class="form-group">
                                <lable>Number</lable>
                                <input type="number" class="form-control" name="phone" value="{{$delivery_boys->phone}}">
                            </div>
                            <div class="form-group">
                                <lable>Password</lable>
                                <input type="password" class="form-control" name="password" value="{{$delivery_boys->password}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="added_on" value="{{$delivery_boys->added_on}}">
                                <input type="hidden" class="form-control" name="status" value="{{$delivery_boys->status}}">
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Update</button>
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
