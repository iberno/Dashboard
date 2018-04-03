<?php


Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware' => 'role:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('/users', 'Admin\\UsersController')->middleware('role:admin');
        Route::resource('/roles', 'Admin\\RolesController');
        Route::resource('/permissions', 'Admin\\PermissionsController');
    });
//});