@extends('main')

@section('title', 'Animations')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/animations.css') }}">
@stop

@section('content')

    <div class="col-lg-12">
        @foreach($animations as $animation)
            <div class="col-lg-6">
                <a href="{{ route('animation.show', $animation->id) }}" class="thumbnail" style="min-height: 330px;">
                <div class="col-lg-5">
                    <img class="img-responsive" src="{{ url('img/animations/'.$animation->photo) }}" alt="">
                </div>
                <div class="col-lg-7">
                    <h4>{{ $animation->title }}</h4>
                    {{ \Carbon\Carbon::parse($animation->date)->format('d M Y') }}
                    <hr>
                    {!! substr($animation->body, 0, 400) !!}{{ strlen($animation->body) > 400 ? ' ...' : '' }}
                </div>
                </a>
            </div>
        @endforeach
    </div>
@stop