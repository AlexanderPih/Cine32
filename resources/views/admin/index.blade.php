@extends('admin')

@section('title', 'Admin Index')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

<div class="container-fluid">
    <div class="row">

            <!-- included sidebar -->

        <!-- main content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>


        </div>
    </div>
</div>


@stop