<?php

use Illuminate\Http\Request;

$voteRoute = 'votes';
Route::get   ($voteRoute,'VoteController@get');
Route::post  ($voteRoute,'VoteController@create');
Route::patch ($voteRoute,'VoteController@update');
Route::delete($voteRoute,'VoteController@destroy');

Route::middleware(['auth:api'])->group(function () {
    // "App\Http\Controllers\Admin"名前空間下のコントローラ
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
