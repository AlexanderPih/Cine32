@extends('admin')

@section('title', 'Nouveau Film')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- included sidebar -->

            <!-- main content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Classifications</h1>

                <div class="wrap admin-wrap">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classifications as $classification)
                            <tr>
                                <td class="col-mg-10">{{ $classification->name }}</td>
                                <td class="col-mg-2"><a href="{{ route('classification.edit', $classification->id) }}"><span class="glyphicon glyphicon-edit"> Modifier</span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div> <!-- row -->

    </div>


@stop
