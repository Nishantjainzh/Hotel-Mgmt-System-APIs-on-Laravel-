<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    function signup(Request $request)
    {
       $validator = Validator::make($request->all(),[
       	'name' => 'required',
       	'email' => 'required',
       	'mobile' => 'required',
       	'password' => 'required'
       ]);

       if($validator->passes()){
       	$users= new User;
       	$users->name = $request->name;
       	$users->email = $request->email;
       	$users->mobile = $request->mobile;
       	$users->password = $request->password;
       	$users->save();

       	return response()->json(['status' => 'true' , 'data' => $users]);
       }
       else{
       	return response()->json(['status' => 'false' , 'message' => $validator->errors()->all()]);
       }
    }

    function login(Request $request){
    	$validator = Validator::make($request->all(),[
       	'email' => 'required',
       	'password' => 'required'
       ]);

    	if($validator->passes())
    	{
    	$login_info = User::where('email',$request->email)->where('password',$request->password)->first();
    		if($login_info){
    			return response()->json(['status' => 'true', 'data' => $login_info , 'message' => 'User logged in successfully' ]);
    		}
    		else{
    			return response()->json(['status' => 'false', 'message' => 'Email or password is incorrect..!' ]);
    		}
    	}
    	else
    	{
    		return response()->json(['status' => 'false', 'message' => 'something went wrong.!!' ]);
    	}    	
    }
}
