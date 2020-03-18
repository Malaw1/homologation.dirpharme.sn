@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="card">
        <div class="card-header"><h3>Creer une nouvelle Commission</h3></div>
        <div class="card-body">

            <form action="{{ route('commission.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputAddress">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="medicament">Commission du medicament</option>
                        <option value="visa">Commission Visa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Label</label>
                    <input type="text" class="form-control" id="inputAddress" name="label" required placeholder="">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Date d'ouverture</label>
                        <input type="date" class="form-control" id="inputEmail4" name="date_debut" required placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Date de cloture</label>
                        <input type="date" class="form-control"  name="date_fin" required placeholder="Numero Telephone">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
