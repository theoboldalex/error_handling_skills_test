<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/fix_my_date_handling', function (Request $request) {
    $date = $request->get('date');
    if (empty($date)) {
        return 'You must pass a date in the query string';
    }

    return Carbon::parse($request->get('date'))->format('Y-m-d');
});
