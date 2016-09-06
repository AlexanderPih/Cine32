@extends('admin')

@section('title', 'Nouveau Film')

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
                <h1 class="page-header">Créer un nouveau Film</h1>

                <div class="col-sm-4 col-md-4">
                    <div class="wrap">
                        <div class="admin-wrap">
                            <h4>Nouveau Réalisateur:</h4>

                            {!! Form::open(['route' => 'director.create', 'method' => 'POST']) !!}

                            <!-- Director Form Input -->
                            <div class="form-group">
                                {!! Form::label('directorname', 'Nom:') !!}
                                {!! Form::text('directorname', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('directorname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('directorname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="wrap">
                        <div class="admin-wrap">
                            <h4>Nouveau Acteur:</h4>

                            {!! Form::open(['route' => 'actor.store', 'method' => 'POST']) !!}

                            <!-- Acteur Form Input -->
                            <div class="form-group">
                                {!! Form::label('actorname', 'Nom:') !!}
                                {!! Form::text('actorname', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('actorname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('actorname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="wrap">
                        <div class="admin-wrap">
                            <h4>Liens Youtube</h4>
                            {!! Form::label('liens', 'Donne le lien youtube d\'un studio:') !!}
                            {!! Form::select('youtube',
                                [
                                    'https://www.youtube.com/user/20thcenturyfoxfrance' => '20th Century Fox',
                                    'https://www.youtube.com/user/WaltDisneyStudiosFR'  => 'Disney',
                                    'https://www.youtube.com/user/marvelfr'             => 'Marvel',
                                    'https://www.youtube.com/user/ParamountFrance'      => 'Paramount Pictures',
                                    'https://www.youtube.com/user/universalpicturesfr'  => 'Universal',
                                    'https://www.youtube.com/user/WarnerBrosFrance'     => 'Warner Bros'
                                ],
                                null,
                                ['class' => 'form-control', 'id' => 'youtube', 'onchange' => 'getval(this)'])
                            !!}
                            <div id="youtubelink">
                                <!-- displays the selected studio link -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main2">
                <div class="col-md-12" >
                    {!! Form::open(['route' => 'films.store', 'files' => true]) !!}
                    <div class="wrap" style="min-height: 850px;" >
                        <div class="col-md-8" >
                            <h4>Nouveau Film:</h4>


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

                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div> <!-- row -->
    </div>


@stop

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/fileinput.js') !!}
    {!! Html::script('js/fileinput-fr.js') !!}
    <script>
        // youtube links
        // shows the first select result
        var selected = document.getElementById('youtube');
        var value = selected.options[selected.selectedIndex].value;
        var text = $("#youtube option:selected").text();
        document.getElementById('youtubelink').innerHTML = '<a href="' + value + '" target="_blank">' + text;

        // when select is changed, show the new link
        function getval(sel) {
            var value = sel.value;
            var text = $("#youtube option:selected").text();
            document.getElementById('youtubelink').innerHTML = '<a href="' + value + '" target="_blank">' + text;
        }

        // select2 for genres
        $('.select2-genre').select2({
            placeholder: 'Choisir le/les genre(s)'
        });

        // select2 for actors
        $('.select2-actors').select2({
            placeholder: 'Choisir les acteurs'
        });

        // select2 for directors
        $('.select2-directors').select2({
            placeholder: 'Choisir le(s) réalisateur(s)'
        });

        // fileinput
        $("#poster").fileinput({
            language: "fr",
            showUpload: false
        });
    </script>
@stop