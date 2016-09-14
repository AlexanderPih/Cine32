@extends('main')

@section('title', 'Association')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/apropos.css') }}">
    <script src="https://www.google.com/recaptcha/api.js?hl=fr"></script>
@stop

@section('content')
    <div class="wrap">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-lg-12">
                <div class="space-left space-right">
                    <h1>Adhérer à Ciné32</h1>

                    <strong>Avez-vous pensé à adhérer à Ciné 32 ? </strong>

                    <p>
                        Ciné 32, c’est à la fois les salles d’Auch et du Gers, des films, des animations, des interventions en milieu scolaire, un accueil de tournages, un festival. Mais c’est aussi une association : si notre action n’était pas guidée par certaines valeurs, si elle n’impliquait pas des engagements bénévoles, si le cinéma n’était pas vécu aussi comme un rapport à la vie et aux autres, Ciné 32 n’existerait pas comme vous le connaissez, et, souvent, l’appréciez.
                    </p>
                    <p>
                        C’est pourquoi, salariés et bénévoles, nous avons besoin de votre soutien et de votre aide, que vous soyez ou non spectateur assidu. Si vous pensez que la défense de ce rapport au cinéma, à tous les cinémas, est aussi votre affaire, le premier moyen de nous encourager, c’est d’adhérer à l’association Ciné 32.
                    </p>
                    <p>
                        Cela vous coûte <strong>20 € (35 € pour un couple) par année civile et vous permet d’avoir des places à un tarif préférentiel ainsi que de participer à deux soirées gratuites dans l’année</strong> : la première a lieu dans le cadre du festival Zoom arrière de la Cinémathèque de Toulouse, et en juin lors de l’Assemblée Générale autour d’une avant première. Ainsi, vous nous apporterez votre appui et vos propositions.
                    </p>
                    <hr>
            </div>

                <div class="col-lg-8 col-lg-offset-2">

                    @include('partials._messages')

                    {!! Form::open(['route' => 'member.store', 'id' => 'form']) !!}

                    <!-- Name Form Input -->
                    <div class="form-group">
                        {!! Form::label('name', 'Nom:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Firstname Form Input -->
                    <div class="form-group">
                        {!! Form::label('firstname', 'Prénom:') !!}
                        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Address Form Input -->
                    <div class="form-group">
                        {!! Form::label('address', 'Adresse:') !!}
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- City Form Input -->
                    <div class="form-group">
                        {!! Form::label('city', 'Ville:') !!}
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Postal Form Input -->
                    <div class="form-group">
                        {!! Form::label('postal', 'Code postale:') !!}
                        {!! Form::text('postal', null, ['class' => 'form-control']) !!}
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

                    <!-- Profession Form Input -->
                    <div class="form-group">
                        {!! Form::label('profession', 'Profession:') !!}
                        {!! Form::text('profession', null, ['class' => 'form-control']) !!}
                    </div>



                    <!-- Birthday Form Input -->
                    <div class="form-group">
                        <label for="birthday">De plus si vous souhaitez adhérer à la <a href="http://www.ligue32.org" target="_blank">Ligue de l’Enseignement 32</a> (gratuitement), merci de préciser votre date de naissance:</label>
                        {!! Form::text('birthday', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Len9ikTAAAAAM1zWKMs7Qy8QxtUIPh2IGteUvLS"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Adhérer', ['class' => 'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')

    <script>
        $(function() {
            $('#form').submit(function(event) {
                var verified = grecaptcha.getResponse();
                if(verified.length === 0) {
                    event.preventDefault();
                }
            });
        });
    </script>

@stop