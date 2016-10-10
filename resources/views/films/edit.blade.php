@extends('admin')

@section('title', 'Modifier Film')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/fileinput.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Modifier Film:</h1>

                    {!! Form::model($film, ['route' => ['films.update', $film->id], 'method' => 'PUT', 'files' => true]) !!}

                    <div class="wrap" style="min-height: 850px;" >
                        <div class="col-md-8" >


                            <!-- Title Form Input -->
                            <div class="form-group">
                                {!! Form::label('title', 'Titre:') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Synopsis Form Input -->
                            <div class="form-group">
                                {!! Form::label('synopsis', 'Synopsis:') !!}
                                {!! Form::textarea('synopsis', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Classification select input -->
                            <div class="form-group">
                                {!! Form::label('classification_id', 'Classification:') !!}
                                {!! Form::select('classification_id[]', $classifications, null, ['id' => 'classification_id', 'class' => 'form-control']) !!}
                            </div>

                            <!-- Genre Form Input -->
                            <div class="form-group">
                                {!! Form::label('genre_id', 'Genre:') !!}
                                {!! Form::select('genre_id[]', $genres, null, ['id' => 'genre_id', 'class' => 'form-control select2-genre', 'multiple']) !!}
                            </div>

                            <!-- Actors Form Input -->
                            <div class="form-group">
                                {!! Form::label('actor_id', 'Acteurs:') !!}
                                {!! Form::select('actor_id[]', $actors, null, ['id' => 'actor_id', 'class' => 'form-control select2-actors', 'multiple']) !!}
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="admin-wrap top-space">

                                <!-- Director Form Input -->
                                <div class="form-group">
                                    {!! Form::label('director_id', 'Réalisateur:') !!}
                                    {!! Form::select('director_id[]', $directors, null, ['id' => 'director_id', 'class' => 'form-control select2-directors', 'multiple']) !!}
                                </div>

                                <!-- Nationality Form Input -->
                                <div class="form-group">
                                    {!! Form::label('nationality', 'Nationalité:') !!}
                                    {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Runtime Form Input -->
                                <div class="form-group">
                                    {!! Form::label('runtime', 'Durée:') !!}
                                    {!! Form::text('runtime', null, ['class' => 'form-control', 'placeholder' => 'En minutes']) !!}
                                </div>

                                <!-- Year Form Input -->
                                <div class="form-group">
                                    {!! Form::label('year', 'Année:') !!}
                                    {!! Form::text('year', null, ['class' => 'form-control', 'placeholder' => 'Année de sortie']) !!}
                                </div>

                                <!-- Trailer Form Input -->
                                <div class="form-group">
                                    {!! Form::label('trailer', 'Bande annonce:') !!}
                                    {!! Form::text('trailer', null, ['class' => 'form-control', 'placeholder' => 'Code Youtube']) !!}
                                </div>

                                <!-- poster upload -->
                                <div class="form-group">
                                    {!! Form::label('poster', 'Affiche:') !!}
                                    {!! Form::file('poster', ['id' => 'poster', 'class' => 'file']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('adminfilms.index') }}" class="btn btn-warning">Annuler</a>
                        </div>
                    </div>

                    {!! Form::close() !!}

            </div>
        </div> <!-- row -->
    </div>



@stop

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/fileinput.js') !!}
    {!! Html::script('js/fileinput-fr.js') !!}
    <script>

        // select2 for genres
        $('.select2-genre').select2({
            placeholder: 'Choisir le/les genre(s)'
        });
        $('.select2-genre').select2().val( {!! json_encode($film->genres()->getRelatedIds()) !!} ).trigger('change');

        // select2 for actors
        $('.select2-actors').select2({
            placeholder: 'Choisir les acteurs'
        });
        $('.select2-actors').select2().val( {!! json_encode($film->actors()->getRelatedIds()) !!} ).trigger('change');

        // select2 for directors
        $('.select2-directors').select2({
            placeholder: 'Choisir le(s) réalisateur(s)'
        });
        $('.select2-directors').select2().val( {!! json_encode($film->directors()->getRelatedIds()) !!} ).trigger('change');

        // fileinput
        $("#poster").fileinput({
            language: "fr",
            showUpload: false
        });
    </script>
@stop