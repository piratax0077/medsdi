<div class="tab-pane fade" id="pills-liquidaciones" role="tabpanel" aria-labelledby="pills-liquidaciones-tab">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="liquidaciones_cm" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 active"  id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profesionales</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1"  id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Otros Profesionales</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1"  id="pills-nomina-tab" data-toggle="pill" href="#pills-nomina" role="tab" aria-controls="pills-nomina" aria-selected="false">Nómina</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Liquidaciones a  Profesionales </h4>
                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoprofesional">
                                            <i class="feather icon-plus"></i> Registrar Datos Profesional
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                        </div>
                                    </div>
                                    <div style="overflow-x:auto;">
                                        <table id="tabla_pago_prof_centro" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre/Rut</th>
                                                    <th class="text-center align-middle">Espec</th>
                                                    <th class="text-center align-middle">Mes</th>
                                                    <th class="text-center align-middle">N° Atenciones</th>
                                                    <th class="text-center align-middle">V. Total</th>
                                                    <th class="text-center align-middle">%</th>
                                                    <th class="text-center align-middle">T. Descuentos</th>
                                                    <th class="text-center align-middle">V. a Pagar</th>
                                                    <th class="text-center align-middle">Datos Cuenta</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Noa Sanchez</strong></span><br>
                                                        <span>7.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Urología</strong></span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>diciembre</strong></span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>120</strong></span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>$1.200.000</strong></span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>30%</strong></span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>$360.000</strong></span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>$840.000</strong></span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datoscuenta();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="liquidacion();">
                                                        <i class="feather icon-edit"></i> Liquidación</button>
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
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Liquidaciones a Otros Profesionales de La Salud</h4>
                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_profesional">
                                            <i class="feather icon-plus"></i> Registrar Datos Profesional
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                        </div>
                                    </div>
                                    <div style="overflow-x:auto;">
                                        <table id="tabla_pago_otprof_centro" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Prof/esp</th>
                                                    <th class="text-center align-middle">Mes</th>
                                                    <th class="text-center align-middle">N° Atenciones</th>
                                                    <th class="text-center align-middle">Valor Total</th>
                                                    <th class="text-center align-middle">Porcentaje</th>
                                                    <th class="text-center align-middle">T. Descuentos</th>
                                                    <th class="text-center align-middle">V. a Pagar</th>
                                                    <th class="text-center align-middle">Datos Cuenta</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Rosa Espinoza</strong></span>
                                                        <span>7.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Fonoaudiología</strong></span>
                                                        <span>Habla y lenguaje</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>noviembre</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>220</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>$2.200.000</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>30%</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>$660.000</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>$1.540.000</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datoscuentaot();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="liquidacionot();">
                                                        <i class="feather icon-edit"></i> Liquidación</button>
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
                <div class="tab-pane fade" id="pills-nomina" role="tabpanel" aria-labelledby="pills-nomina-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Nómina de Profesionales </h4>
                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_profesional">
                                            <i class="feather icon-plus"></i> Registrar Profesional
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                        </div>
                                    </div>
                                    <div style="overflow-x:auto;">
                                        <table id="tabla_nomina_prof" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Fecha de Ingreso</th>
                                                    <th class="text-center align-middle">Contacto</th>
                                                    <th class="text-center align-middle">Profesión/Espec.</th>
                                                    <th class="text-center align-middle">Dias atención</th>
                                                    <th class="text-center align-middle">Centro</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Juan Sanchez</strong></span><br>
                                                        <span>17.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/1/2020</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contactoc();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Dermatólogo</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>lunes y viernes </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Plaza Oeste</span>
                                                    </td>
                                                               
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datosprofesional();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
                                                    </td>                                                                        
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Maria Cornejo</strong></span><br>
                                                        <span>17.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/10/2021</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contactoc();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>kinesióloga</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>martes y jueves </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Plaza Oeste</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datosprofesional();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
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

    function editar_datosprofesional(){
        $('#editar_profesional').modal('show');
    }
</script>
