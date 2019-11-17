<?php

namespace App\Http\Controllers;

use Response;
use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function getAllMealRecords(){
            $meal  = Meal::all();
            $response["meals"] = $meal;
            $response["success"] = 1;
            return response()->json($response);
            }
}
