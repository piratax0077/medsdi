<div id="freportar_falla" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="freportar_falla" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white text-center">Reportar Falla del Sistema</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row" hidden>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Profesional</label>
                        <input type="text" class="form-control form-control-sm" name="Prof_falla" id="Prof_falla">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Fecha</label>
                        <input type="text" class="form-control form-control-sm" name="Prof_falla_fecha" id="Prof_falla_fecha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Asunto de la Falla</label>
                        <input type="text" class="form-control form-control-sm" id="asunto_falla" name="asunto_falla" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Prioridad</label>
                        <select class="form-control form-control-sm" id="prioridad_falla" name="prioridad_falla">
                            <option value="">-- Seleccione --</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm">Descripción de la Falla</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="descripcion_falla" id="descripcion_falla"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" onclick="registrar_reporte_falla();" class="btn btn-danger">Enviar Reporte</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-secondary btn-sm btn-block" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function reportar_falla() {
        $('#freportar_falla').modal('show');
    }
    function registrar_reporte_falla() {
        let id_profesional = $('#id_profesional_fc').val();
        let asunto_falla = $('#asunto_falla').val();
        let prioridad_falla = $('#prioridad_falla').val();
        let descripcion_falla = $('#descripcion_falla').val();

        let url = "{{ route('ficha_medica.registrar_falla') }}";

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_profesional: id_profesional,
                    asunto_falla: asunto_falla,
                    prioridad_falla: prioridad_falla,
                    descripcion_falla: descripcion_falla,
                },
            })
            .done(function(response) {
                if (response != '') {
                    console.log(response);
                    if (response['estado'] == '1') {
                        swal({
                            title: "Reporte de Falla.",
                            text: response['msj'],
                            icon: "success",
                        });
                        $('#freportar_falla').modal('hide');
                        $('#asunto_falla').val('');
                        $('#prioridad_falla').val('');
                        $('#descripcion_falla').val('');
                    } else {
                        swal({
                            title: "Reporte de Falla.",
                            text: response['msj'],
                            icon: "error",
                        });
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            });
    }
</script>
