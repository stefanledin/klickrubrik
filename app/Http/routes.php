<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::post('din-rubrik', function(Request $request) {
    $name = $request->input('who');
    $what = $request->input('what');
    $andBut = $request->input('and-but');
    return 'Först trodde '.$name.' att '.$what.' '.$andBut.' du kan inte gissa vad som hände sen!';
});