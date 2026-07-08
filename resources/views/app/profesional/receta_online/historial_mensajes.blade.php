@extends('template.profesional.template')

@section('content')
<style>
    .msg-kpi-card {
        border: 1px solid #eef2f7;
        border-radius: 14px;
        background: #fff;
        padding: 16px;
        height: 100%;
        box-shadow: 0 4px 14px rgba(15, 23, 42, .04);
    }

    .msg-kpi-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        background: #eef7ff;
        color: #0d6efd;
    }

    .msg-list-title {
        font-weight: 700;
        color: #263238;
        margin-bottom: 2px;
    }

    .msg-preview {
        font-size: 12px;
        color: #6c757d;
        max-width: 420px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .msg-badge {
        font-size: 10px;
        padding: 5px 8px;
        border-radius: 20px;
    }

    .msg-actions .btn {
        margin: 1px;
    }

    .msg-detail-box {
        border: 1px solid #edf2f7;
        border-radius: 12px;
        background: #f8fbfd;
        padding: 14px;
    }

    .msg-body-preview {
        white-space: pre-wrap;
        font-size: 14px;
        line-height: 1.55;
    }
    /* Ajuste mínimo para usar el estilo nativo de Dropzone del template */
    #dropzone_mensaje_profesional {
        min-height: 120px;
        border: 2px dashed #b9d7f0;
        border-radius: 12px;
        background: #f8fbfd;
    }

    #dropzone_mensaje_profesional .dz-message {
        margin: 30px 0;
        color: #6c757d;
        font-size: 13px;
    }

