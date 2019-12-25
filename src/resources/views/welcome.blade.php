@extends('layout')

@section('title', 'IF-GG')

@section('content')
<!-- Styles -->
<style>
    .full-height {
        height: 70vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }
</style>

<div class="flex-center position-ref full-height">
    
    <div class="row">

        <form class="col" action="{{ route('summoner.create') }}" method="GET">

            <div class="input-field col d-flex flex-column justify-content-center">

                <input name="name" id="name" type="text" class="mb-3" placeholder="Summoner Name">

                <button type="submit" class="btn btn-dark">Search</button>

            </div>
        </form>
    </div>
</div>
@endsection
