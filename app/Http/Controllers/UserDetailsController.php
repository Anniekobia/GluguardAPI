<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\BloodGlucose;
use App\Meal;
use App\Medication;
use App\Exercises;
use Illuminate\Http\Request;
use DateTime;
use DB;
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

    public function getUserDetails(Request $request){
            $savedUser = UserDetail::where('user_id', $request->user_id)->first();
            $response["UserDetails"] = $savedUser;
            $response["success"] = 1;
            return response()->json($response);
    }

    public function getAllPatients(){
         /*$patients  = UserDetail::all();
         //return $patients;
         return view('patients')->with('patients',$patients);*/

        $users = DB::table('users')
                    ->join('blood_glucose', 'users.id', '=', 'blood_glucose.user_id')
                    ->join('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select('users.id','users.username', 'users.email', 'blood_glucose.blood_glucose_value')
                    //->select('users.id','users.username', 'user_details.gender')
                    ->get();

         return view('patients')->with('patients',$users);
        }

        public function getPatient($id){
            $bg = BloodGlucose::where('user_id',$id)->get();
            $meals = Meal::where('user_id',$id)->get();
            $exercises = Exercises::where('user_id',$id)->get();
            $meds = Medication::where('user_id',$id)->get();
            return view('patient')->with('bg',$bg)
                        ->with('meals',$meals)
                        ->with('exercises',$exercises)
                        ->with('meds',$meds);
         }

}
