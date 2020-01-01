@extends('layout')

@section('title', 'Matchs')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
@endif

<div class="container">

  <div id="accordionMatches" class="accordion row row-cols-12">
  @foreach($match as $m)

    @foreach($m->details->participants as $p)

      @if($p->summonerName == "Boca de Fossa")

        @if($p->win == true)
        <div class="alert alert-success card p-2 col-12 d-flex flex-row justify-content-center" id="heading{{ $m->gameId }}">
        @else
        <div class="alert alert-danger card p-2 col-12 d-flex flex-row justify-content-center" id="heading{{ $m->gameId }}">
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

              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $p->item0}}.png" alt="">              
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $p->item1}}.png" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $p->item2}}.png" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $p->item3}}.png" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $p->item4}}.png" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $p->item5}}.png" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $p->item6}}.png" alt="">
              
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
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item0}}.png" alt="">
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item1}}.png" alt="">
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item2}}.png" alt="">
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item3}}.png" alt="">
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item4}}.png" alt="">
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item5}}.png" alt="">
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item6}}.png" alt="">
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
                  <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item0}}.png" alt="">
                  <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item1}}.png" alt="">
                  <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item2}}.png" alt="">
                  <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item3}}.png" alt="">
                  <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item4}}.png" alt="">
                  <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item5}}.png" alt="">
                  <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item6}}.png" alt="">
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
{{ $match->links() }}

@endsection

