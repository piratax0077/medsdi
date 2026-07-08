
@extends('template.hospitalizados.hospitalizados')


@section('head')
    @include('template.hospitalizados.include.head_hospital_clinica')
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
@endsection

@section('header')
    @include('template.hospitalizados.include.header_hospitalizados')
@endsection

{{--  @section('menu')
    @include('page.administrativo.include.menu')
@endsection  --}}
@section('Content')

<style>
    .user-profile .profile-tabs {
        margin-top: 0px!important;
    }
        .imagen_rx {
            width: 200px;
            height: 200px;
        }

        .ui-autocomplete {
            z-index: 9999999 !important;
            position: absolute;
        }

</style>

    <!--Container Completo-->
    <div class="pcoded-main-container pcoded-main-container-urgencia" style="">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN MÉDICA PACIENTE HOSPITALIZADO</strong></h5>
                                <p class="font-weight-bold mt-0 mb-0 text-white">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1" onclick="finalizar_atencion('{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}')">Finalizar atención</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row pt-4 bg-gris user-profile user-card mb-4">
                {{--  fmu  --}}
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    @include('general.secciones_ficha.fmu_sm')
                </div>

                {{--  ficha  --}}
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <!-- TAB ATENCIÓN -->
                    <div class="row">
                        <div class="col-md-12 px-2">
                            <div class="card-informacion rounded" style="background-color:#fff!important ;">
                                <ul class="nav nav-tabs profile-tabs nav-fill" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Evolución Médica</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="evol_proc-tab" data-toggle="tab" href="#evol_proc" role="tab" aria-controls="evol_proc" aria-selected="false">Evoluciones y procedimientos </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="band_exam-tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                    </li>
                                    @if(!$enfermera)
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="hospitalizacion" aria-selected="false">Pabellón-Documentos alta</a>
                                    </li>
                                    @endif
                                    {{-- <li class="nav-item">
                                        <a class="nav-link text-reset " id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false">Licencia</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- CIERRE: TAB ATENCIÓN -->
                    <!--CONTENIDO DE TAB-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content" id="at-hospital">
                                <!--Licencia-->
                                {{-- <div class="tab-pane fade show " id="licencia" role="tabpanel" aria-labelledby="licencia-tab
                                ">
                                    @include('general.secciones_ficha.licencia')
                                </div> --}}
                                <!--Atenciones previas-->
                                <div class="tab-pane fade show" id="evol_proc" role="tabpanel" aria-labelledby="evol_proc-tab">
                                    <div class="card-a">
                                        <div class="card-header-a">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple">Evoluciones y Procedimientos realizados</button>
                                        </div>
                                        <div class="card-body-aten-a">
                                            <div class="form-row">
                                                <!--<div class="col-12">
                                                    <h6 class="t-modal mb-2">Resumen de tratamiento y control Enfermería</h6>
                                                </div>-->
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="resumen_tto_enf">Resumen de tratamiento y control Enfermería</i></label>
                                                        <textarea class="form-control form-control-sm"  rows="10"  onfocus="this.rows=15" onblur="this.rows=10;" name="resumen_tto_enf" id="resumen_tto_enf" readonly>{{ $resumen_recetas ?? 'No hay tratamientos registrados' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="observaciones">Observaciones</label>
                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="observaciones" id="observaciones"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-12 mb-3">
                                                    <button class="btn btn-danger btn-sm float-right" onclick="generar_pdf_resumen_tto_enf()"><i class="fas fa-file-pdf"></i> Generar PDF</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                 <!--Exámenes-->
                                 <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
                                    @include('general.secciones_ficha.bandeja_examenes')
                                </div>

                                <!--Atender paciente-->
                                <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                                    @include('general.secciones_ficha.hospitalizados.evoluc_medica_hospitalizado')
                                </div>
                                  <!--Hospitalización-->
                                <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                                    @include('general.hospitalizacion.hospitalizacion_documentos')
                                </div>
                            </div>
                        </div>
                        @if(!$enfermera)
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                        @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                        <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--CIERRE: CONTENIDO DE TAB-->
                </div>
            </div>
            <input type="hidden" name="id_fc" id="id_fc" value="{{ $fichaAtencion->id }}">
            <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
            <input type="hidden" name="id_paciente_fc" id="id_paciente_fc" value="{{ $paciente->id }}">
            <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugar_atencion->id }}">
            <input type="hidden" name="id_profesional_fc" id="id_profesional_fc" value="{{ $profesional->id }}">
            <input type="hidden" name="id_evolucion_editar_hosp" id="id_evolucion_editar_hosp" value="">

        </div>
    </div>

    <!-- MODAL AGREGAR INSUMOS -->
    <div class="modal fade" id="modalAgregarInsumos" tabindex="-1" role="dialog" aria-labelledby="modalAgregarInsumos" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Agregar insumos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group m-t-10">
                                        <label class="floating-label-activo-sm" for="insumo">Insumo</label>
                                        <input type="text" class="form-control form-control-sm" id="insumo" name="insumo">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group m-t-10">
                                        <label class="floating-label-activo-sm" for="cantidad">Cantidad</label>
                                        <input type="text" class="form-control form-control-sm" id="cantidad" name="cantidad">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group m-t-10">
                                        <label class="floating-label-activo-sm" for="observaciones">Observaciones</label>
                                        <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(isset($enfermera))
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- CIERRE: MODAL AGREGAR INSUMOS -->
    <!-- MODAL EDITAR EVOLUCION PROFESIONAL -->
    <div class="modal fade" id="modalEditarEvolucionProfesionalHosp" tabindex="-1" role="dialog" aria-labelledby="modalEditarEvolucionProfesionalHosp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Editar evolución médica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group m-t-10">
                                <label class="floating-label-activo-sm" for="editar_evolucion_hosp_textarea">Evolución médica</label>
                                <textarea class="form-control form-control-sm" id="editar_evolucion_hosp_textarea" name="editar_evolucion_hosp_textarea" rows="4" onfocus="this.rows=6" onblur="this.rows=4;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(isset($enfermera))
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="modificar_evolucion_profesional_hosp()">Guardar cambios</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- CIERRE: MODAL EDITAR EVOLUCION PROFESIONAL -->
    <!-- MODAL OBSERVACIONES CURACION -->
    <div class="modal fade" id="modalObservacionesCuracion" tabindex="-1" role="dialog" aria-labelledby="modalObservacionesCuracion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Agregar Observaciones a <span id="procedimiento_curacion"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group m-t-10">
                                <label class="floating-label-activo-sm" for="observaciones_curacion">Observaciones</label>
                                <textarea class="form-control form-control-sm" id="observaciones_curacion" name="observaciones_curacion" rows="4" onfocus="this.rows=6" onblur="this.rows=4;"></textarea>
                                <input type="hidden" name="id_curacion" id="id_curacion" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(isset($enfermera))
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="guardarObservacionesCuracion()">Guardar cambios</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- CIERRE: MODAL OBSERVACIONES CURACION -->
     @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_hda')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.curaciones_guia')
         @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.pie_diab')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.pie_diab_guia')
        @include('app.adm_hospital.servicios.enfermera.modal_enfermeria.quemados')

    @if(isset($enfermera) && !$enfermera)
    @include('app.profesional.modales.boton_flotante_agenda_autorizacion')
    @endif
