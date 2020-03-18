@extends('layouts.app')

@section('content')
<div class="container">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

    <!-- Header -->
    <div class="jumbotron">
        <h2 class="display-4">Demande N°: {{ $enreg->numero }}</h2>
        <p class="lead">Enregistrement du produit: <strong>{{ $prod->nom_medicament }} {{ $prod->presentation }} </p>
        <hr class="my-4">
        @if($enreg->status == 'Demande soumise')
        <div class="alert alert-success" role="alert">
            Demande de depot
            <div class="float-right">
                <span class="icon-holder">
                  <i class="c-green-500 ti-check">Demande Soumise</i>
                </span>
            </div>
        </div>
        @endif

    </div>

    <!-- /Header -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Identification du Produit</div>
                        <div class="table-responsive m-t-40" style="clear: both;">
                            @if($prod != null)
                            <table class="table table-hover">
                                <tr>
                                    <th>Nom du Medicament</th>
                                    <td>{{ $prod->nom_medicament }}</td>
                                </tr>
                                <tr>
                                    <th>Forme Pharmaceutique</th>
                                    <td>{{ $prod->forme_pharmaceutique }}</td>
                                </tr>
                                <tr>
                                    <th>Presentation</th>
                                    <td>{{ $prod->presentation }}</td>
                                </tr>

                                <tr>
                                    <th>Classe Therapeutique</th>
                                    <td>{{ $prod->classe_therapeutique }}</td>
                                </tr>
                                <tr>
                                    <th>PGHT</th>
                                    <td>{{ $prod->pght }}</td>
                                </tr>
                                <!-- <tr>
                                    <th>PRPT</th>
                                    <td>{{ $prod->prpt }}</td>
                                </tr> -->
                            </table>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Substances Actives</div>
                        <div class="table-responsive m-t-40" style="clear: both;">
                            @if($subs != null)
                                <table class="table table-hover">
                                    <thead>
                                        <th>Substances</th>
                                        <th>Dosage</th>
                                        <th>Unite</th>
                                    </thead>
                                    <tbody>
                                        @foreach($subs as $subs)
                                        <tr>
                                            <td>{{ $subs->substance }}</td>
                                            <td>{{ $subs->dosage }}</td>
                                            <td>{{ $subs->unite }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <th>Excipients: </th> {{ $prod->excipient }}
                            <th>Excipients à effet notoire: </th> {{ $prod->excipient_notoire }}
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Indication Therapeutique</div>
                        <div class="card-body">
                            <p>{{ $prod->indication }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Motivation de la Demande</div>
                        <div class="card-body">
                            <p>{{$motivation->motivation }} </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Documents Accompagnant la demande</div>
                    <div class="card-body">
                        @foreach($dossier as $files)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-secondary" href="{{ url('dossier/'.$files->id.'?file='.$files->filename) }}" target="_blank" >{{ $files->label }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @if(Auth()->user()->role == 'pharmacien' || Auth()->user()->role == 'admin')
            <div class="row">
                @if($enreg->role == 'labo')
                    <div class="col-md-6">
                        <div class="card-header"><h5>Labo Demandeur de l'AMM</h5></div>
                        <span class="table-responsive p-20">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class=" bdwT-0">Type</th>
                                        <td>{{ $enreg->role }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Nom</th>
                                        <td>{{ $enreg->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Adresse</th>
                                        <td>{{ $enreg->adresse }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Pays</th>
                                        <td>{{ $enreg->pays }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Telephone</th>
                                        <td>{{ $enreg->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Email</th>
                                        <td>{{ $enreg->email }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </span>
                    </div>
                    @if($prod->manufacturer != null)
                        <div class="col-md-6">
                            <div class="card-header"><h5>Laboratoire Fabricant</h5></div>
                            <span class="table-responsive p-20">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th class=" bdwT-0">Nom</th>
                                            <td>{{ $prod->manufacturer }}</td>
                                        </tr>
                                        <tr>
                                            <th class=" bdwT-0">Adresse</th>
                                            <td>{{ $prod->adresse }}</td>
                                        </tr>
                                        <tr>
                                            <th class=" bdwT-0">Telephone</th>
                                            <td>{{ $prod->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th class=" bdwT-0">Email</th>
                                            <td>{{ $prod->email }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </span>
                        </div>
                    @endif

                @else
                    @if($prod->manufacturer != null)
                    <div class="col-md-4">
                    @else
                    <div class="col-md-6">
                    @endif
                        <div class="card-header"><h5>Agence Representant le Labo Demandeur de l'AMM</h5></div>
                        <span class="table-responsive p-20">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class=" bdwT-0">Nom</th>
                                        <td>{{ $enreg->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Adresse</th>
                                        <td>{{ $enreg->adresse }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Pays</th>
                                        <td>{{ $enreg->pays }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Telephone</th>
                                        <td>{{ $enreg->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Email</th>
                                        <td>{{ $enreg->email }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </span>
                    </div>

                    @if($prod->manufacturer != null)
                    <div class="col-md-4">
                    <div class="card-header"><h5>Labo Demandeur de l'AMM</h5></div>
                    @else
                    <div class="col-md-6">
                    <div class="card-header"><h5>Labo Demandeur de l'AMM (= Labo Fabricant )</h5></div>
                    @endif
                        <span class="table-responsive p-20">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class=" bdwT-0">Nom</th>
                                        <td>{{ $labo->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Adresse</th>
                                        <td>{{ $labo->adresse }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Pays</th>
                                        <td>{{ $labo->pays }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Telephone</th>
                                        <td>{{ $labo->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <th class=" bdwT-0">Email</th>
                                        <td>{{ $labo->email }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </span>
                    </div>

                    @if($prod->manufacturer != null)
                        <div class="col-md-6">
                            <div class="card-header"><h5>Laboratoire Fabricant</h5></div>
                            <span class="table-responsive p-20">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th class=" bdwT-0">Nom</th>
                                            <td>{{ $prod->manufacturer }}</td>
                                        </tr>
                                        <tr>
                                            <th class=" bdwT-0">Adresse</th>
                                            <td>{{ $prod->adresse }}</td>
                                        </tr>
                                        <tr>
                                            <th class=" bdwT-0">Telephone</th>
                                            <td>{{ $prod->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th class=" bdwT-0">Email</th>
                                            <td>{{ $prod->email }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </span>
                        </div>
                    @endif
                @endif
            </div>

            <hr>

           <!-- Decision -->
           @if(Auth()->user()->poste == 'Responsable DCAM')
           <div class="row">
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header">
                            Paiement
                        </div>
                        <div class="card-body">
                            @if($enreg->paiement == NULL)
                            <form action="{{ url('paiement') }}" method="post">
                                @csrf
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="paiement" value="Payé">
                                    <label class="form-check-label" for="inlineCheckbox1">Disponible</label>
                                </div>
                                <input type="hidden" name="enreg_id" placeholder="" value="{{$enreg->id }}">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                            @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" checked disable>
                                    <label class="form-check-label" for="inlineCheckbox1">Payé</label>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header">
                            Echantillon
                        </div>
                        <div class="card-body">
                            <form action="{{ url('echantillon') }}" method="post">
                            @csrf
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" checked name="echantillon" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Pas encore Disponible </label>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br >

            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header">
                            Demande de depot
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#refusDepot">
                                Refuser
                            </button>

                            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#deposer">
                                Accepter
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header">
                            Completude du Dossier et Recevabilite Administrative
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#recev">
                                Confier à
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @endif
            <hr>

           <!-- /Decision -->
        @endif

            <hr>
    </div>



<!-- modal Autorisation de Depot -->
<div class="modal fade" id="deposer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Autorisation de Depot de Dossier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('accepterdepot')  }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Destinataire:</label>
                            <input type="text" class="form-control" name="recipient" id="recipient-name" value="{{ $enreg->email }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Objet:</label>
                            <input type="text" value="[Enregistrement du produit: {{ $prod->nom_medicament }} sous le numero : {{ $enreg->numero }}]" class="form-control" id="recipient-name" name="objet">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="status"  value="1">
                            <input type="hidden" name="name"  value="{{$enreg->name}}">
                            <input type="hidden" name="produit"  value="{{ $prod->nom_medicament }}">
                            <input type="hidden" name="enreg" placeholder="" value="{{$enreg->id }}">
                            <input type="hidden" name="message" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<!-- end modal Autorisation de Depot -->

<!-- modal Refus de Depot -->
    <div class="modal fade" id="refusDepot" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Autorisation de Depot de Dossier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('refusdepot')  }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Destinataire:</label>
                            <input type="text" class="form-control" name="recipient" id="recipient-name" value="{{ $enreg->email }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Objet:</label>
                            <input type="text" value="[Enregistrement du produit: {{ $prod->nom_medicament }} sous le numero : {{ $enreg->code }}]" class="form-control" id="recipient-name" name="objet">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="name"  value="{{$enreg->name}}">
                            <input type="hidden" name="produit"  value="{{ $prod->nom_medicament }}">
                            <input type="hidden" name="enreg" value="{{$enreg->id }}">
                            <input type="hidden" name="message" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<!-- end modal Refus de Depot -->

<!-- modal Confier le dossier pour recevabilite -->
<div class="modal fade" id="recev" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Confier le dossier a </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('recevabilite') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nom du Pharmacien Responsable de ce dossier</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($user as $pharmacien)
                                <option value="{{ $pharmacien->id }}">{{ $pharmacien->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Deadline</label>
                        <input type="date"  class="form-control" id="recipient-name" name="deadline">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Commentaire:</label>
                        <input type="hidden" name="enreg_id" placeholder="demande_id" value="{{$enreg->id }}">
                        <textarea class="form-control z-depth-1" name="commentaire" ></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
                </form>
        </div>
    </div>
</div>
<!-- end modal COnfier le dossier -->

</div>
@endsection
