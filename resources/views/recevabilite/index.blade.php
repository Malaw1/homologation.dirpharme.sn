@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20 float-left">Recevabilites</h4>
        @if(Auth()->user()->poste == 'Responsable DCAM')
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>Expert</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Type</th>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>expert</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($receve as $receve)
                <tr>
                    <td>{{ $receve->type }}</td>
                    <td>{{ $receve->numero }}</td>
                    <td>{{ $receve->nom_medicament }} {{ $receve->presentation }}</td>
                    <td>{{ $receve->name }}</td>
                    <td>
                        <!-- <a href="{{ url('recevabilite/create?id='.$receve->id) }}" class="btn btn-action btn-secondary">Uploader rapport</a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Type</th>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($receve as $receve)
                <tr>
                    <td>{{ $receve->type }}</td>
                    <td>{{ $receve->numero }}</td>
                    <td>{{ $receve->nom_medicament }} {{ $receve->presentation }}</td>
                    <td>{{ $receve->commentaire }}</td>
                    <td>
                        <a href="{{ url('recevabilite/create?id='.$receve->id) }}" class="btn btn-action btn-secondary">Uploader rapport</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

@endsection

