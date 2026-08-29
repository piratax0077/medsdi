@once
    @include('atencion_odontologica.include.progreso_circular_tratamiento')

    <style>
        .od-evoluciones-linea {
            margin-top: 1rem;
            border: 1px solid #dfe5ec;
            border-radius: .5rem;
            background: #fff;
            overflow: hidden;
        }
        .od-evolucion-fila {
            display: grid;
            grid-template-columns: minmax(155px, .9fr) 78px minmax(210px, 1.45fr) minmax(260px, 2fr) 68px 44px;
            gap: .75rem;
            align-items: center;
            padding: .85rem 1rem;
            border-bottom: 1px solid #e8edf2;
        }
        .od-evolucion-fila:last-child { border-bottom: 0; }
        .od-evolucion-fila:hover { background: #f8fafc; }
        .od-evolucion-fecha { color: #405a78; line-height: 1.25; }
        .od-evolucion-fecha strong { display: block; font-size: .9rem; }
        .od-evolucion-fecha small { display: block; margin-top: .2rem; }
        .od-evolucion-pieza {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 36px;
            border-radius: 18px;
            background: #eef5ff;
            color: #185abc;
            font-weight: 700;
        }
        .od-evolucion-dato { min-width: 0; }
        .od-evolucion-dato small {
            display: block;
            margin-bottom: .15rem;
            color: #7a8795;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .03em;
            text-transform: uppercase;
        }
        .od-evolucion-dato span {
            display: block;
            color: #26384a;
            line-height: 1.35;
            overflow-wrap: anywhere;
        }
        .od-evolucion-accion { padding: .35rem .55rem; }
        .od-evolucion-progreso { display: flex; justify-content: center; }
        .od-evolucion-progreso .dental-progress-wheel { width: 52px; height: 52px; flex-basis: 52px; }
        .od-evolucion-progreso .dental-progress-wheel.is-disabled { opacity: .45; pointer-events: none; }

        @media (max-width: 991.98px) {
            .od-evolucion-fila { grid-template-columns: 1fr 70px 100px 44px; }
            .od-evolucion-procedimiento,
            .od-evolucion-texto { grid-column: 1 / -1; }
        }
        @media (max-width: 575.98px) {
            .od-evolucion-fila { grid-template-columns: 1fr auto auto; }
            .od-evolucion-fecha { grid-column: 1 / -1; }
            .od-evolucion-pieza { min-width: 58px; }
        }
    </style>

    <script>
        window.actualizarProgresoEvolucionOdontologica = function (select, idTratamiento) {
            const control = $(select);
            const anterior = Number(control.data('original-progress')) || 0;
            const nuevo = Number(control.val());
            const paciente = $('#id_paciente_fc').val() || $('#id_paciente').val();

            control.prop('disabled', true);
            $.ajax({
                url: "{{ route('dental.guardarCambiosTratamientoUrgencia') }}",
                type: 'POST',
                data: {
                    id_tratamiento: idTratamiento,
                    progreso: nuevo,
                    id_paciente: paciente,
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    _token: typeof CSRF_TOKEN !== 'undefined' ? CSRF_TOKEN : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (respuesta) {
                    if (!respuesta || respuesta.mensaje !== 'OK') {
                        control.val(anterior);
                        actualizarVisualProgresoDental(control, anterior);
                        swal('No fue posible actualizar', 'El progreso del tratamiento no pudo guardarse.', 'error');
                        return;
                    }

                    $('.od-evolucion-progreso select[data-treatment-id="' + idTratamiento + '"]').each(function () {
                        $(this).val(nuevo).data('original-progress', nuevo);
                        actualizarVisualProgresoDental(this, nuevo);
                    });

                    if (typeof window.actualizarDatosProgresoPresupuesto === 'function' && respuesta.odontograma) {
                        window.actualizarDatosProgresoPresupuesto(respuesta.odontograma);
                    }
                },
                error: function () {
                    control.val(anterior);
                    actualizarVisualProgresoDental(control, anterior);
                    swal('Error', 'No fue posible actualizar el progreso del tratamiento.', 'error');
                },
                complete: function () { control.prop('disabled', false); }
            });
        };

        function renderHistorialEvolucionesOdontologicas(contenedor, evoluciones, opciones) {
            const destino = $(contenedor);
            const config = Object.assign({
                modificar: 'modificarEvolucionOdGral'
            }, opciones || {});

            destino.empty();
            if (!evoluciones || !evoluciones.length) {
                destino.append('<div class="alert alert-info text-center"><i class="feather icon-info"></i> No hay evoluciones registradas para esta ficha de atención.</div>');
                return;
            }

            const listado = $('<div class="od-evoluciones-linea" role="list" aria-label="Historial de evoluciones odontológicas"></div>');
            evoluciones.forEach(function (evolucion) {
                const procedimiento = evolucion.procedimiento || {};
                const idTratamiento = Number(evolucion.id_procedimiento || procedimiento.id || 0);
                let progreso = procedimiento.progreso !== null && procedimiento.progreso !== undefined
                    ? Number(procedimiento.progreso)
                    : (Number(procedimiento.estado) === 1 ? 100 : 0);
                progreso = [0, 25, 50, 75, 100].includes(progreso) ? progreso : 0;
                const fila = $('<div class="od-evolucion-fila" role="listitem"></div>').attr('id', 'evolucion-' + evolucion.id);

                $('<div class="od-evolucion-fecha"></div>')
                    .append($('<strong></strong>').text(evolucion.fecha || 'Sin fecha'))
                    .append($('<small class="text-muted"></small>').text(evolucion.profesional_nombre_completo || 'Profesional no informado'))
                    .appendTo(fila);
                $('<span class="od-evolucion-pieza" title="Pieza dental"></span>').text(evolucion.pieza || '—').appendTo(fila);
                $('<div class="od-evolucion-dato od-evolucion-procedimiento"><small>Procedimiento</small></div>')
                    .append($('<span></span>').text(procedimiento.tratamiento || 'Sin procedimiento')).appendTo(fila);
                $('<div class="od-evolucion-dato od-evolucion-texto"><small>Evolución</small></div>')
                    .append($('<span></span>').text(evolucion.evolucion || 'Sin observaciones')).appendTo(fila);

                const progresoContenedor = $('<div class="od-evolucion-progreso"></div>');
                const progresoHtml = window.crearProgresoCircularDental(
                    progreso,
                    'actualizarProgresoEvolucionOdontologica(this,' + idTratamiento + ')'
                );
                progresoContenedor.html(progresoHtml);
                progresoContenedor.find('select').attr('data-treatment-id', idTratamiento);
                if (!idTratamiento) {
                    progresoContenedor.find('.dental-progress-wheel').addClass('is-disabled');
                    progresoContenedor.find('select').prop('disabled', true);
                }
                progresoContenedor.appendTo(fila);
                $('<button type="button" class="btn btn-sm btn-outline-warning od-evolucion-accion" title="Modificar evolución"><i class="feather icon-edit"></i></button>')
                    .attr('aria-label', 'Modificar evolución de la pieza ' + (evolucion.pieza || 'sin número'))
                    .on('click', function () {
                        if (typeof window[config.modificar] === 'function') window[config.modificar](evolucion.id);
                    }).appendTo(fila);
                listado.append(fila);
            });
            destino.append(listado);
        }
    </script>
@endonce
