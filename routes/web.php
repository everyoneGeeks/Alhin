<?php
Route::get('/home', function () {

    return view('welcome');
})->name('dashboard');


Route::group(['middleware' => ['auth']], function() {


/*
|--------------------------------------------------------------------------
| User Section 
|--------------------------------------------------------------------------
| this will handle all user part
*/
Route::get('/users','usersControllers@list')->name('users');
Route::get('/user/info/{id}','usersControllers@info')->name('user.info')->where('id', '[0-9]+');
Route::get('/user/status/{id}','usersControllers@status')->name('user.status')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------



/*
|--------------------------------------------------------------------------
| provider Section 
|--------------------------------------------------------------------------
| this will handle all provider part
*/
Route::get('/providers','providersControllers@list')->name('providers');
Route::get('/provider/info/{id}','providersControllers@info')->name('provider.info')->where('id', '[0-9]+');
Route::get('/provider/status/{id}','providersControllers@status')->name('provider.status')->where('id', '[0-9]+')->middleware('role:provider,edit');
Route::get('/provider/status/beautyCenter/{id}','providersControllers@statusbeautyCenter')->name('provider.status.beautyCenter')->where('id', '[0-9]+')->middleware('role:provider,edit');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| category Section 
|--------------------------------------------------------------------------
| this will handle all category part
*/
Route::get('/categories','categoriesController@list')->name('categories');
Route::get('/category/info/{id}','categoriesController@info')->name('category.info')->where('id', '[0-9]+');
Route::get('/category/status/{id}','categoriesController@status')->name('category.status')->where('id', '[0-9]+')->middleware('role:category,edit');
Route::get('/category/edit/{id}','categoriesController@formEdit')->name('category.edit')->where('id', '[0-9]+')->middleware('role:category,edit');
Route::post('/category/edit/{id}','categoriesController@submitEdit')->name('category.edit.submit')->where('id', '[0-9]+')->middleware('role:category,edit');
Route::get('/category/add','categoriesController@formAdd')->name('category.add')->middleware('role:category,add');
Route::post('/category/add','categoriesController@submitAdd')->name('category.add.submit')->middleware('role:category,add');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| shop levels Section 
|--------------------------------------------------------------------------
| this will handle all shop levels part
*/
Route::get('/shop/levels','shopLevelsController@list')->name('shop.levels');
Route::get('/shop/level/info/{id}','shopLevelsController@info')->name('shop.level.info')->where('id', '[0-9]+');
Route::get('/shop/level/status/{id}','shopLevelsController@status')->name('shop.level.status')->where('id', '[0-9]+')->middleware('role:shop,edit');
Route::get('/shop/level/edit/{id}','shopLevelsController@formEdit')->name('shop.level.edit')->where('id', '[0-9]+')->middleware('role:shop,edit');
Route::post('/shop/level/edit/{id}','shopLevelsController@submitEdit')->name('shop.level.edit.submit')->where('id', '[0-9]+')->middleware('role:shop,edit');
Route::get('/shop/level/add','shopLevelsController@formAdd')->name('shop.level.add')->middleware('role:shop,add');
Route::post('/shop/level/add','shopLevelsController@submitAdd')->name('shop.level.add.submit')->middleware('role:shop,add');
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


/*
|--------------------------------------------------------------------------
| User Orders 
|--------------------------------------------------------------------------
| this will handle all orders part
*/
Route::get('/orders','ordersController@list')->name('orders');
Route::get('/order/info/{id}','ordersController@info')->name('order.info')->where('id', '[0-9]+');
//Route::get('/order/status/{id}','usersControllers@status')->name('user.status')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------




});

Auth::routes(['register' => false, 'verify' => false]);

