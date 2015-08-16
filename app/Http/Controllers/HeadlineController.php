<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HeadlineController extends Controller
{
    protected $punchlines = [
        'och du kan inte gissa vad som hände sen!',
        '– du anar inte vad som vad hände!',
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


    public function preview(Request $request)
    {
        $headline = 'Först trodde ';
        $headline .= $request->input('who') . ' ';
        $headline .= 'att ';
        $headline .= $request->input('what') . ' ';
        $headline .= $this->punchlines[$request->input('punchline')];
        return $headline;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
