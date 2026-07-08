<aside class="sidebar">

    <div class="brand">
        <img src="{{ asset('/images/logo_pais.png') }}"
             alt="Logo COMPIN"
             style="height:40px;width:auto;display:block;margin:0 auto 15px;">
    </div>

    <div class="brand-text">
        <span class="brand-mark">
            <i class="feather icon-file-text"></i>
        </span>
        <div>
            <strong>Fiscalizador Fonasa</strong>
            <small>Gestión Licencias Médicas</small>
        </div>
    </div>

    @if(session('contador_lugar_atencion_id') && isset($lugares_atencion))
        @php
            $lugar_actual = $lugares_atencion->firstWhere(
                'id_lugar_atencion',
                session('contador_lugar_atencion_id')
            );
        @endphp

        @if($lugar_actual && isset($lugar_actual->LugarAtencion))
            <div class="lugar-actual-header">

                <div class="lugar-icon">
                    <i class="feather icon-map-pin"></i>
                </div>

                <div class="lugar-info">
                    <small>OFICINA ACTUAL</small>
                    <strong>
                        {{ $lugar_actual->LugarAtencion->nombre }}
                    </strong>
                </div>

            </div>
        @endif
    @endif


    <nav id="main-nav">

        <a href="{{ route('compin.home') }}"
           class="nav-item {{ Request::routeIs('compin.home') ? 'active' : '' }}">

            <span>
                <i class="feather icon-home"></i>
            </span>

            Panel general
        </a>


        <a href="{{ route('compin.recepcion') }}"
           class="nav-item {{ Request::routeIs('compin.recepcion') ? 'active' : '' }}">

            <span>
                <i class="feather icon-inbox"></i>
            </span>

            Recepción licencias
        </a>


        <a href="{{ route('compin.comision_medica') }}"
           class="nav-item {{ Request::routeIs('compin.comision_medica') ? 'active' : '' }}">

            <span>
                <i class="feather icon-clipboard"></i>
            </span>

            Comisión médica
        </a>


        <a href="{{ route('compin.visto_bueno_controlador') }}"
           class="nav-item {{ Request::routeIs('compin.visto_bueno_controlador') ? 'active' : '' }}">

            <span>
                <i class="feather icon-check-circle"></i>
            </span>

            Visto bueno
        </a>


        <a href="{{ route('compin.pago_subsidios') }}"
           class="nav-item {{ Request::routeIs('compin.pago_subsidios') ? 'active' : '' }}">

            <span>
                <i class="feather icon-dollar-sign"></i>
            </span>

            Subsidios y pagos
        </a>


        <a href="{{ route('compin.trazabilidad_completa') }}"
           class="nav-item {{ Request::routeIs('compin.trazabilidad_completa') ? 'active' : '' }}">

            <span>
                <i class="feather icon-activity"></i>
            </span>

            Trazabilidad
        </a>

    </nav>

    <div class="menu-divider"></div>

    <nav class="account-nav">

        @if(isset($lugares_atencion) && $lugares_atencion->count() > 1)

            <a href="{{ route('compin.cambiar_lugar') }}"
               class="nav-item {{ Request::routeIs('compin.cambiar_lugar') ? 'active' : '' }}">

                <span>
                    <i class="feather icon-refresh-cw"></i>
                </span>

                Cambiar oficina
            </a>

        @endif


        <a href="{{ route('compin.home') }}"
           class="nav-item">

            <span>
                <i class="feather icon-grid"></i>
            </span>

            Volver al escritorio
        </a>


        <a href="#"
           class="nav-item"
           onclick="event.preventDefault();
           document.getElementById('closeSessionSidebar').submit();">

            <span>
                <i class="feather icon-power"></i>
            </span>

            Cerrar sesión
        </a>

    </nav>

    <form action="{{ route('logout') }}"
          method="post"
          id="closeSessionSidebar"
          style="display:none;">
        @csrf
    </form>


    <div class="api-status">

        <span class="status-dot"></span>

        <div>
            <strong>Sistema COMPIN</strong>
            <small>Servicios operativos</small>
        </div>

    </div>

</aside>
