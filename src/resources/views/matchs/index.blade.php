@extends('layout')


@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
@endif

<div class="row row-cols-12">

  <div class="col-12 col-md-6 d-flex flex-row">

    <img class="rounded-circle col-4 p-2 align-self-center" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/profileicon/{{ $summoner->profileIconId }}.png">

    <div class="d-flex flex-column justify-content-center col-8 p-2">
      
      <h5>{{ $summoner->name }}</h5>
      <p>
        Level: {{$summoner->summonerLevel}}<br>
        </td>
      </p>

    </div>

  </div>

  <div class="col-12 col-md-6 d-flex flex-row row align-items-end">

    <div class="col-4 text-center d-flex flex-column align-items-center">
      <img class="shadow rounded-circle align-self-center" src="{{ $mastery->get(1)->champion->img_square }}" data-toggle="tooltip" data-html="true" title="<em>{{ $mastery->get(1)->championPoints }}</em>">
      <!-- {{ $mastery->get(1)->champion->name }}<br> -->
      <!-- {{ $mastery->get(1)->championPoints }} -->
      <img style="max-width:60px;bottom:-35px;" class="" src="{{ url(''.$mastery->get(1)->championLevel.'.png') }}" alt="">
    </div>

    <div class="col-4 text-center d-flex flex-column align-items-center">
      <img class="shadow rounded-circle align-self-center" src="{{ $mastery->get(0)->champion->img_square }}" data-toggle="tooltip" data-html="true" title="<em>{{ $mastery->get(0)->championPoints }}</em>">
      <!-- {{ $mastery->get(0)->champion->name }}<br> -->
      <!-- {{ $mastery->get(0)->championPoints }} -->
      <img style="max-width:60px;bottom:-35px;" class="" src="{{ url(''.$mastery->get(1)->championLevel.'.png') }}" alt="">
    </div>

    <div class="col-4 text-center d-flex flex-column align-items-center">
      <img class="shadow rounded-circle align-self-center" src="{{ $mastery->get(2)->champion->img_square }}" data-toggle="tooltip" data-html="true" title="<em>{{ $mastery->get(2)->championPoints }}</em>">
      <!-- {{ $mastery->get(2)->champion->name }}<br> -->
      <!-- {{ $mastery->get(2)->championPoints }} -->
      <img style="max-width:60px;bottom:-35px;" class="" src="{{ url(''.$mastery->get(1)->championLevel.'.png') }}" alt="">
    </div>

  </div>

</div>

<h1 class="text-center my-5">Matchs</h1>

