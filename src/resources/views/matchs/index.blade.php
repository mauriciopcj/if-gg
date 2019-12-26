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
    <div class="d-flex flex-row col-12 card p-2 m-2">
      <img class="rounded-circle" src="{{ $m->champion->img_square }}" alt="">
      <div class="pl-2">
        <!-- {{ $m->details }}<br> -->
        {{ $m->details->gameMode }}<br>
        {{ date('H:i:s', $m->details->gameDuration) }}<br>
        {{ $m->lane }}<br>
        {{ date("d/m/Y H:i:s", ($m->timestamp / 1000) ) }}<br>
        Season: {{ $m->season }}<br>
        Role: {{ $m->role }}
      </div>
    </div>
  @endforeach 
  </div>
  {{ $match->links() }}
</div>

@endsection

