@extends('main')

@section('title', 'Films')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/film.css') }}">
@stop

@section('content')

    <!-- select forms -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">

            <div class="col-xs-3 col-sm-2 col-md-1">
                <div class="space-top-xs float-right-xs">
                    Cinema:
                </div>
            </div>
            <div class="col-xs-9 col-sm-6 col-md-8">
                <div class="form-group">
                    <div class="dropdown float-right-xs">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{ isset($cinemaName) ? $cinemaName : 'Choisir le cinéma' }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @foreach ($cinemas as $cinema)
                                <li><a href="{{ route('cinema.genre', isset($genreName) ? $cinema->slug .'/'. $genreId : $cinema->slug) }}">{{ $cinema->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-1 col-md-1">
                <div class="space-top-xs float-right">
                    Genre:
                </div>
            </div>
            <div class="col-xs-9 col-sm-3 col-md-2">
                <div class="dropdown float-right">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{ isset($genreName) ? $genreName : 'Choisir le genre' }}

                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                        @foreach ($genres as $genre)
                            <li><a href="{{ route('cinema.genre', isset($cinemaName) ? strtolower($cinemaName) .'/'. $genre->id : $genre->id) }}">{{ $genre->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

        <!-- show films -->
        @foreach($films as $film)

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 thumb">
                <div class="support">
                    <div class="affiche-support">
                        <a href="{{ route('films.show', isset($cinemaName) ? strtolower($cinemaName) .'/'. $film->slug : $film->slug) }}">
                            <img class="img-responsive affiche" src="{{ url('img/posters/'.$film->poster) }}" alt="">
                        </a>
                        <p class="text-center">
                            <strong>{{ $film->title }}</strong>
                        </p>
                    </div>
                </div>
            </div>

        @endforeach

@stop
