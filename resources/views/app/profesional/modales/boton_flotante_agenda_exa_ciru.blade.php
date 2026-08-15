
<!-- BOTÓN FLOTANTE AGENDA (ESPACIO PARA INSERTAR LA NUEVA AGENDA) -->
<div class="botones-container">
    @php
        // var_dump($tipo_agendas);
    @endphp
    @foreach ($tipo_agendas as $ta )
        @switch($ta)
            @case(1)
                <button class="btn boton btn-agenda-1 shadow-sm  pt-3" type="button" onclick="cargarAgendaProfesional(1, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> CONSULTA</button>
                @break

            @case(2)
                <button class="btn boton btn-agenda-2 shadow-sm  pt-3" style="display:none; " type="button" onclick="cargarAgendaProfesional(2, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> DENTAL</button>
                @break

            @case(3)
                <button class="btn boton btn-agenda-3 shadow-sm  pt-3" type="button" onclick="cargarAgendaProfesional(3, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> TELEMEDICINA</button>
                @break

            @case(4)
                <button class="btn boton btn-agenda-4 shadow-sm  pt-3" type="button" onclick="cargarAgendaProfesional(4, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> EXÁMENES</button>
                @break

            @case(5)
                <button class="btn boton btn-agenda-5 shadow-sm  pt-3" type="button" onclick="cargarAgendaProfesional(5, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> MODULAR</button>
                @break

            @default

        @endswitch
    @endforeach
    <input type="hidden" name="id_tipo_agenda" id="id_tipo_agenda" value="1">
</div>

