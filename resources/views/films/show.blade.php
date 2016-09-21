@extends('main')

@section ('title', ''.htmlentities($film->title))

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/film.css') }}">
@stop

@section('content')

    <div class="wrap">
        <div class="row">
            <div class="col-xs-12 col-lg-4">
                <h1 class="space-left">{{ $film->title }}</h1>

                <!-- small info -->

                <ul class="list-unstyled">
                    <li></li>
                </ul>

                <dl class="dl-horizontal">
                        <dt>Public:</dt>
                        <dd>{{ $film->classification->name }}</dd>
                        <dt>Durée:</dt>
                        <dd>{{ $film->runtime }} min</dd>
                        <dt>Date:</dt>
                        <dd>{{ $film->year }}</dd>
                        <dt>Nationalité:</dt>
                        <dd>{{ $film->nationality }}</dd>
                        <dt>Genre:</dt>
                        <dd>
                            @foreach($film->genres as $genre)
                                {{ $genre->name }}
                            @endforeach
                        </dd>
                    </dl>
            </div>
            <!-- youtube trailer -->
            <div class="col-xs-12 col-lg-8">
                <div class="youtube">
                    <div class="embed-responsive embed-responsive-16by9 ">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $film->trailer }}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- big info -->
    <div class="wrap">
        <div class="row">
            <div class="hidden-xs col-sm-5 col-md-4 col-lg-3">
                <img class="img-responsive affiche" src="{{ url('img/posters/'.$film->poster) }}" alt="">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                <div class="space-left space-right">
                    <p>
                        <strong>De</strong>
                            @foreach($film->directors as $director)
                                {{ $director->name }}
                            @endforeach
                    </p>
                    <p>
                        <strong>Avec:</strong>
                        @foreach($film->actors as $i => $actor)
                            {{ $actor->name.',' }}
                            @if($i == count($film->actors) - 1)
                                ...
                            @endif
                        @endforeach
                    </p>
                    <p>{{ $film->synopsis }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- showtimes -->
    <div class="wrap">
        <div class="row">
            <div class="col-lg-12">

                @foreach($showtimes as $showtime)
                    <div class="col-lg-12">
                        <div class="screen">
                            <div class="col-lg-3">
                            {{ \Carbon\Carbon::parse($showtime->date)->format('d M Y') }}:
                            </div>

                            <div class="col-lg-3">
                                {{ isset($showtime->screenone->time) ? $showtime->screenone->time : "" }}

                                @foreach($showtime->screenone->types as $type)
                                {{ $type->name }}
                                @endforeach
                            </div>

                            <div class="col-lg-3">
                                {{ isset($showtime->screentwo->time) ? $showtime->screentwo->time : "" }}

                                {{--@foreach($showtime->screentwo->types as $type)
                                    {{ $type->name }}
                                @endforeach--}}
                            </div>

                            <div class="col-lg-3">
                                {{ isset($showtime->screenthree->time) ? $showtime->screenthree->time : "" }}

                                {{--@foreach($showtime->screenthree->types as $type)
                                    {{ $type->name }}
                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@stop



