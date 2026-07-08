<!--DETALLE GARANTÍA-->
<div class="modal fade" id="detallegarantia" tabindex="-1" role="dialog" aria-labelledby="detallegarantia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-white border-bottom">
                <div>
                    <h6 class="mb-0 mt-2 f-22 font-weight-bold text-dark">
                        <i class="feather icon-file-text icono-primary"></i> <span id="modal_garantia_titulo">Detalle de Garantía</span>
                    </h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_detallegarantia();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="feather icon-user"></i> Información del Paciente</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Nombre:</strong> <span id="detalle_paciente_nombre"></span></p>
                                        <p class="mb-2"><strong>RUT:</strong> <span id="detalle_paciente_rut"></span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Email:</strong> <span id="detalle_paciente_email"></span></p>
                                        <p class="mb-2"><strong>Teléfono:</strong> <span id="detalle_paciente_telefono"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="feather icon-user-check"></i> Información del Profesional</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Nombre:</strong> <span id="detalle_profesional_nombre"></span></p>
                                        <p class="mb-2"><strong>RUT:</strong> <span id="detalle_profesional_rut"></span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Especialidad:</strong> <span id="detalle_profesional_especialidad"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="feather icon-calendar"></i> Información de la Atención</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Fecha de Atención:</strong> <span id="detalle_fecha_atencion"></span></p>
                                        <p class="mb-2"><strong>Hora de Atención:</strong> <span id="detalle_hora_atencion"></span></p>
                                        <p class="mb-2"><strong>Tipo de Bono:</strong> <span id="detalle_tipo_bono"></span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Convenio:</strong> <span id="detalle_convenio"></span></p>
                                        <p class="mb-2"><strong>Valor Garantía:</strong> <span id="detalle_valor_garantia"></span></p>
                                        <p class="mb-2"><strong>Tiempo de Espera:</strong> <span id="detalle_tiempo_espera"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="feather icon-clock"></i> Estado de la Garantía</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Fecha de Vencimiento:</strong> <span id="detalle_fecha_vencimiento"></span></p>
                                        <p class="mb-2"><strong>Estado:</strong> <span id="detalle_estado_garantia"></span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Días Restantes:</strong> <span id="detalle_dias_restantes"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12" id="detalle_hora_medica_container" style="display: none;">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="feather icon-activity"></i> Información de la Hora Médica</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Fecha Hora Médica:</strong> <span id="detalle_fecha_hora_medica"></span></p>
                                        <p class="mb-2"><strong>Hora:</strong> <span id="detalle_hora_medica"></span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Estado Hora:</strong> <span id="detalle_estado_hora"></span></p>
                                        <p class="mb-2"><strong>Observaciones:</strong> <span id="detalle_observaciones_hora"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrar_detallegarantia();">Cerrar</button>
            </div>
        </div>
    </div>
</div>
