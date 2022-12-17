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
                            <h5 class="m-b-10 font-weight-bold">Gastos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_cm.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="administracion_cm.php">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="gastos_cm.php">Gastos</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Gastos</h4>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-light btn-sm" onclick="agregar_gasto();"><i class="feather icon-plus"></i>Agregar gasto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="inventario_insumos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Fecha de facturación</th>
                                <th class="text-center align-middle">Fecha de pago</th>
                                <th class="text-center align-middle">Sucursal</th>
                                <th class="text-center align-middle">Estado</th>
                                <th class="text-center align-middle">Pagar</th>
                                <th class="text-center align-middle">Editar</th>
                                <th class="text-center align-middle">Habilitar /<br> deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Agua</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>18/11/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>01/12/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal cm</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-success">Pagado</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón pago-->
                                    <button type="button" class="btn btn-success btn-sm">Pagar</button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="editar_gasto();"><i class="feather icon-edit"></i> Editar</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="activo-1" checked="">
                                    <label for="activo-1" class="cr"></label>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Luz</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>22/11/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>05/12/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Nombre sucursal cm</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-danger">No Pagado</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón pago-->
                                    <button type="button" class="btn btn-success btn-sm">Pagar</button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="editar_gasto();"><i class="feather icon-edit"></i> Editar</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="activo-2" checked="">
                                    <label for="activo-2" class="cr"></label>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->
<!--Modal agregar gastos cm -->
<div id="agregar_gasto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_gasto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar gasto</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Tipo de gasto</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha de facturación</label>
                                <input class="form-control form-control-sm" name="facturacion" id="facturacion" type="date">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha de pago</label>
                                <input class="form-control form-control-sm" name="pago" id="pago" type="date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Agregar gasto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal editar gastos cm-->
<div id="editar_gasto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_gasto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Editar gasto
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
             <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Tipo de gasto</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha de facturación</label>
                                <input class="form-control form-control-sm" name="facturacion" id="facturacion" type="date">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha de pago</label>
                                <input class="form-control form-control-sm" name="pago" id="pago" type="date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Editar información</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
