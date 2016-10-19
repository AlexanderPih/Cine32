@extends('main')

@section('title', 'Association')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/apropos.css') }}">
@stop

@section('content')
<div class="wrap">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <div class="space-left">
                <h1>Présentation</h1>

                <div class="space-left">
                    {!! $association->description !!}
                </div>
            </div>
        </div>

        <!-- sidebar -->
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="well space-right space-top">
                <h3 class="text-center">Rapports d'activité:</h3>
                    <ul class="text-center list-unstyled">

                        @foreach($pdfs as $pdf)
                            <li>
                                <a href="{{ asset('pdf/' . $pdf->pdf ) }}"><img src="{{ url('img/pdf.png') }}" alt=""></a><br>{{ $pdf->year }}
                            </li>
                        @endforeach
                    </ul>

            </div>
        </div>
    </div>
</div>


@stop