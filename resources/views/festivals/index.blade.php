@extends('main')

@section('title', 'Festivals')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/animations.css') }}">
@stop

@section('content')

    <div class="col-lg-12">

        @foreach($festivals as $festival)
            <div class="col-lg-6">
                <a href="{{ route('animation.show', $festival->id) }}" class="thumbnail" style="min-height: 330px;">
                    <div class="col-lg-5">
                        <img class="img-responsive" src="{{ url('img/animations/'.$festival->photo) }}" alt="">
                    </div>
                    <div class="col-lg-7">
                        <h4>{{ $festival->title }}</h4>
                        {{ \Carbon\Carbon::parse($festival->date)->format('d M Y') }}
                        <hr>
                        {!! substr($festival->body, 0, 400) !!}{{ strlen($festival->body) > 400 ? ' ...' : '' }}
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@stop