@extends('template.paciente.template')
@section('content')
@php
    $permisoBonoAutorizado = !empty(session('lic_token'))
        && session('lic_estado') == 1
        && session('lic_tipo') == 'bono';
@endphp
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

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="feather icon-alert-triangle mr-2"></i>
                {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="feather icon-check-circle mr-2"></i>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="feather icon-alert-circle mr-2"></i>
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!--Botones superiores-->

        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col mb-3">
                <div class="card subir mb-2 h-100 text-center pt-2" style="cursor:pointer">
                    <a href="{{ ROUTE('paciente.agendar_hora') }}">
                            <img class="wid-40 text-center mt-1" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-2"> Reservar hora médica </h5>
                    </a>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card subir mb-2 h-100 text-center pt-2" style="cursor:pointer">
                    <a href="{{ ROUTE('paciente.mis_profesionales') }}">
                            <img class="wid-50 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">
                            <h5 class="mt-2"> Mis profesionales </h5>
                    </a>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card subir mb-2 h-100 text-center pt-2" style="cursor:pointer">
                    <a href="{{ ROUTE('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">
                            <img class="wid-50 text-center" src="{{ asset('images/iconos/fmu.svg') }}">
                            <h5 class="mt-1"> Mi Ficha Médica Única </h5>
                    </a>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card subir mb-2 h-100 text-center pt-2" style="cursor:pointer">
                    <a href="{{ ROUTE('paciente.receta') }}">
                        <img class="wid-50" src="{{ asset('images/iconos/receta_online.svg') }}">
                        <h5 class="mt-2">Receta Online </h5>
                    </a>
                </div>
            </div>
        </div>

        <!--CIERRE: Row Botones -->
        <!--Row Mis Horas Médicas y Botón Examenes-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-3">
                  <!--<div class="card bono-card" style="cursor:pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                <div class="icon-bono mr-3">
                                    <i class="feather icon-credit-card"></i>
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="mb-1 font-weight-bold f-18 text-dark">
                                        Compre su bono de atención
                                    </h5>

                                    <p class=" d-flex align-items-center">
                                        <i class="feather icon-alert-circle text-warning mr-2"></i>
                                        Para comprar su bono debe tener instalada la aplicación SDI en su dispositivo móvil.
                                    </p>
                                </div>

                                <div class="ml-3">
                                    <i class="fas fa-chevron-right text-primary"></i>
                                </div>

                            </div>

                        </div>
                    </div>-->
                    <div class="card  h-100 pb-0 mb-3">
                    <div class="card-header  bg-c-info">
                        <h4 class="text-white f-22 pt-2"><i class="feather icon-calendar text-white mr-2"></i> Mis horas médicas</h4>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:245px;">
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
                                                        <strong>{{ $hora->nombre_profesional.' '.$hora->apellido_uno_profesional }}</strong><br>
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
                                                        <span style="background-color: {{ $hora->color_estado }}; padding: 5px 8px; border-radius: 50px; font-size: 12px; color: #fff; font-weight: 600;">{{ $hora->texto_estado }}</span>

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

                   <div class="card bono-card border-primary" >
                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                @if($permisoBonoAutorizado)
                                    <a href="{{ route('paciente.reservar_bono') }}" class="d-flex align-items-center w-100">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 font-weight-bold f-20 text-dark">
                                                <i class="feather icon-credit-card text-c-blue mr-2"></i> Compra de bonos
                                            </h6>

                                            <p class="d-flex align-items-center mb-1">
                                                Ya tienes autorización activa para comprar bonos.
                                            </p>

                                            <span class="badge badge-success">
                                                <i class="feather icon-check-circle"></i> Autorizado
                                            </span>
                                        </div>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" class="d-flex align-items-center w-100" onclick="solicitarPermisoCompraBono()" data-toggle="modal" data-target="#modal_bono">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 font-weight-bold f-20 text-dark">
                                                <i class="feather icon-credit-card text-c-blue mr-2"></i> Compra de bonos
                                            </h6>

                                            <p class="d-flex align-items-center mb-1">
                                                Para comprar su bono debe autorizar el acceso desde la aplicación SDI.
                                            </p>

                                            <span class="badge badge-warning">
                                                <i class="feather icon-lock"></i> Requiere autorización
                                            </span>
                                        </div>
                                    </a>
                                @endif

                                <div class="ml-3">
                                    <i class="fas fa-chevron-right text-primary"></i>
                                </div>

                            </div>

                        </div>
                    </div>
                 <!--<div class="card bono-card" style="cursor:pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                <div class="icon-bono mr-2">
                                      <img class="rounded-circle" src="{{ asset('images/iconos/pago_bono.svg') }}">
                                </div>

                                <div class="flex-grow-1">
                                    <h6 class="mb-1 font-weight-bold f-18 text-dark">
                                        Bono de atención online
                                    </h6>

                                    <p class=" d-flex align-items-center">

                                        Para comprar su bono debe tener instalada la aplicación SDI en su dispositivo móvil.
                                    </p>
                                </div>

                                <div class="ml-3">
                                    <i class="fas fa-chevron-right text-primary"></i>
                                </div>

                            </div>

                        </div>
                    </div>-->

                <div class="card profesional-card">
                        <div class="card-body p-4">

            <div class="media">

                <div class="profesional-icon mr-4">
                    <img class="rounded-circle" src="{{ asset('images/iconos/profesional_no_inscrito.svg') }}">
                </div>

                <div class="media-body">

                    <h4 class="profesional-title mb-3">
                        Atención por profesional<br>
                        no registrado
                    </h4>

                    <p class="profesional-text mb-0">
                        Registre una atención realizada por un profesional
                        externo y almacene la información directamente
                        en su Ficha Médica Única.
                    </p>

                </div>

            </div>

            <div class="profesional-divider"></div>

            <a href="{{ ROUTE('paciente.acceso_pni') }}" class="btn btn-block profesional-btn">
                Registrar atención
                <i class="fas fa-chevron-right"></i>
            </a>

                        </div>
                    </div>

  </div>
        </div>

        <!--Cierre: Botones acceso examenes y profesional no inscrito-->

        <!--Row Botones-->
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="https://www.cronicos.cl/" class="btn" type="button">
                            <div class="card-body">
                                <div class="row">
                                    <h6 class="my-auto f-18 text-white ml-3 text-left">Portal Crónicos</h6>
                                    <img class="wid-50 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="http://cronicos.cl/registro.php" target="_blank"  class="btn" type="button">
                            <div class="card-body">
                                <div class="row my-auto">
                                    <h6 class="my-auto f-18 text-white text-left">Inscriba sus<br> Medicamentos</h6>
                                    <img class="wid-50 ml-auto" src="{{ asset('images/iconos/medicamentos.svg') }}">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="{{ route('app.descarga') }}" target="_blank"  class="btn" type="button">
                            <div class="card-body">
                                <div class="row my-auto">
                                    <h6 class="my-auto f-18 text-white text-left">Descarga nuestra aplicación <br>SDIPASS</h6>
                                    <img class="wid-50 ml-auto" src="{{ asset('images/iconos/lock.svg') }}">
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

<div class="modal fade" id="modal_bono" tabindex="-1" role="dialog" aria-labelledby="modal_bonoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modal_bonoLabel">Solicitud compra de bono</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div id="modal_bono_icon" class="mb-3">
                    <i class="feather icon-loader spin"></i>
                </div>
                <div id="modal_bono_message">
                    <p class="text-center mb-0">Se está creando la solicitud...</p>
                </div>
                <div class="mt-3">
                    <span id="modal_bono_status" class="badge badge-secondary">Estado: Enviando</span>
                </div>
                <div class="mt-4 text-left">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-2"><strong>Token:</strong> <span id="modal_bono_token">-</span></li>
                        <li class="list-group-item py-2"><strong>Resultado:</strong> <span id="modal_bono_result">Pendiente</span></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        window.PERMISO_BONO_AUTORIZADO = @json($permisoBonoAutorizado);

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
                                    html += '        <strong>'+value.nombre_profesional+' '+value.apellido_uno_profesional+'</strong><br>';
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
                                    html += '        <span style="background-color: '+value.color_estado+'; padding: 5px 8px; font-size:12px; border-radius: 50px;">'+value.texto_estado+'</span>';
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

        function setBonoModalState(statusText, badgeClass, messageHtml, tokenValue, resultText, iconHtml)
        {
            $('#modal_bono_status')
                .text(statusText)
                .removeClass('badge-secondary badge-warning badge-success badge-danger badge-info')
                .addClass(badgeClass);
            $('#modal_bono_message').html(messageHtml);
            $('#modal_bono_token').text(tokenValue || '-');
            $('#modal_bono_result').text(resultText || '-');
            $('#modal_bono_icon').html(iconHtml || '<i class="feather icon-loader spin"></i>');
        }

        function solicitarPermisoCompraBono()
        {
            if (window.PERMISO_BONO_AUTORIZADO) {
                window.location.href = "{{ route('paciente.reservar_bono') }}";
                return;
            }

            let url = "{{ route('paciente.solicitar.permiso.bono') }}";

            setBonoModalState(
                'Enviando solicitud',
                'badge-secondary',
                '<p class="text-center mb-0">Creando solicitud de compra de bono...</p>',
                '-',
                'Pendiente',
                '<i class="feather icon-loader spin"></i>'
            );

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                },
                success: function(data)
                {
                    if (data != null)
                    {
                        if (typeof data === 'string') {
                            data = JSON.parse(data);
                        }
                         console.log(data);
                        if (data.estado == 1 && data.log_users_devices && data.log_users_devices.token)
                        {
                            setBonoModalState(
                                'Solicitud enviada',
                                'badge-warning',
                                '<p class="text-center mb-0">Solicitud creada. Esperando aprobación.</p>',
                                data.log_users_devices.token,
                                'En espera',
                                '<i class="feather icon-loader spin"></i>'
                            );
                            validar_autorizacion_licencia(data.log_users_devices.token);
                        }
                        else
                        {
                            setBonoModalState(
                                'Error en solicitud',
                                'badge-danger',
                                '<p class="text-center mb-0">Se ha presentado un problema en la solicitud de compra de bono. Intente nuevamente.</p>',
                                data.log_users_devices ? data.log_users_devices.token : '-',
                                'Error',
                                '<i class="feather icon-alert-circle text-danger"></i>'
                            );
                        }
                    }
                    else
                    {
                        setBonoModalState(
                            'Error',
                            'badge-danger',
                            '<p class="text-center mb-0">No se recibió respuesta del servidor.</p>',
                            '-',
                            'Error',
                            '<i class="feather icon-alert-circle text-danger"></i>'
                        );
                    }
                },
                error: function()
                {
                    setBonoModalState(
                        'Error de red',
                        'badge-danger',
                        '<p class="text-center mb-0">No se pudo conectar con el servidor.</p>',
                        '-',
                        'Error',
                        '<i class="feather icon-alert-circle text-danger"></i>'
                    );
                }
            });
        }

         function validar_autorizacion_licencia(token)
        {
            let url = "{{ route('paciente.solicitud.bono') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    token: token,
                },
                success:function(data){
                    console.log(data);
                    if (data == null)
                    {
                        setBonoModalState(
                            'Error',
                            'badge-danger',
                            '<p class="text-center mb-0">No se recibió respuesta de validación.</p>',
                            token,
                            'Error',
                            '<i class="feather icon-alert-circle text-danger"></i>'
                        );
                        return;
                    }

                    if (typeof data === 'string') {
                        data = JSON.parse(data);
                    }

                    var message = '<p class="text-center mb-0">' + (data.msj || 'Actualizando estado...') + '</p>';
                    var tokenText = token;
                    var resultText = 'Pendiente';
                    var badgeClass = 'badge-warning';
                    var iconHtml = '<i class="feather icon-loader spin"></i>';
                    var statusText = 'En espera';

                    if (data.estado == 1)
                    {
                        if (data.estado_log == 0)
                        {
                            statusText = 'En espera';
                            resultText = 'Pendiente';
                            badgeClass = 'badge-warning';
                            iconHtml = '<i class="feather icon-loader spin"></i>';
                            setBonoModalState(statusText, badgeClass, message, tokenText, resultText, iconHtml);
                            setTimeout(function(){ validar_autorizacion_licencia(token); }, 2000);
                            return;
                        }
                        else if (data.estado_log == 1)
                        {
                            statusText = 'Aceptada';
                            resultText = 'Aceptada';
                            badgeClass = 'badge-success';
                            iconHtml = '<i class="feather icon-check-circle text-success"></i>';
                            var redirectUrl = "{{ route('paciente.reservar_bono') }}"; // Cambia a la ruta deseada
                            window.location.href = redirectUrl;
                            return;
                        }
                        else if (data.estado_log == 2)
                        {
                            statusText = 'Rechazada';
                            resultText = 'Rechazada';
                            badgeClass = 'badge-danger';
                            iconHtml = '<i class="feather icon-x-circle text-danger"></i>';
                        }
                        else if (data.estado_log == 3)
                        {
                            statusText = 'Cancelada';
                            resultText = 'Cancelada';
                            badgeClass = 'badge-danger';
                            iconHtml = '<i class="feather icon-x-circle text-danger"></i>';
                        }
                        else
                        {
                            statusText = 'No válido';
                            resultText = 'No válido';
                            badgeClass = 'badge-secondary';
                            iconHtml = '<i class="feather icon-alert-circle text-warning"></i>';
                        }
                    }
                    else
                    {
                        statusText = 'No válido';
                        resultText = 'No válido';
                        badgeClass = 'badge-danger';
                        iconHtml = '<i class="feather icon-alert-circle text-danger"></i>';
                    }

                    setBonoModalState(statusText, badgeClass, message, tokenText, resultText, iconHtml);
                },
                error: function()
                {
                    setBonoModalState(
                        'Error de validación',
                        'badge-danger',
                        '<p class="text-center mb-0">No se pudo validar el estado.</p>',
                        token,
                        'Error',
                        '<i class="feather icon-alert-circle text-danger"></i>'
                    );
                }
            });
        }


    </script>
@endsection
