<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{ url('home') }}">
                        <div class="peers ai-c fxw-nw">
                        <div class="peer">
                            <div class="logo">
                            <img src="{{ asset('img/logo_msas.png') }}" alt="">
                            </div>
                        </div>
                        <div class="peer peer-greed">
                            <h5 class="lh-1 mB-0 logo-text">Dirpharme</h5>
                        </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{ url('home') }}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-desktop"></i>
                </span>
                <span class="title">Acceuil</span>
              </a>
            </li>

            <!-- Laboratoire  -->
            @if(Auth()->user()->role == 'labo')
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('enregistrement')}}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-folder"></i>
                </span>
                <span class="title">Enregistrement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('renouvellement')}}">
                <span class="icon-holder">
                  <i class="c-yellow-500 ti-reload"></i>
                </span>
                <span class="title">Renouvellement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('variation')}}">
                <span class="icon-holder">
                  <i class="c-red-500 ti-palette"></i>
                </span>
                <span class="title">Variation</span>
              </a>
            </li>
            @elseif(Auth()->user()->role == 'agence')
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('enregistrement')}}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-folder"></i>
                </span>
                <span class="title">Enregistrement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('renouvellement')}}">
                <span class="icon-holder">
                  <i class="c-yellow-500 ti-reload"></i>
                </span>
                <span class="title">Renouvellement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('variation')}}">
                <span class="icon-holder">
                  <i class="c-red-500 ti-palette"></i>
                </span>
                <span class="title">Variation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('laboratoire') }}">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-medall-alt"></i>
                </span>
                <span class="title">Labo Representés</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('visiteurs') }}">
                <span class="icon-holder">
                  <i class="c-yellow-500 ti-id-badge"></i>
                </span>
                <span class="title">Visiteurs Medicaux</span>
              </a>
            </li>
            @elseif(Auth()->user()->role == 'pharmacien')
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-red-500 ti-world"></i>
                </span>
                <span class="title">Commission</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="{{ url('commission/create') }}">Nouvelle Commission</a>
                </li>
                <li>
                  <a class='sidebar-link' href="#">Maquette</a>
                </li>
                <li>
                  <a class='sidebar-link' href="#">Particiapants</a>
                </li>
                <li>
                  <a class='sidebar-link' href="#">Historique</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-folder"></i>
                </span>
                <span class="title">Enregistrement</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="{{ url('enregistrement') }}">Demandes</a>
                </li>
                <li>
                  <a class='sidebar-link' href="{{ url('dossier') }}">Avis Favorables</a>
                </li>
                <li>
                  <a class='sidebar-link' href="#">Avis Rejet</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-yellow-500 ti-reload"></i>
                </span>
                <span class="title">Renouvellement</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="{{ url('renouvellement') }}">Demandes</a>
                </li>
                <li>
                  <a class='sidebar-link' href="#">Avis Favorables</a>
                </li>
                <li>
                  <a class='sidebar-link' href="#">Rejets</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('variation')}}">
                <span class="icon-holder">
                  <i class="c-red-500 ti-palette"></i>
                </span>
                <span class="title">Variation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="#">
                <span class="icon-holder">
                  <i class="c-green-500 ti-stamp"></i>
                </span>
                <span class="title">Visa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('laboratoire') }}">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-comment-alt"></i>
                </span>
                <span class="title">Laboratoires</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('agence') }}">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-briefcase"></i>
                </span>
                <span class="title">Agences</span>
              </a>
            </li>
            
              @if(Auth()->user()->poste == 'Responsable DCAM' || Auth()->user()->poste == 'directeur' )
              <li class="nav-item">
                <a class='sidebar-link' href="{{ url('echantillons') }}">
                  <span class="icon-holder">
                    <i class="c-deep-green-500 ti-package"></i>
                  </span>
                  <span class="title">Echantillontheque</span>
                </a>
              </li>
              <li class="nav-item">
                <a class='sidebar-link' href="{{ url('visiteurs') }}">
                  <span class="icon-holder">
                    <i class="c-deep-green-500 ti-id-badge"></i>
                  </span>
                  <span class="title">Visiteurs</span>
                </a>
              </li>
              <li class="nav-item">
                <a class='sidebar-link' href="{{ url('arretes') }}">
                  <span class="icon-holder">
                    <i class="c-deep-green-500 ti-receipt"></i>
                  </span>
                  <span class="title">Arretes</span>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a class='sidebar-link' href="#">
                  <span class="icon-holder">
                    <i class="c-deep-green-500 ti-server"></i>
                  </span>
                  <span class="title">Base de donnees</span>
                </a>
              </li>
            @elseif(Auth()->user()->role == 'secretariat')

              <li class="nav-item">
                <a class='sidebar-link' href="{{ url('depart') }}">
                  <span class="icon-holder">
                    <i class="c-deep-green-500 ti-files"></i>
                  </span>
                  <span class="title">Courriers Depart</span>
                </a>
              </li>

              <li class="nav-item">
                <a class='sidebar-link' href="{{ url('courrier') }}">
                  <span class="icon-holder">
                    <i class="c-deep-yellow-500 ti-email"></i>
                  </span>
                  <span class="title">Courriers Arrivés</span>
                </a>
              </li>

              <li class="nav-item">
                <a class='sidebar-link' href="#">
                  <span class="icon-holder">
                    <i class="c-deep-yellow-500 ti-archive"></i>
                  </span>
                  <span class="title">Archives</span>
                </a>
              </li>

              <li class="nav-item">
                <a class='sidebar-link' href="{{ url('confidentiel') }}">
                  <span class="icon-holder">
                    <i class="c-deep-yellow-500 ti-lock"></i>
                  </span>
                  <span class="title">Confidentiels</span>
                </a>
              </li>

            @endif


        </ul>
    </div>
</div>
