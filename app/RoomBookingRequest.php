<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBookingRequest extends Model
{
    protected $fillable = ['name','email','mobile','address','from_date','to_date','no_of_room','no_of_member','room_type'];
}
