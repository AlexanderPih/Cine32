@extends('admin')

@section('title', 'Genres')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Modifier une entrée historique</h1>

                <div class="col-md-6">
                    <div class="wrap admin-wrap">

                        {!! Form::model($history, ['route' => ['history.update', $history->id], 'method' => 'PUT']) !!}

                        <!-- Year Form Input -->
                        <div class="form-group">
                            {!! Form::label('year', 'Année:') !!}
                            {!! Form::text('year', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Body Form Input -->
                        <div class="form-group">
                            {!! Form::label('body', 'Texte:') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Form input -->
                        <div class="form-group">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('history.index') }}"><span class="btn btn-warning">Annuler</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- row -->
    </div>

@stop

