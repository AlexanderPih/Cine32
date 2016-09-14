@extends('admin')

@section('title', 'Membres')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@stop

@section('content')

    <div class="row">
        <!-- included sidebar -->

        <!-- main content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Les nouveaux adhérants:</h1>

            @include('partials._messages')

            <div class="wrap admin-wrap">
                <p>Voici les nouveaux adhérants. Une fois une demande d'ahérer traité, cliquez sur le bouton "Traiter" pour que la demande soit enregistrée et ne s'affiche plus ici. Elle est toujours visible dans le menu A Propos -> Adhérants.</p>
            </div>

            <div class="wrap admin-wrap">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nom:</th>
                        <th>Prénom:</th>
                        <th>Adresse:</th>
                        <th>Code postale:</th>
                        <th>Ville:</th>
                        <th>Téléphone:</th>
                        <th>E-mail:</th>
                        <th>Profession:</th>
                        <th>Date de naissance:</th>
                        <th>Action:</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->firstname }}</td>
                            <td>{{ $member->address }}</td>
                            <td>{{ $member->postal }}</td>
                            <td>{{ $member->city }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->profession }}</td>
                            <td>
                                @if($member->birthday != 0)
                                    {{ \Carbon\Carbon::parse($member->birthday)->format('d/m/Y') }}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['route' => ['member.update', $member->id], 'method' => 'PUT']) !!}

                                {!! Form::submit('Traiter', ['class' => 'btn btn-primary']) !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div> <!-- row -->




@stop
