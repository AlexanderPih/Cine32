@extends('admin')

@section('title', 'Modifier Acteur')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Editer un Acteur/ une Actrice</h1>

                <div class="col-md-6">
                    <div class="wrap admin-wrap">

                        {!! Form::model($actor, ['route' => ['actor.update', $actor->id], 'method' => 'PUT']) !!}

                                <!-- Name Form Input -->
                        <div class="form-group">
                            {!! Form::label('name', 'Nom:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Form Input -->
                        <div class="form-group">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('actor.index') }}"><span class="btn btn-warning">Annuler</span></a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> <!-- row -->

    </div>


@stop
