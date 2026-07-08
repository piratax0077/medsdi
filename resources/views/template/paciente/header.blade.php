@php
    /*
    |--------------------------------------------------------------------------
    | Header paciente
    |--------------------------------------------------------------------------
    | - El icono de mensajes queda siempre visible.
    | - El badge cuenta solo mensajes no leídos (estado = 0).
    | - El dropdown muestra los últimos mensajes, aunque estén leídos.
    | - La opción "Ver todos" siempre lleva a la bandeja del paciente.
    */

    $mensajesHeader = collect($mensajes ?? []);

    // Asegura que datos_mensaje venga como objeto, aunque desde backend llegue como JSON string.
    $mensajesHeader = $mensajesHeader->map(function ($mensaje) {
        if (isset($mensaje->datos_mensaje) && is_string($mensaje->datos_mensaje)) {
            $mensaje->datos_mensaje = json_decode($mensaje->datos_mensaje);
        }

        return $mensaje;
    });

    $mensajesNoLeidosHeader = $mensajesHeader->where('estado', 0);
@endphp

<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu on" id="mobile-collapse" href="#!">
            <span></span>
        </a>

        <a href="{{ route('paciente.home') }}" class="b-brand">
            <img src="{{ asset('images/logo_pais.png') }}" alt="Logo" class="logo" height="45px">
        </a>

        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">

            {{-- Inicio paciente --}}
            <li>
                <a href="{{ route('paciente.home') }}" title="Ir a mi escritorio">
                    <i class="feather icon-home mr-2" style="font-size: 1.2rem!important;"></i>
                </a>
            </li>

            {{-- Mensajes paciente --}}
            <li>
                <div class="dropdown drp-user">
                    <a href="#"
                       class="dropdown-toggle position-relative"
                       data-toggle="dropdown"
                       title="Mensajes"
                       data-placement="button">

                        <i class="feather icon-mail" style="font-size:1.2rem!important;"></i>

                        @if($mensajesNoLeidosHeader->count() > 0)
                            <span class="badge badge-danger badge-pill"
                                  style="position:absolute;top:-6px;right:-8px;font-size:10px;">
                                {{ $mensajesNoLeidosHeader->count() }}
                            </span>
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head font-weight-bold f-16 py-2 d-flex justify-content-between align-items-center">
                            <span>Mensajes</span>

                            @if($mensajesNoLeidosHeader->count() > 0)
                                <span class="badge badge-danger">
                                    {{ $mensajesNoLeidosHeader->count() }} nuevo{{ $mensajesNoLeidosHeader->count() > 1 ? 's' : '' }}
                                </span>
                            @else
                                <span class="badge badge-light text-muted">Sin nuevos</span>
                            @endif
                        </div>

                        <ul class="pro-body">
                            @forelse($mensajesHeader->take(5) as $mensaje)
                                @php
                                    $datosMensaje = $mensaje->datos_mensaje ?? null;
                                    $tituloMensaje = $datosMensaje->titulo ?? $datosMensaje->asunto ?? 'Sin título';
                                    $textoMensaje = $datosMensaje->mensaje ?? '';
                                    $esNuevo = isset($mensaje->estado) && (int) $mensaje->estado === 0;
                                @endphp

                                <li>
                                    <a href="{{ route('paciente.mensaje', ['id' => $mensaje->id]) }}"
                                       class="dropdown-item {{ $esNuevo ? 'font-weight-bold' : '' }}">
                                        <div class="media">
                                            <img class="img-radius img-40"
                                                 src="{{ asset('images/iconos/usuario_profesional.svg') }}"
                                                 alt="Mensaje"
                                                 style="width:45px;">

                                            <div class="media-body ml-3" style="min-width:0;">
                                                <h6 class="pro-title mb-1 text-truncate">
                                                    @if($esNuevo)
                                                        <span class="badge badge-danger mr-1">Nuevo</span>
                                                    @endif

                                                    {{ $tituloMensaje }}
                                                </h6>

                                                @if(!empty($textoMensaje))
                                                    <small class="text-muted d-block text-truncate">
                                                        {{ \Illuminate\Support\Str::limit(strip_tags($textoMensaje), 55) }}
                                                    </small>
                                                @endif

                                                <p class="pro-date mb-0">
                                                    @if(isset($mensaje->created_at) && $mensaje->created_at)
                                                        {{ $mensaje->created_at->diffForHumans() }}
                                                    @elseif(isset($mensaje->fecha_envio) && $mensaje->fecha_envio)
                                                        {{ \Carbon\Carbon::parse($mensaje->fecha_envio)->diffForHumans() }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <span class="dropdown-item text-muted">
                                        No tienes mensajes.
                                    </span>
                                </li>
                            @endforelse

                            <li>
                                <a href="{{ route('paciente.mensaje') }}"
                                   class="dropdown-item text-center font-weight-bold">
                                    <i class="feather icon-inbox mr-1"></i>
                                    Ver todos los mensajes
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            {{-- Cambiar escritorio --}}
            @if(Auth::user() && count(Auth::user()->roles()->get()) > 1)
                <li>
                    <div class="dropdown drp-user">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown"
                           title="Cambiar escritorio"
                           data-placement="button">
                            <i class="feather icon-refresh-cw" style="font-size: 1.2rem!important;"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head font-weight-bold f-16 py-2">
                                <span>Cambiar escritorio</span>
                            </div>

                            <ul class="pro-body">
                                @if(Auth::user()->hasRole('Paciente') || Auth::user()->hasRole('Admin'))
                                    <li>
                                        <a href="{{ route('paciente.home') }}" class="dropdown-item">
                                            <i class="feather icon-user"></i>
                                            Escritorio paciente
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->hasRole('Profesional') || Auth::user()->hasRole('Admin'))
                                    <li>
                                        <a href="{{ route('profesional.home') }}" class="dropdown-item">
                                            <i class="feather icon-user"></i>
                                            Escritorio profesional
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('Admin'))
                                    <li>
                                        <a href="{{ route('asistente.home') }}" class="dropdown-item">
                                            <i class="feather icon-user"></i>
                                            Escritorio asistente
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->hasRole('AdministradorMedico'))
                                    <li>
                                        <a href="{{ route('institucion.home') }}" class="dropdown-item">
                                            <i class="feather icon-user"></i>
                                            Escritorio administrador médico
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->hasRole('Institucion') || Auth::user()->hasRole('Admin'))
                                    <li>
                                        <a href="{{ route('institucion.home') }}" class="dropdown-item">
                                            <i class="feather icon-user"></i>
                                            Administración centro médico
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->hasRole('AdministradorLaboratorio') || Auth::user()->hasRole('Admin'))
                                    <li>
                                        <a href="{{ route('laboratorio.adm_general.home') }}" class="dropdown-item">
                                            <i class="feather icon-user"></i>
                                            Administración laboratorio
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>
            @endif

            {{-- Usuario --}}
            @if(Auth::user())
                <li>
                    <div class="dropdown drp-user">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown"
                           title="Mi cuenta">
                            <i class="feather icon-user" style="font-size: 1.2rem!important;"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head font-weight-bold f-16 py-2">
                                <span>{{ Auth::user()->name }}</span>
                            </div>

                            <ul class="pro-body">
                                <li>
                                    <form action="{{ route('logout') }}" method="post" id="closeSession">
                                        @csrf

                                        <a data-toggle="tooltip"
                                           title="Cerrar sesión"
                                           class="text-danger font-weight-bold"
                                           href="javascript:{}"
                                           onclick="document.getElementById('closeSession').submit();">
                                            <i class="feather icon-power"></i>
                                            Cerrar sesión
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            @endif

        </ul>
    </div>
</header>
