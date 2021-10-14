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

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{lang}','LanguageController@setLanguage')->name('setLanguage');

Route::get('auth/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register','Auth\RegisterController@register');

Route::get('auth/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login','Auth\LoginController@login');
Route::get('auth/logout','Auth\LoginController@logout')->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/home', 'IndexController@home')->name('indexHome');



});
