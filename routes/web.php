<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home

Route::group(['middleware' => 'localization', 'prefix' => Session::get('locale')], function() {

	Route::get('/exams', 'HomeController@index')->name('home');
	Route::post('/exams','ExamsController@create')->name('createExam');

	//Do exam
	Route::get('/exams/{id?}','ExamsController@show');

	//Save exam
	Route::post('/save/{id?}','ExamsController@saveExam');

	//Finish exam
	Route::get('/finish/{id?}','ExamsController@mark');

	//Suggest question
	Route::get('/suggest', 'SuggestsController@index')->name('showSug');
	Route::get('/suggest/new','SuggestsController@newSuggest');
	Route::post('/suggest/new', 'SuggestsController@suggestQues');
	Route::get('/suggest/remove/{id?}','SuggestsController@deleteSug');

	//Auth
	Auth::routes();
	Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('users/register', 'Auth\RegisterController@register');
	Route::get('users/logout', 'Auth\LoginController@logout');
	Route::get('users/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('users/login', 'Auth\LoginController@login');

    Route::get('/', 'HomeController@home');
    Route::get('/course', 'HomeController@course');
    Route::get('/detail', 'HomeController@detail');
    Route::get('/discussion', 'HomeController@discussion');

    Route::post('/lang', [
        'as' => 'switchLang',
        'uses' => 'LangController@postLang',
    ]);
});

