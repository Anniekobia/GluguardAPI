<?php

namespace App\Http\Controllers;

use Response;
use App\Medication;
use Illuminate\Http\Request;

class MedicationsController extends Controller
{
    public function getAllMedications(){
        $medications  = Medication::all();
        $response["medications"] = $medications;
        $response["success"] = 1;
        return response()->json($response);
        }
}
