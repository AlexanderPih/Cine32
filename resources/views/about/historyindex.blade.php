@extends('admin')

@section('title', 'Historique')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Historique</h1>

                @include('partials._messages')

                <div class="wrap">
                    <div class="admin-wrap">
                        <h4>Créer une nouvelle étape:</h4>

                        {!! Form::open(['route' => 'history.create', 'method' => 'POST']) !!}

                        <!-- Year Form Input -->
                        <div class="form-group">
                            {!! Form::label('year', 'Année:') !!}
                            {!! Form::text('year', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('year'))
                                <span class="help-block">
                                    <strong>Le champ "Année" doit être rempli</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Body Form Input -->
                        <div class="form-group">
                            {!! Form::label('body', 'Texte:') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>Le champ "Texte" doit être rempli</strong>
                                </span>
                            @endif
                        </div>

                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main2">

                <div class="wrap admin-wrap">


                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Année:</th>
                            <th>Texte:</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($histories as $history)
                            <tr>
                                <td class="col-md-1">{{ $history->year }}</td>
                                <td class="col-md-8">{{ $history->body }}</td>
                                <td class="col-md-3">
                                    <div class="col-md-4">
                                    <button class="btn btn-default">
                                        <a href="{{ route('history.edit', $history->id) }}"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
                                    </button>
                                    </div>
                                    <div class="col-md-8">
                                    {!! Form::open(['route' => ['history.delete', $history->id], 'method' => 'DELETE']) !!}

                                    {!! Form::button('<i class="glyphicon glyphicon-trash"> Supprimer</i>', ['type' => 'submit', 'class' => 'btn btn-default right']) !!}

                                    {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- row -->
    </div>


@stop