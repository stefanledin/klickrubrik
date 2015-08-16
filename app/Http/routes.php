<?php

use Illuminate\Http\Request;

Route::get('/', [
    'as' => 'home',
    'uses' => 'HeadlineController@create'
]);

#Route::resource('headline', 'HeadlineController');

Route::post('din-rubrik', 'HeadlineController@preview');