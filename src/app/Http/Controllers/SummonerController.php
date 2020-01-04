<?php

namespace App\Http\Controllers;

// use App\Match;
// use App\MatchDetail;
// use App\Participants;
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

        // $version = $lolService->getLastVersion();
        // $summoner = Summoner::where('name', 'LIKE', $_GET['name'])->first();
        // if ($summoner) {
        //     $match = Match::where('summoner_id', 'LIKE', $summoner->id)->paginate(10);
        //     return view('matchs.index', compact(['version', 'summoner', 'match']));
        // } else {
        $name = str_replace(' ', '%20', $_GET['name']);

        $result = $lolService->getSummonerByName($name);

        $responseData = json_decode($result, true);
        //     $summoner = new Summoner();
        //     $summoner->name = $responseData['name'];
        //     $summoner->puuid = $responseData['puuid'];
        //     $summoner->summonerLevel = $responseData['summonerLevel'];
        //     $summoner->revisionDate = $responseData['revisionDate'];
        //     $summoner->id = $responseData['id'];
        //     $summoner->accountId = $responseData['accountId'];
        //     $summoner->profileIconId = $responseData['profileIconId'];
        //     $summoner->save();

        //     $responseMatchs = json_decode($lolService->getMatchs($summoner->accountId), true);

        //     foreach ($responseMatchs['matches'] as $ma) {
        //         $exists = Match::where('gameId', 'LIKE', $ma['gameId']);
        //         if ($exists) {
        //         } else {
        //             $match = new Match;
        //             $match->lane = $ma['lane'];
        //             $match->gameId = $ma['gameId'];
        //             $match->champion_id = $ma['champion'];
        //             $match->platformId = $ma['platformId'];
        //             $match->timestamp = $ma['timestamp'];
        //             $match->queue = $ma['queue'];
        //             $match->role = $ma['role'];
        //             $match->season = $ma['season'];
        //             $match->summoner_id = $summoner->id;
        //             $match->save();
        //         }
        //     }
        //     $matches = Match::take(10);
        //     foreach ($matches as $mat) {
        //         $exists = MatchDetail::where('gameId', 'LIKE', $mat['gameId']);
        //         if ($exists) {
        //         } else {
        //             $result = $lolService->getMatchDetail($mat->gameId);
        //             $responseData = json_decode($result, true);
        //             $detail = new MatchDetail;
        //             $detail->gameId = $responseData['gameId'];
        //             $detail->gameMode = $responseData['gameMode'];
        //             $detail->gameType = $responseData['gameType'];
        //             $detail->gameDuration = $responseData['gameDuration'];
        //             $detail->gameCreation = $responseData['gameCreation'];
        //             $detail->save();

        //             foreach ($responseData['participants'] as $part) {
        //                 $participant = new Participants;
        //                 $participant->participantId = $part['participantId'];
        //                 $participant->match_detail_id = $responseData['gameId'];
        //                 $participant->spell1Id = $part['spell1Id'];
        //                 $participant->lane = $part['timeline']['lane'];
        //                 $participant->spell2Id = $part['spell2Id'];
        //                 $participant->largestMultiKill = $part['stats']['largestMultiKill'];
        //                 $participant->kills = $part['stats']['kills'];
        //                 $participant->assists = $part['stats']['assists'];
        //                 $participant->deaths = $part['stats']['deaths'];
        //                 $participant->goldEarned = $part['stats']['goldEarned'];
        //                 $participant->champLevel = $part['stats']['champLevel'];
        //                 $participant->championId = $part['championId'];
        //                 $participant->teamId = $part['teamId'];
        //                 foreach ($responseData['participantIdentities'] as $sumId) {
        //                     if ($sumId['participantId'] == $part['participantId']) {
        //                         $participant->summonerName = $sumId['player']['summonerName'];
        //                     }
        //                 }
        //                 $participant->win = $part['stats']['win'];
        //                 $participant->item0 = $part['stats']['item0'];
        //                 $participant->item1 = $part['stats']['item1'];
        //                 $participant->item2 = $part['stats']['item2'];
        //                 $participant->item3 = $part['stats']['item3'];
        //                 $participant->item4 = $part['stats']['item4'];
        //                 $participant->item5 = $part['stats']['item5'];
        //                 $participant->item6 = $part['stats']['item6'];
        //                 $participant->save();
        //             }
        //         }
        //     }
        //     $match = Match::where('summoner_id', 'LIKE', $summoner->id)->paginate(10);
        //     $version = $lolService->getLastVersion();
        //     return view('matchs.index', compact(['summoner', 'match']));
        // }

        return view('summoners.create', [
            'name' => $responseData['name'],
            'puuid' => $responseData['puuid'],
            'summonerLevel' => $responseData['summonerLevel'],
            'revisionDate' => $responseData['revisionDate'],
            'id' => $responseData['id'],
            'accountId' => $responseData['accountId'],
            'profileIconId' => $responseData['profileIconId']
        ]);
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
