<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailySteps extends Model
{
    //
    protected $fillable = ['user_id', 'step_count', 'day','calories_burnt'];
}
