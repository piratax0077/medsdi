    <!-- Modal Editar Vacaciones -->
    <div class="modal fade" id="modal_editar_vacaciones" tabindex="-1" role="dialog" aria-labelledby="modalEditarVacacionesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalEditarVacacionesLabel">
                        <i class="feather icon-edit"></i> Editar Vacaciones
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_editar_vacaciones">
                        <input type="hidden" id="id_vacacion_editar" name="id">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicio_editar">Fecha de Inicio <span class="text-danger">*</span></label>
                                    <input type="date"
                                           class="form-control"
                                           id="fecha_inicio_editar"
                                           name="fecha_inicio"
                                           required
                                           onchange="calcularDiasEditar()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_fin_editar">Fecha de Fin <span class="text-danger">*</span></label>
                                    <input type="date"
                                           class="form-control"
                                           id="fecha_fin_editar"
                                           name="fecha_fin"
                                           required
                                           onchange="calcularDiasEditar()">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success text-center">
                                    <strong>Total de días:</strong> <span id="total_dias_editar">0 días</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones_editar">Observaciones</label>
                                    <textarea class="form-control"
                                              id="observaciones_editar"
                                              name="observaciones"
                                              rows="3"
                                              placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-warning" onclick="guardarEdicionVacacion()">
                        <i class="feather icon-save"></i> Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal Editar Vacaciones -->
