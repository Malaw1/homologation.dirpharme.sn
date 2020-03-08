@extends('layouts.app')

@section('content')
<div class="container">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

    <div class="card">
        <h5 class="card-header">Nouvelle Demande d'Enregistrement</h5>
        <div class="card-body">
            <form action="{{ route('enregistrement.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Type du Produit</label>
                    <select name="type" class="form-control" id="lab">
                        <option value="Medicament">Medicament</option>
                        <option value="Complement Nutritionel">Complement Nutritionel</option>
                    </select>
                </div>

                @if(Auth()->check() && Auth()->user()->role == 'agence')
                <div class="form-group">
                    <label for="exampleInputPassword1">Laboratoire demandeur:</label>
                    <select name="laboratoire" class="form-control" id="lab">
                        @foreach($labo as $lab)
                            <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                        <div class="form-row">
                            <div class="col">
                                <label for="">Nom Commercial</label>
                                <input type="text" class="form-control" required id="inputlg" placeholder="Nom Commercial" name="nom_medicament">
                            </div>
                            <div class="col">
                                <label for="">Classe Therapeutique</label>
                                <select name="classe_therapeutique" class="form-control" id="inputlg">
                                    @foreach($classe as $classe)
                                        <option value="{{$classe->nom}}"> {{ $classe->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="col">
                                <label for="">Presentation</label>
                                <input type="text" required class="form-control" id="inputlg" placeholder="Presentation" name="presentation">
                            </div>
                            <div class="col">
                                <label for="">Forme Pharmaceutique</label>
                                <select name="forme_pharmaceutique" class="form-control" id="inputlg">
                                    @foreach($forme as $forme)
                                        <option value="{{$forme->nom}}"> {{ $forme->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="form-divider">
                            DCI
                        </div>

                        <div class="form-row react">
                            <div class="col">
                                <label for="">Substance Active</label>
                                <input type="text" class="form-control" required placeholder="Substance Active" name="substance[]">
                            </div>
                            <div class="col">
                                <label for="">Dosage</label>
                                <input type="text" class="form-control" required placeholder="Dosage" name="dosage[]">
                            </div>
                            <div class="col">
                                <label for="">Unité</label>
                                <select class="form-control" id="" name="unite[]">
                                    <option value="mg">mg</option>
                                    <option value="g">g</option>
                                    <option value="l">l</option>
                                    <option value="ml">ml</option>
                                    <option value="μg">μg</option>
                                    <option value="%">%</option>
                                </select>
                            </div>
                            <br />

                            <button type="button" class="fcbtn btn btn-success" id='add'>
                                <i class="">+</i>
                            </button>
                            <button type="button" class="fcbtn btn btn-danger" id='remove'>
                                    <i class="">x</i>
                            </button>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="">Excipients</label>
                                <input type="text" class="form-control" data-role="tagsinput" name="excipient" required>
                                <!-- <input type="text" class="form-control" placeholder="" name="excipient"> -->
                            </div>
                            <div class="col">
                                <label for="">Excipients à effet notoire (optionel)</label>
                                <input type="text" class="form-control" data-role="tagsinput" name="excipient_notoire">
                            </div>
                        </div>

                        <br />
                        <div class="form-row">
                            <div class="col">
                                <label for="">Indications Therapeutiques</label>
                                <div class="form-group shadow-textarea">
                                    <textarea name="indication" class="form-control z-depth-1" required id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-divider"></div>

                        <div class="form-row">
                            <div class="col">
                                <label for="">Prix Grossiste Hors taxe</label>
                                <input type="text" class="form-control" placeholder="PGHT" name="pght" required>
                            </div>
                            <div class="col">
                                <!-- <input type="text" class="form-control" placeholder="Prix de Revient pour le Traitement" name="prpt"> -->
                            </div>
                        </div>
                        <div class="form-divider">
                            Laboratoire Fabricant
                        </div>
                        <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>
                        <label for = "same">Meme que le labo demandeur de l'AMM</label>

                        <div class="form-row">
                            <div class="col">
                                <label for="">Nom du Labo Fabricant</label>
                                <input type="text" class="form-control" required  placeholder="Manufacturer" id="manufacturer" name="manufacturer">
                            </div>
                            <div class="col">
                                <label for="">Adresse</label>
                                <input type="text" class="form-control" required placeholder="Adrese" id="adresse" name="adresse">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Email du labo Fabricant</label>
                                <input type="text" class="form-control" required placeholder="Manufacturer email" id="email" name="email">
                            </div>
                            <div class="col">
                                <label for="">Telephone du Labo Fabricant</label>
                                <input type="text" class="form-control" required placeholder="Manufacturer's Phone Number" id="phone" name="phone">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group shadow-textarea">
                                    <label for="exampleFormControlTextarea6">Motivations</label>
                                    <textarea name="motivation" required class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                </div>
                            </div>
                        </div>

                <input type="hidden" value="{{Auth()->user()->id}}" name="user_id">

                <!-- <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button> -->
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
