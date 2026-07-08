@extends('template.profesional.template')
@section('content')
<style>
    .ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid #545454;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
    }

    .busqueda-paciente-box {
        border: 1px solid #e6edf3;
        border-radius: 12px;
        background: #f8fbfd;
        padding: 16px 18px;
        margin-bottom: 18px;
    }

    .busqueda-paciente-box .titulo-busqueda {
        font-weight: 700;
        color: #263238;
        margin-bottom: 4px;
    }

    .busqueda-paciente-box .ayuda-busqueda {
        font-size: 12px;
        color: #6c757d;
        margin-bottom: 10px;
    }

    .busqueda-paciente-input-group .input-group-text {
        background: #fff;
        border-right: 0;
    }

    .busqueda-paciente-input-group input {
        border-left: 0;
    }

    .busqueda-paciente-input-group input:focus {
        box-shadow: none;
        border-color: #ced4da;
    }

    .badge-busqueda-token {
        display: inline-block;
        background: #eaf4ff;
        color: #2176bd;
        border-radius: 20px;
        padding: 4px 10px;
        font-size: 11px;
        margin: 3px 4px 0 0;
    }
    </style>
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Mis pacientes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mis pacientes </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- Tabla mis pacientes -->
            <!--Este formulario muestra los pacientes que alguna vez atendió el profesional (relacion: id_paciente/id_profesional)-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg mb-1 align-botton d-flex justify-content-between">
                                <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left">Mis pacientes</h4>
                                <button class="btn btn-purple btn-sm  d-inline float-md-right" onclick="enviar_difusion_pacientes()"><i class="feather icon-mail"></i>  Enviar mensaje de difusión a mis pacientes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="busqueda-paciente-box">
                            <div class="row align-items-end">
                                <div class="col-sm-12 col-md-8 col-lg-9">
                                    <div class="titulo-busqueda">
                                        <i class="feather icon-search"></i> Búsqueda de pacientes
                                    </div>
                                    <div class="ayuda-busqueda">
                                        Puede buscar por RUT, correo, teléfono o palabras separadas del nombre. Ejemplo: <strong>Juan Pérez</strong> encontrará <strong>Juan Carlos Pérez González</strong>.
                                    </div>
                                    <div class="input-group input-group-sm busqueda-paciente-input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="feather icon-user"></i></span>
                                        </div>
                                        <input type="text"
                                               id="busqueda_paciente_avanzada"
                                               class="form-control"
                                               autocomplete="off"
                                               placeholder="Buscar paciente por nombre, apellido, RUT, correo o teléfono...">
                                    </div>
                                    <div id="tokens_busqueda_paciente" class="mt-2"></div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3 mt-3 mt-md-0 text-md-right">
                                    <button type="button" class="btn btn-info btn-sm" id="btn_buscar_paciente">
                                        <i class="feather icon-search"></i> Buscar
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm" id="btn_limpiar_busqueda_paciente">
                                        <i class="feather icon-x"></i> Limpiar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <table id="pacientes-table" class="display table table-striped dt-responsive nowrap table-xs"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Paciente</th>
                                            <th>Nacimiento</th>
                                            <th>Convenio</th>
                                            <th>Contacto</th>
                                            <th>Acción</th>
											<th>Mensaje</th>
                                            {{-- <th>Usuario</th> --}}
                                            <th>Lugares de Atención</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cierre: Tabla mis pacientes -->
    </div>
    <!--Cierre: Container Completo-->

    <!--Modal envio de correo-->
    <div class="modal fade" id="modal_correo" tabindex="-1" role="dialog" aria-labelledby="enviar_email"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h4 class="modal-title text-white w-100 font-weight-bold">Nuevo Correo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form34">
                                @if (isset($p))
                                    {{ $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos }}
                                @endif
                            </label>
                        </i><br>
                        <i class="fas fa-envelope prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form29">
                                @if (isset($p))
                                    {{ $p->email }}
                                @endif

                            </label>
                        </i><br>

                        <i class="fas fa-tag prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form32">
                                Asunto
                            </label>
                        </i>
                        <input type="text" id="titulo_email" name="titulo_email" class="form-control validate"><br>

                        <i class="fas fa-pencil prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form8">
                                Mensaje
                            </label>
                        </i>
                        <textarea type="text" id="mensaje_email" name="mensaje_email" class="md-textarea form-control" rows="4"></textarea>

                    </div>

                </div>
                <div class="modal-footer bg-info d-flex justify-content-center">
                    <button class="btn btn-unique bg-white"
                        @if (isset($p)) onclick="enviar_email({{ $p->id }});" @endif>Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Presupuestos -->
    <div class="modal fade" id="modalPresupuestos" tabindex="-1" role="dialog" aria-labelledby="modalPresupuestosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Historial de Presupuestos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Profesional</th>
                                <th>Total</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyPresupuestos">
                            <tr><td colspan="5" class="text-center">Cargando...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--EMITIR DOCUMENTO-->
    <div class="modal fade" id="modal_emitir_doc" tabindex="-1" role="dialog" aria-labelledby="emitir_documento"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white w-100 font-weight-bold">Emitir documentos</h4>
                    <button type="button" class="close" onclick="$('#modal_emitir_doc').modal('hide');" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo">Seleccione documento</label>
                                <select class="form-control form-control-sm" onchange="cargarFormularioDocumento(this.value)">
                                    <option>Seleccione una opción</option>
                                    <option value="1">Certificado de reposo</option>
                                    <option value="2">Certificado de salud</option>
                                    <option value="3">Receta</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12" id="contenedor_formulario_documento">
                                <h5>DESPUES DE SELECCIONAR, ACÁ SE CARGA EL FORMULARIO DEL DOCUMENTO.</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-info"><i class="feather icon-check"></i> Emitir</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @include('app.profesional.modales.autorizacion_ficha_medica_unica')
    @include('app.profesional.modales.mensaje_paciente')
    @include('app.profesional.modales.mensaje_difusion_pacientes')
    @include('general.secciones_ficha.receta_examen.modal_recetario_sdi')

    {{-- Modal autorización talonarios --}}
    <div id="modal_autorizacion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Autorización</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_autorizacion();"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @if(!empty(session('lic_token')) && session('lic_estado') == 1)
                            <div class="col-md-12 text-center">
                                <button class="btn btn-xs btn-success" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();" disabled>Abrir mis Talonarios de Receta y Licencia</button>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button class="btn btn-xs btn-danger" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();">Cerrar mis Talonarios de Receta y Licencia</button>
                            </div>
                        @else
                            <div class="col-md-12 text-center">
                                <button class="btn btn-xs btn-success" id="modal_autorizacion_btn_solicitar" onclick="solicitar_autorizacion_licencia();">Abrir mis Talonarios de Receta y Licencia</button>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button class="btn btn-xs btn-danger" id="modal_autorizacion_btn_cancelar" onclick="cancelar_autorizacion_licencia();" disabled>Cerrar mis Talonarios de Receta y Licencia</button>
                            </div>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 text-center" id="modal_autorizacion_imagen"></div>
                        <div class="col-md-6" id="modal_autorizacion_mensaje"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" onclick="cerrar_autorizacion();">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="12">
    <input type="hidden" name="id_paciente" id="id_paciente" value="">
    <input type="hidden" id="id_paciente_fc" value="">
