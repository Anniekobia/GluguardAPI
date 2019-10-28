<?php

namespace App\Http\Controllers;

use Response;
use App\BloodGlucose;
use Illuminate\Http\Request;

class BloodGlucoseController extends Controller
{
    public function getAllBloodGlucoseRecords(){
        $blood_glucose  = BloodGlucose::all();
        $response["blood_glucose_records"] = $blood_glucose;
        $response["success"] = 1;
        return response()->json($response);
        }
}
