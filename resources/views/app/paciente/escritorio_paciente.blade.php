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
                            <h5 class="m-b-10 font-weight-bold">Escritorio paciente</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}">Mi escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones superiores-->

        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col mb-3">
                <div class="card subir mb-2 h-100">
                    <a href="{{ ROUTE('paciente.agendar_hora') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-50 text-center mt-1" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-2"> Reservar hora médica </h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card subir mb-3 h-100">
                    <a href="{{ ROUTE('paciente.mis_profesionales') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">
                            <h5 class="mt-2"> Mis profesionales </h5>
                        </div>
                    </a>
                </div>
            </div>
                <!--
                <div class="card subir">
                    <a href="{{ ROUTE('paciente.mi_ficha') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/ficha_1.svg') }}">
                            <h5 class="mt-2"> Mi Ficha Médica Única </h5>
                        </div>
                    </a>
                </div>
                -->
            <div class="col mb-3">
                <div class="card subir mb-2 h-100">
                    <a href="{{ ROUTE('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/fmu.svg') }}">
                            <h5 class="mt-1"> Mi Ficha Médica Única </h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card subir mb-2 h-100">
                    <a href="{{ ROUTE('paciente.receta') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/receta_online.svg') }}">
                            <h5 class="mt-2">Receta Online </h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--CIERRE: Row Botones -->
        <!--Row Mis Horas Médicas y Botón Examenes-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-3">
                <div class="card h-100 pb-0 mb-3">
                    <div class="card-header text-center bg-c-info">
                        <h5 class="text-white d-inline text-center" style="font-size: 1.2rem;">Mis horas médicas del día</h5>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="horas_medicas_paciente" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th>Acción</th>
                                        <th>Profesional</th>
                                        <th>Información de Atención</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @if ($hora_medica)
                                            @foreach ($hora_medica as $hora)
                                                <tr>
                                                    <td class="align-middle">
                                                        @switch($hora->id_estado)
                                                            @case(1)
                                                                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" onclick="confirmar({{ $hora->id }});">
                                                                    <i class="feather icon-check"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" onclick="anular({{ $hora->id }});">
                                                                    <i class="feather icon-x"></i>
                                                                </button>
                                                                @break

                                                            @case(2)
                                                                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" disabled="disabled">
                                                                    <i class="feather icon-check"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" onclick="anular({{ $hora->id }});">
                                                                    <i class="feather icon-x"></i>
                                                                </button>
                                                                @break

                                                            @case(8)
                                                                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" onclick="confirmar({{ $hora->id }});">
                                                                    <i class="feather icon-check"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" onclick="anular({{ $hora->id }});">
                                                                    <i class="feather icon-x"></i>
                                                                </button>
                                                                @break

                                                            @default
                                                                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" disabled="disabled">
                                                                    <i class="feather icon-check"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" disabled="disabled">
                                                                    <i class="feather icon-x"></i>
                                                                </button>
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        {{ $hora->nombre_profesional.' '.$hora->apellido_uno_profesional }}<br>
                                                        {{-- {{ $hora->nombre_especialidad }} --}}
                                                        @if (!empty($hora->nombre_sub_tipo_especialidad))
                                                            {{ $hora->nombre_sub_tipo_especialidad }}
                                                        @else
                                                            {{ $hora->nombre_tipo_especialidad }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $hora->nombre_lugar_atencion }}<br>
                                                        {{ $hora->direccion_lugar_atencion }}, {{ $hora->numero_dir_lugar_atencion }}<br>
                                                        <span style="font-weight:bold;">{{ date('d-m-Y', strtotime($hora->fecha_consulta)) }} {{ date('H:i', strtotime($hora->hora_inicio)) }} hrs</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span style="background-color: {{ $hora->color_estado }}; padding: 5px; border-radius: 12%;">{{ $hora->texto_estado }}</span>

                                                        {{-- <span class="badge badge-danger">Hora rechazada</span> --}}
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
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="card h-100 mb-3 d-none d-lg-block">
                    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/profesional_no_inscrito.svg') }}"
                        alt="Flujo de caja">
                    <a href="{{ ROUTE('paciente.acceso_pni') }}" class="btn btn-arrastre"
                        type="button">
                        <div class="card-body px-0">
                            <h5>Atención por profesional no registrado</h5>
                            <p>
                                Haga click acá para ser atendido, los datos de su atención quedarán
                                registrados en su Ficha Médica Única
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                <div class="card bg-primary h-100 mb-3 d-block d-lg-none">
                    <a href="{{ ROUTE('paciente.acceso_pni') }}" class="btn  btn-arrastre"
                        type="button">
                        <div class="card-body">
                            <h5 class=" text-white">Atención por profesional no registrado</h5>
                            <p class="text-white">
                                Haga click acá para ser atendido, los datos de su atención quedarán registrados en su Ficha Médica Única
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--Cierre: Botones acceso examenes y profesional no inscrito-->

        <!--Row Botones-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="https://www.cronicos.cl/" class="btn" type="button">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="my-auto text-white ml-3 text-left">Portal Crónicos</h5>
                                    <img class="wid-70 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="http://cronicos.cl/registro.php" target="_blank"  class="btn" type="button">
                            <div class="card-body">
                                <div class="row my-auto">
                                    <h5 class="my-auto text-white text-left">Inscriba sus<br> Medicamentos</h5>
                                    <img class="wid-70 ml-auto" src="{{ asset('images/iconos/medicamentos.svg') }}">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Row Botones-->
    </div>
