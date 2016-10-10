@extends('main')

@section('title', 'Equipe Ciné32')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/film.css') }}">
@stop

@section('content')

    <div class="col-sm-12 col-lg-12">
        @foreach($teams as $team)
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 thumb">
                <div class="support">
                    <div class="affiche-support" style="min-height: 440px;">
                        {{--<a href="{{ route('cinemas.show', $cinema->slug) }}">--}}
                            <img class="img-responsive affiche" src="{{ url('img/team/'.$team->photo) }}" alt="">
                        </a>
                        <p class="text-center">
                            {{ $team->name }}
                        </p>
                        <p class="text-center">
                            {{ $team->title }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@stop