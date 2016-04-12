<?php

use Illuminate\Http\Request;

Route::get('/', [
    'as' => 'home',
    'uses' => 'HeadlineController@create'
]);

Route::post('din-rubrik', 'HeadlineController@store');

Route::get('youtube-embed', function(Request $request)
{
    return youtubeEmbed($request->get('url'));
});

Route::get('{headline}', 'HeadlineController@show');

Route::post('attachment-upload', function (Request $request)
{
	$imageName = $request->file('uploaded-image')->getClientOriginalName();
    $request->file('uploaded-image')->move(public_path().'/uploads/', $imageName);
    return response()->json(['uploadedImageURL' => url('uploads/'.$imageName)]);
});

