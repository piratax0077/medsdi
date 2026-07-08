<div id="modal_iequipo_quirurgico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_iequipo_quirurgico"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Equipo Quirúrgico</h5>
                <button type="button" class="close text-white" onclick="$('#modal_iequipo_quirurgico').modal('hide');"  data-bs-dismiss="modal"aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="tit-gen mb-3">EQUIPO</h6>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-5">
                                        <label class="floating-label-activo-sm">Cargar Equipo</label>
                                        <select class="form-control form-control-sm" name="equ_quirurgico_select_equipo" id="equ_quirurgico_select_equipo" onchange="cargar_mi_equipo('equ_quirurgico_select_equipo','equ_quirurgico_lista_profesionales');">
                                            <option value="0">Seleccione</option>
                                        </select>
                                        <input type="hidden" name="equ_quirurgico_lista_profesionales_hidden" id="equ_quirurgico_lista_profesionales_hidden" value="">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-row equ_quirurgico_lista_profesionales">

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Instrumental especial</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="equ_quirurgico_equipamiento_especial" id="equ_quirurgico_equipamiento_especial"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Variable global para gestionar profesionales del equipo nuevo
    var lista_profesionales_eq_nuevo = [];

    function ingresoequipo() {
        lista_profesionales_eq_nuevo = [];
        cargar_lista_equipos('equ_quirurgico_select_equipo');
        $('#modal_iequipo_quirurgico').modal('show');
    }

    // Carga la lista de equipos disponibles del profesional
    function cargar_lista_equipos(input_select) {
        $('#' + input_select).html('');
        $('#' + input_select).append('<option value="0">Seleccione</option><option value="nuevo">Nuevo Equipo</option>');

        let url = "{{ route('profesional.equipo.ver') }}";
        let id_profesional = $('#id_profesional_fc').val();

        if (!id_profesional) {
            console.warn('ID profesional no encontrado');
            return;
        }

        $.ajax({
            url: url,
            type: "get",
            data: {
                id_profesional: id_profesional,
            },
        })
        .done(function(resp) {
            console.log('Respuesta equipos:', resp);
            if (resp && resp.estado == 1 && resp.registros) {
                $.each(resp.registros, function(index, value) {
                    if (value && value.id && value.nombre) {
                        let html = '<option value="' + value.id + '">' + value.nombre + '</option>';
                        $('#' + input_select).append(html);
                    }
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.error('Error cargando equipos:', jqXHR, ajaxOptions, thrownError)
        });
    }

    // Carga los profesionales del equipo seleccionado o permite crear uno nuevo
    function cargar_mi_equipo(input_select, div_destino) {
        lista_profesionales_eq_nuevo = [];
        $('#equ_quirurgico_lista_profesionales_hidden').val('');
        var valor = $('#' + input_select).val();

        if (valor == 'nuevo') {
            $('.' + div_destino).html('');

            var html = '';

            html += '<!-- info equipo -->';
            html += '<div class="form-group col-md-5 col-lg-5 col-xl-5">';
            html += '    <label class="floating-label-activo-sm">Nombre Equipo</label>';
            html += '    <input type="text" class="form-control form-control-sm" name="equ_quirurgico_nombre_equipo" id="equ_quirurgico_nombre_equipo">';
            html += '</div>';
            html += '<div class="form-group col-md-5 col-lg-5 col-xl-5">';
            html += '    <label class="floating-label-activo-sm">Descripción Equipo</label>';
            html += '    <input type="text" class="form-control form-control-sm" name="equ_quirurgico_descripcion_equipo" id="equ_quirurgico_descripcion_equipo">';
            html += '</div>';
            html += '<div class="form-group col-md-2 col-lg-2 col-xl-2">';
            html += '    <button type="button" class="btn btn-info btn-block btn-sm" onclick="crear_nuevo_equipo()"><i class="feather icon-save"></i> Equipo </button>';
            html += '</div>';

            html += '<!-- formulario -->';
            html += '<div class="form-group col-md-5">';
            html += '<label class="floating-label-activo-sm">Posición </label>';
            html += '    <select class="form-control form-control-sm equipo_posicion" name="equ_quirurgico_posicion_1" id="equ_quirurgico_posicion_1">';
            html += '        <option value="">Seleccione</option>';
            html += '        <option value="CIRUJANO">CIRUJANO</option>';
            html += '        <option value="AYUDANTE">AYUDANTE</option>';
            html += '        <option value="ARSENALERO">ARSENALERO</option>';
            html += '        <option value="ANESTESISTA">ANESTESISTA</option>';
            html += '    </select>';
            html += '</div>';
            html += '<div class="form-group col-md-7">';
            html += '<label class="floating-label-activo-sm">Profesional </label>';
            html += '    <div class="input-group input-group-sm">';
            html += '        <input class="form-control form-control-sm equipo_profesional" type="text" name="equ_quirurgico_profesional_1" id="equ_quirurgico_profesional_1">';
            html += '        <input class="form-control form-control-sm equipo_profesional" type="hidden" name="equ_quirurgico_profesional_id_1" id="equ_quirurgico_profesional_id_1">';
            html += '        <div class="input-group-append">';
            html += '            <button class="btn btn-info" id="btn_registrar_profesional" onclick="guardar_profesional_equipo();"><i class="fa fa-check" aria-hidden="true"></i> Registrar</button>';
            html += '        </div>';
            html += '    </div>';
            html += '</div>';

            html += '<!-- formulario de nuevo profesional -->';
            html += '<div class="form-row col-md-12" id="equ_quirurgico_nuevo" style="display:none">';
            html += '   <div class="form-group col-md-12">';
            html += '       <span style="color:red; font-size:10px">Profesional no registrado, Ingrese información:</span>';
            html += '   </div>';

            html += '   <div class="form-group col-md-3">';
            html += '       <select class="form-control form-control-sm equipo_nuevo_posicion" name="equ_quirurgico_nuevo_posicion_1" id="equ_quirurgico_nuevo_posicion_1">';
            html += '           <option value="">Seleccione</option>';
            html += '           <option value="CIRUJANO">CIRUJANO</option>';
            html += '           <option value="AYUDANTE">AYUDANTE</option>';
            html += '           <option value="ARSENALERO">ARSENALERO</option>';
            html += '           <option value="ANESTESISTA">ANESTESISTA</option>';
            html += '       </select>';
            html += '   </div>';
            html += '   <div class="form-group col-md-3">';
            html += '       <label class="floating-label-activo-sm">Nombre</label>';
            html += '       <input class="form-control form-control-sm equipo_nuevo_profesional_nombre" type="text" name="equ_quirurgico_nuevo_profesional_nombre_1" id="equ_quirurgico_nuevo_profesional_nombre_1">';
            html += '   </div>';
            html += '   <div class="form-group col-md-3">';
            html += '       <label class="floating-label-activo-sm">Apellido</label>';
            html += '       <input class="form-control form-control-sm equipo_nuevo_profesional_apellido" type="text" name="equ_quirurgico_nuevo_profesional_apellido_1" id="equ_quirurgico_nuevo_profesional_apellido_1">';
            html += '   </div>';
            html += '   <div class="form-group col-md-3">';
            html += '       <label class="floating-label-activo-sm">Email</label>';
            html += '       <input class="form-control form-control-sm equipo_nuevo_profesional_email" type="text" name="equ_quirurgico_nuevo_profesional_email_1" id="equ_quirurgico_nuevo_profesional_email_1">';
            html += '   </div>';
            html += '</div>';

            html += '<div class="form-row col-md-12" id="equ_quirurgico_lista_equipo_nuevo" style="display:none">';
            html += '</div>';

            $('.' + div_destino).html(html);

            profesional_autocomplete('equ_quirurgico_profesional_1', 'equ_quirurgico_profesional_id_1', 'equ_quirurgico_nuevo');
        } else if (valor == '0') {
            $('.' + div_destino).html('');
            $('#equ_quirurgico_lista_profesionales_hidden').val('');
            $('.equ_quirurgico_lista_profesionales').val('');
        } else {
            $('.equ_quirurgico_lista_profesionales').val('');
            var html = '';
            $('.' + div_destino).html(html);

            let url = "{{ route('profesional.equipo.ver.profesional') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional_mi_equipo: valor,
                },
            })
            .done(function(resp) {
                console.log(resp);

                if (resp.estado == 1) {
                    var lista_id_profesionales = '';
                    $.each(resp.registros, function(index, value) {
                        html = '';
                        html += '<div class="form-group col-md-6 col-lg-6 col-xl-6">';
                        html += '    <label class="floating-label-activo-sm">' + value.posicion + '</label>';
                        html += '    <input type="text" class="form-control form-control-sm" name="equ_quirurgico_prof_' + index + '" id="equ_quirurgico_prof_' + index + '" value="' + value.profesional.nombre + ' ' + value.profesional.apellido_uno + '">';
                        html += '</div>';
                        lista_id_profesionales += value.id_tipo_especialidad + ',' + value.id_sub_tipo_especialidad + ',' + value.posicion + ',' + value.id_profesional + '|';
                        $('#equ_quirurgico_lista_profesionales_hidden').val(lista_id_profesionales);
                        $('.' + div_destino).append(html);
                    });

                } else {
                    $('.' + div_destino).append('<h5>Sin registro de equipo</h5>');
                    $('#equ_quirurgico_lista_profesionales_hidden').val('');
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
    }

    // Crea un nuevo equipo en la base de datos
    function crear_nuevo_equipo() {
        let nombre = $('#equ_quirurgico_nombre_equipo').val();
        let descripcion = $('#equ_quirurgico_descripcion_equipo').val();
        let url = "{{ route('profesional.equipo.crear') }}";

        let valido = 1;
        let mensaje = '';

        if (nombre == '') {
            valido = 0;
            mensaje += '<li>Nombre del equipo</li>';
        }
        if (descripcion == '') {
            valido = 0;
            mensaje += '<li>Descripción</li>';
        }

        if (lista_profesionales_eq_nuevo.length == 0) {
            valido = 0;
            mensaje += '<li>Profesionales</li>';
        }

        if (valido == 0) {
            swal({
                title: 'Error',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    },
                },
                icon: 'error'
            });

            return;
        }

        let data = {
            nombre: nombre,
            descripcion: descripcion,
            id_profesional: $('#id_profesional_fc').val(),
            profesionales: lista_profesionales_eq_nuevo,
            _token: CSRF_TOKEN,
        }

        console.log(data);

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                if (resp.estado == 1) {
                    swal({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Equipo creado, ahora debe seleccionarlo',
                    });
                    $('#equ_quirurgico_lista_profesionales_hidden').val('');
                    $('.equ_quirurgico_lista_profesionales').html('');
                    cargar_lista_equipos('equ_quirurgico_select_equipo');
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    // Guarda un profesional en el equipo nuevo
    function guardar_profesional_equipo() {
        if ($('#equ_quirurgico_profesional_id_1').val() != '') {
            var posicion_profesional = $('#equ_quirurgico_posicion_1').val();
            var nombre_profesional = $('#equ_quirurgico_profesional_1').val();
            var id_profesional = $('#equ_quirurgico_profesional_id_1').val();

            var temp_profesional = {
                tipo: 'existente',
                posicion: posicion_profesional,
                profesional_nombre: nombre_profesional,
                profesional_apellido: '',
                profesional_email: '',
                profesional_id: id_profesional,
            }

            lista_profesionales_eq_nuevo.push(temp_profesional);
            mostrar_tabla_nuevos_profesionales();
            $('#equ_quirurgico_posicion_1').val('');
            $('#equ_quirurgico_profesional_1').val('');
            $('#equ_quirurgico_profesional_id_1').val('');
        } else {
            var nuevo_posicion = $('#equ_quirurgico_nuevo_posicion_1').val();
            var nuevo_profesional_nombre = $('#equ_quirurgico_nuevo_profesional_nombre_1').val();
            var nuevo_profesional_apellido = $('#equ_quirurgico_nuevo_profesional_apellido_1').val();
            var nuevo_profesional_email = $('#equ_quirurgico_nuevo_profesional_email_1').val();
            var mensaje = '';
            var valido = 1;

            if (nuevo_posicion == '') {
                mensaje += 'Posicion - Campo requerido\n';
                $('#equ_quirurgico_nuevo_posicion_1').focus();
                valido = 0;
            }
            if (nuevo_profesional_nombre == '') {
                mensaje += 'Nombre Profesional - Campo requerido\n';
                $('#equ_quirurgico_nuevo_profesional_nombre_1').focus();
                valido = 0;
            }
            if (nuevo_profesional_apellido == '') {
                mensaje += 'Apellido Profesional - Campo requerido\n';
                $('#equ_quirurgico_nuevo_profesional_apellido_1').focus();
                valido = 0;
            }
            if (nuevo_profesional_email == '') {
                mensaje += 'Email profesional - Campo requerido\n';
                $('#equ_quirurgico_nuevo_profesional_email_1').focus();
                valido = 0;
            }

            if (valido == 1) {
                var temp_profesional = {
                    tipo: 'nuevo',
                    posicion: nuevo_posicion,
                    profesional_nombre: nuevo_profesional_nombre,
                    profesional_apellido: nuevo_profesional_apellido,
                    profesional_email: nuevo_profesional_email,
                }

                lista_profesionales_eq_nuevo.push(temp_profesional);

                mostrar_tabla_nuevos_profesionales();

                $('#equ_quirurgico_nuevo_posicion_1').val('');
                $('#equ_quirurgico_nuevo_profesional_nombre_1').val('');
                $('#equ_quirurgico_nuevo_profesional_apellido_1').val('');
                $('#equ_quirurgico_nuevo_profesional_email_1').val('');
            } else {
                swal({
                    title: "Registro de Equipo.",
                    text: mensaje,
                    icon: "error",
                });
            }
        }
    }

    // Muestra la tabla de profesionales agregados al equipo nuevo
    function mostrar_tabla_nuevos_profesionales() {
        $('#equ_quirurgico_lista_equipo_nuevo').hide();
        $('#equ_quirurgico_lista_profesionales_hidden').val('');
        var html = '';
        $('#equ_quirurgico_lista_equipo_nuevo').html(html);

        if (lista_profesionales_eq_nuevo.length > 0) {
            $('#equ_quirurgico_lista_equipo_nuevo').show();
            $.each(lista_profesionales_eq_nuevo, function(index, value) {
                var lista_id_profesionales = '';
                html = '';
                html += '<div class="form-group col-md-5 col-lg-5 col-xl-5" >';
                html += '    <label class="floating-label-activo-sm">' + value.posicion + '</label>';
                html += '    <input type="text" class="form-control form-control-sm" name="equ_quirurgico_prof_nuevo_' + index + '" id="equ_quirurgico_prof_nuevo_' + index + '" value="' + value.profesional_nombre + ' ' + value.profesional_apellido + '" />';
                html += '</div>';
                html += '<div class="form-group col-md-1 col-lg-1 col-xl-1" >';
                html += '<button type="button" class="btn btn-xs btn-danger has-ripple aling-right" style="" onclick="eliminar_nuevo_profesional(' + index + ')"><i class="feather icon-x" aria-hidden="true"></i><span class="ripple ripple-animate"></span></button>';
                html += '</div>';
                $('#equ_quirurgico_lista_equipo_nuevo').append(html);
                lista_id_profesionales += value.id_tipo_especialidad + ',' + value.id_sub_tipo_especialidad + ',' + value.posicion + ',' + value.id_profesional + '|';
                $('#equ_quirurgico_lista_profesionales_hidden').val(lista_id_profesionales);
            });
        }
    }

    // Elimina un profesional de la lista temporal del equipo nuevo
    function eliminar_nuevo_profesional(index) {
        lista_profesionales_eq_nuevo.splice(index, 1);
        mostrar_tabla_nuevos_profesionales();
    }

    // Autocomplete para búsqueda de profesionales
    function profesional_autocomplete(input, hidden_input, div_nuevo) {
        $("#" + input).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('profesional.buscar.por.nombre.autocomplete') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#' + input).val(ui.item.label);
                $('#' + hidden_input).val(ui.item.value);
                $('#' + div_nuevo).hide();
                return false;
            }
        });
    }
</script>
