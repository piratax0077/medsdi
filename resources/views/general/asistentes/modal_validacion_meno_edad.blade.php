<div id="modal_validacion_menor_edad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Recepcion de bonos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Validacion para Atencion de Menor de Edad</h5>
                <button type="button" class="close close_modal_validacion_menor_edad" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pb-0">
                {{--  BOTONES  --}}
                <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-bonos" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-modal active" id="pills-tab-validacion-app" data-toggle="pill" href="#pills-validacion-app" role="tab" aria-controls="pills-home" aria-selected="true">Validación por APP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modal" id="pills-tab-validacion-manual" data-toggle="pill" href="#pills-validacion-manual" role="tab" aria-controls="pills-validacion-manual" aria-selected="false">Validacion Manual</a>
                    </li>
                </ul>
                {{--  PESTAÑAS  --}}
                <div class="tab-content" id="pills-tabContent-validacion-menor-edad">
                    {{--  PESTAÑA DE VALIDACION APP  --}}
                    <div class="tab-pane fade show active" id="pills-validacion-app" role="tabpanel" aria-labelledby="pills-tab-validacion-app">
                        <div class="form-row">
                            <input type="hidden" name="validacion_menor_edad_hora_medica" id="validacion_menor_edad_hora_medica" value="">

                            <input type="hidden" name="validacion_menor_edad_id_paciente" id="validacion_menor_edad_id_paciente" value="">
                            <input type="hidden" name="validacion_menor_edad_id_paciente_user" id="validacion_menor_edad_id_paciente_user" value="">


                            <input type="hidden" name="validacion_menor_edad_id_responsable" id="validacion_menor_edad_id_responsable" value="">
                            <input type="hidden" name="validacion_menor_edad_id_responsable_user" id="validacion_menor_edad_id_responsable_user" value="">


                            <input type="hidden" name="validacion_menor_edad_id_profesional" id="validacion_menor_edad_id_profesional" value="">
                            <input type="hidden" name="validacion_menor_edad_id_profesional_id_usuario" id="validacion_menor_edad_id_profesional_id_usuario" value="">


                            validacion_menor_edad_paciente_rut
                            validacion_menor_edad_paciente_nombre
                            validacion_menor_edad_paciente_edad

                            validacion_menor_edad_responsable_rut
                            validacion_menor_edad_responsable_nombre

                            validacion_menor_edad_profesional_nombre
                            validacion_menor_edad_profesional_rut

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
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm"> Nombre Profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="bono_profesional_nombre" id="bono_profesional_nombre">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm"> Rut Profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="bono_profesional_rut" id="bono_profesional_rut">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Clase Pago</label>
                                    <select id="bono_id_clase_bono" name="bono_id_clase_bono" class="form-control form-control-sm">
                                        <option value="1">Emitido por Institucion</option>
                                        <option value="2">Váucher</option>
                                        <option value="3">Caja Vecina</option>
                                        <option value="4">Bono Web</option>
                                        <option value="5">Bono Web Pre-Pago</option>
                                        <option value="6">Particular</option>
                                        <option value="7">COPAGO Fonasa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                    <input type="text" class="form-control form-control-sm" name="bono_numero" id="bono_numero" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select id="bono_prevision" name="bono_prevision" class="form-control form-control-sm">
                                        <option value="0">Selecione una opción</option>
                                        @foreach ($prevision as $prev)
                                            <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Valor total</label>
                                    <input name="bono_valor_consulta" id="bono_valor_consulta" type="number" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
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
                            </div>
                        </div>
                    </div>

                    {{--  PESTAÑA DE VALIDACION MANUAL  --}}
                    <div class="tab-pane fade" id="pills-validacion-manual" role="tabpanel" aria-labelledby="pills-tab-validacion-manual">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="person" class="form-control form-control-sm" name="venta_rut" id="venta_rut">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nº de serie carne</label>
                                    <input type="text" class="form-control form-control-sm" name="venta_serie" id="venta_serie">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" name="venta_nombre" id="venta_nombre">
                                    <input type="hidden" class="form-control form-control-sm" name="venta_paciente_nombre" id="venta_paciente_nombre">
                                    <input type="hidden" class="form-control form-control-sm" name="venta_paciente_apellido_uno" id="venta_paciente_apellido_uno">
                                    <input type="hidden" class="form-control form-control-sm" name="venta_paciente_apellido_dos" id="venta_paciente_apellido_dos">
                                    <input type="hidden" class="form-control form-control-sm" name="venta_paciente_email" id="venta_paciente_email">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Previsión</label>
                                    <select id="venta_prevision" name="venta_prevision" class="form-control form-control-sm">
                                        <option value="0">Selecione una opción</option>
                                        @foreach ($prevision as $prev)
                                            <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6" id="div_btn_pedir_autorizacion">
                                <div class="form-group fill">
                                    <button type="button" onclick="conectar_api();" class="btn btn-info btn-sm has-ripple">Pedir Autorización</button>
                                </div>
                            </div>

                            {{-- seccion autorizado --}}
                            <div class="venta_autorizada row" style="display: none;">

                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Folio</label>
                                        <input type="number" class="form-control form-control-sm" name="venta_folio" id="venta_folio">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Valor Bono</label>
                                        <input type="number" class="form-control form-control-sm" name="venta_valor_consulta" id="venta_valor_consulta">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Valor Bonificación</label>
                                        <input type="number" class="form-control form-control-sm" name="venta_valor_pagar" id="venta_valor_pagar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Aporte Seguro</label>
                                        <input type="number" class="form-control form-control-sm" name="venta_valor_seguro" id="venta_valor_seguro">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Valor a pagar</label>
                                        <input type="number" class="form-control form-control-sm" name="venta_valor_copago" id="venta_valor_copago">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <button type="button" class="btn btn-info btn-sm has-ripple left-0" onclick="pago_venta_bono();">Generar Bono de Atención</button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group fill text-left">
                                    <button type="button" class="btn btn-danger btn-sm has-ripple " data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
