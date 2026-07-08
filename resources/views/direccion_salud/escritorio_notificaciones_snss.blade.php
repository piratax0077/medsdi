@extends('template.direccion_salud.template')

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Notificaciones y Resoluciones SNSS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!--Cierre: Header-->
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header bg-white py-3  justify-content-between">
                            <div class="float-left d-inline">
                            <h4 class="text-dark f-20">Notificaciones SNSS - Ministerio de Salud</h4>
                            </div>
                            <div class="d-inline float-right">
                                <button type="button" class="btn btn-info btn-sm" onclick="enviar_mensaje_a_profesional()"><i class="feather icon-mail"></i> Enviar mensaje</button>
                                <button type="button" class="btn btn-purple btn-sm" onclick="enviar_mensaje_difusion()"><i class="feather icon-mail"></i> Enviar difusión</button>
                                <button type="button" class="btn btn-secondary btn-sm mr-2" onclick="location.reload()"><i class="feather icon-refresh-cw"></i> Actualizar</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="historial_mensajes"
                                class="display table table-striped dt-responsive nowrap table-xs"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        {{--  <th class="text-wrap align-middle" hidden="hidden">Nº de Orden</th>  --}}
                                        <th class="align-middle">Fecha</th>
                                        <th class="align-middle">Remitente</th>
                                        <th class="align-middle">Nº Resolución</th>
                                        <th class="align-middle">Asunto</th>
                                        <th class="align-middle">Tipo SNSS</th>
                                        <th class="align-middle">Área / Destino</th>
                                        <th class="align-middle">Estado</th>
                                        <th class="align-middle">Ver</th>
                                        <th class="align-middle">Eliminar</th>
                                        <th class="align-middle">Descargar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_mensajes_a_profesional">

                                    @if (isset($mis_mensajes) && count($mis_mensajes) > 0)
                                        @foreach ($mis_mensajes as $mensaje)
                                            <tr>
                                                {{--  <td class="text-wrap align-middle">{{ $mensaje->id }}</td>  --}}
                                                <td class="text-wrap align-middle" style="font-size:12px">
                                                    {{ $mensaje->created_at }}
                                                </td>

                                                <td class="align-middle" style="font-size:12px">
                                                    {{ $mensaje->remitente }}
                                                </td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>{{ $mensaje->datos_mensaje->mensaje }}</label></td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>{{ $mensaje->tipo_mensaje }}</label></td>
                                                <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar mensaje a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>-->
                                                 <!--<td class="align-middle text-center">Enviado</td>-->


                                                <td class="align-middle"><span id="estado-{{ $mensaje->id }}">{{ $mensaje->estado }}</span></td>
                                                <td class="align-middle"> <button class="btn btn-icon btn-warning"><i class="feather icon-mail" onclick="ver_mensaje({{ $mensaje->id  }})"></i></button><!--<img src="{{ asset('images/talk.png') }}" alt="Documento" height="35px">--></td>
                                                <td class="align-middle"><button class="btn btn-danger btn-icon btn-icon" onclick="eliminar_mensaje({{ $mensaje->id }})"><i class="feather icon-x"></i></button></td>
                                                <td class="align-middle"><button class="btn btn-icon btn-primary" onclick="descargar_mensaje({{ $mensaje->id }})"><i class="feather icon-download"></i></button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal: Nuevo Mensaje -->
    <div class="modal fade" id="modal_nuevo_mensaje" tabindex="-1" role="dialog" aria-labelledby="modalNuevoMensajeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="formNuevoMensaje" method="POST" action="{{ route('ministerio.notificaciones_snss.guardar') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalNuevoMensajeLabel">Nueva Notificación SNSS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="text" class="form-control form-control-sm" id="nm_fecha" name="fecha" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="floating-label-activo-sm">Remitente</label>
                                <input type="text" class="form-control form-control-sm" id="nm_remitente" name="remitente" value="{{ Auth::user()->name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="floating-label-activo-sm mb-3">Tipo de destinatarios / Público objetivo</label>
                            <div class="d-flex flex-wrap" style="gap:8px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input nm-grupo" id="nm_grp_profesionales" name="grupos[]" value="profesionales">
                                    <label class="custom-control-label" for="nm_grp_profesionales">Profesionales</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input nm-grupo" id="nm_grp_pacientes" name="grupos[]" value="pacientes">
                                    <label class="custom-control-label" for="nm_grp_pacientes">Ciudadanía / Pacientes</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input nm-grupo" id="nm_grp_asistentes" name="grupos[]" value="asistentes">
                                    <label class="custom-control-label" for="nm_grp_asistentes">Asistentes / Colaboradores</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input nm-grupo" id="nm_grp_admin" name="grupos[]" value="administrativos">
                                    <label class="custom-control-label" for="nm_grp_admin">Administrativos / Gestión</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">También puedes elegir destinatarios individuales abajo.</small>
                        </div>

                        <div class="form-group">
                            <label class="floating-label-activo-sm">Destinatarios individuales</label>
                            <select class="form-control select2" id="nm_destinatarios_individuales" name="destinatarios_individuales[]" multiple>
                                @isset($usuarios)
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->name }} ({{ $usuario->email }})</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-9">
                                <label class="floating-label-activo-sm">Buscar destinatario por RUT</label>
                                <input type="text" class="form-control form-control-sm" id="nm_buscar_rut" placeholder="Ej: 12.345.678-9" onkeypress="if(event.keyCode==13){ buscar_destinatario_por_rut(); }">
                            </div>
                            <div class="form-group col-3">
                                <label class="d-block">&nbsp;</label>
                                <button type="button" class="btn btn-info btn-block btn-sm" id="nm_btn_buscar_rut" onclick="buscar_destinatario_por_rut()"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="floating-label-activo-sm">Destinatarios añadidos</label>
                            <div id="nm_selected_destinatarios_container" class="d-flex flex-wrap" style="gap:8px;"></div>
                            <small class="form-text text-muted">Se añadirán los correos encontrados y se enviarán al backend.</small>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label class="floating-label-activo-sm">Tipo de Notificación</label>
                                <select class="form-control" name="tipo_notificacion" id="nm_tipo_notificacion">
                                    <option value="resolucion">Resolución</option>
                                    <option value="comunicado">Comunicado</option>
                                    <option value="alerta">Alerta</option>
                                    <option value="informacion">Información</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="floating-label-activo-sm">Nº Resolución / Identificador</label>
                                <input type="text" class="form-control" id="nm_num_resolucion" name="numero_resolucion" placeholder="Ej: SNSS-2026-0001">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Área / Servicio</label>
                            <input type="text" class="form-control" id="nm_area" name="area" placeholder="Ej: Vigilancia Epidemiológica, Regulación Sanitaria">
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Asunto</label>
                            <input type="text" class="form-control" id="nm_asunto" name="asunto" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Mensaje / Contenido</label>
                            <textarea class="form-control" id="nm_mensaje" name="mensaje" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Adjuntar archivos</label>
                            <div id="dropzoneArchivos" class="dz-custom"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
      <!-- MODAL A PROFESIONAL -->
    <div class="modal fade" id="modal_mensaje_a_profesional" tabindex="-1" role="dialog" aria-labelledby="modal_mensaje_a_profesional" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_mensaje()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-4">
                            <label class="floating-label-activo-sm">Fecha</label>
                             <input type="text" class="form-control form-control-sm" id="fecha_msj" name="fecha_msj" disabled>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-8">
                            <label class="floating-label-activo-sm">Remitente</label>
                             <input type="text" class="form-control form-control-sm" id="remitente_msj" name="remitente_msj" disabled>
                        </div>
                         <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Titulo</label>
                             <input type="text" class="form-control form-control-sm" id="titulo_msj" name="titulo_msj" disabled>
                        </div>
                         <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Asunto</label>
                             <input type="text" class="form-control form-control-sm" id="asunto_msj" name="asunto_msj" disabled>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Mensaje</label>
                            <textarea class="form-control" rows="10" onfocus="this.rows=12" onblur="this.rows=10;" id="mensaje_msj" name="mensaje_msj" disabled></textarea>
                        </div>

                        <!--<div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fecha_msj" name="fecha_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Remitente:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="remitente_msj" name="remitente_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Titulo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="titulo_msj" name="titulo_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Asunto:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="asunto_msj" name="asunto_msj" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mensaje:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="mensaje_msj" name="mensaje_msj" readonly></textarea>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cerrar_modal_mensaje();">Cerrar</button>
                </div>-->
            </div>
        </div>
    </div>
    <!-- MODAL MENSAJE A PROFESIONAL DE PROFESIONAL -->
    <div class="modal fade" id="modal_mensaje_a_profesional_de_profesional" tabindex="-1" role="dialog" aria-labelledby="modal_mensaje_a_profesional_de_profesional" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_mensaje_de_profesional()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-info mr-1 active" id="pills-nuevo_mensaje-tab" data-toggle="pill" href="#pills-nuevo_mensaje" role="tab" aria-controls="pills-nuevo_mensaje" aria-selected="true">
                                Nuevo Mensaje
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="btn btn-sm btn-outline-info mr-1 " id="pills-mensajes_recibidos-tab" data-toggle="pill" href="#pills-mensajes_recibidos" role="tab" aria-controls="pills-mensajes_recibidos" aria-selected="false">
                                Recepción de programas
                            </a>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        {{-- PESTAÑA NUEVO MENSAJE --}}
                        <div class="tab-pane fade show active " id="pills-nuevo_mensaje" role="tabpanel" aria-labelledby="pills-nuevo_mensaje-tab">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" id="fecha_msj_de_profesional" name="fecha_msj_de_profesional" value="<?php echo date('Y-m-d') ?>">
                                </div>
                                <div class="form-group col-sm-10 col-xl-7">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_int_rut" id="agregar_profesional_int_rut">
                                </div>
                                <div class="form-group col-sm-2 col-xl-1">
                                    <button type="button" class="btn btn-info btn-sm "  id="agregar_profesional_btn_buscar_rut" onclick="buscar_profesional();"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm">Remitente</label>
                                    @if(isset($profesional))
                                    <input type="text" class="form-control form-control-sm" id="remitente_a_profesional" name="remitente_a_profesional" value="{{  $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}" disabled>
                                    @else
                                    <input type="text" class="form-control form-control-sm" id="remitente_a_profesional" name="remitente_a_profesional" value="{{ Auth::user()->name }}" disabled>
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm">Receptor</label>
                                    <input type="text" class="form-control form-control-sm" id="receptor_a_profesional" name="receptor_a_profesional" disabled>
                                </div>
                                <input type="hidden" id="id_profesional" name="id_profesional" value="">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm">Titulo</label>
                                    <input type="text" class="form-control form-control-sm" id="titulo_msj_de_profesional" name="titulo_msj_de_profesional">
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm">Asunto</label>
                                    <input type="text" class="form-control form-control-sm" id="asunto_msj_de_profesional" name="asunto_msj_de_profesional">
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm">Mensaje</label>
                                    <textarea class="form-control" rows="10" onfocus="this.rows=12" onblur="this.rows=10;" id="mensaje_msj_de_profesional" name="mensaje_msj_de_profesional"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button class="btn btn-primary btn-sm float-right" onclick="enviar_mensaje_confirmar()">Enviar</button>
                                </div>
                            </div>
                        </div>
                        {{-- PESTAÑA HISTORIAL MENSAJES --}}
                        <div class="tab-pane" id="pills-mensajes_recibidos" role="tabpanel" aria-labelledby="pills-mensajes_recibidos-tab">
                            <h5>Historial de mensajes</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    // autodiscover elementos y plugins para evitar errores si no están presentes en la página
     $(document).ready(function()
        {


            $("#agregar_profesional_int_rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            // Inicializar select2 para modal nuevo mensaje (si existe)
            if ($('#nm_destinatarios_individuales').length){
                $('#nm_destinatarios_individuales').select2({ width: '100%', placeholder: 'Selecciona destinatarios individuales' });
            }

            // Inicializar RUT para buscador de destinatarios individuales
            if ($('#nm_buscar_rut').length){
                $('#nm_buscar_rut').rut({
                    formatOn: 'keyup',
                    minimumLength: 2,
                    validateOn: 'change',
                    useThousandsSeparator : false
                });
            }

            // Inicializar Dropzone para adjuntos del nuevo mensaje
            if (typeof Dropzone !== 'undefined' && $('#dropzoneArchivos').length){
                // Evitar doble inicialización; si otra parte ya attached, reutilizarla
                if (!nmDropzone){
                    var existingDz = null;
                    try{
                        if (typeof Dropzone.forElement === 'function'){
                            existingDz = Dropzone.forElement('#dropzoneArchivos');
                        }
                    }catch(e){ existingDz = null; }

                    if (!existingDz && Dropzone.instances && Dropzone.instances.length){
                        for (var i = 0; i < Dropzone.instances.length; i++){
                            try{
                                var inst = Dropzone.instances[i];
                                if (inst && inst.element && (inst.element.id === 'dropzoneArchivos' || inst.element === document.getElementById('dropzoneArchivos'))){
                                    existingDz = inst;
                                    break;
                                }
                            }catch(e){}
                        }
                    }

                    // Asegurar instancia (nueva o existente) y adjuntar handlers
                    try{
                        // siempre usar la misma ruta que el formulario para que backend reciba archivos y campos
                        var dzUrl = "{{ route('ministerio.notificaciones_snss.guardar') }}";

                        if (existingDz){
                            nmDropzone = existingDz;
                            $('#dropzoneArchivos').addClass('dropzone');
                            if(nmDropzone && nmDropzone.options){
                                nmDropzone.options.dictDefaultMessage = nmDropzone.options.dictDefaultMessage || 'Arrastra archivos aquí o haz clic para seleccionar';
                                nmDropzone.options.url = nmDropzone.options.url || dzUrl;
                            }
                        } else {
                            $('#dropzoneArchivos').addClass('dropzone');
                            nmDropzone = new Dropzone('#dropzoneArchivos', {
                                url: dzUrl,
                                autoProcessQueue: false,
                                uploadMultiple: true,
                                parallelUploads: 10,
                                paramName: 'files[]',
                                addRemoveLinks: true,
                                headers: {
                                    'X-CSRF-TOKEN': CSRF_TOKEN
                                },
                                dictDefaultMessage: 'Arrastra archivos aquí o haz clic para seleccionar',
                            });
                        }

                        // Adjuntar handlers si no están ya presentes
                        if(nmDropzone){
                            if(!nmDropzone._nm_handlers_attached){
                                nmDropzone.on('sendingmultiple', function(files, xhr, formData) {
                                    console.log('Dropzone: sendingmultiple, files:', files);
                                    formData.append('_token', CSRF_TOKEN);
                                    // Grupos
                                    $('.nm-grupo:checked').each(function(){ formData.append('grupos[]', $(this).val()); });
                                    // Destinatarios individuales (IDs desde select)
                                    let recs = $('#nm_destinatarios_individuales').val() || [];
                                    recs.forEach(function(r){ formData.append('destinatarios_individuales[]', r); });
                                    // Campos adicionales
                                    formData.append('asunto', $('#nm_asunto').val());
                                    formData.append('mensaje', $('#nm_mensaje').val());
                                    formData.append('tipo_notificacion', $('#nm_tipo_notificacion').val());
                                    formData.append('numero_resolucion', $('#nm_num_resolucion').val());
                                    formData.append('area', $('#nm_area').val());
                                    formData.append('fecha', $('#nm_fecha').val());
                                    formData.append('remitente', $('#nm_remitente').val());
                                    // Correos añadidos manualmente
                                    if (window.nm_selected_destinatarios && window.nm_selected_destinatarios.length){
                                        window.nm_selected_destinatarios.forEach(function(e){ formData.append('destinatarios_emails[]', e); });
                                    }
                                    // Debug: listar entries del FormData (útil en DevTools)
                                    try{
                                        for (var pair of formData.entries()){
                                            console.log('formData entry:', pair[0], pair[1]);
                                        }
                                    }catch(err){ console.log('FormData entries no disponibles en este navegador', err); }
                                });

                                nmDropzone.on('successmultiple', function(files, response){
                                    console.log('Dropzone successmultiple raw response:', response);
                                    var resp;
                                    try{ resp = (typeof response === 'object') ? response : JSON.parse(response); }catch(e){ resp = response; }
                                    console.log('Dropzone parsed response:', resp);
                                    if(resp && (resp.estado === 1 || resp.success === true)){
                                        swal('Éxito','Mensaje enviado correctamente','success');
                                        $('#modal_nuevo_mensaje').modal('hide');
                                        nmDropzone.removeAllFiles(true);
                                     // location.reload();
                                    } else {
                                        var msg = (resp && resp.mensaje) ? resp.mensaje : (resp && resp.error) ? resp.error : JSON.stringify(resp);
                                        console.warn('Dropzone: servidor respondió con error lógico:', resp);
                                        swal('Error','Error al enviar mensaje: '+msg,'error');
                                    }
                                });

                                nmDropzone.on('errormultiple', function(files, response, xhr){
                                    console.error('Dropzone errormultiple, files:', files, 'response:', response, 'xhr:', xhr);
                                    var text = '';
                                    try{ text = (typeof response === 'string') ? response : JSON.stringify(response); }catch(e){ text = String(response); }
                                    swal('Error','Fallo al subir archivos: '+text,'error');
                                });

                                // Single-file error handler
                                nmDropzone.on('error', function(file, resp, xhr){
                                    console.error('Dropzone error (single)', file, resp, xhr);
                                });

                                nmDropzone.on('errormultiple', function(files, response){
                                    console.log('Dropzone error', response);
                                    swal('Error','Fallo al subir archivos','error');
                                });

                                nmDropzone._nm_handlers_attached = true;
                            }
                        }
                    }catch(err){
                        console.warn('Error asegurando Dropzone:', err);
                    }
                }
            }

            // Manejar envío del formulario: si hay archivos, procesar cola; si no, enviar via AJAX
            $('#formNuevoMensaje').on('submit', function(e){
                e.preventDefault();
                let $form = $(this);
                // validar campos básicos
                if($('#nm_asunto').val().trim() === '' || $('#nm_mensaje').val().trim() === ''){
                    return swal('Campos requeridos','Asunto y mensaje son obligatorios','error');
                }

                // validar al menos un destinatario (grupo, select2 o correos añadidos manualmente)
                var gruposCount = $('.nm-grupo:checked').length || 0;
                var selectVals = ($('#nm_destinatarios_individuales').val() || []);
                var manualCount = (window.nm_selected_destinatarios && window.nm_selected_destinatarios.length) ? window.nm_selected_destinatarios.length : 0;
                if (gruposCount === 0 && selectVals.length === 0 && manualCount === 0){
                    return swal('Campos requeridos','Debe seleccionar al menos un destinatario (grupo, individual o por RUT)','error');
                }

                if(nmDropzone && nmDropzone.getAcceptedFiles().length > 0){
                    // prevenir envío si no hay destinatarios (doble chequeo)
                    if (gruposCount === 0 && selectVals.length === 0 && manualCount === 0){
                        return swal('Campos requeridos','Debe seleccionar al menos un destinatario antes de subir archivos','error');
                    }

                    // Construir FormData manualmente para asegurar formato esperado por Laravel
                    var fd = new FormData($form[0]);
                    // Asegurar que no existan inputs duplicados
                    fd.delete('destinatarios_emails[]');
                    if(window.nm_selected_destinatarios && window.nm_selected_destinatarios.length){
                        window.nm_selected_destinatarios.forEach(function(e){ fd.append('destinatarios_emails[]', e); });
                    }
                    // Añadir destinatarios seleccionados por select2
                    (selectVals || []).forEach(function(id){ fd.append('destinatarios_individuales[]', id); });

                    // Adjuntar archivos desde Dropzone accepted files
                    nmDropzone.getAcceptedFiles().forEach(function(file){
                        fd.append('files[]', file, file.name);
                    });

                    console.log('Enviando FormData manual con archivos, entries:');
                    try{ for (var pair of fd.entries()){ console.log(pair[0], pair[1]); } }catch(e){}

                    $.ajax({
                        url: $form.attr('action'),
                        type: 'POST',
                        data: fd,
                        processData: false,
                        contentType: false,
                        headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
                        success: function(resp){
                            console.log('Respuesta envío con archivos:', resp);
                            if(resp && (resp.estado === 1 || resp.success === true || (resp.inputs))){
                                swal('Éxito','Mensaje enviado correctamente','success');
                                $('#modal_nuevo_mensaje').modal('hide');
                                nmDropzone.removeAllFiles(true);
                             // location.reload();
                            } else {
                                swal('Error','Error al enviar mensaje: '+(resp && resp.mensaje ? resp.mensaje : JSON.stringify(resp)),'error');
                            }
                        },
                        error: function(err){
                            console.error('Error AJAX subida archivos', err);
                            var text = '';
                            try{ text = err.responseText || JSON.stringify(err); }catch(e){ text = String(err); }
                            swal('Error','Error al subir archivos: '+text,'error');
                        }
                    });
                } else {
                    // enviar sin archivos
                    // insertar correos manuales como inputs ocultos antes de serializar
                    $('input[name="destinatarios_emails[]"]').remove();
                    if(window.nm_selected_destinatarios && window.nm_selected_destinatarios.length){
                        window.nm_selected_destinatarios.forEach(function(e){
                            $form.append(`<input type="hidden" name="destinatarios_emails[]" value="${e}">`);
                        });
                    }
                    let data = $form.serialize();
                    $.ajax({
                        url: $form.attr('action'),
                        type: 'POST',
                        data: data,
                        success: function(resp){
                            console.log('Respuesta envío sin archivos:', resp);
                            if(resp && (resp.estado === 1 || resp.success === true)){
                                swal('Éxito','Mensaje enviado correctamente','success');
                                $('#modal_nuevo_mensaje').modal('hide');
                             // location.reload();
                            } else {
                                swal('Error','Error al enviar mensaje','error');
                            }
                        },
                        error: function(err){
                            console.log(err);
                            swal('Error','Error en la solicitud','error');
                        }
                    });
                }
            });

            // Inicializar DataTable para historial_mensajes con reintentos si el plugin no está aún cargado
            function initHistorialDataTable(attempts){
                attempts = attempts || 0;
                if (!$('#historial_mensajes').length) return;
                if (typeof $.fn.DataTable === 'undefined'){
                    if (attempts < 5){
                        console.warn('DataTables no encontrado, reintentando...', attempts+1);
                        setTimeout(function(){ initHistorialDataTable(attempts+1); }, 300);
                    } else {
                        console.error('DataTables no está disponible después de varios intentos.');
                    }
                    return;
                }

                // destruir instancia previa si existe
                if ($.fn.DataTable.isDataTable('#historial_mensajes')){
                    $('#historial_mensajes').DataTable().destroy();
                }
                $('#historial_mensajes').DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [[0, 'desc']],
                    lengthMenu: [[10,25,50,100], [10,25,50,100]],
                    columnDefs: [
                        { orderable: false, searchable: false, targets: [5,6,7] }
                    ],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
                        paginate: {
                            previous: "Anterior",
                            next: "Siguiente"
                        },
                        search: "Buscar:",
                        lengthMenu: "Mostrar _MENU_ registros",
                        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        infoEmpty: "Mostrando 0 a 0 de 0 registros",
                        zeroRecords: "No se encontraron registros coincidentes",
                    }
                });
            }
            initHistorialDataTable();



        });
    function ver_mensaje(id){
        // mostrar el modal
        $.ajax({
            url: "{{ URL('Profesional/ver_mensaje') }}"+"/"+id,
            type: "get",
            success: function(response){
                let mensaje = response;
                console.log(mensaje);
                // abrir modal
                $('#modal_mensaje_a_profesional').modal('show');
                $('#fecha_msj').val(mensaje.fecha_emision);
                $('#remitente_msj').val(mensaje.remitente);
                $('#titulo_msj').val(mensaje.datos_mensaje.titulo);
                $('#asunto_msj').val(mensaje.datos_mensaje.asunto);
                $('#mensaje_msj').val(mensaje.datos_mensaje.mensaje);
                $('#estado-'+id).text('LEIDO');
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function cerrar_modal_mensaje(){
        $('#modal_mensaje_a_profesional').modal('hide');
    }

    function cerrar_modal_mensaje_de_profesional(){
        $('#modal_mensaje_a_profesional_de_profesional').modal('hide');
    }

    function eliminar_mensaje(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este mensaje",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ URL('Profesional/eliminar_mensaje') }}"+"/"+id,
                    type: "get",
                    success: function(response){
                        console.log(response);
                        if(response.estado == 1){
                            let mensajes = response.mensajes;
                            console.log(mensajes);
                            $('#tbody_mensajes_a_profesional').empty();
                            mensajes.forEach(mensaje => {
                                $('#tbody_mensajes_a_profesional').append(`
                                    <tr>
                                        <td class="text-wrap text-center align-middle" style="font-size:12px">${mensaje.created_at}</td>
                                        <td class="align-middle" style="font-size:12px">${mensaje.remitente}</td>
                                        <td class="align-middle text-wrap" style="font-size:10px"><label>${mensaje.datos_mensaje.mensaje}</label></td>
                                        <td class="align-middle text-wrap" style="font-size:10px"><label>${mensaje.tipo_mensaje}</label></td>
                                        <td class="align-middle"><span id="estado-${mensaje.id}">${mensaje.estado}</span></td>
                                        <td class="align-middle"> <div style="cursor: pointer;" onclick="ver_mensaje(${mensaje.id})"><img src="{{ asset('images/talk.png') }}" alt="Documento" height="35px"></div></td>
                                        <td class="align-middle"><button class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_mensaje(${mensaje.id})"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                `);
                            });
                            swal("El mensaje ha sido eliminado", {
                                icon: "success",
                            });
                            //location.reload();
                        }else{
                            swal("Error al eliminar el mensaje", {
                                icon: "error",
                            });
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            } else {
                swal("El mensaje no ha sido eliminado");
            }
        });
    }

    function descargar_mensaje(id){
        // confirmar la descarga con swal
        swal({
            title: "¿Estás seguro?",
            text: "Una vez descargado, no podrás recuperar este mensaje",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((descargar) => {
            if (descargar) {
                descargar_mensaje_confirmar(id);
            } else {
                console.log("No se descargó el mensaje");
            }
        });
    }

    function descargar_mensaje_confirmar(id) {
        $.ajax({
            url: "{{ URL('Profesional/descargar_mensaje') }}"+"/"+id,
            type: "get",
            success: function(response) {
                console.log(response);
                if (response.estado == 1) {
                    let mensaje = response.mensaje;
                    let { jsPDF } = window.jspdf;
                    let doc = new jsPDF();

                    // Añadir el mensaje al documento PDF
                    doc.text(mensaje.datos_mensaje.mensaje, 10, 10,{
                        align: "left",
                        maxWidth: 190
                    });


                    // Descargar el PDF
                    doc.save(mensaje.datos_mensaje.titulo + ".pdf");
                } else {
                    swal("Error al descargar el mensaje", {
                        icon: "error",
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function enviar_mensaje_difusion(){
        // prefill fecha y remitente
        const hoy = new Date();
        const dd = String(hoy.getDate()).padStart(2, '0');
        const mm = String(hoy.getMonth() + 1).padStart(2, '0');
        const yyyy = hoy.getFullYear();
        $('#nm_fecha').val(dd + '/' + mm + '/' + yyyy);
        $('#nm_remitente').val('{{ Auth::user()->name }}');

        // inicializar select2 en caso de que no esté
        if ($('#nm_destinatarios_individuales').length && !$('#nm_destinatarios_individuales').hasClass('select2-hidden-accessible')){
            $('#nm_destinatarios_individuales').select2({ width: '100%', placeholder: 'Selecciona destinatarios individuales' });
        }

        // mostrar modal
        $('#modal_nuevo_mensaje').modal('show');
    }

    // Dropzone instance para nuevo mensaje
    var nmDropzone = null;

    function enviar_mensaje_a_profesional(){
        // abrir modale
        $('#modal_mensaje_a_profesional_de_profesional').modal('show');
    }

    function enviar_mensaje_confirmar(){
        let fecha = $('#fecha_msj_de_profesional').val();
        let remitente = $('#remitente_a_profesional').val();
        let titulo = $('#titulo_msj_de_profesional').val();
        let asunto = $('#asunto_msj_de_profesional').val();
        let msj = $('#mensaje_msj_de_profesional').val();

        let id_profesional = $('#id_profesional').val();

        let valido = 1;
        let mensaje = '';

        if(fecha == ''){
            valido = 0;
            mensaje += "<li>Debe ingresar fecha</li>";
        }
        if(remitente == ''){
            valido = 0;
            mensaje += "<li>Debe ingresar remitente</li>";
        }
        if(titulo == ''){
            valido = 0;
            mensaje += "<li>Debe ingresar titulo</li>";
        }
        if(asunto == ''){
            valido = 0;
            mensaje += "<li>Debe ingresar asunto</li>";
        }
        if(msj ==''){
            valido = 0;
            mensaje += "<li>Debe ingresar mensaje</li>";
        }

        if(valido == 0){
            return swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

        let data = {
            id_profesional_mensaje: id_profesional,
            fecha: fecha,
            remitente: remitente,
            titulo: titulo,
            detalle: asunto,
            mensaje: msj,
            _token: CSRF_TOKEN,
        }

        console.log(data);

        let url = "{{ ROUTE('mensaje_profesional') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        title:'Exito',
                        text:'Su mensaje se ha enviado con éxito.',
                        icon:'success'
                    })
                }else{
                    swal({
                        title:'Error',
                        text:'Su mensaje se ha enviado con éxito.',
                        icon:'error'
                    })
                }
                $('#modal_mensaje_a_profesional').modal('hide');
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function enter_buscar_profesional(event){
        if(event.keyCode == 13)
            buscar_profesional();
    }



        function buscar_profesional(){

            let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();

            if(id_lugar_atencion == '')
            {
                swal({
                    title: "Debe seleccionar una sucursal",
                    icon: "error",
                });
                return false;
            }

            //$('#agregar_profesional_btn_buscar_rut').attr('disabled', 'disabled');
            var rut = $('#agregar_profesional_int_rut').val();
            if(rut == ''){
                swal({
                    title: "Debe ingresar un RUT",
                    icon: "error",
                });
                return false;
            }

            // Verificar si el RUT ingresado contiene un guion
            if (!rut.includes('-')) {
                swal({
                    title: "El RUT debe contener un guion antes del dígito verificador",
                    icon: "error",
                });
                return false;
            }


            // Suponiendo que 'rut' es tu variable que contiene el RUT ingresado
            rut = rut.replace(/\./g, ''); // Limpiar el RUT de puntos
            console.log(rut);
            // agregar digito verificador


            if(!$.validateRut(rut))
            {
                swal({
                    title: "Debe ingresar un RUT valido",
                    icon: "error",
                });
                return false;
            }

            let profesional_inter = $('#profesional_inter');
            profesional_inter.find('option').remove();

            let url = "{{ route('profesional.buscar') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    rut: rut
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    $('#id_profesional').val(data.registros[0].id);
                    $('#receptor_a_profesional').val(data.registros[0].nombre+' '+data.registros[0].apellido_uno+' '+data.registros[0].apellido_dos);
                    /** encontrado */
                    $('#agregar_profesional_texto_ver_nombre_profesional').html(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                    $('#agregar_profesional_texto_ver_telefono').html(data.registros[0].profesional_telefono_uno);
                    $('#agregar_profesional_texto_ver_email').html(data.registros[0].profesional_email);
                    $('#agregar_profesional_texto_ver_especialidad').html(data.registros[0].especialidad);
                    $('#agregar_profesional_ver_nombre_profesional').val(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                    $('#agregar_profesional_ver_telefono').val(data.registros[0].profesional_telefono_uno);
                    $('#agregar_profesional_ver_email').val(data.registros[0].profesional_email);
                    $('#agregar_profesional_id_profesional').val(data.registros[0].id);


                    $('#div_agregar_profesional_busqueda').hide();
                    $('#div_agregar_profesional_ver_info_prof').show();
                    $('#div_agregar_profesional_formulario_nuevo_prof').hide();
                }
                else
                {
                    /** no encontrado */
                    /** REALIZAR BUSQUEDA TABLA DE PROFESIONALES EXISTENTES EXTERNOS (POR HACER) */
                    let url = "{{ route('personas.buscador') }}";
                    $.ajax({
                        url: url,
                        type: "get",
                        data: {
                            rut: rut
                        },
                    })
                    .done(function(data2) {
                        if (data2.estado == 1)
                        {
                            /** encontrado */
                            $('#agregar_profesional_nuevo_apellido_p').val( data2.registros.appaterno );
                            $('#agregar_profesional_nuevo_apellido_m').val( data2.registros.apmaterno );
                            $('#agregar_profesional_nuevo_telefono').val( '' );
                            $('#agregar_profesional_nuevo_email').val( '' );

                            $('#div_agregar_profesional_busqueda').hide();
                            $('#div_agregar_profesional_ver_info_prof').hide();
                            $('#div_agregar_profesional_formulario_nuevo_prof').show();
                        }
                        else
                        {
                            /** no encontrado */
                            $('#agregar_profesional_nuevo_nombre').val();
                            $('#agregar_profesional_nuevo_apellido_p').val();
                            $('#agregar_profesional_nuevo_apellido_m').val();
                            $('#agregar_profesional_nuevo_telefono').val();
                            $('#agregar_profesional_nuevo_email').val();

                            $('#div_agregar_profesional_busqueda').hide();
                            $('#div_agregar_profesional_ver_info_prof').hide();
                            $('#div_agregar_profesional_formulario_nuevo_prof').show();

                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    // Lista global de destinatarios añadidos manualmente (correos)
    window.nm_selected_destinatarios = [];

    function buscar_destinatario_por_rut(){
        var rut = $('#nm_buscar_rut').val();
        if(!rut || rut.trim() === ''){
            swal('Error','Debe ingresar un RUT','error');
            return;
        }
        rut = rut.replace(/\./g, '');
        if(!$.validateRut(rut)){
            swal('Error','RUT inválido','error');
            return;
        }

        // intentar buscar en profesionales primero
        let url = "{{ route('profesional.buscar') }}";
        $.ajax({ url: url, type: 'get', data: { rut: rut } })
        .done(function(data){
            if(data && data.estado == 1 && data.registros && data.registros.length){
                let rec = data.registros[0];
                let email = rec.profesional_email || rec.professional_email || rec.email || '';
                let nombre = (rec.nombre || rec.profesionales_nombre || rec.profesionales_nombre) + ' ' + (rec.apellido_uno || '') + ' ' + (rec.apellido_dos || '');
                if(email && email.trim() !== ''){
                    addDestinatario(email, nombre);
                } else {
                    swal('Info','Registro encontrado pero sin correo','info');
                }
            } else {
                // intentar buscador general de personas
                let url2 = "{{ route('personas.buscador') }}";
                $.ajax({ url: url2, type: 'get', data: { rut: rut } })
                .done(function(d2){
                    if(d2 && d2.estado == 1 && d2.registros){
                        // Adaptar según estructura
                        let reg = d2.registros;
                        let email = reg.email || reg.correo || '';
                        let nombre = (reg.nombre || '') + ' ' + (reg.apellido_paterno||'');
                        if(email && email.trim() !== ''){
                            addDestinatario(email, nombre);
                        } else {
                            swal('Info','Persona encontrada pero sin correo','info');
                        }
                    } else {
                        swal('No encontrado','No se encontró destinatario con ese RUT','warning');
                    }
                })
                .fail(function(){ swal('Error','Error buscando persona','error'); });
            }
        })
        .fail(function(){ swal('Error','Error en la búsqueda','error'); });
    }

    function addDestinatario(email, nombre){
        email = (email||'').trim();
        if(!email) return;
        if(window.nm_selected_destinatarios.indexOf(email) !== -1) {
            swal('Info','Destinatario ya añadido','info');
            return;
        }
        window.nm_selected_destinatarios.push(email);
        // añadir chip visual
        let badge = $(`<div class="badge badge-secondary p-2" data-email="${email}">${nombre ? nombre+' ('+email+')' : email} <a href="#" class="text-white ml-2 nm-remove-dest" data-email="${email}">&times;</a></div>`);
        $('#nm_selected_destinatarios_container').append(badge);
        // manejar click eliminar
        badge.find('.nm-remove-dest').on('click', function(e){ e.preventDefault(); removeDestinatario($(this).data('email')); });
    }

    function removeDestinatario(email){
        var idx = window.nm_selected_destinatarios.indexOf(email);
        if(idx !== -1) window.nm_selected_destinatarios.splice(idx,1);
        $(`#nm_selected_destinatarios_container [data-email='${email}']`).remove();
    }
</script>
@endsection
