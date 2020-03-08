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
                  <i class="c-blue-500 ti-home"></i>
                </span>
                <span class="title">Acceuil</span>
              </a>
            </li>

            <li class="nav-item">
              <a class='sidebar-link' href="{{url('enregistrement')}}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-file"></i>
                </span>
                <span class="title">Enregistrement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('renouvellement')}}">
                <span class="icon-holder">
                  <i class="c-yellow-500 ti-pencil"></i>
                </span>
                <span class="title">Renouvellement</span>
              </a>
            </li>
            @if(Auth()->user()->role != 'labo')
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('laboratoire') }}">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-comment-alt"></i>
                </span>
                <span class="title">Labo Representés</span>
              </a>
            </li>
            @endif

            @if(Auth()->user()->role == 'pharmacien')

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-orange-500 ti-pencil"></i>
                </span>
                <span class="title">Recevabilite</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="{{ url('recevabilite') }}">Dossier</a>
                </li>
                <li>
                  <a class='sidebar-link' href="{{ url('rc_rapport') }}">Rapports</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-pencil"></i>
                </span>
                <span class="title">evaluation</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="{{ url('evaluation') }}">Dossier</a>
                </li>
                <li>
                  <a class='sidebar-link' href="{{ url('rapports_ev') }}">Rapports</a>
                </li>
              </ul>
            </li>
            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{ url('arrete') }}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-file"></i>
                </span>
                <span class="title">Arrete</span>
              </a>
            </li>
            @endif


        </ul>
    </div>
</div>
