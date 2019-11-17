<?php

namespace App\Http\Controllers;

use Response;
use App\Exercises;
use Illuminate\Http\Request;

class ExercisesController extends Controller
{
    public function getAllExerciseRecords(){
            $exercise  = Exercises::all();
            $response["exercises"] = $exercise;
            $response["success"] = 1;
            return response()->json($response);
    }
}
