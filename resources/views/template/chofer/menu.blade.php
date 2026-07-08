<nav class="pcoded-navbar menu-light navbar-collapsed">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('images/iconos/usuario_asistente.svg') }}" alt="Chofer">
                    <div class="user-details">
                        <div id="more-details">{{ @Auth::user()->name }}
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <form id="close_chofer" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="javascript:{}" onclick="document.getElementById('close_chofer').submit();"
                                    data-toggle="tooltip" title="Cerrar sesión" class="text-danger">
                                    <i class="feather icon-power"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item">
                    <a href="{{ route('chofer.home') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Mi Escritorio</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
