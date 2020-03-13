@extends('layouts.app')

@section('content')
<div class="mT-30">
<div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Liste des Agences de Promotion</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Agence</th>
                            <th>N° Agrement</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Agence</th>
                            <th>N° Agrement</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                          </tr>
                        </tfoot>
                        <tbody>
                    @foreach($agence as $agence)
                        <tr>
                            <td>{{ $agence->name }}</td>
                            <td>N/A</td>
                            <td>{{ $agence->adresse }}</td>
                            <td>{{ $agence->telephone }}</td>
                            <td>{{ $agence->email }}</td>
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
