<?php

use Illuminate\Http\Request;

Route::middleware(['auth:api'])->group(function () {
    // "App\Http\Controllers\Admin"名前空間下のコントローラ
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
