@extends('pages.layouts.master')
@section('title', 'EV-World | Cars List')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">EV-World Cars List</h1>
                    <div class="row justify-content-center">
                        @foreach($cars as $item)
                        <div class="col-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('storage/' . $item->carImageurl) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->carName}}</h5>
                                    <p class="card-text">Price : {{$item->carPrice}}</p>
                                    <a href="#" class="btn btn-info">Details</a>
                                    <a href="{{route('update_car',['id' => $item->id])}}" class="btn btn-primary">Update</a>
                                    
                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#logoutModal">Delete</a>
                                </div>
                            </div>
                        </div>
                                    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete Car?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete this Car.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('delete_car',['id' => $item->id])}}">Delete</a>
                </div>
            </div>
        </div>
    </div>
                       @endforeach
                    </div>
                </div>
@endsection