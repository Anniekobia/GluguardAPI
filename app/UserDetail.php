<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    protected $fillable = ['user_id', 'age','gender', 'weight', 'height', 'activity_level', 'daily_calories' ];
}
