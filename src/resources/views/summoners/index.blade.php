@extends('layout')

@section('title', 'Alumnus')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
@endif
<table class="table table-striped">
  <thead>
    <tr>
      <td>id</td>
      <td>name</td>
      <td>puuid</td>
      <td>summonerLevel</td>
      <td>revisionDate</td>
      <td>idapi</td>
      <td>accountId</td>
      <td>profileIconId</td>
      <td colspan="2">Action</td>
    </tr>
  </thead>
  <tbody>
    @foreach($summoner as $summ)
    <tr> 
      <td>{{$summ->id}}</td>
      <td>{{$summ->name}}</td>
      <td>{{$summ->puuid}}</td>
      <td>{{$summ->summonerLevel}}</td>
      <td>{{$summ->revisionDate}}</td>
      <td>{{$summ->idapi}}</td>
      <td>{{$summ->accountId}}</td>
      <td>{{$summ->profileIconId}}</td>
      <td><a href="{{ route('summoner.edit', $summ->id) }}" class="btn btn-primary" role="button">Edit</a></td>
      <td>
        <form action="{{ route('summoner.destroy', $summ->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{ route('summoner.create') }}" class="btn btn-primary" role="button">Add Summmoner</a>
@endsection

