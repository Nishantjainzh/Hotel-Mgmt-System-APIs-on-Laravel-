<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table='services';
    protected $fillable =['title','image','description'];
}
