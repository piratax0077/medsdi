<div id="modal_editar_observacion_medicamento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_editar_observacion_medicamento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">
                    <i class="fas fa-comment-dots"></i> Editar Observaciones del Medicamento
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_editar_observacion_medicamento">
                    <input type="hidden" id="id_medicamento_observacion" name="id_medicamento_observacion">

                    <div class="form-group">
                        <label for="observacion_medicamento_enfermeria" class="font-weight-bold">
                            Observaciones <span class="text-muted">(Opcional)</span>
                        </label>
                        <textarea
                            class="form-control"
                            id="observacion_medicamento_enfermeria"
                            name="observacion_medicamento_enfermeria"
                            rows="4"
                            placeholder="Ingrese observaciones sobre el medicamento..."
                            maxlength="500"></textarea>
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i> Puede agregar notas sobre la administración, efectos o cualquier detalle relevante
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="button" class="btn btn-info" onclick="guardar_observacion_medicamento();">
                    <i class="fas fa-save"></i> Guardar Observación
                </button>
            </div>
        </div>
    </div>
</div>
