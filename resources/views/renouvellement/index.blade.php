@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20 float-left">Demandes de Renouvellement d'AMM</h4>
        @if(Auth()->user()->role != 'pharmacien')
        <div class="pull-right text-right">
            <a href="{{ url('renouvellement/create') }}" class="btn btn-primary">
                <i  class="ion-plus-circled">Renouveler une AMM</i>
            </a>
        </div>
        @endif
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Numero AMM</th>
                    <th>Nom Commercial</th>
                    <th>Laboratoire Titulaire</th>
                    <th>Status</th>
                    @if(Auth()->user()->role == 'pharmacien')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Numero AMM</th>
                    <th>Nom Commercial</th>
                    <th>Laboratoire Titulaire</th>
                    <th>Status</th>
                    @if(Auth()->user()->role == 'pharmacien')
                    <th>Action</th>
                    @endif
                </tr>
            </tfoot>
            <tbody>
                @foreach($ren as $ren)
                <tr>
                    <td>{{ $ren->numero_amm }}</td>
                    <td>{{ $ren->produit }}</td>
                    <td>{{ $ren->name }}</td>
                    <td>{{ $ren->status }}</td>
                    @if(Auth()->user()->role == 'pharmacien')
                    <td>
                        <th><a class="btn btn-secondary" href="{{ url('renouvellement/'.$demande->id.'?file='.$demande->fichier) }}" target="_blank" >Consulter</a> </th>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

