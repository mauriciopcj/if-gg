<?php

namespace App\Http\Controllers;

use App\Champion;
use App\Mastery;
use App\Services\LolRequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChampionsController extends Controller
{
    
    public function index()
    {
        $data = null;
        if (Session::get('summoner')) {
            $data = Session::get('summoner');
        }
        if ($data != null) {

            $match = Mastery::where('masteries.summonerId', 'LIKE', $data['id'])->join('champions','masteries.championId', '=', 'champions.id')->orderBy('champions.name')->get();
    
            $version = (new LolRequestService(true))->getLastVersion();
    
            return view('champions.index', compact(['match', 'version']));
        }
        return redirect('/');

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $summonerId)
    {
        $match = Mastery::where('masteries.summonerId', 'LIKE', ''.$summonerId)->join('champions','masteries.championId', '=', 'champions.id')->orderBy('masteries.championPoints', 'desc')->get();
    
        $version = (new LolRequestService(true))->getLastVersion();

        return view('champions.index', compact(['match', 'version']));
    }

    public function edit(Champion $champion)
    {
        //
    }

    public function update(Request $request, Champion $champion)
    {
        //
    }

    public function destroy(Champion $champion)
    {
        //
    }
}
