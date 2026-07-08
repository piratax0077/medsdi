<div class="tab-pane fade" id="vac" role="tabpanel" aria-labelledby="vac-tab">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 py-3">
            <h6 class="t-aten d-inline mb-2">Estado de vacunación del menor</h6>
            <span class="badge badge-sub d-inline">VACUNAS</span>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="floating-label-activo-sm">Estado de vacunación</label>
                    <select class="form-control form-control-sm" id="id_estado_vacuna" name="id_estado_vacuna">
                        <option value="">Seleccione</option>
                        <option value="AD">Al día</option>
                        <option value="AT">Atrasado</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label class="floating-label-activo-sm">Vacunas</label>
                    <select class="form-control form-control-sm" id="id_vacuna" name="id_vacuna">
                        <option>Seleccione vacuna según edad</option>
                        <optgroup label="Recién Nacido">
                            <option value="BCG" data-periodo="Recién Nacido" data-dosis="UNICA">BCG</option>
                            <option value="HP-B" data-periodo="Recién Nacido" data-dosis="1">Hepatitis B</option>
                        </optgroup>
                        <optgroup label="2 Meses">
                            <option value="HEXA_1">Hexavalente - 1° dosis</option><!--------NUEVA--------->
                            <option value="NEUMO13_1">Neumocócica Conjugada 13V - 1° dosis</option><!--------NUEVA--------->
                            <option value="MENB_1">Meningocócica B - 1° dosis</option><!--------NUEVA--------->
                        </optgroup>

                        <optgroup label="4 Meses">
                            <option value="HEXA_2">Hexavalente - 2° dosis</option><!--------NUEVA--------->
                            <option value="NEUMO13_2">Neumocócica Conjugada 13V - 2° dosis</option><!--------NUEVA--------->
                            <option value="MENB_2">Meningocócica B - 2° dosis</option><!--------NUEVA--------->
                        </optgroup>

                        <optgroup label="6 Meses">
                            <option value="HEXA_3">Hexavalente - 3° dosis</option><!--------NUEVA--------->
                            <option value="NEUMO13_3_PREMATURO">
                                Neumocócica 13V - 3° dosis (Prematuros)
                            </option><!--------NUEVA--------->
                        </optgroup>
                        <!--<optgroup label="2° mes , 4° mes , 6° mes">
                            <option value="HV" data-periodo="2,4 ó 6 mes" data-dosis="1">Hexavalente</option>
                            <option value="NC" data-periodo="2,4 ó 6 mes" data-dosis="1">Neumocócica Conjugada (prematuros)</option>
                        </optgroup>-->
                        <optgroup label="12 meses">
                            <option value="TV-1D" data-periodo="12 mes" data-dosis="1">SRP (Sarampión, Rubéola y Parotiditis) - 1° dosis</option>
                            <option value="MC-C" data-periodo="12 mes" data-dosis="1">Meningocócica ACWY - Dosis única</option>
                            <!--<option value="NC-C" data-periodo="12 mes" data-dosis="1">Neumocócica Conjugada</option>-->
                        </optgroup>
                        <optgroup label="18 meses">
                            <option value="HV" data-periodo="18 mes" data-dosis="2">Hexavalente - Refuerzo</option>
                            <option value="MENB_REF">Meningocócica B - Refuerzo</option><!--------NUEVA--------->
                            <option value="HP-A" data-periodo="18 mes" data-dosis="1">Hepatitis A - Dosis única</option>
                            <option value="VA-1D" data-periodo="18 mes" data-dosis="1">Varícela 1° dosis</option>
                            <option value="FA" data-periodo="18 mes" data-dosis="UNICA">Fiebre Amarilla (Rapa Nui)</option>
                        </optgroup>
                         <optgroup label="24 Meses">
                            <option value="VA-2D" data-parent="Pre-escolar" data-dosis="2">Varicela - 2° dosis</option>
                        </optgroup>
                        <optgroup label="36 Meses">
                                 <option value="TV-2D" data-parent="Pre-escolar" data-dosis="2">SRP - 2° dosis</option>
                        </optgroup>
                        <optgroup label="Escolar">
                            <option value="dTp" data-periodo="Escolar 1º Básico" data-dosis="1">dTpa - Refuerzo (1° Básico)</option>
                            <option value="VPH-1D" data-periodo="Escolar 4º Básico" data-dosis="1">Virus Papiloma Humano (VPH) - Dosis única (4° Básico)</option>
                            <!--<option value="VPH-2D" data-periodo="Escolar 5º Básico" data-dosis="2">5º Básico VPH 2ª Dosis</option-->                            <option value="dTp" data-periodo="Escolar 8º Básico" data-dosis="2">dTpa - Refuerzo (8° Básico)</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label class="floating-label-activo-sm">Incidentes con la vacuna</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="indicaciones_vacuna" id="indicaciones_vacuna"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-outline-primary btn-xs btn-block" onclick="registrar_vacuna('1','GEN')"><i class="feather icon-plus"></i> Añadir</button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="form-row" id="formulario_vac">
                <div class="btn-group btn-block btn-xs mb-3" role="group">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="feather icon-file-text"></i> Indicaciones
                    </button>
                    <div class="dropdown-menu position-absolute" style="z-index: 2000;">
                      <a class="dropdown-item" onclick="i_vacunas();"><i class="feather icon-plus"></i> Indicar Vacunas Programa MINSAL</a>
                      <a class="dropdown-item" onclick="i_vacunas_otras();"><i class="feather icon-plus"></i> Indicar Otras Vacunas</a>
                      <a class="dropdown-item" onclick="inter();"><i class="feather icon-plus"></i> Interconsulta</a>
                      {{-- <a class="dropdown-item" onclick="carnet_vac();"><i class="feather icon-plus"></i> Carne de vacunas generales</a> --}}
                      {{-- <a class="dropdown-item" onclick="otras_vac();"><i class="feather icon-plus"></i> Carne de vacunas especiales</a> --}}
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="alert alert-secondary">
                    <ul>
                        <li class="{{ !empty($mostrar_msg_vacuna_minsal) ? '' : 'd-none' }}" id="vacuna_minsal"><i class="fas fa-check-circle text-success"></i> Se añadió vacuna programa MINSAL</li>
                    </ul>
                    <ul>
                        <li class="{{ !empty($mostrar_msg_otras_vacunas) ? '' : 'd-none' }}" id="otras_vacunas"><i class="fas fa-check-circle text-success"></i> Se añadió otras vacunas</li>
                    </ul>
                    {{-- <ul>
                        <li><i class="fas fa-check-circle text-success"></i> Se modificó carne vacunas generales</li>
                    </ul>--}}
                   {{--  <ul>
                        <li><i class="fas fa-check-circle text-success"></i> Se modificó carne vacunas especiales</li>
                    </ul>--}}
                    <ul>
                        <li class="{{ !empty($mostrar_msg_interconsulta) ? '' : 'd-none' }}" id="interconsulta"><i class="fas fa-check-circle text-success"></i> Se añadió Interconsulta</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-lineal">
                <div class="card-header-lineal">
                    <div class="col-12 d-inline">
                        <h6 class="t-aten d-inline">Historial de Vacunación</h6>
                        <button type="button" class="btn btn-sm btn-primary float-right d-inline mt-n1" onclick="carnet_pdf();"><i class="feather icon-file-text"></i> Ver Carne de Vacunación</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row mb-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table  class="display table table-striped dt-responsive nowrap table-xs" style="width:100%" id="pediatria_vacunas_generales">
                                    <thead>
                                        <tr>
                                            <th>FECHA</th>
                                            <th>VACUNA</th>
                                            <th>DOSIS</th>
                                            <th>EDAD</th>
                                            <th>OBSERVACIÓN</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Los registros se cargan dinámicamente por JS -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.indicar_vacunas")<!-- MINSAL -->
