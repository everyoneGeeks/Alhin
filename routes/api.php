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
#------------------------------------------
#Company
#-----------------------------------------
Route::post('/register/company',"Api\companyControllers@register");
Route::post('/update/company',"Api\companyControllers@update");

#login
Route::post('/login',"Api\companyControllers@login");
Route::post('/forgetPassword',"Api\companyControllers@forgetPassword");
Route::post('/validateCode',"Api\companyControllers@validateCode");
Route::post('/changePassword',"Api\companyControllers@changePassword");

#------------------------------------------
#employee
#-----------------------------------------
Route::post('/register/employee',"Api\EmployeeControllers@register");
Route::post('/update/employee',"Api\EmployeeControllers@update");

#------------------------------------------
#Ads
#-----------------------------------------
Route::post('/ads',"Api\AdsControllers@getAds");


#------------------------------------------
#rate
#-----------------------------------------
Route::post('/rate',"Api\SelectObjects@rate");


#------------------------------------------
#residenceCountry,religion,nationality
#-----------------------------------------
Route::post('/residenceCountry',"Api\SelectObjects@residenceCountry");
Route::post('/religion',"Api\SelectObjects@religion");
Route::post('/nationality',"Api\SelectObjects@nationality");


#------------------------------------------
#favourite,company,employee
#-----------------------------------------
Route::post('/favourite',"Api\Favourite@favourite_company");
Route::post('/makeFavourite',"Api\Favourite@MakeFavourite");


#------------------------------------------
#CV part
#-----------------------------------------
Route::post('/cv/add',"Api\CVControllers@add");
Route::post('/cv/update',"Api\CVControllers@update");
Route::post('/cv/get',"Api\CVControllers@get");
Route::post('/cv/search',"Api\CVControllers@search");
Route::post('/cv/info',"Api\CVControllers@info");

#------------------------------------------
#Jobs part
#-----------------------------------------
Route::post('/job/add',"Api\JobControllers@add");
Route::post('/job/update',"Api\JobControllers@update");
Route::post('/job/get',"Api\JobControllers@get");
Route::post('/job/search',"Api\JobControllers@search");
Route::post('/job/info',"Api\JobControllers@info");

#------------------------------------------
#appley  for employee part
#-----------------------------------------
Route::post('/appley',"Api\AppleyControllers@appley");
Route::post('/appley/get',"Api\AppleyControllers@getAppley");
Route::post('/unappley',"Api\AppleyControllers@unAppley");

#------------------------------------------
#sendFirebaseToken,contact,appInfo,changeLang part
#-----------------------------------------
Route::post('/sendFirebaseToken',"Api\SelectObjects@sendFirebaseToken");
Route::post('/contact',"Api\SelectObjects@contact");
Route::post('/appInfo',"Api\SelectObjects@appInfo");
Route::post('/view',"Api\SelectObjects@view");
Route::post('/changeLang',"Api\SelectObjects@changeLang");
