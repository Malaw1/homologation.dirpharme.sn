@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="card">
        <div class="card-header"><h3>Envoi d'un courrier</h3></div>
        <div class="card-body">

            <form action="{{ route('courrier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputAddress">Destinataire</label>
                    <input type="text" class="form-control" id="inputAddress" name="label" required placeholder="">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Objet</label>
                    <input type="text" class="form-control" id="inputAddress" name="label" required placeholder="">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputEmail4">Message</label>
                        <textarea name="message" class="form-control container" ></textarea>                    
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Piece jointe</label>
                    <input type="file" class="form-control" id="inputAddress" name="label" required placeholder="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
