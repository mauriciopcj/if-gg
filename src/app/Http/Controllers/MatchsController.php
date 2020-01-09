<?php

namespace App\Http\Controllers;

use App\Match;
use App\MatchDetail;
use App\Mastery;
use App\Participants;
use App\Services\LolRequestService;
use App\Summoner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MatchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageIndex = null;
        $data = null;
        if (Session::get('summoner')) {
            $data = Session::get('summoner');
        }
        if (isset($_GET['page'])) {
            $pageIndex = $_GET['page'];
        }
        if ($data != null && $pageIndex == null) {
            $lolService = new LolRequestService(true);

            $responseMatchs = json_decode($lolService->getMatchs($data['accountId'], '0', '100'), true);
            $matches = [];
            $pages = (int) ceil((int) $responseMatchs['totalGames'] / 10);
            foreach ($responseMatchs['matches'] as $ma) {
                $match = Match::where('gameId', 'LIKE', $ma['gameId'])->first();
                if ($match) {
                    if (count($matches) < 10) {
                        array_push($matches, $match);
                    }
                } else {
                    $match = [];
                    $match['lane'] = $ma['lane'];
                    $match['gameId'] = $ma['gameId'];
                    $match['champion_id'] = $ma['champion'];
                    $match['platformId'] = $ma['platformId'];
                    $match['timestamp'] = $ma['timestamp'];
                    $match['queue'] = $ma['queue'];
                    $match['role'] = $ma['role'];
                    $match['season'] = $ma['season'];
                    $this->store($match);
                    if (count($matches) < 10) {
                        array_push($matches, $match);
                    }
                }
            }
            foreach ($matches as $mat) {
                if (MatchDetail::where('gameId', 'LIKE', $mat['gameId'])->exists()) {
                } else {
                    $result = $lolService->getMatchDetail($mat['gameId']);
                    $responseData = json_decode($result, true);
                    $detail = new MatchDetail;
                    $detail->gameId = $responseData['gameId'];
                    $detail->gameMode = $responseData['gameMode'];
                    $detail->gameType = $responseData['gameType'];
                    $detail->gameDuration = $responseData['gameDuration'];
                    $detail->gameCreation = $responseData['gameCreation'];
                    $detail->save();

                    $participants = array();
                    foreach ($responseData['participantIdentities'] as $partIdent) {
                        $participants[$partIdent['participantId']] = [
                            'id' => $partIdent['player']['summonerId'],
                            'accountId' => $partIdent['player']['currentAccountId'],
                            'name' => $partIdent['player']['summonerName'],
                            'profileIconId' => $partIdent['player']['profileIcon']
                        ];
                    }
                    foreach ($responseData['participants'] as $part) {
                        if (Summoner::where('id', $participants[$part['participantId']])->exists()) {
                        } else {

                            $summoner = new Summoner;
                            $summoner->profileIconId = (int) $participants[$part['participantId']]['profileIconId'];
                            $summoner->name = trim($participants[$part['participantId']]['name']);
                            $summoner->accountId = $participants[$part['participantId']]['accountId'];
                            $summoner->id = $participants[$part['participantId']]['id'];
                            $summoner->save();
                        }
                        if (Participants::where('participantId', 'LIKE', $part['participantId'])->where('match_detail_id', 'LIKE', $responseData['gameId'])->exists()) {
                        } else {
                            $participant = new Participants;
                            $participant->participantId = $part['participantId'];
                            $participant->match_detail_id = $responseData['gameId'];
                            $participant->spell1Id = $part['spell1Id'];
                            $participant->lane = $part['timeline']['lane'];
                            $participant->spell2Id = $part['spell2Id'];
                            $participant->largestMultiKill = $part['stats']['largestMultiKill'];
                            $participant->kills = $part['stats']['kills'];
                            $participant->assists = $part['stats']['assists'];
                            $participant->deaths = $part['stats']['deaths'];
                            $participant->goldEarned = $part['stats']['goldEarned'];
                            $participant->champLevel = $part['stats']['champLevel'];
                            $participant->championId = $part['championId'];
                            $participant->teamId = $part['teamId'];
                            foreach ($responseData['participantIdentities'] as $sumId) {
                                if ($sumId['participantId'] == $part['participantId']) {
                                    $participant->summonerName = $sumId['player']['summonerName'];
                                }
                            }
                            $participant->summonerId = $participants[$part['participantId']]['id'];
                            $participant->win = $part['stats']['win'];
                            $participant->item0 = $part['stats']['item0'];
                            $participant->item1 = $part['stats']['item1'];
                            $participant->item2 = $part['stats']['item2'];
                            $participant->item3 = $part['stats']['item3'];
                            $participant->item4 = $part['stats']['item4'];
                            $participant->item5 = $part['stats']['item5'];
                            $participant->item6 = $part['stats']['item6'];
                            $participant->save();
                        }
                    }
                }
            }
            $match = Match::where('participants.summonerId', 'LIKE', $data['id'])
                ->join('match_details', 'matches.gameId', '=', 'match_details.gameId')
                ->join('participants', 'participants.match_detail_id', '=', 'match_details.gameId')
                ->orderBy('gameCreation', 'desc')->take(10)->get();
            $version = $lolService->getLastVersion();
            $summoner = $data;
            $page = 1;
            $mastery = Mastery::where('summonerId', 'LIKE', $summoner->id)
                ->orderBy('championPoints', 'desc')->take(3)->get();
            return view('matchs.index', compact(['match', 'version', 'summoner', 'pages', 'page', 'mastery']));
        } else if ($data != null && $pageIndex != null) {
            $lolService = new LolRequestService(true);

            $responseMatchs = json_decode($lolService->getMatchs($data['accountId'], ((string) (($pageIndex - 1) * 10)), ((string) (($pageIndex - 1) * 10) + 10)), true);
            $matches = [];
            $pages = (int) ceil((int) $responseMatchs['totalGames'] / 10);
            foreach ($responseMatchs['matches'] as $ma) {
                $match = Match::where('gameId', 'LIKE', $ma['gameId'])->first();
                if ($match) {
                    array_push($matches, $match);
                } else {
                    $match = [];
                    $match['lane'] = $ma['lane'];
                    $match['gameId'] = $ma['gameId'];
                    $match['champion_id'] = $ma['champion'];
                    $match['platformId'] = $ma['platformId'];
                    $match['timestamp'] = $ma['timestamp'];
                    $match['queue'] = $ma['queue'];
                    $match['role'] = $ma['role'];
                    $match['season'] = $ma['season'];
                    $this->store($match);
                    array_push($matches, $match);
                }
            }
            foreach ($matches as $mat) {
                if (MatchDetail::where('gameId', 'LIKE', $mat['gameId'])->exists()) {
                } else {
                    $result = $lolService->getMatchDetail($mat['gameId']);
                    $responseData = json_decode($result, true);
                    $detail = new MatchDetail;
                    $detail->gameId = $responseData['gameId'];
                    $detail->gameMode = $responseData['gameMode'];
                    $detail->gameType = $responseData['gameType'];
                    $detail->gameDuration = $responseData['gameDuration'];
                    $detail->gameCreation = $responseData['gameCreation'];
                    $detail->save();

                    $participants = array();
                    foreach ($responseData['participantIdentities'] as $partIdent) {
                        $participants[$partIdent['participantId']] = [
                            'id' => $partIdent['player']['summonerId'],
                            'accountId' => $partIdent['player']['currentAccountId'],
                            'name' => $partIdent['player']['summonerName'],
                            'profileIconId' => $partIdent['player']['profileIcon']
                        ];
                    }
                    foreach ($responseData['participants'] as $part) {
                        if (Summoner::where('id', $participants[$part['participantId']])->exists()) {
                        } else {

                            $summoner = new Summoner;
                            $summoner->profileIconId = (int) $participants[$part['participantId']]['profileIconId'];
                            $summoner->name = trim($participants[$part['participantId']]['name']);
                            $summoner->accountId = $participants[$part['participantId']]['accountId'];
                            $summoner->id = $participants[$part['participantId']]['id'];
                            $summoner->save();
                        }
                        if (Participants::where('participantId', 'LIKE', $part['participantId'])->where('match_detail_id', 'LIKE', $responseData['gameId'])->exists()) {
                        } else {
                            $participant = new Participants;
                            $participant->participantId = $part['participantId'];
                            $participant->match_detail_id = $responseData['gameId'];
                            $participant->spell1Id = $part['spell1Id'];
                            $participant->lane = $part['timeline']['lane'];
                            $participant->spell2Id = $part['spell2Id'];
                            $participant->largestMultiKill = $part['stats']['largestMultiKill'];
                            $participant->kills = $part['stats']['kills'];
                            $participant->assists = $part['stats']['assists'];
                            $participant->deaths = $part['stats']['deaths'];
                            $participant->goldEarned = $part['stats']['goldEarned'];
                            $participant->champLevel = $part['stats']['champLevel'];
                            $participant->championId = $part['championId'];
                            $participant->teamId = $part['teamId'];
                            foreach ($responseData['participantIdentities'] as $sumId) {
                                if ($sumId['participantId'] == $part['participantId']) {
                                    $participant->summonerName = $sumId['player']['summonerName'];
                                }
                            }
                            $participant->summonerId = $participants[$part['participantId']]['id'];
                            $participant->win = $part['stats']['win'];
                            $participant->item0 = $part['stats']['item0'];
                            $participant->item1 = $part['stats']['item1'];
                            $participant->item2 = $part['stats']['item2'];
                            $participant->item3 = $part['stats']['item3'];
                            $participant->item4 = $part['stats']['item4'];
                            $participant->item5 = $part['stats']['item5'];
                            $participant->item6 = $part['stats']['item6'];
                            $participant->save();
                        }
                    }
                }
            }
            $match = Match::where('participants.summonerId', 'LIKE', $data['id'])
                ->join('match_details', 'matches.gameId', '=', 'match_details.gameId')
                ->join('participants', 'participants.match_detail_id', '=', 'match_details.gameId')
                ->orderBy('gameCreation', 'desc')->skip($pageIndex - 1 * 10)->take(10)->get();
            $version = $lolService->getLastVersion();
            $summoner = $data;
            $page = $pageIndex;
            $mastery = Mastery::where('summonerId', 'LIKE', $summoner->id)
                ->orderBy('championPoints', 'desc')->take(3)->get();
            return view('matchs.index', compact(['match', 'version', 'summoner', 'pages', 'page', 'mastery']));
        }
        return redirect('/');
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
    public function store(array $match)
    {
        Match::create($match);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
