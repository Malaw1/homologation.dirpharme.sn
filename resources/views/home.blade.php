@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <!-- <div class="card-header"></div> -->
                @if(Auth()->user()->role != 'pharmacien')
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
                @else
                
                <div class="row gap-20">
                  <!-- #Toatl Visits ==================== -->
                  <div class='col-md-4'>
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Agences</h6>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash"></span>
                          </div>
                          <div class="peer">
                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">50</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- #Total Page Views ==================== -->
                  <div class='col-md-4'>
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Laboratoires</h6>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash2"></span>
                          </div>
                          <div class="peer">
                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">500</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- #Unique Visitors ==================== -->
                  <div class='col-md-4'>
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Delegues Medicaux</h6>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                            <span id="sparklinedash3"></span>
                          </div>
                          <div class="peer">
                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">400</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Traitement intene des dossiers</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Prenom & Nom</th>
                                        <th scope="col">Numero Dossiers</th>
                                        <th scope="col">Nom du Produit</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Dr. Cheikh S. Camara</th>
                                        <td>009872729</td>
                                        <td>Cifrab 500</td>
                                        <td>
                                            <span class="peer">
                                                <span class="badge badge-pill fl-r badge-danger lh-0 p-10">Rejeter</span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dr. Aminta DIOP</th>
                                        <td>09868930</td>
                                        <td>Rekovelle</td>
                                        <td>
                                            <span class="peer">
                                                <span class="badge badge-pill fl-r badge-warning lh-0 p-10">En traitement</span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dr. Madicke DIAGNE</th>
                                        <td>89683930</td>
                                        <td>Biofar 1000</td>
                                        <td>
                                            <span class="peer">
                                                <span class="badge badge-pill fl-r badge-success lh-0 p-10">Favorable</span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Traitement externe des dossiers</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Prenom & Nom</th>
                                        <th scope="col">Numero Dossiers</th>
                                        <th scope="col">Nom du Produit</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>
                                            <span class="peer">
                                                <span class="badge badge-pill fl-r badge-warning lh-0 p-10">En traitement</span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>
                                            <span class="peer">
                                                <span class="badge badge-pill fl-r badge-warning lh-0 p-10">En traitement</span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>
                                            <span class="peer">
                                                <span class="badge badge-pill fl-r badge-warning lh-0 p-10">En traitement</span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="masonry-item col-md-6">
                        <div class="bgc-white p-20 bd">
                            <h6 class="c-grey-900">Bar Chart</h6>
                            <div class="mT-30">
                                <canvas id="bar-chart" height="220"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="masonry-item col-md-6">
                        <div class="bgc-white p-20 bd">
                            <h6 class="c-grey-900">Easy Pie Charts</h6>
                            <div class="mT-30">
                                <div class="peers mT-20 fxw-nw@lg+ jc-sb ta-c gap-10">
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='80' data-percent="75" data-bar-color='#f44336'>
                                        <span></span>
                                        </div>
                                        <h6 class="fsz-sm">Item 1</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='80' data-percent="50" data-bar-color='#2196f3'>
                                        <span></span>
                                        </div>
                                        <h6 class="fsz-sm">Item 2</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='80' data-percent="65" data-bar-color='#f44336'>
                                        <span></span>
                                        </div>
                                        <h6 class="fsz-sm">Item 3</h6>
                                    </div>
                                    <div class="peer">
                                        <div class="easy-pie-chart" data-size='80' data-percent="90" data-bar-color='#ff9800'>
                                        <span></span>
                                        </div>
                                        <h6 class="fsz-sm">Item 4</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
