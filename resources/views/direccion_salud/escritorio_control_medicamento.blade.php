@extends('template.direccion_salud.template')

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Control de Medicamentos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->


            <div class="row m-b-10" >
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-white text-c-blue py-3" id="tabla-registros">
                            <h6 class="font-weight-bold text-dark f-20">Registros</h6>
                        </div>
                        <div id="tabla-registros-c" class="collapse show" aria-labelledby="tabla-registros" data-parent="#tabla-registros">
                            <div class="card-body shadow-none">
                                <div class="row">
                                    {{-- filtros --}}
                                    <div class="col-md-12">
                                        <div class="form-row mb-2">
                                            <div class="col-12">
                                            <div class="card-lineal">
                                                <div class="card-body-lineal">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Región</label>
                                                            <select class="form-control form-control-sm" id="filtro_region">
                                                                <option value="">Todas</option>
                                                                @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Ciudad</label>
                                                            <select class="form-control form-control-sm" id="filtro_ciudad">
                                                                <option value="">Todas</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Año</label>
                                                            <select class="form-control form-control-sm" name="filtro_anio" id="filtro_anio">
                                                                @for ($i = 2023; $i <= intval(date('Y')); $i++)
                                                                    @php
                                                                        $selected = '';
                                                                        if($anio == $i) $selected = 'selected';
                                                                        else $selected = '';
                                                                    @endphp
                                                                    <option value="{{ $i }}" {{ $selected }}>{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Mes</label>
                                                            <select class="form-control form-control-sm" name="filtro_mes" id="filtro_mes">
                                                                <option value="">Seleccione</option>
                                                                @php
                                                                    $meses = array('', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
                                                                @endphp
                                                                @for ($i = 1; $i <= 12; $i++)
                                                                    <option  value="{{ $i }}" {{ $mes == $i ? 'selected' : '' }}>{{$meses[$i]}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="filtrar_control_med();"><i class="feather icon-search"></i> Buscar</button>
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  tablas de registros --}}
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabla_registros_control_med" class=" display table dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>PRODUCTO</th>
                                                        <th>FARMACO</th>
                                                        <th>PRESENTACION</th>
                                                        <th>F. INDICACION</th>
                                                        <th>PACIENTE</th>
                                                        <th>PROFESIONAL</th>
                                                        <th>CANT.COMPRAR</th>
                                                        <th>CANT. VENDIDA</th>
                                                        <th>*F. VENTA</th>
                                                        <th>*FARMACIA</th>
                                                        <th>ACCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($registros)
                                                        @foreach ($registros as $receta)
                                                            @foreach ($receta['detalle'] as $detalle)
                                                                <tr>
                                                                    <td>{{ $detalle['producto'] }}</td>
                                                                    <td>{{ $detalle['farmaco'] }}</td>
                                                                    <td>{{ $detalle['presentacion'] }}</td>
                                                                    <td>{{ date('d-m-Y', strtotime($receta['created_at'])) }}</td>
                                                                    <td>{{ $receta['paciente']['nombres'].' '.$receta['paciente']['apellido_uno'].' '.$receta['paciente']['apellido_dos'] }}<br>{{ $receta['paciente']['rut'] }}</td>
                                                                    <td>{{ $receta['profesional']['nombre'].' '.$receta['profesional']['apellido_uno'].' '.$receta['profesional']['apellido_dos'] }}<br>{{ $receta['profesional']['rut'] }}</td>
                                                                    <td>{{ $detalle['cantidad_compra'] }}</td>
                                                                    <td>{{ $detalle['cantidad_vendida'] }}</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td><button type="button" class="btn btn-sm btn-primary" onclick="ver_pdf_receta({{ $receta['id_ficha_atencion'] }});"><i class="fa fa-file-pdf"></i> Ver</button></td>
                                                                </tr>
                                                            @endforeach
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
        $(document).ready(function () {
             $('#filtro_region').on('change', function() {
                buscar_ciudad_filtro();
            });
            $('#tabla_registros_control_med').DataTable({
                responsive: true,
            });
        });

        // Nueva función para buscar ciudades en el filtro
    function buscar_ciudad_filtro() {
        let region = $('#filtro_region').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                let ciudades = $('#filtro_ciudad');
                ciudades.find('option').remove();
                ciudades.append('<option value="">Todas</option>');
                $(data).each(function(i, v) {
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });
            } else {
                $('#filtro_ciudad').html('<option value="">Todas</option>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

        function filtrar_control_med()
        {
            var valido = 1;
            var mensaje = '';
            var anio = $('#filtro_anio').val();
            var mes = $('#filtro_mes').val();

            $('#tabla_registros_control_med tbody').html('');
            $('#tabla_registros_control_med').DataTable().destroy();

            if(anio == '')
            {
                valido = 0;
                mensaje = 'Anio Requerido para filtrar.\n';
            }

            if(mes == '')
            {
                valido = 0;
                mensaje = 'Mes Requerido para filtrar.\n';
            }

            if(valido == 1)
            {
                var url = '{{ route("ministerio.control_medicamento.buscar") }}';

                $.ajax({
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    url: url,
                    data: {
                        anio : anio,
                        mes : mes,
                    }
                })
                .done(function(data)
                {
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        $('#tabla_registros_control_med tbody').html('');

                        // Contar medicamentos por día
                        var medicamentosPorDia = {};

                        $.each(data.registros, function (key, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            var fechaFormato = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();

                            $.each(value.detalle, function (key2, value2)
                            {
                                var clave = value2.producto + '|' + value2.farmaco + '|' + fechaFormato;
                                if (!medicamentosPorDia[clave]) {
                                    medicamentosPorDia[clave] = 0;
                                }
                                medicamentosPorDia[clave]++;
                            });
                        });

                        $.each(data.registros, function (key, value)
                        {

                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();

                            $.each(value.detalle, function (key2, value2)
                            {
                                var clave = value2.producto + '|' + value2.farmaco + '|' + fecha;
                                var esDuplicado = medicamentosPorDia[clave] > 1;
                                var claseBg = esDuplicado ? 'style="background-color: #ffcccc; color: #cc0000; font-weight: bold;"' : '';

                                var html = '';
                                html += '<tr ' + claseBg + '>';
                                html += '   <td>'+value2.producto+'</td>';
                                html += '   <td>'+value2.farmaco+'</td>';
                                html += '   <td>'+value2.presentacion+'</td>';
                                html += '   <td>'+fecha+'</td>';
                                html += '   <td>'+value.paciente.nombres+' '+value.paciente.apellido_uno+' '+value.paciente.apellido_dos+'<br>'+value.paciente.rut+'</td>';
                                html += '   <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+' '+value.profesional.apellido_dos+'<br>'+value.profesional.rut+'</td>';
                                html += '   <td>'+value2.cantidad_compra+'</td>';
                                html += '   <td>'+value2.cantidad_vendida+'</td>';
                                html += '   <td>-</td>';
                                html += '   <td>-</td>';
                                html += '   <td><button type="button" class="btn btn-sm btn-primary" onclick="ver_pdf_receta('+value.id_ficha_atencion+');"><i class="fa fa-file-pdf"></i> Ver</button></td>';

                                html += '</tr>';

                                $('#tabla_registros_control_med tbody').append(html);
                            });
                        });


                         $('#tabla_registros_control_med').DataTable({
                            responsive: true,
                            buttons: ['csv', 'excel'],
                        });
                    }
                    else
                    {
                        console.log('sin registros');

                         $('#tabla_registros_control_med').DataTable({
                            responsive: true,
                            buttons: ['csv', 'excel'],
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
        }

        function ver_pdf_receta(id_ficha_atencion)
        {
            let url = "{{ route('pdf.receta_medicamentos') }}";
            Fancybox.show(
                [
                    {
                    src: "{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion="+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }
    </script>
@endsection

