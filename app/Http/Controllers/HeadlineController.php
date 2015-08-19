<?php

namespace App\Http\Controllers;

use App\Headline;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HeadlineController extends Controller
{
    protected $punchlines = [
        'och du kan inte gissa vad som hände sen!',
        '– du anar inte vad som hände!',
        '– då hände det oväntade!',
        '– resultatet är chockerande!',
        '– ingen kunde ana följderna!',
        '– konsekvenserna var oanade!',
        '– ingen kunde förutse följderna!',
        'och det som hände sen har fått en hel värld att förundras!',
        'och det som hände sen har fått ett helt land att förundras!',
        'och det som hände sen har fått en hel läkarkår att förundras!',
        'det som hände sen kommer förändra din syn på mänskligheten!',
        'och det som sen hände fick mig att gråta!',
        'och resultatet har chockat en hel värld!',
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('index', ['punchlines' => $this->punchlines]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $headline = new Headline;

        $headline->headline = 'Först trodde ';
        $headline->headline .= $request->input('who') . ' ';
        $headline->headline .= 'att ';
        $headline->headline .= $request->input('what') . ' ';
        $headline->headline .= $this->punchlines[$request->input('punchline')];
        if ($request->hasFile('upload-image')) {
            $imageName = $request->file('upload-image')->getClientOriginalName();
            $request->file('upload-image')->move(public_path().'/uploads', $imageName);
            $headline->attachment = $imageName;
        } else {
            $headline->attachment = $request->input('image-link');
        }

        $headline->uid = time();
        $headline->save();

        return view('headline', ['headline' => $headline->headline]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
