<?php

namespace App\Http\Controllers;

use Response;
use App\FoodRecommendations;
use Illuminate\Http\Request;

class FoodRecommendationsController extends Controller
{
    public function getAllFoodRecommendations(){
            $foods  = FoodRecommendations::all();
            $response["food_recommendations"] = $foods;
            $response["success"] = 1;
            return response()->json($response);
            }
}
