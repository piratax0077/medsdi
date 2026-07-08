@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Ingresos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Volver escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Libro de ingresos y ventas</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Libro de Ventas</h4>
                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_venta">
                                            <i class="feather icon-plus"></i> Registrar Nueva Venta
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="alert alert-light border mb-0">
                                                <strong>Mes actual:</strong> {{ ($fecha_actual ?? now())->translatedFormat('F Y') }} |
                                                <strong>Registros:</strong> {{ $cantidad_ingresos_mes ?? 0 }} |
                                                <strong>Total ingresos:</strong> ${{ number_format(($total_ingresos_mes ?? 0), 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div style="overflow-x:auto;">
                                    <table id="tabla_ingresos_cm" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">N° bono</th>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Glosa</th>
                                                <th class="text-center align-middle">Valor</th>
                                                <th class="text-center align-middle">Rendido</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse(($ingresos_mes ?? []) as $ingreso)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>{{ $ingreso->numero_bono ?? '-' }}</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ !empty($ingreso->fecha_atencion) ? \Carbon\Carbon::parse($ingreso->fecha_atencion)->format('d/m/Y') : '-' }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $ingreso->glosa ?? '-' }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>${{ number_format((float) ($ingreso->valor_atencion ?? 0), 0, ',', '.') }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ ((int) ($ingreso->rendido ?? 0) === 1) ? 'Sí' : 'No' }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="align-middle text-center" colspan="5">No hay ingresos registrados para el mes actual.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                            @include('app.contabilidad.modals.registrar_venta')


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
<!--****Cierre Container Completo****-->


@endsection



@section('modales-profesionales_inst')

    @include('app.adm_cm.modal_adm.datos_banco')
    @include('app.adm_cm.modal_adm.horario_usuario')
    @include('app.adm_cm.modal_adm.convenio_usuario')

    {{--  @include('app.adm_cm.modal_adm.contacto')  --}}
    @include('app.contabilidad.modals.remuneraciones')
    @include('app.contabilidad.modals.modal_pagado')

    @include('app.adm_cm.modal_adm.liquidacion_profesionales')
@endsection
<script>
    function carga_por_fecha()
    {
        var ano = $('#filtro_anio').val();
        var mes = $('#filtro_mes').val();
        window.location.href = "{{ route('adm_cm.sueldos') }}?filtro_anio="+ano+"&filtro_mes="+mes+"";
    }
    {{--
    function cambio_estado_personal(id) {

        let id_asistente = id;
        let url = "{{ route('adm_cm.cambio_estado_personal') }}";

        if ($('#estado_personal').prop('checked')) {
            let confirmacion = confirm('Esta seguro que desea habilitar a este personal?');
            if (confirmacion == true) {

                let estado = 1;

                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            //_token: _token,
                            id_asistente: id_asistente,
                            estado: estado
                        },
                    })
                    .done(function(data) {
                        if (data == 'ok') {
                            $('#estado_personal').prop('checked', true);

                        } else {
                            swal({
                                title: "Error al Habilitar al Personal",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            // setTimeout(function() {
                            //     location.reload()
                            // }, 4000);
                            // alert('Error al Habilitar al o la asistente');
                            $('#estado_personal').prop('checked', false);
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });

            } else {
                $('#estado_personal').prop("checked", false);
            }
        } else {
            let confirmacion = confirm('Esta seguro que desea deshabilitar a este Personal?');
            if (confirmacion == true) {

                let estado = 0;

                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            //_token: _token,
                            id_asistente: id_asistente,
                            estado: estado
                        },
                    })
                    .done(function(data) {
                        if (data == 'ok') {
                            $('#estado_personal').prop('checked', false)

                        } else {
                            alert('Error al Deshabilitar al o la asistente');
                            $('#estado_personal').prop("checked", true);
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });

            } else {
                $('#estado_personal').prop("checked", true);
            }
        }
    };
    --}}
</script>
