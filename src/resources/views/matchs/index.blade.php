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
  <div class="row row-cols-12">
  @foreach($match as $m)
    <div class="col-12 row row-cols-12 card p-2 m-2">
      <div class="col col-sm-2">
        <img class="rounded-circle" src="{{ $m->champion->img_square }}" alt="">
        <div class="d-flex justify-content-center flex-column">
          {{ $m->details->gameMode }}<br>
          {{ date('H:i:s', $m->details->gameDuration) }}<br>
          @if($m->details->gameMode !== "ARAM")
            {{ $m->lane }}<br>
          @endif
          {{ date("d/m/Y H:i:s", ($m->timestamp / 1000) ) }}
        </div>
      </div>
      <div class="col col-sm-10 p-0">
        <!-- {{ $m->details }}<br> -->
        <!-- {{ $m->details->participants }}<br> -->
        <div class="" id="teams">
          <div id="red-team" class="">
            <table class="table table-sm table-danger">
              <tr>
                <td>Summoner Name:</td>
                <td>Multi Kill:</td>
                <td>Champ Level:</td>
                <td>Gold Earned:</td>
                <td>KDA:</td>
              </tr>
            @foreach($m->details->participants as $part)
              @if($part->teamId == 200)
              <tr>
                <td>{{ $part->summonerName }}</td>
                <td>{{ $part->largestMultiKill }}</td>
                <td> <img style="max-width:20px;height:auto;" src="{{ $part->champion->img_square }}" alt="">{{ $part->champLevel }}</td>
                <td>{{ $part->goldEarned }}</td>
                <td>{{ $part->kills }} \ {{ $part->deaths }} \ {{ $part->assists }}</td>
              </tr>
              @endif
            @endforeach
            </table>
          </div>

          <div id="blue-team"class="">
          <table class="table table-sm table-info">
              <tr>
                <td>Summoner Name:</td>
                <td>Multi Kill:</td>
                <td>Champ Level:</td>
                <td>Gold Earned:</td>
                <td>KDA:</td>
              </tr>
          @foreach($m->details->participants as $part)
            @if($part->teamId == 100)
            <tr>
              <td>{{ $part->summonerName }}</td>
              <td>
              <img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item_0->image }}" alt=""><img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item_1->image }}" alt=""><img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item_2->image }}" alt=""><img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item_3->image }}" alt=""><img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item_4->image }}" alt=""><img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item_5->image }}" alt=""><img style="max-width:20px;heigth:auto;" src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/item/{{ $part->item_6->image }}" alt=""></td>
              <td><img style="max-width:20px;height:auto;" src="{{ $part->champion->img_square }}" alt="">{{ $part->champLevel }}</td>
              <td>{{ $part->goldEarned }}</td>
              <td>{{ $part->kills }} \ {{ $part->deaths }} \ {{ $part->assists }}</td>
            </tr>
            @endif
          @endforeach
          </table>
          </div>
        
        </div>
        
      </div>
    </div>
  @endforeach 
  </div>
  {{ $match->links() }}
</div>

@endsection

