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

    @foreach($m->details->participants as $p)

      @if($p->summonerName == "Lanolder")

        @if($p->win == true)
        <div class="alert alert-success card p-2 m-2 col-12 d-flex flex-row justify-content-center" id="full_match">
        @else
        <div class="alert alert-danger card p-2 m-2 col-12 d-flex flex-row justify-content-center" id="full_match">
        @endif

          <div class="col-12 row row-cols-12 justify-content-between">

            <div class="col-12 col-md-4 pt-2 pb-2 p-0 d-flex justify-content-center align-items-center">

              <div class="col-5 position-relative">
                <img style="max-widht:50px;" class="rounded-circle p-0 col" src="{{ $p->champion->img_square }}" alt="">
                <div style="bottom:0;width:25px;height:25px;" class="position-absolute rounded-circle bg-dark text-white d-flex justify-content-center">{{ $p->champLevel }}</div>
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

              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="{{ $p->item_0->image }}" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="{{ $p->item_1->image }}" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="{{ $p->item_2->image }}" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="{{ $p->item_3->image }}" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="{{ $p->item_4->image }}" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="{{ $p->item_5->image }}" alt="">
              <img class="border-left border-white" style="max-width:40px;heigth:auto;" src="{{ $p->item_6->image }}" alt="">

            </div>

            <div class="col-12 col-md-4 d-flex justify-content-around align-items-center p-0 pt-2 pb-2">

              <div>{{ $p->kills }} \ {{ $p->deaths }} \ {{ $p->assists }}</div>
              <div>{{ $p->goldEarned }}</div>

              <div class="text-center">
                {{ date('H:i:s', $m->details->gameDuration) }}<br>
                {{ date("d/m/Y", ($m->timestamp / 1000)) }}
              </div>

            </div>

          </div>

          <button class="btn btn-dark">V</button>

        </div>

      @endif
          
    @endforeach

  @endforeach
  </div>

</div>
{{ $match->links() }}

<div class="container">
  <div class="row row-cols-12">
  @foreach($match as $m)
    <div class="col-12 row row-cols-12 card p-2 m-2" id="full_match">
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
                <img style="max-width:20px;heigth:auto;" src="{{ $part->item_0->image }}" alt="">
                <img style="max-width:20px;heigth:auto;" src="{{ $part->item_1->image }}" alt="">
                <img style="max-width:20px;heigth:auto;" src="{{ $part->item_2->image }}" alt="">
                <img style="max-width:20px;heigth:auto;" src="{{ $part->item_3->image }}" alt="">
                <img style="max-width:20px;heigth:auto;" src="{{ $part->item_4->image }}" alt="">
                <img style="max-width:20px;heigth:auto;" src="{{ $part->item_5->image }}" alt="">
                <img style="max-width:20px;heigth:auto;" src="{{ $part->item_6->image }}" alt=""></td>
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

