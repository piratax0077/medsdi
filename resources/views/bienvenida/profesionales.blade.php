
            <div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
                <div class="col-md-12 py-0 px-2 shadow-none">
                    <div class="row mx-0">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                        <div class="col-md-12">
                            <div class="row">

                            </div>
                            <!--Botones superiores-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-deck">
                                        <div class="card subir">
                                            <a onclick="bpr_lugar();" class="btn" type="button">
                                            {{-- <a href="{{ ROUTE('profesional.lugares_atencion') }}">--}}
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                                <h5 class="mt-1"> Paso 1</h5><br> <h6>Configurar Lugar de Atención </h6>
                                                </div>
                                            </a>
                                        </div>

                                       {{-- <div class="card subir">
                                            {{-- <a href="{{ ROUTE('paciente.receta') }}">
                                                <a onclick="b_asistente();" class="btn" type="button">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/usuario_asistente.svg') }}">
                                                    <h5 class="mt-1"> Paso 3</h5><br> <h6>Configurar Sus Asistentes </h6>
                                                </div>
                                            </a>
                                        </div>--}}
                                        <div class="card subir">
                                            {{-- <a href="{{ ROUTE('paciente.receta') }}">--}}
                                                <a onclick="b_perf_acad();" class="btn" type="button">
                                                <div class="card-body text-center" style="cursor:pointer">
                                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/usuario_profesional.svg') }}">
                                                    <h5 class="mt-1"> Paso 4</h5><br> <h6>Configure su Perfíl Profesional </h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-deck">
                                        <div class="card social-widget-card bg-c-info opacidad">
                                            <a href="#" class="btn" type="button">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h5 class="my-auto text-white ml-3 text-left">Baje La Aplicación SDI-PASS</h5>
                                                        <img class="wid-50 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card social-widget-card bg-c-info opacidad">
                                            <a onclick=" b_perf_util();" class="btn" type="button">
                                                <div class="card-body">
                                                    <div class="row my-auto">
                                                        <h5 class="my-auto text-white text-left">SDI le Invita Disfrutar de sus diferentes aplicaciones y utilidades</h5>
                                                        <img class="wid-50 ml-auto" src="{{ asset('images/iconos/medicamentos.svg') }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="row">
                                <div class="col-md-10">

                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary btn-sm mb-3" href="{{ route('profesional.home') }}">Acceda a su Escritorio</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Modal nuevo lugar de atención-->
                    <div id="nuevo_lugar_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_lugar_atencion" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-white text-center" id="nuevo_lugar_atencion_titulo">Agregar nuevo lugar de  atención&nbsp;</h5>

                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                </div>
                                <form action="{{ route('profesional.agregar_centro') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Nombre</label>
                                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Rut</label>
                                                    <input class="form-control form-control-sm" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" onkeyup="formatoRut(this);">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="floating-label">Direcci&oacute;n</label>
                                                    <input class="form-control form-control-sm" name="direccion_lugar_atencion"
                                                        id="direccion_lugar_atencion" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="floating-label">Depto. | Ofic.</label>
                                                    <input class="form-control form-control-sm" name="numero_lugar_atencion" id="numero_lugar_atencion"
                                                        type="text">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                                        class="form-control form-control-sm" required>
                                                        <option value="">Seleccione</option>
                                                        @foreach ($regiones as $reg)
                                                                @if (isset($regiones))
                                                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                @endif
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Ciudad</label>
                                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group ">
                                                    <label class="floating-label-activo-sm">Tipo</label>
                                                    <select id="tipo_agregar_lugar_atencion" name="tipo_agregar_lugar_atencion"
                                                        class="js-example-basic-single form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Centro Médico</option>
                                                        <option value="2">Consulta Particular</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Correo Electr&oacute;nico</label>
                                                    <input class="form-control form-control-sm" name="email_lugar_atencion" id="email_lugar_atencion"
                                                        type="email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Tel&eacute;fono</label>
                                                    <input class="form-control form-control-sm" name="telefono_lugar_atencion"
                                                        id="telefono_lugar_atencion_1" type="text">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-info btn-sm">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--Modal editar lugar de atención-->
                    <div id="editar_lugar_atencion" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="editar_lugar_atencion" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-white text-center" id="editar_lugar_atencion_titulo">Configurar lugar de atención</h5>

                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form_editar_lugar_atencion">
                                        <input type="hidden" name="id_lugar_atencion_modificar" id="id_lugar_atencion_modificar">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Nombre</label>
                                                    <input name="editar_nombre_lugar_atencion" placeholder="Ingrese Nombre"
                                                        id="editar_nombre_lugar_atencion" type="text" val="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="floating-label">Direcci&oacute;n&nbsp;/&nbsp;Calle</label>
                                                    <input name="editar_direccion_lugar_atencion" placeholder="Ingrese Direcci&oacute;n"
                                                        id="editar_direccion_lugar_atencion" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="floating-label">Depto. | Ofic.</label>
                                                    <input name="editar_numero_lugar_atencion" placeholder="Ingrese n&uacute;mero"id="editar_numero_lugar_atencion" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                                    <select id="region_lugar_atencion_modificar" onchange="buscar_ciudades();"
                                                        name="region_lugar_atencion_modificar" class="form-control" required>
                                                        <option value="0">Seleccione</option>
                                                        @foreach ($regiones as $reg)
                                                        @if (isset($regiones))
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                        @endif
                                                    @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Ciudad</label>
                                                    <select id="ciudad_lugar_atencion_modificar" name="ciudad_lugar_atencion_modificar"
                                                        class="form-control" required>
                                                        <option value="0">Seleccione</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Tipo</label>
                                                    <select id="tipo_editar_lugar_atencion" name="tipo_editar_lugar_atencion"
                                                        class="js-example-basic-single form-control">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Centro Médico</option>
                                                        <option value="2">Consulta Particular</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                    <input name="editar_email_lugar_atencion" placeholder="Ingrese Email"
                                                        id="editar_email_lugar_atencion" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                    <input name="editar_telefono_lugar_atencion" placeholder="Ingrese Tel&eacute;fono"
                                                        id="editar_telefono_lugar_atencion" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="notificar_pacientes_modificar"
                                                            name="notificar_pacientes_modificar">
                                                        <label for="notificar_pacientes_modificar" class="cr"></label>
                                                        <label>Notificar a pacientes modificación</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="button" onclick="editar_lugar_atencion();" class="btn btn-info">Guardar
                                                Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal nuevo lugar de atención-->
                    <div id="nuevo_lugar_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_lugar_atencion"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-white text-center" id="nuevo_lugar_atencion_titulo">Agregar nuevo lugar de
                                        atención&nbsp;</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                                <form action="{{ route('profesional.agregar_centro') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Nombre</label>
                                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Rut</label>
                                                    <input class="form-control form-control-sm" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" onkeyup="formatoRut(this);">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class="floating-label">Direcci&oacute;n</label>
                                                    <input class="form-control form-control-sm" name="direccion_lugar_atencion"
                                                        id="direccion_lugar_atencion" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="floating-label">Depto. | Ofic.</label>
                                                    <input class="form-control form-control-sm" name="numero_lugar_atencion" id="numero_lugar_atencion"
                                                        type="text">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                                        class="form-control form-control-sm" required>
                                                        <option value="">Seleccione</option>
                                                        @foreach ($regiones as $reg)
                                                            @if (isset($regiones))
                                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Ciudad</label>
                                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group ">
                                                    <label class="floating-label-activo-sm">Tipo</label>
                                                    <select id="tipo_agregar_lugar_atencion" name="tipo_agregar_lugar_atencion"
                                                        class="js-example-basic-single form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Centro Médico</option>
                                                        <option value="2">Consulta Particular</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Correo Electr&oacute;nico</label>
                                                    <input class="form-control form-control-sm" name="email_lugar_atencion" id="email_lugar_atencion"
                                                        type="email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Tel&eacute;fono</label>
                                                    <input class="form-control form-control-sm" name="telefono_lugar_atencion"
                                                        id="telefono_lugar_atencion_1" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="notificar_pacientes" name="notificar_pacientes">
                                                        <label for="notificar_pacientes" class="cr"></label>
                                                        <label>Notificar a pacientes</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-info btn-sm">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Modal mostrar utilidades y secciones-->
                    <div id="modal_mostrar_utilidades" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="modal_mostrar_utilidades" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content" >
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-white mt-1">FONEMA P</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard active" id="unop_tab" data-toggle="pill" href="#unop" role="tab" aria-controls="pills-home" aria-selected="true">Pato</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard" id="dosp_tab" data-toggle="pill" href="#dosp" role="tab" aria-controls="pills-home" aria-selected="true">Payaso</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard" id="tresp_tab" data-toggle="pill" href="#tresp" role="tab" aria-controls="pills-home" aria-selected="true">Pelota</a>
                                                </li>
                                                    <li class="nav-item">
                                                    <a class="nav-link-wizard " id="cuatrop_tab" data-toggle="pill" href="#cuatrop" role="tab" aria-controls="pills-home" aria-selected="true">Pera</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard" id="cincop_tab" data-toggle="pill" href="#cincop" role="tab" aria-controls="pills-home" aria-selected="true">Palmera</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard" id="seisp_tab" data-toggle="pill" href="#seisp" role="tab" aria-controls="pills-home" aria-selected="true">Cepillo</a>
                                                </li>
                                                    <li class="nav-item">
                                                    <a class="nav-link-wizard " id="sietep_tab" data-toggle="pill" href="#sietep" role="tab" aria-controls="pills-home" aria-selected="true">Chupete</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard" id="ochop_tab" data-toggle="pill" href="#ochop" role="tab" aria-controls="pills-home" aria-selected="true">Lapiz</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard" id="nuevep_tab" data-toggle="pill" href="#nuevep" role="tab" aria-controls="pills-home" aria-selected="true">Zapato</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard" id="diezp_tab" data-toggle="pill" href="#diezp" role="tab" aria-controls="pills-home" aria-selected="true">Zapallo</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tab-content" id="pills-tablas_examenes">
                                                <!--TAB 1-->
                                                <div class="tab-pane fade show active" id="unop" role="tabpanel" aria-labelledby="unop_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill"  style="text-center">
                                                                <img src="{{ asset('images\fono\fonemap\pato.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 2-->
                                                <div class="tab-pane fade show" id="dosp" role="tabpanel" aria-labelledby="dosp_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\payaso.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 3-->
                                                <div class="tab-pane fade show" id="tresp" role="tabpanel" aria-labelledby="tresp_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\pelota.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 4-->
                                                <div class="tab-pane fade show" id="cuatrop" role="tabpanel" aria-labelledby="cuatrop_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\pera.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 5-->
                                                <div class="tab-pane fade show" id="cincop" role="tabpanel" aria-labelledby="cincop_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\palmera.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 6-->
                                                <div class="tab-pane fade show" id="seisp" role="tabpanel" aria-labelledby="seisp_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\cepillo.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 7-->
                                                <div class="tab-pane fade show" id="sietep" role="tabpanel" aria-labelledby="sietep_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\chupete.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 8-->
                                                <div class="tab-pane fade show" id="ochop" role="tabpanel" aria-labelledby="ochop_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\lapiz.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 9-->
                                                <div class="tab-pane fade show" id="nuevep" role="tabpanel" aria-labelledby="nuevep_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\zapato.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TAB 10-->
                                                <div class="tab-pane fade show" id="diezp" role="tabpanel" aria-labelledby="diezp_tab">
                                                    <div class="form-row" >
                                                        <div class="col-sm-12 mt-2" >
                                                            <div class="form-group fill">
                                                                <img src="{{ asset('images\fono\fonemap\zapallo.png') }}" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-sm-3 mt-2">
                                                        <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                                        <input type="text" class="form-control form-control-sm" name="fonema_p_com" id="fonema_p_com">
                                                    </div>
                                                    <div class="col-sm-9 mt-2">
                                                        <label id="" name="" class="floating-label-activo-sm">Objetivos y Logros</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="fon_p_obj y logros" id="fon_p_obj y logros"></textarea>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Modal editar asistentes-->
                    <div id="editar_asistentes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistentes">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar
                                        asistentes</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">

                                    <div class="row" style="display: none">
                                        <span><strong>Nombre: </strong></span><span id="nombre_asistente_agregar"></span>
                                    </div>
                                    <form id="">
                                        <input type="hidden" name="mi_asistente_id_lugar_atencion" id="mi_asistente_id_lugar_atencion">
                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h6 class="text-c-blue">Escriba rut de el o la asistente que desea asociar a su lugar de
                                                    atención</h6>
                                            </div>
                                            <div id="buscar_datos_asistente" class="col-sm-6 col-md-6 mb-3">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" placeholder="Rut" name="rut_asistente" id="rut_asistente" aria-label="Rut" aria-describedby="button-addon2" onkeyup="formatoRut(this);">
                                                    &nbsp;&nbsp;
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success"
                                                            @if (isset($l)) onclick="buscar_asistente({{ $l->id }});" @endif
                                                            onclick="buscar_asistente($('#mi_asistente_id_lugar_atencion').val());"
                                                            type="button" id="button-addon2">Asociar</button>
                                                    </div>

                                                </div>
                                            </div>

                                            <div>
                                                <table class="table table-borderless table-xs" id="datos_asistente" style="display: none">
                                                    <tbody>
                                                        <tr>

                                                            <td><strong>Rut:</strong></td>
                                                            <td><span id="datos_rut_asistente"></span>
                                                                <input type="hidden" id="id_asistente_lugar_atencion"
                                                                    name="id_asistente_lugar_atencion">
                                                            </td>

                                                        </tr>
                                                        <tr>

                                                            <td><strong>Nombre:</strong></td>
                                                            <td><span id="datos_nombre_asistente"></span></td>

                                                        </tr>
                                                        <tr>

                                                            <td><strong>Correo Electr&oacute;nico:</strong></td>
                                                            <td id="datos_email_asistente"></td>

                                                        </tr>
                                                        <tr>

                                                            <td> <strong>Tel&eacute;fono:</strong></td>
                                                            <td><span id="datos_telefono_asistente"></span></td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="2">
                                                                <button id="confirmar_datos_asistente" name="confirmar_datos_asistente"
                                                                    @if (isset($l)) onclick="datos_confirmar_asistente({{ $l->id }});" @endif
                                                                    class="btn btn-success btn-sm">Confirmar
                                                                    Datos</button>
                                                                <button id="limpiar_datos_asistente" name="limpiar_datos_asistente"
                                                                    onclick="datos_limpiar_asistente();"
                                                                    class="btn btn-info btn-sm">Limpiar
                                                                    Datos</button>
                                                            <td>
                                                            </td>

                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <table id="mi_asistente_table"
                                                    class="display table table-striped table-hover dt-responsive nowrap"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Habilitar / Deshabilitar</th>
                                                            <th>Rut</th>
                                                            <th>Nombre</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer pt-2">
                                    <button type="button" class="btn btn-danger" id="cerrar_editar_asistentes1">Cancelar</button>
                                    <button type="button" id="cerrar_editar_asistentes2" class="btn btn-info">Guardar
                                        Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Modal editar horario atencion
                    <div id="modal_editar_horario_atencion" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="editar_horario_atencion" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de
                                        atenci&oacute;n</h5>
                                    <button type="button" id="cerrar_modal_editar_horario_atencion" class="close text-white" onclick=""
                                        data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form id="">
                                        <input type="hidden" name="mi_horario_id_lugar_atencion" id="mi_horario_id_lugar_atencion">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h6 class="text-c-blue mb-3">Duración</h6>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Duración de consultas médicas </label>
                                                    <select name="duracion_horario" id="duracion_horario" class="form-control form-control-sm">
                                                        <option value="0">Seleccionar</option>
                                                        <option value="00:15:00">15 minutos</option>
                                                        <option value="00:30:00">30 minutos</option>
                                                        <option value="00:45:00">45 minutos</option>
                                                        <option value="01:00:00">60 minutos</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <h6 class="text-c-blue mb-3">Horario de Atención</h6>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Tipo agenda </label>
                                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class="form-control form-control-sm">
                                                        <option value="0">Seleccione tipo Agenda</option>
                                                        <option value="1">Atención general</option>
                                                        <option value="2">Atención dental</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Día </label>
                                                    <select name="dia_horario" id="dia_horario" class=" form-control form-contro-sm">
                                                        <option value="0">Seleccione día de atención</option>
                                                        <option value="1">Lunes</option>
                                                        <option value="2">Martes</option>
                                                        <option value="3">Miércoles</option>
                                                        <option value="4">Jueves</option>
                                                        <option value="5">Viernes</option>
                                                        <option value="6">Sábado</option>
                                                        <option value="7">Domingo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Desde</label>
                                                    <select name="hora_inicio_horario" id="hora_inicio_horario" class="form-control form-control-sm">
                                                        <option value="0">Seleccione horario</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label">Hasta</label>
                                                    <select name="hora_termino_horario" id="hora_termino_horario" class=" form-control form-control-sm">
                                                        <option value="0">Seleccione horario</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-sm-12 mb-2 text-center">
                                                <button type="button" onclick="mi_horario_agregar();" class="btn btn-info btn-sm"
                                                    data-dismiss="modal">Agregar horario de
                                                    atención</button>
                                            <button type="button" id="cerrar_modal_horario2"
                                                    class="btn btn-danger btn-sm">Cancelar</button>
                                            </div>
                                            <div class="col-sm-12 mt-2 mb-2">
                                                <table id="mi_horario_table" class="table table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Desde</th>
                                                            <th class="text-center align-middle">Hasta</th>
                                                            <th class="text-center align-middle">D&iacute;a</th>
                                                            <th class="text-center align-middle">Acci&oacute;n</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" id="cerrar_modal_horario">Cancelar</button>
                                    <button type="button" class="btn btn-info btn-sm" id="cerrar_modal_horario1">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <!--Modal Antecedentes academicos-->
                    <div id="modal_agregar_academico_antec" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="modal_agregar_academico_antec" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-white text-center" id="nuevo_modal_agregar_academico_antec">Configurar Mi Perfíl Académico</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form id="">
                                        <div class="form-row" >
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Tipo Antecedente Académico</label>
                                                <select class="form-control form-control-sm" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                                                    <option value="0">Seleccionar</option>
                                                    <option value="1">TITULO PROFESIONAL </option>
                                                    <option value="2">ESPECIALIDAD </option>
                                                    <option value="3">SUBESPECIALIDAD </option>
                                                    <option value="4">OTROS </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Profesión</label>
                                                <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion" value="">
                                            </div>
                                        </div>
                                        <div class="form-row" >
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Universidad</label>
                                                <input type="text" class="form-control form-control-sm"  id="agregar_ant_academico_profesion" value="">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Año de Titulo</label>
                                                <input type="text" class="form-control form-control-sm"  id="agregar_ant_academico_profesion" value="">
                                            </div>
                                        </div>
                                        <div class="form-row" >
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm">Ciudad y País</label>
                                                <input type="text" class="form-control form-control-sm"  id="agregar_ant_academico_profesion" value="">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm">N° SUPERSALUD</label>
                                                <input type="text" class="form-control form-control-sm"  id="agregar_ant_academico_profesion" value="">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm">N° Colegio Profesional</label>
                                                <input type="text" class="form-control form-control-sm"  id="agregar_ant_academico_profesion" value="">
                                            </div>
                                        </div>
                                        <div class="form-row" >
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3 mt-2 text-center">
                                            <button type="button" onclick="guardar_antec academicos()" class="btn btn-info btn-sm" data-dismiss="modal">Agregar Antecedente</button>
                                            <button type="button" id="cerrar_convenio1" class="btn btn-danger btn-sm">Cancelar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        




