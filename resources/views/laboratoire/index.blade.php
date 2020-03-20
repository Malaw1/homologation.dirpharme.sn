@extends('layouts.app')

@section('content')
<div class="mT-30">
<div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Liste total des Laboratoires</h4>
                    <div class="pull-right text-right">
                        <a href="{{ url('laboratoire/create') }}" class="btn btn-primary">
                            <i  class="ion-plus-circled">Ajouter un labo</i>
                        </a>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Laboratoire</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Agence Represntante</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Laboratoire</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Agence Representante</th>
                          </tr>
                        </tfoot>
                        <tbody>
                      @foreach($labo as $labo)
                        <tr>
                            <td>{{ $labo->name }}</td>
                            <td>{{ $labo->adresse }}</td>
                            <td>{{ $labo->telephone }}</td>
                            <td>{{ $labo->email }}</td>
                            <td>{{ $labo->agence }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
</div>
@endsection
