<div id="m_rec_diab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_rec_diab" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales Dieta Paciente Diabético</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#m_rec_diab').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>                   
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/nutri/dieta diabeticos.pdf') }}" type="application/pdf"  data-documento="dieta diabeticos.pdf"  data-url="documentos/nutri/dieta diabeticos.pdf"  width="100%" height="500px">
                 <div class="form-group fill">
                    <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="ind_pedgen" id="observacion_m_rec_diab"></textarea>
                </div>
                   
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#m_rec_diab').modal('hide')">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_rec_diab');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