<div class="container">

  <div id="accordionMatches" class="accordion row row-cols-12">
    @foreach($match as $m)

    @foreach($m->details->participants as $p)

    @if($p->summonerName == $summoner->name)

    @if($p->win == true)
    <div class="border border-dark alert alert-success card p-2 col-12 d-flex flex-row justify-content-center" id="heading{{ $m->gameId }}">
      @else
      <div class="border border-dark alert alert-danger card p-2 col-12 d-flex flex-row justify-content-center" id="heading{{ $m->gameId }}">
        @endif

        <div class="col-12 row row-cols-12 justify-content-between">

          <div class="col-12 col-md-4 pt-2 pb-2 p-0 d-flex justify-content-center align-items-center">

            <div class="col-5 position-relative">

              <img style="max-widht:50px;" class="rounded-circle p-0 col" src="{{ $p->champion->img_square }}" alt="">

              <div style="bottom:0;width:25px;height:25px;" class="position-absolute rounded-circle bg-dark text-white d-flex justify-content-center">
                {{ $p->champLevel }}
              </div>

            </div>

            <div class="col-3 d-flex flex-column">

              <img style="max-width: 30px;" src="{{ $p->spellOne->image }}" alt="">
              <img style="max-width: 30px;" src="{{ $p->spellTwo->image }}" alt="">

            </div>

            <div class="col-4 d-flex justify-content-center align-items-center">
              {{ $m->details->gameMode }}
            </div>

          </div>

          <div class="col-12 col-md-4 d-flex pt-3 pb-3 p-0 flex-row justify-content-center align-items-center">

            <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $p->item0}}.png" alt="">
            <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $p->item1}}.png" alt="">
            <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $p->item2}}.png" alt="">
            <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $p->item3}}.png" alt="">
            <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $p->item4}}.png" alt="">
            <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $p->item5}}.png" alt="">
            <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $p->item6}}.png" alt="">

          </div>

          <div class="col-12 col-md-4 d-flex justify-content-around align-items-center p-0 pt-2 pb-2">

            <div>
              {{ $p->kills }} \ {{ $p->deaths }} \ {{ $p->assists }}
            </div>
            <div>
              {{ number_format(($p->goldEarned / 1000), 1, '.', '') }}K
            </div>

            <div class="text-center">
              {{ date('H:i:s', $m->details->gameDuration) }}<br>
              {{ date("d/m/Y", ($m->timestamp / 1000)) }}
            </div>

          </div>

        </div>

        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#multiCollapse{{ $m->gameId }}" aria-expanded="false" aria-controls="multiCollapse{{ $m->gameId }}">V</button>

      </div>

      @endif

      @endforeach

      <!-- Detalhes da partida -->

      <div class="collapse multi-collapse m-0 col-12 row row-cols-12" id="multiCollapse{{ $m->gameId }}" aria-labelledby="heading{{ $m->gameId }}" data-parent="#accordionMatches">

        <div id="red-team" class="col-12 col-md-6">

          <table class="table table-sm table-danger">

            <tr class="text-center">
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/champion.png" alt="">
              </td>
              <td></td>
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/items.png" alt="">
              </td>
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/gold.png" alt="">
              </td>
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/score.png" alt="">
              </td>
            </tr>

            @foreach($m->details->participants as $part)

            @if($part->teamId == 200)
            <tr>

              <td>
                <img style="max-width:20px;height:auto;" src="{{ $part->champion->img_square }}" alt=""> {{ $part->champLevel }}</td>
              <td>
                {{ $part->summonerName }}
              </td>
              <td>
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item0}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item1}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item2}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item3}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item4}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item5}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item6}}.png" alt="">
              </td>
              <td class="text-center">
                {{ number_format(($part->goldEarned / 1000), 1, '.', '') }}K
              </td>
              <td class="text-center">
                {{ $part->kills }} \ {{ $part->deaths }} \ {{ $part->assists }}
              </td>

            </tr>
            @endif

            @endforeach
          </table>
        </div>

        <div id="blue-team" class="col-12 col-md-6">

          <table class="table table-sm table-info">

            <tr class="text-center">
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/champion.png" alt="">
              </td>
              <td></td>
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/items.png" alt="">
              </td>
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/gold.png" alt="">
              </td>
              <td>
                <img src="http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/score.png" alt="">
              </td>
            </tr>

            @foreach($m->details->participants as $part)

            @if($part->teamId == 100)

            <tr>
              <td>
                <img style="max-width:20px;height:auto;" src="{{ $part->champion->img_square }}" alt=""> {{ $part->champLevel }}</td>
              <td>
                {{ $part->summonerName }}
              </td>
              <td>
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item0}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item1}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item2}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item3}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item4}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item5}}.png" alt="">
                <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/item/{{ $part->item6}}.png" alt="">
              </td>
              <td class="text-center">
                {{ number_format(($part->goldEarned / 1000), 1, '.', '') }}K
              </td>
              <td class="text-center">
                {{ $part->kills }} \ {{ $part->deaths }} \ {{ $part->assists }}
              </td>
            </tr>

            @endif

            @endforeach

          </table>

        </div>

      </div>

      @endforeach
    </div>

  </div>
  <nav>
    <ul class="pagination">
      @for ($i = 1; $i <= $pages; $i++) 
        @if($i == $page) 
          <li class="page-item active" aria-current="page"><span class="page-link">{{$i}}</span></li>
        @endif
        @if($i != $page)
          <li class="page-item"><a class="page-link" href="{{url('/match')}}?page={{$i}}">{{$i}}</a></li>
        @endif
      @endfor
    </ul>
  </nav>

  @endsection