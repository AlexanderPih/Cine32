@extends('main')

@section('title', 'Historique')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/bootflat.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/history.css') }}">
@stop

@section('content')

    <div class="wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="timeline content-wrap">
                    <dl>
                        @for($i = 0; $i < $histories->count(); $i++)
                            @if($i % 2 == 0)
                                <dt>{{ $histories[$i]->year }}</dt>
                                <dd class="pos-right clearfix">
                                    <div class="circ"></div>
                                    <div class="events">
                                        <div class="events-body">
                                            <p>{{ $histories[$i]->body }}</p>
                                        </div>
                                    </div>
                                </dd>

                            @else

                            <dt>{{ $histories[$i]->year }}</dt>
                            <dd class="pos-left clearfix">
                                <div class="circ"></div>
                                <div class="events">
                                    <div class="events-body">
                                        <p>{{ $histories[$i]->body }}</p>
                                    </div>
                                </div>
                            </dd>
                            @endif
                        @endfor
                    </dl>
                </div>
            </div>

        </div>
    </div>




@stop