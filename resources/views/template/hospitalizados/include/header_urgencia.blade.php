<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	<div class="m-header">
        <a class="mobile-menu" id="mobile-collapse"><span></span></a>
        <a href="#!" class="b-brand">
            <img src="{{ asset('/images/logo_pais.png') }}" alt="" class="logo" height="45px">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Box en alerta" data-placement="button">
                        <i class="feather icon-bell p-16"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>Box en alerta</span>
                        </div>
                        <ul></ul>
                        <ul class="pro-body">
                            <li id="lista_box_alerta">
                                <a href="#" class="dropdown-item"><img src="{{ asset('images/iconos_urg/em.png') }}" alt="" style="width: 40px;">
                                    Sin notificaciones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Pedidos Listos" data-placement="button">
                        <i class="fas fa-truck"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>Pedidos Listos</span>
                        </div>
                        <ul></ul>
                        <ul class="pro-body">
                            <li id="lista_pedidos_listos">
                                <a href="#" class="dropdown-item"><img src="{{ asset('images/iconos_urg/em.png') }}" alt="" style="width: 40px;">
                                    Sin notificaciones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Cambiar escritorio" data-placement="button" >
                        <i class="feather icon-refresh-cw p-16"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>Cambiar escritorio</span>
                        </div>
                        <ul></ul>
                        <ul class="pro-body">
                            @if (Auth::user()->hasRole('Profesional') || Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('profesional.home') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Escritorio profesional
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->hasRole('JefeTurno') || Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('jefe.turno.home') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Escritorio Jefe Turno
                                    </a>
                                </li>
                            @endif
{{--  
                            @if (Auth::user()->hasRole('Tens') || Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('tens.home') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Escritorio Tens
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->hasRole('RecepcionUrgencia') || Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('recepcion.home') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Escritorio Recepcion Urgencia
                                    </a>
                                </li>
                            @endif  --}}

                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user "></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>{{  @Auth::user()->name }}</span>
                        </div>
                        {{--  <ul></ul>  --}}
                        <ul class="pro-body">
                            <li>
                                <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                    @csrf
                                    <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger" href="javascript:{}" onclick="document.getElementById('closeSession').submit();">
                                        <i class="feather icon-power"></i> Cerrar sesión
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</header>
