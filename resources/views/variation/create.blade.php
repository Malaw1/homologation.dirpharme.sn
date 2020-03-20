@extends('layouts.app')

@section('content')
<div class="mT-30">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="card" id="labo">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Variation d'une AMM
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <form action="{{ route('variation.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Nom Commerciale</label>
                            <input type="text" class="form-control" name="produit" required>
                        </div>
                    </div>
                    <div class="form-row">
                        @if(Auth()->user()->role == 'agence')
                        <div class="form-group col">
                            <label>Laboratoire Titulaire de l'AMM</label>
                            <select name="labo_titulaire" class="form-control" id="lab">
                                @foreach($labo as $lab)
                                    <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                            <input type="hidden" class="form-control" name="labo_titulaire" value="{{ Auth()->user()->id }}">
                        @endif

                        <div class="form-group col">
                            <label>Numero AMM</label>
                            <input type="text" class="form-control"  name="amm" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fond de dossier</label>
                        <input type="file" class="form-control" name="dossier" required >
                    </div>

                    <div class="form-group">
                        <label>Quittance de paiement</label>
                        <input type="file" class="form-control" name="paiement" required >
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