@endsection

@section('page-script')
<script>
// Desactivar auto-discover INMEDIATAMENTE después de cargar Dropzone
    Dropzone.autoDiscover = false;


     $(document).ready(function() {
        {{--  MEDICAMENTOS  --}}
        $("#nombre_medicamento_ficha_dental").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        if( data.length == 0 )
                        {
                            $('.medicamento_activo').hide();
                            $('.medicamento_inactivo').show();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        }
                        else
                        {
                            $('.medicamento_activo').show();
                            $('.medicamento_inactivo').hide();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#nombre_medicamento_ficha_dental').val(ui.item.label); // display the selected text
                $('#id_medicamento_ficha_dental').val(ui.item.value); // save selected id to input
                $('#nombre_composicion_farmaco').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control').val(ui.item.control); // save selected id to input
                if(ui.item.control == 1 || ui.item.control == 1 || ui.item.control == 2 || ui.item.control == 3 || ui.item.control == 4 || ui.item.control == 5 )
                    $('#mensaje_med_control').html('Este Paciente ha tenido 3 Recetas retenidas este año<br>Consulte en "Ranking de recetas controladas del paciente"');
                else
                    $('#mensaje_med_control').html('');

                return false;
            }
        });

        $('#nom_medic_adm').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#nom_medic_adm').val(ui.item.label); // display the selected text
                $('#id_medicamento_adm_enf').val(ui.item.value); // save selected id to input
                return false;
            }
        })

        {{--  mostrar ocultar mensaje de medicamento de uso cronico en receta de ficha  --}}
        $('#medicamento_uso_cronico').change(function(){
            if($('#medicamento_uso_cronico').is(':checked') )
            {
                $('#mensaje_uso_cronico').show();
            }
            else
            {
                $('#mensaje_uso_cronico').hide();
            }
        });

        {{--  mostrar ocultar mensaje de medicamento de uso cronico en receta de ficha  --}}
        $('#manual_medicamento_uso_cronico').change(function(){
            if($('#manual_medicamento_uso_cronico').is(':checked') )
            {
                $('#manual_mensaje_uso_cronico').show();
            }
            else
            {
                $('#manual_mensaje_uso_cronico').hide();
            }

        });

