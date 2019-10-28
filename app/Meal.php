<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    //
    protected  $fillable = ['user_id', 'meal_name','day', 'meal_type'];
}
