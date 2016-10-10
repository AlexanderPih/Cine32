@extends('admin')

@section('title', 'Modifier un membre')

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
                <h1 class="page-header">Modifier un membre</h1>

                <div class="wrap admin-wrap" style="min-height: 800px;">

                    {!! Form::model($member, ['route' => ['team.update', $member->id], 'method' => 'PUT']) !!}

                    <div class="col-lg-7">

                        <!-- Name Form Input -->
                        <div class="form-group">
                            {!! Form::label('name', 'Nom:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Title Form Input -->
                        <div class="form-group">
                            {!! Form::label('title', 'Titre:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Phone Form Input -->
                        <div class="form-group">
                            {!! Form::label('phone', 'Téléphone:') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Email Form Input -->
                        <div class="form-group">
                            {!! Form::label('email', 'E-mail:') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-lg-5">

                        <label>Photo actuelle:</label>
                        <br>
                        <img class="profile" src="{{ url('img/team/'.$member->photo) }}" alt="">

                        <p>
                            <!-- Photo Form Input -->
                            <div class="form-group">
                                {!! Form::label('photo', 'Changer la photo:') !!}
                                {!! Form::file('photo', ['id' => 'photo', 'class' => 'file' ]) !!}
                            </div>
                        </p>

                    </div>

                    <div class="col-md-12">
                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
                        <a href="{{ route('admin.team') }}" class="btn btn-warning">Annuler</a>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
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