$('#tipo_examen_d').change(function(e) {
                e.preventDefault();
                tipo_examen = $('#tipo_examen_d').val();

                $("#sub_tipo_examen_d").empty();
                $("#examen_d").empty();
                $.ajax({
                        url: '{{ route('listar.sub_tipo_examen') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            tipo_examen: tipo_examen
                        },
                    })
                    .done(function(response) {

                        $('#sub_tipo_examen_d').append(
                            `<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#sub_tipo_examen_d').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }

                        /** ACTIVAR CHECHBOK DE CON  CONTRASTE */
                        if($('#tipo_examen_d').val() == 362) $('#imagenologia_con_contraste_d').removeAttr('disabled');
                        else  $('#imagenologia_con_contraste_d').attr('disabled','disabled');
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            {{--  buscar examenes por el sub tipo de examen  --}}
            $('#sub_tipo_examen_d').change(function(e) {

                e.preventDefault();
                sub_tipo_examen = $('#sub_tipo_examen_d').val();

                $("#examen_d").empty();
                $.ajax({
                        url: '{{ route("listar.examen") }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            sub_tipo_examen: sub_tipo_examen
                        },
                    })
                    .done(function(response) {

                        $('#examen_d').append(
                            `<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#examen_d').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            {{--  mostrar ocultar mensaje de examenes de radiologia con contraste --}}
            $('#imagenologia_con_contraste_d').change(function(){
                if($('#imagenologia_con_contraste_d').is(':checked') )
                {
                    $('#mensaje_imagenologia_con_contraste_d').show();
                }
                else
                {
                    $('#mensaje_imagenologia_con_contraste_d').hide();
                }

            });

        // $('#tabla_cont_ciclo').DataTable({
        //     "language": {
        //         "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        //     },
        //     "order": [[ 0, "desc" ]]
        // });

        $('#tabla_med_adm_hosp').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "order": [[ 0, "desc" ]]
        });

        $('#tabla_medicamento_cirugia_sdi_enfermera_adm').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "order": [[ 2, "desc" ]], // Ordenar por columna Repeticiones (primera columna visible)
            "autoWidth": false,
            "responsive": false,
            "columnDefs": [
                {
                    "targets": [0, 1, 4, 5, 6, 7], // Columnas ocultas
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": '_all',
                    "className": "text-center align-middle"
                }
            ],
            "initComplete": function(settings, json) {
                // Ajustar el ancho de las columnas después de inicializar
                this.api().columns.adjust().draw();
            }
        });

        $('#tabla_evol_hosp').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "order": [[ 0, "desc" ]]
        });

        $('#tabla_curaciones_servicio').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "order": [[ 0, "desc" ]]
        });

        $('#tabla_examen_cirugia').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "order": [[ 0, "desc" ]],
            "autoWidth": false,
            "responsive": false,
            "columnDefs": [
                {
                    "targets": [0, 1],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": '_all',
                    "className": "text-center align-middle"
                }
            ]
        });



        {{--  DROPZONE RECETA ENFERMERIA  --}}

        // Escuchar cuando se haga clic en la pestaña de tratamientos externos
        $(document).on('click', '#tto_pendiente_externo_tab', function() {
            console.log("Click en pestaña Tto. Externos");

            // Esperar un momento a que la pestaña se muestre completamente
            setTimeout(function() {
                inicializarDropzoneRecetaEnf();
            }, 100);
        });

        // También escuchar el evento shown.bs.tab
        $('a[href="#tto_pendiente_externo"]').on('shown.bs.tab', function (e) {
            console.log("Pestaña Tto. Externos mostrada");
            inicializarDropzoneRecetaEnf();
        });
    });

    // Variable global para el dropzone (fuera del document.ready)
    var myDropzone_receta_enf = null;

    // Función para inicializar el dropzone
    function inicializarDropzoneRecetaEnf() {
        console.log("Intentando inicializar Dropzone receta enfermería...");

        // Verificar que el elemento exista
        if ($("#dropzone_receta_enf").length === 0) {
            console.log("Elemento #dropzone_receta_enf NO encontrado");
            return;
        }

        console.log("Elemento #dropzone_receta_enf encontrado");

        var dropzoneElement = document.querySelector("#dropzone_receta_enf");

        // Si ya existe una instancia, no crear otra
        if (dropzoneElement && dropzoneElement.dropzone) {
            console.log("Dropzone ya inicializado");
            return;
        }

        console.log("Creando nueva instancia de Dropzone...");

        try {
            myDropzone_receta_enf = new Dropzone("#dropzone_receta_enf", {
                url: "{{ route('profesional.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                acceptedFiles: "image/*,application/pdf",
                maxFilesize: 4,
                maxFiles: 5,
                dictDefaultMessage: "Arrastre la imagen de la receta aquí o haga clic para subir.",
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos.",
                dictFileTooBig: "El archivo es demasiado grande. Tamaño máximo: 4 MB.",
                dictInvalidFileType: "No puede subir archivos de este tipo. Solo imágenes y PDF.",
                dictCancelUpload: "Cancelar carga",
                dictUploadCanceled: "Subida cancelada.",
                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
                dictRemoveFile: "Eliminar archivo",
                dictMaxFilesExceeded: "No puede cargar más archivos. Máximo 5 archivos.",
                init: function() {
                    console.log("Dropzone inicializado correctamente");

                    this.on("success", function(file, response) {
                        console.log("Archivo subido exitosamente:", response);
                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-success");
                        }
                        // Guardar el nombre del archivo en un input hidden si es necesario
                        if (response.nombre_archivo) {
                            // Puedes agregar aquí lógica para guardar el nombre del archivo
                            console.log("Nombre del archivo:", response.nombre_archivo);
                        }
                    });

                    this.on("error", function(file, message) {
                        console.error("Error al subir archivo:", message);
                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-error");
                            if (typeof message !== "string" && message.error) {
                                message = message.error;
                            } else if (typeof message === "object" && message.message) {
                                message = message.message;
                            }
                            for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                                node.textContent = message;
                            }
                        }
                    });

                    this.on("removedfile", function(file) {
                        console.log("Archivo eliminado:", file.name);
                        // Aquí puedes agregar lógica para eliminar el archivo del servidor si es necesario
                    });
                }
            });
        } catch(error) {
            console.error("Error al crear Dropzone:", error);
        }
    }

    function generar_pdf_resumen_tto_enf(){
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente').val();
        let resumen_text = $('#resumen_tto_enf').val();
        let observaciones = $('#observaciones').val();

        // Validar que haya datos
        if(!id_paciente || !resumen_text || resumen_text.trim() === '' || resumen_text === 'No hay tratamientos registrados'){
            swal({
                title: "Error",
                text: "No hay información de tratamientos para generar el PDF",
                icon: "warning",
                button: "Aceptar",
            });
            return;
        }

        let url = "{{ route('profesional.generar_pdf_resumen_evoluciones_hosp') }}";
        let data = {
            id_ficha_atencion: id_ficha_atencion,
            id_paciente: id_paciente,
            resumen_text: resumen_text,
            observaciones: observaciones,
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.ruta){
                    // Abrir el PDF en una nueva pestaña
                    window.open(response.ruta, '_blank');
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al generar el PDF del resumen de evoluciones",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error){
                swal({
                    title: "Error",
                    text: "Ocurrió un error al generar el PDF del resumen de evoluciones",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }

    function eliminar_examen_ficha(id){
        swal({
            title: "Eliminar examen",
            text: "¿Está seguro que desea eliminar este examen?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                let url = "{{ route('examen.eliminar_examen_cirugia') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        id: id,
                        id_paciente: $('#id_paciente').val(),
                        id_ficha_atencion: $('#id_fc').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response){
                        console.log(response);
                        if(response.estado == 'success'){
                            swal({
                                title: "Éxito",
                                text: "Examen eliminado correctamente",
                                icon: "success",
                                button: "Aceptar",
                            }).then((value) => {
                                let examenes = response.examenes;
                                let tabla = $('#tabla_examen_cirugia').DataTable();
                                let tabla_enfermeria = $('#tabla_examen_cirugia_enfermeria').DataTable();
                                tabla_enfermeria.clear().draw();
                                tabla.clear().draw();
                                examenes.forEach(function(examen){
                                    let datos = examen.datos_examen || {};
                                    let contraste = datos.imagenologia_con_contraste ? 'Sí' : 'No';

                                    tabla.row.add([
                                        examen.id,
                                        datos.examen || '',
                                        datos.examen || '',
                                        datos.lado || 'N/A',
                                        datos.tipo_examen || 'N/A',
                                        datos.prioridad || 'N/A',
                                        contraste,
                                        `<button class="btn btn-danger btn-sm" onclick="eliminar_examen_ficha(${examen.id})"><i class="fa fa-trash"></i></button>`
                                    ]).draw();

                                    tabla_enfermeria.row.add([
                                        examen.id,
                                        datos.examen || '',
                                        datos.examen || '',
                                        datos.lado || 'N/A',
                                        datos.tipo_examen || 'N/A',
                                        datos.prioridad || 'N/A',
                                        contraste,
                                        `<div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="examen_paciente_hosp${examen.id}" onchange="cambiarEstadoExamen(${examen.id})" class="success" ${examen.estado == 1 ? 'checked' : ''}>
                                            <label for="examen_paciente_hosp${examen.id}" class="cr"></label>
                                        </div>`
                                    ]).draw();

                                });
                            });
                        }else{
                            swal({
                                title: "Error",
                                text: "Ocurrió un error al eliminar el examen",
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    }
                });
            }
        });
    }

    function guardar_nueva_evolucion_hosp(){
        let url = "{{ route('profesional.agregar_evolucion_profesional_hosp') }}";
        let evolucion_medica = $('#nueva_evolucion_hosp').val();

        if(evolucion_medica.length == 0){
            swal({
                title: "Error",
                text: "Debe ingresar una evolución médica",
                icon: "error",
                button: "Aceptar",
            });
            return;
        }

        let data = {
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_profesional: $('#id_profesional').val(),
            evolucion_medica: evolucion_medica,
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title: "Éxito",
                        text: "Evolución médica guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    }).then((value) => {
                        let evolucion = response.evolucion;
                        let tabla = $('#tabla_evol_hosp').DataTable();
                        tabla.row.add( [
                            evolucion.evolucion,
                            evolucion.hora,
                            evolucion.nombre_responsable,
                            evolucion.evolucion_medica
                        ] ).draw();
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al guardar la evolución médica",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            }
        });
    }

    function editar_evolucion_hosp(id_evolucion){
        // Obtener los datos de la fila de la tabla
        let tabla = $('#tabla_evol_hosp').DataTable();
        let fila = tabla.rows().nodes().toArray().find(row => {
            return $(row).find('td:first').text() == id_evolucion;
        });

        if(fila){
            let evolucion = $(fila).find('td:eq(2)').text(); // Columna de evolución

            // Guardar el ID de la evolución en un campo oculto
            $('#id_evolucion_editar_hosp').val(id_evolucion);

            // Cargar el texto en el textarea del modal
            $('#editar_evolucion_hosp_textarea').val(evolucion);

            // Mostrar el modal
            $('#modalEditarEvolucionProfesionalHosp').modal('show');
        }
    }

    function modificar_evolucion_profesional_hosp(){
        let id_evolucion = $('#id_evolucion_editar_hosp').val();
        let evolucion_medica = $('#editar_evolucion_hosp_textarea').val();

        if(evolucion_medica.length == 0){
            swal({
                title: "Error",
                text: "Debe ingresar una evolución médica",
                icon: "error",
                button: "Aceptar",
            });
            return;
        }

        let url = "{{ route('profesional.modificar_evolucion_profesional_hosp') }}";
        let data = {
            id_evolucion: id_evolucion,
            evolucion_medica: evolucion_medica,
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title: "Éxito",
                        text: "Evolución médica modificada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    }).then((value) => {
                        // Actualizar la tabla
                        let tabla = $('#tabla_evol_hosp').DataTable();
                        let fila = tabla.rows().nodes().toArray().find(row => {
                            return $(row).find('td:first').text() == id_evolucion;
                        });

                        if(fila){
                            $(fila).find('td:eq(2)').text(evolucion_medica);
                        }

                        // Cerrar el modal
                        $('#modalEditarEvolucionProfesionalHosp').modal('hide');
                    });
                }else{
                    swal({
                        title: "Error",
                        text: response.mensaje || "Ocurrió un error al modificar la evolución médica",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error){
                swal({
                    title: "Error",
                    text: "Ocurrió un error al modificar la evolución médica",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }

    function administrar_medicamento(id){
        swal({
            title: "Administrar medicamento",
            text: "¿Está seguro que desea administrar este medicamento?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                administrar_medicamento_confirmar(id);
            }
        });
    }

    function administrar_medicamento_confirmar(id){
        let url = "{{ route('enfermeria.administrar_tratamiento') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_tratamiento: id,
                ficha_atencion_id: $('#id_fc').val(),
                tipo:'externo',
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK') {
                    // Buscar el medicamento actualizado en la respuesta
                    let medicamento_actualizado = null;
                    if (response.receta) {
                        if (Array.isArray(response.receta)) {
                            medicamento_actualizado = response.receta.find(m => m.id == id || m.id_detalle == id);
                        } else if (response.receta.id == id || response.receta.id_detalle == id) {
                            medicamento_actualizado = response.receta;
                        }
                    }

                    // Actualizar el checkbox de estado
                    $('#registro_alternativo_paciente_enf' + id).prop('checked', true);
                    $('#label_tratamiento_enf_' + id).html('ADMINISTRADO');

                    // Calcular y mostrar fecha de administración
                    let fecha_admin = new Date();
                    let fecha_formateada = fecha_admin.toLocaleDateString('es-CL', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    // Buscar la fila del medicamento
                    let $fila = $('#btn_administrar_' + id).closest('tr');

                    // Actualizar la celda de fecha-hora si existe
                    if ($fila.length > 0) {
                        $fila.find('td').eq(16).html('<span class="badge badge-success">Admin: ' + fecha_formateada + '</span>');
                    }

                    // Actualizar tiempo restante con el valor del backend
                    if(response.tiempo_transcurrido) {
                        $('#tiempo_restante_' + id).html('<span class="text-success font-weight-bold">Hace: ' + response.tiempo_transcurrido + '</span>');
                    } else {
                        $('#tiempo_restante_' + id).html('<span class="text-success font-weight-bold">Administrado ahora</span>');
                    }

                    // Actualizar el contador de dosis si existe
                    if (medicamento_actualizado && (medicamento_actualizado.contador_dosis || medicamento_actualizado.contador_dosis === 0)) {
                        $('#repeticiones_medicamento_' + id).text(medicamento_actualizado.contador_dosis);
                    }

                    // Deshabilitar el botón de administrar
                    $('#btn_administrar_' + id).prop('disabled', true).addClass('btn-secondary').removeClass('btn-success');

                    swal({
                        title: "Éxito",
                        text: "Medicamento administrado correctamente a las " + fecha_formateada,
                        icon: "success",
                        button: "Aceptar",
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje || "No se pudo administrar el medicamento",
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            },
            error: function(error) {
                console.error(error);
                swal({
                    title: "Error",
                    text: "Ocurrió un error al administrar el medicamento",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }

    function guardar_curacion_plana_servicio(){
        var cp_asp = $('#cp_asp').val();
        var cp_me = $('#cp_me').val();
        var cp_pro = $('#cp_pro').val();
        var cp_ecant = $('#cp_ecant').val();
        var cp_ecal = $('#cp_ecal').val();
        var cp_tn = $('#cp_tn').val();
        var cp_tg = $('#cp_tg').val();
        var cp_ed = $('#cp_ed').val();
        var cp_dol = $('#cp_dol').val();
        var cp_pielc = $('#cp_pielc').val();
        var cp_obs = $('#obs_cp_gral').val();
        var tpo_les_curgen = $('#tpo_les_curgen').val();
        var obs_cur_plana = $('#obs_cur_plana').val();
        var ptos_tot_ev = $('#ptos_tot_ev').val();


        var id_paciente = dame_id_paciente();

        // validar que ingrese todos los campos
        if(cp_asp == 0 || cp_me == 0 || cp_pro == 0 || cp_ecant == 0 || cp_ecal == 0 || cp_tn == 0 || cp_tg == 0 || cp_ed == 0 || cp_dol == 0 || cp_pielc == 0){
            swal({
                title: "Curación Plana",
                text: "Debe ingresar todos los campos",
                icon: "warning",
                button: "Aceptar",
            });
            return;
        }

        var data = {
            cp_asp: cp_asp,
            cp_me: cp_me,
            cp_pro: cp_pro,
            cp_ecant: cp_ecant,
            cp_ecal: cp_ecal,
            cp_tn: cp_tn,
            cp_tg: cp_tg,
            cp_ed: cp_ed,
            cp_dol: cp_dol,
            cp_pielc: cp_pielc,
            cp_obs: cp_obs,
            tpo_les_curgen: tpo_les_curgen,
            obs_cur_plana: obs_cur_plana,
            ptos_tot_ev: ptos_tot_ev,
            id_paciente: id_paciente,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: "{{ csrf_token() }}"
        }

        $.ajax({
            url: "{{ route('enfermeria.guardar_curacion_plana_servicio') }}",
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                if (data.mensaje == 'OK') {
                    swal({
                        title: "Curación Plana",
                        text: "La curación plana ha sido guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    }).then(function() {
                        $('#modal_curacion_plana').modal('hide');
                    })
                } else {
                    console.log(data.mensaje);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });

    }

    function actualizar_curacion_plana_servicio(id){
       guardar_curacion_plana_servicio();
    }

    function guardar_curacion_lpp(){
        var upp_local_eval = $('#upp_local_eval').val();
        var upp_gr_eval = $('#upp_gr_eval').val();
        var upp_diam_eval = $('#upp_diam_eval').val();
        var upp_prof_eval = $('#upp_prof_eval').val();
        var upp_Infec_eval = $('#upp_Infec_eval').val();
        var obs_pa_eval_upp = $('#obs_pa_eval_upp').val();
        var obs_cur_lpp = $('#obs_cur_lpp').val();
        var obs_val_eval_upp = $('#obs_val_eval_upp').val();
        var valoresSeleccionados = $('#lpp_patasoc').val();

        var id_paciente = dame_id_paciente();
        var id_ficha_atencion = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();

        // validar que ingrese todos los campos
        if(upp_local_eval == 0 || upp_gr_eval == 0 || upp_diam_eval == 0 || upp_prof_eval == 0 || upp_Infec_eval == 0){
            swal({
                title: "Curación LPP",
                text: "Debe ingresar todos los campos",
                icon: "warning",
                button: "Aceptar",
            });
            return;
        }

        var data = {
            upp_local_eval: upp_local_eval,
            upp_gr_eval: upp_gr_eval,
            upp_diam_eval: upp_diam_eval,
            upp_prof_eval: upp_prof_eval,
            upp_Infec_eval: upp_Infec_eval,
            obs_pa_eval_upp: obs_pa_eval_upp,
            obs_cur_lpp: obs_cur_lpp,
            obs_val_eval_upp: obs_val_eval_upp,
            id_paciente: id_paciente,
            patologias: valoresSeleccionados,
            id_ficha_atencion: id_ficha_atencion,
            id_lugar_atencion: id_lugar_atencion,
            _token: "{{ csrf_token() }}"
        }

        $.ajax({
            url: "{{ route('enfermeria.guardar_curacion_lpp_servicio') }}",
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                if (data.mensaje == 'OK') {
                    swal({
                        title: "Curación LPP",
                        text: "La curación LPP ha sido guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    let curaciones_lpp = data.curaciones_lpp;
                    console.log(curaciones_lpp);
                    $('#tabla_curaciones_lpp_servicio tbody').empty();
                    $.each(curaciones_lpp, function(index, value){
                        $('#tabla_curaciones_lpp_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle">${value.fecha} ${value.hora} <br> ${value.responsable}</td>
                                <td class="text-center align-middle">${value.datos_curacion_lpp.upp_gr_eval}</td>
                                <td class="text-center align-middle">${value.datos_curacion_lpp.upp_local_eval}</td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curacion_lpp_servicio_listo${value.id}">
                                        <label for="curacion_lpp_servicio_listo${value.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle"><button type="button" class="btn btn-outline-primary btn-sm" data-target="#modalAgregarInsumos" data-toggle="modal">Insumos</button></td>
                                <td class="text-center align-middle"><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_curacion_lpp_servicio(${value.id})"><i class="fas fa-trash"></i></button></td>
                            </tr>
                        `);
                    });
                    limpiar_curacion_lpp();
                } else {
                    console.log(data.mensaje);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });

    }

    function limpiar_curacion_lpp(){
        $('#upp_local_eval').val(0);
        $('#upp_gr_eval').val(0);
        $('#upp_diam_eval').val(0);
        $('#upp_prof_eval').val(0);
        $('#upp_Infec_eval').val(0);
        $('#obs_pa_eval_upp').val('');
        $('#obs_cur_lpp').val('');
        $('#obs_val_eval_upp').val('');
        $('#lpp_patasoc').html('');
    }

    function cambiarTextoLabelCuracion(id){
        let url = "{{ route('enfermeria.cambiar_estado_curacion') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_tratamiento: id,
                observaciones: $('#observaciones_'+id).val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                // limpiar el campo hora_
                $('#hora_tratamiento_'+id).html('');
                if(response.mensaje == 'OK'){
                    $('#hora_'+id).html(response.dif);

                    if(response.estado == 1){
                        $('#label_curacion_'+id).html('Listo');
                    }

                    else
                        $('#label_curacion_'+id).html('Pendiente');

                    // agregar disabled al input de observaciones
                    if(response.estado == 1){
                        $('#observaciones_'+id).attr('disabled', true);
                    }else{
                        $('#observaciones_'+id).attr('disabled', false);
                    }
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrio un error al cambiar el estado del tratamiento",
                        icon: "error",
                        button: "Aceptar",
                    }).then((value) => {
                        //window.location.reload();
                        // volver el check a su estado anterior
                        $('#curaciones_servicio_listo'+id).prop('checked', !$('#curaciones_servicio_listo'+id).prop('checked'));
                    })
                }

            }
        });
    }

    function cambiarTextoLabelTratamiento(id){
        let url = "{{ route('enfermeria.cambiar_estado_tratamiento') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_tratamiento: id,
                observaciones: $('#observaciones_tratamiento_'+id).val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                // limpiar el campo hora_
                $('#hora_tratamiento_enf'+id).html('');
                if(response.mensaje == 'OK'){
                    $('#hora_tratamiento_enf'+id).html(response.dif);

                    if(response.estado == 1){
                        $('#label_tratamiento_enf'+id).html('ADMINISTRADO');
                    }
                    else{
                        $('#label_tratamiento_enf'+id).html('PENDIENTE');
                    }

                    // agregar disabled al input de observaciones
                    if(response.estado == 1){
                        $('#observaciones_tratamiento_enf'+id).attr('disabled', true);
                    }else{
                        $('#observaciones_tratamiento_enf'+id).attr('disabled', false);
                    }
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrio un error al cambiar el estado del tratamiento",
                        icon: "error",
                        button: "Aceptar",
                    }).then((value) => {
                        //window.location.reload();
                        // volver el check a su estado anterior
                        $('#registro_alternativo_paciente_enf'+id).prop('checked', !$('#registro_alternativo_paciente_enf'+id).prop('checked'));
                    })
                }

            }
        });
    }

    function cambiarTextoLabelExamen(id){
        let url = "{{ route('enfermeria.cambiar_estado_examen') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_examen: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    if(response.estado == 1){
                        $('#label_examen_paciente_hosp'+id).html('REALIZADO');
                    }
                    else{
                        $('#label_examen_paciente_hosp'+id).html('PENDIENTE');
                    }
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrio un error al cambiar el estado del examen",
                        icon: "error",
                        button: "Aceptar",
                    }).then((value) => {
                        //window.location.reload();
                        // volver el check a su estado anterior
                        $('#examen_paciente_hosp'+id).prop('checked', !$('#examen_paciente_hosp'+id).prop('checked'));
                    })
                }

            }
        });
    }

    function finalizar_atencion(nombre) {
        swal({
            title: "¿Está seguro de finalizar la atención de " + nombre + " ?",
            text: "Una vez finalizada la atención no podrá realizar cambios",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Destino del paciente",
                    text: "Escribe el destino del paciente:",
                    content: "input", // Esto permite que el swal tenga un input de texto
                    button: {
                        text: "Confirmar",
                        closeModal: false,
                    },
                })
                .then((destino) => {
                    if (!destino) throw null; // Si no se ingresa un destino, no hacer nada
                    // Aquí puedes llamar a tu función AJAX, pasando el destino como parámetro
                    finalizar_atencion_ajax(destino);
                })
                .catch(err => {
                    if (err) {
                        swal("Oh no!", "Ha ocurrido un error al procesar tu solicitud.", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            }
        });
    }

    function actualizarTotal() {
        console.log('actualizarTotal');
        // Define los ID de los elementos select
        var selectIds = ['cp_asp', 'cp_me', 'cp_pro', 'cp_ecant', 'cp_ecal', 'cp_tn', 'cp_tg', 'cp_ed', 'cp_dol',
            'cp_pielc'
        ];
        var total = 0;

        // Recorre cada ID
        for (var i = 0; i < selectIds.length; i++) {
            // Obtiene el elemento select por su ID y suma su valor al total
            var select = document.getElementById(selectIds[i]);
            total += Number(select.value);
        }

        // Actualiza el valor del campo de entrada con id 'ptos_tot_ev'
        document.getElementById('ptos_tot_ev').value = total;

        if(total >= 10 && total <= 15){
            document.getElementById('tpo_les_curgen').value = 'Tipo 1';
        }else if(total >= 16 && total <= 21){
            document.getElementById('tpo_les_curgen').value = 'Tipo 2';
        }else if(total >= 22 && total <= 27){
            document.getElementById('tpo_les_curgen').value = 'Tipo 3';
        }else if(total >= 28 && total <= 40){
            document.getElementById('tpo_les_curgen').value = 'Tipo 4';
        }
    }

    function actualizarTotalPieDiabetico(){
        console.log('actualizarTotalPieDiabetico');
        // Define los ID de los elementos select
        var selectIds = ['aspecto_pie_diab', 'mayor_extension', 'profundidad_curacion','exudado_cantidad_curacion', 'exudado_calidad_curacion', 'tejido_esf', 'tejido_granu', 'edema_curacion', 'dolor_curacion', 'piel_circun'];
        var total = 0;

        // Recorre cada ID
        for (var i = 0; i < selectIds.length; i++) {
            // Obtiene el elemento select por su ID y suma su valor al total
            var select = document.getElementById(selectIds[i]);
            total += Number(select.value);
        }

        // Actualiza el valor del campo de entrada con id 'ptos_tot_ev'
        document.getElementById('ptos_tot_ev_diab').value = total;

        // if(total >= 10 && total <= 15){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 1';
        // }else if(total >= 16 && total <= 21){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 2';
        // }else if(total >= 22 && total <= 27){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 3';
        // }else if(total >= 28 && total <= 40){
        //     document.getElementById('tpo_les_curgen').value = 'Tipo 4';
        // }
    }

    function dame_id_paciente(){
        let params = new URLSearchParams(location.search);
        let id_paciente = params.get('id_paciente');
        return id_paciente;
    }

    function finalizar_atencion_ajax(destino){
        console.log(destino);
       let id_paciente = dame_id_paciente();
         $.ajax({
                url: "{{ route('profesional.finalizar_atencion') }}",
                type: 'POST',
                data: {
                 _token: "{{ csrf_token() }}",
                 id_paciente: id_paciente,
                destino: destino
                },
                success: function(response){
                    console.log(response);
                 if(response == 'OK'){
                      swal("Atención finalizada", {
                            icon: "success",
                      }).then((value) => {
                        console.log('finalizar_atencion_ajax');
                      });
                 }else{
                      swal("Error", "No se pudo finalizar la atención", "error");
                 }
                },
                error: function(){
                 swal("Error", "No se pudo finalizar la atención", "error");
                }
          });
    }

    function guardarObservacionesCuracion(){
        let id_curacion = $('#id_curacion').val();
        let observaciones = $('#observaciones_curacion').val();

        if(observaciones.length == 0){
            swal("Error", "Debe ingresar observaciones", "error");
            return;
        }

        $.ajax({
            url: "{{ route('enfermeria.guardar_observaciones_curacion') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id_curacion: id_curacion,
                observaciones: observaciones
            },
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal("Observaciones guardadas", {
                        icon: "success",
                    });
                }else{
                    swal("Error", "No se pudieron guardar las observaciones", "error");
                }
            },
            error: function(){
                swal("Error", "No se pudieron guardar las observaciones", "error");
            }
        });
    }
</script>



@endsection

