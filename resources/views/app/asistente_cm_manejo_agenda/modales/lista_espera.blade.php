<div class="modal fade" id="m_lista_espera" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_lista_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Lista de Espera profesional....</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="clasificacion" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal active" id="lista_espera_tab" data-toggle="pill" href="#lista_espera" role="tab" aria-controls="lista_espera" aria-selected="true">Lista de Espera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="inscribir_lista_espera_tab" data-toggle="pill" href="#inscribir_lista_espera" role="tab" aria-controls="inscribir_lista_espera" aria-selected="false">Inscribir</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="lista_espera" role="tabpanel" aria-labelledby="lista_espera_tab">
                                <div class="row mt-2">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <h5 class="text-info">Lista de Espera</h5>
                                        <hr class="mt-0">
                                    </div>
                                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugares_atencion->id }}">
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs text-wrap" style="width:100%">
                                                <tbody>
                                                {{--  @foreach ($horas as $hm )  --}}
                                                {{--  {{ $hm->id }}  --}}
                                                    <tr>
                                                        <th class="align-left">RUT</th>
                                                        <th class="align-left">NOMBRE</th>
                                                        <th class="align-left">APELLIDOS</th>
                                                        <th class="align-left">EMAIL</th>
                                                        <th class="align-left">TELÉFONO</th>
                                                        <th class="align-left">ACCIÓN</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-left">6187674-K</td>
                                                        <td class="align-left">JAIME</td>
                                                        <td class="align-left">KRIMAN</td>
                                                        <td class="align-left">JKRIMAN@GMAIL.COM</td>
                                                        <td class="align-left">+56995474660</td>
                                                        <td class="align-left">

                                                            <div class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Confirmar" onclick="confirmar_hora('','Telefonica');">
                                                                <!-- <i class="feather icon-activity"></i> -->
                                                                C
                                                            </div>
                                                            <div class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="Cancelar" onclick="cancelar_hora('','Telefonica');">
                                                                <!-- <i class="feather icon-edit"></i> -->
                                                                CN
                                                            </div>
                                                            {{--  @if(!empty($hm->notificacionesconfirmacion))  --}}
                                                            <div class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"data-placement="top" title="No contesta" onclick="no_contesta('', '', 'Telefonica');">
                                                                <!-- <i class="feather icon-edit"></i> -->
                                                                NoC
                                                            </div>
                                                            {{--  @else  --}}

                                                            {{--  @endif
                                                        @endforeach  --}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--TAB 2  -->
                            <div class="tab-pane fade" id="inscribir_lista_espera" role="tabpanel" aria-labelledby="inscribir_lista_espera_tab">
                                <div class="row mt-2">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row div_rut_buscar">
                                        <div class="col-sm-8 col-md-8 mb-3">
                                            <form id="validacion_rut_form">
                                                <div class="form-group" id="validacion_rut_div">
                                                    <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-4 col-md-4 mb-3">
                                            <button class="btn btn-info" onclick="buscar_paciente();" type="button"id="button-addon2">
                                                Buscar
                                            </button>
                                        </div>
                                    </div>

                                    <form id="form_reseva_de_horas">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="">
                                        <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">

                                        <input type="hidden" name="fecha" id="fecha">

                                        <div id="reserva_datos_paciente" class="row mx-3">
                                            <table class="table table-borderless table-xs">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Rut</strong>
                                                            <td><span id="reserva_rut_paciente"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Nombre</strong>
                                                            <td><span id="reserva_hora_nombre"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Fecha Nacimiento</strong>
                                                            <td><span id="reserva_fecha_nacimiento"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Sexo</strong>
                                                            <td><span id="reserva_sexo"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Convenio</strong>
                                                            <td><span id="reserva_convenio"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Dirección</strong>
                                                            <td><span id="reserva_direccion"></span></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Correo Electrónico</strong>
                                                            <td id="reserva_hora_email"></td>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <strong>Teléfono</strong>
                                                            <td><span id="reserva_hora_telefono"></span></td>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label">Descripción Reserva</label>
                                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="button" onclick="agendar_hora();" class="btn btn-info">Agendar Hora</button>
                                            </div>
                                        </div>

                                        <div id="reserva_agregar_paciente_hora">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="alert alert-danger" role="alert">
                                                        Paciente no registrado, complete los datos para registrar al paciente
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                        <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Sexo</label>
                                                        <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                            <option value="F">Femenino</option>
                                                            <option value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                        <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                            @if (isset($prevision))
                                                                @foreach ($prevision as $p)
                                                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                        <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                                        <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                                    </div>
                                                </div>


                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Region</label>
                                                        <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                                            <option value="0">Seleccione Regio&oacute;n</option>
                                                            @if (isset($region))
                                                                @foreach ($region as $reg)
                                                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                        <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                                            <option value="0">Seleccione Ciudad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                        <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                                        <span id="mensaje_email_reserva" style="display:none"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                        <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                                        <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <h6 class="text-c-blue ml-2 mb-3">Enviar confirmaci&oacute;n</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                                            <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                                            <label class="custom-control-label" for="sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" id="cerrar_registro_paciente_hora" data-dismiss="modal">Cancelar</button>
                                                <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                                    Tomar Hora
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger align-middle" onclick="cerrarModal()"; data-dismiss="modal">Cerrar Modal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function lista_espera() {
        $('#m_lista_espera').modal('show');
    }
    function cerrarModal() {
        $('#m_lista_espera').modal('hide');
    }
</script>
