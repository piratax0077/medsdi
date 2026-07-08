@extends('template.laboratorio.laboratorio_profesional.template')

@section('style')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<style>

.card-kpi{
    border: 0;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    transition: .25s ease;
    background: #fff;
}

.card-kpi:hover{
    transform: translateY(-4px);
}

/* linea superior */
.card-kpi::before{
    content: "";
    position: absolute;
    top: 0;
    right: 25px;
    width: 80px;
    height: 5px;
    border-radius: 20px;
}

/* colores */
.card-kpi.borrador::before{
    background: #8b5cf6;
}

.card-kpi.enviadas::before{
    background: #2563eb;
}

.card-kpi.aceptadas::before{
    background: #22c55e;
}

.card-kpi.rechazadas::before{
    background: #ef4444;
}

/* BODY */
.card-kpi .card-body{
    padding: 8px 10px 18px 10px;
}

/* icono */
.card-kpi i{
    width: 78px;
    height: 78px;
    border-radius: 50%;
    display: flex !important;
    align-items: center;
    justify-content: center;
    font-size: 32px !important;
    flex-shrink: 0;
}

/* fondos iconos */
.card-kpi.borrador i{
    background: rgba(139,92,246,.12);
    color: #8b5cf6 !important;
}

.card-kpi.enviadas i{
    background: rgba(37,99,235,.12);
    color: #2563eb !important;
}

.card-kpi.aceptadas i{
    background: rgba(34,197,94,.12);
    color: #22c55e !important;
}

.card-kpi.rechazadas i{
    background: rgba(239,68,68,.12);
    color: #ef4444 !important;
}

/* titulo */
.card-kpi p{
    font-size: 16px !important;
    font-weight: 600;
    color: #334155 !important;
    margin-bottom: 6px !important;
}

/* numero */
.kpi-value{
    font-size: 48px;
    line-height: 1;
    font-weight: 700;
    letter-spacing: -1px;
}

/* colores numeros */
.card-kpi.borrador .kpi-value{
    color: #8b5cf6 !important;
}

.card-kpi.enviadas .kpi-value{
    color: #2563eb !important;
}

.card-kpi.aceptadas .kpi-value{
    color: #16a34a !important;
}

.card-kpi.rechazadas .kpi-value{
    color: #dc2626 !important;
}

.card-kpi .card-body::after{
    content: "";
    position: absolute;
    bottom: 18px;
    left: 120px;
    width: 55px;
    height: 10px;
    border-radius: 20px;
    opacity: .9;
}


    #panel_nueva_cotizacion { display: none; }
    .tipo-badge { display:inline-block; background:#e8f4fd; color:#155f89; border-radius:20px; padding:4px 14px; font-size:.82rem; font-weight:600; }
    .prov-card { border:2px solid #17a2b8; border-radius:8px; background:#f0faff; }
    #editor_cotizacion_mensaje {
        min-height: 150px;
        font-size: .95rem;
        line-height: 1.7;
        background: #fff;
    }
    .ql-toolbar.ql-snow {
        border-top: none;
        border-left: none;
        border-right: none;
        background: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        flex-wrap: wrap;
    }
    .ql-container.ql-snow { border: none; }
    #cot_dictado_interim_preview {
        background: #e8f7fa;
        padding: 0.35rem 1rem;
        font-style: italic;
        color: #117a8b;
        font-size: 0.83rem;
        min-height: 22px;
        border-bottom: 1px solid #b8e8f0;
        display: none;
    }
