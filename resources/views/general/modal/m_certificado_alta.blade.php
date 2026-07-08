<!---******* Modal Formulario Certificado de alta medica (informe médico) ********-->
<div id="modal_cert_alta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_cert_alta"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Certificado de Alta</h5>
                <button type="button" class="close text-white" onclick="$('#modal_cert_alta').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_cert_alta_tipo_informe" id="modal_cert_alta_tipo_informe" value="2">
                <input type="hidden" id="id_alta_medica_email" name="id_alta_medica_email" value="">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="modal_cert_alta_nombre_paciente" id="modal_cert_alta_nombre_paciente" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input type="person" class="form-control form-control-sm" name="modal_cert_alta_rut_paciente" id="modal_cert_alta_rut_paciente" value="{{ $paciente->rut }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="modal_cert_alta_edad_paciente" id="modal_cert_alta_edad_paciente" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="address" class="form-control form-control-sm" name="modal_cert_alta_direccion_paciente" id="modal_cert_alta_direccion_paciente" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Regi&oacute;n</label>
                        <select id="modal_cert_alta_region_paciente" name="modal_cert_alta_region_paciente" class="form-control form-control-sm" readonly>
                            <option value="0">Seleccione</option>
                            @foreach ($regiones as $r)
                                @if ($r->id == $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                    <option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
                                @endif
                                <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Ciudad</label>
                        <select id="modal_cert_alta_region_paciente" name="modal_cert_alta_region_paciente" class="form-control form-control-sm" readonly>
                            <option value="0">Seleccione</option>
                            @foreach ($ciudades as $c)
                                @if ($c->id == $paciente->Direccion()->first()->Ciudad()->first()->id)
                                    <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
                                @endif
                                <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <p class="text-c-blue mb-0 mt-3">El Profesional que suscribe informa que</p>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Descripción</label>
                        <textarea type="text" class="form-control form-control-sm" rows="3" name="modal_cert_alta_comentarios" id="modal_cert_alta_comentarios"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="$('#modal_cert_alta').modal('hide');">Cancelar</button>
                <button type="button" onclick="enviar_alta_medica_email();" class="btn btn-warning">Enviar Email</button>
                <button type="button" onclick="registrar_alta_medica('modal_cert_alta_tipo_informe','modal_cert_alta_comentarios','modal_cert_alta');" class="btn btn-info">Generar Certificado de Alta</button>
            </div>
        </div>
    </div>
</div>

<script>
    /** certificado de alta */
    function certificado_alta()
    {
        $('#modal_cert_alta').modal('show');
    }

    function registrar_alta_medica(input_tipo, input_comentario, modal)
    {

        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let hora_medica = $('#hora_medica').val();
        let tipo_informe = $('#'+input_tipo).val();
        let comentarios_informe_medico = $('#'+input_comentario).val();
        let url = "{{ route('ficha_medica.registrar_informe_medico') }}";

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                tipo_informe: tipo_informe,
                comentarios_informe_medico: comentarios_informe_medico,
                hora_medica: hora_medica,
                id_lugar_atencion: id_lugar_atencion,
                _token: CSRF_TOKEN
            },
        })
        .done(function(response) {
            console.log(response);
            if (response != '') {
                console.log(response);

                $('#mensaje').removeClass('alert-success');
                $('#mensaje').removeClass('alert-danger');
                $('#mensaje').hide();

                if(response['estado'] == '1')
                {
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').addClass('alert-success');
                    $('#mensaje').removeClass('alert-danger');
                    $('#mensaje').html('Certificado de Alta medica. <i class="fas fa-check"></i>');
                    $('#mensaje').show();

                    // ✅ Guardar el ID del alta médica registrado
                    if (response['id_last']) {
                        $('#id_alta_medica_email').val(response['id_last']);
                    }

                    $('#'+modal).modal('hide');

                    // Agregar el archivo adjunto al div de indicaciones
                    let id_ficha = $('#id_fc').val();
                    let tipo_informe = $('#'+input_tipo).val();
                    let nombre_archivo = 'Certificado de Alta - ' + new Date().toLocaleDateString('es-ES');
                    let url_pdf = "{{ route('pdf.informe_medico') }}?id_ficha_atencion=" + id_ficha + "&id_tipo_informe=" + tipo_informe;

                     agregarAdjuntoAlDiv(nombre_archivo, url_pdf);

                    ver_pdf_informe_medico_alta($('#id_fc').val(), $('#'+input_tipo).val() );
                }
                else
                {
                    let titulo_error = 'Error al registrar';
                    let mensaje_error = response['msj'] || 'Error al registrar el certificado de alta';

                    // Prioridad: objeto error con claves específicas
                    if (response['error'] && typeof response['error'] === 'object') {
                        let errores = response['error'];

                        if (errores['autorizacion']) {
                            titulo_error = 'Autorización Requerida';
                            mensaje_error = errores['autorizacion'] + '\n\nPor favor, abra su aplicación móvil y autorice la solicitud.';
                        } else if (errores['id_autorizacion']) {
                            titulo_error = 'Error de Autorización';
                            mensaje_error = errores['id_autorizacion'];
                        } else {
                            // Concatenar todos los errores del objeto
                            titulo_error = 'Campos con error';
                            mensaje_error = Object.values(errores).join('\n');
                        }
                    } else if (response['error_code'] === 'SESSION_EXPIRED') {
                        titulo_error = 'Sesión Expirada';
                        mensaje_error = 'Debe autorizar la apertura de talonarios desde su aplicación de su teléfono.';
                    } else if (mensaje_error.includes('autorizacion') || mensaje_error.includes('autorización')) {
                        titulo_error = 'Autorización Requerida';
                        mensaje_error = 'Debe autorizar desde su aplicación móvil antes de generar certificados.';
                    }

                    swal({
                        title: titulo_error,
                        text: mensaje_error,
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }


            }
        })
        .fail(function(e) {
            console.log("error en AJAX");
            console.log(e);

            swal({
                title: "Error de Conexión",
                text: "Ocurrió un problema al conectar con el servidor. Intenta nuevamente.",
                icon: "error",
                buttons: "Aceptar",
            })

        })
    };

     // Función para agregar adjuntos al div de indicaciones
    function agregarAdjuntoAlDiv(nombre_archivo, url_pdf) {
        // Mostrar el div de adjuntos si está oculto
        $('#archivos_adjuntos_ficha_atencion').removeClass('d-none');

        // Crear el botón del PDF
        let boton_pdf = `
            <button type="button" class="btn btn-sm btn-outline-info me-2" onclick="abrirAdjunto('${url_pdf}')">
                <i class="feather icon-file-pdf"></i> ${nombre_archivo}.pdf
            </button>
        `;

        // Insertar antes del botón "+ Agregar adjunto"
        $('#adjuntos_indicaciones .btn-success').before(boton_pdf);
    }

    // Función para abrir el adjunto
    function abrirAdjunto(url_pdf) {
        Fancybox.show(
            [
                {
                    src: url_pdf,
                    type: "iframe",
                    preload: false,
                },
            ]
        );
    }

    function ver_pdf_informe_medico_alta(id_ficha_atencion, tipo)
    {

        let url = "{{ route('pdf.informe_medico') }}";
        Fancybox.show(
            [
                {
                src: '{{ route("pdf.informe_medico") }}?id_ficha_atencion='+id_ficha_atencion+'&id_tipo_informe='+tipo,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

        function enviar_alta_medica_email()
        {
            let id_alta_medica_email = $('#id_alta_medica_email').val();

            // ✅ Validar que el certificado esté registrado
            if (!id_alta_medica_email) {
                swal({
                    title: "Información",
                    text: "El certificado de alta aún no ha sido registrado. Por favor, haga clic en 'Generar Certificado de Alta' primero.",
                    icon: "info",
                });
                return;
            }

            let url = "{{ route('ficha_medica.enviar_alta_medica_email') }}";

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_alta_medica_email: id_alta_medica_email,
                },
            })
            .done(function(response) {
                console.log(response);
                if (response != '') {
                    console.log(response);

                    $('#mensaje').removeClass('alert-success');
                    $('#mensaje').removeClass('alert-danger');
                    $('#mensaje').hide();

                    if(response['estado'] == '1')
                    {
                        $('#mensaje').addClass('alert-success');
                        $('#mensaje').removeClass('alert-danger');
                        $('#mensaje').html('Correo enviado exitosamente. <i class="fas fa-check"></i>');
                        $('#mensaje').show();
                    }
                    else
                    {
                        $('#mensaje').addClass('alert-danger');
                        $('#mensaje').removeClass('alert-success');
                        $('#mensaje').html('Error al enviar el correo. <i class="fas fa-times"></i>');
                        $('#mensaje').show();
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
                $('#mensaje').addClass('alert-danger');
                $('#mensaje').removeClass('alert-success');
                $('#mensaje').html('Error al enviar el correo. <i class="fas fa-times"></i>');
                $('#mensaje').show();
            });
        }

</script>
