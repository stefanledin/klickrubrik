<?php

use Illuminate\Http\Request;

Route::get('/', [
    'as' => 'home',
    'uses' => 'HeadlineController@create'
]);

Route::post('din-rubrik', 'HeadlineController@store');