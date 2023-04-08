<div class="card-sidebar">
    <div class="card-header-sidebar" id="heading_consentimientos_informados">
        <h2 class="mb-0">
        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_consentimientos_informados" aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
            CONSENTIMIENTOS INFORMADOS
        </button>
        </h2>
    </div>
    <div id="collapse_consentimientos_informados" class="collapse" aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_ped">
        <div class="card-body-sidebar">
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_tto()";>+ Consentimiento Tratamiento</button>
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_revtto()";>+ Revocación Consentimiento</button>
        </div>
        <div class="card-body-sidebar">
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="solalta()";>+ Solicitar Alta Voluntaria</button>
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rechtto()";>+ Rechazo Tratamiento</button>
        </div>
    </div>
    @include("general.modal.m_aconsent_tto")
    @include("general.modal.m_revocacionconsent")
    @include("general.modal.m_sol_alta")
    @include("general.modal.m_rech_tto")
</div>

<script>

    $(document).ready(function () {

        $('#m_aconsentcirm_table').DataTable({
            responsive: true,
        });

        $("#consentimiento").autocomplete({
            source: function(request, response) {
                // console.log(request);
                var longitud = request.term.length;
                if(longitud>2)
                {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('consentimiento.ver_autocomplete') }}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            // console.log(data);
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {

                // console.log(ui);
                $('#consentimiento').val(ui.item.label);
                $('#id_consentimiento').val(ui.item.value);
                // Set selection
                $.ajax({
                    url: "{{ route('consentimiento.cargar_consentimiento') }}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        id: ui.item.value
                    },
                    success: function(data) {
                        // console.log(data);
                        if(data.estado == 1)
                        {
                            // console.log(data.registro.texto);
                            var texto = data.registro.texto;
                            texto = texto.replace('{diagnostico}', '<span style="font-size: 15px;font-weight: bold;">'+$('#diagnostico_cons').val()+'</span>');
                            texto = texto.replace('{cirugia}', '<span style="font-size: 15px;font-weight: bold;">'+$('#cirugia_cons').val()+'</span>');
                            texto = texto.replace('{nombre_dependiente}', '<span style="font-size: 15px;font-weight: bold;">'+$('#cirugia_cons').val()+'</span>');
                            $('#m_aconsentcirm_contenido').html('');
                            $('#m_aconsentcirm_contenido').html(texto);

                            $('#div_informacion_pasos_cons').hide();
                            $('#div_informacion_general_cons').show();
                        }
                        else
                        {
                            swal({
                                title: "Problema al Cargar Información de Consentimiento.",
                                text: data.msj,
                                icon: "warning",
                            })
                            $('#div_informacion_pasos_cons').show();
                            $('#div_informacion_general_cons').hide();
                        }
                    }
                });

                return false;
            }
        });

    });

    /** Autorización revocacion tratamiento y consentimientos informados**/
    function cons_tto() {
        $('#m_aconsentcirm').modal('show');
        validarDiagnostico('diagnostico_cons','consentimiento');
        mostrar_consentimientos_paciente();
        $('#div_informacion_pasos_cons').show();
        $('#div_informacion_general_cons').hide();
    }

    function solalta() {
        $('#solalta').modal('show');
    }

    function cons_revtto() {
        $('#m_rev_cons').modal('show');
    }

    function rechtto() {
        $('#m_rech_tto').modal('show');
    }

    function guia_vac() {
        $('#m_tabla_vac').modal('show');
    }

    function validarDiagnostico(diagnostico_cons,consentimiento)
    {
        if($('#'+diagnostico_cons).val() == '')
        {
            $('#'+consentimiento).attr('disabled', true);
            $('#msj_consentimiento').html('Debe ingresar Diagnostico en la Ficha.');
        }
        else
        {
            $('#'+consentimiento).attr('disabled', false);
            $('#msj_consentimiento').html('');
        }
    }

    function registar_solicitar_autorizacion_cons()
    {

        var id_fciha_atencion = $('#id_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var diagnostico_cons = $('#diagnostico_cons').val();
        var cirugia_cons = $('#cirugia_cons').val();
        var consentimiento = $('#consentimiento').val();
        var id_consentimiento = $('#id_consentimiento').val();
        var num_consentimiento = 0;
        var observaciones_con = $('#situaciones_especiales_del_paciente').val();
        var otro = '';
        var token = CSRF_TOKEN;

        var datos = {};
        datos._token = token;
        datos.id_fciha_atencion = id_fciha_atencion;
        datos.id_profesional = id_profesional;
        datos.id_paciente = id_paciente;
        datos.diagnostico_cons = diagnostico_cons;
        datos.cirugia_cons = cirugia_cons;
        datos.consentimiento = consentimiento;
        datos.id_consentimiento = id_consentimiento;
        datos.num_consentimiento = num_consentimiento;
        datos.observaciones_con = observaciones_con;
        datos.otro = otro;

        $.ajax({
            url: "{{ route('consentimiento.registrar.autorizacion') }}",
            type: 'post',
            dataType: "json",
            data: datos,
            success: function(data) {
                // console.log(data);
                if(data.estado == 1)
                {
                    swal({
                        title: "Consentimiento Informado.",
                        text: 'Generado de forma exitosa.\n solicitud de aprobacion enviada.\n En Espera de aprobación.',
                        icon: "warning",
                    });
                    $('#div_btn_aprobacion_solicitud').hide();
                    $('#div_btn_aprobacion_espera').show();
                    $('#esperando_aprobacion').val(data.solicitud_autorizacion.registro.token);

                    $('#id_consentimiento').val(data.last_id);

                    checkToken('esperando_aprobacion', 'div_btn_aprobacion_ok', 'div_btn_aprobacion_espera','div_btn_aprobacion_solicitud');
                }
                else
                {
                    swal({
                        title: "Problema al generar Consentimiento Informado.",
                        text: data.msj,
                        icon: "warning",
                    });
                }
            }
        });
    }

    function checkToken(input_token, div_mostrar, div_ocultar, div_solicitud)
    {
        let url = "{{ route('check_sdi_token') }}";
        var _token = $('input[name=_token]').val();
        var token = $('#'+input_token).val();
        $.ajax({
            url: url,
            type: "GET",
            data: {
                _token: _token,
                token:token
            },
            success: (resp)=>{
                if(resp.estado==1)
                {
                    if(resp.registro.estado==1)
                    {
                        $('#'+div_mostrar).show();
                        $('#'+div_ocultar).hide();
                        aceptarAprobacion(resp.registro.estado);
                        $('#btn_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                            ver_pdf_consentimiento($('#id_consentimiento').val(), $('#id_fc').val());
                        });
                        mostrar_consentimientos_paciente();
                        $('#diagnostico_cons').attr('disabled', true);
                        $('#cirugia_cons').attr('disabled', true);
                        $('#consentimiento').attr('disabled', true);
                    }
                    else if(resp.registro.estado==2)
                    {
                        $('#'+div_mostrar).hide();
                        $('#'+div_ocultar).hide();
                        $('#'+div_solicitud).show();
                        aceptarAprobacion(resp.registro.estado);
                        $('#btn_ver_pdf_cons_activa').click(function (e) {
                            e.preventDefault();
                        });

                        swal({
                            title: "Consentimiento Informado.",
                            text: 'Consentimiento Informado Rechazado\n Debe solicitar aprobación.',
                            icon: "warning",
                        });
                    }
                    else
                    {
                        setTimeout(checkToken(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                    }
                }
                else
                {
                    setTimeout(checkToken(input_token, div_mostrar, div_ocultar,div_solicitud),3000);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function aceptarAprobacion(estado)
    {
        var id_consentimiento = $('#id_consentimiento').val();
        var token = $('#esperando_aprobacion').val();
        let url = "{{ route('consentimiento.estado.autorizacion') }}";
        var _token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id_consentimiento : id_consentimiento,
                token : token,
                estado : estado,
                _token : _token,

            },
            success: (resp)=>{
                console.log(resp);
                if(resp.estado==1)
                {
                    console.log('registro actualizado');
                }
                else
                {
                    console.log('falla en actualizacion');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function mostrar_consentimientos_paciente()
    {
        var id_paciente_fc = $('#id_paciente_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();

        let url = "{{ route('consentimiento.paciente.ver') }}";
        var _token = $('input[name=_token]').val();
        $('#m_aconsentcirm_table tbody').html('');
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente_fc,
                id_lugar_atencion : id_lugar_atencion,
            },
            success: (resp)=>{
                console.log(resp);
                html = '';
                if(resp.estado==1)
                {

                    let estado_log = ['En espera', 'Aprobado', 'Rechazado'];
                    $.each(resp.registros, function (key, value) {
                        html += '<tr>';
                        html += '    <td>'+value.id+'</td>';
                        html += '    <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+' '+value.profesional.apellido_dos+'</td>';
                        html += '    <td>'+value.consentimiento.nombre+'</td>';
                        html += '    <td>'+value.diagnostico_cons+'</td>';
                        html += '    <td>'+value.cirugia_cons+'</td>';
                        html += '    <td>'+value.fecha_cons+'</td>';
                        html += '    <td>'+value.log_users_devices.updated_at+'</td>';
                        html += '    <td>'+estado_log[value.log_users_devices.estado]+'</td>';
                        html += '    <td><button class="btn btn-danger btn-xs" role="button" onclick="ver_pdf_consentimiento(\''+value.id+'\', \''+$('#id_fc').val()+'\');">Ver PDF</button></td>';
                        html += '</tr>';
                    });
                }

                $('#m_aconsentcirm_table').DataTable().destroy();
                $('#m_aconsentcirm_table tbody').html(html);
                $('#m_aconsentcirm_table').DataTable({
                    responsive: true,
                });

            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function ver_pdf_consentimiento(id_consentimiento_pcte, id_ficha_atencion)
    {
        Fancybox.close();
        Fancybox.show(
            [
                {
                src: '{{ route("consentimiento.pdf") }}?id_consentimiento='+id_consentimiento_pcte+'&id_ficha_atencion='+id_ficha_atencion,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

    function limpiar_consentimiento_informado()
    {
        mostrar_consentimientos_paciente();

        $('#diagnostico_cons').attr('disabled', false);
        $('#cirugia_cons').attr('disabled', false);
        $('#consentimiento').attr('disabled', false);

        $('#div_informacion_pasos_cons').show();
        $('#div_informacion_general_cons').hide();

        $('#diagnostico_cons').val($('#descripcion_hipotesis').val());
        $('#id_consentimiento').val('');
        $('#cirugia_cons').val('');
        $('#consentimiento').val('');
        $('#id_consentimiento').val('');
        $('#m_aconsentcirm_contenido').html('');
        $('#situaciones_especiales_del_paciente').val('');
        $('#esperando_aprobacion').val('');
        $('#div_btn_aprobacion_solicitud').show();
        $('#div_btn_aprobacion_espera').hide();
        $('#div_btn_aprobacion_ok').hide();
    }


</script>
