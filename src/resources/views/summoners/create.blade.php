@extends('layout')

@section('title', 'Create Sumonner')
@section('content')
<div class="card">
  <div class="card-header">
    Add Alumnus
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{ route('summoner.store') }}">
      <div class="form-group">
        @csrf
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" />
      </div>
      <div class="form-group">
        <label for="profileIconId">profileIconId:</label>
        <input type="text" class="form-control" id="profileIconId" name="profileIconId" value="{{ $profileIconId }}"/>
      </div>
      <div class="form-group">
        <label for="puuid">puuid:</label>
        <input type="text" class="form-control" id="puuid" name="puuid" value="{{ $puuid }}"/>
      </div>
      <div class="form-group">
        <label for="summonerLevel">summonerLevel:</label>
        <input type="text" class="form-control" id="summonerLevel" name="summonerLevel" value="{{ $summonerLevel }}"/>
      </div>
      <div class="form-group">
        <label for="accountId">accountId:</label>
        <input type="text" class="form-control" id="accountId" name="accountId" value="{{ $accountId }}"/>
      </div>
      <div class="form-group">
        <label for="idapi">idapi:</label>
        <input type="text" class="form-control" id="idapi" name="idapi" value="{{ $idapi }}"/>
      </div>
      <div class="form-group">
        <label for="revisionDate">revisionDate:</label>
        <input type="text" class="form-control" id="revisionDate" name="revisionDate" value="{{ $revisionDate }}"/>
      </div>
      <button type="submit" class="btn btn-primary">Create Summoner</button>
    </form>
  </div>
</div>
@endsection