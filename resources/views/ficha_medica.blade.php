<!-- BASE -->
@extends('layouts.base')

@section('content')

<div class="container">
    <div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
        <div class="col-md-12 py-0 px-1 shadow-none">
            <div class="row mx-0">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row mx-1  mt-4">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h4 class="text-c-blue float-left d-inline f-20">Ficha Médica Única</h4>
                    {{--<button type="button" class="btn btn-xs btn-danger d-inline float-right ml-2 mb-2"><i class="feather icon-x"></i> Cerrar</button> --}}
                    {{--<button type="button" class="btn btn-xs btn-primary d-inline float-right ml-2 mb-2"><i class="feather icon-printer"></i> Imprimir</button>--}}
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  mb-4">
                    <div class="card">
                        <div class="card-body pt-2 pb-2">
                            <div class="row align-middle">
                                <div class="col-sm-12 col-md-2">
                                    <img class="img-fluid wid-70 rounded-circle" src="{{ asset('images/iconos/paciente-f.svg') }}">
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <p><i class="feather icon-user"></i><strong> Paciente</strong> <br><label for="inputEmail4"><span id="nombre">Nombre: {{$paciente->nombres}} <br> Apellidos: {{$paciente->apellido_uno}} {{$paciente->apellido_dos}}</span><br><strong> Rut:</strong> {{$paciente->rut}}</label>
                                    </p>
                                    <p></p>
                                </div>
                                <div class="col-sm-6  col-md-2">
                                    <p><i class="feather icon-calendar"></i><strong> Fecha Nacimiento - Edad</strong> <br>Edad: {{ $paciente->edad }} <br> FN: {{$paciente->fecha_nac}}</p>
                                </div>
                                <div class="col-sm-6  col-md-2">
                                    @php
                                        $sexos = array(
                                            'M' => 'Masculino',
                                            'F' => 'Femenino'
                                        );
                                    @endphp
                                    <p><i class="feather icon-user"></i><strong> Sexo</strong> <br>{{$sexos[$paciente->sexo]}}</p>
                                </div>
                                <div class="col-sm-6  col-md-3">
                                    <p><i class="feather icon-home"></i><strong> Dirección</strong> <br>{{$direccion->direccion}} {{$direccion->numero}}, {{$direccion->ciudad}},{{$direccion->region}} <br>{{$paciente->telefono_uno}} / {{$paciente->telefono_dos}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-1">
                <!--INFORMACIÓN PACIENTE-->
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-c-blue" style="font-size: 0.9rem!important;">Información del paciente</h6>
                            <hr>
                            <ul>
                                <li><i class="feather icon-droplet"></i><strong> Grupo sanguíneo</strong></li>
                                <li class="text-danger">
                                    <span id="grupo_sanguineo" >{{$grupo_sanguineo->nombre_gs}}</span>
                                </li>
                            </ul>
                            <ul>
                                <li><strong>Donante Parcial</strong></li>
                                <li>
                                    @if($antecedentes_paciente->dona_organos_parcial == '1')
                                        Sí
                                    @elseif($antecedentes_paciente->dona_organos_parcial == '0')
                                        No
                                    @else
                                        {{$antecedentes_paciente->dona_organos_parcial}}
                                    @endif
                                </li>
                            </ul>

                            <ul>
                                <li><strong>Organos a Donar</strong></li>
                                <li>
                                    @if($antecedentes_paciente->dona_organos == '1')
                                        Sí
                                    @elseif($antecedentes_paciente->dona_organos == '0')
                                        No
                                    @else
                                        {{$antecedentes_paciente->dona_organos}}
                                    @endif
                                </li>
                            </ul>

                            <ul>
                                <li><strong>Donar Sangre</strong></li>
                                <li>
                                    @if($antecedentes_paciente->dona_sangre == '1')
                                        Sí
                                    @elseif($antecedentes_paciente->dona_sangre == '0')
                                        No
                                    @else
                                        {{$antecedentes_paciente->dona_sangre}}
                                    @endif
                                </li>
                            </ul>

                            <ul>
                                <li><strong>Aceptas Transfusiones</strong></li>
                                <li>
                                    @if($antecedentes_paciente->transfusion == '1')
                                        Sí
                                    @elseif($antecedentes_paciente->transfusion == '0')
                                        No
                                    @else
                                        {{$antecedentes_paciente->transfusion}}
                                    @endif
                                </li>
                            </ul>

                            <ul>
                                <li><strong>Impedimento Donar</strong></li>
                                <li>
                                    @if($antecedentes_paciente->impedimento_donar == '1')
                                        Sí
                                    @elseif($antecedentes_paciente->impedimento_donar == '0')
                                        No
                                    @else
                                        {{$antecedentes_paciente->impedimento_donar}}
                                    @endif
                                </li>
                            </ul>

                            <ul>
                                <li><i class="feather icon-heart "></i> <strong>Paciente crónico</strong></li>
                                @foreach ($antecedentes as $data)
                                    @if($data->id_tipo_antecedente==2)
                                        <li>{!! $data->antecedente_data->nombre.'<br/>&nbsp;&nbsp;&nbsp;- '.$data->comentario !!}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Alergias</strong></li>
                                @foreach ($antecedentes as $data)
                                    @if($data->id_tipo_antecedente==6)
                                        <li>{!! $data->antecedente_data->nombre.'<br/>&nbsp;&nbsp;&nbsp;- '.$data->comentario !!}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Cirugías</strong></li>
                                @foreach ($antecedentes as $data)
                                    @if($data->id_tipo_antecedente==3)
                                        <li>{!! $data->antecedente_data->procedimiento.'<br/>&nbsp;&nbsp;&nbsp;- '.substr($data->comentario, 0, 30) !!}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><i class=""></i> <strong>Medicamentos de uso crónico</strong></li>
                                @foreach ($antecedentes as $data)
                                    @if($data->id_tipo_antecedente==7)
                                        <li>{!! $data->antecedente_data->nombre_medicamento_cronico.'<br/>&nbsp;&nbsp;&nbsp;- '.$data->antecedente_data->dosis !!}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--LADO DERECHO-->
                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="cirugias_fmu();">Cirugías</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="alergias_fmu();">Alergias</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="responsables_fmu();"><i class="feather icon-users"></i> Responsables</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="confidencial_fmu();"><i class="feather icon-lock"></i> Confidencial</button>
                            <button type="button" class="btn btn-xs btn-primary mb-1" onclick="trat_act_fmu();"><i class="feather icon-file-plus"></i> Tratamientos activos</button>
                            <button type="button" class="btn btn-xs btn-danger mb-1" onclick="c_sos_fmu();"><i class="feather icon-phone"></i> Contacto de emergencia</button>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Tratamientos en curso --}}
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Tratamientos en curso</strong></li>
                                        @if ($tratamiento_activo)
                                            @foreach ( $tratamiento_activo as $receta)
                                                @foreach ( $receta['detalle'] as $detalle)
                                                    <li style="font-size: 12px">{{ $detalle['producto'] }}<br/>&nbsp;&nbsp;<span style="font-size: 9px; font-weight: bold;">{{ $detalle['farmaco'] }}</span></li>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <li>No hay registros</li>
                                        @endif
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Cirugías recientes --}}
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Cirugías recientes</strong></li>
                                        @foreach ($antecedentes as $data)
                                            @if($data->id_tipo_antecedente==3)
                                                {{-- <li>{!! $data->antecedente_data->procedimiento.'<br/>&nbsp;&nbsp;&nbsp;- '.substr($data->comentario, 0, 30) !!}</li> --}}
                                                <li> * {!! $data->antecedente_data->procedimiento.' - '.$data->comentario !!}</li>
                                            @else
                                                {{-- <li>No hay registros</li> --}}
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Medicamentos recientes --}}
                        {{-- <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4"> --}}
                            {{-- <div class="card border-card-primary h-100"> --}}
                                {{-- <div class="card-body"> --}}
                                    {{-- <ul> --}}
                                        {{-- <li><strong>Medicamentos recientes</strong></li> --}}
                                        {{-- <li>No hay registros</li> --}}
                                    {{-- </ul> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}

                        {{-- Prótesis y ortesis --}}
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card border-card-primary h-100">
                                <div class="card-body">
                                    <ul>
                                        <li><strong>Prótesis y ortesis</strong></li>
                                        <li>No hay registros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                            <h5 class="text-c-blue">Historia médica</h5>
                        </div>
                        <!--HISTORIAL - Últimos Examenes-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="enf-cron">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ult-examenes" aria-expanded="false" aria-controls="ult-examenes">
                                    Últimos exámenes
                                    </button>
                                </div>
                                <div id="ult-examenes" class="collapse" aria-labelledby="enf-cron" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-4">
                                                <div class="table-responsive">
                                                    <table id="table_ultimos_examenes" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
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
                                                                    @if ($exam->HoraMedica->id_estado == 6 )
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

                        <!--HISTORIAL - Control de enfermedades cronicas -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="enf-cron">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#enf-cron-c" aria-expanded="false" aria-controls="enf-cron-c">
                                    Control de enfermedades crónicas
                                    </button>
                                </div>
                                <div id="enf-cron-c" class="collapse" aria-labelledby="enf-cron" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-4">
                                                <div class="table-responsive">
                                                    <table id="table_control_cronico" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha Toma</th>
                                                                <th>Tipo</th>
                                                                <th>Detalle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($control_enfer_cronicas)
                                                                @foreach ( $control_enfer_cronicas as $control)
                                                                    <tr>
                                                                        <td>{{ $control['fecha'] }}</td>
                                                                        <td>{{ $control['tipo'] }}</td>
                                                                        <td>
                                                                            <ul>
                                                                                @foreach ($control['detalle'] as $key => $detalle)
                                                                                    <li><strong>{{ $key }}: {{ $detalle }}</strong></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="3"> Sin registros </td>
                                                                </tr>
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

                        <!--HISTORIAL - Historial odontologico -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="mot-consulta">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#odonto-c" aria-expanded="false" aria-controls="odonto-c">
                                    Historial odontológico
                                    </button>
                                </div>
                                <div id="odonto-c" class="collapse" aria-labelledby="odonto" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--HISTORIAL - Historial niño sano -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="nino-sano">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#nino-sano-c" aria-expanded="false" aria-controls="nino-sano-c">
                                    Historial de niño sano
                                    </button>
                                </div>
                                <div id="nino-sano-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#nino-sano">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--HISTORIAL - Historial Médico-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="etc">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#etc-c" aria-expanded="false" aria-controls="etc-c">
                                    Historial Médico
                                    </button>
                                </div>
                                <div id="etc-c" class="collapse" aria-labelledby="etc" data-parent="#mot-consulta">
                                    <div class="card-body-aten-a">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 pb-4">
                                                <table id="table_atenciones_profesional" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Fecha</th>
                                                            <th class="text-center align-middle">Profesional</th>
                                                            <th class="text-center align-middle">Diagnóstico</th>
                                                            <th class="text-center align-middle">Recetas</th>
                                                            <th class="text-center align-middle">Exámenes</th>
                                                            <!--<th class="text-center align-middle">Archivos </th>
                                                            <th class="text-center align-middle">Ficha</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($fichas) && $fichas->count() > 0)
                                                            @foreach ($fichas as $f)
                                                                <tr>
                                                                    <td class="text-center align-middle">
                                                                        {{ \Carbon\Carbon::parse($f->created_at)->format('d-m-Y') }}
                                                                    </td>

                                                                    <td class="text-center align-middle">{{ $f->profesional->nombre }} {{ $f->profesional->apellido_uno }} {{ $f->profesional->apellido_dos }}<br>
                                                                        @foreach ($especialidad as $esp)
                                                                            @if($esp->id==$f->profesional->id_especialidad)
                                                                            <b>{{ $esp->nombre }}<b><br>
                                                                            @endif
                                                                        @endforeach
                                                                        {{--@foreach ($sub_tipo_especialidad as $sub_esp)
                                                                            @if($sub_esp->id==$f->profesional->id_sub_tipo_especialidad)
                                                                        <b>{{ $sub_esp->nombre }}<b><br>
                                                                            @endif
                                                                        @endforeach --}}
                                                                    </td>

                                                                    <td class="text-center align-middle">{{ $f->hipotesis_diagnostico }}</td>

                                                                    <td class="text-center align-middle">
                                                                        <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_receta_fmu({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a>
                                                                    </td>

                                                                    <td class="text-center align-middle">
                                                                        <a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes_fmu({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <span>
                                                                <h5>no existen registros</h5>
                                                            </span>
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
    </div>
</div>
@endsection


@section('page-styles')
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('css/ficha_medica_unica.css') }}">
<!-- Estilo cards -->
<link rel="stylesheet" href="{{ asset('css/iconos-sdi.css') }}">

<style type="text/css">
    .auth-wrapper
    {
        background-color: #f3f3f3!important;
    }
</style>
@endsection


<!-- SCRIPT -->
@section('page-script')

    <script>
        $(document).ready(function () {

            $('#table_atenciones_profesional').DataTable({
                    responsive: true,
                    "columnDefs": [
                        { "type": "date", "targets": 0 }
                    ]
            });

            $('#table_control_cronico').DataTable({
                    responsive: true,
                    "columnDefs": [
                        { "type": "date", "targets": 0 }
                    ]
            });


            $('#table_ultimos_examenes').DataTable({
                    responsive: true,
                    "columnDefs": [
                        { "type": "date", "targets": 0 }
                    ]
            });
        });

        function formatDate(date)
        {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }

        {{-- ABRIR ARCHIVOS --}}
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

        function verResultadoExamen(id_examen)
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


    <!-- Tablas ficha médica única-->
    <script src="{{ asset('js/tablas_patologias_cronicas_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_tratamientos_antecedentes_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_odontologia_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_obstetricos_control_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_informacion_confidencial_fmu.js') }}"></script>
    <script src="{{ asset('/js/ficha_medica/main.js') }}"></script>

@endsection

<!--Modals-->
@include("general.secciones_ficha.modales_fmu.alergias_fmu")
@include("general.secciones_ficha.modales_fmu.responsables_fmu")
@include("general.secciones_ficha.modales_fmu.cirugias_fmu")
@include("general.secciones_ficha.modales_fmu.confidencial_fmu")
@include("general.secciones_ficha.modales_fmu.trat_act_fmu")
{{-- @include("general.secciones_ficha.modales_fmu.c_sos_fmu",['datos' => $datos]) --}}
@include("general.secciones_ficha.modales_fmu.c_sos_fmu")


@include("general.secciones_ficha.modales_fmu.hist_medico_recetas_fmu")
@include("general.secciones_ficha.modales_fmu.hist_medico_exa_fmu")