@include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.otras_vacunas")<!-- OTRAS VACUNAS -->
{{-- @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_otras_vacunas") --}}
{{-- @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_vacuna") --}}

<script>
    $(document).ready(function () {
        $('#pediatria_vacunas_generales').dataTable({
            responsive: true,
        });
        if (!@json(!empty($mostrar_msg_vacuna_minsal))) {
            $('#formulario_vac li#vacuna_minsal').addClass('d-none');
        }
        if (!@json(!empty($mostrar_msg_otras_vacunas))) {
            $('#formulario_vac li#otras_vacunas').addClass('d-none');
        }
        if (!@json(!empty($mostrar_msg_interconsulta))) {
            $('#formulario_vac li#interconsulta').addClass('d-none');
        }
        cargar_vacunas_generales();
    });

    function registrar_vacuna(id_tipo, tipo)
    {
        var id_ficha_atencion = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_responsable = $('#id_responsable_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var id_estado_vacuna = $('#id_estado_vacuna').val();
        var text_estado_vacuna = $('#id_estado_vacuna option:selected').text();
        var id_vacuna = $('#id_vacuna').val();
        var text_vacuna = $('#id_vacuna option:selected').text();
        var periodo = $('#id_vacuna option:selected').attr('data-periodo');
        var dosis = $('#id_vacuna option:selected').attr('data-dosis');
        var indicaciones_vacuna = $('#indicaciones_vacuna').val();

        var valido = 1;
        var mensaje = "";

        if(id_estado_vacuna == '')
        {
            valido = 0;
            mensaje += " - Debe seleccionar estado de vacuna.\n";
        }

        if(id_vacuna == '' || id_vacuna == 'Seleccione')
        {
            valido = 0;
            mensaje += " - Debe seleccionar vacuna correspondiente a edad.\n";
        }

        if(valido == 0)
        {
            swal({
                title: "Registro de Vacuna General",
                text: mensaje,
                icon: "warning",
            });
            return;
        }

        let url = "{{ route('ficha.registro.vacuna') }}";

        var _token = CSRF_TOKEN;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_lugar_atencion : id_lugar_atencion,
                id_ficha_atencion : id_ficha_atencion,
                id_ficha_pediatria : '',
                id_paciente : id_paciente,
                id_responsable : id_responsable,
                id_profesional : id_profesional,
                id_tipo_vacuna : id_tipo,
                tipo_vacuna : tipo,
                id_estado_vacuna : id_estado_vacuna,
                texto_estado_vacuna : text_estado_vacuna,
                id_vacuna : id_vacuna,
                nombre_vacuna : text_vacuna,
                id_dosis : '',
                texto_dosis : dosis,
                periodo : periodo,
                indicaciones_vacuna : indicaciones_vacuna,
                observacion_vacuna : '',
                id_institucion : '',
                nombre_institucion : '',
                id_servicio : '',
                nombre_servicio : '',
            },
        })
        .done(function(data)
        {
            console.log(data);

            if (data !== 'null')
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro de Vacuna General",
                        text: "Registro Exitoso.",
                        icon: "success",
                    });
                    $('#id_estado_vacuna').val('');
                    $('#id_vacuna').val('');
                    $('#indicaciones_vacuna').val('');
                    cargar_vacunas_generales();
                }
                else
                {
                    swal({
                        title: "Registro de Vacuna General",
                        text: "Falla en Registro\nIntente nuevamente.",
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Registro de Vacuna General",
                    text: "Falla en Registro\nIntente nuevamente.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_vacunas_generales()
    {
        let url = "{{ route('ficha.ver.registros.vacuna') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var id_tipo_vacuna = '1';
        var tipo_vacuna = 'GEN';
        var _token = CSRF_TOKEN;

        // Si ya existe una instancia de DataTable, destrúyela antes de volver a poblar
        if ($.fn.DataTable.isDataTable('#pediatria_vacunas_generales')) {
            $('#pediatria_vacunas_generales').DataTable().clear().destroy();
        }
        $('#pediatria_vacunas_generales tbody').html('');

        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_tipo_vacuna : id_tipo_vacuna,
                tipo_vacuna : tipo_vacuna,
            },
        })
        .done(function(data)
        {
            console.log(data);
            var rows = '';
            if (data !== 'null' && data.estado == 1 && Array.isArray(data.registros))
            {
                data.registros.forEach(function(value) {
                    rows += '<tr>';
                    rows += '    <td>'+(value.fecha ? value.fecha : '')+'</td>';
                    rows += '    <td>'+(value.nombre_vacuna ? value.nombre_vacuna : '')+'</td>';
                    rows += '    <td>'+(value.texto_dosis ? value.texto_dosis : '')+'</td>';
                    rows += '    <td>'+(value.edad ? value.edad : '')+'</td>';
                    rows += '    <td>';
                    if(value.observacion_vacuna != null) rows += value.observacion_vacuna+'<br/>';
                    if(value.indicaciones_vacuna != null) rows += value.indicaciones_vacuna;
                    rows += '</td>';
                    rows += '    <td class="align-middle">';
                    rows += '        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_vacuna(\''+value.id+'\')"><i class="feather icon-x"></i></button>';
                    rows += '    </td>';
                    rows += '</tr>';
                });
            }
            $('#pediatria_vacunas_generales tbody').html(rows);
            // Re-inicializar DataTable después de poblar
            $('#pediatria_vacunas_generales').DataTable({
                responsive: true,
                destroy: true
            });
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function eliminar_vacuna(id_registro)
    {
        swal({
            title: "Eliminar Vacuna",
            text: "¿Está seguro que desea eliminar este registro de vacuna?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                let url = "{{ route('ficha.eliminar.vacuna') }}";
                var _token = CSRF_TOKEN;
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        id_registro: id_registro
                    },
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        swal({
                            title: "Vacuna eliminada",
                            text: "El registro fue eliminado correctamente.",
                            icon: "success",
                        });
                        cargar_vacunas_generales();
                    } else {
                        swal({
                            title: "Error",
                            text: "No se pudo eliminar el registro.",
                            icon: "error",
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    swal({
                        title: "Error",
                        text: "No se pudo eliminar el registro.",
                        icon: "error",
                    });
                });
            }
        });
    }

    function carnet_pdf()
    {
        var id_paciente = $('#id_paciente_fc').val();
        let url = "{{ route('ficha.pdf.vacuna') }}";
        Fancybox.show(
            [
                {
                src: '{{ route('ficha.pdf.vacuna') }}?id_paciente='+id_paciente,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }
</script>
