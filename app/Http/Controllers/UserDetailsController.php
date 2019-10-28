<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    //save user details
    public function saveUserDetail(Request $request){
        $userDetail = new UserDetail([
            'user_id' => $request->user_id,
            'age'=> $request->age,
            'gender' => $this->getGender($request->gender),
            'weight' => $request->weight,
            'height' => $request->height,
            'activity_level' => $request->activity_level,
            'daily_calories' => $this->getDailyCalories($request->activity_level, $request->gender,
                $request->weight, $request->height, $request->age) ]);

        $userDetail->save();
        return $userDetail;
    }

    public function getGender($gender){
        if ($gender === 'male'){
            return 0;
        }else if ($gender === 'female'){
            return 1;
        }
    }

    public function calculateBMR($gender, $weight, $height, $age){
        if ($gender ===  'male'){
            return (10 * $weight) + (6.5 * $height) - (5 * $age) + 5;
        }else if ($gender === 'female'){
            return (10 * $weight) + (6.5 * $height) - (5 * $age) - 161;
        }else{
            return 0;
        }
    }

    public function getDailyCalories($activity_level, $gender, $weight, $height, $age){
        if ($activity_level === 'sedementary'){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.2;
        } else if ($activity_level === 'lightly active'){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.375;
        } else if ($activity_level === 'moderately active'){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.55;
        } else if ($activity_level === 'very active'){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.725;
        } else if ($activity_level === 'extra active'){
            return $this->calculateBMR($gender, $weight, $height, $age) * 1.9;
        } else{
            return 0;
        }
    }
}
