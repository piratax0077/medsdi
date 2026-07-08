<div id="modal_finalizar_empleado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine">Finalizar Personal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_finalizar_empleado_id_empleado" id="modal_finalizar_empleado_id_empleado" value="">
                <input type="hidden" name="modal_finalizar_empleado_id_contrato" id="modal_finalizar_empleado_id_contrato" value="">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>
                            Usted está a punto de <span class="text-danger">Finalizar el contrato y desasociar</span> de forma definitiva a <span class="font-weight-bold text-c-blue text-uppercase" id="modal_finalizar_empleado_nombre"></span>.<br><br>
                            Si está seguro, presione el botón “Finalizar / Desasociar”.
                        </h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="finalizar_personal();"><i class="feather icon-check"></i> Finalizar / Desasociar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function modal_desactivar_asistente(id, id_contrato, nombre)
    {
        $('#modal_finalizar_empleado').modal('show');
        $('#modal_finalizar_empleado_nombre').html(nombre);
        $('#modal_finalizar_empleado_id_empleado').val(id);
        $('#modal_finalizar_empleado_id_contrato').val(id_contrato);
    }

    function finalizar_personal()
    {
        let id_empleado = $('#modal_finalizar_empleado_id_empleado').val();
        let id_contrato = $('#modal_finalizar_empleado_id_contrato').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('adm_cm.personal.finalizar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token:_token,
                id_empleado:id_empleado,
                id_contrato:id_contrato,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Finalizar Contrato / Desasociar Personal",
                        text: 'Proceso Exitoso',
                        icon: "succes",
                    });
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Finalizar Contrato / Desasociar Personal",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }

            }
            else
            {
                swal({
                    title: "Finalizar Contrato / Desasociar Personal",
                    text: "Se presenteo problema en el momento, Intente de nuevo.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
