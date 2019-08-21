<?php

use Illuminate\Http\Request;

// url prefix:  /_api
// api route(s) for inner ajax functions
// not for external services

Route::middleware(['auth:web'])->group(function () {
    $voteRoute = 'votes';
    Route::get   ($voteRoute,'VoteController@get');
    Route::post  ($voteRoute,'VoteController@create');
    Route::patch ($voteRoute,'VoteController@update');
    Route::delete($voteRoute,'VoteController@destroy');
});
