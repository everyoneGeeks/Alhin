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

Route::post('/register/company',"Api\companyControllers@register");
Route::post('/login/company',"Api\companyControllers@login");
Route::post('/forgetPassword/company',"Api\companyControllers@forgetPassword");
Route::post('/validateCode/company',"Api\companyControllers@validateCode");
Route::post('/changePassword/company',"Api\companyControllers@changePassword");

