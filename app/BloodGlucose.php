<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGlucose extends Model
{
    protected $table = 'blood_glucose';

    protected $fillable = [
            'blood_glucose_value', 'blood_glucose_type', 'user_id','day'
        ];

     public $timestamps = true;
}