@endsection

@section('page-script')
<script>
$(document).ready(function() {
    let timeoutBusquedaPaciente = null;

    function normalizarTextoBusqueda(texto) {
        return (texto || '')
            .toString()
            .trim()
            .replace(/\s+/g, ' ');
    }

    function obtenerTerminosBusquedaPaciente() {
        let busqueda = normalizarTextoBusqueda($('#busqueda_paciente_avanzada').val());

        if (!busqueda) {
            return [];
        }

        return busqueda
            .split(' ')
            .map(function(item) { return item.trim(); })
            .filter(function(item) { return item.length > 0; });
    }

    function renderTokensBusquedaPaciente() {
        let terminos = obtenerTerminosBusquedaPaciente();
        let html = '';

        terminos.forEach(function(termino) {
            html += '<span class="badge-busqueda-token">' + termino + '</span>';
        });

        $('#tokens_busqueda_paciente').html(html);
    }

    let tablaPacientes = $('#pacientes-table').DataTable({
        processing: true,
        serverSide: true,
        searching: false, // Se oculta el buscador nativo y se usa el buscador avanzado.
        ajax: {
            url: '{{ route("profesional.mis_pacientes.ajax") }}',
            type: 'GET',
            data: function(d) {
                let busqueda = normalizarTextoBusqueda($('#busqueda_paciente_avanzada').val());
                let terminos = obtenerTerminosBusquedaPaciente();

                // Estos parámetros deben ser leídos en el backend para buscar palabra por palabra.
                // Ejemplo: "Juan Pérez" debe encontrar "Juan Carlos Pérez González".
                d.busqueda_paciente = busqueda;
                d.busqueda_paciente_terminos = terminos;
            }
        },
        columns: [
            { data: 'nombre_completo', name: 'nombre_completo' },
            { data: 'fecha_nacimiento', name: 'fecha_nacimiento' },
            { data: 'convenio', name: 'convenio' },
            { data: 'contacto', name: 'contacto' },
            { data: 'acciones', name: 'acciones', orderable: false, searchable: false },
            { data: 'mensaje', name: 'mensaje', orderable: false, searchable: false },
            { data: 'lugares_atencion', name: 'lugares_atencion', orderable: false, searchable: false },
        ],
        language: {
            emptyTable: 'No se encontraron pacientes',
            processing: 'Cargando pacientes...',
            lengthMenu: 'Mostrar _MENU_ registros',
            info: 'Mostrando _START_ a _END_ de _TOTAL_ pacientes',
            infoEmpty: 'Mostrando 0 pacientes',
            paginate: {
                first: 'Primero',
                last: 'Último',
                next: 'Siguiente',
                previous: 'Anterior'
            }
        }
    });

    $('#busqueda_paciente_avanzada').on('keyup', function(e) {
        renderTokensBusquedaPaciente();

        if (e.key === 'Enter') {
            tablaPacientes.ajax.reload();
            return;
        }

        clearTimeout(timeoutBusquedaPaciente);
        timeoutBusquedaPaciente = setTimeout(function() {
            tablaPacientes.ajax.reload();
        }, 450);
    });

    $('#btn_buscar_paciente').on('click', function() {
        renderTokensBusquedaPaciente();
        tablaPacientes.ajax.reload();
    });

    $('#btn_limpiar_busqueda_paciente').on('click', function() {
        $('#busqueda_paciente_avanzada').val('');
        $('#tokens_busqueda_paciente').html('');
        tablaPacientes.ajax.reload();
    });
});
</script>

