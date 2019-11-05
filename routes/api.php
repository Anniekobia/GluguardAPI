<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bloodglucose', 'BloodGlucoseController@getAllBloodGlucoseRecords');

Route::post('daily/bloodglucose', 'DailyLogsController@saveBloodGlucoseLevel');

Route::post('daily/meals', 'DailyLogsController@saveDailyMeals');

Route::post('daily/exercise', 'DailyLogsController@saveDailyExercises');

Route::get('food/recommendations', 'FoodRecommendationsController@getAllFoodRecommendations');

Route::post('user/details', 'UserDetailsController@saveUserDetail');




Route::post('daily/logs', 'DailyLogsController@createDailyRecord');



