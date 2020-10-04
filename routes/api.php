<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'Api\AuthController@login');
Route::post('/register', 'Api\AuthController@register');

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Route::get('/user', function (Request $request){
    //     return $request->user();
    // });

    Route::get('/auth-info','Api\AuthController@authenticatedUserInfo');

    Route::post('/logout', 'Api\AuthController@logout');
    Route::post('/send-verification-code', 'Api\AuthController@send_verify_code');
    Route::post('/verify', 'Api\AuthController@verify');
    Route::post('/auth-user/update', 'Api\AuthController@authenticatedUserInfoUpdate');
});
