<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModels;
use App\Models\Cars;

class CarsController extends Controller
{
    public function add_car (Request $request){
        $car = new Cars();
        $car->model_id = $request->input('category');
        $car->carName = $request->input('name');
        $car->carDesc = $request->input('description');
        $car->carPrice = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('CarsImg', 'public');
            $car->carImageurl = $path;  // Correct variable name here
        }

        $car->save();
        return redirect()->route('cars_list');
    }



    public function update_car($id){
        $car = Cars::find($id);
        return view('pages.cars_update', compact('car'));
        //return dd($car_model);
    }

    public function update_car_post($id, Request $request){
        $car = Cars::find($id);
        $car->model_id = $request->input('category');
        $car->carName = $request->input('name');
        $car->carDesc = $request->input('description');
        $car->carPrice = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('CarsImg', 'public');
            $car->carImageurl = $path;  // Correct variable name here
        }

        $car->save();
       
        return redirect()->route('cars_list');
    }

    public function delete_car($id){
        $car = Cars::find($id);
        $car->delete();
        return redirect()->route('cars_list');
    }
}
