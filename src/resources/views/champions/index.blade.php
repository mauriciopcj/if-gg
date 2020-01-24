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

<div class="d-flex flex-column justify-content-center align-items-center my-4">
    <div>
        Order By:
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn btn-dark m-2" href="{{ route('champion.index') }}">Name</a>
        <a class="btn btn-dark m-2" href="{{ route('champion.show', $match->get(0)->summoner->id) }}">Mastery</a>
    </div>
</div>

<div class="row row-cols-12">

    @foreach($match as $m)

        <div class="col m-2 d-flex flex-column align-items-center justify-content-end">
            <img class="pb-5" src="{{ $m->champion->img_square }}" data-toggle="tooltip" data-html="true" title="<em>{{ $m->championPoints }}</em>">
            <!-- {{ $m }} -->
            <div class="d-flex flex-column align-items-center">
                <img class="position-absolute" style="z-index:-1;bottom:22px;" src="{{ url('masterySquare/'.$m->championLevel.'.png') }}" alt="">
                <h5>{{ $m->name }}</h5>

            </div>
            <a href="{{ route('champion.create') }}" class="btn btn-default show_modal_form">More Info...</a>
        </div>

    @endforeach

</div>

@include('modal::container')

@endsection
