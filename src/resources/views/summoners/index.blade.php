<style>

img {
  width:128px;
  width:auto;
  height:auto;
}

</style>

@extends('layout')

@section('title', 'Summoners')

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
  @foreach($summoner as $summ)
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card d-flex flex-row m-2">
        <img class="rounded-circle col-4 p-2 align-self-center" src="http://ddragon.leagueoflegends.com/cdn/{{ $version }}/img/profileicon/{{ $summ->profileIconId }}.png" >
        <div class="d-flex flex-column justify-content-center col-8 p-2">
          <h5>{{ $summ->name }}</h5>
          <p>
            Level: {{$summ->summonerLevel}}<br>
            <!-- Revision Date:<br>{{ date("d/m/Y H:i:s", ($summ->revisionDate / 1000) ) }}<br> -->
            <!-- <td>{{$summ->puuid}}</td><hr>
            <td>{{$summ->idapi}}</td><hr>
            <td>{{$summ->accountId}}</td><hr> -->
            </td>
          </p>
        </div>
      </div>
    </div>
  @endforeach 
  </div>
</div>
    
<a href="{{ route('summoner.create') }}" class="btn btn-primary" role="button">Add Summmoner</a>
@endsection

