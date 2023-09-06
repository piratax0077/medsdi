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
                                                                <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad('{{ $exam->id }}',1);"><i class="feather icon-file-text"></i> Ver examen</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif

                                            {{-- RESULTADODE DE EXAMENES LABORATORIO --}}
                                            @if ($resultado_examen)
                                                @foreach ( $resultado_examen as $result_ex)
                                                    @if ($result_ex->revisado == 0)
                                                        <tr>
                                                            <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                            <td>{{ $result_ex->id }}</td>
                                                            {{-- <td>{{ $result_ex->nombre.' '.$result_ex->apellido_paterno.' '.$result_ex->apellido_materno }}</td> --}}
                                                            <td>LABORATORIO</td>
                                                            <td>
                                                                @if ($result_ex->obj_tipo_examen)
                                                                    {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                                    <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',1);"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                @else
                                                                    <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                @endif
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
                                                                <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad('{{ $exam->id }}',0);"><i class="feather icon-file-text"></i> Ver examen</button>
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
                                            <th>Tipo de Examen</th>
                                            <th>Examen</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- RESULTADODE DE EXAMENES LABORATORIO RADIOLOGIA--}}
                                            @if ($resultado_examen)
                                                @foreach ( $resultado_examen as $result_ex)
                                                    @if ($result_ex->revisado == 1)
                                                        @if ($result_ex->tipo_examen == 354)
                                                            <tr>
                                                                <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                                <td>{{ $result_ex->id }}</td>
                                                                {{-- <td>{{ $result_ex->nombre.' '.$result_ex->apellido_paterno.' '.$result_ex->apellido_materno }}</td> --}}
                                                                <td>LABORATORIO</td>
                                                                <td>
                                                                    @if ($result_ex->obj_tipo_examen)
                                                                        {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                                        <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',0);"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                    @else
                                                                        <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- RESULTADODE DE EXAMENES LABORATORIO RADIOLOGIA--}}
                                                @if ($resultado_examen)
                                                    @foreach ( $resultado_examen as $result_ex)
                                                        @if ($result_ex->revisado == 1)
                                                            @if ($result_ex->tipo_examen != 354)
                                                                <tr>
                                                                    <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                                    <td>{{ $result_ex->id }}</td>
                                                                    {{-- <td>{{ $result_ex->nombre.' '.$result_ex->apellido_paterno.' '.$result_ex->apellido_materno }}</td> --}}
                                                                    <td>LABORATORIO</td>
                                                                    <td>
                                                                        @if ($result_ex->obj_tipo_examen)
                                                                            {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                                            <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',0);"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                        @else
                                                                            <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
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
    {{-- ABRIR ARCHIVOS --}}
    function verExamenEspecialidad(id_examen, cambio_estado)
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

            if(cambio_estado == 1)
            {
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
                        carga_bandeja_radiologia();
                        carga_bandeja_general();
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

    function verResultadoExamen(id_examen, cambio_estado)
    {
        if(id_examen != '')
        {
            let url = "{{ route('resultado.examen.lab.archivo.ver') }}";
            var archivos = [];
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id : id_examen
                },
            })
            .done(function(data) {

                console.log(data);
                if (data.estado == 1)
                {
                    $.each(data.registros, function (key, value)
                    {
                        var temp_type = 'image';
                        console.log(value.url.indexOf('.pdf'));
                        if(value.url.indexOf('.pdf') != -1)
                        {
                            temp_type = 'iframe';
                        }
                        else
                        {
                            temp_type = 'image';
                        }
                        archivos.push({
                            src: value.url,
                            type: temp_type,
                            preload: false,
                        });
                    });

                    if(archivos.length > 0)
                        Fancybox.show(archivos);

                    if(cambio_estado == 1)
                    {
                        var estado_consulta = $('#rinde_estado_consulta').val();
                        let url = "{{ route('resultado.examen.lab.revisado') }}";
                        $.ajax({

                            url: url,
                            type: "GET",
                            data: {
                                id : id_examen
                            },
                        })
                        .done(function(data) {

                            console.log(data);
                            if (data.estado == 1)
                            {
                                console.log('examen revisado');
                                carga_bandeja_entrada();
                                carga_bandeja_revisados();
                                carga_bandeja_radiologia();
                                carga_bandeja_general();
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
                title: "Ver Resultado de Examen Laboratorio",
                text:"No Se encuentra resultado de examen Laboratorio",
                icon: "error"
            });
        }
    }

    function carga_bandeja_entrada()
    {
        $('#bandeja_entrada tbody').html('');
        carga_bandeja_entrada_examen_especialidad();
        carga_bandeja_entrada_resultado_examen();
    }

    {{-- INICIO BANDEJA DE ENTRADA --}}
    function carga_bandeja_entrada_examen_especialidad()
    {
        let url = "{{ route('examen.especialidad.ver.registros') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 6;
        var revisado = 0;

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
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '    <td>'+value.hora_medica.fecha_realizacion_consulta+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>'+value.nombre+'</td>';
                    fila += '    <td>';
                    if (value.sub_tipo_especialidad!='null' && value.sub_tipo_especialidad!=null)
                    {
                        fila += ''+value.sub_tipo_especialidad.nombre+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad(\''+value.id+'\', 1);"><i class="feather icon-file-text"></i> Ver examen</button>';
                    fila += '    </td>';
                    fila += '</tr>';

                    $('#bandeja_entrada tbody').append(fila);
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function carga_bandeja_entrada_resultado_examen()
    {
        let url = "{{ route('resultado.examen.ver') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 1;
        var revisado = 0;

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
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '    <td>'+value.fecha_registro+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>LABORATORIO</td>';
                    fila += '    <td>';
                    if (value.obj_tipo_examen!='null')
                    {
                        fila += ''+value.obj_tipo_examen.nombre_examen+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    if(value.cantidad > 0)
                        fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'" onclick="verResultadoExamen(\''+value.id+'\',1);"><i class="feather icon-file-text"></i> Ver examen</button>';
                    else
                        fila += '        <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'"><i class="feather icon-file-text"></i> Ver examen</button>';

                    fila += '    </td>';
                    fila += '</tr>';

                    $('#bandeja_entrada tbody').append(fila);
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
    {{-- FIN BANDEJA DE ENTRADA --}}

    {{-- BANDEJA EXAMENES ESPECIALES --}}
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
                    fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad(\''+value.id+'\',0);"><i class="feather icon-file-text"></i> Ver examen</button>';
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

    {{-- BANDEJA EXAMENES RADIOLOGIA --}}
    function carga_bandeja_radiologia()
    {
        let url = "{{ route('resultado.examen.ver') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 1;
        var revisado = 1;
        var tipo_examen = 354;

        $('#exam_radiologicos tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
                tipo_examen : tipo_examen,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '    <td>'+value.fecha_registro+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>LABORATORIO</td>';
                    fila += '    <td>';
                    if (value.obj_tipo_examen!='null')
                    {
                        fila += ''+value.obj_tipo_examen.nombre_examen+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    if(value.cantidad > 0)
                        fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'" onclick="verResultadoExamen(\''+value.id+'\',0);"><i class="feather icon-file-text"></i> Ver examen</button>';
                    else
                        fila += '        <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'"><i class="feather icon-file-text"></i> Ver examen</button>';

                    fila += '    </td>';
                    fila += '</tr>';

                    $('#exam_radiologicos tbody').append(fila);
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{-- BANDEJA EXAMENES GENERALES --}}
    function carga_bandeja_general()
    {
        let url = "{{ route('resultado.examen.ver') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 1;
        var revisado = 1;

        $('#exam_general tbody').html('');

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
                $.each(data.registros, function (index, value)
                {
                    if(value.tipo_examen != 354)
                    {
                        var fila = '';
                        fila += '<tr >';
                        fila += '    <td>'+value.fecha_registro+'</td>';
                        fila += '    <td>'+value.id+'</td>';
                        fila += '    <td>LABORATORIO</td>';
                        fila += '    <td>';
                        if (value.obj_tipo_examen!='null')
                        {
                            fila += ''+value.obj_tipo_examen.nombre_examen+'';
                        }
                        else
                        {
                            fila += '-';
                        }
                        fila += '    </td>';
                        fila += '    <td>';
                        if(value.cantidad > 0)
                            fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'" onclick="verResultadoExamen(\''+value.id+'\',0);"><i class="feather icon-file-text"></i> Ver examen</button>';
                        else
                            fila += '        <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'"><i class="feather icon-file-text"></i> Ver examen</button>';

                        fila += '    </td>';
                        fila += '</tr>';

                        $('#exam_general tbody').append(fila);
                    }
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }




</script>
