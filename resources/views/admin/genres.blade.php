@extends('admin')

@section('title', 'Genres')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Tous les Genres</h1>

                <div class="wrap admin-wrap">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nom:</th>
                            <th>Action:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($genres as $genre)
                            <tr>
                                <td class="col-md-9">{{ $genre->name }}</td>
                                <td class="col-md-3">
                                    <a href="#"><span class="glyphicon glyphicon-info-sign"></span> Informations</a>
                                    <a href="{{ route('genres.edit', $genre->id) }}"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
                                    <a href="#"><span class="glyphicon glyphicon-trash"></span> Supprimer</a>
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