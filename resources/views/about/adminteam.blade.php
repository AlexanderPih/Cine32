@extends('admin')

@section('title', 'Equipe')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Equipe</h1>

                <div class="wrap admin-wrap">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Photo:</th>
                            <th>Nom:</th>
                            <th>Titre:</th>
                            <th>Téléphone:</th>
                            <th>E-mail:</th>
                            <th>Actions:</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($teams as $team)
                            <tr>
                                <td class="col-md-1"><img class="min-profile" src="{{ url('img/team/'.$team->photo) }}"></td>
                                <td class="col-md-2">{{ $team->name }}</td>
                                <td class="col-md-4">{{ $team->title }}</td>
                                <td class="col-md-1">{{ $team->phone }}</td>
                                <td class="col-md-1">{{ $team->email }}</td>
                                <td class="col-md-3">
                                    <div class="col-md-4">
                                        <button class="btn btn-default">
                                            <a href="{{ route('team.edit', $team->id) }}"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
                                        </button>
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::open(['route' => ['history.delete', $team->id], 'method' => 'DELETE']) !!}

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