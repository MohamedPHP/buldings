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
        Route::get('buldings/edit/{id}', [ 'uses' => 'BuldingsController@edit', 'as' => 'admin.buldings.edit']);
        Route::post('buldings/update/{id}', [ 'uses' => 'BuldingsController@update', 'as' => 'admin.buldings.update']);
        Route::get('buldings/delete/{id}', [ 'uses' => 'BuldingsController@delete', 'as' => 'admin.buldings.delete']);
        # End buldings


    });
});


// User Routes

Route::get('/', function () {
    return view('frontend.welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/buldings', 'BuldingsController@showAllEnabled');
Route::get('/buldings/egar', 'BuldingsController@showAllEgar');
Route::get('/buldings/tamleek', 'BuldingsController@showAllTamleek');
Route::get('/buldings/type/villas', 'BuldingsController@showVillas');
Route::get('/buldings/type/apartments', 'BuldingsController@showApartments');
Route::get('/buldings/type/beachHomes', 'BuldingsController@showBeatchHomes');
Route::get('/buldings/search', 'BuldingsController@search')->name('bulding.search');
