<div id="m_ind_vitre" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_vitre" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales Cirugía del Vitreo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#m_ind_vitre').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/oftalmo/ojosvitrectomia.pdf') }}"  type="application/pdf" data-documento="ojosvitrectomia.pdf"  data-url="documentos/oftalmo/ojosvitrectomia.pdf"  width="100%" height="500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#m_ind_vitre').modal('hide')">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_ind_vitre');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
