@extends('template.asistente_enfermeria.template')


@section('page-styles')
    <link href='{{ asset('css/estilos_boton_agen_examenes.css') }}' rel='stylesheet' />
    <style>
        .status-circle .circle {
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            display: inline-block;
            border: 2px solid #fff; /* Opcional: Borde blanco para mejor visibilidad */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Opcional: Sombra suave */
        }
    </style>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Administración de Enfermería</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- SELECTOR DE TIPO DE ADMINISTRACIÓN -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-3"><strong>¿Qué deseas administrar?</strong></h6>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-primary active" id="btn_medicamentos" onclick="cambiarTipoAdministracion('medicamentos')">
                                    <i class="feather icon-package"></i> Medicamentos Crónicos
                                </button>
                                <button type="button" class="btn btn-outline-primary" id="btn_visitas" onclick="cambiarTipoAdministracion('visitas')">
                                    <i class="feather icon-activity"></i> Visitas de Enfermeras
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN SELECTOR -->

            <!-- SELECCIÓN DE PROFESIONAL Y PACIENTE -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profesional_select"><strong>Seleccionar Profesional</strong></label>
                                        <select class="form-control form-control-sm" id="profesional_select" onchange="seleccionarProfesional()">
                                            <option value="">-- Seleccione un profesional --</option>
                                            @if($profesionales)
                                                @foreach($profesionales as $profesional)
                                                    <option value="{{ $profesional->id }}">
                                                        {{ strtoupper($profesional->nombre) }} {{ strtoupper($profesional->apellido_uno) }} ({{ $profesional->especialidad ? strtoupper($profesional->especialidad->nombre) : 'N/A' }})
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Buscar Paciente por RUT</strong></label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" id="rut_paciente_enfermeria"
                                                placeholder="Ej: 12345678-9"
                                                onkeypress="if(event.keyCode==13) buscarPacientePorRut()">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" onclick="buscarPacientePorRut()">
                                                    <i class="feather icon-search"></i> Buscar
                                                </button>
                                                <button class="btn btn-outline-secondary" type="button" onclick="limpiarBusquedaPaciente()" title="Limpiar">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <small id="rut_enfermeria_msg" class="text-danger" style="display:none;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN SELECCIÓN -->

            <!-- CARRITO DE PACIENTES -->
            <div class="row mb-3" id="carrito_pacientes_section" style="display: none;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                            <h5 class="text-white mb-0">
                                <i class="feather icon-users"></i>
                                Pacientes en cola de entrega
                                <span class="badge badge-light ml-2" id="carrito_pacientes_count">0</span>
                            </h5>
                            <button class="btn btn-outline-light btn-sm" onclick="limpiarCarritoPacientes()">
                                <i class="feather icon-trash-2"></i> Limpiar todo
                            </button>
                        </div>
                        <div class="card-body p-0">
                            <div id="acordeon_carrito_pacientes" class="accordion"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN CARRITO DE PACIENTES -->

            <!-- AGENDA DEL PROFESIONAL -->
            <div class="row mb-3" id="seccion_agenda_enf" style="display: none;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info d-flex justify-content-between align-items-center">
                            <h5 class="text-white mb-0">
                                <i class="feather icon-calendar"></i> Agenda del Profesional
                                <small id="enf_agenda_nombre_profesional" class="ml-2 text-white-50"></small>
                            </h5>
                            <small class="text-white-50">Haga click en una hora libre para agendar</small>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="agenda_enf_lugar_atencion" value="{{ $lugares_atencion->id }}">
                            <input type="hidden" id="agenda_enf_id_profesional" value="">
                            <div id="agenda_enf" style="min-height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN AGENDA DEL PROFESIONAL -->

            <!-- SECCIÓN VISITAS (se mantiene, solo se muestra si tipo = visitas) -->

            <!-- SECCIÓN VISITAS DE ENFERMERAS -->
            <div id="seccion_visitas" class="row" style="display: none;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h5 class="text-white mb-0"><i class="feather icon-activity"></i> Registro de Visitas de Enfermería</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla_visitas" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Tipo de Visita</th>
                                            <th class="text-center">Fecha</th>
                                            <th class="text-center">Hora</th>
                                            <th class="text-center">Observaciones</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="visitas_tbody">
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Seleccione un paciente para registrar visitas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-success" id="btn_nueva_visita">
                                    <i class="feather icon-plus"></i> Registrar Nueva Visita
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN VISITAS -->

            <!--agenda original (se mantiene oculto para compatibilidad)-->
            <div class="row" style="display: none;">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-body pb-1 mb-1">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 pb-1">
                                    <h5 class="text-c-blue f-14">AGENDA DE PROFESIONALES</h5>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Seleccione Profesional</label>
                                        <select class="form-control form-control-sm" id="agenda_profesional_asistente" name="agenda_profesional_asistente" onchange="cargarAgendaProfesional(1, '');">
                                            <option value="">Seleccione</option>
                                            @if($profesionales)
                                                @foreach($profesionales as $key_pro => $value_pro)
                                                    <option value="{{ $value_pro->id }}" data-id_tipo_agenda="{{ $value_pro->id_tipo_agenda }}">{{ strtoupper($value_pro->nombre) }} {{ strtoupper($value_pro->apellido_uno) }} {{ strtoupper($value_pro->apellido_dos) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 f-12 pb-0" id="tabla_info_profesional" style="display: none;">
                                     <div class="row">
                                        <div class="col-sm-8">
                                            <div class="align-middle m-b-25">
                                                <img src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="user image" class="img-radius align-top m-r-15 wid-60" id="img_profesional">
                                                <div class="d-inline-block f-11">
                                                    <span>
                                                        <strong id="nombre_profesional_agenda"></strong>
                                                    </span><br>
                                                    <span id="especialidad_porfesional_agenda"></span>
                                                    <button type="button" class="btn btn-info-light-c btn-xxxs" id="btn_ver_info_profesional_seleccionado"  onclick=""><i class="feather icon-plus"></i> Más información</button>
                                                    @include('general.bloqueo_hora.bloque_hora_asistente')
                                                    @include('general.anular_hora.anular_hora_asistente')
                                                    <span class="status active"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4" {{ $boxes->count() > 0 ? '' : 'style=display:none' }}>
                                            <div class="align-middle m-b-25">
                                                <div class="d-inline-block f-11">
                                                    <span><strong>BOX</strong></span> <button type="button" class="btn btn-warning-light-c btn-xxxs" id="btn_ver_modificar_box_prof"  onclick=""><i class="feather icon-edit"></i></button><br>
                                                    <span><strong id="profesional_box" style="font-size: 16px;"></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 pb-0" id="seccion_agenda_botones" style="display: none;">
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs" id="btn_ver_lista_espera_profesional_seleccionado" onclick="lista_espera();" ><i class="feather icon-external-link"></i> Ver lista de Espera</button>
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs " id="btn_ver_agregar_hora_extra" onclick="abrir_horas_extras()"; ><i class="feather icon-external-link"></i> Agregar Horas extras</button>
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs " id="btn_ver_agregar_hora_examen" onclick="abrir_horas_examen()"; ><i class="feather icon-external-link"></i>  Ver horas examenes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion_agenda_agendas" style="display: none;">
                    <input type="hidden" name="agenda_lugar_atencion_asistente" id="agenda_lugar_atencion_asistente" value="{{ $lugares_atencion->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-c-blue my-1 d-inline" style="font-size: 1.1rem;" id="titulo_tipo_agenda"></h5>
                                    @include('general.info_simbologia.simbologia_agenda')
                                </div>
                            </div>
                            <div id='agenda'></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: agenda -->

        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!-- DATOS DE VITAL IMPORTANCIA -->
    <input type="hidden" name="id_especialidad_profesional" id="id_especialidad_profesional" value="">
    <input type="hidden" name="id_profesional" id="id_profesional" value="">
@endsection

@section('modales')
    @include('app.asistente_cm.modales.modal_profesional_informacion')

    @include('general.asistentes.modal_consulta_agenda')

    @include('app.asistente_cm_publico.modales.lista_espera')

    {{-- horas extras --}}
    @include('app.asistente_cm_publico.modales.horas_extras')
    @include('app.asistente_cm_publico.modales.horas_extras_agendar')

    {{-- hora examen --}}
    @include('app.general.asistente.reserva_hora_examen.horas_examen')
    @include('app.general.asistente.reserva_hora_examen.horas_examen_agendar')

    {{-- lugar atencion box profesional --}}
    @include('general.asignacion_box_prof.asignacion_box_prof')

    {{-- MODAL RESERVAR HORA ENFERMERÍA --}}
    <div class="modal fade" id="modal_reservar_hora_enf" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h6 class="modal-title text-white f-18"><i class="feather icon-calendar"></i> Agendar Hora Médica</h6>
                    <button type="button" class="close text-white" onclick="$('#modal_reservar_hora_enf').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="enf_reserva_id_profesional" value="">
                    <input type="hidden" id="enf_reserva_id_lugar_atencion_actual" value="{{ $lugares_atencion->id }}">
                    <input type="hidden" id="enf_reserva_tipo_agenda" value="1">
                    <input type="hidden" id="enf_reserva_index_carrito" value="">

                    {{-- Info paciente seleccionado --}}
                    <div class="alert alert-light border mb-3" id="enf_reserva_info_paciente">
                        <strong>Paciente:</strong> <span id="enf_reserva_nombre_paciente"></span>
                        <small class="text-muted ml-2">RUT: <span id="enf_reserva_rut_paciente"></span></small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Lugar de atención</label>
                                <select class="form-control form-control-sm" id="enf_reserva_lugar_atencion" onchange="carga_calendario_enfermeria();">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-3">Días de atención: <span id="enf_reserva_dias_atencion" class="font-weight-bold"></span></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Seleccione una fecha</label>
                                <input class="form-control form-control-sm" type="date" id="enf_reserva_fecha"
                                       onchange="cargar_horas_disponibles_enfermeria(this.value);"
                                       disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="text-info" id="enf_reserva_fecha_seleccionada"></h6>
                        </div>
                        <div class="col-md-12">
                            <div class="row" id="enf_reserva_lista_horas"></div>
                        </div>
                    </div>

                    <hr>
                    <div class="text-center">
                        <h6>Seleccione Lugar de Atención, Día en el calendario y haga click en la Hora Disponible.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- FIN MODAL RESERVAR HORA ENFERMERÍA --}}

    {{-- MODAL CONFIRMAR CITA ENFERMERÍA --}}
    <div id="modal_confirmar_cita_enf" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info pt-3 pb-2">
                    <h5 class="modal-title text-white text-center">Confirmar Cita</h5>
                    <button type="button" class="close text-white" onclick="$('#modal_confirmar_cita_enf').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="enf_cita_id_profesional" value="">
                    <input type="hidden" id="enf_cita_id_paciente" value="">
                    <input type="hidden" id="enf_cita_id_lugar_atencion" value="">
                    <input type="hidden" id="enf_cita_fecha_consulta" value="">
                    <input type="hidden" id="enf_cita_hora_consulta" value="">

                    <div class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr><th><strong>Rut</strong></th><td><span id="enf_cita_rut"></span></td></tr>
                                <tr><th><strong>Nombre</strong></th><td><span id="enf_cita_nombre"></span></td></tr>
                                <tr><th><strong>Fecha Nac.</strong></th><td><span id="enf_cita_fecha_nac"></span></td></tr>
                                <tr><th><strong>Sexo</strong></th><td><span id="enf_cita_sexo"></span></td></tr>
                                <tr><th><strong>Convenio</strong></th><td><span id="enf_cita_convenio"></span></td></tr>
                                <tr><th><strong>Email</strong></th><td><span id="enf_cita_email"></span></td></tr>
                                <tr><th><strong>Teléfono</strong></th><td><span id="enf_cita_telefono"></span></td></tr>
                                <tr><th><strong>Fecha Hora</strong></th><td><span id="enf_cita_fecha_hora_texto" class="font-weight-bold text-info"></span></td></tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Descripción (opcional)</label>
                                <input type="text" class="form-control form-control-sm" id="enf_cita_descripcion" placeholder="Ej: Control de medicamentos crónicos">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="enf_cita_listado_medicamentos" class="font-weight-bold">Listado de medicamentos</label>
                                <ul id="enf_cita_listado_medicamentos" class="list-group list-group-flush"></ul>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-2">
                            <button type="button" onclick="agendar_hora_enfermeria();" class="btn btn-info">
                                <i class="feather icon-check"></i> Agendar Hora
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- FIN MODAL CONFIRMAR CITA ENFERMERÍA --}}

@endsection


