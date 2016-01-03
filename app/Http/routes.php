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


Route::get('home', ['as' => 'home', 'uses' => 'Member\MemberController@index', 'middleware' => 'auth']);


// Member
Route::group(['prefix' => 'member', 'as' => 'member::', 'namespace' => 'Member', 'middleware' => 'auth'], function(){


	Route::get('quizs/{id}',[
		'as' => 'quizs',
		'uses' => 'QuizsController@getQuizs'
	])->where('id', '[0-9]+');


	// Questions
	Route::post('questions/{cate}/{quiz}/finished',[
		'as'   => 'questions.finished',
		'uses' => 'QuestionsController@questionFinished'
	]);

	Route::get('questions/{cate}/{quiz}', [
		'as'   => 'questions',
		'uses' => 'QuestionsController@getQuestion'
	])->where(['cate' => '[0-9]+', 'quiz' => '[0-9]+']);

	Route::post('questions/{cate}/{quiz}', [
		'as'   => 'questions.checkAnswer',
		'uses' => 'QuestionsController@checkAnswer'
	]);

	/*Route::any('/questions/{name?}', function(){
		return abort(503);
	});*/

	Route::get('info', [
		'as' => 'info',
		'uses' => 'MemberController@getInfo'
	]);

	Route::post('info', [
		'as' => 'updateinfo',
		'uses' => 'MemberController@updateInfo'
	]);

	Route::post('info/avatar', [
		'as' => 'changeavatar',
		'uses' => 'MemberController@changeAvatar'
	]);

	Route::get('help', function(){
		return view('member.content.help');
	});

	Route::get('action/1', function(){
		return view('member.content.action');
	});

	Route::get('chat',[
		'as'   => 'chat',
		'uses' => 'MemberController@chat'
	]);

	Route::post('chat',[
		'as'   => 'chat',
		'uses' => 'MemberController@updateChat'
	]);


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
	Route::resource('categories', 'CategoriesController');
	Route::resource('quizs', 'QuizsController');
	Route::resource('questions', 'QuestionsController');
	Route::resource('tags', 'TagsController');
	Route::resource('users', 'UsersController');

});


Route::get('admin/login', ['as' => 'admin.getlogin', 'uses' => 'Auth\AuthController@getAdmin']);
Route::post('admin/login', ['as' => 'admin.postlogin', 'uses' => 'Auth\AuthController@postAdmin']);



// 404

Route::any('/{name?}', function(){
	return abort(503);
});