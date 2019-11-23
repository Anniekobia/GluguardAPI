<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;

class UserDetailsController extends Controller
{
    //save user details
    public function saveUserDetail(Request $request){
        $date = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
        $userDetail = new UserDetail([
            'user_id' => $request->user_id,
            'date_of_birth'=> $date,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'height' => $request->height,
            'activity_level' => $request->activity_level,
             'hospital' => $request->hospital,
            'daily_calories' => $this->getDailyCalories($request->activity_level, $request->gender,
                $request->weight, $request->height, $this->getAge($request->date_of_birth))]);
        $userDetail->save();
        return $userDetail;
    }

    public function getAge($dob){
          $dob = date("d-m-Y",strtotime($dob));
          $dobObject = new DateTime($dob);
          $nowObject = new DateTime();
          $diff = $dobObject->diff($nowObject);
          return $diff->y;
    }

    public function calculateBMR($gender, $weight, $height, $age){
        if ($gender ===  'Male'){
            return (10 * $weight) + (6.5 * $height) - (5 * $age) + 5;
        }else if ($gender === 'Female'){
            return (10 * $weight) + (6.5 * $height) - (5 * $age) - 161;
        }else{
            return 0;
        }
    }

    public function getDailyCalories($activity_level, $gender, $weight, $height, $age){
        if ($activity_level === "Sedimentary"){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.2;
        } else if ($activity_level === "Lightly Active"){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.375;
        } else if ($activity_level === "Moderately Active"){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.55;
        } else if ($activity_level === "Very Active"){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.725;
        } else if ($activity_level === "Extra Active"){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.9;
        } else{
            return 0;
        }
    }


}
