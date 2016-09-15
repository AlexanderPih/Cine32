@extends('main')

@section('title', ''.htmlentities($animation->title))

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/animations.css') }}">
@stop

@section('content')

    <div class="wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-sm-7 col-lg-9">
                    <h1>{{ $animation->title }}</h1>
                    <?php
                        setlocale(LC_TIME, 'French');
                        $dt = \Carbon\Carbon::parse($animation->date);
                        echo ucfirst($dt->formatLocalized('%A %d %B %Y'));
                    ?>
                    <hr>
                    {{ $animation->body }}

                </div>
                <div class="col-sm-5 col-lg-3 hidden-xs">
                    <img class="img-responsive" src="{{ url('img/animations/'.$animation->photo) }}" alt="">
                </div>
            </div>
        </div>
    </div>

    {{-- show reservation form if needed: --}}
    @if($animation->reservation === 1)
    <div class="wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-8 col-offset-2">
                    <h1 class="text-center">Réservation</h1>



                </div>
            </div>
        </div>
    </div>
    @endif


@stop

