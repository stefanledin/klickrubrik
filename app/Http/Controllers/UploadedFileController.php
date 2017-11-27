<?php

namespace App\Http\Controllers;

use App\UploadedFile;
use Illuminate\Http\Request;

class UploadedFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('file-upload')->store('uploads');
        $link = asset('storage/'.$path);
        $image = UploadedFile::create([
            'link' => $link
        ]);

        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UploadedFile  $uploadedFile
     * @return \Illuminate\Http\Response
     */
    public function show(UploadedFile $uploadedFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UploadedFile  $uploadedFile
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadedFile $uploadedFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UploadedFile  $uploadedFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadedFile $uploadedFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UploadedFile  $uploadedFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadedFile $uploadedFile)
    {
        //
    }
}
