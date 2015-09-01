<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Headline;
use App\Headlines\HeadlineCreator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Storage;

class HeadlineController extends Controller
{
    protected $punchlines;

    /**
     * HeadlineController constructor.
     */
    public function __construct()
    {
        $this->punchlines = \App\Headlines\getPunchlines();
    }


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
        $headlineCreator = new HeadlineCreator();

        $headline = $headlineCreator->create($request);

        return view('headline', [
            'headline' => $headline
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $headline = Headline::where('uid', $id)->first();
        if ($headline) {
            return view('headline', ['headline' => $headline]);
        }
        return Redirect::home();
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
