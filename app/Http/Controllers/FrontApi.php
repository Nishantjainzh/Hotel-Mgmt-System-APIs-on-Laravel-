<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contact;
use App\subscribeUser;
use App\service;
use App\RoomBookingRequest;
use App\feedback;

class FrontApi extends Controller
{
    function testing(){
    	echo "testing";
    }

    function save_contact_query(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name' => 'required',
    		'email' => 'required',
    		'message' => 'required',
    		'mobile_no' => 'required'
    	]);
    	if($validator->passes()){
    		$users = new Contact;
    		$users->name = $request->name;
    		$users->email = $request->email;
    		$users->mobile_no = $request->mobile_no;
    		$users->message = $request->message;
    		$users->save();
    		return response()->json(['status' => 'true', 'message' => 'Information has been sent to the Admin']);
    	}
    	else
    	{
    		return response()->json(['status' => 'Something went Wrong!!', 'message'=> $validator->errors()->all()]);
    	}
    }
    function subscribe_user(Request $request){
    	$validator = Validator::make($request->all(),[
    		'email' => 'required'
    	]);
    	if($validator->passes()){
    		$check_email = subscribeUser::where('email',$request->email)->get()->toArray();
    		if($check_email){
    			return response()->json(['status' => 'false', 'message' => 'This email is already registred with us.!']);
    		}
    		else{
    		$subscribes = new subscribeUser;
    		$subscribes->email = $request->email;
    		$subscribes->save();
    		return response()->json(['status' => 'true', 'message' => 'Thnak you for subscribe!!']);
    		}
    	}
    	else
    	{
    		return response()->json(['status' => 'Something went Wrong!!', 'message'=> $validator->errors()->all()]);
    	}
    }

    function get_service(){
    	$services = service::get()->toArray();
    	if($services){
    		return response()->json(['status' => 'true', 'data' => $services]);
    	}
    	else{
    		return response()->json(['status' => 'false', 'message' => 'Service not found!!']);
    	}
    }

    function room_booking_request(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name' => 'required',
    		'email' => 'required',
    		'mobile' => 'required'
    	]);
    	if($validator->passes()){
    		$roomBooking = new RoomBookingRequest;
    		$roomBooking->name = $request->name;
    		$roomBooking->email = $request->email;
    		$roomBooking->mobile = $request->mobile;
    		$roomBooking->address = $request->address;
    		$roomBooking->from_date = $request->from_date;
    		$roomBooking->to_date = $request->to_date;
    		$roomBooking->no_of_room = $request->no_of_room;
    		$roomBooking->no_of_member = $request->no_of_member;
    		$roomBooking->room_type = $request->room_type;
    		$roomBooking->save();
    		return response()->json(['status' => 'true', 'message' => 'Room Booking Request sent to the Admin']);
    	}
    	else
    	{
    		return response()->json(['status' => 'Something went Wrong!!', 'message'=> $validator->errors()->all()]);
    	}
    }

    function feedback(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name' => 'required',
    		'email' => 'required',
    		'review' => 'required'
    	]);
    	if($validator->passes()){
    		$roomBooking = new feedback;
    		$roomBooking->name = $request->name;
    		$roomBooking->email = $request->email;
    		$roomBooking->review = $request->review;
    		$roomBooking->rating = $request->rating;
    		$roomBooking->save();
    		return response()->json(['status' => 'true', 'message' => 'Thank you for your feedback']);
    	}
    	else
    	{
    		return response()->json(['status' => 'Something went Wrong!!', 'message'=> $validator->errors()->all()]);
    	}
    }



}
