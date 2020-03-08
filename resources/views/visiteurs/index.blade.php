@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20 float-left">Liste des delegues medicaux</h4>
        @if(Auth()->user()->role != 'pharmacien')
        <div class="pull-right text-right">
            <a href="{{ url('visiteurs/create') }}" class="btn btn-primary">
                <i  class="ion-plus-circled">Ajouter</i>
            </a>
        </div>
        @endif
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom </th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Prenom</th>
                    <th>Nom </th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($visiteur as $ren)
                <tr>
                    <td>{{ $ren->prenom }}</td>
                    <td>{{ $ren->nom }}</td>
                    <td>{{ $ren->adresse }}</td>
                    <td>{{ $ren->telephone }}</td>
                    <td>
                        <a href="{{ url('/visiteurs/' . $ren->id) }}" class="btn btn-action btn-secondary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

