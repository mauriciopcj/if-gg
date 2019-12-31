<?php

namespace App\Http\Controllers;

use App\Summoner;
use Illuminate\Http\Request;
use App\Services\LolRequestService;

class SummonerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $summoner = Summoner::all();
        return view('summoners.index', compact('summoner'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = str_replace(' ','%20',$_GET['name']);
        
        $lolService = new LolRequestService();
        $result = $lolService->getSummonerByName($name);
        
        $responseData = json_decode($result, true);

        return view('summoners.create', [ 
            'name' => $responseData['name'],
            'puuid' => $responseData['puuid'], 
            'summonerLevel' => $responseData['summonerLevel'], 
            'revisionDate' => $responseData['revisionDate'], 
            'id' => $responseData['id'], 
            'accountId' => $responseData['accountId'], 
            'profileIconId' => $responseData['profileIconId']
        ] );
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
        $dadosCorretos = array(
            'id' => $request['id'],
            'name' => $request['name'], 
            'puuid' => $request['puuid'], 
            'summonerLevel' => $request['summonerLevel'], 
            'revisionDate' => $request['revisionDate'],
            'accountId' => $request['accountId'], 
            'profileIconId' => $request['profileIconId']
        );
        Summoner::create($dadosCorretos);

        return redirect(route('summoner.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Summoner  $summoner
     * @return \Illuminate\Http\Response
     */
    public function show(Summoner $summoner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Summoner  $summoner
     * @return \Illuminate\Http\Response
     */
    public function edit(Summoner $summoner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Summoner  $summoner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Summoner $summoner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Summoner  $summoner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Summoner $summoner)
    {
        $summoner = Summoner::findOrFail($summoner->id);
        $summoner->delete();

        return redirect(route('summoner.index'))->with('success', 'summoner is successfully deleted');
    }
}
