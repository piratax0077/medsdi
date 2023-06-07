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
                            <h5 class="m-b-10 font-weight-bold">Sueldos Personal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_comercial') }}">Volver a Admin. Comercial</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Sueldos Personal</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="liquidaciones de Sueldos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Nombre</th>
                                <th class="text-center align-middle">Fecha de Pago</th>
                                <th class="text-center align-middle">Info-empleado</th>
                                <th class="text-center align-middle">Sucursal</th>
                                <th class="text-center align-middle">Estado</th>
                                <th class="text-center align-middle">Pagar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Juana Perez</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>18/11/2023</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal contacto -->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto_asistente();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos();" data-toggle="tooltip" data-placement="top" title="Dato Deposito"><i class="fab fa-creative-commons-nc"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal cm</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-success">Pagado</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón pago-->
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="pago_sueldo();"><i class="feather icon-edit"></i>Pagar</button>
                                </td>

                            </tr>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>juan Perez</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>22/11/2023</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal contacto -->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto_asistente();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos();" data-toggle="tooltip" data-placement="top" title="Dato Deposito"><i class="fab fa-creative-commons-nc"></i></button>

                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal cm</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-danger">No Pagado</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón pago-->
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="pago_sueldo();"><i class="feather icon-edit"></i>Pagar</button>
                                </td>


                            </tr>
                        </tbody>
                    </table>
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
    @include('app.adm_cm.modal_adm.contacto')

    @include('app.contabilidad.modals.remuneraciones')

    @include('app.adm_cm.modal_adm.liquidacion_profesionales')
@endsection
{{--  <script>
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
</script>  --}}