</style>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Centro de mensajes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('profesional.index_receta_online') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">
                                    Receta Online
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Centro de mensajes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @php
            $recibidos = collect($mis_mensajes ?? []);
            $enviados = collect($mensajes_enviados ?? []);
            $noLeidos = $recibidos->filter(function($m) {
                return ($m->estado ?? null) === 0 || ($m->estado_texto ?? '') === 'No leído' || ($m->estado_texto ?? '') === 'NO LEÍDO';
            });
            $conAdjuntos = $recibidos->filter(function($m) {
                return isset($m->datos_mensaje->archivos) && is_array($m->datos_mensaje->archivos) && count($m->datos_mensaje->archivos) > 0;
            });
        @endphp

        <div class="row mb-3">
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="msg-kpi-card d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted f-12">Recibidos</div>
                        <h4 class="mb-0">{{ $recibidos->count() }}</h4>
                    </div>
                    <div class="msg-kpi-icon"><i class="feather icon-inbox"></i></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="msg-kpi-card d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted f-12">No leídos</div>
                        <h4 class="mb-0">{{ $noLeidos->count() }}</h4>
                    </div>
                    <div class="msg-kpi-icon" style="background:#fff3f3;color:#dc3545;"><i class="feather icon-mail"></i></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="msg-kpi-card d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted f-12">Enviados</div>
                        <h4 class="mb-0">{{ $enviados->count() }}</h4>
                    </div>
                    <div class="msg-kpi-icon" style="background:#f0fff7;color:#198754;"><i class="feather icon-send"></i></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="msg-kpi-card d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted f-12">Con adjuntos</div>
                        <h4 class="mb-0">{{ $conAdjuntos->count() }}</h4>
                    </div>
                    <div class="msg-kpi-icon" style="background:#fff8e6;color:#f0ad4e;"><i class="feather icon-paperclip"></i></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    <h4 class="text-c-blue f-22 mb-1">Mensajería profesional</h4>
                    <small class="text-muted">Administre mensajes recibidos, enviados y comunicaciones entre profesionales.</small>
                </div>
                <button class="btn btn-primary btn-sm mt-2 mt-md-0" onclick="enviar_mensaje_a_profesional()">
                    <i class="feather icon-edit-3"></i> Nuevo mensaje
                </button>
            </div>

            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="tabsMensajes" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-recibidos-link" data-toggle="pill" href="#tab-recibidos" role="tab">
                            <i class="feather icon-inbox"></i> Recibidos
                            @if($noLeidos->count() > 0)
                                <span class="badge badge-danger ml-1">{{ $noLeidos->count() }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-enviados-link" data-toggle="pill" href="#tab-enviados" role="tab">
                            <i class="feather icon-send"></i> Enviados
                            <span class="badge badge-light ml-1">{{ $enviados->count() }}</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-recibidos" role="tabpanel">
                        <table id="historial_mensajes" class="display table table-hover dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Mensaje</th>
                                    <th>Remitente</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_mensajes_a_profesional">
                                @forelse ($recibidos as $mensaje)
                                    @php
                                        $titulo = $mensaje->datos_mensaje->titulo ?? $mensaje->datos_mensaje->asunto ?? 'Sin título';
                                        $texto = $mensaje->datos_mensaje->mensaje ?? 'Sin mensaje';
                                        $estadoRaw = $mensaje->estado ?? null;
                                        $esNoLeido = ($estadoRaw === 0 || ($mensaje->estado_texto ?? '') === 'No leído' || ($mensaje->estado_texto ?? '') === 'NO LEÍDO');
                                        $tipoTexto = $mensaje->tipo_mensaje_texto ?? $mensaje->tipo_mensaje ?? 'Directo';
                                    @endphp
                                    <tr id="fila-mensaje-{{ $mensaje->id }}" class="{{ $esNoLeido ? 'font-weight-bold' : '' }}">
                                        <td class="align-middle">
                                            <div class="d-flex align-items-start">
                                                <div class="mr-2 mt-1">
                                                    <i class="feather {{ $esNoLeido ? 'icon-mail text-danger' : 'icon-mail text-muted' }}"></i>
                                                </div>
                                                <div>
                                                    <div class="msg-list-title">{{ $titulo }}</div>
                                                    <div class="msg-preview">{{ $texto }}</div>
                                                    @if(isset($mensaje->datos_mensaje->archivos) && is_array($mensaje->datos_mensaje->archivos) && count($mensaje->datos_mensaje->archivos) > 0)
                                                        <span class="badge badge-light mt-1"><i class="feather icon-paperclip"></i> {{ count($mensaje->datos_mensaje->archivos) }} adjunto(s)</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle" style="font-size:12px;">{{ $mensaje->remitente ?? 'No disponible' }}</td>
                                        <td class="align-middle"><span class="badge badge-info msg-badge">{{ $tipoTexto }}</span></td>
                                        <td class="align-middle">
                                            <span id="estado-{{ $mensaje->id }}" class="badge {{ $esNoLeido ? 'badge-danger' : 'badge-secondary' }} msg-badge">
                                                {{ $esNoLeido ? 'No leído' : 'Leído' }}
                                            </span>
                                        </td>
                                        <td class="align-middle" style="font-size:12px;">
                                            {{ $mensaje->fecha_envio ? \Carbon\Carbon::parse($mensaje->fecha_envio)->format('d/m/Y H:i') : \Carbon\Carbon::parse($mensaje->created_at)->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="align-middle text-center msg-actions">
                                            <button class="btn btn-icon btn-warning btn-sm" onclick="ver_mensaje({{ $mensaje->id }})" title="Ver mensaje">
                                                <i class="feather icon-eye"></i>
                                            </button>
                                            <button class="btn btn-icon btn-primary btn-sm" onclick="descargar_mensaje({{ $mensaje->id }})" title="Descargar PDF">
                                                <i class="feather icon-download"></i>
                                            </button>
                                            <button class="btn btn-icon btn-danger btn-sm" onclick="eliminar_mensaje({{ $mensaje->id }})" title="Eliminar">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            <i class="feather icon-inbox f-30 d-block mb-2"></i>
                                            No tiene mensajes recibidos.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="tab-enviados" role="tabpanel">
                        <table id="historial_mensajes_enviados" class="display table table-hover dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Mensaje</th>
                                    <th>Destinatario</th>
                                    <th>Tipo</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enviados as $mensaje)
                                    @php
                                        $titulo = $mensaje->datos_mensaje->titulo ?? $mensaje->datos_mensaje->asunto ?? 'Sin título';
                                        $texto = $mensaje->datos_mensaje->mensaje ?? 'Sin mensaje';
                                        $tipoTexto = $mensaje->tipo_mensaje_texto ?? $mensaje->tipo_mensaje ?? 'Directo';
                                        $destinatarioTexto = 'Destinatario no disponible';

                                        if(isset($mensaje->destinatarios) && is_array($mensaje->destinatarios) && count($mensaje->destinatarios) > 0) {
                                            $destinatarioTexto = collect($mensaje->destinatarios)->map(function($d) {
                                                return $d->nombre ?? $d->email ?? $d->rut ?? 'Destinatario';
                                            })->implode(', ');
                                        }
                                    @endphp
                                    <tr>
                                        <td class="align-middle">
                                            <div class="msg-list-title">{{ $titulo }}</div>
                                            <div class="msg-preview">{{ $texto }}</div>
                                        </td>
                                        <td class="align-middle" style="font-size:12px;">{{ $destinatarioTexto }}</td>
                                        <td class="align-middle"><span class="badge badge-success msg-badge">{{ $tipoTexto }}</span></td>
                                        <td class="align-middle" style="font-size:12px;">
                                            {{ $mensaje->fecha_envio ? \Carbon\Carbon::parse($mensaje->fecha_envio)->format('d/m/Y H:i') : \Carbon\Carbon::parse($mensaje->created_at)->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="align-middle text-center msg-actions">
                                            <button class="btn btn-icon btn-warning btn-sm" onclick="ver_mensaje({{ $mensaje->id }})" title="Ver mensaje">
                                                <i class="feather icon-eye"></i>
                                            </button>
                                            <button class="btn btn-icon btn-primary btn-sm" onclick="descargar_mensaje({{ $mensaje->id }})" title="Descargar PDF">
                                                <i class="feather icon-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            <i class="feather icon-send f-30 d-block mb-2"></i>
                                            No tiene mensajes enviados registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal ver mensaje --}}
<div class="modal fade" id="modal_mensaje_a_profesional" tabindex="-1" role="dialog" aria-labelledby="modal_mensaje_a_profesional" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title"><i class="feather icon-mail mr-1"></i> Detalle del mensaje</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_mensaje()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg-detail-box mb-3">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <small class="text-muted d-block">Fecha</small>
                            <strong id="fecha_msj">-</strong>
                        </div>
                        <div class="col-md-8 mb-2">
                            <small class="text-muted d-block">Remitente</small>
                            <strong id="remitente_msj">-</strong>
                        </div>
                        <div class="col-md-12 mb-2">
                            <small class="text-muted d-block">Título / Asunto</small>
                            <strong id="titulo_msj">-</strong>
                            <div class="text-muted" id="asunto_msj"></div>
                        </div>
                    </div>
                </div>
                <label class="floating-label-activo-sm">Mensaje</label>
                <div class="border rounded p-3 bg-white msg-body-preview" id="mensaje_msj">Seleccione un mensaje.</div>
                <div id="adjuntos_msj" class="mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal nuevo mensaje a profesional --}}
<div class="modal fade" id="modal_mensaje_a_profesional_de_profesional" tabindex="-1" role="dialog" aria-labelledby="modal_mensaje_a_profesional_de_profesional" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title"><i class="feather icon-edit-3 mr-1"></i> Nuevo mensaje a profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_mensaje_de_profesional()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-lg-4">
                        <label class="floating-label-activo-sm">Fecha</label>
                        <input type="date" class="form-control form-control-sm" id="fecha_msj_de_profesional" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group col-sm-10 col-lg-7">
                        <label class="floating-label-activo-sm">RUT profesional receptor</label>
                        <input type="text" class="form-control form-control-sm" id="agregar_profesional_int_rut" onkeypress="enter_buscar_profesional(event)">
                    </div>
                    <div class="form-group col-sm-2 col-lg-1 d-flex align-items-end">
                        <button type="button" class="btn btn-info btn-sm" id="agregar_profesional_btn_buscar_rut" onclick="buscar_profesional();">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm">Remitente</label>
                        @if(isset($profesional))
                            <input type="text" class="form-control form-control-sm" id="remitente_a_profesional" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}" disabled>
                        @else
                            <input type="text" class="form-control form-control-sm" id="remitente_a_profesional" value="{{ Auth::user()->name }}" disabled>
                        @endif
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm">Receptor</label>
                        <input type="text" class="form-control form-control-sm" id="receptor_a_profesional" disabled>
                        <input type="hidden" id="id_profesional" value="">
                    </div>

                    <div class="form-group col-sm-12 col-lg-6">
                        <label class="floating-label-activo-sm">Título</label>
                        <input type="text" class="form-control form-control-sm" id="titulo_msj_de_profesional" maxlength="150">
                    </div>
                    <div class="form-group col-sm-12 col-lg-6">
                        <label class="floating-label-activo-sm">Asunto</label>
                        <input type="text" class="form-control form-control-sm" id="asunto_msj_de_profesional" maxlength="150">
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm">Mensaje</label>
                        <textarea class="form-control" rows="7" id="mensaje_msj_de_profesional" maxlength="2000"></textarea>
                        <small class="text-muted">Máximo 2000 caracteres.</small>
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm">Adjuntos</label>
                        <div class="dropzone" id="dropzone_mensaje_profesional"></div>
                        <small class="text-muted">Opcional. Puede adjuntar hasta 5 archivos: imágenes o PDF.</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary btn-sm" id="btn_enviar_mensaje_profesional" onclick="enviar_mensaje_confirmar()">
                    <i class="feather icon-send"></i> Enviar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    var archivosMensajeProfesional = [];
    var dropzoneMensajeProfesional = null;

    // Importante: se desactiva de inmediato para evitar doble inicialización
    // cuando el contenedor usa la clase nativa "dropzone".
    if (typeof Dropzone !== 'undefined') {
        Dropzone.autoDiscover = false;
    }

    function resolverRutaTemporalDropzone(response) {
        if (!response) return null;

        if (typeof response === 'string') {
            return response;
        }

        return response.nombre_archivo
            || response.ruta
            || response.path
            || response.url
            || (response.proceso ? (response.proceso.nombre_archivo || response.proceso.ruta || response.proceso.path || response.proceso.url) : null)
            || (response.archivo ? (response.archivo.nombre_archivo || response.archivo.ruta || response.archivo.path || response.archivo.url) : null);
    }

    function inicializarDropzoneMensajeProfesional() {
        if (typeof Dropzone === 'undefined') {
            console.warn('Dropzone no está cargado en esta vista.');
            return;
        }

        Dropzone.autoDiscover = false;

        let elemento = document.querySelector('#dropzone_mensaje_profesional');

        if (!elemento) {
            return;
        }

        /*
         * Evita el error:
         * "Dropzone already attached"
         *
         * Esto puede ocurrir si:
         * - el template ya inicializó Dropzone automáticamente;
         * - la vista se cargó más de una vez;
         * - se llamó nuevamente a esta función al abrir el modal.
         */
        if (elemento.dropzone) {
            dropzoneMensajeProfesional = elemento.dropzone;
            return;
        }

        try {
            dropzoneMensajeProfesional = Dropzone.forElement(elemento);
            if (dropzoneMensajeProfesional) {
                return;
            }
        } catch (e) {
            // Dropzone.forElement lanza error si aún no existe instancia. Se continúa con la creación.
        }

        dropzoneMensajeProfesional = new Dropzone(elemento, {
            url: "{{ route('profesional.imagen.carga') }}",
            addRemoveLinks: true,
            uploadMultiple: false,
            parallelUploads: 5,
            maxFiles: 5,
            maxFilesize: 5,
            acceptedFiles: 'image/*,application/pdf',
            autoProcessQueue: true,
            dictDefaultMessage: 'Arrastre archivos aquí o haga clic para seleccionar',
            dictRemoveFile: 'Eliminar',
            dictCancelUpload: 'Cancelar',
            dictMaxFilesExceeded: 'No puedes subir más de 5 archivos',
            dictFileTooBig: 'El archivo es muy grande. Máximo 5 MB.',
            dictInvalidFileType: 'Tipo de archivo no permitido',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(file, response) {
                let rutaTemporal = resolverRutaTemporalDropzone(response);

                if (rutaTemporal) {
                    file.ruta_temporal = rutaTemporal;

                    if (!archivosMensajeProfesional.includes(rutaTemporal)) {
                        archivosMensajeProfesional.push(rutaTemporal);
                    }
                } else {
                    console.warn('No se pudo resolver la ruta temporal del archivo.', response);
                }
            },
            error: function(file, response) {
                console.error('Error al subir archivo:', response);
                swal('Error', 'No se pudo subir uno de los archivos adjuntos.', 'error');
            },
            removedfile: function(file) {
                if (file.ruta_temporal) {
                    archivosMensajeProfesional = archivosMensajeProfesional.filter(function(item) {
                        return item !== file.ruta_temporal;
                    });
                }

                if (file.previewElement) {
                    file.previewElement.remove();
                }
            }
        });
    }

    $(document).ready(function() {
        inicializarDropzoneMensajeProfesional();
        if ($.fn.DataTable) {
            // $('#historial_mensajes').DataTable({
            //     pageLength: 10,
            //     lengthChange: false,
            //     order: [],
            //     language: {
            //         search: 'Buscar:',
            //         zeroRecords: 'No se encontraron mensajes',
            //         paginate: { previous: 'Anterior', next: 'Siguiente' },
            //         info: 'Mostrando _START_ a _END_ de _TOTAL_ mensajes',
            //         infoEmpty: 'Sin mensajes'
            //     }
            // });

            $('#historial_mensajes_enviados').DataTable({
                pageLength: 10,
                lengthChange: false,
                order: [],
                language: {
                    search: 'Buscar:',
                    zeroRecords: 'No se encontraron mensajes enviados',
                    paginate: { previous: 'Anterior', next: 'Siguiente' },
                    info: 'Mostrando _START_ a _END_ de _TOTAL_ mensajes',
                    infoEmpty: 'Sin mensajes'
                }
            });
        }

        if ($.fn.rut) {
            $('#agregar_profesional_int_rut').rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator: false
            });
        }
    });

    function ver_mensaje(id) {
        $.ajax({
            url: "{{ URL('Profesional/ver_mensaje') }}" + '/' + id,
            type: 'get',
            success: function(response) {
                let mensaje = response || {};
                let datos = mensaje.datos_mensaje || {};

                $('#modal_mensaje_a_profesional').modal('show');
                $('#fecha_msj').text(mensaje.fecha_emision || mensaje.fecha_envio || mensaje.created_at || '-');
                $('#remitente_msj').text(mensaje.remitente || 'No disponible');
                $('#titulo_msj').text(datos.titulo || datos.asunto || 'Sin título');
                $('#asunto_msj').text(datos.asunto || '');
                $('#mensaje_msj').text(datos.mensaje || 'Sin mensaje');
                $('#estado-' + id).removeClass('badge-danger').addClass('badge-secondary').text('Leído');
                $('#fila-mensaje-' + id).removeClass('font-weight-bold');

                let adjuntosHtml = '';
                if (datos.archivos && Array.isArray(datos.archivos) && datos.archivos.length > 0) {
                    adjuntosHtml += '<hr><strong><i class="feather icon-paperclip"></i> Adjuntos (' + datos.archivos.length + ')</strong>';
                    adjuntosHtml += '<div class="list-group mt-2">';
                    datos.archivos.forEach(function(archivo) {
                        adjuntosHtml += '<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" target="_blank" href="' + (archivo.url || '#') + '">';
                        adjuntosHtml += '<span><i class="feather icon-file"></i> ' + (archivo.nombre_original || archivo.nombre_archivo || 'Archivo') + '</span>';
                        adjuntosHtml += '<span class="badge badge-primary">Descargar</span>';
                        adjuntosHtml += '</a>';
                    });
                    adjuntosHtml += '</div>';
                }
                $('#adjuntos_msj').html(adjuntosHtml);
            },
            error: function(error) {
                console.log(error);
                swal('Error', 'No se pudo cargar el mensaje.', 'error');
            }
        });
    }

    function cerrar_modal_mensaje() {
        $('#modal_mensaje_a_profesional').modal('hide');
    }

    function cerrar_modal_mensaje_de_profesional() {
        $('#modal_mensaje_a_profesional_de_profesional').modal('hide');
    }

    $('#modal_mensaje_a_profesional_de_profesional').on('hidden.bs.modal', function() {
        $('#agregar_profesional_int_rut').val('');
        $('#receptor_a_profesional').val('');
        $('#id_profesional').val('');
        $('#titulo_msj_de_profesional').val('');
        $('#asunto_msj_de_profesional').val('');
        $('#mensaje_msj_de_profesional').val('');
        archivosMensajeProfesional = [];

        if (dropzoneMensajeProfesional) {
            dropzoneMensajeProfesional.removeAllFiles(true);
        }

        $('#btn_enviar_mensaje_profesional').prop('disabled', false).html('<i class="feather icon-send"></i> Enviar');
    });

    function eliminar_mensaje(id) {
        swal({
            title: '¿Está seguro?',
            text: 'El mensaje será eliminado de su historial.',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(function(willDelete) {
            if (!willDelete) return;

            $.ajax({
                url: "{{ URL('Profesional/eliminar_mensaje') }}" + '/' + id,
                type: 'get',
                success: function(response) {
                    if (response.estado == 1) {
                        $('#fila-mensaje-' + id).fadeOut(250, function() { $(this).remove(); });
                        swal('Mensaje eliminado', 'El mensaje fue eliminado correctamente.', 'success');
                    } else {
                        swal('Error', 'No se pudo eliminar el mensaje.', 'error');
                    }
                },
                error: function(error) {
                    console.log(error);
                    swal('Error', 'No se pudo conectar con el servidor.', 'error');
                }
            });
        });
    }

    function descargar_mensaje(id) {
        descargar_mensaje_confirmar(id);
    }

    function descargar_mensaje_confirmar(id) {
        $.ajax({
            url: "{{ URL('Profesional/descargar_mensaje') }}" + '/' + id,
            type: 'get',
            success: function(response) {
                if (response.estado == 1) {
                    let mensaje = response.mensaje || {};
                    let datos = mensaje.datos_mensaje || {};

                    if (window.jspdf && window.jspdf.jsPDF) {
                        let { jsPDF } = window.jspdf;
                        let doc = new jsPDF();
                        doc.setFontSize(14);
                        doc.text(datos.titulo || datos.asunto || 'Mensaje', 10, 15);
                        doc.setFontSize(10);
                        doc.text(datos.mensaje || 'Sin mensaje', 10, 30, { align: 'left', maxWidth: 190 });
                        doc.save((datos.titulo || datos.asunto || 'mensaje') + '.pdf');
                    } else {
                        swal('Aviso', 'No se encontró la librería jsPDF en la vista.', 'warning');
                    }
                } else {
                    swal('Error', 'No se pudo descargar el mensaje.', 'error');
                }
            },
            error: function(error) {
                console.log(error);
                swal('Error', 'No se pudo conectar con el servidor.', 'error');
            }
        });
    }

    function enviar_mensaje_a_profesional() {
        $('#modal_mensaje_a_profesional_de_profesional').modal('show');
    }

    function enviar_mensaje_confirmar() {
        let fecha = $('#fecha_msj_de_profesional').val();
        let remitente = $('#remitente_a_profesional').val();
        let titulo = $.trim($('#titulo_msj_de_profesional').val());
        let asunto = $.trim($('#asunto_msj_de_profesional').val());
        let msj = $.trim($('#mensaje_msj_de_profesional').val());
        let id_profesional = $('#id_profesional').val();

        let errores = [];
        if (!fecha) errores.push('Debe ingresar fecha.');
        if (!remitente) errores.push('Debe ingresar remitente.');
        if (!id_profesional) errores.push('Debe buscar y seleccionar un profesional receptor.');
        if (!titulo) errores.push('Debe ingresar título.');
        if (!asunto) errores.push('Debe ingresar asunto.');
        if (!msj) errores.push('Debe ingresar mensaje.');

        if (dropzoneMensajeProfesional) {
            var archivosSubiendo = dropzoneMensajeProfesional.getUploadingFiles().length;
            var archivosEnCola = dropzoneMensajeProfesional.getQueuedFiles().length;

            if (archivosSubiendo > 0 || archivosEnCola > 0) {
                swal('Archivos en proceso', 'Espere a que los adjuntos terminen de subir antes de enviar el mensaje.', 'warning');
                return;
            }
        }

        if (errores.length > 0) {
            return swal({
                title: 'Campos requeridos',
                content: {
                    element: 'div',
                    attributes: { innerHTML: '<ul class="text-left mb-0"><li>' + errores.join('</li><li>') + '</li></ul>' }
                },
                icon: 'error',
                button: 'Aceptar'
            });
        }

        $('#btn_enviar_mensaje_profesional').prop('disabled', true).html('<i class="feather icon-loader"></i> Enviando...');

        $.ajax({
            type: 'post',
            url: "{{ ROUTE('mensaje_profesional') }}",
            data: {
                id_profesional_mensaje: id_profesional,
                fecha: fecha,
                remitente: remitente,
                titulo: titulo,
                detalle: asunto,
                mensaje: msj,
                archivos: archivosMensajeProfesional,
                _token: typeof CSRF_TOKEN !== 'undefined' ? CSRF_TOKEN : '{{ csrf_token() }}'
            },
            success: function(resp) {
                if (resp.estado == 1) {
                    swal('Éxito', 'Su mensaje se ha enviado correctamente.', 'success')
                        .then(function() { location.reload(); });
                } else {
                    swal('Error', resp.msj || resp.mensaje || 'No se pudo enviar el mensaje.', 'error');
                }
            },
            error: function(error) {
                console.log(error.responseText);
                swal('Error', 'No se pudo conectar con el servidor.', 'error');
            },
            complete: function() {
                $('#btn_enviar_mensaje_profesional').prop('disabled', false).html('<i class="feather icon-send"></i> Enviar');
            }
        });
    }

    function enter_buscar_profesional(event) {
        if (event.keyCode == 13) buscar_profesional();
    }

    function buscar_profesional() {
        let rut = $('#agregar_profesional_int_rut').val();

        if (!rut) {
            swal('Debe ingresar un RUT', '', 'error');
            return false;
        }

        if (!rut.includes('-')) {
            swal('El RUT debe contener un guion antes del dígito verificador', '', 'error');
            return false;
        }

        rut = rut.replace(/\./g, '');

        if ($.validateRut && !$.validateRut(rut)) {
            swal('Debe ingresar un RUT válido', '', 'error');
            return false;
        }

        $.ajax({
            url: "{{ route('profesional.buscar') }}",
            type: 'get',
            data: { rut: rut }
        }).done(function(data) {
            if (data.estado == 1 && data.registros && data.registros.length > 0) {
                let prof = data.registros[0];
                $('#id_profesional').val(prof.id);
                $('#receptor_a_profesional').val((prof.nombre || prof.profesionales_nombre || '') + ' ' + (prof.apellido_uno || prof.profesionales_apellido_uno || '') + ' ' + (prof.apellido_dos || prof.profesionales_apellido_dos || ''));
            } else {
                $('#id_profesional').val('');
                $('#receptor_a_profesional').val('');
                swal('Profesional no encontrado', 'Revise el RUT ingresado.', 'warning');
            }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
            swal('Error', 'No se pudo buscar el profesional.', 'error');
        });
    }
</script>
@endsection
