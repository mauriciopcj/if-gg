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
    <div class="col-12">Summoner: {{ $m->summoner }}</div>
    <div class="col-12">Lane: {{ $m->lane }}</div>
    <div class="col-12">GameId: {{ $m->gameId }}</div>
    <div class="col-12">Champion: {{ $m->champion }}</div>
    <div class="col-12">PlatformId: {{ $m->platformId }}</div>
    <div class="col-12">Timestamp: {{ $m->timestamp }}</div>
    <div class="col-12">Queue: {{ $m->queue }}</div>
    <div class="col-12">Role: {{ $m->role }}</div>
    <div class="col-12">Season: {{ $m->season }}</div>
  @endforeach 
  </div>
</div>

@endsection

