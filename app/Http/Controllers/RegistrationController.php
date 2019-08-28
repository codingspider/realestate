<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;

class RegistrationController extends Controller
{
    public function store(Request $request){

    	 $this->validate($request, [
		    'name' => 'required |string',
		    'email' => 'required|email',
		    'phone' => 'required |string',
		    'password' => 'required',
		    'user_type' =>'required',
		    'confirm_password' =>'required',
		    
		 ]);

		 $data = array(
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "password" => Hash::make($request->input("password")),
            "AccessLevel" => $request->input("user_type"),
  
        );

		DB::table('users')->insert($data);
		return back()->with('message', 'Registration has been successfull');
    	
    }

    public function create(){

    	return view('registration');
    }
}
