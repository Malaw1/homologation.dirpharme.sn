@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20 float-left">Courriers Confidentiels</h4>
        <a href="courrier/create" class="btn btn-primary float-right">Envoyer courrier</a>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Emmetteur</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date d'arrivée</th>
                    <th>Fichier</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Numero</th>
                    <th>Emmetteur</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date d'arrivée</th>
                    <th>Fichier</th>
                </tr>
            </tfoot>
            <tbody>
            @foreach($courrier as $demande)
                <tr>
                    <td>{{ $demande->numero }}</td>
                    <td>{{ $demande->emmetteur }}</td>
                    <td>{{ $demande->email }}</td>
                    <td>{{ $demande->phone }}</td>
                    <td>{{ $demande->created_at }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ url('courrier/'.$demande->id.'?file='.$demande->fichier) }}" target="_blank" >Consulter</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

