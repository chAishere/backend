@extends('pages.layouts.master')
@section('title', 'EV-World | Update CAR')
@section('content')
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">EV-World Update Car</h1>


                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="col-8">
                        <form method="POST" action="{{route('update_car_post', ['id' =>$car->id])}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Car Model</label>
                                        <?php
                                        $models = App\Models\CarModels::all();
                                        ?>
                                    <select name="category" class="form-control" id="exampleFormControlSelect1">
                                        
                                    @foreach($models as $model)
                                        <option value="{{$model->id}}">{{$model->title}}</option>
                                    @endforeach
                                    </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Car Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$car->carName}}">
                            </div>
                            
  
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Car Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$car->carDesc}}</textarea>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $car->carImageurl) }}" style="width: 50%; height: 50%">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Car Image</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Car Price</label>
                                <input type="number" name="price" class="form-control" id="exampleFormControlInput1" value="{{$car->carPrice}}">
                            </div>

                            <div class="form-group">
                                
                                <input type="submit" class="btn btn-primary " value="Update Car">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
@endsection