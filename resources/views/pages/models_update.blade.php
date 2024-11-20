@extends('pages.layouts.master')
@section('title', 'EV-World | Update Model')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">EV-World Update Model</h1>

                    <div class="row justify-content-center">
                        <div class="col-8">
                        <form method="POST" action="{{route('update_model_post', ['id' =>$car_model->id])}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Model Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$car_model->title}}">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $car_model->image) }}" style="width: 50%; height: 50%">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Model Brand</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="Tesla...">
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" class="btn btn-primary " value="Update Model">
                            </div>
                            
                        </form>
                        </div>
                    </div>

                </div>
@endsection