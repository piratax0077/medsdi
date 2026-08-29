@once
<style>
    .agenda-dental-contexto { border: 1px solid #cfe0f5; border-radius: .5rem; background: #f8fbff; padding: .85rem; margin-bottom: 1rem; }
    .agenda-dental-contexto__pieza { display:flex; gap:.65rem; align-items:flex-start; padding:.55rem .65rem; border:1px solid #e1e8f0; border-radius:.4rem; background:#fff; margin-top:.45rem; }
    .agenda-dental-contexto__pieza small { display:block; color:#718096; }
    .agenda-dental-contexto__vacio { color:#66788a; font-size:.85rem; }
    .agenda-dental-resumen { width:100%; border:1px solid #cfe0f5; border-radius:.55rem; background:#f8fbff; padding:.8rem; margin:.25rem 0 1rem; }
    .agenda-dental-resumen__item { padding:.6rem 0; border-top:1px solid #e1e8f0; }
    .agenda-dental-resumen__item:first-child { border-top:0; }
    .agenda-dental-resumen__cabecera { display:flex; justify-content:space-between; gap:.75rem; margin-bottom:.25rem; }
    .agenda-dental-resumen__tratamiento { color:#66788a; font-size:.78rem; margin-bottom:.35rem; }
    .agenda-dental-resumen .progress { height:.55rem; border-radius:1rem; background:#e2e8f0; }
    .agenda-dental-resumen .progress-bar { background:linear-gradient(90deg, #35b8c1, #087f8c); }
</style>
<script>
    window.agendamientoControlDental = {
        presupuesto: null,
        tratamientos: [],
        bloques: 1,
        cargando: false
    };

    window.obtenerDatosAgendamientoControlDental = function () {
        const contexto = window.agendamientoControlDental;
        return {
            id_presupuesto: contexto.presupuesto || '',
            tratamientos_presupuesto: contexto.tratamientos || [],
            proc_bloque: Math.max(1, Number(contexto.bloques) || 1),
            motivo_dental: contexto.presupuesto ? 'tratamiento' : 'primera'
        };
    };

    window.renderizarResumenAgendamientoControlDental = function () {
        const modal = $('#agenda_agregar_paciente');
        if (!modal.length) return;

        modal.find('#agenda_dental_resumen_control').remove();

        const selector = $('#agenda_dental_presupuesto');
        const presupuestos = selector.data('presupuestos') || [];
        const presupuesto = presupuestos.find(function (item) {
            return String(item.id) === String(window.agendamientoControlDental.presupuesto || '');
        });
        if (!presupuesto) return;

        const idsSeleccionados = new Set((window.agendamientoControlDental.tratamientos || []).map(function (item) {
            return String(item.tipo || 'pieza') + ':' + String(item.id);
        }));
        const prestaciones = (presupuesto.pendientes || []).filter(function (item) {
            return idsSeleccionados.has(String(item.tipo || 'pieza') + ':' + String(item.id));
        });
        if (!prestaciones.length) return;

        const resumen = $('<section id="agenda_dental_resumen_control" class="agenda-dental-resumen"></section>');
        resumen.append($('<div class="d-flex justify-content-between align-items-center mb-1"></div>')
            .append('<strong class="text-c-blue"><i class="feather icon-activity mr-1"></i>Resumen de la atención</strong>')
            .append($('<small class="text-muted"></small>').text(window.agendamientoControlDental.bloques + (window.agendamientoControlDental.bloques === 1 ? ' bloque' : ' bloques'))));

        prestaciones.forEach(function (prestacion) {
            const progreso = Math.max(0, Math.min(100, Number(prestacion.progreso) || 0));
            const titulo = (prestacion.tipo || 'pieza') === 'grupo'
                ? (prestacion.nombre || 'Grupo de piezas')
                : 'Pieza ' + prestacion.pieza;
            const item = $('<div class="agenda-dental-resumen__item"></div>');
            item.append($('<div class="agenda-dental-resumen__cabecera"></div>')
                .append($('<strong></strong>').text(titulo))
                .append($('<strong class="text-c-blue"></strong>').text(progreso + '%')));
            item.append($('<div class="agenda-dental-resumen__tratamiento"></div>').text(prestacion.tratamiento || 'Procedimiento dental'));
            item.append($('<div class="progress" role="progressbar"></div>')
                .attr('aria-label', 'Avance de ' + titulo)
                .attr('aria-valuenow', progreso)
                .attr('aria-valuemin', 0)
                .attr('aria-valuemax', 100)
                .append($('<div class="progress-bar"></div>').css('width', progreso + '%')));
            resumen.append(item);
        });

        const descripcion = modal.find('#reserva_datos_paciente').find('#reserva_hora_descripcion').first().closest('.col-sm-12, .form-group');
        if (descripcion.length) resumen.insertBefore(descripcion);
        else modal.find('#reserva_datos_paciente').append(resumen);
    };

    window.inicializarAgendamientoControlDental = function (idProfesional) {
        const modal = $('#reservar_hora');
        if (!modal.length) return;

        let panel = modal.find('#agenda_dental_contexto_comun');
        if (!panel.length) {
            panel = $(`
                <div id="agenda_dental_contexto_comun" class="agenda-dental-contexto">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong class="text-c-blue"><i class="feather icon-clipboard mr-1"></i>¿Qué se atenderá?</strong>
                        <small id="agenda_dental_bloques" class="text-muted">1 bloque · 15 minutos</small>
                    </div>
                    <select id="agenda_dental_presupuesto" class="form-control form-control-sm mb-2" aria-label="Presupuesto dental">
                        <option value="">Primera consulta dental / sin presupuesto</option>
                    </select>
                    <div id="agenda_dental_tratamientos" class="agenda-dental-contexto__vacio">Buscando tratamientos pendientes…</div>
                </div>`);
            modal.find('.modal-body').prepend(panel);
        }

        const paciente = $('#id_paciente_fc').val() || $('#id_paciente').val() || '{{ $paciente->id ?? '' }}';
        const selector = panel.find('#agenda_dental_presupuesto');
        const lista = panel.find('#agenda_dental_tratamientos');
        selector.html('<option value="">Primera consulta dental / sin presupuesto</option>');
        lista.text('Buscando tratamientos pendientes…');
        window.agendamientoControlDental = { presupuesto: null, tratamientos: [], bloques: 1, cargando: true };

        $.ajax({
            url: "{{ route('dental.contexto_agendamiento') }}",
            type: 'GET',
            data: { id_paciente: paciente, id_profesional: idProfesional },
            success: function (respuesta) {
                const presupuestos = respuesta.presupuestos || [];
                presupuestos.forEach(function (presupuesto) {
                    selector.append($('<option></option>').val(presupuesto.id).text('Presupuesto N° ' + presupuesto.id + ' · ' + presupuesto.pendientes.length + ' pendiente(s)'));
                });
                selector.data('presupuestos', presupuestos);
                window.agendamientoControlDental.cargando = false;
                // El endpoint entrega primero el presupuesto activo más reciente. En un
                // control dental ese es el contexto natural de la próxima atención.
                if (presupuestos.length) {
                    selector.val(String(presupuestos[0].id));
                    window.cargarPresupuestoAgendamientoControlDental(selector);
                }
                else lista.text('No existen tratamientos pendientes. Puede reservar una primera consulta.');
            },
            error: function () {
                window.agendamientoControlDental.cargando = false;
                lista.text('No fue posible consultar los tratamientos pendientes.');
            }
        });
    };

    window.actualizarSeleccionAgendamientoControlDental = function () {
        const seleccionados = [];
        let bloques = 0;
        $('#agenda_dental_tratamientos .agenda-dental-tratamiento:checked').each(function () {
            seleccionados.push({ tipo: String($(this).data('tipo') || 'pieza'), id: Number($(this).data('id')) });
            bloques += Math.max(1, Number($(this).data('bloques')) || 1);
        });
        window.agendamientoControlDental.tratamientos = seleccionados;
        window.agendamientoControlDental.bloques = Math.max(1, bloques);
        $('#agenda_dental_bloques').text(window.agendamientoControlDental.bloques + (window.agendamientoControlDental.bloques === 1 ? ' bloque' : ' bloques') + ' · ' + (window.agendamientoControlDental.bloques * 15) + ' minutos');
        window.renderizarResumenAgendamientoControlDental();
    };

    window.cargarPresupuestoAgendamientoControlDental = function (elemento) {
        const selector = $(elemento);
        const id = String(selector.val() || '');
        const presupuestos = selector.data('presupuestos') || [];
        const presupuesto = presupuestos.find(function (item) { return String(item.id) === id; });
        const lista = $('#agenda_dental_tratamientos').empty();
        window.agendamientoControlDental.presupuesto = presupuesto ? presupuesto.id : null;
        window.agendamientoControlDental.tratamientos = [];
        window.agendamientoControlDental.bloques = 1;

        if (!presupuesto) {
            lista.text('La hora se registrará como primera consulta dental.');
            $('#agenda_dental_bloques').text('1 bloque · 15 minutos');
            window.renderizarResumenAgendamientoControlDental();
            return;
        }

        presupuesto.pendientes.forEach(function (tratamiento) {
            const item = $('<label class="agenda-dental-contexto__pieza"></label>');
            const tipo = tratamiento.tipo || 'pieza';
            const check = $('<input type="checkbox" class="mt-1 agenda-dental-tratamiento">')
                .prop('checked', true)
                .attr('data-id', tratamiento.id)
                .attr('data-tipo', tipo)
                .attr('data-bloques', tratamiento.bloques || 1);
            const titulo = tipo === 'grupo'
                ? (tratamiento.nombre || 'Grupo de piezas')
                : 'Pieza ' + tratamiento.pieza + ' · ' + tratamiento.progreso + '%';
            item.append(check).append($('<span></span>')
                .append($('<strong></strong>').text(titulo))
                .append($('<small></small>').text(tratamiento.tratamiento || 'Procedimiento dental')));
            lista.append(item);
        });

        // Sincroniza inmediatamente lo marcado, sin depender de un evento artificial.
        window.actualizarSeleccionAgendamientoControlDental();
    };

    $(document).off('change.agendaDentalComun', '#agenda_dental_presupuesto').on('change.agendaDentalComun', '#agenda_dental_presupuesto', function () {
        window.cargarPresupuestoAgendamientoControlDental(this);
    });

    $(document).off('change.agendaDentalPiezas', '.agenda-dental-tratamiento').on('change.agendaDentalPiezas', '.agenda-dental-tratamiento', function () {
        window.actualizarSeleccionAgendamientoControlDental();
    });

    $(document).off('show.bs.modal.agendaDentalResumen', '#agenda_agregar_paciente')
        .on('show.bs.modal.agendaDentalResumen', '#agenda_agregar_paciente', function () {
            window.renderizarResumenAgendamientoControlDental();
        });

    $(function () {
        const abrirOriginal = window.hora_medica_pedir;
        if (typeof abrirOriginal === 'function' && !abrirOriginal.__agendaDentalComun) {
            const abrirComun = function (idProfesional, idLugarAtencion, tipoAgenda) {
                abrirOriginal(idProfesional, idLugarAtencion, 2);
                window.inicializarAgendamientoControlDental(idProfesional);
            };
            abrirComun.__agendaDentalComun = true;
            window.hora_medica_pedir = abrirComun;
        }
    });
</script>
@endonce
