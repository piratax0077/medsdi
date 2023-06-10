<div id="contacto_asistente_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contacto_asistente_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Contacto456</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Correo electr&oacute;nico</h6>
                        <span>admin@gmail.com</span>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Tel&eacute;fono</h6>
                        <span>728392839</span>
                        <span>932930923</span>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Direcci&oacute;n</h6>
                        <span>Cha&ntilde;aral 132, Vi&ntilde;a del Mar, Valpara&iacute;so.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*-Modals personal-*/
    function contacto_asistente() {
        $('#contacto_asistente_modal').modal('show');
    }
    function contacto(id)
    {
        let url = "{{ route('adm_cm.cargar_personal_persona') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id: id
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {
                /** encontrado */
                $('#contacto_prof_email').html(data.registro.email);
                $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                $('#contacto_prof_direccion').html(data.direccion);
                $('#contacto_usuario').modal('show');
            }
            else
            {
                /** no encontrado */
                swal({
                    title: "Problema al cargar informacion del Personal.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

</script>
