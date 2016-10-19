@extends('admin')

@section('title', 'Modifier Présentation')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('css/fileinput.css') }}">
    <script src="{{ url('js/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            language: 'fr_FR',
            height: 350,
            plugins: [
                'advlist autolink lists link image charmap hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media | forecolor backcolor emoticons',
            toolbar: "forecolor backcolor",
            menubar: false
        });
    </script>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Modifier la présentation</h1>

                <div class="col-md-8">
                    @include('partials._messages')
                    <div class="wrap admin-wrap">

                        {!! Form::model($association, ['route' => ['association.update', $association->id], 'method' => 'PUT']) !!}

                        <!-- Description Form Input -->
                        <div class="form-group">
                            {!! Form::label('description', 'Déscription:') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Form input -->
                        <div class="form-group">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.index') }}"><span class="btn btn-warning">Annuler</span></a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="col-md-4">
                    @include('partials._messages')
                    <div class="wrap admin-wrap">
                        <h4>Ajouter un rapport d'activité:</h4>

                        {!! Form::open(['route' => 'report.store', 'method' => 'POST', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('pdf', 'Rapport (pdf):') !!}
                            {!! Form::file('pdf', ['id' => 'file']) !!}
                        </div>

                        <!-- Year Form Input -->
                        <div class="form-group">
                            {!! Form::label('year', 'Année:') !!}
                            {!! Form::text('year', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div> <!-- row -->
    </div>

@stop

@section('scripts')
    {!! Html::script('js/fileinput.js') !!}
    {!! Html::script('js/fileinput-fr.js') !!}

    <script type="text/javascript">
        $("#file").fileinput({
            language: "fr",
            showUpload: false,
            allowedFileExtensions: ["pdf"],
        });
    </script>
@stop