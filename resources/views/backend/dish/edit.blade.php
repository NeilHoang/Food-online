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
                        <form action="{{route('dish.update',$dishes->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <lable>Dish Name</lable>
                                <input type="text" class="form-control" name="dish_name"
                                       value="{{$dishes->dish_name}}">
                            </div>
                            <div class="form-group">
                                <lable>Dish Detail</lable>
                                <textarea type="text" class="form-control" name="dish_detail">{{$dishes->dish_detail}}</textarea>
                            </div>
                            <div class="form-group">
                                <lable>Dish Category</lable>
                                <td>
                                    <select name="category" class="form-control">
                                        @foreach($cates as $cate)
                                            <option @if($dishes->category_id ==$cate->id) selected
                                                    @endif value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                        <option value="0">--- Select ---</option>
                                    </select>
                                </td>
                            </div>
                            <div class="form-group">
                                <lable>Dish Image</lable>
                                <td>
                                    <p class="my-2"><img src="{{asset("upload/Dish/".$dishes->dish_image)}}" width="100"
                                        /></p>
                                    <input type="hidden" value="{{$dishes->dish_image}}" name="dish_image"/>
                                    <input type="file" name="dish_image"/>
                                </td>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="dish_status" value="{{$dishes->dish_status}}">
                            </div>
                            <div class="card">
                                <div class="card-header">Dish Attribute</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="full_price"  value="{{$dishes->full_price}}">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="text" class="form-control" name="half_price"  value="{{$dishes->half_price}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Update</button>
                            <button type="button" name="btn" class="btn btn-outline-secondary btn-block">
                                <a href="{{route('dish.index')}}">Return View</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
