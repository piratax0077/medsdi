<aside class="sidebar">
    <div class="brand">
        <img src="{{ asset('/images/logo_pais.png') }}" alt="Logo" style="height: 40px; width: auto; display: block; margin: 0 auto 15px;">
    </div>
    <div class="brand-text">
        <span class="brand-mark">CM</span>
        <div>
            <strong>Centro Médico</strong>
            <small>Gestión contable</small>
        </div>
    </div>

    @if(session('contador_lugar_atencion_id') && isset($lugares_atencion))
        @php
            $lugar_actual = $lugares_atencion->firstWhere('id_lugar_atencion', session('contador_lugar_atencion_id'));
        @endphp

        @if($lugar_actual && isset($lugar_actual->LugarAtencion) && $lugar_actual->LugarAtencion)
            <div class="lugar-actual-header">
                <div class="lugar-icon">
                    <i class="feather icon-map-pin"></i>
                </div>
                <div class="lugar-info">
                    <small>LUGAR ACTUAL</small>
                    <strong>{{ $lugar_actual->LugarAtencion->nombre }}</strong>
                </div>
            </div>
        @endif
    @endif

    <nav id="main-nav">
        <a href="{{ route('contabilidad.home') }}" class="nav-item {{ Request::routeIs('contabilidad.home') ? 'active' : '' }}">
            <span>⌂</span> Escritorio contable
        </a>
        <a href="{{ route('contabilidad.libro') }}" class="nav-item {{ Request::routeIs('contabilidad.libro') ? 'active' : '' }}">
            <span>L</span> Libro y facturación
        </a>
        <a href="{{ route('contabilidad.rrhh') }}" class="nav-item {{ Request::routeIs('contabilidad.rrhh') ? 'active' : '' }}">
            <span>♙</span> Recursos humanos
        </a>
        <a href="{{ route('contabilidad.remuneraciones') }}" class="nav-item {{ Request::routeIs('contabilidad.remuneraciones') ? 'active' : '' }}">
            <span>$</span> Remuneraciones
        </a>
        <a href="{{ route('contabilidad.ausencias') }}" class="nav-item {{ Request::routeIs('contabilidad.ausencias') ? 'active' : '' }}">
            <span>□</span> Vacaciones y licencias
        </a>
        <a href="{{ route('contabilidad.copagos') }}" class="nav-item {{ Request::routeIs('contabilidad.copagos') ? 'active' : '' }}">
            <span>F</span> Copagos y FONASA
        </a>
        <a href="{{ route('contabilidad.documentos') }}" class="nav-item {{ Request::routeIs('contabilidad.documentos') ? 'active' : '' }}">
            <span>▤</span> Documentos laborales
        </a>
        <a href="{{ route('contabilidad.movimientos') }}" class="nav-item {{ Request::routeIs('contabilidad.movimientos') ? 'active' : '' }}">
            <span>⇄</span> Ingresos y egresos
        </a>
        <!-- link al servicio de impuestos internos -->
        <a href="{{ route('contabilidad.sii') }}" class="nav-item {{ Request::routeIs('contabilidad.sii') ? 'active' : '' }}">
            <span>✉</span> SII y facturación electrónica
        </a>
    </nav>

    <div class="menu-divider"></div>

    <nav class="account-nav">
        @if(isset($lugares_atencion) && $lugares_atencion->count() > 1)
            <a href="{{ route('contabilidad.cambiar_lugar') }}" class="nav-item">
                <span><i class="feather icon-refresh-cw"></i></span> Cambiar lugar atención
            </a>
        @endif
        <a href="{{ route('adm_cm.home') }}" class="nav-item">
            <span><i class="feather icon-grid"></i></span> Volver a escritorio
        </a>
        <a href="#" class="nav-item" onclick="event.preventDefault(); document.getElementById('closeSessionSidebar').submit();">
            <span><i class="feather icon-power"></i></span> Cerrar sesión
        </a>
    </nav>

    <form action="{{ ROUTE('logout') }}" method="post" id="closeSessionSidebar" style="display: none;">
        @csrf
    </form>

    <div class="api-status">
        <span class="status-dot"></span>
        <div><strong>API simulada</strong><small>Conexión local segura</small></div>
    </div>
</aside>
