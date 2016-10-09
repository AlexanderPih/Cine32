@extends('main')

@section('title', ''.htmlentities($cinema->name))

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/cinema.css') }}">
@stop

@section('content')

<div class="wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-sm-7 col-lg-9">
                <h1>Cinema: {{ $cinema->name }}</h1>

                <div class="info">
                    <p><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Nombre de salles: {{ $cinema->screens }}</p>
                    <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ $cinema->address }}</p>
                    @if(isset($cinema->phone1))
                        <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ $cinema->phone1 }}</p>
                    @endif
                    @if(isset($cinema->phone2))
                        <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ $cinema->phone2 }} Programme</p>
                    @endif
                    <p><span class="glyphicon glyphicon-send" aria-hidden="true"></span> <a href="mailto:{{ $cinema->email }}">Envoyer un mail</a></p>
                </div>
            </div>
            <div class="col-sm-5 col-lg-3 hidden-xs">
                <img class="img-responsive" src="{{ url('img/cinemas/'.$cinema->photo) }}" alt="">
            </div>
        </div>
    </div>
</div>

    @include('partials._tarifs')

<div class="wrap">
    <div class="row">
        <div class="col-lg-12">
            <div id="map">
                <script>
                    function initMap() {
                        var LatLng = {
                            lat: <?php echo $cinema->lat ?>,
                            lng: <?php echo $cinema->lng ?>
                        }

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: LatLng,
                            zoom: 15
                        });

                        var marker = new google.maps.Marker({
                            position: LatLng,
                            map: map,
                            title: "<?php echo $cinema->title ?>"
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLERPTCZmi_IrzGMEUR7_PYvDyVMmvyUw&callback=initMap" async defer></script>
    <script>
        $(document).ready(function() {
            $('#jlc').html('<span id="riverroad">Carte JLC');
            $('#jlc #riverroad').tooltip({
                content: '<img src="http://cinetest.dev/img/jlc.jpg">'
            });
        });
    </script>
@stop