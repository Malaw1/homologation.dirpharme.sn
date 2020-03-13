@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20 float-left">Listes des dossiers de la prochaine commission</h4>
        <a href="commission/create" class="btn btn-primary float-right">Nouvelle Commission</a>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
            @foreach($dossier as $demande)
                <tr>
                    <td>{{ $demande->numero }}</td>
                    <td>{{ $demande->nom_medicament }}</td>
                    <td>
                        <a href="{{ url('/enregistrement/' . $demande->enreg_id) }}" class="btn btn-action btn-secondary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

