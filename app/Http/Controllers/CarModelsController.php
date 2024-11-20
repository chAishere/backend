<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModels;

class CarModelsController extends Controller
{

    public function model_list(){
        $models = CarModels::all();
        return view('pages.models_list', compact('models'));
    }

    public function add_model(Request $request)
    {
        // Create a new instance of CarModels
        $model = new CarModels();
        $model->title = $request->input('title');

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('CarModelsImg', 'public');
            $model->image = $path;  // Correct variable name here
        }

        // Save the model instance to the database
        $model->save();

        // Return a response
        //return response()->json($model);
        return redirect()->route('model_list');
    }

    public function update_model($id){
        $car_model = CarModels::find($id);
        return view('pages.models_update', compact('car_model'));
        //return dd($car_model);
    }

    public function update_model_post($id, Request $request){
        $car_model = CarModels::find($id);

        $car_model->title = $request->input('title');

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('CarModelsImg', 'public');
            $car_model->image = $path;  // Correct variable name here
        }

        // Save the model instance to the database
        $car_model->save();
        //return route('cars_list');
        return redirect()->route('model_list');
    }

    public function delete_model($id){
        $car_model = CarModels::find($id);
        $car_model->delete();
        return redirect()->route('model_list');
    }
}
