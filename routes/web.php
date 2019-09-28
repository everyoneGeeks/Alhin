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
Route::get('/employee/delete/{id}','employeesController@delete')->name('employee.delete')->where('id', '[0-9]+')->middleware('role:users,delete');
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
Route::get('/company/delete/{id}','companiesController@delete')->name('company.delete')->where('id', '[0-9]+')->middleware('role:users,delete');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| country Section 
|--------------------------------------------------------------------------
| this will handle all country part
*/
Route::get('/countries','CountriesController@list')->name('countries');
Route::get('/country/edit/{id}','CountriesController@edit')->name('country.edit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/country/edit/{id}','CountriesController@editSubmit')->name('country.edit.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/country/add','CountriesController@add')->name('country.add')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/country/add','CountriesController@addSubmit')->name('country.add.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/country/delete/{id}','CountriesController@delete')->name('country.delete')->where('id', '[0-9]+')->middleware('role:users,delete');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| religion Section 
|--------------------------------------------------------------------------
| this will handle all religion part
*/
Route::get('/religions','religionsController@list')->name('religions');
Route::get('/religion/edit/{id}','religionsController@edit')->name('religion.edit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/religion/edit/{id}','religionsController@editSubmit')->name('religion.edit.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/religion/add','religionsController@add')->name('religion.add')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/religion/add','religionsController@addSubmit')->name('religion.add.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/religion/delete/{id}','religionsController@delete')->name('religion.delete')->where('id', '[0-9]+')->middleware('role:users,delete');
#--------------------------------------------------------------------------




/*
|--------------------------------------------------------------------------
| nationality Section 
|--------------------------------------------------------------------------
| this will handle all nationality part
*/
Route::get('/nationalitys','nationalitysController@list')->name('nationalitys');
Route::get('/nationality/edit/{id}','nationalitysController@edit')->name('nationality.edit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/nationality/edit/{id}','nationalitysController@editSubmit')->name('nationality.edit.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/nationality/add','nationalitysController@add')->name('nationality.add')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/nationality/add','nationalitysController@addSubmit')->name('nationality.add.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/nationality/delete/{id}','nationalitysController@delete')->name('nationality.delete')->where('id', '[0-9]+')->middleware('role:users,delete');
#--------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| contact Us  Section 
|--------------------------------------------------------------------------
| this will handle all contact part
*/
Route::get('/contact','contactController@list')->name('contact');
Route::get('/contact/delete/{id}','contactController@delete')->name('contact.delete')->where('id', '[0-9]+')->middleware('role:users,delete');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| ads Section 
|--------------------------------------------------------------------------
| this will handle all ads part
*/
Route::get('/ads','adsController@list')->name('ads');
Route::get('/ads/edit/{id}','adsController@edit')->name('ads.edit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/ads/edit/{id}','adsController@editSubmit')->name('ads.edit.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/ads/add','adsController@add')->name('ads.add')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::post('/ads/add','adsController@addSubmit')->name('ads.add.submit')->where('id', '[0-9]+')->middleware('role:users,edit');
Route::get('/ads/delete/{id}','adsController@delete')->name('ads.delete')->where('id', '[0-9]+')->middleware('role:users,delete');
#--------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| App setting  Section 
|--------------------------------------------------------------------------
| this will handle all App setting  part
*/
Route::get('/setting','settingController@list')->name('setting');
Route::get('/app/setting/edit/{id}','settingController@edit')->name('setting.edit')->where('id', '[0-9]+')->middleware('role:users,delete');
Route::post('/app/setting/edit/{id}','settingController@editSubmit')->name('setting.edit.submit')->where('id', '[0-9]+')->middleware('role:users,delete');
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

