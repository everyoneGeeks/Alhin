<?php
Route::get('/home', function () {

    return view('welcome');
})->name('dashboard');


Route::group(['middleware' => ['auth']], function() {


/*
|--------------------------------------------------------------------------
| employee Section 
|--------------------------------------------------------------------------
| this will handle all employee part
*/
Route::get('/employees','employeesController@list')->name('employees');
Route::get('/employee/info/{id}','employeesController@info')->name('employee.info')->where('id', '[0-9]+');
Route::get('/employee/status/{id}','employeesController@status')->name('employee.status')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| company Section 
|--------------------------------------------------------------------------
| this will handle all company part
*/
Route::get('/companies','companiesController@list')->name('companies');
Route::get('/company/info/{id}','companiesController@info')->name('company.info')->where('id', '[0-9]+');
Route::get('/company/status/{id}','companiesController@status')->name('company.status')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/company/job/{id}','companiesController@job')->name('company.job')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------



/*
|--------------------------------------------------------------------------
| admin Section 
|--------------------------------------------------------------------------
| this will handle all admin  part
*/
Route::group(['middleware' => 'superAdmin'], function()
{
    Route::get('/admins','adminsController@list')->name('admins');
    Route::get('/admin/info/{id}','adminsController@info')->name('admin.info')->where('id', '[0-9]+');
    Route::get('/admin/permission/{id}','adminsController@status')->name('admin.permission')->where('id', '[0-9]+');
    Route::get('/admin/edit/{id}','adminsController@formEdit')->name('admin.edit')->where('id', '[0-9]+');
    Route::post('/admin/edit/{id}','adminsController@submitEdit')->name('admin.edit.submit')->where('id', '[0-9]+');
    Route::get('/admin/add','adminsController@formAdd')->name('admin.add');
    Route::get('/admin/delete/{id}','adminsController@delete')->name('admin.delete');
    Route::post('/admin/add','adminsController@submitAdd')->name('admin.add.submit');
});
#----------------------------------------------------------------------------------

});

Auth::routes(['register' => false, 'verify' => false]);

