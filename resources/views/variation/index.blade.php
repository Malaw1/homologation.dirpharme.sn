@extends('layouts.app')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20 float-left">Demandes de Variations d'AMM</h4>
        @if(Auth()->user()->role != 'pharmacien')
        <div class="pull-right text-right">
            <a href="{{ url('variation/create') }}" class="btn btn-primary">
                <i  class="ion-plus-circled">Nouvelles Variations</i>
            </a>
        </div>
        @endif
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Numero AMM</th>
                    <th>Nom Commercial</th>
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
                    <th>Status</th>
                    @if(Auth()->user()->role == 'pharmacien')
                    <th>Action</th>
                    @endif
                </tr>
            </tfoot>
            <tbody>
                @foreach($var as $ren)
                <tr>
                    <td>{{ $ren->amm }}</td>
                    <td>{{ $ren->produit }}</td>
                    <td>{{ $ren->status }}</td>
                    @if(Auth()->user()->role == 'pharmacien')
                    <td>Action</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

