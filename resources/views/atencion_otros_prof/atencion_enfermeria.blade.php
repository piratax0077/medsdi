@extends('template.otros_profesionales.template_enfermeria')
@section('js_inferior')
<script>

    $(document).ready(function() {


        $('#tabla_medicamentos_enfermera_medicamentos').DataTable();
            $('#tipo_examen_d').change(function(e) {
                e.preventDefault();
                tipo_examen = $('#tipo_examen_d').val();

                $("#sub_tipo_examen_d").empty();
                $("#examen_d").empty();
                $.ajax({
                        url: '{{ route('listar.sub_tipo_examen') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            tipo_examen: tipo_examen
                        },
                    })
                    .done(function(response) {

                        $('#sub_tipo_examen_d').append(
                            `<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#sub_tipo_examen_d').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }

                        /** ACTIVAR CHECHBOK DE CON  CONTRASTE */
                        if($('#tipo_examen_d').val() == 362) $('#imagenologia_con_contraste_d').removeAttr('disabled');
                        else  $('#imagenologia_con_contraste_d').attr('disabled','disabled');
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            {{--  buscar examenes por el sub tipo de examen  --}}
            $('#sub_tipo_examen_d').change(function(e) {

                e.preventDefault();
                sub_tipo_examen = $('#sub_tipo_examen_d').val();

                $("#examen_d").empty();
                $.ajax({
                        url: '{{ route("listar.examen") }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            sub_tipo_examen: sub_tipo_examen
                        },
                    })
                    .done(function(response) {

                        $('#examen_d').append(
                            `<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#examen_d').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            {{--  mostrar ocultar mensaje de examenes de radiologia con contraste --}}
            $('#imagenologia_con_contraste_d').change(function(){
                if($('#imagenologia_con_contraste_d').is(':checked') )
                {
                    $('#mensaje_imagenologia_con_contraste_d').show();
                }
                else
                {
                    $('#mensaje_imagenologia_con_contraste_d').hide();
                }

            });
    });

     /** autocomplete nombre GES */
            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    envio_codigo_validacion_ges();
                    return false;
                }
            });

            /** abril modal de ges */
            $('#modal_ges').change(function()
            {
                if ($('#modal_ges').is(':checked'))
                {
                    $('#form_ges').modal('show');
                }
                else
                {
                    $('#form_ges').modal('hide');
                }
            });

            $('#confidencial').change(function()
            {
                if ($('#confidencial').is(':checked'))
                {
                    $('#confidencial_descripcion').show();
                }
                else
                {
                    $('#confidencial_descripcion').hide();
                }

            });

            /** GES */
        function registrar_ges_ficha() {

            var validar = 0;
            var mensaje ='';
            let nombre_institucion_ficha_ges = $('#nombre_institucion_ficha_ges').val();
            let direccion_institucion_ficha_ges = $('#direccion_institucion_ficha_ges').val();
            let nombre_responsable_ficha_ges = $('#nombre_responsable_ficha_ges').val();
            let rut_responsable_ficha_ges = $('#rut_responsable_ficha_ges').val();
            let confirmacion_diagnostica_ficha_ges = $('#confirmacion_diagnostica_ficha_ges').val();
            let paciente_tratamiento_ficha_ges = $('#paciente_tratamiento_ficha_ges').val();
            let nombre_ges = $('#nombre_ges').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional').val();
            let id_ficha_atencion = $('#id_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let hora_medica = $('#hora_medica').val();
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();


            {{--  if(nombre_institucion_ficha_ges == '')
            {
                $('#nombre_institucion_ficha_ges').focus();
                validar = 1;

            }
            if(direccion_institucion_ficha_ges == '')
            {
                $('#direccion_institucion_ficha_ges').focus();
                validar = 1;

            }  --}}
            {{--
            if(nombre_responsable_ficha_ges == '')
            {
                $('#nombre_responsable_ficha_ges').focus();
                validar = 1;

            }
            if(rut_responsable_ficha_ges == '')
            {
                $('#rut_responsable_ficha_ges').focus();
                validar = 1;

            }
            --}}
            if(confirmacion_diagnostica_ficha_ges == '')
            {
                $('#confirmacion_diagnostica_ficha_ges').focus();
                mensaje += ' Debe ingresar Confirmación diagnóstica GES.\n' ;
                validar = 1;

            }
            if(paciente_tratamiento_ficha_ges == '')
            {
                $('#paciente_tratamiento_ficha_ges').focus();
                mensaje += ' Debe Confimar si el paciente se encuentra en tratamiento.\n' ;
                validar = 1;

            }
            if(nombre_ges == '')
            {
                $('#nombre_ges').focus();
                mensaje += ' Debe ingresar el Diagnóstico GES.\n' ;
                validar = 1;
            }
            {{--  if(id_paciente == '')
            {
                $('#id_paciente').focus();
                validar = 1;

            }
            if(id_profesional == '')
            {
                $('#id_profesional').focus();
                validar = 1;

            }
            if(id_ficha_atencion == '')
            {
                $('#id_ficha_atencion').focus();
                validar = 1;

            }
            if(id_lugar_atencion == '')
            {
                $('#id_lugar_atencion').focus();
                validar = 1;

            }
            if(hora_medica == '')
            {
                $('#hora_medica').focus();
                validar = 1;

            }  --}}

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {

                $.ajax({
                    url: "{{ route('ficha_atencion.registrar_diagnostico_ges') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {

                        nombre_institucion_ficha_ges :nombre_institucion_ficha_ges,
                        direccion_institucion_ficha_ges :direccion_institucion_ficha_ges,
                        nombre_responsable_ficha_ges :nombre_responsable_ficha_ges,
                        rut_responsable_ficha_ges :rut_responsable_ficha_ges,
                        confirmacion_diagnostica_ficha_ges :confirmacion_diagnostica_ficha_ges,
                        paciente_tratamiento_ficha_ges :paciente_tratamiento_ficha_ges,
                        nombre_ges :nombre_ges,
                        id_paciente :id_paciente,
                        id_profesional :id_profesional,
                        id_ficha_atencion :id_ficha_atencion,
                        id_lugar_atencion :id_lugar_atencion,
                        hora_medica :hora_medica,
                        codigo_verificacion :codigo_validacion_informe_ges,

                    },
                })
                .done(function(response) {
                    console.log(response);

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha creado Diagnostico GES de forma correcta');
                        $('#mensaje').show();
                        $('#form_ges').modal('hide');


                        swal({
                            title: "Constancia GES (Artículo 24 Ley 19.966).",
                            text: 'Registro Exitoso.\n El paciente ha sido Notificado\n La constancia puede ser recuperada desde su escritorio (Documentos).',
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }

                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })

            }



        };

        function validar_codigo_ges(){
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();
            if(codigo_validacion_informe_ges!='')
            {
                var id_ficha_atencion = $('#id_fc').val();

                var valido = 1;
                var mensaje = '';


                let url = "{{ route('cod_autorizacion.validar_codigo') }}";

                var _token = CSRF_TOKEN;
                $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        codigo:codigo_validacion_informe_ges,
                        id_control:id_ficha_atencion,
                    },
                })
                .done(function(data)
                {

                    if (data !== 'null')
                    {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if(data.estado == 1)
                        {
                            registrar_ges_ficha();
                        }
                        else{

                            swal({
                                title: "Problema solicitar Autorizacion.",
                                text: data.msj,
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


            }
            else
            {
                swal({
					title: "Constancia GES (Artículo 24 Ley 19.966).",
					text:"Debe ingresar Código de notificación entrago por el Paciente.",
					icon: "error",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
            }
        }

        function envio_codigo_validacion_ges()
        {
            let url = "{{ route('cod_autorizacion.agregar') }}";

            var _token = CSRF_TOKEN;
            var id_profesional = 0;
            var id_ficha_atencion = 0;

            // Autorizacion Licencia
            id_profesional = '{{ Auth::user()->id }}';
            id_ficha_atencion = $('#id_fc').val();

            var id_tipo_autorizacion_acompanante = 7;
            @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                var rut_acompanante = $('#rut_acompanante').val();
                var nombre_acompanante = $('#nombre_acompanante').val();
                var apell_acompanante = $('#apell_acompanante').val();
                var relacion_acompanante = $('#relacion_acompanante').val();
                var tipo_medio_acompanante = $('#tipo_medio_acompanante').val();
                var tel_acompanante = $('#tel_acompanante').val();
                var email_acompanante = $('#email_acompanante').val();
            @else
                var rut_acompanante = '{{ $paciente->rut }}';
                var nombre_acompanante = '{{ $paciente->nombres }}';
                var apell_acompanante = '{{ $paciente->apellido_uno }}';
                var relacion_acompanante = '99';
                var tipo_medio_acompanante = 3;
                var tel_acompanante = '{{ $paciente->telefono_uno}}';
                var email_acompanante = '{{ $paciente->email }}';
            @endif
            var medio = '';
            if(tipo_medio_acompanante == 1)
                medio = tel_acompanante;
            else
                medio = email_acompanante;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,

                    id_tipo_autorizacion:id_tipo_autorizacion_acompanante,
                    id_profesional:id_profesional,
                    id_control:id_ficha_atencion,
                    id_tipo_medio:tipo_medio_acompanante,
                    medio:medio,
                    nombre_autoriza:nombre_acompanante,
                    apellido_autoriza:apell_acompanante,
                    rut_autoriza:rut_acompanante,
                    id_parentezco_autoriza:relacion_acompanante,
                    telefono_autoriza:tel_acompanante,
                    email_autoriza:email_acompanante,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Código Autorizacion enviado al Paciente.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                    else{

                        swal({
                            title: "Problema al Registrar Codigo de autorizacion.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }


    function administrar_medicamento_enf(id_tratamiento) {
            swal({
                title: "¿Administrar medicamento?",
                text: "Se registrará la fecha y hora de administración",
                icon: "warning",
                buttons: ["Cancelar", "Confirmar"],
                dangerMode: false,
            }).then((confirmar) => {
                if (confirmar) {
                    let url = "{{ route('enfermeria.administrar_tratamiento') }}";
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            id_tratamiento: id_tratamiento,
                            ficha_atencion_id : $('#id_fc').val(),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.mensaje == 'OK') {
                                // Buscar el medicamento actualizado en la respuesta
                                let medicamento_actualizado = null;
                                if (response.receta && Array.isArray(response.receta) && response.receta.length > 0) {
                                    medicamento_actualizado = response.receta.find(m => m.id == id_tratamiento || m.id_detalle == id_tratamiento);
                                }

                                // Actualizar el checkbox de estado
                                $('#registro_alternativo_paciente_enf_adm' + id_tratamiento).prop('checked', true);
                                $('#label_tratamiento_enf_adm_' + id_tratamiento).html('ADMINISTRADO');

                                // Calcular y mostrar fecha de administración
                                let fecha_admin = new Date();
                                let fecha_formateada = fecha_admin.toLocaleDateString('es-CL', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                                // Buscar la celda de fecha-hora en la fila del medicamento
                                // La estructura es: buscar la fila que contiene el botón con ese id
                                let $fila = $('#btn_administrar_' + id_tratamiento).closest('tr');

                                // Actualizar la celda de fecha-hora (penúltima columna visible antes de Profesional)
                                // Índice 16 corresponde a la columna Fecha-Hora
                                $fila.find('td').eq(16).html('<span class="badge badge-success">Admin: ' + fecha_formateada + '</span>');

                                // Actualizar tiempo restante a "Hace 0 minutos"
                                $('#tiempo_restante_' + id_tratamiento).html('<span class="text-success font-weight-bold">Administrado ahora</span>');

                                // Actualizar el contador de dosis si existe
                                if (medicamento_actualizado && (medicamento_actualizado.contador_dosis || medicamento_actualizado.contador_dosis === 0)) {
                                    $('#repeticiones_medicamento_' + id_tratamiento).text(medicamento_actualizado.contador_dosis);
                                }

                                // Deshabilitar el botón de administrar
                                $('#btn_administrar_' + id_tratamiento).prop('disabled', true).addClass('btn-secondary').removeClass('btn-success');

                                swal({
                                    title: "Éxito",
                                    text: "Medicamento administrado correctamente a las " + fecha_formateada,
                                    icon: "success",
                                    button: "Aceptar",
                                });
                            } else {
                                swal({
                                    title: "Error",
                                    text: response.mensaje || "No se pudo administrar el medicamento",
                                    icon: "error",
                                    button: "Aceptar",
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            swal({
                                title: "Error",
                                text: "Ocurrió un error al administrar el medicamento",
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    });
                }
            });
        }

    function actualizarTotal() {
        console.log('actualizarTotal');
        // Define los ID de los elementos select
        var selectIds = ['cp_asp', 'cp_me', 'cp_pro', 'cp_ecant', 'cp_ecal', 'cp_tn', 'cp_tg', 'cp_ed', 'cp_dol',
            'cp_pielc'
        ];
        console.log(selectIds.length);
        var total = 0;

        // Recorre cada ID
        for (var i = 0; i < selectIds.length; i++) {
            // Obtiene el elemento select por su ID y suma su valor al total
            var select = document.getElementById(selectIds[i]);
            if (select) {
                total += Number(select.value);
            }
        }

        // Actualiza el valor del campo de entrada con id 'ptos_tot_ev'
        document.getElementById('ptos_tot_ev').value = total;

        if(total >= 10 && total <= 15){
            document.getElementById('tpo_les_curgen').value = 'Tipo 1';
        }else if(total >= 16 && total <= 21){
            document.getElementById('tpo_les_curgen').value = 'Tipo 2';
        }else if(total >= 22 && total <= 27){
            document.getElementById('tpo_les_curgen').value = 'Tipo 3';
        }else if(total >= 28 && total <= 40){
            document.getElementById('tpo_les_curgen').value = 'Tipo 4';
        }
    }

    function actualizarTotalPieDiabetico(){
        console.log('actualizarTotalPieDiabetico');
        // Define los ID de los elementos select
        var selectIds = ['aspecto_pie_diab', 'mayor_extension', 'profundidad_curacion','exudado_cantidad_curacion', 'exudado_calidad_curacion', 'tejido_esf', 'tejido_granu', 'edema_curacion', 'dolor_curacion', 'piel_circun'];
        var total = 0;

        // Recorre cada ID
        for (var i = 0; i < selectIds.length; i++) {
            // Obtiene el elemento select por su ID y suma su valor al total
            var select = document.getElementById(selectIds[i]);
            total += Number(select.value);
        }

        // Actualiza el valor del campo de entrada con id 'ptos_tot_ev'
        document.getElementById('ptos_tot_ev_diab').value = total;

        // if(total >= 10 && total <= 15){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 1';
        // }else if(total >= 16 && total <= 21){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 2';
        // }else if(total >= 22 && total <= 27){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 3';
        // }else if(total >= 28 && total <= 40){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 4';
        // }
    }

    function dame_id_paciente(){
        let params = new URLSearchParams(location.search);
        let id_paciente = params.get('id_paciente');
        return id_paciente;
    }

    function eliminar_medicamento_enfermeria(id_detalle) {
        swal({
            title: "¿Está seguro?",
            text: "¿Desea eliminar este medicamento del tratamiento?",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                let url = "{{ route('enfermeria.eliminar_tratamiento') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        id_detalle: id_detalle,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.estado == 1 || response.mensaje == 'OK') {
                            swal({
                                title: "Eliminado",
                                text: "El medicamento ha sido eliminado correctamente",
                                icon: "success",
                                timer: 2000,
                                buttons: false
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: response.mensaje || "No se pudo eliminar el medicamento",
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        swal({
                            title: "Error",
                            text: "Ocurrió un error al eliminar el medicamento",
                            icon: "error",
                            button: "Aceptar",
                        });
                    }
                });
            }
        });
    }

    function editar_observacion_medicamento_enfermeria(id_detalle) {
        // Obtener observación actual de la tabla
        let $fila = $('button[onclick*="editar_observacion_medicamento_enfermeria(' + id_detalle + ')"]').closest('tr');
        let observacion_actual = $fila.find('td').eq(15).text().trim(); // Columna de observaciones

        // Establecer valores en el modal
        $('#id_medicamento_observacion').val(id_detalle);
        $('#observacion_medicamento_enfermeria').val(observacion_actual === '-' ? '' : observacion_actual);

        // Mostrar modal
        $('#modal_editar_observacion_medicamento').modal('show');
    }

    function guardar_observacion_medicamento() {
        let id_detalle = $('#id_medicamento_observacion').val();
        let observacion = $('#observacion_medicamento_enfermeria').val();

        if (!id_detalle) {
            swal({
                title: "Error",
                text: "No se pudo identificar el medicamento",
                icon: "error",
                button: "Aceptar",
            });
            return;
        }

        let url = "{{ route('enfermeria.actualizar_observacion_tratamiento') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_detalle: id_detalle,
                observacion: observacion,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                if (response.estado == 1 || response.mensaje == 'OK') {
                    // Actualizar la celda de observación en la tabla
                    let $fila = $('button[onclick*="editar_observacion_medicamento_enfermeria(' + id_detalle + ')"]').closest('tr');
                    $fila.find('td').eq(15).text(observacion ? observacion : '-');

                    $('#modal_editar_observacion_medicamento').modal('hide');

                    swal({
                        title: "Actualizado",
                        text: "La observación ha sido actualizada correctamente",
                        icon: "success",
                        timer: 2000,
                        buttons: false
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje || "No se pudo actualizar la observación",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: "Error",
                    text: "Ocurrió un error al actualizar la observación",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }


</script>
@endsection
@section('Content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-12">
                            <div class="page-header-title mt-2">
                                <h5 class="text-white d-inline f-16 mt-2"><strong>ATENCIÓN ENFERMERÍA</strong></h5>
                                <p class="f-16 mt-0 mb-0 text-white float-md-right font-weight-bold d-inline mr-3">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--  <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de controles Domiciliarios</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion_op-tab" data-toggle="tab" href="#hospitalizacion_op" role="tab" aria-controls="hospitalizacion_op" aria-selected="false">Paciente Hospitalizado</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-oftalmo">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_otros_prof.secciones_especialidad.ficha_enfermeria')
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                             @include('general.secciones_ficha.fmu')
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                           @include('general.secciones_ficha.atenciones_previas_form')
                        </div>
						 <div class="tab-pane fade show" id="hospitalizacion_op" role="tabpanel" aria-labelledby="hospitalizacion_op-tab">
                            @include('general.hospitalizacion.hospitalizacion_op')
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Cierre: Botón flotante-->

        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_oral_cd")
        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_ven_suero_cd")
        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_n_parenteral_cd")
        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_inyect_cd")
        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_otros_proc_cd")
        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_curacion_cd")
        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_informe_cur")
        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal_editar_observacion")
        {{--  @include("atencion_otros_prof.formularios.modal_atencion_especialidad.enfermera.modal.insumos_servicios")  --}}

        <!-- SIDE BAR enfermeria -->
        @include("atencion_otros_prof.modales"){{-- base de botones de sidebar --}}
        @include("atencion_otros_prof.include.sidebar_derecho_enfermeria")



        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_hda')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_guia')

        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.pie_diab')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.pie_diab_guia')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_lpp')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_lpp_guia')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.quemados')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.insumos_servicios')

                {{-- @include('general.secciones_ficha.receta_examen.modal_recetario_sdi') --}}
        {{-- @include('app.profesional.modales.boton_flotante_agenda_autorizacion') --}}



        <!--Modals de especialidad -->
        {{--  @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.indicar_vacunas")
        @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.indicar_vacunas_otras")
        @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_vacuna")
        @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_otras_vacunas")  --}}



        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.m_interconsulta")  --}}




    </div>
    <!--Cierre: Container Completo-->
@endsection

