<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Admin Routes
Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'], function () {

        Route::get('home', ['uses' => 'AdminController@index','as' => 'admin.home']); // Home Page Of Admin Dashboard

        # Start Users
        Route::get('users/data', 'UsersController@dataTableUsers')->name('UsersData');
        Route::resource('users', 'UsersController');
        # End Users


        # Start SiteSetting
        Route::get('SiteSetting', 'SiteSettingController@index');
        Route::post('SiteSetting', 'SiteSettingController@store');
        # End SiteSetting



        # Start buldings
        Route::get('buldings', [ 'uses' => 'BuldingsController@index', 'as' => 'admin.buldings.index']);
        Route::get('buldings/create', [ 'uses' => 'BuldingsController@create', 'as' => 'admin.buldings.create']);
        Route::post('buldings/store', [ 'uses' => 'BuldingsController@store', 'as' => 'admin.buldings.store']);
        Route::get('buldings/data', ['uses' => 'BuldingsController@dataTableBuldings', 'as' => 'admin.buldings.data']);
        # End buldings


    });
});


// User Routes

Route::get('/', function () {
    return view('frontend.welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
