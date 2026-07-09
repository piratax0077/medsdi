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

                            {{-- Si el profesional también es administrador de laboratorio --}}
                            @if(isset($institucion) && $institucion && $institucion->id_tipo_institucion == 3)
                            <li><a onclick="menuValidarSalidaFicha('{{ route('laboratorio.adm_general.home') }}','Escritorio Laboratorio');"><i class="feather icon-briefcase mr-2"></i>Escritorio Laboratorio</a></li>
                            @endif

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
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-settings"></i></span><span class="pcoded-mtext text-center">Configuraciones</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('profesional.mi_perfil') }}"><i class="feather icon-user mr-2"></i>Editar Perfil</a></li>
                            <li><a href="{{ route('profesional.facturacion') }}"><i class="feather icon-file-text mr-2"></i>Mi Plan y Facturación</a></li>
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-video"></i></span><span class="pcoded-mtext text-center">Tutoriales</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="https://vimeo.com/1099846864" target="_blank">Ingreso al sistema</a></li>
                            <li><a href="https://vimeo.com/1099846927" target="_blank">Panel de Configuración</a></li>
                            <li><a href="https://vimeo.com/1085574920" target="_blank">Como atender un paciente</a></li>
                            <li><a href="https://vimeo.com/user225949606" target="_blank">Módulo mis pacientes</a></li>
                            <li><a href="https://vimeo.com/1085553533" target="_blank">Funciones Agenda</a></li>
                            <li><a href="https://vimeo.com/1085535164" target="_blank">Receta online</a></li>
                            <li><a href="https://vimeo.com/1085574920" target="_blank">Funciones Ficha de atención</a></li>
                            <li><a href="https://vimeo.com/1085574269" target="_blank">Funciones Mis pacientes</a></li>
                            <li><a href="https://vimeo.com/1087894569" target="_blank">Funciones Flujo de Caja</a></li>
                            <li><a href="https://vimeo.com/1087895020" target="_blank">Funciones Transcripción <br>de exámenes</a></li>
                            <li><a href="https://vimeo.com/1085548556" target="_blank">Descarga la App SDI</a></li>
                            @if(isset($profesional))
                                @if($profesional->id_tipo_especialidad == 31 )
                                <li><a href="https://drive.google.com/file/d/1YCYuVsPCTAcAu0rzY-CHGNIiydxGvs_4/view" target="_blank">Uso Ficha Nutrición</a></li>
                                @endif
                            @endif
                            <!--<li><a href="https://vimeo.com/1087377134" target="_blank">Aranceles y Procedimientos<br> Dentales</a></li>-->

                        </ul>
                    </li>
                    <div id="info_cliente" class="mt-5 p-3" style="color:#1c9693; border: 1px solid  #5ebdba; margin: 8px;padding: 8px; margin-top: 125px; border-radius:15px; background-color:#d2f0f7; width: 200px;">
                        <h6 class="mb-3" style="font-size: 12px; font-weight: bold; color:#137370;">INFORMACION DEL PACIENTE</h6>
                        <p style="color:#137370;" class="text-uppercase">{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</p>
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
                        @if(isset($antecedentes) && count($antecedentes) > 0)
                        <h6 class="mt-3 mb-3" style="font-size: 12px; font-weight: bold; color:#137370;">PATOLOGÍAS CRONICAS</h6>
                        <ul id="listado_patologias_paciente">
                            @foreach ($antecedentes as $a)
                            @if($a->estado == 1 && $a->id_tipo_antecedente == 2)
                                <li>{{ $a->antecedente_data->nombre }}</li>
                            @endif
                            @endforeach
                        </ul>
                        @endif

                    </div>
                </ul>
            </div>
        </div>
    </nav>
@else
    <nav class="pcoded-navbar menu-light navbar-collapsed">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div">
                <div class="">
                    <div class="main-menu-header">
                        @if(isset($profesional) && $profesional->foto_perfil)
                        <img class="img-radius img-fluid wid-100" id="profile-image"
                                                        src="{{ $profesional->foto_perfil ? asset('storage/' . $profesional->foto_perfil) : asset('images/iconos/usuario_profesional.svg') }}"
                                                        alt="User image">
                        @else
                        <img class="img-radius img-fluid wid-100" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="User image">
                        @endif
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

                            {{-- Si el profesional también es administrador de laboratorio --}}
                            @if(isset($institucion) && $institucion->id_tipo_institucion == 3)
                            <li><a href="{{ route('laboratorio.adm_general.home') }}"><i class="feather icon-briefcase mr-2"></i>Escritorio Laboratorio</a></li>
                            @endif

                            <li><a href="{{ route('profesional.pacientes') }}">Mis pacientes</a></li>
                            <li><a href="{{ route('profesional.configuracion') }}"> Panel de Configuración</a></li>
                            <li><a href="{{ route('profesional.index_receta_online') }}">Receta Online</a></li>
                            <li><a href="{{ route('profesional.flujo_caja') }}">Flujo de Caja</a></li>
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-settings"></i></span><span class="pcoded-mtext text-center">Configuraciones</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('profesional.mi_perfil') }}"><i class="feather icon-user mr-2"></i>Editar Perfil</a></li>
                            @if(isset($profesional))
                            <li><a href="{{ route('profesional.facturacion') }}"><i class="feather icon-file-text mr-2"></i>Mi Plan y Facturación</a></li>
                            @endif
                            @if(isset($profesional))
                            <li><a href="javascript:void(0)" onclick="imprimir_tarjeta_presentacion_profesional({{ $profesional->id }})"><i class="feather icon-credit-card mr-1"></i>Tarjeta de Presentaci&#243;n</a></li>
                            @endif
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
                    @if(isset($profesional))
                     <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-video"></i></span><span class="pcoded-mtext text-center">Tutoriales</span></a>
                        <ul class="pcoded-submenu">
                            @if($profesional->id_especialidad == 2)
                            <li><a href="https://vimeo.com/1127713818" target="_blank">Primer Paso (lugar atención)</a></li>
                            @endif
                            <li><a href="https://vimeo.com/1099846927" target="_blank">Panel de Configuración</a></li>
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
                            <li><a href="https://vimeo.com/1085548556" target="_blank">Descarga la App SDI</a></li>
                            @endif
                            @if($profesional->id_especialidad == 2 && $profesional->id_tipo_especialidad == 16)
                            <li><a href="https://vimeo.com/1087377134" target="_blank">Aranceles y Procedimientos<br> Dentales</a></li>
                            <li><a href="https://vimeo.com/1097556384/d872409869" target="_blank">Uso Ficha Implantología</a></li>
                            @endif
                            @if($profesional->id_tipo_especialidad == 31 )
                            <li><a href="https://drive.google.com/file/d/1YCYuVsPCTAcAu0rzY-CHGNIiydxGvs_4/view" target="_blank">Uso Ficha Nutrición</a></li>
                            @endif
                            @if($profesional->id_especialidad == 2)
                            <li><a href="https://vimeo.com/1097556293/8e50b4f658" target="_blank">Uso TONS</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                </ul>
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

    function imprimir_tarjeta_presentacion_profesional(id) {
        var url = '{{ route("profesional.tarjeta_presentacion", "__ID__") }}'.replace('__ID__', id);
        window.open(url, '_blank', 'width=900,height=700,scrollbars=yes');
    }
</script>
