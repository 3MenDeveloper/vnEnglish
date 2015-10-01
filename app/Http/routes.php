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

Route::get('/', function () {
    if(Auth::user()['role'] == 2)
    	return redirect('home');
    else
    	return view('welcome');
});



// Members

// Authentication routes...
// Route::get('login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
// Route::get('register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);


Route::get('home', ['as' => 'home', 'uses' => 'Member\MemberController@index']);

Route::group(['prefix' => 'member', 'as' => 'member::', 'namespace' => 'Member'], function(){




});



// Admin

Route::get('admin', function(){
	if(Auth::user()['role'] == 1)
		return redirect()->route('admin::home');
	else
		return redirect()->route('admin.getlogin');
});



Route::group(['prefix' => 'admin', 'as' => 'admin::', 'namespace' => 'Admin', 'middleware' => 'role'], function(){


	Route::get('home', ['as' => 'home', 'uses' => 'AdminController@index']);
	Route::resource('skills', 'SkillsController');
	Route::resource('quizs', 'QuizsController');
	Route::resource('questions', 'QuestionsController');

});


Route::get('admin/login', ['as' => 'admin.getlogin', 'uses' => 'Auth\AuthController@getAdmin']);
Route::post('admin/login', ['as' => 'admin.postlogin', 'uses' => 'Auth\AuthController@postAdmin']);



// 404

Route::any('/{name?}', function(){
	return abort(503);
});