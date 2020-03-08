@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">Arretes des AMM</h4>
        <h4 class="text-right"><a href="{{ route('arrete.create') }}" class="button">Ajouter</a></h4>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulaire de l'AMM</th>
                    <th>Produits</th>
                    <th>Numero AMM</th>
                    <th>Date de l'arrete</th>
                    <th>Code Serie</th>
                    <th>Actions</th>
                    <th>Codes</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Titulaire de l'AMM</th>
                    <th>Produits</th>
                    <th>Numero AMM</th>
                    <th>Date de l'arrete</th>
                    <th>Code Serie</th>
                    <th>Actions</th>
                    <th>Codes</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($arretes as $arretes)
                    <tr>
                        <td></td>
                        <td>{{ $arretes->laboratoire }}</td>
                        <td>{{ $arretes->produit }}</td>
                        <td>{{ $arretes->numero_amm }}</td>
                        <td>{{ $arretes->date }}</td>
                        <td>{{ $arretes->serie }}</td>

                        <td>
                            <a href="{{ url('arrete/'.$arretes->id.'?097DJ5JDEwJEIva1Q4dzMzVjY4R0QyQ2FhLkthOU9FZE4zZ2RPb2NQd3MzQzFoUEhVZDJ4eUdUZXI4TG1x='.$arretes->filename) }}"
                            title="View Client" target="_blank">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Voire
                                </button>
                            </a>
                        </td>
                        <td>
                            <img src="{{ asset('qrcodes/'.$arretes->filename.'.png') }}" alt="" title="">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection

