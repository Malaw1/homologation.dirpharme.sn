@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20 float-left">Recevabilites</h4>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>Presentation</th>
                    <th>Forme Pharmaceutique</th>
                    <th>Commentaire</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Nom Commercial</th>
                    <th>Presentation</th>
                    <th>Forme Pharmaceutique</th>
                    <th>Commentaire</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($rapport as $rapport)
                <tr>
                    <td>{{ $rapport->type }}</td>
                    <td>{{ $rapport->numero }}</td>
                    <td>{{ $rapport->nom_medicament }}</td>
                    <td>{{ $rapport->presentation }}</td>
                    <td>{{ $rapport->forme_pharmaceutique }}</td>
                    <td>{{ $rapport->commentaire }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ url('rc_rapport/'.$rapport->id.'?file='.$rapport->filename) }}" target="_blank" > {{ $rapport->filename }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