</style>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">

        <!-- Header -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <!--<h5 class="m-b-10 font-weight-bold">COTIZACIONES A PROVEEDORES</h5>-->
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                               <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                            </li>
                            <li class="breadcrumb-item active">
                              <a href="#">Cotizaciones a Proveedores</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @php
            $cotizaciones   = $cotizaciones ?? collect();
            $proveedores    = $proveedores  ?? collect();
            $cot_borrador   = $cotizaciones->where('estado', 'borrador')->count();
            $cot_enviadas   = $cotizaciones->whereIn('estado', ['enviada','respondida'])->count();
            $cot_aceptadas  = $cotizaciones->where('estado', 'aceptada')->count();
            $cot_rechazadas = $cotizaciones->where('estado', 'rechazada')->count();
        @endphp

        <!-- KPIs -->
        <div class="row mb-3">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi borrador h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="feather icon-edit-2 f-34 text-secondary mr-3"></i>
                        <div>
                            <p class="text-muted mb-0 f-12">Borradores</p>
                            <div class="kpi-value text-secondary">{{ $cot_borrador }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi enviadas h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="feather icon-navigation f-34 text-info mr-3"></i>
                        <div class="d-inline">
                            <p class="text-muted mb-0  d-inlinef-12">Enviadas / En espera</p>
                            <div class="kpi-value d-inline text-info">{{ $cot_enviadas }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi aceptadas h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="feather icon-check-circle f-34 text-success mr-3"></i>
                        <div>
                            <p class="text-muted mb-0 f-12">Aceptadas</p>
                            <div class="kpi-value text-success">{{ $cot_aceptadas }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-kpi rechazadas h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="feather icon-x-circle f-34 text-danger mr-3"></i>
                        <div>
                            <p class="text-muted mb-0 f-12">Rechazadas</p>
                            <div class="kpi-value text-danger">{{ $cot_rechazadas }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Boton Nueva Cotizacion -->
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-info" onclick="toggle_nueva_cotizacion()">
                <i class="feather icon-plus mr-1"></i> Nueva cotización
            </button>
        </div>

        <!-- Panel: Nueva cotizacion -->
        <div id="panel_nueva_cotizacion" class="card mb-4">
            <div class="card-header-new-md">
                <h5 class="">
                    <i class="feather icon-file-text icono-primary"></i> Solicitar cotización a proveedor
                </h5>
            </div>
            <div class="card-body">
                <!-- Paso 1: Seleccion de proveedor -->
                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="font-weight-bold">Proveedor <span class="text-danger">*</span></label>
                        <select id="cot_id_proveedor" class="form-control form-control-sm" onchange="on_proveedor_change(this.value)">
                            <option value="">Seleccione un proveedor</option>
                            @foreach($proveedores as $prov)
                                <option value="{{ $prov->id }}"
                                    data-nombre="{{ $prov->nombre }}"
                                    data-rut="{{ $prov->rut }}"
                                    data-email="{{ $prov->email }}"
                                    data-telefono="{{ $prov->telefono }}"
                                    data-tipo="{{ $prov->tipo_producto_nombre ?? 'Sin especificar' }}"
                                    data-direccion="{{ $prov->direccion ?? '' }}">
                                    {{ $prov->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted f-12"><i class="feather icon-info mr-1"></i> Al seleccionar, se mostrara la información del proveedor y su tipo de producto.</small>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Fecha de solicitud <span class="text-danger">*</span></label>
                        <input type="date" id="cot_fecha_emision" class="form-control form-control-sm" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Válido hasta <span class="text-muted f-12">(Opcional)</span></label>
                        <input type="date" id="cot_fecha_validez" class="form-control form-control-sm">
                    </div>
                </div>

                <!-- Card de informacion del proveedor seleccionado -->
                <div id="card_proveedor_info" class="d-none mb-4">
                    <div class="prov-card p-3">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" style="width:50px;height:50px">
                                    <i class="feather icon-user text-white f-22 mr-0"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="mb-1 font-weight-bold" id="info_prov_nombre"></h6>
                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <small class="text-muted d-block text-dark">RUT</small>
                                        <strong class="f-13" id="info_prov_rut"></strong>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <small class="text-muted d-block text-dark">Email (Destino)</small>
                                        <strong class="f-13 text-info" id="info_prov_email"></strong>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <small class="text-muted d-block text-dark">Teléfono</small>
                                        <strong class="f-13" id="info_prov_telefono"></strong>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <small class="text-muted d-block text-dark">Tipo de producto</small>
                                        <span class="tipo-badge" id="info_prov_tipo"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info py-2 mt-2 mb-0" id="alerta_sin_email" style="display:none">
                        <i class="feather icon-alert-triangle mr-2"></i>
                        Este proveedor no tiene email registrado. Puede guardar el borrador pero no se podra enviar por correo.
                    </div>
                </div>

                <!-- Mensaje de solicitud -->
                <div class="form-group">
                    <div class="card-lineal shadow-sm">
                        <div class="card-header-lineal d-flex align-items-center justify-content-between py-2">
                            <label class="font-weight-bold mb-0 text-dark f-18">Mensaje de solicitud de cotizacion <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span id="cot_dictado_estado_badge"
                                    class="badge badge-secondary"
                                    style="font-size:.78rem; font-weight:500; min-width:110px; text-align:center;">
                                    ⏸ Detenido
                                </span>
                                <button id="btn_cot_dict_iniciar" type="button"
                                    class="btn btn-outline-primary btn-sm"
                                    onclick="cot_dictado_iniciar()">
                                    🎤 Iniciar
                                </button>
                                <button id="btn_cot_dict_detener" type="button"
                                    class="btn btn-secondary btn-sm"
                                    onclick="cot_dictado_detener()" disabled>
                                    ⏹ Detener
                                </button>
                                <button type="button"
                                    class="btn btn-outline-light btn-sm"
                                    onclick="cot_dictado_limpiar()"
                                    title="Limpiar texto">
                                    <i class="feather icon-x"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="cot_dictado_interim_preview"></div>
                            <div id="editor_cotizacion_mensaje"></div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between py-2" style="background:#f8f9fa;">
                            <small class="text-muted">
                                <i class="feather icon-info mr-1"></i>
                                <span id="contador_chars">0</span> caracteres
                            </small>
                            <small class="text-muted">
                                <i class="feather icon-info mr-1"></i>
                                Pulsa <strong>🎤 Iniciar</strong> y dicta el mensaje.
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Vista previa del correo -->
                <div id="preview_email" class="d-none mb-3">
                    <div class="card border-secondary">
                        <div class="card-header bg-secondary py-2">
                            <h6 class="mb-0 text-white f-13"><i class="feather icon-mail mr-2"></i>Vista previa del correo que se enviará</h6>
                        </div>
                        <div class="card-body p-3">
                            <p class="mb-1 f-12"><strong>Para:</strong> <span id="prev_para"></span></p>
                            <p class="mb-1 f-12"><strong>Asunto:</strong> <span id="prev_asunto"></span></p>
                            <hr class="my-2">
                            <pre id="prev_cuerpo" class="f-12 mb-0" style="white-space:pre-wrap;font-family:inherit;background:transparent;border:none;padding:0"></pre>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between align-items-center mt-3 border-top pt-3">
                    <button class="btn btn-outline-info btn-sm" onclick="toggle_preview()" id="btn_preview">
                        <i class="feather icon-eye mr-1"></i> Visualizar correo a enviar
                    </button>
                    <div>
                        <button class="btn btn-outline-secondary mr-2" onclick="toggle_nueva_cotizacion()">
                            <i class="feather icon-x mr-1"></i> Cancelar
                        </button>
                        <button class="btn btn-secondary mr-2" onclick="submit_cotizacion('borrador')">
                            <i class="feather icon-save mr-1"></i> Guardar borrador
                        </button>
                        <button class="btn btn-primary" onclick="submit_cotizacion('enviar')" id="btn_enviar">
                            <i class="feather icon-navigation mr-1"></i> Guardar y enviar por email
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Historial de cotizaciones -->
        <div class="card">
            <div class="card-header-new-md">
                <h5><i class="feather icon-list icono-primary"></i>Historial de cotizaciones <span class="badge badge-info ml-2">{{ $cotizaciones->count() }}</span></h5>
                
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table id="tabla_cotizaciones" class="table table-xs table-striped  dt-responsive w-100">
                        <thead >
                            <tr>
                                <th>N° Cotizacion</th>
                                <th>Proveedor</th>
                                <th>Tipo producto</th>
                                <th>Fecha</th>
                                <th>Mensaje (resumen)</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cotizaciones as $cot)
                            <tr>
                                <td><span class="badge badge-secondary">{{ $cot->numero_cotizacion ?? '#'.$cot->id }}</span></td>
                                <td>
                                    <strong>{{ $cot->proveedor->nombre ?? 'N/A' }}</strong>
                                    @if($cot->proveedor)
                                        <small class="d-block text-muted">{{ $cot->proveedor->email }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-light border">
                                        {{ $cot->proveedor->tipo_producto_nombre ?? '-' }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($cot->fecha_emision)->format('d/m/Y') }}</td>
                                <td>
                                    <small class="text-muted">{{ \Str::limit($cot->observaciones, 80) }}</small>
                                </td>
                                <td>
                                    @switch($cot->estado)
                                        @case('borrador')   <span class="badge badge-secondary">Borrador</span>   @break
                                        @case('enviada')    <span class="badge badge-info">Enviada</span>         @break
                                        @case('respondida') <span class="badge badge-warning">Respondida</span>   @break
                                        @case('aceptada')   <span class="badge badge-success">Aceptada</span>     @break
                                        @case('rechazada')  <span class="badge badge-danger">Rechazada</span>     @break
                                        @case('anulada')    <span class="badge badge-dark">Anulada</span>         @break
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-info btn-icon" onclick="ver_detalle_cotizacion({{ $cot->id }})" title="Ver detalle">
                                        <i class="feather icon-eye"></i>
                                    </button>
                                    @if(!in_array($cot->estado, ['anulada','rechazada']))
                                    <button class="btn btn-danger btn-icon ml-1" onclick="anular_cotizacion({{ $cot->id }})" title="Anular">
                                        <i class="feather icon-x"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center text-muted py-4">No hay cotizaciones registradas.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal: Detalle cotizacion -->
<div id="modal_detalle_cotizacion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white"> Detalle de cotización</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body" id="contenido_modal_cotizacion">
                <div class="text-center py-4"><i class="feather icon-loader f-30"></i></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-script')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
var csrfToken  = '{{ csrf_token() }}';
var urlGuardar = '{{ route("laboratorio.distribucion.cotizaciones.guardar") }}';
var urlAnular  = '{{ url("Laboratorio/Distribuidores/cotizaciones") }}';
var cotizaciones_data = @json($cotizaciones->load(['proveedor']));
var proveedores_data  = @json($proveedores);

// ===== EDITOR QUILL PARA COTIZACIONES =====
var quill_cotizacion = null;

$(document).ready(function () {
    // Inicializar Quill para el editor de cotizaciones
    quill_cotizacion = new Quill('#editor_cotizacion_mensaje', {
        theme: 'snow',
        placeholder: 'Estimado proveedor, le solicitamos cotizacion para los siguientes productos/servicios:\n\n- Producto 1: cantidad, especificaciones...\n- Producto 2: cantidad, especificaciones...\n\nPor favor indicar precios unitarios, plazos de entrega y condiciones de pago.',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote'],
                ['clean']
            ]
        }
    });

    // Actualizar contador de caracteres cuando cambia el editor
    quill_cotizacion.on('text-change', function () {
        var texto = quill_cotizacion.getText().trim();
        $('#contador_chars').text(texto.length);
    });

    $('#tabla_cotizaciones').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json' },
        responsive: true,
        pageLength: 10,
        order: [[3, 'desc']]
    });

    // Detener dictado si el usuario abandona la página accidentalmente
    $(window).on('beforeunload', function () {
        if (typeof cot_dictado_detener === 'function') cot_dictado_detener();
    });
});

// ===== FUNCIONES DE DICTADO POR VOZ PARA COTIZACIONES =====
var _cot_reconocimiento = null;
var _cot_dictando       = false;

function cot_dictado_iniciar() {
    var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (!SpeechRecognition) {
        $('#cot_dictado_estado_badge').removeClass('badge-light badge-success badge-danger')
            .addClass('badge-danger').text('❌ No compatible');
        alert('Tu navegador no soporta dictado por voz. Usa Chrome o Edge.');
        return;
    }

    _cot_reconocimiento = new SpeechRecognition();
    _cot_reconocimiento.lang           = 'es-CL';
    _cot_reconocimiento.continuous     = true;
    _cot_reconocimiento.interimResults = true;

    _cot_reconocimiento.onstart = function () {
        _cot_dictando = true;
        $('#btn_cot_dict_iniciar').prop('disabled', true);
        $('#btn_cot_dict_detener').prop('disabled', false);
        $('#cot_dictado_estado_badge').removeClass('badge-light badge-danger')
            .addClass('badge-success').html('🎙️ Escuchando…');
        $('#cot_dictado_interim_preview').show();
    };

    _cot_reconocimiento.onresult = function (event) {
        var textoFinal   = '';
        var textoInterim = '';
        for (var i = event.resultIndex; i < event.results.length; i++) {
            if (event.results[i].isFinal) {
                textoFinal += event.results[i][0].transcript;
            } else {
                textoInterim += event.results[i][0].transcript;
            }
        }
        $('#cot_dictado_interim_preview').text(textoInterim ? '💬 ' + textoInterim : '');
        if (textoFinal && quill_cotizacion) {
            var pos = quill_cotizacion.getLength() - 1;
            if (pos > 0) {
                var ultimoChar = quill_cotizacion.getText(pos - 1, 1);
                if (ultimoChar !== ' ' && ultimoChar !== '\n') {
                    quill_cotizacion.insertText(pos, ' ');
                    pos++;
                }
            }
            quill_cotizacion.insertText(pos, textoFinal);
            quill_cotizacion.setSelection(quill_cotizacion.getLength());
            $('#cot_dictado_interim_preview').text('');
        }
    };

    _cot_reconocimiento.onend = function () {
        if (_cot_dictando) {
            try { _cot_reconocimiento.start(); } catch(e) {}
        } else {
            $('#cot_dictado_estado_badge').removeClass('badge-success badge-danger')
                .addClass('badge-light').text('⏸ Detenido');
            $('#cot_dictado_interim_preview').hide().text('');
            $('#btn_cot_dict_iniciar').prop('disabled', false);
            $('#btn_cot_dict_detener').prop('disabled', true);
        }
    };

    _cot_reconocimiento.onerror = function (event) {
        if (event.error === 'no-speech') return;
        $('#cot_dictado_estado_badge').removeClass('badge-success badge-light')
            .addClass('badge-danger').text('❌ Error: ' + event.error);
        _cot_dictando = false;
        $('#btn_cot_dict_iniciar').prop('disabled', false);
        $('#btn_cot_dict_detener').prop('disabled', true);
    };

    _cot_reconocimiento.start();
}

function cot_dictado_detener() {
    _cot_dictando = false;
    if (_cot_reconocimiento) {
        try { _cot_reconocimiento.stop(); } catch(e) {}
    }
}

function cot_dictado_limpiar() {
    if (!quill_cotizacion || quill_cotizacion.getText().trim() === '') return;
    if (!confirm('¿Deseas limpiar el contenido del mensaje?')) return;
    quill_cotizacion.setContents([]);
    $('#cot_dictado_interim_preview').text('');
    $('#contador_chars').text('0');
}

// ===== FUNCIONES DE COTIZACIONES (ACTUALIZADAS PARA USAR QUILL) =====

function on_proveedor_change(val) {
    if (!val) {
        document.getElementById('card_proveedor_info').classList.add('d-none');
        document.getElementById('preview_email').classList.add('d-none');
        return;
    }
    var prov = null;
    for (var i = 0; i < proveedores_data.length; i++) {
        if (proveedores_data[i].id == val) { prov = proveedores_data[i]; break; }
    }
    if (!prov) return;

    document.getElementById('info_prov_nombre').textContent   = prov.nombre    || '-';
    document.getElementById('info_prov_rut').textContent      = prov.rut       || '-';
    document.getElementById('info_prov_email').textContent    = prov.email     || 'Sin email registrado';
    document.getElementById('info_prov_telefono').textContent = prov.telefono  || '-';
    document.getElementById('info_prov_tipo').textContent     = prov.tipo_producto_nombre || 'Sin especificar';
    document.getElementById('card_proveedor_info').classList.remove('d-none');

    var alertaEmail = document.getElementById('alerta_sin_email');
    var btnEnviar   = document.getElementById('btn_enviar');
    if (!prov.email) {
        alertaEmail.style.display = 'block';
        btnEnviar.disabled = true;
    } else {
        alertaEmail.style.display = 'none';
        btnEnviar.disabled = false;
    }
    document.getElementById('preview_email').classList.add('d-none');
    document.getElementById('btn_preview').innerHTML = '<i class="feather icon-eye mr-1"></i>Visualizar correo a enviar';
}

function toggle_nueva_cotizacion() {
    var panel = $('#panel_nueva_cotizacion');
    if (panel.is(':visible')) {
        panel.slideUp();
    } else {
        panel.slideDown();
        $('html, body').animate({ scrollTop: panel.offset().top - 80 }, 400);
    }
}

function toggle_preview() {
    var id_prov = $('#cot_id_proveedor').val();
    var mensaje = quill_cotizacion.getText().trim();

    if (!id_prov || !mensaje) {
        swal({ title: 'Complete los campos', text: 'Seleccione un proveedor y escriba el mensaje primero.', icon: 'warning' });
        return;
    }

    var prov = null;
    for (var i = 0; i < proveedores_data.length; i++) {
        if (proveedores_data[i].id == id_prov) { prov = proveedores_data[i]; break; }
    }
    if (!prov) return;

    var numero = 'COT-' + new Date().toISOString().slice(0,10).replace(/-/g,'') + '-XXXX';
    var cuerpo = 'Estimado/a ' + prov.nombre + ',\n\n';
    cuerpo += 'Le solicitamos una cotizacion con el siguiente detalle:\n\n';
    cuerpo += '==========================================\n';
    cuerpo += mensaje + '\n';
    cuerpo += '==========================================\n\n';
    cuerpo += 'Numero de cotizacion: ' + numero + '\n';
    cuerpo += 'Fecha de emision: ' + $('#cot_fecha_emision').val() + '\n';
    if ($('#cot_fecha_validez').val()) {
        cuerpo += 'Valido hasta: ' + $('#cot_fecha_validez').val() + '\n';
    }
    cuerpo += '\nEste correo fue generado automaticamente por el sistema SDI.\n';

    $('#prev_para').text(prov.email || 'Sin email');
    $('#prev_asunto').text('Solicitud de Cotizacion ' + numero);
    $('#prev_cuerpo').text(cuerpo);

    if ($('#preview_email').hasClass('d-none')) {
        $('#preview_email').removeClass('d-none');
        $('#btn_preview').html('<i class="feather icon-eye-off mr-1"></i>Ocultar visualización');
    } else {
        $('#preview_email').addClass('d-none');
        $('#btn_preview').html('<i class="feather icon-eye mr-1"></i>Visualizar correo a enviar');
    }
}

function submit_cotizacion(accion) {
    var id_prov = $('#cot_id_proveedor').val();
    var fecha   = $('#cot_fecha_emision').val();
    var mensaje = quill_cotizacion.getText().trim();

    var prov = null;
    for (var i = 0; i < proveedores_data.length; i++) {
        if (proveedores_data[i].id == id_prov) { prov = proveedores_data[i]; break; }
    }

    if (!id_prov) { swal({ title: 'Seleccione un proveedor', icon: 'warning' }); return; }
    if (!fecha)   { swal({ title: 'Ingrese la fecha', icon: 'warning' }); return; }
    if (!mensaje) { swal({ title: 'Escriba el mensaje de solicitud', icon: 'warning' }); return; }

    var textoConfirm = accion === 'enviar'
        ? 'Se guardara y se enviara por email a ' + (prov ? prov.email || 'el proveedor' : 'el proveedor') + '.'
        : 'Se guardara como borrador. Podra enviarlo mas tarde.';

    swal({
        title: accion === 'enviar' ? 'Enviar cotizacion?' : 'Guardar borrador?',
        text:  textoConfirm,
        icon: 'warning',
        buttons: {
            cancel: 'Cancelar',
            confirm: accion === 'enviar' ? 'Si, enviar' : 'Si, guardar'
        }
    }).then(function (result) {
        if (!result) return;

        $.ajax({
            url:  urlGuardar,
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken },
            contentType: 'application/json',
            data: JSON.stringify({
                id_proveedor:  id_prov,
                fecha_emision: fecha,
                fecha_validez: $('#cot_fecha_validez').val() || null,
                mensaje:       mensaje,
                accion:        accion
            }),
            success: function (res) {
                var icono = 'success';
                var titulo = res.mensaje;
                if (accion === 'enviar' && res.email_enviado === false) {
                    icono = 'warning';
                }
                swal({ icon: icono, title: titulo, text: 'N: ' + res.numero })
                    .then(function () { location.reload(); });
            },
            error: function (xhr) {
                var msg = xhr.responseJSON ? xhr.responseJSON.error : 'Error desconocido';
                swal({ title: 'Error al guardar', text: msg, icon: 'error' });
            }
        });
    });
}

