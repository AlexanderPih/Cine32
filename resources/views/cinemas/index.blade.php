@extends('main')

@section('title', 'Cinémas')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/film.css') }}">
@stop

@section('content')

    @foreach($cinemas as $cinema)
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 thumb">
            <div class="support">
                <div class="affiche-support">
                    <a href="{{ route('cinemas.show', $cinema->slug) }}">
                        <img class="img-responsive affiche" src="{{ url('img/cinemas/'.$cinema->photo) }}" alt="">
                    </a>
                    <p class="text-center">
                        {{ $cinema->name }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach


@stop