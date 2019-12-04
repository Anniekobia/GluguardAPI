<?php

namespace App\Http\Controllers;

use Response;
use App\DailySteps;
use Illuminate\Http\Request;

class DailyStepsController extends Controller
{
    public function getAllDailyStepsRecords(){
            $steps  = DailySteps::all();
            $response["dailysteps"] = $steps;
            $response["success"] = 1;
            return response()->json($response);
    }
}
