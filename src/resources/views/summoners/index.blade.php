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

<div class="col-12 col-md-6">
  @foreach($summoner as $summ)
  <div>
    <div class="d-flex flex-row m-4 justify-content-between">
      <img src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/profileicon/{{ $summ->profileIconId }}.png" >
      <div class="ml-2">
        <h4>{{ $summ->name }}</h4>
        <p>
          Level: {{$summ->summonerLevel}}<hr>
          Revision Date:<br>{{ date("d/m/Y H:i:s", ($summ->revisionDate / 1000) ) }}<hr>
          <!-- <td>{{$summ->puuid}}</td><hr>
          <td>{{$summ->idapi}}</td><hr>
          <td>{{$summ->accountId}}</td><hr> -->
          <form action="{{ route('summoner.destroy', $summ->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
          </td>
        </p>
      </div>
    </div>
  </div>
  @endforeach 
</div>
    
<a href="{{ route('summoner.create') }}" class="btn btn-primary" role="button">Add Summmoner</a>
@endsection

