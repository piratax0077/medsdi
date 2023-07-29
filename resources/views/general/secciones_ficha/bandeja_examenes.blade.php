<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 class="text-c-blue mt-4 f-20 mb-0">Exámenes</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-2" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="bandeja-entrada-tab" data-toggle="tab" href="#bandeja-entrada" role="tab" aria-controls="bandeja-entrada" aria-selected="false">Bandeja de entrada</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ex-esp-rev-tab" data-toggle="tab" href="#ex-esp-rev" role="tab" aria-controls="ex-esp-rev" aria-selected="false">Examenes Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ex-rx-tab" data-toggle="tab" href="#ex-rx" role="tab" aria-controls="ex-rx" aria-selected="false">Exámenes radiológicos</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ex-generales-tab" data-toggle="tab" href="#ex-generales" role="tab" aria-controls="ex-generales" aria-selected="false">Exámenes generales</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="tab-content" id="ped-contenido">
                    <!--BANDEJA DE ENTRADA-->
                    <div class="tab-pane fade show active" id="bandeja-entrada" role="tabpanel" aria-labelledby="bandeja-entrada-tab">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-c-blue">Bandeja de entrada</h6>
                                <hr>
                                <div class="dt-responsive table-responsive">
                                    <table id="bandeja_entrada" class="display table dt-responsive nowrap table-xs align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Nº de Orden</th>
                                                <th>Nombre del Examen</th>
                                                <th>Tipo de Examen</th>
                                                <th>Examen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($examenes_especialidad_realizados)
                                                @foreach ($examenes_especialidad_realizados as $exam)
                                                    @if ($exam->HoraMedica->id_estado == 6 && $exam->revisado == 0)
                                                        <tr>
                                                            <td>{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
                                                            <td>{{ $exam->id }}</td>
                                                            <td>{{ $exam->nombre }}</td>
                                                            <td>
                                                                @if ($exam->SubTipoEspecialidad)
                                                                    {{ $exam->SubTipoEspecialidad->nombre }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad('{{ $exam->id }}');"><i class="feather icon-file-text"></i> Ver examen</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- EXAMEN ESPECIALIDAD REVISADOS -->
                    <div class="tab-pane fade" id="ex-esp-rev" role="tabpanel" aria-labelledby="ex-esp-rev-tab">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-c-blue">Examenes Especialidad</h6>
                                <hr>
                                <div class="dt-responsive table-responsive">
                                    <table id="tabla_ex_esp" class="display table dt-responsive nowrap table-xs align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Nº de Orden</th>
                                                <th>Nombre del Examen</th>
                                                <th>Tipo de Examen</th>
                                                <th>Examen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($examenes_especialidad_realizados)
                                                @foreach ($examenes_especialidad_realizados as $exam)
                                                    @if ($exam->HoraMedica->id_estado == 6 && $exam->revisado == 1)
                                                        <tr>
                                                            <td>{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
                                                            <td>{{ $exam->id }}</td>
                                                            <td>{{ $exam->nombre }}</td>
                                                            <td>
                                                                @if ($exam->SubTipoEspecialidad)
                                                                    {{ $exam->SubTipoEspecialidad->nombre }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad('{{ $exam->id }}');"><i class="feather icon-file-text"></i> Ver examen</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--EXÁMENES RADIOLÓGICOS-->
                    <div class="tab-pane fade show" id="ex-rx" role="tabpanel" aria-labelledby="ex-rx-tab">
                       <div class="dt-responsive table-responsive">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-c-blue">Exámenes radiológicos</h6>
                                     <hr>
                                    <table id="exam_radiologicos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Nº de Orden</th>
                                            <th>Nombre del Examen</th>
                                            <th>TIpo de Examen</th>
                                            <th>Examen</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>23/05/2019</td>
                                                <td>782638</td>
                                                <td>Hemograma completo</td>
                                                <td>Examen Sangre</td>
                                                <td>
                                                <button href="#!" class="btn btn btn-primary-light btn-xs"><i class="feather icon-file-text"></i> Ver Examen</button>
                                                </td>
                                                <td>
                                                    <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--EXÁMENES GENERALES-->
                    <div class="tab-pane fade show" id="ex-generales" role="tabpanel" aria-labelledby="ex-generales-tab">
                       <div class="dt-responsive table-responsive">
                            <div class="card">
                                <div class="card-body">
                                     <h6 class="text-c-blue">Exámenes generales</h6>
                                     <hr>
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="exam_general" class="display table dt-responsive nowrap table-xs align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                <th>Fecha</th>
                                                <th>Nº de Orden</th>
                                                <th>Nombre del Examen</th>
                                                <th>Tipo de Examen</th>
                                                <th>Examen</th>
                                                <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>23/05/2019</td>
                                                    <td>782638</td>
                                                    <td>Hemograma completo</td>
                                                    <td>Examen Sangre</td>
                                                    <td>
                                                        <button href="#!" class="btn btn-primary-light btn-xs"><i class="feather icon-file-text"></i> Ver examen</button>
                                                    </td>
                                                    <td>
                                                        <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                    </td>
                                                </tr>
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
    </div>
</div>

<script>
    function verExamenEspecialidad(id_examen)
    {
        if(id_examen != '')
        {
            var data ='id_examen_especialidad='+id_examen+'';
            Fancybox.show(
                [{
                    src: '{{ route("pdf.examen_especialidad") }}?'+data,
                    type: "iframe",
                    preload: false,
                }]
            );

            var estado_consulta = $('#rinde_estado_consulta').val();

            let url = "{{ route('pdf.examen.especialidad.revisado') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_examen : id_examen
                },
            })
            .done(function(data) {

                console.log(data);
                if (data.estado == 1)
                {
                    console.log('examen revisado');
                    carga_bandeja_entrada();
                    carga_bandeja_revisados();
                }
                else
                {
                    console.log('examen no revisado');
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Ver Examen Especialidad",
                text:"No Se encuentra examen",
                icon: "error"
            });
        }
    }

    function carga_bandeja_entrada()
    {
        let url = "{{ route('examen.especialidad.ver.registros') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 6;
        var revisado = 0;

        $('#bandeja_entrada tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                // $('#bandeja_entrada tbody').html('');
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '<tr>';
                    fila += '    <td>'+value.hora_medica.fecha_realizacion_consulta+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>'+value.nombre+'</td>';
                    fila += '    <td>';
                    if (value.sub_tipo_especialidad!='null')
                    {
                        fila += ''+value.sub_tipo_especialidad.nombre+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad(\''+value.id+'\');"><i class="feather icon-file-text"></i> Ver examen</button>';
                    fila += '    </td>';
                    fila += '</tr>';

                    $('#bandeja_entrada tbody').append(fila);
                });

            }
            else
            {

            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function carga_bandeja_revisados()
    {
        let url = "{{ route('examen.especialidad.ver.registros') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 6;
        var revisado = 1;

        $('#tabla_ex_esp tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                // $('#tabla_ex_esp tbody').html('');
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '<tr>';
                    fila += '    <td>'+value.hora_medica.fecha_realizacion_consulta+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>'+value.nombre+'</td>';
                    fila += '    <td>';
                    if (value.sub_tipo_especialidad!='null')
                    {
                        fila += ''+value.sub_tipo_especialidad.nombre+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad(\''+value.id+'\');"><i class="feather icon-file-text"></i> Ver examen</button>';
                    fila += '    </td>';
                    fila += '</tr>';

                    $('#tabla_ex_esp tbody').append(fila);
                });

            }
            else
            {

            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
