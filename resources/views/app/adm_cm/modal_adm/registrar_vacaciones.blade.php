 <!-- Modal Registrar Vacaciones -->
    <div class="modal fade" id="modal_registrar_vacaciones" tabindex="-1" role="dialog" aria-labelledby="modalVacacionesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalVacacionesLabel">
                        <i class="feather icon-calendar"></i> Registrar Vacaciones
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_vacaciones">
                        <input type="hidden" id="id_profesional_vacaciones" name="id_profesional">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>Profesional:</strong> <span id="nombre_profesional_vacaciones"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicio_vacaciones">Fecha de Inicio <span class="text-danger">*</span></label>
                                    <input type="date"
                                           class="form-control"
                                           id="fecha_inicio_vacaciones"
                                           name="fecha_inicio"
                                           required
                                           onchange="calcularDiasVacaciones()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_fin_vacaciones">Fecha de Fin <span class="text-danger">*</span></label>
                                    <input type="date"
                                           class="form-control"
                                           id="fecha_fin_vacaciones"
                                           name="fecha_fin"
                                           required
                                           onchange="calcularDiasVacaciones()">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success text-center">
                                    <strong>Total de días:</strong> <span id="total_dias_vacaciones">0 días</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones_vacaciones">Observaciones</label>
                                    <textarea class="form-control"
                                              id="observaciones_vacaciones"
                                              name="observaciones"
                                              rows="3"
                                              placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="notificar_profesional"
                                               name="notificar_profesional"
                                               checked>
                                        <label class="custom-control-label" for="notificar_profesional">
                                            Notificar al profesional por correo electrónico
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-primary" onclick="guardarVacaciones()">
                        <i class="feather icon-save"></i> Guardar Vacaciones
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal Registrar Vacaciones -->
