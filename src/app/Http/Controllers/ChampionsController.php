<?php

namespace App\Http\Controllers;

use App\Champion;
use App\Services\LolRequestService;
use Illuminate\Http\Request;

class ChampionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $match = Champion::all();

        $version = (new LolRequestService(true))->getLastVersion();

        $name = 'Lanolder';

        return view('champions.index', compact(['match', 'version', 'name']));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Champion  $champion
     * @return \Illuminate\Http\Response
     */
    public function show(Champion $champion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Champion  $champion
     * @return \Illuminate\Http\Response
     */
    public function edit(Champion $champion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Champion  $champion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Champion $champion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Champion  $champion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Champion $champion)
    {
        //
    }
}
