@extends('template.adm_cm.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Contabilidad/RRHH</h5>
                        </div>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="col-md-12">
            <!--Card Nav Pills-->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="rrhh_cm" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-prof_salud-tab" data-toggle="tab" href="#pills-prof-salud" role="tab" aria-controls="pills-prof_salud" aria-selected="false">Profesionales de la salud</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-asistentes-tab" data-toggle="tab" href="#pills-asistentes" role="tab" aria-controls="pills-asistentes" aria-selected="false">Asistentes/Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-limpieza-mantencion-tab" data-toggle="tab" href="#pills-limpieza-mantencion" role="tab" aria-controls="pills-limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--Cierre: Card Nav Pills-->
            <div class="tab-content" id="rrhh_cm">

                <!--Tab Profesionales de la salud-->
                <div class="tab-pane fade show active"id="pills-prof-salud" role="tabpanel" aria-labelledby="pills-prof-salud-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales Contratados del Centro</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoprofesional">
                                                        <i class="feather icon-plus"></i> Registrar Contrato Profesional
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tab_profesionales_cont_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
                                                <th class="text-center align-middle">Contacto/cuenta</th>
                                                <th class="text-center align-middle">Remuneración Mes</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>Jaime Kriman</strong></span><br>
                                                    <span>4.345.466-2</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Dirección Médica</span><br>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Boleta Honorarios</span><br>
                                                    <span>20/01/2015</span
                                                </td>
                                                <td class="align-middle text-center">
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contactoc();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                                                </td>
                                                <td class="align-middle text-center">
                                                     <span>20 horas semanales <br> 500.000</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datosprofesionalc();">
                                                    <i class="feather icon-edit"></i> Editar</button>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="feather icon-x-circle"></i> Desasociar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Tab Profesionales de la salud-->
                <!--Tab asistentes-->
                <div class="tab-pane fade" id="pills-asistentes" role="tabpanel" aria-labelledby="pills-asistentes-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Asistentes del Centro</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                     <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoasistentes"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Contrato nuevo/a asistente</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tab_cont_asistentes_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
                                                <th class="text-center align-middle">Contacto</th>
                                                <th class="text-center align-middle">Remuneración Mes</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>Jaime Kriman</strong></span><br>
                                                    <span>4.345.466-2</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Asistente atención público</span><br>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Contrato indefinido</span><br>
                                                    <span>20/01/2015</span
                                                </td>
                                                <td class="align-middle text-center">
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                                                </td>
                                                <td class="align-middle text-center">
                                                     <span>44 horas semanales <br> 500.000</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datosasistentec();">
                                                    <i class="feather icon-edit"></i> Editar</button>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="feather icon-x-circle"></i> Desasociar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Tab asistentes-->

                <!--Tab personal limpieza y mantencion-->
                <div class="tab-pane fade" id="pills-limpieza-mantencion" role="tabpanel" aria-labelledby="pills-limpieza-mantencion-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Limpieza y mantención</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_personalaseoymantencion"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Personal mantención</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tab_cont_limpieza_mantencionc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
                                                <th class="text-center align-middle">Contacto</th>
                                                <th class="text-center align-middle">Remuneración Mes</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>Jaime Kriman</strong></span><br>
                                                    <span>4.345.466-2</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Asistente atención público</span><br>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Contrato indefinido</span><br>
                                                    <span>20/01/2015</span
                                                </td>
                                                <td class="align-middle text-center">
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contactoc();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                                                </td>
                                                <td class="align-middle text-center">
                                                     <span>44 horas semanales <br> 500.000</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_empresac();">
                                                    <i class="feather icon-edit"></i> Editar</button>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="feather icon-x-circle"></i> Desasociar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Tab personal limpieza y mantencion-->
            </div>
            <!--Cierre: Pills-->
        </div>
    </div>
</div>
    @include('app.contabilidad.modals.registrar_asistentes')
    @include('app.contabilidad.modals.liquidacion')
    @include('app.contabilidad.modals.datos_profesional')
    @include('app.contabilidad.modals.datoscuenta')
    @include('app.contabilidad.modals.contacto')
    @include('app.contabilidad.modals.contacto_ser')
    @include('app.contabilidad.modals.editar_profesional')
    @include('app.contabilidad.modals.editar_asistentes')
    @include('app.contabilidad.modals.aseo_mantencion_editar')
    @include('app.contabilidad.modals.aseo_mantencion')

@endsection
<script type="text/javascript">
    function liquidacion (){
        $('#liquidacion').modal('show');
    }
        function datoscuenta(){
        $('#datoscuenta').modal('show');
    }
        function liquidacionot (){
        $('#liquidacionot').modal('show');
    }
    function datoscuentaot(){
        $('#datoscuentaot').modal('show');
    }
    function contactoc(){ $('#contacto').modal('show');}

    function editar_datosprofesionalc(){
        $('#editardatosprofesional').modal('show');
    }
    function editar_datosasistentec(){
        $('#editar_contratoasistentes').modal('show');
    }
    function editar_datos_empresac(){
        $('#editar_personalaseoymantencion').modal('show');
    }
    function registar_datos_empresac(){
        $('#registrar_personalaseoymantencion').modal('show');
    }
</script>
