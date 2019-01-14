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
Route::get('/', 'HomeController@index')->name('home');
Route::post('/','ExamsController@create');

//Do exam
Route::get('/exams/{id?}','ExamsController@show');

//Save exam
Route::post('/save/{id?}','ExamsController@saveExam');

//Finish exam
Route::get('/finish/{id?}','ExamsController@mark');

//Suggest question
Route::get('/suggest', 'SuggestsController@index')->name('showSug');
Route::get('/suggest/new','SuggestsController@suggestQues');
Route::post('/suggest/new', 'SuggestsController@newSuggest');
Route::get('/suggest/remove/{id?}','SuggestsController@deleteSug');
// Route::get('/suggest/detail',function(){
// 	return view("exams.detail_suggest");
// });

//Auth
Auth::routes();
Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');
Route::get('users/logout', 'Auth\LoginController@logout');
Route::get('users/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('users/login', 'Auth\LoginController@login');


Route::get('/homepage', 'HomeController@home');
Route::get('/course', 'HomeController@course');
Route::get('/discussion', 'HomeController@discussion');