</div>
@endsection

@section('page-script')
    <script>
        function confirmar(id)
        {
            $('.btn-confirmar-hora').attr('disabled', true);
            $('.btn-anular-hora').attr('disabled', true);

            let url = "{{ route('hora.medica.confirmar') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_hora_medica: id,
                    _token: CSRF_TOKEN,
                },
                success: function(data)
                {
                    if (data != null)
                    {
                        data = JSON.parse(data);
                        swal({
                            title: "Exito!",
                            text: "Se ha confirmado su hora medica",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                    else
                    {
                        swal({
                            title: "Error!",
                            text: "Se ha presentado un problema en la confirmación su hora medica.\n Intente de nuevo.",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                }
            });
        }

        function anular(id)
        {
            $('.btn-confirmar-hora').attr('disabled', true);
            $('.btn-anular-hora').attr('disabled', true);

            let url = "{{ route('hora.medica.cancelar') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_hora_medica: id,
                    _token: CSRF_TOKEN,
                },
                success: function(data)
                {
                    if (data != null)
                    {
                        data = JSON.parse(data);
                        swal({
                            title: "Exito!",
                            text: "Se ha Cancelado su hora medica",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                    else
                    {
                        swal({
                            title: "Error!",
                            text: "Se ha presentado un problema en la Cancelación su hora medica.\n Intente de nuevo.",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                }
            });
        }

        function cargar_horas_medicas()
        {
            let url = "{{ route('paciente.hora.medica.ver') }}";

            $('#horas_medicas_paciente tbody').html('');

            $.ajax({
                url: url,
                type: "GET",
                data: {},
                success: function(data) {
                    if(data != null)
                    {
                        if (data.estado == 1)
                        {
                            if(data.registros.length > 0)
                            {
                                $.each(data.registros, function (key, value) {
                                    var html = '';
                                    html += '<tr>';
                                    html += '    <td class="align-middle">';
                                    switch(value.id_estado)
                                    {
                                        case 1:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" onclick="confirmar('+value.id+');">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" onclick="anular('+value.id+');">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                            break

                                        case 2:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" disabled="disabled">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora"  onclick="anular('+value.id+');">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                            break

                                        case 8:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" onclick="confirmar('+value.id+');">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" onclick="anular('+value.id+');">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                            break

                                        default:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" disabled="disabled">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" disabled="disabled">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                    }
                                    html += '    </td>';
                                    html += '    <td>';
                                    html += '        '+value.nombre_profesional+' '+value.apellido_uno_profesional+'<br>';
                                    // html += '        {{-- '+value.nombre_especialidad+' --}}';
                                    if (value.nombre_sub_tipo_especialidad != null)
                                        html += '            '+value.nombre_sub_tipo_especialidad+'';
                                    else
                                        html += '            '+value.nombre_tipo_especialidad+'';

                                    html += '    </td>';
                                    html += '    <td>';
                                    html += '        '+value.nombre_lugar_atencion+'<br>';
                                    html += '        '+value.direccion_lugar_atencion+', '+value.numero_dir_lugar_atencion+'<br>';

                                    // var dia_formato = moment(value.fecha_consulta).format('DD-MM-YYYY');
                                    // var hora_formato = moment(value.fecha_consulta+' '+value.hora_inicio).format('HH:mm');
                                    // html += '        <span style="font-weight:bold;">'+dia_formato+' '+hora_formato+'hrs</span>';

                                    var dia_hora_formato = moment(value.fecha_consulta+' '+value.hora_inicio).format('DD-MM-YYYY HH:mm');

                                    html += '        <span style="font-weight:bold;">'+dia_hora_formato+' hrs</span>';
                                    html += '    </td>';
                                    html += '    <td class="align-middle">';
                                    html += '        <span style="background-color: '+value.color_estado+'; padding: 5px; border-radius: 12%;">'+value.texto_estado+'</span>';
                                    html += '    </td>';
                                    html += '</tr>';
                                    $('#horas_medicas_paciente tbody').append(html);
                                });
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection
