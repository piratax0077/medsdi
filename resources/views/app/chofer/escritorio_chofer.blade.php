@extends('template.chofer.template')
@section('page-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- Header -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Chofer de Ambulancia</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('chofer.home') }}"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Mi Escritorio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cierre: Header -->

        <!-- Módulos -->
        <div class="row mt-n3">
            <div class="col-md-12">
                <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

                    <!-- Traslados del día -->
                    <div class="col mb-3">
                        <div class="card subir py-auto h-100">
                            <div class="card-body text-center" style="cursor:pointer">
                                <i class="feather icon-truck" style="font-size: 2.5rem; color: #1976d2;"></i>
                                <h6 class="mt-2 mb-0">Traslados del día</h6>
                                <p class="text-muted small mt-1">Ver los traslados asignados para hoy</p>
                            </div>
                        </div>
                    </div>

                    <!-- Estado del vehículo -->
                    <div class="col mb-3">
                        <div class="card subir py-auto h-100">
                            <div class="card-body text-center" style="cursor:pointer">
                                <i class="feather icon-settings" style="font-size: 2.5rem; color: #388e3c;"></i>
                                <h6 class="mt-2 mb-0">Estado del vehículo</h6>
                                <p class="text-muted small mt-1">Revisar y reportar estado de la ambulancia</p>
                            </div>
                        </div>
                    </div>

                    <!-- Historial de traslados -->
                    <div class="col mb-3">
                        <div class="card subir py-auto h-100">
                            <div class="card-body text-center" style="cursor:pointer">
                                <i class="feather icon-list" style="font-size: 2.5rem; color: #f57c00;"></i>
                                <h6 class="mt-2 mb-0">Historial de traslados</h6>
                                <p class="text-muted small mt-1">Consultar traslados realizados</p>
                            </div>
                        </div>
                    </div>

                    <!-- Consulta de Emergencia -->
                    <div class="col mb-3">
                        <div class="card subir py-auto h-100 border-danger" data-toggle="modal" data-target="#modalEmergencia" style="cursor:pointer">
                            <div class="card-body text-center">
                                <i class="feather icon-video" style="font-size: 2.5rem; color: #d32f2f;"></i>
                                <h6 class="mt-2 mb-0 text-danger">Consulta de Emergencia</h6>
                                <p class="text-muted small mt-1">Videollamada con médico o central</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Sección Videollamada Emergencia (oculta hasta que se inicie) -->
        <div id="seccion-emergencia" class="row mt-2" style="display:none">
            <div class="col-md-12">
                <div class="card border-danger">
                    <div class="card-header" style="background:#d32f2f">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="text-white my-2" style="font-size:1.1rem;">
                                    <i class="feather icon-video mr-2"></i>
                                    Videollamada de Emergencia — <span id="lbl_paciente_emergencia"></span>
                                </h5>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-sm btn-outline-light" onclick="colgarLlamadaEmergencia()">
                                    <i class="feather icon-phone-off mr-1"></i>Colgar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <!-- Link para compartir con el médico -->
                        <div id="div-link-medico" class="alert alert-info py-2 mb-2" style="display:none">
                            <strong><i class="feather icon-link mr-1"></i>Enlace para el médico / central:</strong>
                            <div class="input-group mt-1">
                                <input type="text" id="inp_link_medico" class="form-control form-control-sm" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-info" onclick="copiarLinkMedico()">
                                        <i class="feather icon-copy"></i> Copiar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Contenedor Jitsi -->
                        <div id="jaas-container-emergencia" style="width:100%; height:540px; border-radius:8px; overflow:hidden;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla traslados del día -->
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-c-info">
                        <div class="row">
                            <div class="col-sm-12 d-inline text-center">
                                <h5 class="text-white my-2" style="font-size: 1.1rem;">Traslados asignados hoy</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-3 pb-2">
                        <div class="dt-responsive table-responsive">
                            <table id="tabla_traslados" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">#</th>
                                        <th class="text-center align-middle">Paciente</th>
                                        <th class="text-center align-middle">Origen</th>
                                        <th class="text-center align-middle">Destino</th>
                                        <th class="text-center align-middle">Hora</th>
                                        <th class="text-center align-middle">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Sin traslados asignados para hoy
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cierre tabla traslados -->

    </div>
</div>

<!-- ===== MODAL CONSULTA DE EMERGENCIA ===== -->
<div class="modal fade" id="modalEmergencia" tabindex="-1" role="dialog" aria-labelledby="modalEmergenciaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#d32f2f">
                <h5 class="modal-title text-white" id="modalEmergenciaLabel">
                    <i class="feather icon-video mr-2"></i>Consulta de Emergencia
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-muted small mb-3">Complete los datos del paciente y la emergencia antes de iniciar la videollamada con el médico / central.</p>
                <form id="formEmergencia">
                    @csrf
                    <div class="row">
                        <!-- Fila 1: Datos básicos del paciente -->
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Nombre del paciente <span class="text-danger">*</span></label>
                            <input type="text" id="em_nombre_paciente" name="nombre_paciente"
                                   class="form-control" placeholder="Ej: Juan Pérez" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="font-weight-bold">RUT</label>
                            <input type="text" id="em_rut" name="rut" class="form-control" placeholder="12.345.678-9">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="font-weight-bold">Sexo</label>
                            <select id="em_sexo" name="sexo" class="form-control">
                                <option value="">-- Sel. --</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="font-weight-bold">Edad aprox.</label>
                            <input type="number" id="em_edad" name="edad" class="form-control" placeholder="45" min="0" max="120">
                        </div>

                        <!-- Fila 2: Tipo de emergencia -->
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold">Tipo de emergencia <span class="text-danger">*</span></label>
                            <select id="em_tipo" name="tipo_emergencia" class="form-control" required>
                                <option value="">-- Seleccionar --</option>
                                <option value="Accidente vial">Accidente vial</option>
                                <option value="Caída / Traumatismo">Caída / Traumatismo</option>
                                <option value="PCR / Paro cardíaco">PCR / Paro cardíaco</option>
                                <option value="Quemadura">Quemadura</option>
                                <option value="Accidente laboral">Accidente laboral</option>
                                <option value="Dificultad respiratoria">Dificultad respiratoria</option>
                                <option value="Convulsión">Convulsión</option>
                                <option value="Intoxicación / Envenenamiento">Intoxicación / Envenenamiento</option>
                                <option value="Otra emergencia">Otra emergencia</option>
                            </select>
                        </div>

                        <!-- Fila 3: Ubicación con mapa -->
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold">Ubicación actual</label>
                            <div class="input-group">
                                <input type="text" id="em_ubicacion" name="ubicacion"
                                       class="form-control" placeholder="Av. Ejemplo 1234, comuna">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-info" onclick="detectarUbicacionChofer()" id="btn_detectar_ubi" title="Detectar mi ubicación GPS">
                                        <i class="feather icon-crosshair"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="mapa_chofer_emergencia" style="height:180px; border-radius:6px; margin-top:8px; display:none;"></div>
                        </div>

                        <!-- Fila 4: Observaciones -->
                        <div class="col-md-12 mb-2">
                            <label class="font-weight-bold">Observaciones / Estado del paciente</label>
                            <textarea id="em_observaciones" name="observaciones" class="form-control" rows="3"
                                      placeholder="Estado del paciente, signos vitales observados, etc."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btnIniciarEmergencia" onclick="iniciarEmergencia()">
                    <i class="feather icon-video mr-1"></i> Iniciar Videollamada de Emergencia
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://8x8.vc/{{ env('JITSI_APP_ID') }}/external_api.js"></script>
<script>
var _mapChofer = null;
var _markerChofer = null;

function detectarUbicacionChofer() {
    if (!navigator.geolocation) {
        swal('No disponible', 'Tu navegador no soporta geolocalización.', 'warning');
        return;
    }
    var btn = $('#btn_detectar_ubi');
    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

    navigator.geolocation.getCurrentPosition(
        function(pos) {
            var lat = pos.coords.latitude;
            var lng = pos.coords.longitude;

            // Geocodificación inversa con Nominatim para obtener la dirección
            fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat + '&lon=' + lng + '&accept-language=es', {
                headers: { 'Accept': 'application/json' }
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                var addr = '';
                if (data && data.display_name) {
                    // Construir dirección corta: calle número, ciudad, región
                    var a = data.address || {};
                    var partes = [];
                    if (a.road)          partes.push(a.road);
                    if (a.house_number)  partes.push(a.house_number);
                    if (a.city || a.town || a.village || a.county)
                        partes.push(a.city || a.town || a.village || a.county);
                    if (a.state)         partes.push(a.state);
                    addr = partes.length ? partes.join(', ') : data.display_name;
                }
                $('#em_ubicacion').val(addr);
                mostrarMapaChofer(lat, lng);
                btn.prop('disabled', false).html('<i class="feather icon-crosshair"></i>');
            })
            .catch(function() {
                // Si falla la geocodificación inversa, al menos poner coordenadas
                $('#em_ubicacion').val(lat.toFixed(6) + ', ' + lng.toFixed(6));
                mostrarMapaChofer(lat, lng);
                btn.prop('disabled', false).html('<i class="feather icon-crosshair"></i>');
            });
        },
        function(err) {
            var msg = 'No se pudo obtener la ubicación.';
            if (err.code === 1) msg = 'Permiso de ubicación denegado. Activa el GPS en tu navegador.';
            if (err.code === 2) msg = 'Ubicación no disponible. Verifica que el GPS esté activo.';
            if (err.code === 3) msg = 'Tiempo de espera agotado. Inténtalo de nuevo.';
            swal('Error GPS', msg, 'error');
            btn.prop('disabled', false).html('<i class="feather icon-crosshair"></i>');
        },
        { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
    );
}

function mostrarMapaChofer(lat, lng) {
    $('#mapa_chofer_emergencia').show();
    if (!_mapChofer) {
        _mapChofer = L.map('mapa_chofer_emergencia').setView([lat, lng], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors', maxZoom: 19
        }).addTo(_mapChofer);
        _markerChofer = L.marker([lat, lng], { draggable: true }).addTo(_mapChofer);
        _markerChofer.on('dragend', function(e) {
            var p = e.target.getLatLng();
            // Actualiza el campo con nueva dirección al mover el pin
            fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + p.lat + '&lon=' + p.lng + '&accept-language=es')
                .then(function(r) { return r.json(); })
                .then(function(d) {
                    if (d && d.display_name) $('#em_ubicacion').val(d.display_name);
                });
        });
    } else {
        _mapChofer.setView([lat, lng], 16);
        _markerChofer.setLatLng([lat, lng]);
    }
    setTimeout(function() { _mapChofer.invalidateSize(); }, 350);
}

// Limpiar mapa al cerrar modal
$('#modalEmergencia').on('hidden.bs.modal', function() {
    $('#mapa_chofer_emergencia').hide();
});

var jitsiApiEmergencia = null;

function iniciarEmergencia() {
    var nombre_paciente = $('#em_nombre_paciente').val().trim();
    var tipo_emergencia = $('#em_tipo').val();

    if (!nombre_paciente) {
        swal('Campo requerido', 'Ingrese el nombre del paciente.', 'warning');
        return;
    }
    if (!tipo_emergencia) {
        swal('Campo requerido', 'Seleccione el tipo de emergencia.', 'warning');
        return;
    }

    var btn = $('#btnIniciarEmergencia');
    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm mr-1"></span>Conectando...');

    $.ajax({
        url: '{{ route("chofer.emergencia.iniciar") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            nombre_paciente: nombre_paciente,
            tipo_emergencia: tipo_emergencia,
            rut: $('#em_rut').val(),
            edad: $('#em_edad').val(),
            ubicacion: $('#em_ubicacion').val(),
            sexo: $('#em_sexo').val(),
            observaciones: $('#em_observaciones').val()
        },
        success: function(resp) {
            if (resp.estado === 1) {
                $('#modalEmergencia').modal('hide');
                iniciarVideoEmergencia(resp.jwt, resp.nombre_grupo, resp.link_medico, nombre_paciente);
            } else {
                swal('Error', resp.msj || 'No se pudo iniciar la llamada.', 'error');
                btn.prop('disabled', false).html('<i class="feather icon-video mr-1"></i> Iniciar Videollamada de Emergencia');
            }
        },
        error: function() {
            swal('Error de conexión', 'No se pudo conectar con el servidor.', 'error');
            btn.prop('disabled', false).html('<i class="feather icon-video mr-1"></i> Iniciar Videollamada de Emergencia');
        }
    });
}