function anular_cotizacion(id) {
    swal({
        title: 'Anular esta cotizacion?',
        text: 'Esta accion no se puede deshacer.',
        icon: 'warning',
        buttons: { cancel: 'Cancelar', confirm: 'Si, anular' },
        dangerMode: true
    }).then(function (result) {
        if (!result) return;
        $.ajax({
            url:  urlAnular + '/' + id + '/anular',
            type: 'PUT',
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function (res) {
                swal({ icon: 'success', title: res.mensaje })
                    .then(function () { location.reload(); });
            },
            error: function (xhr) {
                var msg = xhr.responseJSON ? xhr.responseJSON.error : 'Error';
                swal({ title: 'Error', text: msg, icon: 'error' });
            }
        });
    });
}

function ver_detalle_cotizacion(id) {
    var map = {};
    $.each(cotizaciones_data, function (i, c) { map[c.id] = c; });
    var cot = map[id];
    if (!cot) return;

    var prov = cot.proveedor || {};

    var html = '<div class="row mb-3">';
    html += '<div class="col-md-6">';
    html += '<p class="mb-1"><strong>N Cotización:</strong> ' + (cot.numero_cotizacion || '#' + cot.id) + '</p>';
    html += '<p class="mb-1"><strong>Proveedor:</strong> ' + escHtml(prov.nombre || 'N/A') + '</p>';
    html += '<p class="mb-1"><strong>Email proveedor:</strong> <span class="text-info">' + escHtml(prov.email || 'Sin email') + '</span></p>';
    html += '<p class="mb-1"><strong>Telefono:</strong> ' + escHtml(prov.telefono || '-') + '</p>';
    html += '</div>';
    html += '<div class="col-md-6">';
    html += '<p class="mb-1"><strong>Fecha emisión:</strong> ' + (cot.fecha_emision || '-') + '</p>';
    html += '<p class="mb-1"><strong>Válido hasta:</strong> ' + (cot.fecha_validez || '-') + '</p>';
    html += '<p class="mb-1 text-uppercase"><strong>Estado:</strong> ' + badge_estado(cot.estado) + '</p>';
    html += '</div>';
    html += '</div>';

    html += '<div class="border-top pt-3">';
    html += '<h6 class="font-weight-bold mb-2"><i class="feather icon-message-square mr-1 text-primary"></i>Mensaje de solicitud enviado</h6>';
    html += '<div class="bg-light border rounded p-3"><pre style="white-space:pre-wrap;font-family:inherit;margin:0;font-size:.85rem">' + escHtml(cot.observaciones || '(Sin mensaje)') + '</pre></div>';
    html += '</div>';

    if (cot.respuesta_proveedor) {
        html += '<div class="alert alert-success mt-3"><strong><i class="feather icon-check-circle mr-1"></i>Respuesta del proveedor:</strong><br>' + escHtml(cot.respuesta_proveedor) + '</div>';
    }

    $('#contenido_modal_cotizacion').html(html);
    $('#modal_detalle_cotizacion').modal('show');
}

function badge_estado(estado) {
    var map = {
        borrador:   '<span class="badge badge-secondary">Borrador</span>',
        enviada:    '<span class="badge badge-info">Enviada</span>',
        respondida: '<span class="badge badge-warning">Respondida</span>',
        aceptada:   '<span class="badge badge-success">Aceptada</span>',
        rechazada:  '<span class="badge badge-danger">Rechazada</span>',
        anulada:    '<span class="badge badge-dark">Anulada</span>'
    };
    return map[estado] || estado;
}

function escHtml(str) {
    if (!str) return '';
    return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}
</script>
@endsection
