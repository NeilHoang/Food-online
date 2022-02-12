@extends('backend.include.master')
@section('title')
    Home Page
@endsection
@section('content')
    Add Dish

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                <div class="card">
                    <div class="card-header text-center">
                        Dish
                    </div>
                    <div class="card-body">
                        <form action="{{route('dish.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <lable>Dish Name</lable>
                                <input type="text" class="form-control" name="dish_name">
                            </div>
                            <div class="form-group">
                                <lable>Dish Detail</lable>
                                <textarea type="text" class="form-control" name="dish_detail" rows="3">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <lable>Dish Status</lable>
                                <div class="ratio">
                                    <input type="radio" name="dish_status" value="1">Active
                                    <input type="radio" name="dish_status" value="2">Inactive
                                </div>
                            </div>
                            <div class="form-group">
                                <lable>Dish Category</lable>
                                <td>
                                    <select class="form-control" name="category">
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </div>
                            <div>
                                <lable>Dish Image</lable>
                                <br>
                                <td><input type="file" name="dish_image"/></td>
                            </div><br>
                            <div class="card">
                                <div class="card-header" title="You can skip this">Dish Attribute</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <lable>Full Price</lable>
                                                <input type="text" class="form-control" name="full_price" placeholder="Full Price">
                                            </div>
                                            <div class="col-md-6">
                                                <lable>Half Price</lable>
                                                <input type="text" class="form-control" name="half_price" placeholder="Half Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block mt-2">Add Dish
                            </button>
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
