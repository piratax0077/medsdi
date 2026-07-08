<div id="m_ind_refra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_refra" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales Cirugía Refractiva</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#m_ind_refra').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
           
             <div class="modal-body">
                 <embed src="{{ asset('documentos/oftalmo/ojosrefractiva.pdf') }}" type="application/pdf"  data-documento="ojosrefractiva.pdf"  data-url="documentos/oftalmo/ojosrefractiva.pdf"  width="100%" height="680px"> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#m_ind_refra').modal('hide')">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm"  onclick="envio_indicaciones_pdf('m_ind_refra');">Enviar al Paciente</button>                     
            </div>
        </div>
    </div>
</div>
