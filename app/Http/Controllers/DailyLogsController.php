<?php

namespace App\Http\Controllers;

use App\BloodGlucose;
use App\Exercises;
use App\Meal;
use App\Medication;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;

class DailyLogsController extends Controller
{
    //
    public function createDailyRecord(Request $request){
        $exercise =  $this->saveDailyExercises($request);
        $bloodGlucose =  $this->saveBloodGlucoseLevel($request);
        $meal =  $this->saveDailyMeals($request);

        return response()->json(['exercise' => $exercise,
            'meal' => $meal,
            'blood glucose' => $bloodGlucose]);

    }

    public function saveBloodGlucoseLevel(Request $request){
        $bloodGlucoseLevel = new BloodGlucose([
            'blood_glucose_value' => $request->blood_glucose_value,
            'blood_glucose_type' => $request->blood_glucose_type,
            'user_id' => $request->user_id,
            'day' => NOW()
         ]);
        $bloodGlucoseLevel->save();
        return $bloodGlucoseLevel;
    }

    public function saveDailyExercises(Request $request){
        $exercise = new Exercises([
                'user_id' => $request->user_id,
                'exercise_name' => $request->exercise_name,
                'duration' => $request->duration,
                'distance' => $request->distance,
                'day'=> NOW(),
                'calories_burnt' => $request->calories_burnt
            ]);

        $exercise->save();
        return $exercise;

    }

    public function saveDailyMeals(Request $request){
        $meal = new Meal([
            'user_id' => $request->user_id,
            'meal_name' => $request->meal_name,
            'meal_time' => $request->meal_time,
            'quantity' => $request->quantity,
            'calories' => $request->calories,
            'day' => NOW()
        ]);

        $meal->save();
        return $meal;
    }

     public function saveDailyMedications(Request $request){
            $medication = new Medication([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'units' => $request->units,
                'day' => NOW()
            ]);

            $medication->save();
            return $medication;
        }
}
