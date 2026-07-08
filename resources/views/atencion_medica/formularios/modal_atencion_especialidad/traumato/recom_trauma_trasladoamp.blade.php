<div id="im_ind_traumato_trasladoamp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="im_ind_traumato_trasladoamp" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales acerca del traslado de un paciente amputado</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#m_ind_traumato_trasladoamp').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/traumato/trasladodepacienteamputado.pdf') }}" type="application/pdf" data-documento="trasladodepacienteamputado.pdf" data-url="documentos/traumato/trasladodepacienteamputado.pdf" width="100%" height="750px"/>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#m_ind_traumato_trasladoamp').modal('hide')">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_ind_traumato_trasladoamp');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
