@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        <h5>Bienvenue sur la nouvelle plateforme des demandes
                        de dépôts d'autorisation de Mise sur le Marché de
                        Produits pharmaceutiques de la Direction de la Pharmacie
                        et du Médicament du Sénégal</h5>

                        <h3>
                            La Plateforme est en phase test à partir du 01 Janvier 2020 jusqu’ au 31 Janvier 2020 au plus tard
                        </h3>

                        <h3>
                            Nous vous prions de nous faire part de vos feedbacks pendant cette période test sur les numéros ou adresses emails suivants.
                        </h3>

                        <p>Direction de la Pharmacie et du Médicament<br>
                        53 rue Mousse DIOP x Victor HUGO, BP6150, Dakar, Senegal<br>
                        Tel: +221 33 822 44 70 / +221 77 134 75 00 <br>
                        Email: dirpharme.sn@gmail.com

                        </p>

                        <br ><br ><br ><br ><br ><br ><br >

                    </53>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
