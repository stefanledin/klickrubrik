<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headline;

class HeadlineController extends Controller
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
        $headline = new Headline();

        // Texten i rubriken
        $headline->who = $request->input('who');
        $headline->what = $request->input('what');
        $headline->punchline = $request->input('punchline');
        
        // Om det ska laddas upp en bild eller inte.
        if ($request->hasFile('file-upload')) {
            $path = $request->file('file-upload')->store('uploads');
            $link = asset('storage/'.$path);
        } else {
            $link = $request->input('link');
        }

        // Spara attachment
        $headline->attachment_link = $link;
        $headline->attachment_type = $request->input('attachment-type');

        $headline->save();
        return $headline;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
