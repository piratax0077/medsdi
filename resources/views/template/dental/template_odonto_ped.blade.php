<!DOCTYPE html>
<html lang="es">

<head>
    @include('atencion_odontologica.include.head_od_odpediatria')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Links del REG-->
    <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}?t={{ time() }}">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">

        <!-- select2 selectbonito css -->
        <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">

            <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/dropzone.css" type="text/css" /> -->

    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}?t={{ time() }}">

    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}?t={{ time() }}">

    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}?t={{ time() }}">

    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}?t=<?= time() ?>">

    <!--Bs-Canvas-->
    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}?t={{ time() }}">

    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}?t=<?= time() ?>">

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!--formulario sm-->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
    {{--  /** agregar css */  --}}
    <!--cara dental-->
    <link rel="stylesheet" href="{{ asset('css/cara_dental.css') }}">

    <style>
        .ui-front {
            position: absolute;
            z-index: 2006;
            overflow: auto;
        }

    </style>
    @yield('css-btn-autorizacion')
    @yield('styles')
</head>
<body>
    
    @include('template.header')
    @include('template.menuProfesional')
    @include('atencion_odontologica.generales.eval_periimplante')
    @yield('Content')

    <!-- Modal de la vista -->
    @yield('Modals')
    @yield('Modals-med-exa')
    @yield('Modals-med-exa-esp')
    @yield('modal-ficha-general-espc')



    <!-- Modal de la vista fin -->
    <footer>
        {{--  @include('template.include.footer')  --}}
    </footer>


    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/documentos.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

    <script src="{{ asset('js/sidebar.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Tablas-->
    <script src="{{ asset('js/tablas_fmu.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/tabla_atenciones_medicas_previas.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/tablas_control_cronicos.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="{{ asset('js/recetas_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/licencias_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>


    <!--Formularios Modals-->
    <script src="{{ asset('js/modals_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <!--Formularios Modals-->
    <script src="{{ asset('js/modals_atencion_odonto_gral.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

    <!--Tooltips-->
    <script src="{{ asset('js/tooltip_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Check-->
    <script src="{{ asset('js/check_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>
    <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

    <!-- mensajes -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

   {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>

    {{--  @include('template.templateAutorizacion')  --}}


    <!-- form-advance custom js -->
    {{--  <script src="{{ asset('js/pages/form-advance-custom.js') }}?upd={{ random_int(1111,9999) }}"></script>  --}}

    <!--Apgar-->
    <script src="{{ asset('js/aicalc2.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Botón cards-->
    <script src="{{ asset('js/btn-cards.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Modals Sidebar derecho-->
    <script src="{{ asset('js/modals_sidebar_esp.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Tablas y Toggle atención ginecobstetrica-->
    <script src="{{ asset('js/atencion_especialidades.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/cara_dental.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script>
        window.getDiagnosticoDentalUrl = "{{ route('dental.getDiagnosticoDental') }}";
        // window.getTratamientoDentalImplantologiaUrl = "{{ route('dental.getTratamientoImplantologia') }}";
    </script>
    @routes
    <script src="{{asset('js/dental/tratamientos_dental.js')}}"></script>
    <script>
        const GUARDAR_PIEZA_URL = "{{ route('dental.guardar_pieza_periodonto') }}";
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
        $("#nombre_medicamento_ficha_dental").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('medicamentos.get') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.length == 0) {
                            $('#rec1 .medicamento_activo').hide();
                            $('#rec1 .medicamento_inactivo').show();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        } else {
                            $('#rec1 .medicamento_activo').show();
                            $('#rec1 .medicamento_inactivo').hide();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            // $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                console.log(ui.item);
                // Set selection
                $('#nombre_medicamento_ficha_dental').val(ui.item
                .label); // display the selected text
                $('#id_medicamento_ficha_dental').val(ui.item.value); // save selected id to input
                $('#nombre_composicion_farmaco').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control').val(ui.item.control); // save selected id to input
                if (ui.item.control == 1 || ui.item.control == 1 || ui.item.control == 2 || ui.item
                    .control == 3 || ui.item.control == 4 || ui.item.control == 5)
                    $('#mensaje_med_control').html(
                        'Este Paciente ha tenido 3 Recetas retenidas este año<br>Consulte en "Ranking de recetas controladas del paciente"'
                        );
                else
                    $('#mensaje_med_control').html('');

                return false;
            }
        });
        $('#tipo_examen').change(function(e) {
            console.log('tipo examen examen comun');
            e.preventDefault();
            tipo_examen = $('#tipo_examen').val();

            $("#sub_tipo_examen").empty();
            $("#examen").empty();
            $.ajax({
                    url: 'https://med-sdi.cl/api/Ficha_atencion_sub_tipo',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        tipo_examen: tipo_examen
                    },
                })
                .done(function(response) {

                    $('#sub_tipo_examen').append(
                        `<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#sub_tipo_examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                    }

                    /** ACTIVAR CHECHBOK DE CON  CONTRASTE */
                    if ($('#tipo_examen').val() == 354) $('#imagenologia_con_contraste').removeAttr(
                        'disabled');
                    else $('#imagenologia_con_contraste').attr('disabled', 'disabled');
                })
                .fail(function() {
                    console.log("error");
                })

        });


        $('#sub_tipo_examen').change(function(e) {

            e.preventDefault();
            sub_tipo_examen = $('#sub_tipo_examen').val();

            $("#examen").empty();
            $.ajax({
                    url: "{{ route('examen.medico.get') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        sub_tipo_examen: sub_tipo_examen
                    },
                })
                .done(function(response) {

                    $('#examen').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });


        $('#imagenologia_con_contraste').change(function() {
            if ($('#imagenologia_con_contraste').is(':checked')) {
                $('#mensaje_imagenologia_con_contraste').show();
            } else {
                $('#mensaje_imagenologia_con_contraste').hide();
            }

        });
    });
        $(document).ready(function () {
            $('#selectDestinatarios').select2({
                tags: true,
                width: '100%',
                placeholder: 'Selecciona o ingresa correos',
                dropdownParent: $('#modalEnviarPresupuesto')
            });
            $('.tratamiento-urg-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getDiagnosticoDentalUrg') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $(this).next('input[type="hidden"]').val(ui.item
                    .value); // Asigna el valor al input hidden correspondiente
                    return false;
                }
            });
        });
            {{--  mensaje de exito al registrar ficha clinica  --}}
             @if(session('mensaje'))
                swal({
                    title: "Registro de Ficha Clínica.",
                    text:"{{ session('mensaje') }}",
                    icon: "info",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif
            {{--  mensaje de exito al registrar ficha clinica  --}}
            @if(session('success'))
                swal({
                    title: "Registro de Ficha Clínica.",
                    text:"{{ session('success') }}",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

			{{--  mensaje de erro al registrar ficha clinica  --}}
			@if(session('error'))
				swal({
					title: "Registro de Ficha Clínica.",
					text:"{{ session('error') }}",
					icon: "error",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
			@endif

			{{--  mensaje de warning al registrar ficha clinica  --}}
			@if(session('warning'))
				swal({
					title: "Registro de Ficha Clínica.",
					text:"{{ session('warning') }}",
					icon: "warning",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
			@endif
            
$('#motivo_urg_odped').select2();
            
        });

        function abrir_modal_clasificacion_colon(){
            $('#m_clasificacion').modal('show');
        }
        function mostrar_modal_ex_rx_cirugia(){
            $('#modal_indicar_examen_rx').modal('show');
        }
        var formatoMoneda = (valor) => {
            return valor.toLocaleString('es-CL', {
                style: 'currency',
                currency: 'CLP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).replace(/\./g, ',').replace(/,/g, '.');
        };
        function anestesia_local_dental() {

            $('#procedimiento_anestesia_ficha_atencion').val('');
            $('#lugar_anestesia_ficha_atencion').val('');
            $('#rut_anestesia_ficha_atencion').val('');
            $('#tratamiento_anestesia_ficha_atencion').val('');
            $('#form_antecedente_anestesia').trigger("reset");

            //$('#modal_anestesia').modal('show');
            $('#anestesia_local_modal').modal('show');
        }

        function hemorragia_dental() {

            $('#form_antecedente_hemorragia').trigger("reset");
            $('#procedimiento_hemorragia_ficha_atencion').val('');
            $('#lugar_hemorragia_ficha_atencion').val('');
            $('#rut_hemorragia_ficha_atencion').val('');
            $('#tratamiento_hemorragia_ficha_atencion').val('');
            $('#hemorragias_modal').modal('show');
        }

        function fractura_dental() {

            $('#form_antecedente_fractura').trigger("reset");
            $('#procedimiento_fractura_ficha_atencion').val('');
            $('#lugar_fractura_ficha_atencion').val('');
            $('#rut_fractura_ficha_atencion').val('');
            $('#tratamiento_fractura_ficha_atencion').val('');
            $('#fracturas_modal').modal('show');
        }
	</script>
    <script>
        $('#paciente_piezas_dentales_ex_odped').on('change', function () {
                const piezasSeleccionadas = $(this).val() || [];
                console.log(piezasSeleccionadas);
                // Recorre todas las piezas visuales
                $('.pieza_odped').each(function () {
                    const piezaNumero = $(this).data('pieza_odpediat').toString();
                    console.log(piezaNumero);
                    if (piezasSeleccionadas.includes(piezaNumero)) {
                        $(this).addClass('seleccionada');
                    } else {
                        $(this).removeClass('seleccionada');
                    }
                });
            });
        /** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function  envio_indicaciones_pdf(id_modal){
            let url = "{{ route('indicacion.medica.registro.envio') }}";
            var id_tipo_documento = 1;
            var id_paciente = $('#id_paciente_fc').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var observacion = '';
            // var observacion = $('#observacion').val();
            var documento = '';
            var url_documento = '';
            var cuerpo = '';
            var otro = '';
            var token = CSRF_TOKEN;

            if(id_tipo_documento == 1)
            {
                documento = $('#'+id_modal+' embed').attr('data-documento');
                url_documento = $('#'+id_modal+' embed').attr('data-url');
            }
            else
            {
                // cuerpo = $('#cuerpo').val();
            }
            var datos = {};
            datos._token = token;
            datos.id_tipo_documento = id_tipo_documento;
            datos.id_paciente = id_paciente;
            datos.id_profesional = id_profesional;
            datos.id_ficha_atencion = id_ficha_atencion;
            datos.id_lugar_atencion = id_lugar_atencion;
            datos.observacion = observacion;
            datos.documento = documento;
            datos.url = url_documento;
            datos.cuerpo = cuerpo;
            datos.otro = otro;

            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: datos,
                success: function(data) {
                    // console.log(data);
                    if(data.estado == 1)
                    {
                        var mensaje = '';
                        mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                        if(data.update_correo.estado == 1)
                            mensaje = 'Documento enviado por correo al Paciente.\n';
                        else
                            mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: mensaje,
                            icon: "success",
                        });
                    }
                    else
                    {
                        var texto_error = '';

                        if(data.estado ==  0)
                        {
                            if('error' in data)
                            {
                                $.each(data.error, function (indexInArray, valueOfElement) {
                                    texto_error += indexInArray+': '+valueOfElement+'\n';
                                });
                            }
                        }
                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });
                    }
                }
            });
        }
        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
         function eliminar_odontograma(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar esta información.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    confirmar_eliminar_odontograma(willDelete, id);
                })
        }

        function confirmar_eliminar_odontograma(willDelete, id) {
            if (willDelete) {
                let url = "{{ route('dental.eliminar_odontograma') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        ids: [id],
                        id_paciente: $('#id_paciente_fc').val(),
                        id_ficha_atencion: $('#id_fc').val(),
                        id_lugar_atencion: $('#id_lugar_atencion').val(),
                        tipo: 'odped',
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            swal({
                                title: 'Odontograma',
                                text: response.mensaje,
                                icon: 'success'
                            });

                            let odontograma = response.odontograma_paciente;
                            odontograma_global = odontograma;
                            let table_odped_ = $('#table_odontograma').DataTable();

                            // Vacía la tabla
                            table_odped_.clear();

                            // Genera los datos (array de arrays o de objetos si usas columns)
                            let data = [];

                            odontograma.forEach(function(odonto) {
                                let switchPresupuesto = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="presupuestoCheck${odonto.id}"
                                            value="${odonto.id}" ${odonto.presupuesto == 1 ? 'checked' : ''}
                                            onchange="togglePresupuesto(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="presupuestoCheck${odonto.id}"></label>
                                    </div>
                                `;

                                let switchSeleccion = `
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input checkbox-seleccion"
                                            id="seleccionCheck${odonto.id}" value="${odonto.id}"
                                            onchange="toggleSeleccion(${odonto.id}, this.checked)">
                                        <label class="custom-control-label" for="seleccionCheck${odonto.id}"></label>
                                    </div>
                                `;

                                data.push([
                                    odonto.fecha,
                                    odonto.tratamiento,
                                    odonto.caras,
                                    odonto.pieza,
                                    odonto.diagnostico,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    switchPresupuesto,
                                    switchSeleccion
                                ]);
                            });

                            // Agrega las nuevas filas
                            table_odped_.rows.add(data).draw();
                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            $('#table_trabajos_presupuesto tbody').empty();
                            // id que representa el select de piezas post implante
                            $('#numero_pieza_post_impl2000').empty();
                            // id que representa el select de piezas pre implante
                            $('#numero_pieza_tto_impl1000').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(odonto.valor)} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                                    $('#numero_pieza_post_impl2000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                    $('#numero_pieza_tto_impl1000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                }
                            });
                            let valores_boca_general = response.valores[0];
                            let valores_odontograma = response.valores[1];
                            let valores_insumos = response.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(valores_odontograma));
                            $('#total_clinico').val(formatoMoneda(valores_odontograma));
                            $('#total_presupuesto_dental').val(total_general);
                            $('#total_presupuesto').val(formatoMoneda(total_general));
                            $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                                valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                                total_general));
                            $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));
                            $('#odon_adults').empty();
                            $('#odon_adults').append(response.odontograma_paciente_vista);

                            let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                            table_odon_gral.clear().draw();

                            odontograma.forEach(function(pieza) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_odon_gral.row.add([
                                    pieza.pieza,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>'

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            });

                            let table_odped = $('#table_piezas_presupuesto_odped').DataTable();
                            table_odped.clear().draw();

                            odontograma.forEach(function(pieza) {
                                    if(pieza.estado == 0){
                                        var estado = 'PENDIENTE';
                                    }else if(pieza.estado == 1){
                                        var estado = 'TERMINADO';
                                    }else if(pieza.estado == 2){
                                        var estado = 'EN PROCESO';
                                    }else{
                                        var estado = 'CITADO A CONTROL';
                                    }
                                    if (pieza.presupuesto == 1 && pieza.urgencia == 0) {
                                        // Agregar una nueva fila a la tabla
                                        let rowNode = table_odped.row.add([
                                            pieza.pieza,
                                            pieza.diagnostico,
                                            pieza.descripcion,
                                            formatoMoneda(formatoMoneda(pieza.valor)),
                                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                            pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                            '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                            pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                            estado

                                        ]).draw(false).node(); // Obtener el nodo de la fila
                                    }
                            });

                            let table = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });

                            $('#table_pagos_reasignar_odontograma tbody').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                    $('#table_pagos_reasignar_odontograma tbody').append(fila);
                                }
                            });
                            let count = $('#random_preimpl').val();
                            let count_post_impl = $('#random_postimpl').val();
                            $('#numero_pieza_tto_impl' + count).empty();
                            $('#numero_pieza_post_impl' + count).empty();
                            odontograma.forEach(o => {
                                if (o.presupuesto == 1) {
                                    $('#numero_pieza_tto_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                    $('#numero_pieza_post_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                }

                            });
                             // Obtener piezas únicas
                            const piezasUnicas = [...new Set(odontograma.map(item => item.pieza))];

                            // Seleccionar el <select> y actualizar sus valores
                            const piezasSelect = $('#paciente_piezas_dentales_ex_impl');
                            piezasSelect.val(piezasUnicas).trigger('change');

                            // Marcar visualmente las piezas en el odontograma
                            piezasUnicas.forEach(pieza => {
                                $(`.pieza_implantologia[data-pieza_impl="${pieza}"]`).addClass('seleccionada');
                            });
                            // Escuchar cambios en el Select2 para actualizar el odontograma visual
                            piezasSelect.on('change', function () {
                                const piezasSeleccionadas = $(this).val() || [];

                                // Recorre todas las piezas visuales
                                $('.pieza_implantologia').each(function () {
                                    const piezaNumero = $(this).data('data-pieza_impl').toString();

                                    if (piezasSeleccionadas.includes(piezaNumero)) {
                                        $(this).addClass('seleccionada');
                                    } else {
                                        $(this).removeClass('seleccionada');
                                    }
                                });
                            });

                             // Obtener piezas únicas
                            const piezasUnicas_od_gral = [...new Set(odontograma.map(item => item.pieza))];

                            // Seleccionar el <select> y actualizar sus valores
                            const piezasSelectOdGral = $('#paciente_piezas_dentales_ex');
                            piezasSelectOdGral.val(piezasUnicas_od_gral).trigger('change');

                            // Marcar visualmente las piezas en el odontograma
                            piezasUnicas_od_gral.forEach(pieza => {
                                $(`.pieza[data-pieza="${pieza}"]`).addClass('seleccionada');
                            });
                            // Escuchar cambios en el Select2 para actualizar el odontograma visual
                            piezasSelectOdGral.on('change', function () {
                                const piezasSeleccionadas = $(this).val() || [];

                                // Recorre todas las piezas visuales
                                $('.pieza').each(function () {
                                    const piezaNumero = $(this).data('pieza').toString();

                                    if (piezasSeleccionadas.includes(piezaNumero)) {
                                        $(this).addClass('seleccionada');
                                    } else {
                                        $(this).removeClass('seleccionada');
                                    }
                                });
                            });
                            $('#odontograma_ped_completo').empty();
                            $('#odontograma_ped_completo').append(response.odontograma_paciente_vista);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } 

        }
    </script>
    @yield('js_inferior')
    @yield('page-script')
    @yield('page-script-ficha-atencion'){{-- ficha_orl.blade --}}
    @yield('js-ficha-general-espc') {{-- seccion js fiche general especialidad --}}
    @yield('page-script-med-exa') {{--  seccion receta y exmaenes --}}
    @yield('page-script-med-exa-esp') {{-- seccion receta y exmaenes especiales --}}
    @yield('js-sidebar') {{-- seccion js side bar --}}
    @yield('js-lic') {{-- seccion js side bar --}}
	@yield('page-script-btn-autorizacion')
</body>

</html>
