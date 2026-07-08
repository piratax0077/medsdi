<div id="m_ind_gen_bronco" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_gen_bronco"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales de su especialista Broncopulmonar
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal"  onclick="$('#m_ind_gen_bronco').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/broncopulmonar/CUIDARVIARESPIRATORIA.pdf') }}" type="application/pdf"
                    data-documento="CUIDARVIARESPIRATORIA.pdf" data-url="documentos/broncopulmonar/CUIDARVIARESPIRATORIA.pdf" width="100%"
                    height="750px" />
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#m_ind_gen_bronco').modal('hide')">Cerrar</button>
                    <button type="button" class="btn btn-info btn-sm"
                        onclick="envio_indicaciones_pdf('m_ind_gen_bronco');">Enviar al Paciente</button>
                </div>
            </div>
        </div>
    </div>
</div>
