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

<div class="row row-cols-12">
  @foreach($summoner as $summ)
  <div class="col-6 col-sm-4 col-md-2">
    <div class="card h-100">
      <img src="http://ddragon.leagueoflegends.com/cdn/9.24.2/img/profileicon/{{ $summ->profileIconId }}.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $summ->name }}</h5>
        <p class="card-text">
          <td>{{$summ->summonerLevel}}</td><hr>
          <!-- <td>{{$summ->puuid}}</td><hr>
          <td>{{$summ->revisionDate}}</td><hr>
          <td>{{$summ->idapi}}</td><hr>
          <td>{{$summ->accountId}}</td><hr>
          <td>{{$summ->profileIconId}}</td><hr> -->
          <td><a href="{{ route('summoner.edit', $summ->id) }}" class="btn btn-primary" role="button">Edit</a>
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

