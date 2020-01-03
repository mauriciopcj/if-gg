<?php

namespace App\Services;


class LolRequestService
{
    public $apiKey;
    public $opts;
    public $baseUrl;
    public $versions;
    public function __construct(bool $getVersions = false)
    {
        $this->apiKey = env('LOL_API_KEY');
        $this->opts = array(
            'https' =>
            array(
                'method'  => 'GET',
                'header'  => array(
                    "Origin" => "https://developer.riotgames.com",
                    "Accept-Charset" => "application/x-www-form-urlencoded; charset=UTF-8",
                    "X-Riot-Token" => env('LOL_API_KEY'),
                    "Accept-Language" => "pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3",
                    "User-Agent" => "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0"
                )
            )
        );
        $this->baseUrl = 'https://br1.api.riotgames.com/';
        if ($getVersions) {
            $this->versions = json_decode(file_get_contents('https://ddragon.leagueoflegends.com/api/versions.json'));
        }
    }

    public function getSummonerByName(string $name)
    {
        $context = stream_context_create($this->opts);
        return file_get_contents("$this->baseUrl/lol/summoner/v4/summoners/by-name/$name?api_key=$this->apiKey", false, $context);
    }

    public function getSummonerById(string $id)
    {
        $context = stream_context_create($this->opts);
        return file_get_contents("$this->baseUrl/lol/summoner/v4/summoners/$id?api_key=$this->apiKey", false, $context);
    }
    
    public function getMatchs(string $accountId, string $beginIndex = '0', string $endIndex = '15')
    {
        $context = stream_context_create($this->opts);
        return file_get_contents("$this->baseUrl/lol/match/v4/matchlists/by-account/$accountId?beginIndex=$beginIndex&endIndex=$endIndex&api_key=$this->apiKey", false, $context);
    }

    public function getMatchDetail(string $matchId)
    {
        $context = stream_context_create($this->opts);
        return file_get_contents("$this->baseUrl/lol/match/v4/matches/$matchId?api_key=$this->apiKey", false, $context);
    }

    public function getChampions()
    {
        return json_decode(file_get_contents("http://ddragon.leagueoflegends.com/cdn/" . $this->versions[0] . "/data/pt_BR/champion.json"), true);
    }
    
    public function getItems()
    {
        return json_decode(file_get_contents("http://ddragon.leagueoflegends.com/cdn/" . $this->versions[0] . "/data/pt_BR/item.json"), true);
    }

    public function getSpells()
    {
        return json_decode(file_get_contents("http://ddragon.leagueoflegends.com/cdn/" . $this->versions[0] . "/data/pt_BR/summoner.json"), true);
    }

    public function getLastVersion()
    {
        return $this->versions[0];
    }
}
