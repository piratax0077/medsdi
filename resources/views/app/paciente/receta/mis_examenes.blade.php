@extends('template.paciente.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis Exámenes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta.examen') }}">Mis Exámenes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-c-blue f-20 d-inline ml-4">Mis exámenes</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabla_examenes_paciente_ro" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nº de Orden</th>
                                    <th>Profesional</th>
                                    <th>Tipo de Examen</th>
                                    <th>Nombre del examen</th>
                                    <th>Comentarios</th>
                                    <th>Estado</th>
                                    <th>Examen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($examenes_especialidad_realizados)
                                    @foreach ($examenes_especialidad_realizados as $exam)
                                        @if ($exam->HoraMedica->id_estado == 6)
                                            <tr>
                                                <td>{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
                                                <td>{{ $exam->id }}</td>
                                                <td>{{ $exam->profesional->nombre.' '.$exam->profesional->apellido_uno.' '.$exam->profesional->apellido_dos }}</td>
                                                <td>{{ $exam->nombre }}</td>
                                                <td>
                                                    @if ($exam->SubTipoEspecialidad)
                                                        {{ $exam->SubTipoEspecialidad->nombre }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>-</td>
                                                <td>
                                                    @if ($exam->revisado == 1)
                                                        Revisado
                                                    @else
                                                        No revisado
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
                                        <tr>
                                            <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                            <td>{{ $result_ex->id }}</td>
                                            <td>LABORATORIO</td>
                                            <td>
                                                @if ($result_ex->obj_tipo_examen)
                                                    {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>-</td>
                                            <td>{{ $result_ex->observacion }}</td>
                                            <td>
                                                @if ($result_ex->revisado == 1)
                                                    Revisado
                                                @else
                                                    No revisado
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

<!--Cierre: Container Completo-->

@endsection
@section('page-script')
<script>
    $(document).ready(function () {
        $('#tabla_examenes_paciente_ro').DataTable({
            responsive: true,
        });
    });

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
</script>
@endsection
