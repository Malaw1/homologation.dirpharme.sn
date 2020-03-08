@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="card">
    <div class="card-header">Arretes</div>
    <div class="card-body">
        <form action="{{ route('arrete.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="">Laboratoire Titulaire</label>
                        <input type="text" class="form-control" placeholder="" name="laboratoire" required>
                    </div>
                    <div class="col">
                        <label for="">Numero AMM</label>
                        <input type="text" class="form-control" required name="numero_amm">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="">Type du Produit</label>
                        <select name="type"  class="form-control" id="">
                            <option value="Complement Nutritionel">Complement Nutritionel</option>
                            <option value="Medicament">Medicament</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Nom du Produit</label>
                        <input type="text" class="form-control" required name="produit">
                    </div>
                    <div class="col">
                        <label for="">Date de l'arrete</label>
                        <input type="date" class="form-control" required name="date">
                    </div>
                </div>

                <div class="form-row">
                    <label for="">Fichier</label>
                    <input type="file" name="file" id="file" required class="form-control">
                </div>
                <br>
                <div class="form-row">
                    <button class="button" type="submit">Enregistrer</button>
                </div>
        </form>
    </div>
</div>

@endsection
