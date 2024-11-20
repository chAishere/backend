<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CarModels;
use App\Models\Cars;
use App\Models\QuoteReq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    public function SignUp(){

    }
    public function Signin(Request $req){
        
        // validate inputs
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];
        $req->validate($rules);
        // find user email in users table
        $user = User::where('email', $req->email)->first();
        // if user email found and password is correct
        if ($user && Hash::check($req->password, $user->password)) {
            // $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['user' => $user];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);

    }
    public function register(Request $req)
    {
        //validate
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //create new user in users table
        // $user = User::create([
        //     'name' => $req->name,
        //     'email' => $req->email,
        //     'password' => Hash::make($req->password),
        //     'role' => 'user'
        // ]);

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->role = 'user';
        $user->save();
        
        $response = ['user' => $user];
        return response()->json($response, 200);
    }

    public function show_models (){
            // Retrieve all car models
            $models = CarModels::all();

            // Return a JSON response
            return response()->json([
                'success' => true,
                'data' => $models,
            ]);
    }
    public function show_cars(){

         // Retrieve all car models
         $cars = Cars::all();

         // Return a JSON response
         return response()->json([
             'success' => true,
             'data' => $cars,
         ]);

    }
    
}