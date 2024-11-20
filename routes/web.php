<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarModelsController as CarModelsController;
use App\Http\Controllers\CarsController as CarsController;
use App\Models\CarModels;
use App\Models\Cars;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home' , function(){
    if(Auth::User()->role == 'admin'){
        return view('pages.home');
    }else{
        Auth::logout();
       // $request->session()->invalidate();
        //$request->session()->regenerateToken();
        return redirect('/');
    }
    
});

Route::get('/Models_List' , [CarModelsController::class, 'model_list'])->name('model_list');
Route::get('/Model_Add' , function(){
    return view('pages.models_add');
});
Route::get('/Cars_List' , function(){
    $cars = App\Models\Cars::all();
    return view('pages.cars_list', compact('cars'));
})->name('cars_list');
Route::get('/Car_Add' , function(){
    $models = App\Models\CarModels::all();
    return view('pages.cars_add', compact('models'));
});


Route::get('/quote_requests' , function(){
    return view('pages.quote_requests');
});


Route::post('/add_model_post', [CarModelsController::class, 'add_model'])->name('add_model');
Route::post('/add_car_post', [CarsController::class, 'add_car'])->name('add_car');

Route::any('/update_model/{id}', [CarModelsController::class, 'update_model'])->name('update_model');
Route::any('/update_car/{id}', [CarsController::class, 'update_car'])->name('update_car');

Route::any('/update_model_post/{id}', [CarModelsController::class, 'update_model_post'])->name('update_model_post');
Route::any('/update_car_post/{id}', [CarsController::class, 'update_car_post'])->name('update_car_post');

Route::any('/delete_model/{id}', [CarModelsController::class, 'delete_model'])->name('delete_model');
Route::any('/delete_car/{id}', [CarsController::class, 'delete_car'])->name('delete_car');
