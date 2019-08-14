<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function () {
    // "App\Http\Controllers\Admin"名前空間下のコントローラ
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('votes', 'VoteController');

});
