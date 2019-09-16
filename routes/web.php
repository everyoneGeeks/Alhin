<?php

Route::get('/home', function () {

    return view('welcome');
})->name('dashboard');
/*
|--------------------------------------------------------------------------
| User Section 
|--------------------------------------------------------------------------
| this will handle all user part
*/
Route::get('/users','usersControllers@list')->name('users');
Route::get('/user/info/{id}','usersControllers@list')->name('user.info')->where('id', '[0-9]+');
Route::get('/user/status/{id}','usersControllers@list')->name('user.status')->where('id', '[0-9]+');
#----------------------------------------------------------------------------------