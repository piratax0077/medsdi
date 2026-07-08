<div id="ind_cuidado_heridasop_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ind_cuidado_heridasop_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones generales Cuidado heridas operatorias</h5>
              <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#ind_cuidado_heridasop_modal').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/cirugia/Cuidadoheridaoperatoria.pdf') }}" type="application/pdf"
                    data-documento="Cuidadoheridaoperatoria.pdf" data-url="documentos/cirugia/Cuidadoheridaoperatoria.pdf" width="100%"
                    height="750px" />
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#ind_cuidado_heridasop_modal').modal('hide')">Cerrar</button>
                    <button type="button" class="btn btn-info btn-sm"
                        onclick="envio_indicaciones_pdf('ind_cuidado_heridasop_modal');">Enviar al Paciente</button>
                </div>
            </div>
        </div>
    </div>
</div>