function iniciarVideoEmergencia(jwt, nombreGrupo, linkMedico, nombrePaciente) {
    $('#lbl_paciente_emergencia').text(nombrePaciente);
    $('#seccion-emergencia').show();
    $('html, body').animate({ scrollTop: $('#seccion-emergencia').offset().top - 80 }, 400);

    if (linkMedico) {
        $('#inp_link_medico').val(linkMedico);
        $('#div-link-medico').show();
    }

    if (jitsiApiEmergencia) {
        jitsiApiEmergencia.dispose();
    }

    var appId = '{{ env("JITSI_APP_ID") }}';
    jitsiApiEmergencia = new JitsiMeetExternalAPI("8x8.vc", {
        roomName: appId + '/' + nombreGrupo,
        parentNode: document.querySelector('#jaas-container-emergencia'),
        jwt: jwt,
        configOverwrite: {
            startWithAudioMuted: false,
            startWithVideoMuted: false,
            prejoinPageEnabled: false,
            disableDeepLinking: true
        },
        interfaceConfigOverwrite: {
            SHOW_JITSI_WATERMARK: false,
            SHOW_WATERMARK_FOR_GUESTS: false
        },
        lang: 'es',
        width: '100%',
        height: 540
    });

    jitsiApiEmergencia.addEventListeners({
        readyToClose: function() { colgarLlamadaEmergencia(); }
    });

    $('#btnIniciarEmergencia').prop('disabled', false)
        .html('<i class="feather icon-video mr-1"></i> Iniciar Videollamada de Emergencia');
}

function colgarLlamadaEmergencia() {
    if (jitsiApiEmergencia) {
        jitsiApiEmergencia.dispose();
        jitsiApiEmergencia = null;
    }
    $('#jaas-container-emergencia').empty();
    $('#seccion-emergencia').hide();
    $('#div-link-medico').hide();
    $('#inp_link_medico').val('');
    $('#formEmergencia')[0].reset();
}

function copiarLinkMedico() {
    var input = document.getElementById('inp_link_medico');
    input.select();
    document.execCommand('copy');
    swal('¡Copiado!', 'Enlace copiado al portapapeles.', 'success');
}
</script>
@endsection
