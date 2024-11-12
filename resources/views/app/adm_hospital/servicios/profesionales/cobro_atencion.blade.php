<div id="m_cobro_urgencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cobro_urgencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_pago_consulta_title">recaudación</h5>
                <button type="button" class="close close_modal_recepcion_bonos_api" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pb-0">
                {{--  BOTONES  --}}
                <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-bonos" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-modal active" id="pills-tab-recibir-bono" data-toggle="pill" href="#pills-recibir-bono" role="tab" aria-controls="pills-home" aria-selected="true">Información de recaudación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modal" id="pills-venta-tab" data-toggle="pill" href="#pills-venta" role="tab" aria-controls="pills-venta" aria-selected="false">Apreciación de Triage e Ingreso</a>
                    </li>
                </ul>
                <form id="ingreso_paciente">
                    {{--  PESTAÑAS  --}}
                    <div class="tab-content" id="pills-tabContent-interconsulta">
                        {{--  PESTAÑA DE RECIBIR PAGO  --}}
                        <div class="tab-pane fade show active" id="pills-recibir-bono" role="tabpanel" aria-labelledby="pills-tab-recibir-bono">
                            <div class="form-row">
                                <input type="hidden" name="bono_hora_medica" id="bono_hora_medica">
                                <input type="hidden" name="bono_id_profesional" id="bono_id_profesional">
                                <input type="hidden" name="bono_id_paciente" id="bono_id_paciente">
                                <input type="hidden" name="bono_id_tipo_bono" id="bono_id_tipo_bono" value="1">
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Rut del Paciente</label>
                                        <input type="person" class="form-control form-control-sm" name="bono_paciente_rut" id="bono_paciente_rut">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Nombre del Paciente</label>
                                        <input type="text" class="form-control form-control-sm" name="bono_paciente_nombre" id="bono_paciente_nombre">
                                    </div>
                                </div>
                                <div class="d-none">
                                    <div class="col-sm-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm"> Servicio Urgencia</label>
                                            <input type="text" class="form-control form-control-sm" name="bono_profesional_nombre" id="bono_profesional_nombre">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm"> Rut Establecimiento</label>
                                            <input type="text" class="form-control form-control-sm" name="bono_profesional_rut" id="bono_profesional_rut">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Clase Pago</label>
                                        <select id="bono_id_clase_bono" name="bono_id_clase_bono" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Seguro Escolar</option>
                                            <option value="2">Seguro Accidentes de Vehiculos</option>
                                            <option value="3">Seguro Accidente del Trabajo</option>
                                            <option value="4">Particular</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Programas especiales</label>
                                        <select id="bono_id_programas_especiales" name="bono_id_programas_especiales" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Programa 1</option>
                                            <option value="2">Programa 2</option>
                                            <option value="3">Programa 3</option>
                                            <option value="4">Programa 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Previción</label>
                                        <select id="bono_prevision" name="bono_prevision" class="form-control form-control-sm">
                                            <option value="0">Selecione una opción</option>
                                            <option value="1">Fonasa</option>
                                            <option value="2">Banmédica</option>
                                            <option value="3">Isalud</option>
                                            <option value="4">Colmena Golden Cross</option>
                                            <option value="5">Consalud</option>
                                            <option value="6">Cruz Blanca</option>
                                            <option value="7">Cruz del Norte</option>
                                            <option value="8">Nueva Masvida</option>
                                            <option value="9">Fundación</option>
                                            <option value="10">Vida Tres</option>
                                            <option value="11">Codelco</option>
                                            <option value="12">Control sin costo</option>
                                            <option value="13">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Valor total</label>
                                        <input name="bono_valor_consulta" id="bono_valor_consulta" type="number" class="form-control form-control-sm">
                                    </div>
                                </div>

                                {{--  <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="recepcion_programa">
                                            <label for="recepcion_programa" class="cr"></label>
                                        </div>
                                        <label>Recepción de programa</label>
                                    </div>
                                    <div class="form-group" id="sesiones_programa" style="display:none">
                                        <label class="floating-label">Nº de Sesiones</label>
                                        <input name="bono_sn_sesiones" id="bono_sn_sesiones" type="number" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group text-center my-2 pb-2">
                                        <div onclick="recepcion_pago();" class="btn btn-success">Recepcionar</div>
                                    </div>
                                </div>  --}}
                            </div>
                        </div>
                        {{--  PESTAÑA DE VENTA DE BONO  --}}
                        <div class="tab-pane fade" id="pills-venta" role="tabpanel" aria-labelledby="pills-venta-tab">
                            <div class="form-row">
                                <input type="hidden" name="hora_ingreso" id="hora_ingreso">
                                <input type="hidden" name="nombre_paciente" id="nombre_paciente">
                                <input type="hidden" name="fono_contacto" id="fono_contacto">
                                <input type="hidden" name="tipo de cobro" id="tipo de cobro" value="1">
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Apreciación de gravedad</label>
                                        <select id="bono_id_apreciacion_gravedad" name="bono_id_apreciacion_gravedad" class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            <option value="1">C-1</option>
                                            <option value="2">C-2</option>
                                            <option value="3">C-3</option>
                                            <option value="4">C-4</option>
                                            <option value="5">C-5</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <button type="submit" class="btn btn-info btn-sm has-ripple left-0">Ingresar Paciente</button>
                                        {{--  <button type="button" class="btn btn-danger btn-sm has-ripple " data-dismiss="modal">Cerrar</button>  --}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill text-left">
                                        {{--  <button type="submit" class="btn btn-info btn-sm has-ripple">Pagar Atención Médica</button>  --}}
                                        <button type="button" class="btn btn-danger btn-sm has-ripple " data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
