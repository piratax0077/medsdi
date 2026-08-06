@if (isset($id_ficha_atencion) && !empty($id_ficha_atencion))
    <nav class="pcoded-navbar menu-light navbar-collapsed">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius img-fluid wid-100" id="profile-image"
                                src="{{ $profesional->foto_perfil ? asset('storage/' . $profesional->foto_perfil) : asset('images/iconos/usuario_profesional.svg') }}"
                                alt="User image">
                        <div class="user-details">
                            <div id="more-details">{{ @Auth::user()->name }} <i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div id="nav-user-link">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('profesional.mi_perfil') }}" data-toggle="tooltip" title="Mi perfil">
                                    <i class="feather icon-user"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                    @csrf
                                    <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger"
                                        href="javascript:{}" onclick="document.getElementById('closeSession').submit();">
                                        <i class="feather icon-power"></i>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption text-center">
                        <!--<label>Menú</label>-->
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext text-center">Mi
                                Escritorio</span></a>
                        <ul class="pcoded-submenu">
                            {{-- <li><a href="{{ route('profesional.home') }}">Mi Escritorio Profesional</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.home') }}','Mi Escritorio Profesional');">Mi Escritorio Profesional</a></li>
                            {{-- <li><a href="{{ route('profesional.pacientes') }}">Mis pacientes</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.pacientes') }}','Mis pacientes');">Mis pacientes</a></li>
                            {{-- <li><a href="{{ route('profesional.configuracion') }}"> Panel de Configuración</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.configuracion') }}',' Panel de Configuración');"> Panel de Configuración</a></li>
                            {{-- <li><a href="{{ route('profesional.index_receta_online') }}">Receta Online</a></li>      --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.index_receta_online') }}','Receta Online');">Receta Online</a></li>
                            {{-- <li><a href="{{ route('profesional.flujo_caja') }}">Flujo de Caja</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.flujo_caja') }}','Flujo de Caja');">Flujo de Caja</a></li>
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
    <a href="javascript:void(0)" class="nav-link">
        <span class="pcoded-micon">
            <i class="feather icon-settings"></i>
        </span>

        <span class="pcoded-mtext text-center">
            Configuraciones
        </span>
    </a>

    <ul class="pcoded-submenu">
        <li>
            <a href="{{ route('profesional.mi_perfil') }}">
                Editar perfil
            </a>
        </li>

        <li>
            @if(isset($id_ficha_atencion) && !empty($id_ficha_atencion))
                <a href="javascript:void(0)"
                   onclick="menuValidarSalidaFicha(
                       '{{ route('profesional.personalizar_mi_ficha') }}',
                       'Personalizar ficha de atención'
                   )">
                    Personalizar ficha de atención
                </a>
            @else
                <a href="{{ route('profesional.personalizar_mi_ficha') }}">
                    Personalizar ficha de atención
                </a>
            @endif
        </li>
    </ul>
</li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-video"></i></span><span class="pcoded-mtext text-center">Tutoriales</span></a>
                        <ul class="pcoded-submenu">
                            @if($profesional->id_especialidad != 2)
                            <li><a href="https://vimeo.com/1085553533" target="_blank">Funciones Agenda</a></li>
                            @else
                            <li><a href="https://vimeo.com/1097556981/1b6c497fcc" target="_blank">Funciones Agenda Dental</a></li>
                            @endif
                            <li><a href="https://vimeo.com/1085535164" target="_blank">Receta online</a></li>
                            @if($profesional->id_especialidad != 2)
                            <li><a href="https://vimeo.com/1085574920" target="_blank">Funciones Ficha de atención</a></li>
                            @endif
                            <li><a href="https://vimeo.com/1085574269" target="_blank">Funciones Mis pacientes</a></li>
                            <li><a href="https://vimeo.com/1087894569" target="_blank">Funciones Flujo de Caja</a></li>
                            @if($profesional->id_especialidad != 2)
                            <li><a href="https://vimeo.com/1087895020" target="_blank">Funciones Transcripción <br>de exámenes</a></li>

                            @endif
                            @if($profesional->id_especialidad == 2 && $profesional->id_tipo_especialidad == 16)
                            <li><a href="https://vimeo.com/1087377134" target="_blank">Aranceles y Procedimientos<br> Dentales</a></li>
                            <li><a href="https://vimeo.com/1097556384/d872409869" target="_blank">Uso Ficha Implantología</a></li>
                            @endif
                            @if($profesional->id_especialidad == 2)
                            <li><a href="https://vimeo.com/1097556293/8e50b4f658" target="_blank">Uso TONS</a></li>

                            @endif
                            <li><a href="https://vimeo.com/1085548556" target="_blank">Descarga la App SDI</a></li>

                        </ul>
                    </li>
                </ul>

                <div id="info_cliente"
                    class="mt-3"
                    style="
                        margin:9px;
                        margin-top:125px;
                        background:#fff;
                        border:1px solid #e8edf2;
                    
                        border-radius:14px;
                        box-shadow:0 8px 25px rgba(15,23,42,.08);
                        overflow:hidden;">

                    <!-- CABECERA -->
                    <div style="
                        padding:14px 18px;
                        background:linear-gradient(180deg,#f3fbfb 0%,#ffffff 100%);
                        border-bottom:1px solid #edf2f6;">

                        <div style="
                            font-size:12px;
                            font-weight:700;
                            text-transform:uppercase;
                            letter-spacing:1px;
                            color:#18a7a4;
                            margin-bottom:4px;">
                            PACIENTE
                        </div>

                        <div id="nombre_paciente_menu" style="
                            font-size:12px;
                            font-weight:600;
                            color:#243746;
                            font-family: 'Nunito', sans-serif;
                            text-transform:uppercase!important;
                            line-height:1.35;">
                            {{ $paciente->nombres }}
                            {{ $paciente->apellido_uno }}
                            {{ $paciente->apellido_dos }}
                        </div>

                        <div class="d-flex flex-wrap mt-2">

                            <span style="font-family: 'Nunito', sans-serif; display:inline-flex;align-items:center;padding:3px 10px;margin-right:6px;margin-bottom:6px;border-radius:18px;background:#f5f7fa;border:1px solid #e2e8ee;font-size:12px;color:#51606d;font-weight:600; text-transform:uppercase!important;">
                                <i class="fa fa-id-card mr-1"></i>
                                <span id="rut_paciente_menu">{{ $paciente->rut }}</span>
                            </span>

                            <span style="font-family: 'Nunito', sans-serif; display:inline-flex;align-items:center;padding:3px 10px;margin-right:6px;margin-bottom:6px;border-radius:18px;background:#edf9f8;border:1px solid #d7efea;font-size:12px;color:#158982;font-weight:600; text-transform:uppercase!important;">
                                <i class="fa fa-birthday-cake mr-1"></i>
                                <span id="edad_paciente_menu">{{ $paciente->edad }}</span>
                            </span>

                            <span style="font-family: 'Nunito', sans-serif; display:inline-flex;align-items:center;padding:3px 10px;margin-bottom:6px;border-radius:18px;background:#eef3ff;border:1px solid #dce6fb;font-size:12px;color:#3f68af;font-weight:600; text-transform:uppercase!important;">
                                <i class="fa fa-shield mr-1"></i>
                                {{ $paciente->prevision->nombre }}
                            </span>

                        </div>

                    </div>

                    <input type="hidden" name="id_pruebas" id="id_pruebas" value="SI HAY PRIUEBAS">

                    <!-- PATOLOGÍAS -->
                    <div style="padding:16px;">

                        <div class="d-flex align-items-center mb-3">

                            <div style="width:24px;height:24px;border-radius:6px;background:#fff3f3;color:#dc3545;display:flex;align-items:center;justify-content:center;margin-right:8px;font-size:12px;">
                                <i class="fa fa-heartbeat"></i>
                            </div>

                            <div style="font-size:12px;font-weight:600;color:#34495e; text-transform:uppercase!important;">
                                Patologías Crónicas
                            </div>

                        </div>

                        @php
                            $hayPatologias = false;
                        @endphp

                        <div id="patologias_paciente_menu">
                        @foreach ($antecedentes as $a)

                            @if($a->estado == 1 && $a->id_tipo_antecedente == 1)

                                @php
                                    $hayPatologias = true;
                                @endphp

                                <div style="
                                    background:#fafcfd;
                                    border:1px solid #e5ebef;
                                    border-left:4px solid #60c6c4;
                                    border-radius:8px;
                                    padding:3px 6px;
                                    margin-bottom:6px;
                                    font-size:12px;
                                    font-weight:600; 
                                    font-family: 'Nunito', sans-serif;
                                    overflow-wrap: break-word;
                                    color:#43515c;
                                    text-transform:uppercase!important;">


                                    {{ $a->antecedente_data->nombre }}

                                </div>

                            @endif

                        @endforeach

                        @if(!$hayPatologias)

                            <div style="
                                padding:14px;
                                text-align:center;
                                border:1px dashed #d8e1e8;
                                border-radius:8px;
                                background:#fafcfd;
                                color:#7c8a96;
                                font-size:12px;">

                                <i class="fa fa-check-circle mr-1"></i>
                                No registra patologías crónicas.

                            </div>

                        @endif
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </nav>
@else
    <nav class="pcoded-navbar menu-light navbar-collapsed">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius img-fluid wid-100" id="profile-image"
                            src="{{ $profesional->foto_perfil ? asset('storage/' . $profesional->foto_perfil) : asset('images/iconos/usuario_profesional.svg') }}"
                            alt="User image">
                        <div class="user-details">
                            <div id="more-details">{{ @Auth::user()->name }} <i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div id="nav-user-link">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('profesional.mi_perfil') }}" data-toggle="tooltip" title="Mi perfil">
                                    <i class="feather icon-user"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                    @csrf
                                    <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger"
                                        href="javascript:{}" onclick="document.getElementById('closeSession').submit();">
                                        <i class="feather icon-power"></i>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption text-center">
                        <!--<label>Menú</label>-->
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext text-center">Mi
                                Escritorio</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('profesional.home') }}">Mi Escritorio Profesional</a></li>
                            <li><a href="{{ route('profesional.pacientes') }}">Mis pacientes</a></li>
                            <li><a href="{{ route('profesional.configuracion') }}"> Panel de Configuración</a></li>
                            <li><a href="{{ route('profesional.index_receta_online') }}">Receta Online</a></li>
                            <li><a href="{{ route('profesional.flujo_caja') }}">Flujo de Caja</a></li>
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-settings"></i>
                            </span>

                            <span class="pcoded-mtext text-center">
                                Configuraciones
                            </span>
                        </a>

                        <ul class="pcoded-submenu">
                            <li>
                                <a href="{{ route('profesional.mi_perfil') }}">
                                    Editar perfil
                                </a>
                            </li>

                            <li>
                                @if(isset($id_ficha_atencion) && !empty($id_ficha_atencion))
                                    <a href="javascript:void(0)"
                                    onclick="menuValidarSalidaFicha(
                                        '{{ route('profesional.personalizar_mi_ficha') }}',
                                        'Personalizar ficha de atención'
                                    )">
                                        Personalizar ficha de atención
                                    </a>
                                @else
                                    <a href="{{ route('profesional.personalizar_mi_ficha') }}">
                                        Personalizar ficha de atención
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-video"></i></span><span class="pcoded-mtext text-center">Tutoriales</span></a>
                        <ul class="pcoded-submenu">
                            @if($profesional->id_especialidad != 2)
                            <li><a href="https://vimeo.com/1085553533" target="_blank">Funciones Agenda</a></li>
                            @else
                            <li><a href="https://vimeo.com/1097556981/1b6c497fcc" target="_blank">Funciones Agenda Dental</a></li>
                            @endif
                            <li><a href="https://vimeo.com/1085535164" target="_blank">Receta online</a></li>
                            @if($profesional->id_especialidad != 2)
                            <li><a href="https://vimeo.com/1085574920" target="_blank">Funciones Ficha de atención</a></li>
                            @endif
                            <li><a href="https://vimeo.com/1085574269" target="_blank">Funciones Mis pacientes</a></li>
                            <li><a href="https://vimeo.com/1087894569" target="_blank">Funciones Flujo de Caja</a></li>
                            @if($profesional->id_especialidad != 2)
                            <li><a href="https://vimeo.com/1087895020" target="_blank">Funciones Transcripción <br>de exámenes</a></li>

                            @endif
                            @if($profesional->id_especialidad == 2 && $profesional->id_tipo_especialidad == 16)
                            <li><a href="https://vimeo.com/1087377134" target="_blank">Aranceles y Procedimientos<br> Dentales</a></li>
                            <li><a href="https://vimeo.com/1097556384/d872409869" target="_blank">Uso Ficha Implantología</a></li>
                            @endif
                            @if($profesional->id_especialidad == 2)
                            <li><a href="https://vimeo.com/1097556293/8e50b4f658" target="_blank">Uso TONS</a></li>
                            @endif
                            <li><a href="https://vimeo.com/1085548556" target="_blank">Descarga la App SDI</a></li>
                        </ul>
                    </li>
                </ul>
                {{-- <div id="info_cliente" class="mt-5 p-3" style="color:#1c9693; border: 1px solid  #5ebdba; margin: 8px;padding: 8px; margin-top: 125px; border-radius:15px; background-color:#d2f0f7;">
                    <h6 class="mb-3" style="font-size: 12px; font-weight: bold; color:#137370;">INFORMACION DEL PACIENTE</h6>
                    <p style="color:#137370;">{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</p>
                    <p style="color:#137370;">{{ $paciente->edad }}</p>
                    <p style="color:#137370;">{{ $paciente->rut }}</p>
                    <p style="color:#137370;">{{ $paciente->prevision->nombre }}</p>
                    <hr>
                    <h6 class="mt-3 mb-3" style="font-size: 12px; font-weight: bold; color:#137370;">PATOLOGÍAS CRONICAS</h6>
                    <ul id="listado_patologias_paciente">
                        @foreach ($antecedentes as $a)
                        @if($a->estado == 1 && $a->id_tipo_antecedente == 2)
                            <li>{{ $a->antecedente_data->nombre }}</li>
                        @endif
                         @endforeach
                    </ul>
                </div> --}}
                <div id="info_cliente" class="mt-5 p-3" style="color:#1c9693; border: 1px solid  #5ebdba; margin: 8px;padding: 8px; margin-top: 125px; border-radius:15px; background-color:#d2f0f7;">
                        <h6 class="mb-3" style="font-size: 12px; font-weight: bold; color:#137370;">INFORMACION DEL PACIENTE</h6>
                        <p style="color:#137370;">{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</p>
                        <p style="color:#137370;">{{ $paciente->edad }}</p>
                        <p style="color:#137370;">{{ $paciente->rut }}</p>
                        <p style="color:#137370;">{{ $paciente->prevision->nombre }}</p>

                        {{-- @if(isset($control_peso) && count($control_peso) > 0)
                        <p style="color:#137370;">Obesidad</p>
                        @endif
                        @if (isset($hipertension) && count($hipertension) > 0)
                        <p style="color:#137370;">Hipertensión</p>
                        @endif
                        @if (isset($diabetes) && count($diabetes) > 0)
                        <p style="color:#137370;">Diabetes</p>
                        @endif
                        @if (isset($contro) && count($contro) > 0)
                        <p style="color:#137370;">Insuficiencia renal</p>
                        @endif --}}
                        <hr>
                        <h6 class="mt-3 mb-3" style="font-size: 12px; font-weight: bold; color:#137370;">PATOLOGÍAS CRONICAS</h6>
                        <ul id="listado_patologias_paciente">
                            @foreach ($antecedentes as $a)
                            @if($a->estado == 1 && $a->id_tipo_antecedente == 1)
                                <li><span class="badge badge-success">{{ $a->antecedente_data->nombre }}</span></li>
                            @endif
                            @endforeach
                        </ul>


                    </div>
            </div>
        </div>
    </nav>
@endif

<div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmLogoutModalLabel">Confirmar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="menu_url_destino" id="menu_url_destino" value="">
                <input type="hidden" name="menu_nombre_destino" id="menu_nombre_destino" value="">
                <p>Esta por salir de la Ficha de Atención, los datos serán eliminados.</p>
                <p>¿Esta seguro que desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i>Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="menuContinuar();"><i class="feather icon-check"></i>Continuar</button>
            </div>
        </div>
    </div>
</div>

{{-- <style>
/* Ajustes para el div info_cliente cuando el menú está colapsado */
.navbar-collapsed #info_cliente {
    padding: 4px 6px !important;
    margin: 2px 2px 2px 2px !important;
    font-size: 10px !important;
    background: #d2f0f7;
    border-radius: 8px;
    min-width: 0;
    max-width: 100%;
    overflow: hidden;
    margin-top: 20px !important;
}
.navbar-collapsed #info_cliente h6,
.navbar-collapsed #info_cliente p,
.navbar-collapsed #info_cliente ul {
    font-size: 10px !important;
    margin: 0 0 2px 0 !important;
}
.navbar-collapsed #info_cliente ul {
    padding-left: 14px !important;
}
</style> --}}

<script>
    function menuValidarSalidaFicha(url, nombre)
    {
        $('#confirmLogoutModal').modal('show');
        $('#menu_url_destino').val(url);
        $('#menu_nombre_destino').val(nombre);
    }

    function menuContinuar()
    {
        var temp = $('#menu_url_destino').val();
        $('#menu_url_destino').val('');
        $('#menu_nombre_destino').val('');
        window.location.href = temp;
    }
</script>
