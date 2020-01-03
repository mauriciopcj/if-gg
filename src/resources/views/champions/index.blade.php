@extends('layout')

@section('title', 'Champions')

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

    @foreach($match as $m)

        <div class="col m-2">
            <img src="{{ $m->img_square }}" alt="">
            {{ $m->name }}
        </div>

    @endforeach

</div>

@endsection