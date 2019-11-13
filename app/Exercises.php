<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    //
    protected $fillable = ['user_id', 'exercise_name', 'duration','distance','day','calories_burnt'];
}