<!-- SCRIPT -->
@section('btn-script-agenda')
    <script type="text/javascript">
        var activeDaysInRange = [];
        var info_profesional_seleccionado = [];
        $(document).ready(function ()
        {
            if($('#agenda').length > 0)
            {
                @if(!empty($tipo_agenda_activa))
                    cargarAgendaProfesional('{{ $tipo_agenda_activa }}', '{{ $lugar_atencion }}', '{{ $profesional->id}}');
                @else
                    cargarAgendaProfesional(1, '{{ $lugar_atencion }}', '{{ $profesional->id}}');
                @endif
            }
            $('#agenda_agregar_paciente').on('hide.bs.modal', function (e) {
                $('#examenes').removeClass('d-block');
                $('#examenes').addClass('d-none');
            });
        });

        function cargarAgendaProfesional(tipo_agenda, id_lugar_atencion, id_profesional, fecha)
        {
            $('.boton').css('background-color','#8b52c2');
            $('.btn-agenda-'+tipo_agenda).css('background-color','#1cbebe');

            $('#id_tipo_agenda').val(tipo_agenda);

            $('#titulo_tipo_agenda').html('');
            switch (parseInt(tipo_agenda)) {
                case 1:
                    $('#titulo_tipo_agenda').html('AGENDA DE CONSULTA');
                    break;
                case 2:
                    $('#titulo_tipo_agenda').html('AGENDA DE DENTAL');
                    break;
                case 3:
                    $('#titulo_tipo_agenda').html('AGENDA DE TELEMEDICINA');
                    break;
                case 4:
                    $('#titulo_tipo_agenda').html('AGENDA DE EXAMEN');
                    break;
                case 5:
                    $('#titulo_tipo_agenda').html('AGENDA  MODULAR');
                    break;
                default:
                    $('#titulo_tipo_agenda').html('AGENDA DE CONSULTA');
                    break;
            }

            var evaluacion = false;
            let url1 = "{{ route('profesional.agenda.buscar_info_profesional') }}";

            $.ajax({
                url: url1,
                type: "GET",
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    tipo_agenda: tipo_agenda,
                },
                success: function(data){

                    console.log(data);

                    if (data !== 'null')
                    {
                        if(data.estado == 1 && data.horario.length!=0)
                        {
                            // carga de examenes posibles por el profesional
                            $('#m_hora_examen_lista_examenes').html('<option value="">Seleccione</option>');
                            if(data.examen_tipo != null && data.examen_tipo != '')
                            {
                                data.examen_tipo.forEach(element => {
                                    $('#m_hora_examen_lista_examenes').append('<option value="'+element.id+'">'+element.nombre+'</option>');
                                });
                            }

                            info_profesional_seleccionado['profesional'] = data.profesional;
                            info_profesional_seleccionado['horario'] = data.horario;
                            info_profesional_seleccionado['horario_data'] = data.horario_data;
                            evaluacion =  true;

                            if(evaluacion)
                            {
                                var calendarEl = document.getElementById('agenda');

                                /*
                                 * Permite posicionar la agenda automáticamente en la próxima
                                 * fecha que tenga horas médicas, pero solamente durante la
                                 * carga inicial. Así no se interfiere con la navegación manual.
                                 */
                                var agendaPosicionadaEnProximaFecha = false;
                                var fechaActualAgenda = '{{ date('Y-m-d') }}';
                                var permitirSaltoAutomatico = !fecha || fecha === fechaActualAgenda;

                                var CalendarEl = new FullCalendar.Calendar(calendarEl, {
                                    droppable: false,
                                    editable: false,
                                    locale: "es",
                                    timeZone: 'local',
                                    initialDate: fecha || fechaActualAgenda,
                                    initialView: 'timeGridWeek',
                                    themeSystem: 'bootstrap',
                                    slotDuration: '00:15:00',
                                    headerToolbar: {
                                        //start: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek', // will normally be on the left. if RTL, will be on the right
                                        //center: 'title',
                                        //end: 'today prev,next'
                                        start: 'prev,next today',
                                        center: 'title',
                                        // right: 'timeGridWeek,listWeek'
                                        right: 'timeGridWeek,listWeek'
                                    },
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

                                    events: function(fetchInfo, successCallback, failureCallback) {
                                        let url = "{{ route('hora_medica.ver') }}";

                                        $.ajax({
                                            url: url,
                                            type: "GET",
                                            dataType: "json",
                                            data: {
                                                id_profesional: id_profesional,
                                                id_lugar_atencion: id_lugar_atencion,
                                                tipo_agenda: tipo_agenda,
                                                fecha_inicio: fetchInfo.startStr,
                                                fecha_termino: fetchInfo.endStr
                                            },
                                            success: function(data) {
                                                if (!data || Number(data.estado) !== 1) {
                                                    successCallback([]);
                                                    return;
                                                }

                                                const eventos = (data.registros || []).map(function(element) {
                                                    const paciente = element.paciente || {};
                                                    const estado = element.estado || {};
                                                    const prevision = paciente.prevision || {};

                                                    let descripcion = '';

                                                    if (element.tipo_hora_medica === 'B') {
                                                        descripcion = (estado.valor || '') + ' | ';
                                                    } else {
                                                        descripcion =
                                                            (paciente.rut || '') + ' | ' +
                                                            (estado.valor || '') + ' | ' +
                                                            (element.comentarios_confirmacion || '') + ' | ' +
                                                            (prevision.nombre || '');
                                                    }

                                                    return {
                                                        id: element.id,
                                                        title: element.tipo_hora_medica === 'B'
                                                            ? element.descripcion
                                                            : (element.tipo_hora_medica || '') + ' - ' + (element.descripcion || ''),
                                                        description: descripcion,
                                                        start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                        end: element.fecha_consulta + 'T' + element.hora_termino,
                                                        backgroundColor: estado.color || null
                                                    };
                                                });

                                                successCallback(eventos);

                                                /*
                                                 * El backend devuelve proxima_fecha sin limitarla
                                                 * al rango visible. Si hoy no tiene horas, la vista
                                                 * salta al próximo día disponible (por ejemplo,
                                                 * desde el miércoles al próximo lunes).
                                                 *
                                                 * La bandera se activa antes de gotoDate(), porque
                                                 * gotoDate vuelve a ejecutar esta fuente de eventos.
                                                 */
                                                if (
                                                    !agendaPosicionadaEnProximaFecha &&
                                                    permitirSaltoAutomatico &&
                                                    data.proxima_fecha
                                                ) {
                                                    agendaPosicionadaEnProximaFecha = true;

                                                    var fechaVistaActual = fetchInfo.startStr.substring(0, 10);
                                                    var fechaVistaTermino = fetchInfo.endStr.substring(0, 10);
                                                    var proximaFecha = data.proxima_fecha.substring(0, 10);

                                                    /*
                                                     * Aunque la próxima fecha esté dentro de la semana
                                                     * visible, gotoDate la deja como fecha de referencia
                                                     * y evita que la agenda quede enfocada en un día pasado.
                                                     */
                                                    if (
                                                        proximaFecha !== fechaActualAgenda ||
                                                        proximaFecha < fechaVistaActual ||
                                                        proximaFecha >= fechaVistaTermino
                                                    ) {
                                                        CalendarEl.gotoDate(proximaFecha);
                                                    }
                                                }
                                            },
                                            error: function(xhr) {
                                                console.error('Error cargando horas médicas:', xhr);
                                                failureCallback(xhr);
                                            }
                                        });
                                    },

                                    eventClick: function(info) {
                                        let id_hora_medica = info.event.id;
                                        let url = "{{ route('agenda.buscar_hora_medica') }}"

                                        $.ajax({

                                                url: url,
                                                type: "get",
                                                data: {
                                                    //_token: _token,
                                                    id_hora_medica: id_hora_medica,
                                                },
                                            })
                                            .done(function(data) {
                                                console.log(data);
                                                if (data != null)
                                                {
                                                    console.log('hola2');
                                                    console.log(data.paciente);
                                                    $('#id_paciente').val(data.paciente.id);
                                                    $('#reserva_hora_id_paciente_asistente').val(data.paciente.id);
                                                        $('#datos_consulta_rut').text(data.paciente.rut);
                                                        $('#datos_consulta_nombre').text(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#input_reserva_hora_nombre_asistente').val(data.paciente.nombres);
                                                        $('#input_reserva_hora_apellido_uno_asistente').val(data.paciente.apellido_uno);
                                                        $('#input_reserva_hora_apellido_dos_asistente').val(data.paciente.apellido_dos);
                                                        $('#datos_consulta_edad').text(data.paciente.fecha_nac);
                                                        $('#datos_consulta_direcion').text(data.paciente.direccion.direccion);
                                                        $('#datos_consulta_numero').text(data.paciente.direccion.numero_dir);
                                                        $('#datos_consulta_region').text(data.paciente.direccion.region.nombre);
                                                        $('#datos_consulta_ciudad').text(data.paciente.direccion.ciudad.nombre);
                                                        $('#input_reserva_fecha_nacimiento_asistente').val(data.paciente.fecha_nac);
                                                        $('#datos_consulta_email').text(data.paciente.email);
                                                        $('#input_reserva_hora_email_asistente').val(data.paciente.email);
                                                        $('#input_reserva_hora_direccion_asistente').val(data.paciente.direccion.direccion);
                                                        $('#input_reserva_hora_numero_asistente').val(data.paciente.direccion.numero_dir);
                                                        $('#input_reserva_hora_region_asistente').val(data.paciente.direccion.region.id);
                                                        buscar_ciudad_general('input_reserva_hora_region_asistente', 'input_reserva_hora_ciudad_asistente', data.paciente.direccion.ciudad.id);
                                                        $('#datos_consulta_telefono').text(data.paciente.telefono_uno);
                                                        $('#input_reserva_hora_telefono_asistente').val(data.paciente.telefono_uno);
														if(data.paciente.fecha_ultima_atencion != null && data.paciente.fecha_ultima_atencion != '')
                                                            $('#datos_consulta_fecha_ultima').text(data.paciente.fecha_ultima_atencion);
                                                        else
                                                            $('#datos_consulta_fecha_ultima').text('No registra atenciones previas');
                                                        $('#datos_consulta_fecha_ultima').text(data.paciente.fecha_ultima_atencion);

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
                                                    $('#confirmar_hora_comentario')
                                                        .prop('selectedIndex', $('#confirmar_hora_comentario option').length > 1 ? 1 : 0)
                                                        .prop('disabled', false);
                                                    $('#contenedor_via_confirmacion').hide();

                                                    const detalleDental = data.detalle_dental;
                                                    $('#detalle_agenda_dental').toggleClass('d-none', !detalleDental);
                                                    if (detalleDental) {
                                                        const formatoDinero = valor => '$' + Number(valor || 0).toLocaleString('es-CL');
                                                        const resumen = $('<div>');
                                                        resumen.append($('<div>').append($('<strong>').text('Motivo: '), document.createTextNode(detalleDental.motivo || 'Consulta dental')));
                                                        if (detalleDental.presupuesto) {
                                                            resumen.append($('<div>').append(
                                                                $('<strong>').text('Presupuesto: '),
                                                                document.createTextNode('N° ' + detalleDental.presupuesto + ' · Abonado ' + formatoDinero(detalleDental.abonado) + ' · Saldo ' + formatoDinero(detalleDental.saldo))
                                                            ));
                                                        }
                                                        $('#detalle_dental_resumen').empty().append(resumen);

                                                        const badgePago = $('#detalle_dental_estado_pago').removeClass('badge-success badge-warning badge-danger');
                                                        if (detalleDental.pago) {
                                                            badgePago
                                                                .text(detalleDental.pago)
                                                                .addClass(detalleDental.pago === 'Pagado' ? 'badge-success' : (detalleDental.pago === 'Pago parcial' ? 'badge-warning' : 'badge-danger'))
                                                                .show();
                                                        } else {
                                                            badgePago.hide();
                                                        }

                                                        const lista = $('<div>');
                                                        if ((detalleDental.prestaciones || []).length) {
                                                            lista.append($('<strong>').text('Trabajo programado:'));
                                                            const ul = $('<ul class="mb-0 pl-4">');
                                                            detalleDental.prestaciones.forEach(function(prestacion) {
                                                                ul.append($('<li>').text(prestacion.nombre + ' — ' + prestacion.tratamiento + ' (' + prestacion.estado + ')'));
                                                            });
                                                            lista.append(ul);
                                                        } else {
                                                            lista.append($('<span class="text-muted">').text('No hay piezas específicas asociadas a esta hora.'));
                                                        }
                                                        $('#detalle_dental_prestaciones').empty().append(lista);
                                                    }

                                                    //celeste
                                                    //Reservada
                                                    if (data.estado_hora == 1) //else if (info.event.backgroundColor == '#FEAA32')
                                                    {
                                                        $('#contenedor_via_confirmacion').show();
                                                        //'Reservada') //Hora pendiente
                                                        $('#hm_anular_hora').show();
                                                        $('#hm_atender_hora').hide();
                                                        $('#hm_llamar_paciente').hide();
                                                        $('#hm_confirmar_hora').show();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();
                                                        $('#hm_revisar_ficha').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //verde
                                                    // CONFIRMADO
                                                    else if(data.estado_hora == 2)//if (info.event.backgroundColor == '#94BF61')
                                                    {
                                                        console.log(data.paciente);
                                                        $('#modal_recepcion_bonos_api').modal('show');

                                                        const pagoPresupuesto = data.pago_presupuesto;
                                                        const presupuestoPagado = pagoPresupuesto && pagoPresupuesto.pagado;
                                                        $('.estado-pago-presupuesto-hora').toggleClass('d-none', !pagoPresupuesto);
                                                        if (pagoPresupuesto) {
                                                            const formato = valor => '$' + Number(valor || 0).toLocaleString('es-CL');
                                                            const descuento = pagoPresupuesto.descuento;
                                                            let avisoDescuento = '';
                                                            if (descuento) {
                                                                avisoDescuento = descuento.aplicado
                                                                    ? `<div class="mt-2"><strong>Descuento aplicado:</strong> ${descuento.nombre} (${descuento.porcentaje}%). El total y el saldo ya corresponden al valor con descuento.</div>`
                                                                    : `<div class="mt-2"><strong>Descuento disponible:</strong> ${descuento.nombre} (${descuento.porcentaje}%). <button type="button" class="btn btn-sm btn-success ml-1" onclick="aplicarConvenioAgendaDental()">Aplicar al presupuesto</button></div>`;
                                                            }
                                                            $('.estado-pago-presupuesto-hora')
                                                                .toggleClass('alert-success', presupuestoPagado)
                                                                .toggleClass('alert-warning', !presupuestoPagado)
                                                                .attr('data-id-presupuesto', pagoPresupuesto.id)
                                                                .attr('data-saldo-presupuesto', pagoPresupuesto.saldo)
                                                                .attr('data-pagado-presupuesto', presupuestoPagado ? '1' : '0')
                                                                .html(presupuestoPagado
                                                                    ? `<strong>Presupuesto N° ${pagoPresupuesto.id} pagado.</strong> Saldo $0. Esta atención se recepcionará sin realizar un nuevo cobro.`
                                                                    : `<strong>Presupuesto N° ${pagoPresupuesto.id} pendiente de pago.</strong> Abonado ${formato(pagoPresupuesto.abonado)} de ${formato(pagoPresupuesto.total)}. Saldo ${formato(pagoPresupuesto.saldo)}. Ingrese un abono para recepcionar e iniciar el tratamiento.` + avisoDescuento)
                                                                .data('pago-presupuesto', pagoPresupuesto);
                                                            $('#bono_valor_consulta').val(pagoPresupuesto.total);
                                                            $('#bono_valor_abono_consulta').val(presupuestoPagado ? 0 : '');
                                                            $('#bono_valor_saldo_consulta').val(pagoPresupuesto.saldo);
                                                        }
                                                        $('.bono_valor :input').prop('disabled', !!presupuestoPagado);
                                                        $('.btn-recepcionar-pago span').text(presupuestoPagado ? 'Recepcionar sin cobro' : 'Recepcionar');
                                                        $('.btn-generar-boleta').prop('disabled', !!presupuestoPagado)
                                                            .attr('title', presupuestoPagado ? 'El presupuesto ya fue pagado' : '');

                                                        /** PESTAÑA DE RECIBIR PAGO */
                                                        $('#bono_paciente_rut').val(data.paciente.rut);
                                                        $('#bono_paciente_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#bono_profesional_nombre').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                        $('#bono_profesional_rut').val( data.profesional.rut);

														if(data.paciente.presupuestos.length == 0){
                                                            $('.bono_valor').hide();
                                                            $('#bono_valor_consulta').val(0);
                                                        }else{
                                                            $('.bono_valor').show();
                                                        }

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
                                                        $('#hm_llamar_paciente').hide();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();
                                                        $('#hm_revisar_ficha').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //morado
                                                    // Espera -- Llamando
                                                    else if (data.estado_hora == 4 || data.estado_hora == 8) //else if (info.event.backgroundColor == '#A06CC1')
                                                    {
                                                        // 'Espera')//Esperando atención
                                                        // 'Llamando')//Esperando atención
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').show();
                                                        $('#hm_llamar_paciente').show();
                                                        $('#hm_llamar_paciente').attr('onclick', 'llamarPaciente('+$('#id_box').val()+', '+data.profesional.id+', '+data.paciente.id+', '+id_lugar_atencion+', '+id_hora_medica+');');
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();
                                                        $('#hm_revisar_ficha').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //rosa
                                                    //Realizando
                                                    else if (data.estado_hora == 5) //else if (info.event.backgroundColor == '#EDBB99')
                                                    {
                                                        //'Realizando')
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').show();
                                                        $('#hm_llamar_paciente').show();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();
                                                        $('#hm_revisar_ficha').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //azul
                                                    // Realizada
                                                    else if (data.estado_hora == 6)//else if (info.event.backgroundColor == '#17C1C1')
                                                    {
                                                        //'Realizada')//Paciente atendido
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').hide();
                                                        $('#hm_llamar_paciente').hide();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();
                                                        $('#hm_revisar_ficha').show();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //naranjo
                                                    //Inasistida
                                                    else if (data.estado_hora == 7)//else if (info.event.backgroundColor == '#F9A825')
                                                    {
                                                        //'Inasistida')
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').hide();
                                                        $('#hm_llamar_paciente').hide();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();
                                                        $('#hm_revisar_ficha').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');
                                                    }

                                                    // Mostrar exámenes para cualquier estado
                                                    if(data?.["procedimiento"] !== undefined)
                                                    {
                                                        if(data.procedimiento != '' && data.procedimiento != null)
                                                        {
                                                            var lista_examen = '<strong>Examenes</strong>';
                                                            lista_examen += '<ul class="lista-examenes">';
                                                            data.procedimiento.forEach(function(examen) {
                                                                lista_examen += `<li>${examen.nombre}</li>`;
                                                            });
                                                            lista_examen += '</ul>';
                                                            $('#seccion_examenes').html(lista_examen);
                                                        }
                                                        else
                                                        {
                                                            $('#seccion_examenes').html('');
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $('#seccion_examenes').html('');
                                                    }

                                                }
                                                else
                                                {
                                                    swal({
                                                        title: "Paciente no encontrado en el sistema",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    })

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
										var valido = 1;

                                        /** VALIDACION DE FUERA DE HORARIO */
                                        // $.each(date.jsEvent.path, function(index, value)
                                        $.each(date.jsEvent.srcElement.classList, function(index, value)
                                        {
                                            // console.log(value);
                                            if(value == 'fc-non-business')
                                            {
                                                swal({
                                                    title: "Toma de Hora",
                                                    text: "Horario no disponible con el Profesional",
                                                    icon: "error",
                                                    buttons: "Aceptar",
                                                    DangerMode: true,
                                                })
                                                valido = 0;
                                            }

                                        });

                                        if(valido == 1)
                                        {
                                            // console.log(date.date);
                                            // console.log(date.dateStr);

                                            /** VALIDAR EVENTO */
                                            var date_str = date.dateStr.replace('T',' ');
                                            var date_DD = new Date(date_str);
                                            var curr_date = date_DD.getDate();
                                            var curr_month = date_DD.getMonth();
                                            var curr_year = date_DD.getFullYear();
                                            var curr_hour = date_DD.getHours();
                                            var curr_mint = date_DD.getMinutes();
                                            var fecha_seleccionada = curr_year+"-"+curr_month+"-"+curr_date+" "+curr_hour+":"+curr_mint;
                                            $.each(CalendarEl.getEvents(), function( index, value ) {
                                                // console.log(index);
                                                // console.log(value);
                                                var date_str2 = value.startStr.replace('T',' ');
                                                var date_DD2 = new Date(date_str2);
                                                var curr_date2 = date_DD2.getDate();
                                                var curr_month2 = date_DD2.getMonth();

                                                var curr_year2 = date_DD2.getFullYear();
                                                var curr_hour2 = date_DD2.getHours();
                                                var curr_mint2 = date_DD2.getMinutes();
                                                var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;

                                                if($.trim(fecha_seleccionada) == $.trim(fecha_evento))
                                                {
                                                    valido = 0;
                                                }
                                            });

                                            /** VALIDAR BLOQUEO */
                                            CalendarEl.getEvents().forEach(function(event) {
                                                var eventEnd = typeof event.end === 'string' ? moment(event.end) : event.end;
                                                if (date.date >= event.start && date.date <= eventEnd) {
                                                    valido = 0;
                                                    console.log('Existe un evento en esta fecha: ' + event.title);
                                                    console.log(date.date);
                                                    console.log(event.start);
                                                    console.log(eventEnd);

                                                    swal({
                                                        title: "Toma de Hora",
                                                        text: "El profesional no atiende en este periodo.",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    });
                                                    return false;
                                                }

                                            });

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
                                                    $('#div_procedimiento').hide();
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
                                                });
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
                                {{--  console.log(CalendarEl.getOption('hiddenDays'));  --}}
                                {{--  console.log(CalendarEl.getOption('businessHours'));  --}}
                                {{--  console.log(CalendarEl.getOption('slotMinTime'));  --}}
                                {{--  console.log(CalendarEl.getOption('slotMaxTime'));  --}}

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
                            }
                        }
                        else
                        {
                            swal({
                                title: "Agenda del Profesional.",
                                text:"El profesional no cuenta con agenda.",
                                icon: "error",
                            });
                            evaluacion =  false;
                            $('#agenda').html('');
                        }
                    }
                }
            });
        }

        function getInactiveDays(startDate, endDate, activeDays)
        {
            const diffInDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));

            for (let i = 0; i <= diffInDays; i++)
            {
                const day = new Date(startDate.getTime() + i * 1000 * 60 * 60 * 24);
                if (!activeDays[day.getDay()]) {
                    activeDaysInRange.push(day);
                }
            }

            return activeDaysInRange;
        }

        // Función para actualizar el input de valor total
        let solicitudTratamientosAgendaDental = null;

        function aplicarConvenioAgendaDental() {
            const $aviso = $('.estado-pago-presupuesto-hora');
            const pagoPresupuesto = $aviso.data('pago-presupuesto');
            if (!pagoPresupuesto || !pagoPresupuesto.descuento || pagoPresupuesto.descuento.aplicado) return;

            const $boton = $aviso.find('button').prop('disabled', true).text('Aplicando...');
            $.ajax({
                type: 'post',
                url: "{{ ROUTE('profesional.aplicar_convenio_tratamiento') }}",
                data: {
                    id: pagoPresupuesto.descuento.id,
                    id_presupuesto: pagoPresupuesto.id,
                    id_paciente: pagoPresupuesto.id_paciente,
                    id_ficha_atencion: pagoPresupuesto.id_ficha_atencion,
                    id_lugar_atencion: pagoPresupuesto.id_lugar_atencion,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    const total = Number(resp.total_con_descuento || 0);
                    const abonado = Number(resp.total_abonado || 0);
                    const saldo = Number(resp.saldo_pendiente || 0);
                    pagoPresupuesto.total = total;
                    pagoPresupuesto.abonado = abonado;
                    pagoPresupuesto.saldo = saldo;
                    pagoPresupuesto.pagado = total > 0 && saldo <= 0;
                    pagoPresupuesto.descuento.aplicado = true;
                    $aviso.data('pago-presupuesto', pagoPresupuesto)
                        .attr('data-saldo-presupuesto', saldo)
                        .attr('data-pagado-presupuesto', pagoPresupuesto.pagado ? '1' : '0')
                        .removeClass('alert-warning alert-danger').addClass(pagoPresupuesto.pagado ? 'alert-success' : 'alert-warning')
                        .html(`<strong>Descuento aplicado:</strong> ${pagoPresupuesto.descuento.nombre} (${pagoPresupuesto.descuento.porcentaje}%). Total con descuento $${total.toLocaleString('es-CL')}; abonado $${abonado.toLocaleString('es-CL')}; saldo $${saldo.toLocaleString('es-CL')}.`);
                    $('#bono_valor_consulta').val(total);
                    $('#bono_valor_saldo_consulta').val(saldo);
                    $('#bono_valor_abono_consulta').val(pagoPresupuesto.pagado ? 0 : '');
                },
                error: function(xhr) {
                    $boton.prop('disabled', false).text('Aplicar al presupuesto');
                    swal({
                        icon: 'error',
                        title: 'No fue posible aplicar el descuento',
                        text: (xhr.responseJSON && xhr.responseJSON.message) || 'Revise el convenio e intente nuevamente.'
                    });
                }
            });
        }

        function updateTotalValue() {
            const selectedOption = $('#presupuesto_numero option:selected'); // Obtener la opción seleccionada
            let url = "{{ ROUTE('profesional.mi_agenda.dame_tratamientos_presupuesto') }}";
            let id_presupuesto = selectedOption.val();

            $('#id_presupuesto').val(/^\d+$/.test(id_presupuesto) ? id_presupuesto : '');
            $('#n_presupuesto_dental').val('');
            $('#bono_valor_consulta').val(0);
            $('#contenedor_tratamientos_presupuesto').empty();
            limpiarOdontogramaAgenda();
            if (solicitudTratamientosAgendaDental) {
                solicitudTratamientosAgendaDental.abort();
                solicitudTratamientosAgendaDental = null;
            }
            mostrarDuracionAgendaDental(1);
            if (typeof validar_campos_minimos === 'function') {
                validar_campos_minimos();
            }

            // Primera consulta y urgencia no consultan ni alteran tratamientos.
            if (!/^\d+$/.test(id_presupuesto)) {
                return;
            }

            solicitudTratamientosAgendaDental = $.ajax({
                type:'post',
                url: url,
                data:{
                    id: id_presupuesto,
                    _token: CSRF_TOKEN
                },
                success: function(resp){
                    if (String($('#presupuesto_numero').val()) !== String(id_presupuesto)) return;
                    console.log(resp);
                    $('#n_presupuesto_dental').val(id_presupuesto);
                    $('#id_presupuesto').val(id_presupuesto);
                    let tratamientos = resp.tratamientos;
                    let todos = resp.todos;
                    const totalValue = selectedOption.data('total') || ''; // Obtener el valor del atributo data-total
                    var bloques = 0;
                    $('#bono_valor_consulta').val(totalValue); // Actualizar el input de valor total
                    $('#contenedor_tratamientos_presupuesto').show();
                    $('#contenedor_tratamientos_presupuesto').empty();
                    tratamientos.forEach(t => {
                        if(Number(t.presupuesto) === 1 && Number(t.urgencia || 0) === 0 && Number(t.progreso || 0) < 100){
                        const checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        const disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                        $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch d-none tratamiento-pieza-agenda">
                                <input class="form-check-input tratamiento-agenda-dental" type="checkbox" id="tratamiento${t.id}" data-id="${t.id}" data-tipo="pieza" data-pieza="${t.pieza}" data-estado-pago="${t.estado_pago || 'pendiente'}" data-bloques="${parseInt(t.cantidad_bloques) || 1}" onchange="recalcularBloquesAgendaDental()" ${disabled}>
                                <label class="form-check-label" for="tratamiento${t.id}">N° Pieza ${t.pieza} - ${t.tratamiento}</label>
                            </div>`);
                        }
                    });
                    cargarOdontogramaAgenda(tratamientos);
                    todos.forEach(t => {
                        if(Number(t.presupuesto) === 1 && Number(t.urgencia || 0) === 0){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input tratamiento-agenda-dental" type="checkbox" id="tratamiento_gral${t.id}" data-id="${t.id}" data-tipo="grupo" data-estado-pago="${t.estado_pago || 'pendiente'}" data-bloques="${parseInt(t.cantidad_bloques) || 1}" onchange="recalcularBloquesAgendaDental()" ${disabled}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar superior ${t.diagnostico_tratamiento}</label>
                            </div>`);

                        }
                    });
                    $('#contenedor_tratamientos_presupuesto').append('<div id="mensaje_duracion_agenda_dental"></div>');
                    mostrarDuracionAgendaDental(1);
                    actualizarIndicadorPagoTratamientos();
                },
                error: function(error){
                    if (error.statusText === 'abort') return;
                    console.log(error);
                },
                complete: function(xhr) {
                    if (solicitudTratamientosAgendaDental === xhr) {
                        solicitudTratamientosAgendaDental = null;
                    }
                }
            });

        }

        function limpiarOdontogramaAgenda() {
            const $selector = $('#selector_odontograma_agenda');
            $('#selector_odontograma_agenda_wrapper').hide();
            $('#piezas_odontograma_agenda').val('');
            $selector.find('[data-selector-pieza]')
                .prop('disabled', true)
                .removeClass('is-enabled is-selected')
                .removeAttr('data-bloques-agenda')
                .attr('aria-pressed', 'false')
                .attr('title', 'Pieza no disponible');
            $selector.find('.selector-odontograma-generico__resumen')
                .html('<span class="text-muted">Ninguna pieza seleccionada</span>');
        }

        function cargarOdontogramaAgenda(tratamientos) {
            const $selector = $('#selector_odontograma_agenda');
            const disponibles = new Map();
            (tratamientos || []).forEach(function(tratamiento) {
                if (Number(tratamiento.presupuesto) === 1 && Number(tratamiento.urgencia || 0) === 0 && Number(tratamiento.progreso || 0) < 100 && Number(tratamiento.atendido) !== 1 && tratamiento.pieza) {
                    const pieza = String(tratamiento.pieza);
                    const actual = disponibles.get(pieza) || { tratamiento: '', bloques: 0, progreso: 0 };
                    actual.tratamiento = tratamiento.tratamiento || actual.tratamiento || 'Procedimiento dental';
                    actual.bloques += parseInt(tratamiento.cantidad_bloques) || 1;
                    actual.progreso = Math.max(actual.progreso, Number(tratamiento.progreso || 0));
                    disponibles.set(pieza, actual);
                }
            });

            limpiarOdontogramaAgenda();
            if (!disponibles.size) return;

            disponibles.forEach(function(datos, pieza) {
                $selector.find('[data-selector-pieza="' + pieza + '"]')
                    .prop('disabled', false)
                    .addClass('is-enabled')
                    .attr('data-bloques-agenda', datos.bloques)
                    .attr('data-progreso-agenda', datos.progreso)
                    .attr('title', datos.tratamiento + ' · ' + datos.bloques + (datos.bloques === 1 ? ' bloque' : ' bloques'));
            });
            $('#selector_odontograma_agenda_wrapper').show();
        }

        $('#selector_odontograma_agenda').off('odontograma:change.agenda').on('odontograma:change.agenda', function(event, piezas) {
            const seleccionadas = new Set((piezas || []).map(String));
            $('.tratamiento-agenda-dental[data-tipo="pieza"]').each(function() {
                if (!this.disabled) {
                    this.checked = seleccionadas.has(String($(this).data('pieza')));
                }
            });
            recalcularBloquesAgendaDental();
        });
        $('#selector_odontograma_agenda')
            .off('click.recalcularAgenda', '.selector-odontograma-generico__pieza.is-enabled')
            .on('click.recalcularAgenda', '.selector-odontograma-generico__pieza.is-enabled', function() {
                setTimeout(recalcularBloquesAgendaDental, 0);
            });

        function obtenerTratamientosSeleccionadosAgendaDental() {
            const piezas = new Set(
                $('#selector_odontograma_agenda [data-selector-pieza].is-selected').map(function() {
                    return String($(this).data('selector-pieza'));
                }).get()
            );
            const tratamientos = [];

            $('.tratamiento-agenda-dental[data-tipo="pieza"]').each(function() {
                const seleccionado = piezas.has(String($(this).data('pieza')));
                if (!this.disabled) this.checked = seleccionado;
                if (seleccionado) {
                    tratamientos.push({ id: parseInt($(this).data('id')), tipo: 'pieza' });
                }
            });
            $('.tratamiento-agenda-dental[data-tipo="grupo"]:checked').each(function() {
                tratamientos.push({ id: parseInt($(this).data('id')), tipo: 'grupo' });
            });

            return tratamientos.filter(function(item) { return Number.isInteger(item.id) && item.id > 0; });
        }

        function recalcularBloquesAgendaDental() {
            let bloques = 0;
            $('#selector_odontograma_agenda [data-selector-pieza].is-selected').each(function() {
                bloques += parseInt($(this).attr('data-bloques-agenda')) || 1;
            });
            $('.tratamiento-agenda-dental[data-tipo="grupo"]:checked').each(function() {
                bloques += parseInt($(this).data('bloques')) || 1;
            });
            mostrarDuracionAgendaDental(Math.max(1, bloques));
            actualizarIndicadorPagoTratamientos();
        }

        function ajustarBloquesAgendaDental(valor) {
            const bloques = Math.min(20, Math.max(1, parseInt(valor) || 1));
            $('#cantidad_bloques_atencion').val(bloques);
            $('#texto_bloques_atencion').text(bloques === 1 ? 'bloque' : 'bloques');
            $('#minutos_bloques_atencion').text(bloques * 15);
        }

        function actualizarIndicadorPagoTratamientos() {
            const estados = $('.tratamiento-agenda-dental:checked').map(function() {
                return String($(this).data('estado-pago') || 'pendiente').toLowerCase();
            }).get();

            let clase = 'bg-danger';
            let texto = estados.length ? 'Pendiente de pago' : 'Seleccione un tratamiento';

            if (estados.length && estados.every(estado => estado === 'ok' || estado === 'pagado')) {
                clase = 'bg-success';
                texto = 'Pagado';
            } else if (estados.some(estado => estado === 'incompleto' || estado === 'parcial') ||
                       (estados.some(estado => estado === 'ok' || estado === 'pagado') &&
                        estados.some(estado => estado !== 'ok' && estado !== 'pagado'))) {
                clase = 'bg-warning';
                texto = 'Pago incompleto';
            }

            $('#estado_pago').html(`
                <div id="indicador_estado_pago" class="circle ${clase}" title="${texto}" aria-label="${texto}"></div>
                <small id="texto_estado_pago" class="d-block mt-1 text-muted">${texto}</small>
            `);
        }

        function mostrarDuracionAgendaDental(bloques) {
            bloques = Math.max(1, parseInt(bloques) || 1);
            const minutos = bloques * 15;
            const mensaje = `
                <div class="alert alert-info py-2 px-3 mb-3" role="status">
                    <i class="feather icon-clock mr-1"></i>
                    <strong>Duración estimada:</strong>
                    <input type="number" id="cantidad_bloques_atencion" class="form-control form-control-sm d-inline-block mx-1"
                        value="${bloques}" min="1" max="20" step="1" style="width:72px"
                        onchange="ajustarBloquesAgendaDental(this.value)" oninput="ajustarBloquesAgendaDental(this.value)">
                    <span id="texto_bloques_atencion">${bloques === 1 ? 'bloque' : 'bloques'}</span>
                    de atención
                    (<span id="minutos_bloques_atencion">${minutos}</span> minutos).
                    <small class="d-block mt-1">Las piezas calculan los bloques automáticamente; el profesional puede ajustar esta cantidad.</small>
                </div>`;

            const contenedorMensaje = $('#mensaje_duracion_agenda_dental');
            if (contenedorMensaje.length) {
                contenedorMensaje.html(mensaje);
            } else {
                $('#contenedor_tratamientos_presupuesto').html(mensaje);
            }
        }

        function handleCheckboxClick(id, isChecked, tipo = null) {
            console.log(`Checkbox con ID ${id} está ${isChecked ? 'seleccionado' : 'deseleccionado'}`);

            // Aquí puedes manejar la lógica adicional o enviar el ID al servidor
            $.ajax({
                url: '{{ ROUTE("profesional.mi_agenda.atender_tratamiento_presupuesto") }}',
                method: 'POST',
                data: { id: id, checked: isChecked, tipo: tipo, origen: 'agenda', _token: CSRF_TOKEN },
                success: function(response) {
                    console.log('Servidor respondió:', response);
                    let bloques_actualizados = response.bloques;
                    let bloques_original = parseInt($('#cantidad_bloques_atencion').val() || $('#cantidad_bloques_atencion').text());
                    let bloques = response.atendido == 1 ? bloques_original + bloques_actualizados : bloques_original - bloques_actualizados;
                    if(bloques < 0) bloques = 0;
                    ajustarBloquesAgendaDental(bloques);
                },
                error: function(error) {
                    console.error('Error al enviar datos:', error);
                }
            });
        }

        function llamarPaciente(id_box, id_profesional, id_paciente, id_lugar_atencion, id_hora_medica)
        {
            mensaje = '';
            valido = 1;
            if(id_box == '' || id_box == null || id_box == undefined)
            {
                mensaje += 'Campo id_box requerido. ';
                valido = 0;
            }
            if(id_profesional == '' || id_profesional == null || id_profesional == undefined)
            {
                mensaje += 'Campo id_profesional requerido. ';
                valido = 0;
            }
            if(id_paciente == '' || id_paciente == null || id_paciente == undefined)
            {
                mensaje += 'Campo id_paciente requerido. ';
                valido = 0;
            }
            if(id_lugar_atencion == '' || id_lugar_atencion == null || id_lugar_atencion == undefined)
            {
                mensaje += 'Campo id_lugar_atencion requerido. ';
                valido = 0;
            }
            if(id_hora_medica == '' || id_hora_medica == null || id_hora_medica == undefined)
            {
                mensaje += 'Campo id_hora_medica requerido. ';
                valido = 0;
            }
            if(valido == 1)
            {
                var url = '{{ route('llamado_paciente.llamarPaciente') }}';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        id_box: id_box,
                        id_profesional: id_profesional,
                        id_paciente: id_paciente,
                        id_lugar_atencion: id_lugar_atencion,
                        id_hora_medica: id_hora_medica,
                        _token: CSRF_TOKEN
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.estado == 1) {
                            swal({
                                title: "Llamado Paciente",
                                text: "Paciente llamado correctamente.",
                                icon: "success"
                            });
                        }
                        else
                        {
                            swal({
                                title: "Error",
                                text: data.msj,
                                icon: "error"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                        swal({
                            title: "Error",
                            text: "Ocurrió un error al llamar al paciente.",
                            icon: "error"
                        });
                    }
                });
            }
            else
            {
                swal({
                    title: "Error",
                    text: mensaje,
                    icon: "error",
                });
            }
        }
    </script>
@endsection
