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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('bloodglucose', 'BloodGlucoseController@getAllBloodGlucoseRecords');

Route::get('meals', 'MealController@getAllMealRecords');

Route::get('exercises', 'ExercisesController@getAllExerciseRecords');

Route::post('daily/bloodglucose', 'DailyLogsController@saveBloodGlucoseLevel');

Route::post('daily/meals', 'DailyLogsController@saveDailyMeals');

Route::post('daily/exercise', 'DailyLogsController@saveDailyExercises');

Route::get('food/recommendations', 'FoodRecommendationsController@getAllFoodRecommendations');

Route::post('user/details', 'UserDetailsController@saveUserDetail');

//Passport authentication
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
Route::get('test', function () {
                   echo "Beatrice";
                       });


Route::post('daily/logs', 'DailyLogsController@createDailyRecord');



