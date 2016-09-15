@extends('admin')

@section('title', 'Nouvelle Animation')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('css/fileinput.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery-ui.min.css') }}">

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
                <h1 class="page-header">Créer une nouvelle Animation:</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main2">
                <div class="col-md-12" >
                    {!! Form::open(['route' => 'animation.store', 'files' => true]) !!}
                        <div class="wrap" style="min-height: 750px">
                            <div class="col-lg-8">
                                <!-- Title Form Input -->
                                <div class="form-group">
                                    {!! Form::label('title', 'Titre:') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Body Form Input -->
                                <div class="form-group">
                                    {!! Form::label('body', 'Texte:') !!}
                                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Date Form Input -->
                                <div class="form-group">
                                    {!! Form::label('date', 'Date:') !!}
                                    {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'datepicker']) !!}
                                </div>

                                <!-- Reservation Form Input -->
                                <div class="form-group">
                                    {!! Form::label('reservation', 'Avec réservation:') !!}<br>
                                    {!! Form::radio('reservation', 'oui', true, ['class' => 'form-group']) !!}
                                    oui
                                    {!! Form::radio('reservation', 'non', false, ['class' => 'form-group']) !!}
                                    non
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <!-- photo upload -->
                                <div class="form-group">
                                    {!! Form::label('photo', 'Affiche:') !!}
                                    {!! Form::file('photo', ['id' => 'poster', 'class' => 'file']) !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                {!! Form::submit('Enregister', ['class' => 'btn btn-success']) !!}
                            </div>
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
    {!! Html::script('js/jquery-ui.min.js') !!}
    {!! Html::script('js/datepicker-fr.js') !!}
    <script>
        // datepicker
        $( function() {
            $.datepicker.setDefaults($.datepicker.regional["fr"]);
            $( "#datepicker" ).datepicker();
        } );

        // fileinput
        $("#poster").fileinput({
            language: "fr",
            showUpload: false
        });
    </script>
@stop