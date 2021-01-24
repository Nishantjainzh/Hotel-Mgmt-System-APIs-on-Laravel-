<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscribeUser extends Model
{
    protected $table = 'subscribe_users';
    protected $fillable = ['email'];
}
