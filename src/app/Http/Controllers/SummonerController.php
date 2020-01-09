<?php

namespace App\Http\Controllers;

// use App\Match;
// use App\MatchDetail;
// use App\Participants;
use App\Mastery;
use App\Summoner;
use Illuminate\Http\Request;
use App\Services\LolRequestService;
use Illuminate\Support\Facades\Session;

class SummonerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $summoner = Summoner::orderBy('name')->get();
        $version = (new LolRequestService(true))->getLastVersion();
        return view('summoners.index', compact(['summoner', 'version']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lolService = new LolRequestService();

        //se quiser testar oq comentei, é só descomentar, basicamente
        //ele verifica se existe o summoner e redireciona pro matchs mandando os matchs do summoner
        //se não existir ele cria e redireciona do msm jeito, mas não sei se ta redirecionando do melhor jeito

        $summoner = Summoner::where('name', 'LIKE', trim($_GET['name']))
            ->where('summonerLevel', '<>', 'NULL')->first();
        if ($summoner) {
            Session::put('summoner', $summoner);
            Session::save();
            return redirect('/match');
        } else {
            $name = trim(str_replace(' ', '%20', $_GET['name']));

            $result = $lolService->getSummonerByName($name);

            $responseData = json_decode($result, true);
            $dadosCorretos = array(
                'id' => $responseData['id'],
                'name' => trim($responseData['name']),
                'puuid' => $responseData['puuid'],
                'summonerLevel' => $responseData['summonerLevel'],
                'revisionDate' => $responseData['revisionDate'],
                'accountId' => $responseData['accountId'],
                'profileIconId' => $responseData['profileIconId']
            );
            return $this->store($dadosCorretos);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(array $summoner)
    {
        $Sum = Summoner::updateOrCreate(['id' => $summoner['id']], $summoner);
        Session::put('summoner', $Sum);
        Session::save();

        // Antes de redirecionar para o MatchsController
        // povoar a tabela de Mastery do Summoner
        $lolService = new LolRequestService();
        $result = $lolService->getMasteryBySummonerId($Sum->id);
        $responseData = json_decode($result, true);

        foreach($responseData as $mastery)
        {
            $masteryChamp = new Mastery;
            $masteryChamp->championLevel = $mastery['championLevel'];
            $masteryChamp->chestGranted = $mastery['chestGranted'];
            $masteryChamp->championPoints = $mastery['championPoints'];
            $masteryChamp->championPointsSinceLastLevel = $mastery['championPointsSinceLastLevel'];
            $masteryChamp->championPointsUntilNextLevel = $mastery['championPointsUntilNextLevel'];
            $masteryChamp->summonerId = $mastery['summonerId'];
            $masteryChamp->tokensEarned = $mastery['tokensEarned'];
            $masteryChamp->championId = $mastery['championId'];
            $masteryChamp->lastPlayTime = $mastery['lastPlayTime'];
            $masteryChamp->save();
        }

        return redirect('/match');
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
     *   the specified resource in storage.
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
