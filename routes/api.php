<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('test','FrontApi@testing');
Route::post('contact_form','FrontApi@save_contact_query');
Route::post('subscribe','FrontApi@subscribe_user');
Route::get('service','FrontApi@get_service');
Route::post('room_booking_request','FrontApi@room_booking_request');
Route::post('feedback','FrontApi@feedback');
Route::post('signup','AuthController@signup');
Route::post('login','AuthController@login');