<script>

    var _emitir_doc_paciente_id = null;

    function cargarFormularioDocumento(valor) {
        $('#contenedor_formulario_documento').html('');

        if (!valor || isNaN(valor)) return;

        if (valor == 1) {
            // Certificado de reposo
            $.get('{{ route("profesional.formulario_documento") }}', {
                id_paciente: _emitir_doc_paciente_id,
                tipo: 1
            })
            .done(function(html) {
                $('#modal_certificado_reposo').remove();
                $('body').append(html);
                $('#modal_emitir_doc').modal('hide');
                $('#modal_certificado_reposo').modal('show');
            })
            .fail(function() {
                $('#contenedor_formulario_documento').html('<p class="text-danger">Error al cargar el formulario.</p>');
            });
        }

        if (valor == 2) {
            // Informe médico
            $.get('{{ route("profesional.formulario_documento") }}', {
                id_paciente: _emitir_doc_paciente_id,
                tipo: 2
            })
            .done(function(html) {
                $('#modal_inf_medico').remove();
                $('body').append(html);
                $('#modal_emitir_doc').modal('hide');
                $('#modal_inf_medico').modal('show');
            })
            .fail(function() {
                $('#contenedor_formulario_documento').html('<p class="text-danger">Error al cargar el formulario.</p>');
            });
        }

        if (valor == 3) {
            // Receta
            $('#id_paciente_fc').val(_emitir_doc_paciente_id);
            $('#modal_emitir_doc').modal('hide');
            $('#indicar_recetario').modal('show');
        }
    }

    function registrar_cetificado_reposo() {

            let fecha_inicio_certificado  = $('#fecha_inicio_certificado').val();
            let fecha_termino_certificado = $('#fecha_termino_certificado').val();
            let hipotesis_certificado     = $('#hipotesis_certificado').val();
            let comentarios_certificado   = $('#comentarios_certificado').val();
            let url = "{{ route('profesional.registrar_certificado_reposo') }}";

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_paciente:              _emitir_doc_paciente_id,
                        fecha_inicio_certificado:  fecha_inicio_certificado,
                        fecha_termino_certificado: fecha_termino_certificado,
                        hipotesis_certificado:     hipotesis_certificado,
                        comentarios_certificado:   comentarios_certificado,
                    },
                })
                .done(function(response) {
                    console.log(response);
                    if (response != '') {
                        if (response['estado'] == '1') {
                            swal({
                                title: "Certificado de reposo",
                                text: "Registrado correctamente",
                                icon: "success",
                            }).then(function() {
                                $('#modal_certificado_reposo').modal('hide');
                                ver_pdf_certificado_reposo_paciente(response['id_certificado']);
                            });
                        } else {
                            swal({
                                title: "Error al registrar",
                                text: response['msj'],
                                icon: "error",
                            });
                        }
                    }
                })
                .fail(function(e) {
                    console.log(e);
                    swal({ title: "Error", text: "Error de conexión. Intente nuevamente.", icon: "error" });
                });
        };

        function ver_pdf_certificado_reposo_paciente(id_certificado)
        {
            Fancybox.show([
                {
                    src: '{{ route("profesional.pdf_certificado_reposo") }}?id_certificado=' + id_certificado,
                    type: "iframe",
                    preload: false,
                }
            ]);
        }

        function enviar_certificado_reposo_email() {
            let fecha_inicio_certificado  = $('#fecha_inicio_certificado').val();
            let fecha_termino_certificado = $('#fecha_termino_certificado').val();
            let hipotesis_certificado     = $('#hipotesis_certificado').val();
            let comentarios_certificado   = $('#comentarios_certificado').val();
            let email_destino             = $('#email_certificado_reposo').val();

            if (!email_destino) {
                swal({ title: 'Correo requerido', text: 'Ingrese un correo destinatario.', icon: 'warning' });
                return;
            }

            let urlRegistrar = '{{ route("profesional.registrar_certificado_reposo") }}';
            let urlEmail     = '{{ route("profesional.enviar_certificado_reposo_email") }}';

            // Mostrar loading
            swal({ title: 'Procesando...', text: 'Registrando y enviando certificado.', buttons: false, closeOnClickOutside: false });

            // Paso 1: registrar el certificado
            $.ajax({
                url: urlRegistrar,
                type: 'GET',
                data: {
                    id_paciente:               _emitir_doc_paciente_id,
                    fecha_inicio_certificado:  fecha_inicio_certificado,
                    fecha_termino_certificado: fecha_termino_certificado,
                    hipotesis_certificado:     hipotesis_certificado,
                    comentarios_certificado:   comentarios_certificado,
                },
            })
            .done(function(response) {
                if (!response || response['estado'] != '1') {
                    swal({ title: 'Error al registrar', text: response['msj'] || 'Error desconocido.', icon: 'error' });
                    return;
                }
                let id_certificado = response['id_certificado'];

                // Paso 2: enviar por email
                $.ajax({
                    url: urlEmail,
                    type: 'GET',
                    data: {
                        id_certificado: id_certificado,
                        email_destino:  email_destino,
                    },
                })
                .done(function(res) {
                    if (res && res['estado'] == '1') {
                        swal({
                            title: 'Certificado enviado',
                            text: 'Certificado registrado y enviado a ' + email_destino,
                            icon: 'success',
                        }).then(function() {
                            $('#modal_certificado_reposo').modal('hide');
                            ver_pdf_certificado_reposo_paciente(id_certificado);
                        });
                    } else {
                        swal({ title: 'Error al enviar correo', text: (res && res['msj']) || 'No se pudo enviar el email.', icon: 'error' });
                    }
                })
                .fail(function() {
                    swal({ title: 'Error', text: 'Error de conexión al enviar el correo.', icon: 'error' });
                });
            })
            .fail(function() {
                swal({ title: 'Error', text: 'Error de conexión. Intente nuevamente.', icon: 'error' });
            });
        }

    function enviar_mensaje_paciente(id_paciente){
        $('#modalMensajePaciente').modal('show');
        $('#id_paciente_mensaje').val(id_paciente);
    }

    function enviar_difusion_pacientes(){
        $('#modalMensajeDifusionPacientes').modal('show');
    }

    // Variables de autorización
    var lic_token  = '{{ session("lic_token") }}';
    var lic_estado = '{{ session("lic_estado") }}';

    // Al salir de la vista, cancelar la autorización automáticamente
    // para que al volver se exija nueva autorización
    window.addEventListener('beforeunload', function() {
        if (lic_token && lic_estado == 1) {
            fetch('{{ route("profesional.licencia.cancelar") }}', {
                method: 'GET',
                keepalive: true
            });
        }
    });

    function emitir_doc(id_paciente){
        _emitir_doc_paciente_id = id_paciente;
        // Si ya tiene autorización activa, abrir directo
        if (lic_token && lic_estado == 1) {
            $('#contenedor_formulario_documento').html('');
            $('#modal_emitir_doc').find('select').val('Seleccione una opción');
            $('#modal_emitir_doc').modal('show');
        } else {
            // Solicitar autorización primero
            $('#modal_autorizacion_imagen').html('');
            $('#modal_autorizacion_mensaje').html('');
            $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
            $('#modal_autorizacion_btn_cancelar').attr('disabled', true);
            $('#modal_autorizacion').modal('show');
        }
    }

    function cerrar_autorizacion() {
        $('#modal_autorizacion').modal('hide');
    }

    function solicitar_autorizacion_licencia() {
        $('#modal_autorizacion_btn_solicitar').attr('disabled', true);
        $('#modal_autorizacion_btn_cancelar').attr('disabled', true);

        $.ajax({
            url: '{{ route("profesional.licencia.solicitar") }}',
            type: 'GET',
            data: { id_lugar_atencion: $('#id_lugar_atencion').val() },
            success: function(data) {
                if (data && data.estado == 1) {
                    $('#modal_autorizacion_imagen').html('<img src="{{ asset("images/spinner.svg") }}" alt="Cargando">');
                    $('#modal_autorizacion_mensaje').html('<h3>En espera de Aprobación</h3>');
                    validar_autorizacion_licencia(data.log_users_devices.token);
                } else {
                    $('#modal_autorizacion_imagen').html('');
                    $('#modal_autorizacion_mensaje').html('<h3 class="text-danger">Problema al solicitar aprobación.</h3>');
                    $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
                }
            },
            error: function() {
                $('#modal_autorizacion_mensaje').html('<h3 class="text-danger">Error de conexión.</h3>');
                $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
            }
        });
    }

    function validar_autorizacion_licencia(token) {
        $.ajax({
            url: '{{ route("profesional.licencia.validar") }}',
            type: 'GET',
            data: { token: token },
            success: function(data) {
                $('#modal_autorizacion_mensaje').html('<h3>' + data.msj + '</h3>');

                if (data.estado == 0) {
                    // Pendiente — reintentar
                    setTimeout(function() {
                        validar_autorizacion_licencia(token);
                    }, 2000);

                } else if (data.estado == 1) {
                    // Aprobado
                    lic_token  = data.lic_token;
                    lic_estado = data.lic_estado;

                    $('#modal_autorizacion_imagen').html('<img class="img-fluid w-50" src="{{ asset("images/iconos/aprobacion.svg") }}" alt="Aprobado">');
                    $('#modal_autorizacion_btn_cancelar').attr('disabled', false);

                    // Esperar 2s, cerrar y abrir el modal de documento
                    setTimeout(function() {
                        $('#modal_autorizacion').modal('hide');
                        $('#contenedor_formulario_documento').html('');
                        $('#modal_emitir_doc').find('select').val('Seleccione una opción');
                        $('#modal_emitir_doc').modal('show');
                    }, 2000);

                } else if (data.estado == 2) {
                    // Rechazado
                    lic_token  = '';
                    lic_estado = '';
                    $('#modal_autorizacion_imagen').html('<img class="img-fluid w-50" src="{{ asset("images/iconos/error.svg") }}" alt="Rechazado">');
                    setTimeout(function() { $('#modal_autorizacion').modal('hide'); }, 3000);

                } else if (data.estado == 3) {
                    // Cancelado
                    lic_token  = '';
                    lic_estado = '';
                    $('#modal_autorizacion_imagen').html('<img class="img-fluid w-50" src="{{ asset("images/iconos/error.svg") }}" alt="Cancelado">');
                    setTimeout(function() { $('#modal_autorizacion').modal('hide'); }, 3000);
                }
            }
        });
    }

    function cancelar_autorizacion_licencia() {
        $.ajax({
            url: '{{ route("profesional.licencia.cancelar") }}',
            type: 'GET',
            success: function(data) {
                lic_token  = '';
                lic_estado = '';
                $('#modal_autorizacion_btn_solicitar').attr('disabled', false);
                $('#modal_autorizacion_btn_cancelar').attr('disabled', true);
                $('#modal_autorizacion_imagen').html('');
                $('#modal_autorizacion_mensaje').html('<h3>Talonarios cerrados.</h3>');
            }
        });
    }

    function verPresupuestos(idPaciente) {
        $('#modalPresupuestos').modal('show');
        $('#tbodyPresupuestos').html('<tr><td colspan="5" class="text-center">Cargando...</td></tr>');

        $.ajax({
            url: '{{ route("profesional.presupuestos.paciente") }}',
            method: 'GET',
            data: { id: idPaciente },
            success: function(response) {
                console.log(response);
                if (response.length > 0) {
                    let rows = '';
                    response.forEach((item, index) => {
                        item.valor_total = parseFloat(item.valor_total).toLocaleString('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        });
                        if(item.estado == 1){
                            item.estado = 'Pendiente';
                        } else if(item.estado == 0){
                            item.estado = 'Aceptado';
                        } else {
                            item.estado = 'Desconocido';
                        }
                        rows += `<tr>
                            <td>${index + 1}</td>
                            <td>${item.fecha}</td>
                            <td>${item.profesional_nombre} ${item.profesional_apellido_uno} ${item.profesional_apellido_dos}</td>
                            <td>${item.valor_total}</td>
                            <td>${item.estado}</td>
                        </tr>`;
                    });
                    $('#tbodyPresupuestos').html(rows);
                } else {
                    $('#tbodyPresupuestos').html('<tr><td colspan="5" class="text-center">Sin presupuestos</td></tr>');
                }
            },
            error: function() {
                $('#tbodyPresupuestos').html('<tr><td colspan="5" class="text-danger text-center">Error al cargar</td></tr>');
            }
        });
    }

</script>
@endsection
