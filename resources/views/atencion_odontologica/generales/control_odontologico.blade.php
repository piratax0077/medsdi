@php
    $counter = 1000;
    // El selector gráfico solo debe ofrecer piezas sin urgencia asociada y que
    // aún tengan una prestación pendiente o en proceso (no finalizada/cancelada).
    $piezasDisponiblesEvolucion = collect($odontograma ?? [])
        ->filter(fn ($odont) => ($odont->urgencia ?? 0) == 0)
        ->filter(fn ($odont) => !in_array((int) ($odont->estado ?? 0), [1, 3], true))
        ->unique(fn ($odont) => (string) $odont->pieza)
        ->values();
@endphp

<div class="row">
    <div class="col-9">
        <div class="card-informacion">
            <div class="card-body">
                {{-- Fila 1: selector odontograma --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label class="floating-label-activo-sm">Piezas</label>

                            @include('atencion_odontologica.include.selector_odontograma', [
                                'id' => 'selector_evolucion_od_gral_'.$counter,
                                'inputId' => 'n_pieza_evol_g'.$counter,
                                'counter' => $counter,
                                'multiple' => true,
                                'compacto' => true,
                                'piezasDisponibles' => $piezasDisponiblesEvolucion,
                                'titulo' => 'Piezas disponibles',
                                'ayuda' => 'Seleccione una o varias piezas',
                            ])

                            <select
                                class="d-none"
                                name="n_pieza_evol_g{{ $counter }}"
                                id="n_pieza_evol_g{{ $counter }}"
                                multiple="multiple"
                                tabindex="-1"
                                aria-hidden="true">
                                @foreach($piezasDisponiblesEvolucion as $odont)
                                    <option value="{{ $odont->pieza }}">{{ $odont->pieza }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Fila 2: formulario de evolución --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-row align-items-end">
                            <div class="form-group col-sm-12 col-md-5 mb-3">
                                <label class="floating-label-activo-sm">Procedimiento</label>
                                <select
                                    name="proc_od_gral_grupo{{ $counter }}"
                                    id="proc_od_gral_grupo{{ $counter }}"
                                    onchange="dame_estado_prestacion(this.value, {{ $counter }})"
                                    class="form-control form-control-sm">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-7 mb-3">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <input
                                    type="text"
                                    name="obs_od_gral_grupo{{ $counter }}"
                                    id="obs_od_gral_grupo{{ $counter }}"
                                    class="form-control form-control-sm" />
                            </div>

                            <div class="form-group col-sm-12 mb-2">
                                <label class="floating-label-activo-sm">Evolución</label>
                                <textarea
                                    class="form-control form-control-sm"
                                    name="evoluciones_od_gral_grupo{{ $counter }}"
                                    id="evoluciones_od_gral_grupo{{ $counter }}"
                                    rows="3"
                                    onfocus="this.rows=6"
                                    onblur="this.rows=3;"></textarea>
                            </div>

                            <div class="form-group col-sm-12 mb-0">
                                <div
                                    class="badge badge-warning"
                                    style="font-size: 15px;"
                                    id="estado_prestacion{{ $counter }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-outline-success" onclick="guardar_evolucion_tto_gral_grupo({{ $counter }})"><i class="feather icon-save"></i> Guardar evolución</button>
            </div>
        </div>

        <div id="contenedor_evoluciones_od_gral"></div>
    </div>
    <div class="col-3">
        <div class="row">
            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card-informacion" style="border: 1px solid #6c9bd5;">
                    <div class="card-top text-center">
                        <h5 class="text-c-blue">
                            PRÓXIMO
                            CONTROL
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                <h5 class="text-c-blue">
                                    <i class="fas fa-calendar"></i>
                                    Fecha:
                                </h5>
                                <h5 class="font-weight-bold">
                                    <span id="proxima_fecha_atencion_od_gral"></span>
                                </h5>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                <h5 class="text-c-blue">
                                    <i class="fas fa-clock"></i>
                                    Horario:
                                </h5>
                                <p id="proxima_hora_atencion_od_gral"></p>
                            </div>
                            <div class="col-sm-12">
                                <p id="observaciones_hora_dental"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-block" onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})">
                    <i class="feather icon-calendar"></i>
                    Agendar hora</button>
            </div>
        </div>

    </div>
</div>

<!-- modalModificarEvolucion -->
<div class="modal fade" id="modalModificarEvolucion" tabindex="-1" role="dialog" aria-labelledby="modalModificarEvolucionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarEvolucionLabel">Modificar Evolución</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formModificarEvolucion">
                    <input type="hidden" id="id_evolucion" name="id_evolucion">
                    <div class="form-group">
                        <label for="fecha_evolucion" class="floating-label-activo-sm">Fecha</label>
                        <input type="date" class="form-control" id="fecha_evolucion" name="fecha_evolucion" readonly>
                    </div>
                    <div class="form-group">
                        <label for="numero_pieza_evol" class="floating-label-activo-sm">Número de Pieza</label>
                        <input type="text" class="form-control" id="numero_pieza_evol" name="numero_pieza_evol" readonly>
                    </div>
                    <div class="form-group">
                        <label for="procedimiento_evol" class="floating-label-activo-sm">Procedimiento</label>
                        <input type="text" class="form-control" id="procedimiento_evol" name="procedimiento_evol" readonly>
                    </div>
                    <div class="form-group">
                        <label for="observaciones" class="floating-label-activo-sm">Evolución</label>
                        <textarea class="form-control" id="observaciones_evol" name="observaciones_evol"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarCambiosEvolucion()">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<script>
    // El include selector_odontograma dispara 'odontograma:change' con las piezas
    // seleccionadas apenas el usuario hace clic; usamos ese hook directo en vez de
    // depender del evento 'change' nativo del select oculto (más confiable).
    $(document).on('odontograma:change', '#selector_evolucion_od_gral_1000', function(e, values){
        values = values || [];
        if(values.length){
            dame_tratamientos_pieza_gral(values[0], 1000, 'grupo');
        } else {
            $('#proc_od_gral_grupo1000').empty().append('<option value="0">Seleccione</option>');
            $('#estado_prestacion1000').html('');
        }
    });

    // Respaldo por si el select oculto cambia por otra vía (ej. auto-refresh).
    $(document).on('change', '#n_pieza_evol_g1000', function(){
        let piezas = $(this).val() || [];
        if(piezas.length){
            dame_tratamientos_pieza_gral(piezas[0], 1000, 'grupo');
        } else {
            $('#proc_od_gral_grupo1000').empty().append('<option value="0">Seleccione</option>');
            $('#estado_prestacion1000').html('');
        }
    });

    function guardar_pieza_dental_tto_gral(counter){
        // Aquí puedes agregar la lógica para guardar la pieza dental
        console.log("Guardando pieza dental:", counter);
        let pieza = $('#n_pieza_ex_pp' + counter).val();
        let procedimiento = $('#proc_od_gral' + counter).val();
        let respCalor = $('#sel_endo_resp_calor' + counter).val();
        let respFrio = $('#sel_endo_resp_frio' + counter).val();
        let respElect = $('#sel_endo_resp_elect' + counter).val();
        let respPerc = $('#sel_endo_resp_perc' + counter).val();
        let respExpl = $('#sel_endo_resp_expl' + counter).val();
        let respCavitaria = $('#sel_endo_cavitaria' + counter).val();

        let valido = 1;
        let mensaje = "";

        if(pieza == ""){
            mensaje += "Debe seleccionar una pieza dental. <br>";
            valido = 0;
        }
        if(procedimiento == "" || procedimiento == "0"){
            mensaje += "Debe seleccionar un procedimiento. <br>";
            valido = 0;
        }
        if(respCalor == ""){
            mensaje += "Debe seleccionar la respuesta al calor. <br>";
            valido = 0;
        }
        if(respFrio == ""){
            mensaje += "Debe seleccionar la respuesta al frío. <br>";
            valido = 0;
        }
        if(respElect == ""){
            mensaje += "Debe seleccionar la respuesta eléctrica. <br>";
            valido = 0;
        }
        if(respPerc == ""){
            mensaje += "Debe seleccionar la respuesta a la percusión. <br>";
            valido = 0;
        }
        if(respExpl == ""){
            mensaje += "Debe seleccionar la respuesta a la exploración. <br>";
            valido = 0;
        }
        if(respCavitaria == ""){
            mensaje += "Debe seleccionar la respuesta a la cavitaria. <br>";
            valido = 0;
        }

        if(valido == 0){
            swal({
                title:'Error',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
            });
            return false;
        } else {
            // Aquí puedes agregar la lógica para guardar la pieza dental
            console.log("Guardando pieza dental:", counter);
            let url = "{{ route('profesional.adm_dental.guardar_pieza_dental_tto_gral') }}";
            let data = {
                pieza: pieza,
                procedimiento: procedimiento,
                respCalor: respCalor,
                respFrio: respFrio,
                respElect: respElect,
                respPerc: respPerc,
                respExpl: respExpl,
                respCavitaria: respCavitaria,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_profesional: $('#id_profesional_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type:'post',
                data: data,
                beforeSend: function(){
                    swal({
                        title: 'Guardando pieza dental...',
                        text: 'Por favor, espere.',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        content: {
                            element: "div",
                            attributes: {
                                innerHTML: '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>'
                            }
                        }
                    });
                },
                success: function(response) {
                    swal.close();
                    console.log(response);
                    if (response.mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'La pieza dental se guardó correctamente.',
                            icon: 'success',
                        });
                        let odontograma = response.odontograma;
                        let table = $('#presup_estado_pago').DataTable();

                        // Limpiar la tabla antes de agregar nuevas filas
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if(odonto.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(odonto.estado_pago == 'incompleto'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else{
                                    var estado = 'TERMINADO';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle '+clase+'"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                        });
                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"> </i> </button></td>
                                </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                    } else {
                        swal({
                            title: 'Error',
                            text: 'Ocurrió un error al guardar la pieza dental.',
                            icon: 'error',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al guardar la pieza dental.',
                        icon: 'error',
                    });
                }
            });
        }
    }

    function guardar_evolucion_tto_gral_grupo(counter){
        let piezas = $('#n_pieza_evol_g' + counter).val();
        let id_procedimiento = $('#proc_od_gral_grupo' + counter).val();
        let obs = $('#obs_od_gral_grupo' + counter).val();
        let evolucion = $('#evoluciones_od_gral_grupo' + counter).val();

        let valido = 1;
        let mensaje = "";

        if(!piezas){
            valido = 0;
            mensaje += " - Piezas\n";
        }

        if(!id_procedimiento){
            valido = 0;
            mensaje += " - Procedimiento\n";
        }

        if(valido == 1){
            // Guardar evolución
            let data = {
                piezas: piezas,
                evolucion: evolucion,
                obs: obs,
                proc: id_procedimiento,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_profesional: $('#id_profesional_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                _token: CSRF_TOKEN
            }

            let url = "{{ route('dental.guardar_evolucion_od_gral') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                beforeSend: function(){
                    swal({
                        title: 'Cargando',
                        text: 'Por favor espere...',
                        icon: 'info',
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    console.log(response);
                    if (response.estado == 'ok') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución guardada correctamente.',
                            icon: 'success',
                        });
                        dame_evoluciones_od_gral();
                        limpiar_evolucion_grupo(counter);
                    } else {
                        swal({
                            title: 'Error',
                            text: 'Ocurrió un error al guardar la evolución.',
                            icon: 'error',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al guardar la evolución.',
                        icon: 'error',
                    });
                }
            });

        }else{
            swal({
                title: 'Advertencia',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: "Debe completar los siguientes campos:<br>" + mensaje
                    }
                },
                icon: 'warning',
            });
        }
    }

    function limpiar_evolucion_grupo(counter){
        const $selector = $('#selector_evolucion_od_gral_' + counter);
        $selector.find('.is-selected').removeClass('is-selected').attr('aria-pressed', 'false');
        $selector.find('.selector-odontograma-generico__resumen').html('<span class="text-muted">Ninguna pieza seleccionada</span>');
        $('#n_pieza_evol_g' + counter).val(null);
        $('#proc_od_gral_grupo' + counter).empty().append('<option value="0">Seleccione</option>');
        $('#obs_od_gral_grupo' + counter).val('');
        $('#evoluciones_od_gral_grupo' + counter).val('');
        $('#estado_prestacion' + counter).html('');
    }

    function dame_tratamientos_pieza_gral(pieza, counter, tipo){
        let id_paciente = $('#id_paciente').val();
        let id_ficha_atencion = $('#id_fc').val();
        if(pieza){
            $.ajax({
                url: "{{ route('dental.dame_tratamientos_pieza_gral') }}",
                type: 'POST',
                data: {
                    n_pieza: pieza,
                    id_paciente: id_paciente,
                    id_ficha_atencion: id_ficha_atencion,
                    _token: CSRF_TOKEN
                },
                success: function(response) {
                    console.log(response);
                    if(response.error){
                        swal({
                            title: "Error",
                            text: response.error,
                            icon: "error",
                            button: "Aceptar",
                        });
                        return false;
                    }
                    if(tipo == 'grupo'){
                        $('#proc_od_gral_grupo' + counter).val(0);
                        $('#proc_od_gral_grupo' + counter).empty();
                        $('#proc_od_gral_grupo' + counter).append('<option value="0">Seleccione</option>');
                        $.each(response.tratamientos, function(index, value) {
                            if(value.urgencia == 0){
                                $('#proc_od_gral_grupo' + counter).append('<option value="' + value.id + '">' + value.tratamiento + '</option>');
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al obtener los procedimientos.',
                        icon: 'error',
                    });
                }


            });
        }
    }

    function dame_estado_prestacion(id_proc, counter) {
        $.ajax({
            url: "{{ route('dental.dame_estado_prestacion') }}",
            type: 'POST',
            data: {
                id_procedimiento: id_proc,
                _token: CSRF_TOKEN
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    // swal({
                    //     title: "Error",
                    //     text: response.error,
                    //     icon: "error",
                    //     button: "Aceptar",
                    // });
                    $('#estado_prestacion' + counter).html('');
                    $('#btn_cambiar_estado_' + counter).prop('disabled', true);
                    return false;
                }
                // Actualizar el estado de la prestación en el formulario
                $('#estado_prestacion' + counter).html(response.estado);
                $('#btn_cambiar_estado_' + counter).prop('disabled', false);
            },
            error: function(xhr, status, error) {
                swal.close();
                swal({
                    title: 'Error',
                    text: 'Ocurrió un error al obtener el estado de la prestación.',
                    icon: 'error',
                });
            }
        });
    }

    // Variable global para almacenar las evoluciones odontológicas generales
    let evoluciones = [];

    // Funciones auxiliares para trabajar con las evoluciones globales
    function obtenerEvolucionesOdGral() {
        return evoluciones;
    }

    function obtenerEvolucionPorId(id) {
        return evoluciones.find(evolucion => evolucion.id == id);
    }

    function obtenerEvolucionesPorPieza(pieza) {
        return evoluciones.filter(evolucion => evolucion.pieza == pieza);
    }

    function obtenerEvolucionesPorProfesional(profesional_id) {
        return evoluciones.filter(evolucion => evolucion.id_profesional == profesional_id);
    }

    function contarEvoluciones() {
        return evoluciones.length;
    }

    function limpiarEvolucionesGlobales() {
        evoluciones = [];
        window.evoluciones_od_gral_raw = [];
        window.total_evoluciones_od_gral = 0;
    }

    function actualizarEvolucionGlobal(evolucion_actualizada) {
        const index = evoluciones.findIndex(evol => evol.id == evolucion_actualizada.id);
        if (index !== -1) {
            evoluciones[index] = evolucion_actualizada;
        }
    }

    function eliminarEvolucionGlobal(id_evolucion) {
        evoluciones = evoluciones.filter(evol => evol.id != id_evolucion);
        // También actualizar el contador
        if (window.total_evoluciones_od_gral !== undefined) {
            window.total_evoluciones_od_gral = evoluciones.length;
        }
    }

    function dame_evoluciones_od_gral(){
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional_fc').val();
        let id_hora_medica = $('#hora_medica').val();

        let url = "{{ route('dental.dame_evoluciones_od_gral') }}";

        let data = {
            id_ficha_atencion: id_ficha_atencion,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_hora_medica: id_hora_medica,
            _token: CSRF_TOKEN
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            beforeSend: function(){
                swal({
                    title: 'Cargando...',
                    text: 'Por favor, espere.',
                    icon: 'info',
                    button: false
                });
            },
            success: function(response) {
                swal.close();
                console.log(response);
                if(response.estado == 'ok'){
                    // Guardar las evoluciones en la variable global
                    evoluciones = response.evoluciones || [];

                    // También guardar datos adicionales si los necesitas
                    if(response.evoluciones_raw) {
                        window.evoluciones_od_gral_raw = response.evoluciones_raw;
                    }
                    if(response.total_evoluciones !== undefined) {
                        window.total_evoluciones_od_gral = response.total_evoluciones;
                    }

                    // Cargar las evoluciones en la tabla correspondiente
                    cargarTablaEvolucionesOdGral(response.evoluciones);

                    console.log('Evoluciones guardadas globalmente:', evoluciones);
                }else{
                    // Limpiar las variables globales si no hay evoluciones
                    evoluciones = [];
                    window.evoluciones_od_gral_raw = [];
                    window.total_evoluciones_od_gral = 0;

                    // Limpiar la tabla si no hay evoluciones
                    limpiarTablaEvolucionesOdGral();
                }

            },
            error: function(error) {
                swal.close();
                console.log(error);

                // Limpiar las variables globales en caso de error
                evoluciones = [];
                window.evoluciones_od_gral_raw = [];
                window.total_evoluciones_od_gral = 0;
            }
        });
    }

    function cargarTablaEvolucionesOdGral(evoluciones){
        const div_evolucion = $('#contenedor_evoluciones_od_gral');
        div_evolucion.empty();

        if (evoluciones && evoluciones.length > 0) {
            evoluciones.forEach(function(evolucion, index) {
                let estado = "";
                let clase = "";
                if(evolucion.procedimiento.estado == 0){
                    estado = "Pendiente";
                    clase = "badge badge-warning"
                }else if(evolucion.procedimiento.estado == 1){
                    estado = "Finalizado";
                    clase = "badge badge-success";
                }else if(evolucion.procedimiento.estado == 2){
                    estado = "Cancelado";
                    clase = "badge badge-danger";
                }else if(evolucion.procedimiento.estado == 3){
                    estado = "Citado a control";
                    clase = "badge badge-info";
                }
                const fila = `
                    <div class="tab-pane fade active show" id="evolucion-${evolucion.id}" role="tabpanel" aria-labelledby="evolucion-${evolucion.id}-tab">
                        <div class="card-informacion">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Evolución registrada el ${evolucion.fecha}</h6>
                                <small class="text-muted">Por: ${evolucion.profesional_nombre_completo}</small>
                            </div>
                            <div class="card-body">
                                <div class="form-row align-items-center">
                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                            <input type="text" class="form-control form-control-sm" value="${evolucion.pieza}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Procedimiento</label>
                                            <input type="text" class="form-control form-control-sm" value="${evolucion.procedimiento?.tratamiento}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Evolución</label>
                                            <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" readonly>${evolucion.evolucion}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <span class="${clase}" style="font-size: 15px;">${estado}</span>
                                <button type="button" class="btn btn-sm btn-outline-warning" onclick="modificarEvolucionOdGral(${evolucion.id})" title="Eliminar evolución">
                                    <i class="feather icon-edit"></i> Modificar
                                </button>
                            </div>

                        </div>
                    </div>
                `;
                div_evolucion.append(fila);
            });
        } else {
            div_evolucion.append(`
                <div class="alert alert-info text-center">
                    <i class="feather icon-info"></i>
                    No hay evoluciones registradas para esta ficha de atención.
                </div>
            `);
        }
    }

    // Función para eliminar una evolución odontológica general
    function eliminarEvolucionOdGral(idEvolucion) {
        swal({
            title: "¿Está seguro?",
            text: "Esta acción eliminará la evolución de forma permanente.",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                confirmarEliminarEvolucionOdGral(idEvolucion);
            }
        });
    }

    // Función para confirmar la eliminación de la evolución
    function confirmarEliminarEvolucionOdGral(idEvolucion) {
        let data = {
            id_evolucion: idEvolucion,
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: '{{ route("dental.eliminar_evolucion_od_gral") }}',
            method: 'POST',
            data: data,
            beforeSend: function() {
                swal({
                    title: 'Eliminando...',
                    text: 'Por favor, espere.',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false
                });
            },
            success: function(response) {
                console.log(response);
                swal.close();

                if (response.estado == 'ok') {
                    swal({
                        title: "Éxito",
                        text: "La evolución ha sido eliminada correctamente.",
                        icon: "success",
                    }).then(() => {
                        // Recargar las evoluciones después de eliminar
                        if (response.evoluciones) {
                            cargarTablaEvolucionesOdGral(response.evoluciones);
                        } else {
                            // Si no se devuelven evoluciones, recargar toda la información
                            cargarInformacionFichaAtencion($('#id_fc').val());
                        }
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje || "Error al eliminar la evolución.",
                        icon: "error",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal.close();
                console.error('Error:', xhr.responseText);
                swal({
                    title: "Error",
                    text: "Error en la comunicación con el servidor.",
                    icon: "error",
                });
            }
        });
    }

    function modificarEvolucionOdGral(counter){
        var evolucion = obtenerEvolucionPorId(counter);
        console.log(evolucion.fecha);
        // transformar fecha de DD/MM/YYYY HH:mm → YYYY-MM-DD
        let partes = evolucion.fecha.split(" "); // ["22/08/2025", "14:46"]
        let fechaPartes = partes[0].split("/");  // ["22", "08", "2025"]
        let fechaISO = `${fechaPartes[2]}-${fechaPartes[1]}-${fechaPartes[0]}`; // "2025-08-22"
        // Aquí puedes llenar el formulario con los datos de la evolución seleccionada
        $('#id_evolucion').val(evolucion.id);
        $('#fecha_evolucion').val(fechaISO);
        $('#numero_pieza_evol').val(evolucion.pieza);
        $('#procedimiento_evol').val(evolucion.procedimiento.tratamiento);
        $('#observaciones_evol').val(evolucion.evolucion);
        // Mostrar el modal para modificar la evolución
        $('#modalModificarEvolucion').modal('show');
    }

    function guardarCambiosEvolucion() {
        let idEvolucion = $('#id_evolucion').val();
        let fecha = $('#fecha_evolucion').val();
        let numeroPieza = $('#numero_pieza_evol').val();
        let procedimiento = $('#procedimiento_evol').val();
        let observaciones = $('#observaciones_evol').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        let data = {
            id_evolucion: idEvolucion,
            fecha: fecha,
            numero_pieza: numeroPieza,
            procedimiento: procedimiento,
            observaciones: observaciones,
            id_ficha_atencion: id_ficha_atencion,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            _token: CSRF_TOKEN
        };

        console.log(data);

        $.ajax({
            url: '{{ route("dental.modificar_evolucion") }}',
            method: 'POST',
            data: data,
            beforeSend: function() {
                swal({
                    title: 'Guardando...',
                    text: 'Por favor, espere.',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false
                });
            },
            success: function(response) {
                console.log(response);
                swal.close();

                if (response.mensaje == 'ok') {
                    swal({
                        title: "Éxito",
                        text: "La evolución ha sido modificada correctamente.",
                        icon: "success",
                    }).then(() => {
                        // Recargar las evoluciones después de modificar
                        if (response.evoluciones) {
                            dame_evoluciones_od_gral();
                             $('#modalModificarEvolucion').modal('hide');
                        } else {
                            // Si no se devuelven evoluciones, recargar toda la información
                            cargarInformacionFichaAtencion($('#id_fc').val());
                        }
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje || "Error al modificar la evolución.",
                        icon: "error",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal.close();
                console.error('Error:', xhr.responseText);
                swal({
                    title: "Error",
                    text: "Error en la comunicación con el servidor.",
                    icon: "error",
                });
            }
        });
    }
</script>
