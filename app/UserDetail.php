<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    protected $fillable = ['user_id', 'date_of_birth','gender', 'weight', 'height', 'activity_level', 'daily_calories','hospital'];
}
