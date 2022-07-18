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

Route::get('/', 'IndexController@topIndex')->name('topIndex');

Route::get('lang/{lang}', 'LanguageController@setLanguage')->name('setLanguage');

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('circle')->group(function () {
  Route::get('/', 'CircleController@index')->name('circle.index');
  Route::get('/detail/{circlePath}', 'CircleController@circleDetail')->name('circle.detail');
});

Route::middleware('auth')->group(function () {
  Route::get('/home', 'IndexController@home')->name('indexHome');
  Route::get('/vote', 'VoteController@home')->name('voteIndex');

  Route::prefix('member')->group(function () {
    Route::get('/edit', 'MemberController@updateInput')->name('member.update.input');
    Route::post('/edit', 'MemberController@updateSave')->name('member.update.save');
  });

  Route::prefix('circle')->group(function () {
    Route::get('/create', 'CircleController@createInput')->name('circle.create.input');
    Route::post('/create', 'CircleController@createSave')->name('circle.create.save');
    Route::get('/update/{circlePath}', 'CircleController@updateInput')->name('circle.update.input');
    Route::post('/update/{circlePath}', 'CircleController@updateSave')->name('circle.update.save');
  });
});
