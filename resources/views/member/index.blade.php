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
            <h1 class="page-header">Tous les adhérants:</h1>

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
                            <th>Status:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                            <tr onclick="document.location = '{{ route('member.show', $member->id) }}'">
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
                                        @if($member->treatement != 0)
                                            <span class="label label-success">true</span>
                                        @else
                                            <span class="label label-danger">false</span>
                                        @endif
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