@section('page-script')
    <script src="{{ asset('js/jQuery-Mask-Plugin-master/jquery.mask.js') }}"></script>
    <script>

        // Variables globales
        let tipoAdministracionActual = 'medicamentos';
        let profesionalSeleccionado = null;
        let pacienteSeleccionado = null;
        let carritoPacientes = []; // [{ paciente, medicamentos, cargado }]

        // Cambiar tipo de administración
        function cambiarTipoAdministracion(tipo) {
            tipoAdministracionActual = tipo;

            // Actualizar botones
            $('#btn_medicamentos').toggleClass('active', tipo === 'medicamentos');
            $('#btn_visitas').toggleClass('active', tipo === 'visitas');

            // Mostrar/ocultar secciones
            $('#seccion_medicamentos').toggle(tipo === 'medicamentos');
            $('#seccion_visitas').toggle(tipo === 'visitas');

            // Limpiar búsqueda de paciente
            $('#rut_paciente_enfermeria').val('');
            $('#rut_enfermeria_msg').hide();
            pacienteSeleccionado = null;
        }

        // Guardar profesional seleccionado y limpiar búsqueda
        var CalendarEnf = null;
        var info_profesional_enf = {};

        function seleccionarProfesional() {
            const profesionalId = $('#profesional_select').val();
            profesionalSeleccionado = profesionalId || null;
            $('#rut_paciente_enfermeria').val('');
            $('#rut_enfermeria_msg').hide().text('');
            pacienteSeleccionado = null;

            if (profesionalSeleccionado) {
                $('#agenda_enf_id_profesional').val(profesionalSeleccionado);
                cargarAgendaEnfermeria('');
            } else {
                $('#seccion_agenda_enf').hide();
                if (CalendarEnf) { CalendarEnf.destroy(); CalendarEnf = null; }
            }
        }

        function cargarAgendaEnfermeria(fecha) {
            if (fecha != undefined && fecha != '') {
                fecha = fecha.split('T')[0];
            } else {
                fecha = '{{ date("Y-m-d") }}';
            }

            var id_lugar_atencion = $('#agenda_enf_lugar_atencion').val();
            var id_profesional    = $('#agenda_enf_id_profesional').val();

            if (!id_profesional) return;

            let url1 = "{{ route('agenda.buscar_info_profesional') }}";
            $.ajax({
                url: url1,
                type: 'GET',
                data: { id_profesional: id_profesional, id_lugar_atencion: id_lugar_atencion },
                success: function(data) {
                    if (data !== 'null' && data.estado == 1 && data.horario.length != 0) {

                        var nombre_prof = data.profesional.nombre.toUpperCase() + ' '
                                        + data.profesional.apellido_uno.toUpperCase();
                        $('#enf_agenda_nombre_profesional').text('— ' + nombre_prof);

                        info_profesional_enf['profesional']  = data.profesional;
                        info_profesional_enf['horario']      = data.horario;
                        info_profesional_enf['horario_data'] = data.horario_data;

                        $('#seccion_agenda_enf').show();

                        if (CalendarEnf) { CalendarEnf.destroy(); CalendarEnf = null; }

                        var calendarEl = document.getElementById('agenda_enf');
                        CalendarEnf = new FullCalendar.Calendar(calendarEl, {
                            droppable: false,
                            editable: false,
                            locale: 'es',
                            timeZone: 'local',
                            initialDate: fecha,
                            initialView: 'timeGridWeek',
                            themeSystem: 'bootstrap',
                            slotDuration: '00:15:00',
                            headerToolbar: {
                                start: 'prev,next today',
                                center: 'title',
                                right: 'timeGridWeek,listWeek'
                            },
                            weekends: false,
                            nowIndicator: true,
                            selectable: true,
                            titleFormat: { year: 'numeric', month: 'numeric', day: 'numeric' },
                            allDaySlot: false,
                            expandRows: true,
                            slotEventOverlap: false,
                            selectConstraint: 'businessHours',
                            slotLabelFormat: { hour: 'numeric', minute: '2-digit', omitZeroMinute: false, meridiem: 'medium' },
                            eventDidMount: function(info) {
                                $(info.el).tooltip({
                                    title: info.event.extendedProps.description,
                                    placement: 'top',
                                    trigger: 'hover',
                                    container: 'body'
                                });
                            },
                            events: function(start, end, callback) {
                                var arrayTemp = [];
                                let urlEv = "{{ route('hora_medica.ver') }}";
                                $.ajax({
                                    url: urlEv,
                                    type: 'GET',
                                    data: { id_profesional: id_profesional },
                                    success: function(evData) {
                                        if (evData !== 'null' && evData.estado == 1) {
                                            evData.registros.forEach(function(element) {
                                                var descripcion = element.paciente.rut + ' | '
                                                                + element.estado.valor + ' | '
                                                                + (element.comentarios_confirmacion || '') + ' | '
                                                                + element.paciente.prevision.nombre;
                                                arrayTemp.push({
                                                    id: element.id,
                                                    title: element.tipo_hora_medica + ' - ' + element.descripcion,
                                                    description: descripcion,
                                                    start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                    end:   element.fecha_consulta + 'T' + element.hora_termino,
                                                    backgroundColor: element.estado.color
                                                });
                                            });
                                        }
                                        callback(arrayTemp);
                                    }
                                });
                            },
                            dateClick: function(date) {
                                // Validar que no sea día no laboral
                                var esNoLaboral = false;
                                if (date.jsEvent && date.jsEvent.path) {
                                    $.each(date.jsEvent.path, function(i, v) {
                                        if (v.className == 'fc-non-business') esNoLaboral = true;
                                    });
                                }
                                if (esNoLaboral) {
                                    swal('Sin disponibilidad', 'Horario no disponible con el profesional.', 'error');
                                    return;
                                }

                                // Validar que no sea fecha pasada
                                var hoy = new Date();
                                hoy.setHours(0, 0, 0, 0);
                                var fechaClick = new Date(date.dateStr.replace('T', ' '));
                                if (fechaClick < hoy) {
                                    swal('Fecha inválida', 'No puede agendar en fechas anteriores a hoy.', 'error');
                                    return;
                                }

                                seleccionar_hora_desde_calendario_enf(date.date, date.dateStr);
                            },
                            selectOverlap: function(event) {
                                return event.rendering === 'background';
                            },
                            eventDrop: function() { return false; },
                        });

                        // Horarios laborales
                        var data_businessHours = [];
                        $.each(info_profesional_enf.horario, function(key, value) {
                            var dias = value.dia.split(',');
                            data_businessHours.push({ daysOfWeek: dias, startTime: value.hora_inicio, endTime: value.hora_termino });
                        });
                        var tem_hidden = info_profesional_enf.horario_data.horario_agenda.split(',').map(function(d) { return parseInt(d); });

                        CalendarEnf.setOption('hiddenDays', tem_hidden);
                        CalendarEnf.setOption('businessHours', data_businessHours);
                        CalendarEnf.setOption('slotMinTime', info_profesional_enf.horario_data.hora_inicio_agenda);
                        CalendarEnf.setOption('slotMaxTime', info_profesional_enf.horario_data.hora_termino_agenda);
                        CalendarEnf.render();
                        if (fecha) CalendarEnf.gotoDate(fecha);

                    } else {
                        $('#seccion_agenda_enf').hide();
                        swal('Sin agenda', 'El profesional no cuenta con agenda configurada.', 'warning');
                    }
                }
            });
        }

        function seleccionar_hora_desde_calendario_enf(dateObj, dateStr) {
            if (carritoPacientes.length === 0) {
                swal('Sin pacientes', 'Primero busque al menos un paciente por RUT antes de agendar.', 'info');
                return;
            }

            var hora        = dateObj.toTimeString().substring(0, 8); // HH:MM:SS
            var fechaSolo   = dateStr.split('T')[0];
            var hrFormateada = moment(hora, 'HH:mm:ss').format('HH:mm');

            if (carritoPacientes.length === 1) {
                // Un solo paciente: abrir directo
                _abrirConfirmCitaDesdeCalendario(0, hora, fechaSolo, hrFormateada);
                return;
            }

            // Múltiples pacientes: mostrar selector
            var opciones = {};
            carritoPacientes.forEach(function(item, i) {
                var p = item.paciente;
                opciones['pac_' + i] = p.nombres + ' ' + p.apellido_uno + ' (' + p.rut + ')';
            });
            opciones['cancelar'] = { text: 'Cancelar', value: false };

            swal({
                title: '¿Para qué paciente?',
                text: 'Seleccione el paciente para la cita del ' + fechaSolo + ' a las ' + hrFormateada,
                buttons: opciones,
            }).then(function(valor) {
                if (!valor) return;
                var idx = parseInt(valor.replace('pac_', ''));
                _abrirConfirmCitaDesdeCalendario(idx, hora, fechaSolo, hrFormateada);
            });
        }

        function _abrirConfirmCitaDesdeCalendario(indexCarrito, hora, fechaSolo, hrFormateada) {
            var item = carritoPacientes[indexCarrito];
            if (!item) return;
            var p = item.paciente;

            $('#enf_cita_id_profesional').val(profesionalSeleccionado);
            $('#enf_cita_id_paciente').val(p.id);
            $('#enf_cita_id_lugar_atencion').val($('#agenda_enf_lugar_atencion').val());
            $('#enf_cita_fecha_consulta').val(fechaSolo);
            $('#enf_cita_hora_consulta').val(hora);

            $('#enf_cita_rut').text(p.rut || '-');
            $('#enf_cita_nombre').text((p.nombres || '') + ' ' + (p.apellido_uno || '') + ' ' + (p.apellido_dos || ''));
            $('#enf_cita_fecha_nac').text(p.fecha_nac || '-');
            $('#enf_cita_sexo').text(p.sexo == 'M' ? 'Masculino' : (p.sexo == 'F' ? 'Femenino' : '-'));
            $('#enf_cita_convenio').text((p.prevision && p.prevision.nombre) ? p.prevision.nombre : '-');
            $('#enf_cita_email').text(p.email || '-');
            $('#enf_cita_telefono').text(p.telefono_uno || '-');
            $('#enf_cita_fecha_hora_texto').text(fechaSolo + ' a las ' + hrFormateada);
            $('#enf_cita_descripcion').val('Control medicamentos crónicos');

            // Poblar listado de medicamentos del paciente
            var $lista = $('#enf_cita_listado_medicamentos').empty();
            var meds = item.medicamentos || [];
            if (meds.length === 0) {
                $lista.append('<li class="list-group-item list-group-item-secondary py-1 small text-muted">Sin medicamentos crónicos registrados</li>');
            } else {
                meds.forEach(function(reg) {
                    var d = reg.antecedente_data || {};
                    var nombre = d.nombre_medicamento_cronico || d.nombre || '-';
                    var presentacion = d.presentacion || d.dosis || '';
                    var posologia = d.posologia || d.frecuencia || '';
                    var detalle = [presentacion, posologia].filter(Boolean).join(' — ');
                    $lista.append(
                        '<li class="list-group-item py-1 small">' +
                            '<strong>' + nombre + '</strong>' +
                            (detalle ? ' <span class="text-muted">(' + detalle + ')</span>' : '') +
                        '</li>'
                    );
                });
            }

            $('#modal_confirmar_cita_enf').modal('show');
        }

        // Buscar paciente por RUT
        function buscarPacientePorRut() {
            const rut = $('#rut_paciente_enfermeria').val().trim();

            if (!rut) {
                $('#rut_enfermeria_msg').text('Ingrese un RUT para buscar.').show();
                return;
            }

            $('#rut_enfermeria_msg').hide().text('');

            $.ajax({
                url: '{{ route("agenda.buscar_rut_paciente") }}',
                type: 'GET',
                data: {
                    rut: rut,
                    id_profesional: profesionalSeleccionado || ''
                },
                beforeSend: function() {
                    $('#rut_enfermeria_msg').text('Buscando...').removeClass('text-danger').addClass('text-info').show();
                },
                success: function(data) {
                    $('#rut_enfermeria_msg').hide().removeClass('text-info').addClass('text-danger');
                    let paciente = null;
                    try {
                        paciente = (typeof data === 'string') ? JSON.parse(data) : data;
                        if (paciente && paciente.paciente) paciente = paciente.paciente;
                    } catch(e) { paciente = null; }

                    if (paciente && paciente.id) {
                        agregarPacienteAlCarrito(paciente);
                    } else {
                        $('#rut_enfermeria_msg').text('Paciente no encontrado. Verifique el RUT ingresado.').show();
                    }
                },
            });
        }

        // ─────────────────────────────────────────────────────
        // CARRITO DE PACIENTES
        // ─────────────────────────────────────────────────────

        function agregarPacienteAlCarrito(paciente) {
            // Verificar si ya está en el carrito
            const yaExiste = carritoPacientes.find(item => item.paciente.id == paciente.id);
            if (yaExiste) {
                $('#rut_enfermeria_msg')
                    .text('Este paciente ya está en el carrito.')
                    .removeClass('text-danger').addClass('text-warning').show();
                setTimeout(() => $('#rut_enfermeria_msg').hide().removeClass('text-warning').addClass('text-danger'), 3000);
                return;
            }

            const indexNuevo = carritoPacientes.length;
            carritoPacientes.push({ paciente: paciente, medicamentos: [], cargado: false });
            renderizarCarritoPacientes(indexNuevo);
            cargarMedicamentosPacienteCarrito(paciente.id, indexNuevo);
        }

        function renderizarCarritoPacientes(indexExpandir) {
            const count = carritoPacientes.length;
            $('#carrito_pacientes_count').text(count);

            if (count === 0) {
                $('#carrito_pacientes_section').hide();
                return;
            }

            $('#carrito_pacientes_section').show();

            let html = '';
            carritoPacientes.forEach((item, index) => {
                const p = item.paciente;
                const nombre = `${p.nombres || ''} ${p.apellido_uno || ''} ${p.apellido_dos || ''}`.trim();
                const medCount = item.medicamentos.length;
                const badge = item.cargado
                    ? `<span class="badge badge-${medCount > 0 ? 'info' : 'secondary'} ml-1">${medCount} med${medCount !== 1 ? 's' : ''}</span>`
                    : `<span class="badge badge-secondary ml-1"><i class="fas fa-spinner fa-spin"></i></span>`;
                const expandido = (indexExpandir !== undefined) ? (index === indexExpandir) : (index === count - 1);

                html += `
                <div class="card mb-0 border-0 border-bottom">
                    <div class="card-header py-2 px-3 d-flex justify-content-between align-items-center" id="head_pac_${index}">
                        <button class="btn btn-link text-dark font-weight-bold text-left p-0 flex-grow-1"
                                type="button"
                                data-toggle="collapse"
                                data-target="#col_pac_${index}"
                                aria-expanded="${expandido ? 'true' : 'false'}">
                            <i class="feather icon-user mr-1"></i>
                            ${nombre}
                            <small class="text-muted ml-2">RUT: ${p.rut}</small>
                            ${badge}
                        </button>
                        <button class="btn btn-sm btn-outline-danger ml-2" onclick="eliminarPacienteCarrito(${index})">
                            <i class="feather icon-x"></i>
                        </button>
                    </div>
                    <div id="col_pac_${index}" class="collapse ${expandido ? 'show' : ''}">
                        <div class="card-body p-3" id="meds_pac_${index}">
                            <div class="text-center text-muted py-2">
                                <i class="fas fa-spinner fa-spin"></i> Cargando medicamentos...
                            </div>
                        </div>
                    </div>
                </div>`;
            });

            $('#acordeon_carrito_pacientes').html(html);

            // Re-renderizar medicamentos ya cargados
            carritoPacientes.forEach((item, index) => {
                if (item.cargado) renderizarMedicamentosPaciente(index);
            });
        }

        function cargarMedicamentosPacienteCarrito(pacienteId, indexCarrito) {
            $.ajax({
                url: '{{ Request::root() }}/api/antecedente/ver_registros',
                type: 'GET',
                data: { id_tipo_antecedente: 7, estado: 1, id_paciente: pacienteId },
                success: function(response) {
                    carritoPacientes[indexCarrito].medicamentos = (response.estado == 1 && response.registros) ? response.registros : [];
                    carritoPacientes[indexCarrito].cargado = true;
                    renderizarCarritoPacientes();
                },
                error: function() {
                    carritoPacientes[indexCarrito].cargado = true;
                    carritoPacientes[indexCarrito].medicamentos = [];
                    renderizarCarritoPacientes();
                }
            });
        }

        function renderizarMedicamentosPaciente(indexCarrito) {
            const item = carritoPacientes[indexCarrito];
            if (!item) return;
            const meds = item.medicamentos;
            const p = item.paciente;
            const container = $(`#meds_pac_${indexCarrito}`);
            if (!container.length) return;

            if (meds.length === 0) {
                container.html('<div class="alert alert-info mb-0 py-2">No hay medicamentos crónicos registrados para este paciente.</div>');
                return;
            }

            let filas = '';
            meds.forEach((reg, i) => {
                const med = reg.antecedente_data || {};
                const nombre      = med.nombre_medicamento_cronico || med.nombre || '-';
                const presentacion = med.presentacion || med.dosis || '-';
                const posologia   = med.posologia || med.frecuencia || '-';
                const via         = med.via_administracion || '-';
                const cantidad    = med.cantidad || '-';
                filas += `
                <tr>
                    <td class="text-center">${i + 1}</td>
                    <td><strong>${nombre}</strong></td>
                    <td class="text-center"><small>${presentacion}</small></td>
                    <td class="text-center"><small>${posologia}</small></td>
                    <td class="text-center"><small>${via}</small></td>
                    <td class="text-center"><small>${cantidad}</small></td>
                </tr>`;
            });

            container.html(`
            <div class="table-responsive">
                <table class="table table-sm table-hover mb-2">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width:40px">#</th>
                            <th>Medicamento</th>
                            <th class="text-center">Presentación</th>
                            <th class="text-center">Posología</th>
                            <th class="text-center">Vía</th>
                            <th class="text-center">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>${filas}</tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end gap-2 mt-1">
                <button class="btn btn-sm btn-outline-primary mr-2" onclick="notificarPaciente(${indexCarrito})">
                    <i class="feather icon-bell"></i> Notificar
                </button>
                <button class="btn btn-sm btn-success" onclick="confirmarEntregaPaciente(${indexCarrito})">
                    <i class="feather icon-check"></i> Confirmar entrega a ${p.nombres}
                </button>
                <button type="button" class="btn btn-sm btn-outline-info" onclick="hora_medica_pedir_enfermeria(${indexCarrito})">
                    <i class="feather icon-calendar"></i> Agendar hora
                </button>
            </div>`);
        }

        function eliminarPacienteCarrito(indexCarrito) {
            carritoPacientes.splice(indexCarrito, 1);
            renderizarCarritoPacientes();
        }

        function limpiarCarritoPacientes() {
            if (carritoPacientes.length === 0) return;
            swal({
                title: '¿Limpiar todo?',
                text: 'Se quitarán todos los pacientes de la cola de entrega.',
                icon: 'warning',
                buttons: { cancel: 'Cancelar', confirm: 'Limpiar' },
                dangerMode: true
            }).then(ok => {
                if (ok) {
                    carritoPacientes = [];
                    renderizarCarritoPacientes();
                }
            });
        }

        function confirmarEntregaPaciente(indexCarrito) {
            const item = carritoPacientes[indexCarrito];
            if (!item) return;
            const p    = item.paciente;
            const meds = item.medicamentos;

            if (meds.length === 0) {
                swal('Sin medicamentos', 'Este paciente no tiene medicamentos para entregar.', 'info');
                return;
            }

            swal({
                title: 'Confirmar entrega',
                text: `¿Confirmar entrega de ${meds.length} medicamento(s) a ${p.nombres} ${p.apellido_uno}?`,
                icon: 'warning',
                buttons: { cancel: 'Cancelar', confirm: { text: 'Registrar entrega', closeModal: false } }
            }).then(ok => {
                if (!ok) return;

                // Preparar array de medicamentos para enviar (mismo formato que confirmarEntregaFinal)
                const medicamentos_array = meds.map(function(reg) {
                    const d = reg.antecedente_data || {};
                    return {
                        medicamento_id:     reg.id,
                        cantidad_entregada: (d.cantidad || '1').toString().trim(),
                        id_paciente:        p.id,
                        observaciones:      null
                    };
                });

                console.log('🏥 Enviando entregas para paciente:', p.nombres, medicamentos_array);

                // Deshabilitar botón mientras se procesa
                const $btn = $(`#meds_pac_${indexCarrito} .btn-success`);
                $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Registrando...');

                $.ajax({
                    url: '{{ route("adm_cm.cronicos.registrar_entrega") }}',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        medicamentos:    medicamentos_array,
                        observaciones:   '',
                        id_paciente:     p.id,
                        id_profesional:  profesionalSeleccionado || null,
                        _token:          '{{ csrf_token() }}'
                    }),
                    success: function(response) {
                        console.log('✅ Respuesta del servidor:', response);
                        if (response.success) {
                            swal('Éxito', response.message || 'Entregas registradas correctamente', 'success')
                                .then(() => {
                                    eliminarPacienteCarrito(indexCarrito);
                                    notificarPaciente(null, p, meds);
                                });
                        } else {
                            swal('Advertencia', response.message || 'Algunas entregas no pudieron registrarse', 'warning');
                            $btn.prop('disabled', false).html('<i class="feather icon-check"></i> Confirmar entrega a ${p.nombres}');
                        }
                    },
                    error: function(jqXHR) {
                        console.error('❌ Error al registrar entregas:', jqXHR.responseJSON);
                        const msg = (jqXHR.responseJSON && jqXHR.responseJSON.message) || 'Error al registrar entregas';
                        swal('Error', msg, 'error');
                        $btn.prop('disabled', false).html('<i class="feather icon-check"></i> Confirmar entrega a ${p.nombres}');
                    }
                });
            });
        }

        // Notificar al paciente sobre la entrega de sus medicamentos
        // Puede llamarse con indexCarrito (desde botón) o con (null, paciente, meds) tras confirmar entrega
        function notificarPaciente(indexCarrito, pacienteDirecto, medsDirecto) {
            let p, meds;
            if (indexCarrito !== null && indexCarrito !== undefined) {
                const item = carritoPacientes[indexCarrito];
                if (!item) return;
                p    = item.paciente;
                meds = item.medicamentos;
            } else {
                p    = pacienteDirecto;
                meds = medsDirecto || [];
            }

            if (!p || !p.rut) return swal('Atención', 'Paciente sin RUT válido.', 'warning');
            if (meds.length === 0) return swal('Sin medicamentos', 'No hay medicamentos para notificar.', 'info');

            const nombresMeds = meds.map(reg => {
                const d = reg.antecedente_data || {};
                return d.nombre_medicamento_cronico || d.nombre || '-';
            });

            const listaHtml = `<ul class="text-left">${nombresMeds.map(m => `<li>${m}</li>`).join('')}</ul>`;

            swal({
                title: `Notificar a ${p.nombres} ${p.apellido_uno}?`,
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: `<p>Se enviará una notificación para los siguientes medicamentos:</p>${listaHtml}`
                    }
                },
                buttons: {
                    cancel: 'Cancelar',
                    confirm: { text: 'Enviar notificación', closeModal: false }
                }
            }).then(confirm => {
                if (!confirm) return;
                $.ajax({
                    url: '{{ route("adm_cm.cronicos.notificar_entrega") }}',
                    method: 'POST',
                    data: {
                        rut: p.rut,
                        medicamentos: nombresMeds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('✅ Notificación enviada:', response);
                        swal('Enviado', 'Notificación enviada correctamente al paciente.', 'success');
                    },
                    error: function() {
                        swal('Error', 'Hubo un problema al enviar la notificación.', 'error');
                    }
                });
            });
        }

        // Limpiar campo RUT
        function limpiarBusquedaPaciente() {
            $('#rut_paciente_enfermeria').val('');
            $('#rut_enfermeria_msg').hide().text('');
            pacienteSeleccionado = null;
        }

        // Cargar medicamentos crónicos del paciente
        function cargarMedicamentosCronicos(pacienteId) {
            $.ajax({
                url: '{{ url("/cronicos/medicamentos") }}/' + pacienteId,
                method: 'GET',
                beforeSend: function() {
                    $('#medicamentos_tbody').html('<tr><td colspan="7" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando...</td></tr>');
                },
                success: function(response) {
                    let html = '';

                    if(response.data && response.data.length > 0) {
                        response.data.forEach((med, index) => {
                            html += `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td><strong>${med.nombre_medicamento || '-'}</strong></td>
                                    <td class="text-center">${med.presentacion || '-'}</td>
                                    <td class="text-center">${med.posologia || '-'}</td>
                                    <td class="text-center">${med.via_administracion || '-'}</td>
                                    <td class="text-center"><input type="number" class="form-control form-control-sm" value="1" min="1"></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" onclick="registrarEntrega(${med.id})">
                                            <i class="feather icon-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        html = '<tr><td colspan="7" class="text-center text-muted">Sin medicamentos registrados</td></tr>';
                    }

                    $('#medicamentos_tbody').html(html);
                    $('#btn_confirmar_entrega_medicamentos').toggle(response.data && response.data.length > 0);
                },
                error: function(err) {
                    console.error('Error cargando medicamentos:', err);
                    $('#medicamentos_tbody').html('<tr><td colspan="7" class="text-center text-danger">Error al cargar</td></tr>');
                }
            });
        }

        // Cargar visitas de enfermería del paciente
        function cargarVisitasEnfermeria(pacienteId) {
            $.ajax({
                url: '{{ url("/AsistenteEnfermeria/paciente") }}/' + pacienteId + '/visitas',
                method: 'GET',
                beforeSend: function() {
                    $('#visitas_tbody').html('<tr><td colspan="6" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando...</td></tr>');
                },
                success: function(response) {
                    let html = '';

                    if(response.data && response.data.length > 0) {
                        response.data.forEach((visita, index) => {
                            html += `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td>${visita.tipo_visita || '-'}</td>
                                    <td class="text-center">${visita.fecha || '-'}</td>
                                    <td class="text-center">${visita.hora || '-'}</td>
                                    <td>${visita.observaciones || '-'}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-info" onclick="editarVisita(${visita.id})">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="eliminarVisita(${visita.id})">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        html = '<tr><td colspan="6" class="text-center text-muted">Sin visitas registradas</td></tr>';
                    }

                    $('#visitas_tbody').html(html);
                },
                error: function(err) {
                    console.error('Error cargando visitas:', err);
                    $('#visitas_tbody').html('<tr><td colspan="6" class="text-center text-danger">Error al cargar</td></tr>');
                }
            });
        }

        // Registrar entrega de medicamento
        function registrarEntrega(medicamentoId) {
            swal({
                title: 'Confirmar entrega',
                text: '¿Confirmar entrega de este medicamento?',
                icon: 'warning',
                buttons: true
            }).then((willDeliver) => {
                if(willDeliver) {
                    // AJAX para registrar entrega
                    console.log('Entrega registrada para medicamento:', medicamentoId);
                    swal('Hecho', 'Entrega registrada correctamente', 'success');
                }
            });
        }

        // Editar visita
        function editarVisita(visitaId) {
            console.log('Editar visita:', visitaId);
            // Implementar modal de edición
        }

        // Eliminar visita
        function eliminarVisita(visitaId) {
            swal({
                title: 'Eliminar visita',
                text: '¿Estás seguro de que deseas eliminar esta visita?',
                icon: 'warning',
                buttons: true
            }).then((willDelete) => {
                if(willDelete) {
                    console.log('Visita eliminada:', visitaId);
                    swal('Eliminado', 'Visita eliminada correctamente', 'success');
                }
            });
        }

        var CalendarEl = null;
        $(document).ready(function()
        {
            // Inicializar select2 si existe
            if($('#agenda_profesional_asistente').length) {
                $('#agenda_profesional_asistente').select2();
            }

            // Inicializar select2 para el selector de profesional
            $('#profesional_select').select2();

            {{--  CERRAR MODALES  --}}
            $("#cerrar_registro_paciente_hora").click(function() {
                $("#agenda_agregar_paciente").modal('hide');
                $('#rut_paciente_reserva').val('');
            });

            $("#cerrar_tomar_hora").click(function() {
                $("#agenda_agregar_paciente").modal('hide');
                $('#rut_paciente_reserva').val('');
            });

            $("#cerrarModal").click(function() {
                $("#consulta").modal('hide')
            });

            $(".close_modal_recepcion_bonos_api").click(function() {
                $("#modal_recepcion_bonos_api").modal('hide')
            });

            $(".close_agenda_agregar_paciente").click(function() {
                $("#agenda_agregar_paciente").modal('hide');
                $('#rut_paciente_reserva').val('');
            });

            {{-- ****** VALIDACIONDEFORMULARIOS ****** --}}
            {{--  VALIDACION RUT BUSQUEDA - AGENDA  --}}
            $('#validacion_rut_form').validate({
                rules: {
                    rut_paciente_reserva: {
                        required: true,
                        minlength: 9
                    },
                },
                messages: {

                    rut_paciente_reserva: {
                        required: "Debe Ingresar Rut",
                        minlength: "Por favor ingrese un Rut valido 1111111-1"
                    },
                },
            });

            $('#acompanante_representante').change(function(elm)
            {
                if(this.checked)
                {
                    $('#div_info_representante').show();
                }
                else
                {
                    $('#div_info_representante').hide();
                }
            });

            $('#acompanante_acompanante').change(function(elm)
            {
                if(this.checked)
                {
                    $('#div_info_acompanante').show();
                }
                else
                {
                    $('#div_info_acompanante').hide();
                    $('#reserva_hora_id_acompanante').val('').select2();
                }
            });

            $('#autorizacion_atencion').change(function()
            {
                if(this.checked)
                {
                    $('#agenda_validar_auto_menor_edad').modal({backdrop: 'static', keyboard: false});
                    $('#agenda_validar_auto_menor_edad').modal('show');
                    solicitarAutorizacionMenorEdad();
                }
                else
                {
                    // $('#agenda_validar_auto_menor_edad').modal('hide');
                }
            });

        });

        function cerrar_modal_infoProf() {
            $('#info_prof').modal('hide');
        }

        function cerrarModalAutorizacionMenorEdad()
        {
            swal({
                title: "Autorización Para Atención de Menor de Edad.",
                text: 'Al "Aceptar" cierra la ventana sin esperar Autorización del Responsable.\n Debe Realizar la Solicitud Nuevamente.',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                } else {

                    $('#agenda_validar_auto_menor_edad').modal('hide');
                    cancelarautorizacionMenorEdad();

                }
            })
        };

        function solicitarAutorizacionMenorEdad()
        {
            estado_cancelado = 0;
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var id_profesional = $('#agenda_profesional_asistente').val();
            var id_paciente = $('#reserva_hora_id_paciente').val();
            var edad = $('#reserva_hora_edad').val();
            var id_responsable = $('#reserva_hora_id_responsable').val();
            var nombre_representante = $('#div_info_representante').html();

            let url = "{{ route('asistente.solicitar_aprobacion.atencion_menor') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_lugar_atencion : id_lugar_atencion,
                    id_profesional : id_profesional,
                    id_paciente : id_paciente,
                    edad : edad,
                    id_responsable : id_responsable,
                    nombre_representante : nombre_representante,
                },
                success:function(data){
                    if (data !== 'null')
                    {
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#imagen_carga').hide();
                            $('#imagen_resultado').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#text_resultado').html('<h3>En espera de Aprobación</h3>');

                            var token_temp = '';
                            $.each(data.registros, function (key, value) {

                                if(value.estado == 1)
                                {
                                    if(token_temp == '')
                                    {
                                        if(data.registros.length>1)
                                            token_temp = value.log_users_devices.token+'-';
                                        else
                                            token_temp = value.log_users_devices.token;
                                    }
                                    else
                                        token_temp = value.log_users_devices.token;

                                    validar_autorizacion_menor_edad(value.log_users_devices.token);
                                }
                            });

                            $('#agenda_validar_auto_menor_token').val(token_temp);
                        }
                        else
                        {
                            $('#imagen_carga').hide();
                            $('#imagen_resultado').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#text_resultado').html('<h3>Problema al solicitar Aprobación.</h3>');
                        }
                    }
                    else
                    {
                        console.log('error');
                        console.log(data);
                    }
                }
            });
        }

        function validar_autorizacion_menor_edad(token)
        {
            if(estado_cancelado == 0)
            {
                let url = "{{ route('asistente.aprobacion.validar.atencion_menor') }}";
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        token : token,
                    },
                    success:function(data){
                        console.log(data);
                        if(data.estado == 1)
                        {
                            if(data.registro.estado == 1)
                            {
                                $('#imagen_carga').hide();
                                $('#imagen_resultado').html('<img src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Cargando">');
                                $('#text_resultado').html('<h3>Aprobado</h3>');

                                $('#autorizacion_atencion_token').val(token);

                                setTimeout(function(){
                                    $('#agenda_validar_auto_menor_edad').modal('hide');
                                }, 3000);
                            }
                            else if(data.registro.estado == 2)
                            {
                                $('#imagen_carga').hide();
                                $('#imagen_resultado').html('<img src="{{ asset('images/iconos/error.svg') }}" alt="Cargando">');
                                $('#text_resultado').html('<h3>Rechazado</h3>');
                                $('#autorizacion_atencion').prop('checked', false);
                            }
                            else
                            {
                                setTimeout(function(){
                                    validar_autorizacion_menor_edad(token);
                                }, 2000);

                            }
                        }
                        else if(data.estado == 2)
                        {
                            $('#imagen_carga').hide();
                            $('#imagen_resultado').html('<img src="{{ asset('images/iconos/error.svg') }}" alt="Cargando">');
                            $('#text_resultado').html('<h3>Rechazado</h3><br/><p>Debe Intentar nuevamente.</p>');
                            setTimeout(function(){
                                $('#agenda_validar_auto_menor_edad').modal('hide');
                            }, 2000);
                        }
                        else
                        {
                            setTimeout(function(){
                                validar_autorizacion_menor_edad(token);
                            }, 2000);
                        }
                    }
                });
            }
        }

        var estado_cancelado = 0;
        function cancelarautorizacionMenorEdad()
        {
            var token  = $('#agenda_validar_auto_menor_token').val();
            let url = "{{ route('asistente.aprobacion.cancelar.atencion_menor') }}";


            var temp_token = token.split('-');

            $.each(temp_token, function (key, value)
            {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        token : value,
                    },
                    success:function(data){
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#imagen_carga').show();
                            $('#imagen_resultado').html('');
                            $('#text_resultado').html('');
                            $('#autorizacion_atencion_token').val('');


                            swal({
                                title: "Solicitud de aprobacion.",
                                text:"Cancelada",
                                icon: "success",
                            });

                            setTimeout(function(){
                                $('#agenda_validar_auto_menor_edad').modal('hide');
                                $('#autorizacion_atencion').prop('checked', false);
                            }, 1000);

                            estado_cancelado = 1;
                        }

                        else
                        {
                            swal({
                                title: "Solicitud de aprobacion.",
                                text:"Falla en proceso de Cancelación",
                                icon: "error",
                            });
                        }
                    }
                });
            });

        }

        {{--  ***** INICIO FUNCIONES ******  --}}
        /** METODOS DE AGENDA */
        {{-- BUSCAR INFO PROFESIONAL --}}
        function cargarProfesional()
        {
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let url = "{{ route('asistentecm.buscar_info_profesional') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                },
                success:function(data){
                    if (data !== 'null')
                    {
                        //data = JSON.parse(data);
                        {{--  console.log('-----------------------');  --}}
                        {{--  console.log(data);  --}}
                        {{--  console.log('-----------------------');  --}}
                        if(data.estado == 1)
                        {
                            info_profesional_seleccionado.push(data.profesional);
                            info_profesional_seleccionado.push(data.horario);
                            return true;
                        }
                        else
                        {
                            swal({
                                title: "Agenda del Profesional.",
                                text:"El profesional no cuenta con agenda.",
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            return false;
                        }
                    }
                    end(arrayTemp);
                }
            });
        }

        {{--  CARGA AGENDE DEL PROFESIONAL  --}}
        var activeDaysInRange = [];
        function cargarAgendaProfesional(tipo_agenda, fecha)
        {
			 var tipo_agenda_temp = $('#agenda_profesional_asistente option:selected').attr('data-id_tipo_agenda');

            if(tipo_agenda_temp != 0)
                tipo_agenda = tipo_agenda_temp;

            console.log('asistente_cm_publico/escritorio_asistente');
            if(fecha != undefined && fecha != '')
            {
                var res = fecha.split('T')[0];
                fecha = res;
            }
            else
            {
                fecha = '{{ date("Y-m-d") }}';
            }

            var evaluacion = false;

            var id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
            var id_profesional = $('#agenda_profesional_asistente').val();
            let url1 = "{{ route('agenda.buscar_info_profesional') }}";

            if(id_profesional != '')
            {
                $.ajax({
                    url: url1,
                    type: "GET",
                    data: {
                        id_profesional: id_profesional,
                        id_lugar_atencion: id_lugar_atencion,
                        tipo_agenda: tipo_agenda,
                    },
                    success:function(data){
                        console.log(data);
                        $('.boton').hide();
                        if (data !== 'null')
                        {
                            if(data.estado == 1)
                            {
                                $('.boton').css('background-color','#8b52c2');
                                $('.btn-agenda-'+tipo_agenda).css('background-color','#1cbebe');
                                $('#id_tipo_agenda').val(tipo_agenda);
                                $('#id_especialidad_profesional').val(data.profesional.id_especialidad);
                                $('#id_profesional').val(data.profesional.id);

                                if (data.profesional.id_especialidad == 2) {
                                    console.log('dentista');
                                    $('#link_pago_presupuesto_dental').removeClass('d-none');
                                } else {
                                    console.log('general');
                                    $('#link_pago_presupuesto_dental').addClass('d-none');
                                }

                                switch (parseInt(tipo_agenda)) {
                                    case 1://consulta
                                        $('#titulo_tipo_agenda').html('AGENDA DE CONSULTA');
                                        $('#btn_ver_agregar_hora_extra').attr('disabled', false);
                                        $('#btn_ver_agregar_hora_examen').attr('disabled', false);
                                        break;
                                    case 2://dental
                                        $('#titulo_tipo_agenda').html('AGENDA DE DENTAL');
                                        $('#btn_ver_agregar_hora_extra').attr('disabled', true);
                                        $('#btn_ver_agregar_hora_examen').attr('disabled', true);
                                        break;
                                    case 3://telemedicina
                                        $('#titulo_tipo_agenda').html('AGENDA DE TELEMEDICINA');
                                        $('#btn_ver_agregar_hora_extra').attr('disabled', true);
                                        $('#btn_ver_agregar_hora_examen').attr('disabled', true);
                                        break;
                                    case 4://examen
                                        $('#titulo_tipo_agenda').html('AGENDA DE EXAMEN');
                                        $('#btn_ver_agregar_hora_extra').attr('disabled', true);
                                        $('#btn_ver_agregar_hora_examen').attr('disabled', true);
                                        break;
                                }

                                /** activar tipos de agendas del profesional */
                                var tipo_agendas_cant = data.tipo_agendas.length;
                                if(tipo_agendas_cant > 0)
                                {
                                    $.each(data.tipo_agendas, function (key, value)
                                    {
                                        carga_tipos_agendas(data.tipo_agendas);
                                        carga_tipos_agendas_anular(data.tipo_agendas);
                                        $('.btn-agenda-'+value).show();
                                    });
                                }

                                // informacion de box
                                if (data.lug_prof_box !== null && data.lug_prof_box !== undefined)
                                {
                                    $('#profesional_box').html(data.lug_prof_box.box.tipo_box+' '+data.lug_prof_box.box.numero_box);
                                    $('#btn_ver_modificar_box_prof').attr('onclick','abrir_editar_box_prof(\''+data.lug_prof_box.id+'\')');
                                }
                                else
                                {
                                    $('#profesional_box').html('');
                                    $('#btn_ver_modificar_box_prof').attr('onclick','abrir_agregar_box_prof('+data.profesional.id+')');
                                }

                            }

                            if(data.estado == 1 && data.horario.length!=0)
                            {
                                $('#tabla_info_profesional').show();
                                $('#seccion_agenda_botones').show();
                                $('#seccion_agenda_agendas').show();
                                $('#nombre_profesional_agenda').html(data.profesional.nombre.toUpperCase()  + ' ' + data.profesional.apellido_uno.toUpperCase()  + ' ' + data.profesional.apellido_dos.toUpperCase() );

                                var especialidad = '';
                                especialidad += data.especialidad.nombre.toUpperCase() +'<br>';
                                especialidad += data.tipo_especialidad.nombre.toUpperCase() +'<br>';
                                if(data.sub_tipo_especialidad != '')
                                    especialidad += data.sub_tipo_especialidad.nombre.toUpperCase() +'<br>';
                                $('#especialidad_porfesional_agenda').html(especialidad);
                                $('#btn_ver_info_profesional_seleccionado').attr('onclick','info_profesional('+data.profesional.id+');');

                                $('#img_profesional').attr('src', data.profesional.img_profesional);

                                if(data.horario.length > 0)
                                {
                                    info_profesional_seleccionado['profesional'] = data.profesional;
                                    info_profesional_seleccionado['horario'] = data.horario;
                                    info_profesional_seleccionado['horario_data'] = data.horario_data;
                                    evaluacion =  true;
                                }
                                else
                                {
                                    evaluacion =  false;
                                }

                                // carga de examenes posibles por el profesional
                                $('#m_hora_examen_lista_examenes').html('<option value="">Seleccione</option>');
                                if(data.examen_tipo != null && data.examen_tipo != '')
                                {
                                    data.examen_tipo.forEach(element => {
                                        $('#m_hora_examen_lista_examenes').append('<option value="'+element.id+'">'+element.nombre+'</option>');
                                    });
                                }

                                if(evaluacion)
                                {
                                    var calendarEl = document.getElementById('agenda');
                                    CalendarEl = new FullCalendar.Calendar(calendarEl, {
                                        droppable: false,
                                        editable: false,
                                        locale: "es",
                                        timeZone: 'local',
                                        initialDate: fecha,
                                        initialView: 'timeGridWeek',
                                        themeSystem: 'bootstrap',
                                        slotDuration: '00:15:00',
                                        // slotMinutes: '00:15:00',
                                        headerToolbar: {
                                            //start: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek', // will normally be on the left. if RTL, will be on the right
                                            //center: 'title',
                                            //end: 'today prev,next'
                                            start: 'prev,next today',
                                            center: 'title',
                                            // right: 'timeGridWeek,listWeek'
                                            right: 'timeGridWeek,listWeek'
                                        },
                                        // timeGrid: 60,
                                        //navLinks: true,
                                        weekends: true,
                                        nowIndicator: true,
                                        selectable: true,
                                        //dayMaxEvents: true,
                                        titleFormat: {
                                            year: 'numeric',
                                            month: 'numeric',
                                            day: 'numeric'
                                        },
                                        allDaySlot: false,
                                        expandRows: true,
                                        slotEventOverlap: false,

                                        selectConstraint: "businessHours",
                                        slotLabelFormat: {
                                            hour: 'numeric',
                                            minute: '2-digit',
                                            omitZeroMinute: false,
                                            meridiem: 'medium'
                                        },
                                        eventDidMount: function(info) {
                                            {{--   console.log(info.el);  --}}
                                            $(info.el).tooltip({
                                                title: info.event.extendedProps.description,
                                                placement: "top",
                                                trigger: "hover",
                                                container: "body"
                                            });
                                        },

                                        events: function(start, end, callback){
                                            var arrayTemp = [];
                                            let url = "{{ route('hora_medica.ver') }}";

                                            $.ajax({
                                                url: url,
                                                type: "GET",
                                                data: {
                                                    id_profesional: id_profesional,
                                                    id_lugar_atencion: id_lugar_atencion,
                                                },
                                                success:function(data){
                                                    console.log(data);
                                                            if (data !== 'null')
                                                            {
                                                                //data = JSON.parse(data);
                                                                console.log('---------evento--------------');
                                                                console.log(data);
                                                                console.log('-----------------------');
                                                                if(data.estado == 1)
                                                                {
                                                                    // var arraytemp = [];
                                                                    // arraytemp.push([id=>'11']);
                                                                    // console.log(arraytemp)
                                                                    var arrayTemp = [];
                                                                    data.registros.forEach(element => {
                                                                        var rut = element.paciente.rut+' | '
                                                                        var valor = element.estado.valor+' | '
                                                                        var comentarios_confirmacion = '';
                                                                        if(comentarios_confirmacion != 'null')
                                                                            comentarios_confirmacion = element.comentarios_confirmacion+' | '
                                                                        var nombre = element.paciente.prevision.nombre
                                                                        var descripcion = '';

                                                                        if(element.tipo_hora_medica == 'B')
                                                                        {
                                                                            descripcion += valor;
                                                                            arrayTemp.push({
                                                                                            id: element.id,
                                                                                            title: element.descripcion,
                                                                                            description: descripcion ,
                                                                                            start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                                            end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                                            backgroundColor: element.estado.color
                                                                            });
                                                                        }
                                                                        else
                                                                        {
                                                                            descripcion += rut;
                                                                            descripcion += valor;
                                                                            descripcion += comentarios_confirmacion;
                                                                            descripcion += nombre;
                                                                            arrayTemp.push({
                                                                                            id: element.id,
                                                                                            title: element.tipo_hora_medica+' - '+element.descripcion,
                                                                                            description: descripcion ,
                                                                                            start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                                            end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                                            backgroundColor: element.estado.color
                                                                            });
                                                                        }
                                                                    });
                                                                    end(arrayTemp);
                                                                }
                                                                else
                                                                {
                                                                    console.log('falla en carga');
                                                                }
                                                            }

                                                        }
                                            });
                                        },

                                        eventClick: function(info) {
                                            let id_hora_medica = info.event.id;
                                            let url = "{{ route('agenda.buscar_hora_medica') }}";

                                            $.ajax({

                                                    url: url,
                                                    type: "get",
                                                    data: {
                                                        //_token: _token,
                                                        id_hora_medica: id_hora_medica,
                                                    }
                                                })
                                                .done(function(data) {
                                                    if (data != null) {
                                                        $('#modal_consulta_mensaje').text('');
                                                        $('#reserva_hora_id_paciente_asistente').val(data.paciente.id);
                                                        $('#datos_consulta_rut').text(data.paciente.rut);
                                                        $('#datos_consulta_nombre').text(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#input_reserva_hora_nombre_asistente').val(data.paciente.nombres);
                                                        $('#input_reserva_hora_apellido_uno_asistente').val(data.paciente.apellido_uno);
                                                        $('#input_reserva_hora_apellido_dos_asistente').val(data.paciente.apellido_dos);
                                                        $('#datos_consulta_edad').text(data.paciente.fecha_nac);
                                                        $('#input_reserva_fecha_nacimiento_asistente').val(data.paciente.fecha_nac);
                                                        $('#datos_consulta_email').text(data.paciente.email);
                                                        $('#input_reserva_hora_email_asistente').val(data.paciente.email);
                                                        $('#datos_consulta_telefono').text(data.paciente.telefono_uno);
                                                        $('#input_reserva_hora_telefono_asistente').val(data.paciente.telefono_uno);

                                                        $('#datos_consulta_fecha_ultima').text(data.paciente.fecha_ultima_atencion);

                                                        $('#datos_consulta_observaciones').text(data.hora_medica.observaciones);

                                                        if (data.paciente.sexo == 'M') {
                                                            $('#datos_consulta_sexo').text('Masculino');
                                                            $('#input_reserva_sexo_asistente').val('M');
                                                        } else {
                                                            $('#datos_consulta_sexo').text('Femenino');
                                                            $('#input_reserva_sexo_asistente').val('F');
                                                        }

                                                        $('#estado_id_profesional').val(data.profesional.id);
                                                        $('#estado_id_paciente').val(data.paciente.id);
                                                        $('#id_hora_medica').val(id_hora_medica);

                                                        console.log('carga datos');
                                                        console.log(data);
                                                        if(data.paciente?.["direccion"] !== undefined)
                                                        {
                                                            $('#datos_consulta_direcion').html(data.paciente.direccion.direccion);
                                                            $('#input_reserva_hora_direccion_asistente').val(data.paciente.direccion.direccion);
                                                            $('#datos_consulta_numero').html(data.paciente.direccion.numero_dir);
                                                            $('#input_reserva_hora_numero_asistente').val(data.paciente.direccion.numero_dir);
                                                            $('#datos_consulta_region').html(data.paciente.direccion.region.nombre);
                                                            $('#input_reserva_hora_region_asistente').val(data.paciente.direccion.ciudad.id_region);
                                                            $('#datos_consulta_ciudad').html(data.paciente.direccion.ciudad.nombre);
                                                            buscar_ciudad_general('input_reserva_hora_region_asistente','input_reserva_hora_ciudad_asistente', data.paciente.direccion.ciudad.id);
                                                            // $('#input_reserva_hora_ciudad_asistente').val(data.paciente.direccion.ciudad.id);
                                                        }
                                                        else
                                                        {
                                                            $('#datos_consulta_direcion').html('no registrado');
                                                            $('#input_reserva_hora_direccion_asistente').val('');
                                                            $('#datos_consulta_numero').html('no registrado');
                                                            $('#input_reserva_hora_numero_asistente').val('');
                                                            $('#datos_consulta_region').html('no registrado');
                                                            $('#input_reserva_hora_region_asistente').val('');
                                                            $('#datos_consulta_ciudad').html('no registrado');
                                                            $('#input_reserva_hora_ciudad_asistente').val('');
                                                        }

                                                        //celeste
                                                        //Reservada
                                                        if (data.estado_hora == 1 || data.estado_hora == 16) //else if (info.event.backgroundColor == '#FEAA32')
                                                        {
                                                            //'Reservada') //Hora pendiente
                                                            $('#hm_anular_hora').show();
                                                            $('#hm_atender_hora').hide();
                                                            $('#hm_confirmar_hora').show();
                                                            $('#hm_ver_hora').hide();
                                                            $('#hm_espera_paciente_hora').hide();
                                                            $('#confirmar_anulacion_hora').hide();
                                                            $('#confirmacion_hora').hide();

                                                            $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                            $('#consulta').modal('show');
                                                            // $('#id_hora_medica').val(id_hora_medica);
                                                            // console.log(data);
                                                            // $('#reservar_hora').modal('hide');
                                                            //location.reload();


                                                            console.log(data.estado_hora);
                                                            console.log(data.paciente.id_direccion);
                                                            console.log(data.paciente.fecha_nac);

                                                            if(data.estado_hora == 16)
                                                            {
                                                                $('#modal_consulta_mensaje').text('DEBE COMPLETAR LOS DATOS DEL PACIENTE PARA CONFIRMAR HORA');
                                                                // if(data.paciente.id_direccion == 'null' || data.paciente.fecha_nac == 'null')
                                                                if( data.paciente.id_direccion == 'null' || data.paciente.id_direccion == null || data.paciente.id_direccion == '')
                                                                {
                                                                    $('#hm_anular_hora').attr('disabled', 'disabled');
                                                                    $('#hm_confirmar_hora').attr('disabled', 'disabled');
                                                                }
                                                            }
                                                            else
                                                            {
                                                                $('#hm_anular_hora').removeAttr('disabled');
                                                                $('#hm_confirmar_hora').removeAttr('disabled');
                                                            }

                                                        }
                                                        //verde
                                                        // CONFIRMADO
                                                        else if(data.estado_hora == 2)//if (info.event.backgroundColor == '#94BF61')
                                                        {
                                                            //'Confirmada')//Hora confirmada
                                                            // $('#hm_confirmar_hora').hide();
                                                            // $('#hm_anular_hora').show();
                                                            // $('#hm_atender_hora').show();
                                                            // // $('#hm_espera_paciente_hora').show();
                                                            // $('#hm_espera_paciente_hora').hide();
                                                            // $('#hm_ver_hora').hide();
                                                            // $('#confirmar_anulacion_hora').hide();
                                                            // $('#confirmacion_hora').hide();
                                                            $('#modal_recepcion_bonos_api').modal('show');

                                                            /** PESTAÑA DE RECIBIR PAGO */
                                                            $('#bono_paciente_rut').val(data.paciente.rut);
                                                            $('#bono_paciente_rut_dental').val(data.paciente.rut);
                                                            $('#bono_paciente_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                            $('#bono_paciente_nombre_dental').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                            $('#bono_profesional_nombre').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                            $('#bono_profesional_nombre_dental').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                            $('#bono_profesional_rut').val( data.profesional.rut);
                                                            $('#bono_profesional_rut_dental').val( data.profesional.rut);
                                                            $('#bono_hora_medica').val(info.event.id);
                                                            $('#bono_id_profesional').val(data.profesional.id);
                                                            $('#bono_id_paciente').val(data.paciente.id);
                                                            $('#bono_prevision').val(data.paciente.id_prevision);
                                                            $('#bono_prevision_txt').val( $('#bono_prevision option:selected').text() );

                                                            /** PESTAÑA DE VENTA DE BONO */
                                                            $('#venta_rut').val(data.paciente.rut);
                                                            $('#venta_serie').val('');
                                                            $('#venta_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                            $('#venta_paciente_nombre').val(data.paciente.nombres);
                                                            $('#venta_paciente_apellido_uno').val(data.paciente.apellido_uno);
                                                            $('#venta_paciente_apellido_dos').val(data.paciente.apellido_dos);
                                                            $('#venta_paciente_email').val(data.paciente.email);
                                                            $('#venta_previsioon').val('0');
                                                            $('#venta_folio').val('');
                                                            $('#venta_valor_consulta').val('');
                                                            $('#venta_valor_pagar').val('');
                                                            $('#venta_valor_seguro').val('');
                                                            $('#venta_valor_copago').val('');

                                                            $('.venta_autorizada').hide();

                                                            $('#div_btn_pedir_autorizacion').show();

                                                        }
                                                        //rojo
                                                        //Rechazada
                                                        else if(data.estado_hora == 3)//else if (info.event.backgroundColor == '#FF3D3D')
                                                        {
                                                            // 'Rechazada')//Hora cancelada
                                                            $('#hm_anular_hora').hide();
                                                            $('#hm_atender_hora').hide();
                                                            $('#hm_confirmar_hora').hide();
                                                            $('#hm_espera_paciente_hora').hide();
                                                            $('#hm_ver_hora').hide();
                                                            $('#confirmar_anulacion_hora').hide();
                                                            $('#confirmacion_hora').hide();

                                                            $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                            $('#consulta').modal('show');
                                                            // $('#id_hora_medica').val(id_hora_medica);
                                                            // console.log(data);
                                                            // $('#reservar_hora').modal('hide');
                                                            //location.reload();
                                                        }
                                                        //morado
                                                        // Espera -- Llamando
                                                        else if (data.estado_hora == 4 || data.estado_hora == 8) //else if (info.event.backgroundColor == '#A06CC1')
                                                        {
                                                            // 'Espera')//Esperando atención
                                                            // 'Llamando')//Esperando atención
                                                            $('#hm_anular_hora').hide();
                                                            $('#hm_atender_hora').hide();
                                                            $('#hm_confirmar_hora').hide();
                                                            $('#hm_ver_hora').hide();
                                                            $('#hm_espera_paciente_hora').hide();
                                                            $('#confirmar_anulacion_hora').hide();
                                                            $('#confirmacion_hora').hide();

                                                            $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                            $('#consulta').modal('show');
                                                            // $('#id_hora_medica').val(id_hora_medica);
                                                            // console.log(data);
                                                            // $('#reservar_hora').modal('hide');
                                                            //location.reload();
                                                        }
                                                        //rosa
                                                        //Realizando
                                                        else if (data.estado_hora == 5) //else if (info.event.backgroundColor == '#EDBB99')
                                                        {
                                                            //'Realizando')
                                                            $('#hm_anular_hora').hide();
                                                            $('#hm_atender_hora').hide();
                                                            $('#hm_confirmar_hora').hide();
                                                            $('#hm_ver_hora').hide();
                                                            $('#hm_espera_paciente_hora').hide();
                                                            $('#confirmar_anulacion_hora').hide();
                                                            $('#confirmacion_hora').hide();

                                                            $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                            $('#consulta').modal('show');
                                                            // $('#id_hora_medica').val(id_hora_medica);
                                                            // console.log(data);
                                                            // $('#reservar_hora').modal('hide');
                                                            //location.reload();
                                                        }
                                                        //azul
                                                        // Realizada
                                                        else if (data.estado_hora == 6)//else if (info.event.backgroundColor == '#17C1C1')
                                                        {
                                                            //'Realizada')//Paciente atendido
                                                            $('#hm_anular_hora').hide();
                                                            $('#hm_atender_hora').hide();
                                                            $('#hm_confirmar_hora').hide();
                                                            $('#hm_ver_hora').hide();
                                                            $('#hm_espera_paciente_hora').hide();
                                                            $('#confirmar_anulacion_hora').hide();
                                                            $('#confirmacion_hora').hide();

                                                            $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                            $('#consulta').modal('show');
                                                            // $('#id_hora_medica').val(id_hora_medica);
                                                            // console.log(data);
                                                            // $('#reservar_hora').modal('hide');
                                                            //location.reload();
                                                        }
                                                        //naranjo
                                                        //Inasistida
                                                        else if (data.estado_hora == 7)//else if (info.event.backgroundColor == '#F9A825')
                                                        {

                                                            //'Inasistida')
                                                            $('#hm_anular_hora').hide();
                                                            $('#hm_atender_hora').hide();
                                                            $('#hm_confirmar_hora').hide();
                                                            $('#hm_ver_hora').hide();
                                                            $('#hm_espera_paciente_hora').hide();
                                                            $('#confirmar_anulacion_hora').hide();
                                                            $('#confirmacion_hora').hide();

                                                            $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                            $('#consulta').modal('show');
                                                            // $('#id_hora_medica').val(id_hora_medica);
                                                            // console.log(data);
                                                            // $('#reservar_hora').modal('hide');
                                                            //location.reload();

                                                        }

                                                        // $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        // $('#consulta').modal('show');
                                                        // $('#id_hora_medica').val(id_hora_medica);
                                                        // // console.log(data);
                                                        // // $('#reservar_hora').modal('hide');
                                                        // //location.reload();

                                                    }
                                                    else
                                                    {

                                                        swal({
                                                            title: "Paciente no encontrado en el sistema",
                                                            icon: "error",
                                                            buttons: "Aceptar",
                                                            DangerMode: true,
                                                        })
                                                        // alert('Paciente no encontrado en el sistema');
                                                    }

                                                })
                                                .fail(function(jqXHR, ajaxOptions, thrownError) {
                                                    console.log(jqXHR, ajaxOptions, thrownError)
                                                });


                                                $('#datos_hora_medica').show();
                                                $('#cancelacion_hora_medica').hide();
                                                $('#confirmacion_hora_medica').hide();
                                                /*$('#opcion_cancelar_hora_div').hide();*/
                                                $('#id_hora_medica').val(info.event.id);
                                                $('#id_hora_realizar').val(info.event.id);
                                                info.el.style.borderColor = 'red';
                                        },

                                        selectOverlap: function(event) {
                                            {{--  console.log(event);  --}}
                                            return event.rendering === 'background';
                                        },

                                        dateClick: function(date, jsEvent, view) {
                                            console.log('especialidad del profesional : '+data.profesional.id_especialidad);
                                            $('#contenedor_procedimientos_presupuesto').empty();
                                            if(data.profesional.id_especialidad == 2){
                                                $('#contenedor_procedimientos_presupuesto').append(`
                                                    <div class="col-sm-12" id="div_procedimiento" style="display:  none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Seleccione opción o N° de presupuesto</label>
                                                            <select class="form-control form-control-sm" name="presupuesto_numero"
                                                                id="presupuesto_numero" onchange="updateTotalValue()">
                                                            </select>
                                                        </div>
                                                        <div id="contenedor_tratamientos_presupuesto"></div>
                                                    </div>`);
                                            }else if(data.profesional.id_especialidad == 4 && data.profesional.id_tipo_especialidad == 55){
                                                $('#contenedor_procedimientos_presupuesto').append(`
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="div_procedimiento" name="div_procedimiento" style="display: none;">

                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Procedimiento</label>
                                                            <select class="form-control form-control-sm" name="form_reseva_de_horas_id_procedimiento" id="form_reseva_de_horas_id_procedimiento">
                                                                <option value="">Seleccione</option>
                                                                @if (isset($procedimientos) && !empty($procedimientos))
                                                                    @foreach ($procedimientos as $proced )
                                                                        <option value="{{ $proced->id }}" data-cant_bloque="{{ (empty($proced->cantidad_bloques_prof)?$proced->cantidad_bloques:$proced->cantidad_bloques_prof) }}">{{ $proced->nombre }} {{ (empty($proced->cantidad_bloques_prof)?$proced->cantidad_bloques:$proced->cantidad_bloques_prof) }}Blq.</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>

                                                    </div>`);
                                            }else{
                                                $('#contenedor_procedimientos_presupuesto').append(``);
                                            }
                                            var valido = 1;
                                            var valido_fecha = 1;
                                            /** VALIDACION DE FUERA DE HORARIO */
                                            // $.each(date.jsEvent.path, function(index, value)
                                            // $.each(date.jsEvent.srcElement.classList, function(index, value)
                                            // {
                                            //     console.log(value);
                                            //     if(value == 'fc-non-business')
                                            //     {
                                            //         swal({
                                            //             title: "Toma de Hora",
                                            //             text: "Horario no disponible con el Profesional",
                                            //             icon: "error",
                                            //             buttons: "Aceptar",
                                            //             DangerMode: true,
                                            //         })
                                            //         valido = 0;
                                            //     }

                                            // });

                                            if(valido == 1)
                                            {

                                                {{--  console.log(date.date);  --}}
                                                {{--  console.log(date.dateStr);  --}}
                                                var date_str = date.dateStr.replace('T',' ');
                                                var date_DD = new Date(date_str);
                                                var curr_date = date_DD.getDate();
                                                var curr_month = date_DD.getMonth();
                                                var curr_year = date_DD.getFullYear();
                                                var curr_hour = date_DD.getHours();
                                                var curr_mint = date_DD.getMinutes();
                                                var fecha_seleccionada = curr_year+"-"+curr_month+"-"+curr_date+" "+curr_hour+":"+curr_mint;
                                                // $.each(CalendarEl.getEvents(), function( index, value ) {
                                                //     var date_str2 = value.startStr.replace('T',' ');
                                                //     var date_DD2 = new Date(date_str2);
                                                //     var curr_date2 = date_DD2.getDate();
                                                //     var curr_month2 = date_DD2.getMonth();

                                                //     var curr_year2 = date_DD2.getFullYear();
                                                //     var curr_hour2 = date_DD2.getHours();
                                                //     var curr_mint2 = date_DD2.getMinutes();
                                                //     var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;

                                                //     if($.trim(fecha_seleccionada) == $.trim(fecha_evento))
                                                //     {
                                                //         valido = 0;
                                                //     }
                                                // });

                                                /** VALIDAR BLOQUEO */
                                                // CalendarEl.getEvents().forEach(function(event) {
                                                //     var eventEnd = typeof event.end === 'string' ? moment(event.end) : event.end;
                                                //     if (date.date >= event.start && date.date <= eventEnd)
                                                //     {
                                                //         valido = 0;
                                                //         console.log('Existe un evento en esta fecha: ' + event.title);
                                                //         swal({
                                                //             title: "Toma de Hora",
                                                //             text: "El profesional no atiende en este periodo.",
                                                //             icon: "error",
                                                //             buttons: "Aceptar",
                                                //             DangerMode: true,
                                                //         });
                                                //         return false;
                                                //     }
                                                // });

                                                /** validar  dias pasados */
                                                var diaActual = '{{ date('d') }}';
                                                var mesActual = '{{ date('m')-1 }}';
                                                var anioActual = '{{ date('Y') }}';

                                                var fecha_actual = new Date(anioActual, mesActual, diaActual);
                                                var fecha_seleccion = new Date(curr_year, curr_month, curr_date);

                                                if(fecha_actual > fecha_seleccion){
                                                    console.log("fecha_actual > fecha_seleccion");
                                                    valido_fecha = 0;
                                                }
                                                if(fecha_actual <= fecha_seleccion){
                                                    console.log("fecha_actual < fecha_seleccion");
                                                    valido_fecha = 1;
                                                }


                                                if(valido == 1)
                                                {
                                                    if(valido_fecha == 1)
                                                    {
                                                        $('.div_rut_buscar').show();
                                                        $('#agenda_agregar_paciente').modal('show');
                                                        $('#reserva_datos_paciente').hide();
                                                        $('#rut_paciente_reserva').val('');
                                                        $('#reserva_agregar_paciente_hora').hide();
                                                        $('#fecha_consulta').val(date.dateStr);
                                                    }
                                                    else
                                                    {
                                                        swal({
                                                            title: "Seleccion Fecha",
                                                            text: "No Puede tomar Hora en Fechas Anterior a la actual",
                                                            icon: "error",
                                                            buttons: "Aceptar",
                                                            DangerMode: true,
                                                        })
                                                    }
                                                }
                                                else
                                                {
                                                    swal({
                                                        title: "Toma de Hora",
                                                        text: "Hora con profesional ya esta tomada",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    })
                                                }
                                            }
                                        },
                                        eventDrop: function(info) {
                                            {{--  console.log(info);  --}}
                                            return false;
                                        },

                                    });

                                    var data_businessHours = [];
                                    $.each(info_profesional_seleccionado.horario, function(key, value){
                                        var dias =  value.dia.split(",");
                                        data_businessHours.push({
                                            'daysOfWeek': dias ,
                                            'startTime': value.hora_inicio,
                                            'endTime': value.hora_termino
                                        });
                                    })
                                    var tem_hiddenDays = info_profesional_seleccionado.horario_data.horario_agenda.split(",");
                                    var tem_hiddenDays2 =[];

                                    $.each(tem_hiddenDays, function(key, value){
                                        {{--  console.log(value);  --}}
                                        tem_hiddenDays2.push(parseInt(value));
                                    });

                                    CalendarEl.setOption('hiddenDays',tem_hiddenDays2  );
                                    CalendarEl.setOption('businessHours', data_businessHours );
                                    CalendarEl.setOption('slotMinTime', info_profesional_seleccionado.horario_data.hora_inicio_agenda );
                                    CalendarEl.setOption('slotMaxTime', info_profesional_seleccionado.horario_data.hora_termino_agenda );

                                    /** registra la fecha de la semana en la vista */
                                    CalendarEl.on('datesSet', function(info) {
                                        activeDaysInRange = [];
                                        var dia_inicio = CalendarEl.view.currentStart;
                                        var dia_fin = CalendarEl.view.currentEnd;
                                        var array_activos = CalendarEl.getCurrentData().dateProfileGenerator.isHiddenDayHash;
                                        getInactiveDays(dia_inicio, dia_fin, array_activos);
                                        console.log('activeDaysInRange2:', activeDaysInRange);
                                    })
                                    CalendarEl.render();

                                    if(fecha != '' && fecha != null)
                                        CalendarEl.gotoDate(fecha);
                                }
                                else
                                {
                                    swal({
                                        title: "Agenda del Profesional.",
                                        text:"El profesional no cuenta con agenda.",
                                        icon: "error",
                                        // buttons: "Aceptar",
                                        //SuccessMode: true,
                                    });
                                    evaluacion =  false;
                                    $('#agenda').html('');
                                    $('#titulo_tipo_agenda').html('');
                                    $('#tabla_info_profesional').hide();
                                    $('#seccion_agenda_botones').hide();
                                    $('#seccion_agenda_agendas').hide();
                                }

                            }
                            else
                            {
                                swal({
                                    title: "Agenda del Profesional.",
                                    text:"El profesional no cuenta con agenda.",
                                    icon: "error",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                                evaluacion =  false;
                                $('#agenda').html('');
                                $('#titulo_tipo_agenda').html('');
                                $('#tabla_info_profesional').hide();
                                $('#seccion_agenda_botones').hide();
                                $('#seccion_agenda_agendas').hide();
                            }
                        }
                        else
                        {
                            $('#agenda').html('');
                            $('#titulo_tipo_agenda').html('');
                            $('#tabla_info_profesional').hide();
                            $('#seccion_agenda_botones').hide();
                            $('#seccion_agenda_agendas').hide();
                        }
                    }
                });
            }
            else
            {
                $('#agenda').html('');
                $('#titulo_tipo_agenda').html('');
                $('#tabla_info_profesional').hide();
                $('#seccion_agenda_botones').hide();
                $('#seccion_agenda_agendas').hide();
            }



        }

        {{--  CANCELAR HORA CARGA DE MENSAJE --}}
        function opcion_cancelar_hora()
        {
            $('#datos_hora_medica').hide();
            $('#cancelacion_hora_medica').show();
            $('#cabecera_hora_medica').text('Cancelar Hora Medica');
            $('#hm_anular_hora').hide();
            $('#hm_atender_hora').hide();
            $('#hm_confirmar_hora').hide();
            $('#hm_ver_hora').hide();
            $('#confirmar_anulacion_hora').show();
        };

        {{--  CANCELAR HORA  --}}
        function cancelar_hora() {

            let url = "{{ route('agenda.cancelar_hora') }}";
            let comentario = $('#cancelar_hora_comentario').val();
            let id_hora_medica = $('#id_hora_medica').val();

            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    comentario: comentario,
                    id_hora_medica: id_hora_medica
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    {{--  console.log(data);  --}}
                    $('#consulta').modal('hide');
                    swal({
                        title: "Exito!",
                        text: "Hora medica cancelada correctamente",
                        type: "success",
                        confirmButtonText: "Cool"
                    });

                    cargarAgendaProfesional($('#id_tipo_agenda').val(), '');


                } else {
                    alert('No se pudo Confirmar Reserva');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
            });

        };

        {{--  CONFIRMAR HORA OPCION --}}
        function opcion_confirmar_hora()
        {
            $('#datos_hora_medica').hide();
            $('#cancelacion_hora_medica').hide();
            $('#cabecera_hora_medica').text('Confirmar Hora Medica');
            $('#hm_anular_hora').hide();
            $('#hm_atender_hora').hide();
            $('#hm_confirmar_hora').hide();
            $('#hm_ver_hora').hide();
            $('#confirmacion_hora').show();
            $('#confirmacion_hora_medica').show();
            $('#confirmacion_hora_medica .row.d-none').removeClass('d-none');
        };

        {{--  CONFIRMAR HORA  --}}
        function confirmar_hora() {

            let url = "{{ route('agenda.confirmar_hora') }}";
            let comentario = $('#confirmar_hora_comentario').val();
            let id_hora_medica = $('#id_hora_medica').val();
            let id_profesional = $('#estado_id_profesional').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        comentario: comentario,
                        id_hora_medica: id_hora_medica
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        {{--  console.log(data);  --}}
                        swal({
                            title: "Exito!",
                            text: "Se ha confirmado su hora medica",
                            type: "success",
                            // DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        cargarAgendaProfesional($('#id_tipo_agenda').val(), data.fecha_consulta);
                        $('#consulta').modal('hide');

                    } else {
                        swal({
                            title: "Error!",
                            text: "No se pudo Confirmar Reserva",
                            type: "danger",
                            DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
                });

        };

        {{-- RECIBIR PAGO --}}
        function recepcion_pago()
        {
            let token = CSRF_TOKEN;
            var bono_paciente_rut = $('#bono_paciente_rut').val();
            var bono_paciente_nombre = $('#bono_paciente_nombre').val();
            var bono_paciente_email = $('#bono_paciente_email').val();
            var bono_paciente_telefono = $('#bono_paciente_telefono').val();
            var result_codigo_validacion_bono = $('#result_codigo_validacion_bono').val();
            var bono_profesional_nombre = $('#bono_profesional_nombre').val();
            var bono_profesional_rut = $('#bono_profesional_rut').val();
            var bono_numero = $('#bono_numero').val();
            var bono_valor_consulta = $('#bono_valor_consulta').val();
            var bono_valor_bonificacion = $('#valor_bonificacion').val();
            var bono_valor_seguro = $('#valor_seguro').val();
            var bono_prevision = $('#bono_prevision').val();
            var bono_prevision_nombre = $('#bono_prevision option:selected').text();
            var recepcion_programa = $('#recepcion_programa').val();
            var bono_sn_sesiones = $('#bono_sn_sesiones').val();

            var bono_hora_medica = $('#bono_hora_medica').val();
            var bono_id_profesional = $('#bono_id_profesional').val();
            var bono_id_paciente = $('#bono_id_paciente').val();
            var bono_id_tipo_bono = $('#bono_id_tipo_bono').val();
            var bono_id_clase_bono = $('#bono_id_clase_bono').val();

            var mensaje = '';
            var valido = 1;

            if(bono_paciente_rut == '')
            {
                mensaje += 'Campo requerido RUT DEL PACIENTE\n';
                valido = 0;
            }
            if(bono_paciente_nombre == '')
            {
                mensaje += 'Campo requerido NOMBRE DEL PACIENTE\n';
                valido = 0;
            }

            // Validación de email y teléfono validado
            // Considerar emails temporales del sistema como "sin email"
            var tieneEmailReal = (bono_paciente_email != '' &&
                                  bono_paciente_email.trim() != '' &&
                                  bono_paciente_email.indexOf('@med-sdi.cl') === -1);

            if(!tieneEmailReal && (bono_paciente_telefono == '' || bono_paciente_telefono.trim() == ''))
            {
                mensaje += 'Debe ingresar al menos un medio de contacto (Email o Teléfono)\n';
                valido = 0;
            }

            // Si no hay email real, el teléfono debe estar validado con SMS
            if(!tieneEmailReal &&
               (result_codigo_validacion_bono == '' || result_codigo_validacion_bono == '0'))
            {
                // mensaje += 'Debe validar el número de teléfono con el código SMS\n';
                // valido = 0;
            }

            if(bono_profesional_nombre == '')
            {
                mensaje += 'Campo requerido NOMBRE DEL PROFESIONAL\n';
                valido = 0;
            }
            if(bono_profesional_rut == '')
            {
                mensaje += 'Campo requerido RUT DEL PROFESIONAL\n';
                valido = 0;
            }
            if(bono_id_clase_bono != 6)
            {
                if(bono_numero == '')
                {
                    mensaje += 'Campo requerido NUMERO DEL BONO O PROGRAMA\n';
                    valido = 0;
                }
            }
            if(bono_valor_consulta == '')
            {
                mensaje += 'Campo requerido VALOR TOTAL\n';
                valido = 0;
            }
            if(bono_valor_seguro == ''){
                mensaje += 'Campo requerido VALOR SEGURO\n';
                valido = 0;
            }

            if(bono_valor_bonificacion == '')
            {
                mensaje += 'Campo requerido VALOR BONIFICACION\n';
                valido = 0;
            }

            if(bono_prevision == '' || bono_prevision == 0)
            {
                mensaje += 'Campo requerido CONVENIO\n';
                valido = 0;
            }

            if(valido == 1)
            {
                let url = "{{ route('agenda.recibir_bono') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        // _token: token,
                        _token: CSRF_TOKEN,
                        convenio: bono_prevision,
                        convenio_nombre: bono_prevision_nombre,
                        numero_bono: bono_numero,
                        valor_atencion: bono_valor_consulta,
                        valor_bonificacion: bono_valor_bonificacion,
                        valor_seguro: bono_valor_seguro,
                        glosa: '1',
                        id_profesional: bono_id_profesional,
                        id_asistente: '{{ $asistente->id }}',
                        id_paciente: bono_id_paciente,
                        id_tipo_bono: bono_id_tipo_bono,
                        id_clase_bono: bono_id_clase_bono,
                        id_referencia: bono_hora_medica,//une bono a hora medica (para buscar id ficha atencion)
                        numero_sesiones: bono_sn_sesiones,
                        paciente_email: bono_paciente_email,
                        paciente_telefono: bono_paciente_telefono
                    }
                })
                .done(function(data)
                {
                    if (data !== 'null')
                    {
                        if(data.estado == 1)
                        {
                            swal({
                                title: "Recepción de bonos y programas",
                                text: 'Pago Exitoso',
                                icon: "success",
                            });
                            cargarAgendaProfesional($('#id_tipo_agenda').val(),data.hora_medica.fecha_consulta);
                            $('#modal_recepcion_bonos_api').modal('hide');
                            $('#bono_paciente_rut').val('');
                            $('#bono_paciente_nombre').val('');
                            $('#bono_paciente_email').val('');
                            $('#bono_paciente_telefono').val('');
                            $('#bono_profesional_nombre').val('');
                            $('#bono_profesional_rut').val('');
                            $('#bono_numero').val('');
                            $('#bono_valor_consulta').val('');
                            $('#bono_prevision').val('');
                            $('#recepcion_programa').val('');
                            $('#bono_sn_sesiones').val('');
                            $('#bono_hora_medica').val('');
                            // Limpiar validación de teléfono
                            $('#btn_bono_paciente_telefono_validar').show();
                            $('#btn_bono_paciente_telefono_validar').attr('disabled', true);
                            $('#div_codigo_validador_bono').hide();
                            $('#div_codigo_validador_mensaje_bono').hide();
                            $('#result_codigo_validacion_bono').val('0');
                            $('#mensaje_email_bono').hide();
                            {{--  $('#bono_id_profesional').val('');  --}}
                            {{--  $('#bono_id_paciente').val('');  --}}
                            {{--  $('#bono_id_tipo_bono').val('');  --}}

                        }
                        else
                        {
                            var mensaje = '';
                            if(isset(data.bono))
                            {
                                if(data.bono.estado == 0)
                                {
                                    mensaje +=  bono.estado.msj;
                                }
                                if(data.hora_medica.estado == 0)
                                {
                                    mensaje +=  data.hora_medica.msj;
                                }
                            }
                            else
                            {
                                mensaje += data.error;
                            }

                            swal({
                                title: "Recepción de bonos y programas",
                                text: 'Pago con Problemas.\n'+data.msj+'\n'+mensaje,
                                icon: "success",
                            });

                        }
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('fail');
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else
            {
                swal({
                    title: "Recepción de bonos y programas",
                    text: mensaje,
                    icon: "error",
                });
            }

        }

        {{-- BUSCAR PACIENTE --}}
        function buscar_paciente() {

            $('#div_cargando').show();
            $('#div_boton_buscar_paciente').hide();

            $('#form_reseva_de_horas').submit(function(e) {
                e.preventDefault();
            });

            $('#reserva_hora_nombres_paciente').val('');
            $('#reserva_hora_apellido_uno').val('');
            $('#reserva_hora_apellido_dos').val('');
            $('#reserva_hora_fecha_nac').val('');
            $('#reserva_hora_sexo').val('');
            $('#reserva_hora_convenio').val('');
            $('#reserva_hora_direccion').val('');
            $('#reserva_hora_numero_dir').val('');
            $('#ciudad_agregar').val('');
            $('#reserva_hora_correo').val('');
            $('#reserva_hora_telefono_uno').val('');
            $('#reserva_hora_confirmacion').val('');
            $('#reserva_representante_nuevo_exitente').val('');
            $('#reserva_representante_id').val('');
            $('#reserva_representante_id_usuario').val('');
            $('#reserva_hora_representante_rut').val('');
            $('#reserva_hora_representante_nombres_paciente').val('');
            $('#reserva_hora_representante_apellido_uno').val('');
            $('#reserva_hora_representante_apellido_dos').val('');
            $('#reserva_hora_representante_fecha_nac').val('');
            $('#reserva_hora_representante_sexo').val('');
            $('#reserva_hora_representante_convenio').val('');
            $('#reserva_hora_representante_direccion').val('');
            $('#reserva_hora_representante_numero_dir').val('');
            $('#reserva_hora_representante_region_agregar').val('');
            $('#reserva_hora_representante_ciudad_agregar').val('');
            $('#reserva_hora_representante_correo').val('');
            $('#reserva_hora_representante_telefono_uno').val('');
            $('#reserva_hora_representante_agregar_relacion').val('');
            evaluar_edad();
            $('.div_representante_nuevo').hide();
            $('.div_representante_existente').hide();

            $('#prereserva_hora_nombres_paciente').val('');
            $('#prereserva_hora_apellido_uno').val('');
            $('#prereserva_hora_apellido_dos').val('');
            $('#prereserva_hora_correo').val('');
            $('#prereserva_hora_telefono_uno').val('');


            let rut = $('#rut_paciente_reserva').val();

			if(rut != '')
            {

				$('#reserva_agregar_paciente_hora').hide();
				$('#reserva_datos_paciente').hide();
				let url = "{{ route('agenda.buscar_rut_paciente') }}";

				$.ajax({

						url: url,
						type: "get",
						data: {
							rut: rut,
                            id_profesional: $('#id_profesional').val(),
						},
					})
					.done(function(data) {
                        console.log(data);
                        $('#div_cargando').hide();
                        $('#div_boton_buscar_paciente').show();

                        console.log(JSON.parse(data));
						if (data !== 'null') {
							data = JSON.parse(data);

                            if(data.tipo_paciente == 'SI')
							{
                                {{-- validacion para especialidad de pediatria --}}
                                @if (isset($profesional))
                                    @if ($profesional->id_tipo_especialidad == 11)
                                        if (data.edad > 18) {
                                            swal({
                                                title: "Reserva de hora",
                                                text: "El paciente es mayor de edad, el profesional es Pediatrico",
                                                icon: "warning",
                                                buttons: "Aceptar",
                                            });
                                        }
                                    @endif
                                @endif

								$('.paciente_view').show();
								$('.paciente_edit').hide();

								{{--  console.log(data);  --}}
								$('#reserva_datos_paciente').show();
								$('#reserva_hora_id_paciente').val(data.id);
								$('#reserva_rut_paciente').text(data.rut);

								$('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
								$('#input_reserva_hora_nombre').val(data.nombres);
								$('#input_reserva_hora_apellido_uno').val(data.apellido_uno);
								$('#input_reserva_hora_apellido_dos').val(data.apellido_dos);

								$('#reserva_fecha_nacimiento').text(data.fecha_nac);
								$('#input_reserva_fecha_nacimiento').val(DateFormatVista(data.fecha_nac));

                                $('#reserva_fecha_ultima').text(data.fecha_ultima_atencion);
                                let bonos = data.bonos;
                                let suma_pagado = 0;

                                bonos.forEach(b => {
                                    suma_pagado += b.valor_atencion;
                                });
                                $('#estado_pago').empty();
                                var clase = 'bg-success';
                                if(suma_pagado < 16770){
                                    clase = 'bg-danger';
                                    $('#estado_pago').append(`
                                        <div class="circle ${clase}"></div>
                                    `);
                                }else{
                                    $('#estado_pago').append(`
                                        <div class="circle ${clase}"></div>
                                    `);
                                }

								if (data.sexo == 'M') {
									$('#reserva_sexo').text('Masculino');
								} else {
									$('#reserva_sexo').text('Femenino');
								}
								$('#input_reserva_hora_sexo').val(data.sexo);

								$('#reserva_hora_email').text(data.email);
								$('#input_reserva_hora_email').val(data.email);

								$('#reserva_hora_telefono').text(data.telefono_uno);
								$('#input_reserva_hora_telefono').val(data.telefono_uno);

								$('#reserva_convenio').text(data.prevision.nombre);
								$('#input_reserva_convenio').val(data.prevision.id);


                                $('#div_procedimiento').css('display','block');
								$('#reserva_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);
								$('#input_reserva_direccion_direccion').val(data.direccion.direccion);
								$('#input_reserva_direccion_numero_dir').val(data.direccion.numero_dir);

								$('#input_reserva_direccion_region').val(data.direccion.ciudad.id_region);
								// $('#input_reserva_direccion_ciudad_agregar').val(data.direccion.ciudad.id);
								buscar_ciudad_general('input_reserva_direccion_region', 'input_reserva_direccion_ciudad', data.direccion.ciudad.id);

								$('#rut_paciente_reserva').val('');
								$('.div_rut_buscar').hide();

								$('#reserva_hora_edad').val(data.edad);

								$('#id_lugar_atencion').val($('#agenda_lugar_atencion_asistente').val());

                                $('#presupuesto_numero').empty();

                                console.log(data.presupuestos.length);
                                if(data.presupuestos.length > 0){
                                    $('#presupuesto_numero').append('<option>Seleccione el presupuesto </option>');
                                    data.presupuestos.forEach(p => {
                                        $('#presupuesto_numero').append(`<option value="${p.id}" data-total="${p.valor_total}">${p.id} - ${p.fecha}</option>`);
                                    });
                                }else{
                                    $('#presupuesto_numero').append(`<option value="0">Primera consulta</option>`);
                                    $('#presupuesto_numero').append(`<option value="u">Urgencia</option>`);

                                }

								if(data.edad < 18)
								{
									$('#acompanante_representante').prop("checked", true);
									$('#acompanante_acompanante').prop("checked", false);
									$('#autorizacion_atencion').prop("checked", false);

									$('#div_info_representante').html(data.nombre_responsable);

									$('#reserva_hora_id_acompanante').html('');
									$.each(data.acompanante, function (indexInArray, valueOfElement)
									{
										console.log(valueOfElement);
										var html = '';
										html = '<option value="'+valueOfElement.id_acompanante+'">'+valueOfElement.acompanante.nombre+' '+valueOfElement.acompanante.apellido_uno+' - '+valueOfElement.acompanante.rut+'</option>';
										$('#reserva_hora_id_acompanante').append(html);
									});
									$('#reserva_hora_id_acompanante').select2();

									$('#reserva_hora_id_responsable').val(data.id_responsable);

									$('#seccion_acompanante').show();
									$('#seccion_autorizacion').show();
								}
								else
								{
									$('#acompanante_representante').prop("checked",false);
									$('#acompanante_acompanante').prop("checked",false);
									$('#autorizacion_atencion').prop("checked",false);
									$('#reserva_hora_id_acompanante').val('');


									$('#reserva_hora_id_responsable').val('');

									$('#seccion_acompanante').hide();
									$('#seccion_autorizacion').hide();
								}
							}
							else
							{
								$('#reserva_datos_paciente').hide();
								$('#reserva_agregar_paciente_hora').show();

								$('#reserva_hora_nombres_paciente').val(data.nombres);
								$('#reserva_hora_apellido_uno').val(data.apellido_uno);
								$('#reserva_hora_apellido_dos').val(data.apellido_dos);
								$('#reserva_hora_fecha_nac').val(data.fecha_nac);
								if(data.sexo != null)
									$('#reserva_hora_sexo').val(data.sexo);
								else
									$('#reserva_hora_sexo').val(0);

								$('#reserva_hora_correo').val(data.email);

                                if(data?.["direccion"] !== undefined)
                                {
                                    $('#region_agregar').val(data.direccion.ciudad.id_region);
                                    buscar_ciudad(data.direccion.id_ciudad);
                                    $('#reserva_hora_direccion').val(data.direccion.direccion);
                                    $('#reserva_hora_numero_dir').val(data.direccion.numero_dir);
                                }

								$('#reserva_hora_telefono_uno').val(data.telefono_uno);

								$('#reserva_hora_id_responsable').val('');

								{{--
								$('#reserva_hora_profesion').val();
								$('#reserva_hora_convenio').val();
								$('#reserva_hora_descripcion').val();
								--}}

                                console.log('INFORMACION DE PRE RESERVA');
                                console.log(data);

                                // INFORMACION DE PRE RESERVA
                                $('#prereserva_hora_nombres_paciente').val(data.nombres);
                                $('#prereserva_hora_apellido_uno').val(data.apellido_uno);
                                $('#prereserva_hora_apellido_dos').val(data.apellido_dos);
                                $('#prereserva_hora_correo').val(data.email);
                                $('#prereserva_hora_telefono_uno').val(data.telefono_uno);
							}
						} else {
							$('#reserva_datos_paciente').hide();
							$('#reserva_agregar_paciente_hora').show();
						}

					})
					.fail(function(jqXHR, ajaxOptions, thrownError) {
						console.log(jqXHR, ajaxOptions, thrownError)
					});
			}
            else
            {
                swal({
                    title: "Buscar Paciente",
                    text: 'Debe ingresar RUT para buscar.',
                    icon: "error",
                });

                $('#div_cargando').hide();
                $('#div_boton_buscar_paciente').show();
            }
		};

        // Función para actualizar el input de valor total
        function updateTotalValue() {
            const selectedOption = $('#presupuesto_numero option:selected'); // Obtener la opción seleccionada
            let url = "{{ ROUTE('profesional.mi_agenda.dame_tratamientos_presupuesto') }}";
            let id_presupuesto = selectedOption.val();

            $.ajax({
                type:'post',
                url: url,
                data:{
                    id: id_presupuesto,
                    id_profesional: $('#id_profesional').val(),
                    _token: CSRF_TOKEN
                },
                success: function(resp){
                    $('#n_presupuesto_dental').val(id_presupuesto);
                    console.log(resp);
                    let tratamientos = resp.tratamientos;
                    let todos = resp.todos;
                    const totalValue = selectedOption.data('total') || ''; // Obtener el valor del atributo data-total
                    var bloques = resp.bloques;
                    $('#bono_valor_consulta').val(totalValue); // Actualizar el input de valor total
                    $('#contenedor_tratamientos_presupuesto').show();
                    $('#contenedor_tratamientos_presupuesto').empty();
                    tratamientos.forEach(t => {

                        const checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        const disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked)" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">N° Pieza ${t.pieza} - ${t.tratamiento}</label>
                            </div>`);


                    });
                    todos.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar superior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    $('#contenedor_tratamientos_presupuesto').append('Se utilizan <span id="cantidad_bloques_atencion">'+bloques+'</span> bloques de atención.');
                },
                error: function(error){
                    console.log(error);
                }
            });

        }

        function handleCheckboxClick(id, isChecked, tipo = null) {
            console.log(`Checkbox con ID ${id} está ${isChecked ? 'seleccionado' : 'deseleccionado'}`);

            // Aquí puedes manejar la lógica adicional o enviar el ID al servidor
            $.ajax({
                url: '{{ ROUTE("profesional.mi_agenda.atender_tratamiento_presupuesto") }}',
                method: 'POST',
                data: { id: id, checked: isChecked,tipo: tipo, _token: CSRF_TOKEN },
                success: function(response) {
                    console.log('Servidor respondió:', response);
                    let bloques_actualizados = response.bloques;
                    let bloques_original = parseInt($('#cantidad_bloques_atencion').text());
                    let bloques = response.atendido == 1 ? bloques_original + bloques_actualizados : bloques_original - bloques_actualizados;
                    if(bloques < 0) bloques = 0;
                    $('#cantidad_bloques_atencion').html(bloques);
                },
                error: function(error) {
                    console.error('Error al enviar datos:', error);
                }
            });
        }

        {{--  REGISTRO NUEVO PACIENTE GENERACION DE HORA  --}}
         function agendar_hora_paciente_nuevo() {

            let url = "{{ route('agenda.agendar_hora_nuevo_paciente') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let tipo_agenda = $('#id_tipo_agenda').val();
            var tipo_agenda_text = 'C';

            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C'; //CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D'; //DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T'; //TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E'; //EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);

            let rut_paciente_reserva = $('#rut_paciente_reserva').val();
            if (rut_paciente_reserva == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el Rut",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return false;
            }

            let reserva_hora_nombre = $('#reserva_hora_nombres_paciente').val();
            if (reserva_hora_nombre == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar los nombres del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_primer_apellido = $('#reserva_hora_apellido_uno').val();
            if (reserva_hora_primer_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el primer apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_segundo_apellido = $('#reserva_hora_apellido_dos').val();
            if (reserva_hora_segundo_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el segundo apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;

            }

            let reserva_hora_fecha_nac = $('#reserva_hora_fecha_nac').val();
            if (reserva_hora_fecha_nac == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar la fecha de nacimiento",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;
            }
            else
            {
                reserva_hora_fecha_nac = formatDateDB(reserva_hora_fecha_nac);
            }

            let reserva_hora_sexo = $('#reserva_hora_sexo').val();
            if (reserva_hora_sexo == '0') {

                swal({
                    title: "Error!",
                    text: "Debe seleccionar el del sexo del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;
            }
            let reserva_hora_convenio = $('#reserva_hora_convenio').val();
            if (reserva_hora_convenio == '0') {

                swal({
                    title: "Error!",
                    text: "Debe seleccionar la previsión del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            let reserva_hora_direccion = $('#reserva_hora_direccion').val();
            if (reserva_hora_direccion == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar una dirección",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            let reserva_hora_numero_dir = $('#reserva_hora_numero_dir').val();
            {{--
            if (reserva_hora_numero_dir == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar un numero a su dirección",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            --}}
            let reserva_hora_comuna = $('#ciudad_agregar').val();
            if (reserva_hora_comuna == '' || reserva_hora_comuna == '0' || reserva_hora_comuna == 'null' || reserva_hora_comuna == null) {

                swal({
                    title: "Error!",
                    text: "Debe ingresar la región y la ciudad",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_email = $('#reserva_hora_correo').val();
            let reserva_hora_telefono_uno = $('#reserva_hora_telefono_uno').val();
            let reserva_result_codigo_validacion = $('#result_codigo_validacion').val();

            let fechaNacimiento = new Date(reserva_hora_fecha_nac);
            let hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

            // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
            if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }

            // Validación simplificada: email es opcional, solo verificar que haya al menos un medio de contacto
            if( $('#paciente_dependiente').prop('checked') == false )
            {
                // Verificar que al menos haya email o teléfono
                if ((reserva_hora_email == '' || reserva_hora_email.trim() == '') &&
                    (reserva_hora_telefono_uno == '' || reserva_hora_telefono_uno.trim() == ''))
                {
                    swal({
                        title: "Error!",
                        text: "Debe ingresar al menos un medio de contacto (email o teléfono)",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
            }

            var reserva_hora_representante_info_libre = $('#reserva_hora_representante_info_libre').val();

            var dependiente = 0;
            if($('#paciente_dependiente').prop('checked')  == true)
                dependiente = 1;

            /** DATOS REPRESENTATE */
            let reserva_hora_representante_rut = $('#reserva_hora_representante_rut').val();
            let reserva_hora_representante_agregar_relacion = $('#reserva_hora_representante_agregar_relacion').val();
            let reserva_representante_nuevo_exitente = $('#reserva_representante_nuevo_exitente').val();
            let reserva_hora_representante_nombres_paciente = $('#reserva_hora_representante_nombres_paciente').val();
            let reserva_hora_representante_apellido_uno = $('#reserva_hora_representante_apellido_uno').val();
            let reserva_hora_representante_apellido_dos = $('#reserva_hora_representante_apellido_dos').val();
            let reserva_hora_representante_fecha_nac = $('#reserva_hora_representante_fecha_nac').val();
            let reserva_hora_representante_sexo = $('#reserva_hora_representante_sexo').val();
            let reserva_hora_representante_convenio = $('#reserva_hora_representante_convenio').val();
            let reserva_hora_representante_direccion = $('#reserva_hora_representante_direccion').val();
            let reserva_hora_representante_numero_dir = $('#reserva_hora_representante_numero_dir').val();
            let reserva_hora_representante_region_agregar = $('#reserva_hora_representante_region_agregar').val();
            let reserva_hora_representante_ciudad_agregar = $('#reserva_hora_representante_ciudad_agregar').val();
            let reserva_hora_representante_correo = $('#reserva_hora_representante_correo').val();
            let reserva_hora_representante_telefono_uno = $('#reserva_hora_representante_telefono_uno').val();
            let reserva_representante_id = $('#reserva_representante_id').val();
            let reserva_representante_id_usuario = $('#reserva_representante_id_usuario').val();
            let reserva_representante_result_codigo_validacion = $('#result_representante_codigo_validacion').val();

            if( edad < 18 || dependiente == 1)
            {
                if(reserva_hora_representante_rut == '')
                {
                    swal({
                        title: "Error!",
                        text: "Debe ingresar el RUT del representante",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
                if(reserva_hora_representante_agregar_relacion == '')
                {
                    swal({
                        title: "Error!",
                        text: "Debe ingresar la relación con el paciente",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }

                if(reserva_representante_nuevo_exitente == 0) {
                    if(reserva_hora_representante_nombres_paciente == '' || reserva_hora_representante_apellido_uno == '' || reserva_hora_representante_fecha_nac == '') {
                        swal({
                            title: "Error!",
                            text: "Debe completar los datos básicos del representante nuevo",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                }
            }

            let reserva_hora_confirmacion = $('#reserva_hora_confirmacion').val();
            let reserva_hora_sms = $('#reserva_hora_sms').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();

            console.log('ajax');
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        dependiente: dependiente,
                        fecha_consulta: fecha_consulta,
                        rut_paciente_reserva: rut_paciente_reserva,
                        reserva_hora_nombre: reserva_hora_nombre,
                        reserva_hora_primer_apellido: reserva_hora_primer_apellido,
                        reserva_hora_segundo_apellido: reserva_hora_segundo_apellido,
                        reserva_hora_fecha_nac: reserva_hora_fecha_nac,
                        reserva_hora_sexo: reserva_hora_sexo,
                        reserva_hora_convenio: reserva_hora_convenio,
                        reserva_hora_direccion: reserva_hora_direccion,
                        reserva_hora_numero_dir: reserva_hora_numero_dir,
                        reserva_hora_comuna: reserva_hora_comuna,
                        reserva_hora_email: reserva_hora_email,
                        reserva_hora_telefono: reserva_hora_telefono_uno,
                        reserva_result_codigo_validacion: reserva_result_codigo_validacion,
                        reserva_hora_confirmacion: reserva_hora_confirmacion,
                        reserva_hora_sms: reserva_hora_sms,
                        id_profesional:id_profesional,
                        id_lugar_atencion: id_lugar_atencion,
                        tipo_hora_medica: tipo_agenda_text,
                        /** representante */
                        reserva_hora_representante_info_libre: reserva_hora_representante_info_libre,
                        reserva_hora_representante_rut: reserva_hora_representante_rut,
                        reserva_hora_representante_agregar_relacion: reserva_hora_representante_agregar_relacion,
                        reserva_representante_nuevo_exitente: reserva_representante_nuevo_exitente,
                        reserva_hora_representante_nombres_paciente: reserva_hora_representante_nombres_paciente,
                        reserva_hora_representante_apellido_uno: reserva_hora_representante_apellido_uno,
                        reserva_hora_representante_apellido_dos: reserva_hora_representante_apellido_dos,
                        reserva_hora_representante_fecha_nac: reserva_hora_representante_fecha_nac,
                        reserva_hora_representante_sexo: reserva_hora_representante_sexo,
                        reserva_hora_representante_convenio: reserva_hora_representante_convenio,
                        reserva_hora_representante_direccion: reserva_hora_representante_direccion,
                        reserva_hora_representante_numero_dir: reserva_hora_representante_numero_dir,
                        reserva_hora_representante_region_agregar: reserva_hora_representante_region_agregar,
                        reserva_hora_representante_ciudad_agregar: reserva_hora_representante_ciudad_agregar,
                        reserva_hora_representante_correo: reserva_hora_representante_correo,
                        reserva_hora_representante_telefono_uno: reserva_hora_representante_telefono_uno,
                        reserva_representante_id: reserva_representante_id,
                        reserva_representante_id_usuario: reserva_representante_id_usuario,
                        reserva_representante_result_codigo_validacion: reserva_representante_result_codigo_validacion
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        // data = JSON.parse(data);
                        // console.log(data);
                        if (data.estado == 1) {
                            swal({
                                title: "Exito!",
                                text: "Hora medica agendada correctamente",
                                type: "success",
                                confirmButtonText: "Cool"
                            });
                            $('#reservar_hora').modal('hide');
                            $('#agenda_agregar_paciente').modal('hide');
                            cargarAgendaProfesional($('#id_tipo_agenda').val(),fecha_consulta);
                        } else {
                            swal({
                                title: "Hora medica",
                                text: data.msj,
                                type: "error",
                                confirmButtonText: "Cool"
                            });
                        }
                    } else {
                        swal({
                            title: "Error!",
                            text: "Paciente no encontrado en el sistema",
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                        // alert('Paciente no encontrado en el sistema');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error');
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function agendar_hora_paciente_nuevo_prereserva()
        {

            let fecha_consulta = $('#fecha_consulta').val();

            /** validacion para estados 16 pre reserva */
            valido = 1;
            var lista_horas = [];
            $.each(CalendarEl.getEvents(), function( index, value ) {
                var date_str2 = value.startStr.replace('T',' ');
                var date_DD2 = new Date(date_str2);
                var curr_date2 = date_DD2.getDate();
                var curr_month2 = date_DD2.getMonth();
                var curr_year2 = date_DD2.getFullYear();
                var curr_hour2 = date_DD2.getHours();
                var curr_mint2 = date_DD2.getMinutes();
                var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;

                var date_DD3 = new Date(fecha_consulta);
                var curr_date3 = date_DD3.getDate();
                var curr_month3 = date_DD3.getMonth();
                var curr_year3 = date_DD3.getFullYear();
                var curr_hour3 = date_DD3.getHours();
                var curr_mint3 = date_DD3.getMinutes();
                var fecha_consulta3 = curr_year3+"-"+curr_month3+"-"+curr_date3+" "+curr_hour3+":"+curr_mint3;

                // console.log(fecha_consulta3);
                // console.log(fecha_evento);
                // console.log('**********');

                if($.trim(fecha_consulta3) == $.trim(fecha_evento))
                {
                    console.log(value.id);
                    lista_horas.push(value.id);
                }
            });



            console.log( 'agendar_hora_paciente_nuevo_prereserva' );
            console.log( valido );
            // return false;


            let url = "{{ route('agenda.agendar_hora_nuevo_paciente_prereserva') }}";
            let _token = $('#_token').val();

            let tipo_agenda = $('#id_tipo_agenda').val();
            var tipo_agenda_text = 'C';

            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C'; //CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D'; //DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T'; //TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E'; //EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);

            let rut_paciente_reserva = $('#rut_paciente_reserva').val();
            if (rut_paciente_reserva == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el Rut",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return false;
            }

            let reserva_hora_nombre = $('#prereserva_hora_nombres_paciente').val();
            if (reserva_hora_nombre == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar los nombres del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_primer_apellido = $('#prereserva_hora_apellido_uno').val();
            if (reserva_hora_primer_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el primer apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_segundo_apellido = $('#prereserva_hora_apellido_dos').val();
            if (reserva_hora_segundo_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el segundo apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;

            }

            let reserva_hora_email = $('#prereserva_hora_correo').val();
            let reserva_hora_telefono_uno = $('#prereserva_hora_telefono_uno').val();

            if(reserva_hora_email == '' && reserva_hora_telefono_uno =='')
            {
                swal({
                    title: "Error!",
                    text: "Debe email de contacto o telefono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;
            }


            let reserva_hora_confirmacion = $('#reserva_hora_confirmacion').val();
            let reserva_hora_sms = $('#reserva_hora_sms').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();

            console.log('ajax');
            $.ajax({

                url: url,
                type: "get",
                data: {
                    _token: _token,
                    fecha_consulta: fecha_consulta,
                    rut_paciente_reserva: rut_paciente_reserva,
                    reserva_hora_nombre: reserva_hora_nombre,
                    reserva_hora_primer_apellido: reserva_hora_primer_apellido,
                    reserva_hora_segundo_apellido: reserva_hora_segundo_apellido,
                    reserva_hora_email: reserva_hora_email,
                    reserva_hora_telefono: reserva_hora_telefono_uno,
                    reserva_hora_confirmacion: reserva_hora_confirmacion,
                    reserva_hora_sms: reserva_hora_sms,
                    id_profesional:id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    tipo_hora_medica: tipo_agenda_text,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    // data = JSON.parse(data);
                    // console.log(data);
                    if (data.estado == 1) {
                        swal({
                            title: "Exito!",
                            text: "Hora medica agendada correctamente",
                            type: "success",
                            confirmButtonText: "Cool"
                        });
                        $('#reservar_hora').modal('hide');
                        $('#agenda_agregar_paciente').modal('hide');
                        cargarAgendaProfesional($('#id_tipo_agenda').val(),fecha_consulta);
                    } else {
                        swal({
                            title: "Hora medica",
                            text: data.msj,
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }
                } else {
                    swal({
                        title: "Error!",
                        text: "Paciente no encontrado en el sistema",
                        type: "error",
                        confirmButtonText: "Cool"
                    });
                    // alert('Paciente no encontrado en el sistema');
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('error');
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };

        function enviar_validacion_telefono_bono() {
            $('#btn_bono_paciente_telefono_validar').hide();
            $('#div_codigo_validador_bono').show();
            $('#bono_paciente_telefono_codigo_validador').val('');
            $('#div_codigo_validador_mensaje_bono').html('');
            $('#result_codigo_validacion_bono').val('0');
        }

        function validar_codigo_telefono_bono() {
            var codigo = $('#bono_paciente_telefono_codigo_validador').val();
            if (codigo.length >= 4) {
                console.log(codigo);
                if (codigo == '1234') {
                    $('#div_codigo_validador_bono').hide();
                    $('#div_codigo_validador_mensaje_bono').show();
                    $('#div_codigo_validador_mensaje_bono').html('<span style="color:green;">Teléfono validado correctamente</span>');
                    $('#result_codigo_validacion_bono').val('1');
                } else {
                    $('#div_codigo_validador_bono').show();
                    $('#div_codigo_validador_mensaje_bono').show();
                    $('#div_codigo_validador_mensaje_bono').html('<span style="color:red;">Código no válido, intente nuevamente</span>');
                    $('#result_codigo_validacion_bono').val('0');
                }
            }
        }

        {{--  GENERAR HORA USUARIO EXISTENTE  --}}
        function agendar_hora() {

            let url = "{{ route('agenda.agendar_hora') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let reserva_hora_id = $('#reserva_hora_id_paciente').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
            let tipo_agenda = $('#id_tipo_agenda').val();
            let observaciones = $('#reserva_hora_descripcion').val();
            var tipo_agenda_text = 'C';
            var procedimiento = '';
            var proc_bloque = '';
            if($('#form_reseva_de_horas_id_procedimiento').length == 1)
            {
                procedimiento = $('#form_reseva_de_horas_id_procedimiento').val();
                proc_bloque = $('#form_reseva_de_horas_id_procedimiento option:selected').attr('data-cant_bloque');
            }else{
                proc_bloque = parseInt($('#cantidad_bloques_atencion').text());
            }


            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C';//CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D';//DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T';//TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E';//EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);

            let representante = 0;
            let lista_Acompanante = $('#reserva_hora_id_acompanante').val();

            if( $('#acompanante_representante').prop("checked") )
                representante = 1;
            else
                representante = 0;

            let acompanante = 0;
            if( $('#acompanante_acompanante').prop("checked") )
                acompanante = 1;
            else
            {
                acompanante = 0;
                lista_Acompanante = '';
            }

            let autorizacion_atencion = 0;
            if( $('#autorizacion_atencion').prop("checked") )
                autorizacion_atencion = 1;
            else
                autorizacion_atencion = 0;


            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        fecha_consulta: fecha_consulta,
                        reserva_hora_id: reserva_hora_id,
                        id_lugar_atencion: id_lugar_atencion,
                        id_profesional: id_profesional,
                        tipo_hora_medica: tipo_agenda_text,
                        representante: representante,
                        acompanante: acompanante,
                        lista_Acompanante: lista_Acompanante,
                        autorizacion_atencion: autorizacion_atencion,
                        procedimiento: procedimiento,
                        observaciones: observaciones,
                        proc_bloque: proc_bloque
                    }
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        data = JSON.parse(data);
                        if(data.estado == 'error') {

                            swal({
                                title: "Error!",
                                text: data.msj,
                                type: "error",
                                icon: "error",
                                confirmButtonText: "Cool"
                            });

                            $('#agenda_agregar_paciente').modal('hide');
                        }
                        else
                        {
                            swal({
                                title: "Hora Agendada Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            $('#reservar_hora').modal('hide');
                            $('#agenda_agregar_paciente').modal('hide');
                        }
                        cargarAgendaProfesional(tipo_agenda, fecha_consulta);


                    } else {

                        swal({
                            title: "Error!",
                            text: "Paciente no encontrado en el sistema",
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        {{--  BUSCANDO CIUDAD --}}
        function buscar_ciudades(id_ciudad=0) {
            buscar_ciudad(id_ciudad);
        }

        function buscar_ciudad(id_ciudad=0) {


            var region = $('#region_agregar').val();

            if (region == null) {
                region = $('#region_contacto_modificar').val();
            }
            let url = "{{ route('home.buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_lugar_atencion_modificar');
                    let ciudades_contacto = $('#ciudad_contacto_modificar');
                    let ciudades_agregar = $('#ciudad_agregar');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    ciudades_contacto.find('option').remove();
                    ciudades_contacto.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades_contacto.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    ciudades_agregar.find('option').remove();
                    ciudades_agregar.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades_agregar.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if(id_ciudad != 0)
                    {
                        ciudades.val(id_ciudad);
                        ciudades_contacto.val(id_ciudad);
                        ciudades_agregar.val(id_ciudad);

                    }

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };

        function buscar_ciudad_general(input_region, input_ciudad, id_ciudad=0)
        {
            console.log(input_region);
            console.log(input_ciudad);
            var region = $('#'+input_region).val();
            console.log(region);
            let url = "{{ route('home.buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#'+input_ciudad);

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })

                    if(id_ciudad != 0)
                    {
                        ciudades.val(id_ciudad);
                    }
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };

        function validar_tipo_hora_medica(id)
        {
            let url = "{{ route('agenda.buscar_hora_medica') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_hora_medica: id,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null)
                {

                    if(data.estado == 1)
                    {
                        if(data.estado_hora == 16)
                        return 1;
                        else
                        return 0;
                    }
                    else
                    {
                        return 0;
                        console.log('error validacion');
                    }

                }
                else
                {
                    return 0;
                    console.log('error validacion');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        // ─────────────────────────────────────────────────────
        // AGENDAR HORA MÉDICA DESDE ENFERMERÍA
        // ─────────────────────────────────────────────────────

        function hora_medica_pedir_enfermeria(indexCarrito) {
            if (!profesionalSeleccionado) {
                swal('Atención', 'Debe seleccionar un profesional primero.', 'warning');
                return;
            }

            const item = carritoPacientes[indexCarrito];
            if (!item) return;
            const p = item.paciente;
            const nombre = `${p.nombres || ''} ${p.apellido_uno || ''} ${p.apellido_dos || ''}`.trim();

            // Limpiar modal
            $('#enf_reserva_lugar_atencion').html('<option value="">Seleccione</option>');
            $('#enf_reserva_dias_atencion').text('');
            $('#enf_reserva_fecha').val('').attr('disabled', true);
            $('#enf_reserva_lista_horas').html('');
            $('#enf_reserva_fecha_seleccionada').text('');

            // Setear datos
            $('#enf_reserva_id_profesional').val(profesionalSeleccionado);
            $('#enf_reserva_index_carrito').val(indexCarrito);
            $('#enf_reserva_nombre_paciente').text(nombre);
            $('#enf_reserva_rut_paciente').text(p.rut);

            // Cargar lugares de atención del profesional
            cargar_lugares_atencion_enfermeria($('#enf_reserva_id_profesional'), 'enf_reserva_lugar_atencion', $('#enf_reserva_id_lugar_atencion_actual').val());

            $('#modal_reservar_hora_enf').modal('show');
        }

        function cargar_lugares_atencion_enfermeria(element, div_destino, value_init) {
            let id_profesional = $(element).val();
            let url = "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}";

            $.ajax({
                url: url,
                type: "get",
                data: { id_profesional: id_profesional },
            })
            .done(function(data) {
                if (data.estado == 1) {
                    let select = $('#' + div_destino);
                    select.find('option').remove();
                    select.append('<option value="">Seleccione</option>');
                    $(data.registros).each(function(i, v) {
                        select.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    });
                    if (value_init) {
                        select.val(value_init);
                        carga_calendario_enfermeria();
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            });
        }

        function carga_calendario_enfermeria() {
            $('#enf_reserva_fecha').val('').attr('disabled', true);
            $('#enf_reserva_lista_horas').html('');
            $('#enf_reserva_fecha_seleccionada').text('');

            let id_profesional = $('#enf_reserva_id_profesional').val();
            let id_lugar_atencion = $('#enf_reserva_lugar_atencion').val();
            let tipo_agenda = 1;
            let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional: id_profesional,
                    lugar_atencion: id_lugar_atencion,
                    tipo_agenda: tipo_agenda
                },
            })
            .done(function(data) {
                if (data.estado == 1) {
                    if (data.registros.horario_agenda_laboral != '') {
                        let dias = ['', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                        var dias_activos = data.registros.horario_agenda_laboral.split(',');
                        var dias_texto = '';
                        var cant = 0;

                        $.each(dias_activos, function(index, value) {
                            if (cant > 0) dias_texto += ' - ' + dias[value];
                            else dias_texto += dias[value];
                            cant++;
                        });

                        $('#enf_reserva_dias_atencion').html(dias_texto);
                        $('#enf_reserva_fecha').attr('disabled', false);

                        $("#enf_reserva_fecha").flatpickr({
                            "disable": [
                                function(date) {
                                    return !dias_activos.includes(String(date.getDay()));
                                }
                            ],
                            minDate: "today",
                            maxDate: new Date(Date.now() + 60 * 24 * 60 * 60 * 1000),
                            locale: {
                                firstDayOfWeek: 1,
                                weekdays: {
                                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                },
                                months: {
                                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                                    longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                },
                            },
                        });
                    } else {
                        $('#enf_reserva_dias_atencion').html('NO INFORMADOS');
                        $('#enf_reserva_fecha').attr('disabled', true);
                        $('#enf_reserva_fecha_seleccionada').text('');
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            });
        }

        function cargar_horas_disponibles_enfermeria(dia) {
            let id_profesional = $('#enf_reserva_id_profesional').val();
            let id_lugar_atencion = $('#enf_reserva_lugar_atencion').val();
            let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    dia: dia,
                },
            })
            .done(function(data) {
                if (data.estado == 1) {
                    $('#enf_reserva_fecha_seleccionada').html('Horas disponibles para el día: ' + data.text_fecha);
                    $('#enf_reserva_lista_horas').html('');

                    $.each(data.registros, function(index, value) {
                        var hr1 = moment(value.hora, 'HH:mm:ss').format('HH:mm');
                        var html = '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" onclick="seleccionar_hora_enfermeria(\'' + value.hora + '\');">' + hr1 + '</div>';
                        $('#enf_reserva_lista_horas').append(html);
                    });
                } else {
                    $('#enf_reserva_lista_horas').html('<span class="font-weight-bold text-center d-block text-muted">"Sin disponibilidad de Horas"</span>');
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            });
        }

        function seleccionar_hora_enfermeria(hora) {
            let indexCarrito = parseInt($('#enf_reserva_index_carrito').val());
            let item = carritoPacientes[indexCarrito];
            if (!item) return;

            let p = item.paciente;
            let id_profesional = $('#enf_reserva_id_profesional').val();
            let id_lugar_atencion = $('#enf_reserva_lugar_atencion').val();
            let fecha_consulta = $('#enf_reserva_fecha').val();

            // Cerrar modal de reserva y abrir modal de confirmación
            $('#modal_reservar_hora_enf').modal('hide');

            // Setear datos en el modal de confirmación
            $('#enf_cita_id_profesional').val(id_profesional);
            $('#enf_cita_id_paciente').val(p.id);
            $('#enf_cita_id_lugar_atencion').val(id_lugar_atencion);
            $('#enf_cita_fecha_consulta').val(fecha_consulta);
            $('#enf_cita_hora_consulta').val(hora);

            // Mostrar datos del paciente
            $('#enf_cita_rut').text(p.rut || '-');
            $('#enf_cita_nombre').text(`${p.nombres || ''} ${p.apellido_uno || ''} ${p.apellido_dos || ''}`.trim());
            $('#enf_cita_fecha_nac').text(p.fecha_nac || '-');
            $('#enf_cita_sexo').text(p.sexo == 'M' ? 'Masculino' : (p.sexo == 'F' ? 'Femenino' : '-'));
            $('#enf_cita_convenio').text((p.prevision && p.prevision.nombre) ? p.prevision.nombre : '-');
            $('#enf_cita_email').text(p.email || '-');
            $('#enf_cita_telefono').text(p.telefono_uno || '-');

            let hr_formateada = moment(hora, 'HH:mm:ss').format('HH:mm');
            $('#enf_cita_fecha_hora_texto').text(fecha_consulta + ' a las ' + hr_formateada);
            $('#enf_cita_descripcion').val('Control medicamentos crónicos');

            // Poblar listado de medicamentos del paciente
            var $lista = $('#enf_cita_listado_medicamentos').empty();
            var meds = item.medicamentos || [];
            if (meds.length === 0) {
                $lista.append('<li class="list-group-item list-group-item-secondary py-1 small text-muted">Sin medicamentos crónicos registrados</li>');
            } else {
                meds.forEach(function(reg) {
                    var d = reg.antecedente_data || {};
                    var nombre = d.nombre_medicamento_cronico || d.nombre || '-';
                    var presentacion = d.presentacion || d.dosis || '';
                    var posologia = d.posologia || d.frecuencia || '';
                    var detalle = [presentacion, posologia].filter(Boolean).join(' — ');
                    $lista.append(
                        '<li class="list-group-item py-1 small">' +
                            '<strong>' + nombre + '</strong>' +
                            (detalle ? ' <span class="text-muted">(' + detalle + ')</span>' : '') +
                        '</li>'
                    );
                });
            }

            $('#modal_confirmar_cita_enf').modal('show');
        }

        function agendar_hora_enfermeria() {
            let url = "{{ route('agenda.paciente.solicitar.hora') }}";
            let _token = '{{ csrf_token() }}';
            let fecha_consulta = $('#enf_cita_fecha_consulta').val() + ' ' + $('#enf_cita_hora_consulta').val();
            let id_paciente = $('#enf_cita_id_paciente').val();
            let id_profesional = $('#enf_cita_id_profesional').val();
            let id_lugar_atencion = $('#enf_cita_id_lugar_atencion').val();
            let id_asistente = '{{ $asistente->id ?? "" }}';

            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: _token,
                    fecha_consulta: fecha_consulta,
                    reserva_hora_id: id_paciente,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                    id_asistente: id_asistente,
                    origen: 'escritorio_asistente_enfermeria',
                    tipo_hora_medica: 'C',
                }
            })
            .done(function(data) {
                if (data != null) {
                    data = (typeof data === 'string') ? JSON.parse(data) : data;

                    if (data.estado == 'error') {
                        swal({
                            title: "Error",
                            text: data.msj,
                            icon: "error",
                            buttons: "Cerrar",
                        });
                    } else {
                        swal({
                            title: "Hora Agendada",
                            text: "La hora ha sido agendada correctamente para el paciente.",
                            icon: "success",
                            buttons: "Aceptar",
                        });
                    }
                    $('#modal_confirmar_cita_enf').modal('hide');
                } else {
                    swal({
                        title: "Error",
                        text: "Problema en la solicitud de la hora",
                        icon: "error",
                        buttons: "Cerrar",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                swal('Error', 'No se pudo agendar la hora. Intente nuevamente.', 'error');
            });
        }

    </script>
@endsection

@include('app.general.asistente.agenda.boton_flotante_agenda_exa_ciru')
