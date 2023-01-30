<!--detalle rendicion-->
<div id="detalle_rendicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detalle_rendicion"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_pago_consulta_title">Detalle Rendición</h5>
                <button type="button" class="close cerrar_modal_detalle_rendicion" data-dismiss="modal" aria-label="Close" onclick="$().modal('hide')"><span&time>×</span></button>

            </div>
            <div class="modal-body">
                <div class="col-sm-12 col-md-12">
                    <table id="tabla_detalle_rendicion" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">ID Bono</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Convenio</th>
                                <th class="text-center align-middle">Numero Bono</th>
                                <th class="text-center align-middle">F/Atención</th>
                                <th class="text-center align-middle">Valor $</th>
                                <th class="text-center align-middle">Profesional</th>
                                <th class="text-center align-middle">Paciente</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div type="button" class="btn btn-info cerrar_modal_detalle_rendicion" data-dismiss="modal" aria-label="Close" onclick="$().modal('hide')">Cerrar</div>
            </div>
        </div>
    </div>
</div>
