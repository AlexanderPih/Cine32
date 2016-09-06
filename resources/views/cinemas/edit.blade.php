@extends('admin')

@section('title', 'Modifier Cinéma')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('css/fileinput.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Modifier le cinéma {{ $cinema->name }}</h1>

                <div class="wrap admin-wrap" style="min-height: 600px;">

                    @if(count($errors) > 0)

                        <alert class="alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </alert>
                    @endif

                    {!! Form::model($cinema, ['route' => ['cinemas.update', $cinema->id], 'files' => true, 'method' => 'PUT']) !!}

                    <div class="col-md-7">

                        <!-- Name Form Input -->
                        <div class="form-group">
                            {!! Form::label('name', 'Nom:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Adress Form Input -->
                        <div class="form-group">
                            {!! Form::label('address', 'Adresse:') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Phone1 Form Input -->
                        <div class="form-group">
                            {!! Form::label('phone1', 'Télephone:') !!}
                            {!! Form::text('phone1', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Phone2 Form Input -->
                        <div class="form-group">
                            {!! Form::label('phone2', 'Téléphone programme:') !!}
                            {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Email Form Input -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Screens Form Input -->
                        <div class="form-group">
                            {!! Form::label('screens', 'Nombre de Salles:') !!}
                            {!! Form::text('screens', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                    <div class="col-md-5">

                        <!-- Lat Form Input -->
                        <div class="form-group">
                            {!! Form::label('lat', 'Latitude:') !!}
                            {!! Form::text('lat', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Lng Form Input -->
                        <div class="form-group">
                            {!! Form::label('lng', 'Longitude:') !!}
                            {!! Form::text('lng', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- photo upload -->
                        <div class="form-group">
                            {!! Form::label('photo', 'Photo:') !!}
                            {!! Form::file('photo', ['id' => 'photo', 'class' => 'file']) !!}
                        </div>

                    </div>

                    <div class="col-md-12">
                        {!! Form::submit('Mettre à jour', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('admin.cinemas') }}" class="btn btn-warning">Annuler</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div> <!-- row -->
    </div>



@stop

@section('scripts')
    {!! Html::script('js/fileinput.js') !!}
    {!! Html::script('js/fileinput-fr.js') !!}
    <script>
        // fileinput
        $("#photo").fileinput({
            language: "fr",
            showUpload: false
        });
    </script>
@stop