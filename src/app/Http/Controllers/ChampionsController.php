<?php

namespace App\Http\Controllers;

use App\Champion;
use App\Mastery;
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
        $match = Mastery::where('masteries.summonerId', 'LIKE', 't1zgW2FvDn95vE8C5w7HsVysqNUFAYTHzPypzLtZLXs1SA')->join('champions','masteries.championId', '=', 'champions.id')->orderBy('champions.name')->get();

        $version = (new LolRequestService(true))->getLastVersion();

        return view('champions.index', compact(['match', 'version']));

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
