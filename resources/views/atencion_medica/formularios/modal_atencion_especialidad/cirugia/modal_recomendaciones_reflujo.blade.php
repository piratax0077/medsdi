{{--  <div id="ind_reflujo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ind_reflujo_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones Paciente con reflujo gastroesofágico </h5>
              <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#ind_reflujo_modal').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/generales/REFLUJO.pdf') }}" type="application/pdf"
                    data-documento="REFLUJO.pdf" data-url="documentos/generales/REFLUJO.pdf" width="100%"
                    height="750px" />
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#ind_reflujo_modal').modal('hide')">Cerrar</button>
                    <button type="button" class="btn btn-info btn-sm"
                        onclick="envio_indicaciones_pdf('ind_reflujo_modal');">Enviar al Paciente</button>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<div id="ind_reflujo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ind_reflujo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones Paciente con reflujo gastroesofágico </h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#ind_reflujo_modal').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/orl/IND_AMIGDALECTOMIA.pdf') }}" type="application/pdf" data-documento="IND_AMIGDALECTOMIA.pdf" data-url="documentos/orl/IND_AMIGDALECTOMIA.pdf" width="100%" height="750px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#ind_reflujo_modal').modal('hide')">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('ind_reflujo_modal');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>

