<div id="editar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Editar Datos de Contrato Adm</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                        <input type="hidden" name="edit_empleado_id_institucion" id="edit_empleado_id_institucion" value="{{ $institucion->id }}">
                        <input type="hidden" name="edit_empleado_id_lugar_atencion" id="edit_empleado_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
                        <input type="hidden" name="edit_empleado_id_admin_creador" id="edit_empleado_id_admin_creador" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="edit_empleado_id_tipo_admin_creador" id="edit_empleado_id_tipo_admin_creador" value="{{ Auth::user()->Roles()->first()->id }}">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="edit_info-tipo_contrato-tab" data-toggle="tab" href="#edit_info-tipo_contrato" role="tab" aria-controls="edit_info-tipo_contrato" aria-selected="true">Tipo Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_info_personal_cont-tab" data-toggle="tab" href="#edit_info_personal_cont" role="tab" aria-controls="edit_info_personal_cont" aria-selected="false">Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_info_contrato_pers-tab" data-toggle="tab" href="#edit_info_contrato_pers" role="tab" aria-controls="edit_info_contrato_pers" aria-selected="false">Información de Contrato</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="edit_horario_contrato-tab" data-toggle="tab" href="#edit_horario_contrato" role="tab" aria-controls="edit_horario_contrato" aria-selected="false">Horario</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="info-ingreso">
                                <!---->
                                <div class="tab-pane fade show active" id="edit_info-tipo_contrato" role="tabpanel" aria-labelledby="edit_info-tipo_contrato-tab">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                        <select class="form-control form-control-sm" name="edit_empleado_tipo_contrato" id="edit_empleado_tipo_contrato">
                                            <option value="">Seleccione</option>
                                            @if ($lista_tipo_contrato)
                                                @foreach ($lista_tipo_contrato as $item)
                                                    <option value="{{ $item['nombre'] }}" data-id="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                                @endforeach
                                            @endif
                                            {{--  asistente tipo  --}}
                                            {{--  tipo institucion  --}}
                                            {{--  tipo administrador  --}}
                                        </select>
                                    </div>
                                </div>
                                    <!--INFO PERSONAL-->
                                <div class="tab-pane fade show" id="edit_info_personal_cont" role="tabpanel" aria-labelledby="edit_info_personal_cont-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">INFORMACIÓN Y DATOS DE CONTACTO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">RUT:</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_rut" id="edit_empleado_rut" value="">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Nombres</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_nombre" id="edit_empleado_nombre">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_uno" id="edit_empleado_apellido_uno">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_dos" id="edit_empleado_apellido_dos">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Sexo</label>
                                                <select class="form-control form-control-sm" name="edit_empleado_sexo" id="edit_empleado_sexo">
                                                    <option value="">Seleccione</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_nacimiento" id="edit_empleado_fecha_nacimiento">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Email:</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_email" id="edit_empleado_email">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_telefono" id="edit_empleado_telefono">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select class="form-control form-control-sm" name="edit_empleado_region" id="edit_empleado_region" onchange="buscar_ciudad_nuevo_empleado();">
                                                    <option value="">Seleccione</option>
                                                    @if($regiones)
                                                        @foreach ($regiones as $reg )
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                <select class="form-control form-control-sm" name="edit_empleado_ciudad" id="edit_empleado_ciudad">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_direccion" id="edit_empleado_direccion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Número</label>
                                                <input type="text" class="form-control form-control-sm" name="edit_empleado_numero" id="edit_empleado_numero">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="edit_info_contrato_pers" role="tabpanel" aria-labelledby="edit_info_contrato_pers-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">INFORMACIÓN Y DATOS DEL CONTRATO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Inicio</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_inicio" id="edit_empleado_fecha_inicio">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Fecha Termino</label>
                                                <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_termino" id="edit_empleado_fecha_termino">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6"style="text-align:right">
                                                <label  class="cr">Indefinido</label>
                                                <input type="hidden" id="add_cont_indefinido" name="add_cont_indefinido" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_empleado_check_contrato_indef', 'add_cont_indefinido', ' ');" id="edit_empleado_check_contrato_indef" name="edit_empleado_check_contrato_indef" value="">
                                                    <label for="edit_empleado_check_contrato_indef" class="cr"></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Monto Imponible</label>
                                                <input type="number" class="form-control form-control-sm" name="edit_empleado_monto_imponible" id="edit_empleado_monto_imponible">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label  class="floating-label-activo-sm">Locomoción</label>
                                               <input type="hidden" id="edit_empleado_locomocion" name="edit_empleado_locomocion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_empleado_check_locomocion', 'edit_empleado_locomocion', 'edit_empleado_locomocion_porcentaje');" id="edit_empleado_check_locomocion" name="edit_empleado_check_locomocion" value="">
                                                    <label for="edit_empleado_check_locomocion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_locomocion_porcentaje" id="edit_empleado_locomocion_porcentaje" value="N/A">
                                            </div>


                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Colación</label>
                                                 <input type="hidden" id="edit_empleado_colacion" name="edit_empleado_colacion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_empleado_check_colacion', 'edit_empleado_colacion', 'edit_empleado_colacion_porcentaje');" id="edit_empleado_check_colacion" name="edit_empleado_check_colacion" value="">
                                                    <label for="edit_empleado_check_colacion" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_colacion_porcentaje" id="edit_empleado_colacion_porcentaje" value="N/A">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Asignación Familar</label>
                                                <input type="hidden" id="edit_empleado_asignacion_familiar" name="edit_empleado_asignacion_familiar" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_empleado_check_asignacion_familiar', 'edit_empleado_asignacion_familiar', 'edit_empleado_asignacion_familiar_cantidad');" id="edit_empleado_check_asignacion_familiar" name="edit_empleado_check_asignacion_familiar" value="">
                                                    <label for="edit_empleado_check_asignacion_familiar" class="cr"></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_asignacion_familiar_cantidad" id="edit_empleado_asignacion_familiar_cantidad" value="N/A">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label class="floating-label-activo-sm">Cajas de Compensación</label>
                                                <input type="hidden" id="edit_empleado_caja_compensacion" name="edit_empleado_caja_compensacion" value="0">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" onchange="activar_check('edit_empleado_check_caja_compensacion', 'edit_empleado_caja_compensacion', 'edit_empleado_caja_compensacion_porcentaje');" id="edit_empleado_check_caja_compensacion" name="edit_empleado_check_caja_compensacion" value="">
                                                    <label for="edit_empleado_check_caja_compensacion" class="cr"></label>
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <input type="number" disabled="disabled" class="form-control form-control-sm" name="edit_empleado_caja_compensacion_porcentaje" id="edit_empleado_caja_compensacion_porcentaje" value="N/A">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--INFO CONTRATO-->
                                <div class="tab-pane fade show" id="edit_horario_contrato" role="tabpanel" aria-labelledby="edit_horario_contrato-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 mb-2">
                                                <h6 class="text-c-blue">HORARIO DE TRABAJO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Días de Trabajo</label>
                                                <select class="js-example-basic-multiple" name="edit_empleado_dias_laborales" id="edit_empleado_dias_laborales" multiple="multiple">
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miercoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                    <option value="6">Sabado</option>
                                                    <option value="7">Domingo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora entrada</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_entrada" name="edit_empleado_hora_entrada" value="08:00">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora salida</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_salida" name="edit_empleado_hora_salida" value="19:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora Inicio Colación</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_entrada_colacion" name="edit_empleado_hora_entrada_colacion" value="12:00">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                <label class="floating-label-activo-sm">Hora término colación</label>
                                                <input type="time" class="form-control form-control-sm" id="edit_empleado_hora_salida_colacion" name="edit_empleado_hora_salida_colacion" value="13:00">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info">Guardar </button>
                <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editar_datos_asistente() {
        $('#editar_asistente_cm').modal('show');
    }

</script>
