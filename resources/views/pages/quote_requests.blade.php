@extends('pages.layouts.master')
@section('title', 'EV-World | Add Model')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Quote Requests </h1>

                    <div class="row justify-content-center">
                        <div class="col-8">
                        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Car Model</th>
      <th scope="col">Car Name</th>
      <th scope="col">Car Price</th>
    </tr>
  </thead>
  <tbody>


  <?php
                $quotes = App\Models\QuoteReq::get();
                $i = 0;
            ?>
            @foreach ( $quotes as $item)
                @php
                    $user = App\Models\User::find($item->user_id);
                    $car = App\Models\Cars::find($item->car_id);
                    $car_model = App\Models\CarModels::find($car->model_id);

                    $i = $i+1;

                @endphp
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$car_model->title}}</td>
      <td>{{$item->car_name}}</td>
      <td>{{$item->car_price}} $</td>
    </tr>

   
    @endforeach
   
  </tbody>
</table>

                        </div>
                    </div>

                </div>
@endsection