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

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    #region User
    Route::get('/user/{id}', 'API\UserController@GetUserInfo');
    Route::put('/user', 'API\UserController@UpdateUserInfo');
    Route::put('/user/password/change', 'API\UserController@UpdatePassword');
    Route::get('/user/{id}/statistic', 'API\UserController@GetUserStatistic');
    Route::get('/user/{id}/rating', 'API\UserController@GetUserRating');
    Route::get('/user/{id}/rating/average', 'API\UserController@GetAverageRating');
    Route::get('/user/{id}/comments', 'API\UserController@GetUsersComments');
    Route::post('/user/{id}/rating', 'API\UserController@SetUserRating');
    Route::post('/user/{id}/comment', 'API\UserController@AddCommentToUser');
    #endregion
    #region Trip
    Route::post('/trip/create', 'API\TripsController@CreateTrip');
    Route::put('/trip/update/{id}', 'API\TripsController@UpdateTrip');
    Route::get('/trip/paginated/all/{perPage}', 'API\TripsController@GetAllPaginatedTrips');
    Route::post('/trip/paginated/search/{perPage}', 'API\TripsController@GetSearchPaginatedTrips');
    Route::get('/trip/user/{id}', 'API\TripsController@GetUserCurrentTrip');
    #endregion
    #region Preferences
    Route::get('/preferences/user/{id}', 'API\PreferencesController@GetPreferencesByUserId');
    Route::put('/preferences/update', 'API\PreferencesController@UpdatePreferencesByUserId');
    #endregion
    #region Passengers
    Route::get('/passengers/get/{tripId}', 'API\PassengersController@GetPassengersByTripId');
    Route::get('/passengers/add/{tripId}', 'API\PassengersController@AddPassengerToTrip');
    Route::get('/passengers/remove/{tripId}', 'API\PassengersController@RemovePassengerFromTrip');
    #endregion
    #region Car
    Route::get('/car/info/{userId}', 'API\CarController@GetCarInfoByUserId');
    Route::get('/car/bodyTypes', 'API\CarController@GetCarBodyTypes');
    Route::get('/car/marks', 'API\CarController@GetCarMarks');
    Route::get('/car/models/{markId}', 'API\CarController@GetModelsByMarkId');
    Route::put('/car/update/{userId}', 'API\CarController@UpdateCarInfoByUserId');
    Route::get('/driver/statistic/{userId}', 'API\CarController@GetDriverStatistic');
    Route::get('/car/comments/{carId}', 'API\CarController@GetCarComments');
    Route::get('/car/rating/{carId}', 'API\CarController@GetCarRating');
    Route::post('/car/rating/{carId}', 'API\CarController@SetCarRating');
    Route::post('/car/comments/{carId}', 'API\CarController@AddCarComment');
    Route::get('/car/rating/{carId}/average', 'API\CarController@GetAverageRating');
    #endregion
    #region Image
    Route::post('/image/user', 'API\UserController@SaveImage');
    Route::get('/image/user', 'API\UserController@GetUserImage');
    Route::post('/image/car', 'API\CarController@SaveImage');
    Route::get('/image/car', 'API\CarController@GetCarImage');

    #endregion
});


