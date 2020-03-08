@extends('layouts.app')

@section('content')
<div class="container">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

    <div class="card">
        <h5 class="card-header">Ajout d'un delegue medical</h5>
        <div class="card-body">
            <form action="{{ route('visiteurs.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Identification</legend>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Prenom</label>
                            <input type="text" required class="form-control" name="prenom" placeholder="Prenom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nom</label>
                            <input type="text" required class="form-control" name="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Adresse</label>
                        <input type="text" required class="form-control" name="adresse" id="inputAddress" placeholder="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Telephone</label>
                            <input type="text" required class="form-control" name="telephone" id="inputCity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputZip">Email</label>
                            <input type="text" required class="form-control" name="email" id="inputZip">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Date de Naissance</label>
                            <input type="date" required class="form-control" name="date_naiss" id="inputCity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputZip">Lieu de Naissance</label>
                            <input type="text" required class="form-control" name="lieu_naiss" id="inputZip">
                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Education</legend>
                    <div class="form-row react">
                        <div class="col">
                            <label for="">Etablissement</label>
                            <input type="text" class="form-control" required placeholder="Universite, Ecole, etc." name="etablissement[]">
                        </div>
                        <div class="col">
                            <label for="">Intutile du diplome</label>
                            <input type="text" class="form-control" required placeholder="Licence, Master Doctorat, Certification, etc." name="diplome[]">
                        </div>
                        <div class="col">
                            <label for="">Annee d'obtention du diplome</label>
                            <input type="date" class="form-control" name="annee" id="inputCity">
                        </div>
                        <br />

                        <button type="button" class="fcbtn btn btn-success" id='add'>
                            <i class="">+</i>
                        </button>
                        <button type="button" class="fcbtn btn btn-danger" id='remove'>
                                <i class="">x</i>
                        </button>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Photo</legend>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Photo ID</label>
                            <input type="file" required class="form-control" name="photo" id="inputCity">
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<script>
    function addressFunction()
    {
        if (document.getElementById('same').checked)
        {
            document.getElementById('manufacturer').disabled = !this.checked;
            document.getElementById('adresse').disabled = !this.checked;
            document.getElementById('email').disabled = !this.checked;
            document.getElementById('phone').disabled = !this.checked;

        }

        else
        {
            document.getElementById('manufacturer').disabled = this.checked;
            document.getElementById('adresse').disabled = this.checked;
            document.getElementById('email').disabled = this.checked;
            document.getElementById('phone').disabled = this.checked;
        }
    }
</script>


@endsection
