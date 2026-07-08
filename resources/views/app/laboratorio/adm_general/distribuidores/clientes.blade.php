@extends('template.laboratorio.laboratorio_profesional.template')
@section('style')
<style>
    .select2-container--open{
        z-index: 9999999 !important;
    }
</style>
@endsection
@section('content')

<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Distribuidores / Administración de clientes / Ventas por mayor  </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                               <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                            </li>
                            <li class="breadcrumb-item active">
                              <a href="#">Clientes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header-principal">
                    <div class="row">
                        <div class="col-md-12 d-inline align-botton">
                            
                            <h5 class="d-inline"><i class="feather icon-user icono-primary"></i>Clientes de Distribución</h5>
                            <div class="float-right">
                                <button type="button" class="btn btn-info" onclick="agregar_cliente();"><i class="feather icon-plus"></i>Añadir nuevo cliente</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="tabla_clientes" class="display table table-striped  table-xs table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="align-middle">Cliente</th>
                                <th class="align-middle">Productos</th>
                                <th class="align-middle">Dirección</th>
                                <th class="align-middle">Teléfono</th>
                                <th class="align-middle">Correo electrónico</th>
                                <th class="align-middle">Editar</th>
                                <th class="align-middle">Habilitar /<br> deshabilitar</th>
                                <th class="align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($clientes) && count($clientes) > 0)
                            @foreach($clientes as $cliente)
                            <tr>
                                <td class="align-middle">{{ $cliente->nombre }}</td>
                                <td class="align-middle">{{ $cliente->productos_nombres }}</td>
                                <td class="align-middle">{{ $cliente->direccion }}</td>
                                <td class="align-middle">{{ $cliente->telefono }}</td>
                                <td class="align-middle">{{ $cliente->email }}</td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-info btn-icon" onclick="editar_cliente({{ $cliente->id }});"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-warning btn-xxs" onclick="ver_estado_cuenta({{ $cliente->id }});"><i class="feather icon-eye"></i> Ver Estado</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="activo-{{ $cliente->id }}" {{ $cliente->activo ? 'checked' : '' }} onchange="cambiar_estado_cliente({{ $cliente->id }});">
                                        <label class="custom-control-label" for="activo-{{ $cliente->id }}"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_cliente({{ $cliente->id }});"><i class="feather icon-x"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9" class="text-center">No se han encontrado clientes registrados.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->
<!-- MODAL AGREGAR CLIENTE -->
<div class="modal fade" id="modal_agregar_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_agregar_cliente_label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_agregar_cliente_label">Añadir nuevo cliente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#modal_agregar_cliente').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar cliente -->
                <form id="form_agregar_cliente">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label-negro"for="rut_cliente">RUT empresa</label>
                            <input type="text" class="form-control form-control-sm" id="rut_cliente" name="rut_cliente" placeholder="Ingrese el rut del cliente">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label-negro"for="nombre_cliente">Nombre del cliente</label>
                            <input type="text" class="form-control form-control-sm" id="nombre_cliente" name="nombre_cliente" placeholder="Ingrese el nombre del cliente">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label-negro"for="tipo_producto">Tipo de producto</label>
                            <input type="text" class="form-control form-control-sm" id="tipo_producto" name="tipo_producto" placeholder="Ingrese el tipo de producto que adquiere el cliente">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="direccion_cliente">Dirección</label>
                            <input type="text" class="form-control form-control-sm" id="direccion_cliente" name="direccion_cliente" placeholder="Ingrese la dirección del cliente">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="telefono_cliente">Teléfono</label>
                            <input type="text" class="form-control form-control-sm" id="telefono_cliente" name="telefono_cliente" placeholder="Ingrese el teléfono del cliente">
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="region_cliente">Región</label>
                            <select name="region_cliente" id="region_cliente" class="form-control form-control-sm" onchange="buscar_ciudad_nuevo_cliente();">
                                <option value="0">Seleccione</option>
                                @if(isset($regiones) && count($regiones) > 0)
                                    @foreach($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="0">No se han encontrado regiones</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="ciudad_cliente">Ciudad</label>
                            <select name="ciudad_cliente" id="ciudad_cliente" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @if(isset($ciudades) && count($ciudades) > 0)
                                    @foreach($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="0">No se han encontrado ciudades</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <style>
                            .select2-dropdown{
                                z-index: 9999 !important;

                            }

                            .select2 .select2-container .select2-container--default .select2-container--below .select2-container--focus .selection{
                                z-index: 3!important;
                            }

                        </style>
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="email_cliente">Correo electrónico</label>
                            <input type="email" class="form-control form-control-sm" id="email_cliente" name="email_cliente" placeholder="Ingrese el correo electrónico del cliente">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-negro position-absotule " for="product_cliente" style="z-index: 220!important;">Seleccione Productos</label>
                            <hr>
                            <select class="js-example-basic-multiple select2" name="product_cliente" id="product_cliente" multiple="multiple" placeholder="seleccione"  >
                                <option value="1"> AUDÍFONOS</option>
                                <option value="2"> ACCESORIOS</option>
                                <option value="3"> ARTICULOS ORL</option>
                                <option value="4"> OTROS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label-negro" for="formas_pago_cliente">Formas de Pago</label>
                            <select class="js-example-basic-multiple select2" name="formas_pago_cliente" id="formas_pago_cliente" multiple="multiple" placeholder="Seleccione formas de pago">
                                @if(isset($formas_pago) && count($formas_pago) > 0)
                                    @foreach($formas_pago as $forma_pago)
                                        <option value="{{ $forma_pago->id }}">{{ $forma_pago->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="0">No se han encontrado formas de pago</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_agregar_cliente).modal('hide')"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="guardar_cliente();"><i class="feather icon-save"></i> Guardar cliente</button>

            </div>
        </div>
    </div>
</div>
<!-- MODAL EDITAR CLIENTE -->
<div class="modal fade" id="modal_editar_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_editar_cliente_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_editar_cliente_label">Editar nuevo cliente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#modal_editar_cliente').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar cliente -->
                <form id="form_editar_cliente">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label-negro"for="rut_cliente">RUT empresa</label>
                            <input type="text" class="form-control form-control-sm" id="rut_cliente" name="rut_cliente" placeholder="Ingrese el rut del cliente">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label-negro"for="nombre_cliente">Nombre del cliente</label>
                            <input type="text" class="form-control form-control-sm" id="nombre_cliente" name="nombre_cliente" placeholder="Ingrese el nombre del cliente">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label-negro"for="tipo_producto">Tipo de producto</label>
                            <input type="text" class="form-control form-control-sm" id="tipo_producto" name="tipo_producto" placeholder="Ingrese el tipo de producto que adquiere el cliente">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="direccion_cliente">Dirección</label>
                            <input type="text" class="form-control form-control-sm" id="direccion_cliente" name="direccion_cliente" placeholder="Ingrese la dirección del cliente">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="telefono_cliente">Teléfono</label>
                            <input type="text" class="form-control form-control-sm" id="telefono_cliente" name="telefono_cliente" placeholder="Ingrese el teléfono del cliente">
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="region_cliente">Región</label>
                            <select name="region_cliente" id="region_cliente" class="form-control form-control-sm" onchange="buscar_ciudad_editar_cliente()">
                                <option value="0">Seleccione</option>
                                @if(isset($regiones) && count($regiones) > 0)
                                    @foreach($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="0">No se han encontrado regiones</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="ciudad_cliente">Ciudad</label>
                            <select name="ciudad_cliente" id="ciudad_cliente" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @if(isset($ciudades) && count($ciudades) > 0)
                                    @foreach($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="0">No se han encontrado ciudades</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <style>
                            .select2-dropdown{
                                z-index: 9999 !important;

                            }
                        </style>
                        <div class="form-group col-md-6">
                            <label class="floating-label-negro"for="email_cliente">Correo electrónico</label>
                            <input type="email" class="form-control form-control-sm" id="email_cliente" name="email_cliente" placeholder="Ingrese el correo electrónico del cliente">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-negro" for="product_cliente" >Seleccione Productos</label><hr>
                            <select class="js-example-basic-multiple select2" name="product_cliente-edit" id="product_cliente-edit" multiple="multiple" placeholder="seleccione"  >
                                <option value="1"> AUDÍFONOS</option>
                                <option value="2"> ACCESORIOS</option>
                                <option value="3"> ARTICULOS ORL</option>
                                <option value="4"> OTROS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label-negro" for="formas_pago_cliente_edit">Formas de Pago</label>
                            <select class="js-example-basic-multiple select2" name="formas_pago_cliente_edit" id="formas_pago_cliente_edit" multiple="multiple" placeholder="Seleccione formas de pago">
                                @if(isset($formas_pago) && count($formas_pago) > 0)
                                    @foreach($formas_pago as $forma_pago)
                                        <option value="{{ $forma_pago->id }}">{{ $forma_pago->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="0">No se han encontrado formas de pago</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_editar_cliente').modal('hide')"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="guardar_edicion_cliente();"><i class="feather icon-save"></i> Guardar cliente</button>

            </div>
        </div>
    </div>
</div>
<!-- MODAL ESTADO DE CUENTA -->
<div class="modal fade" id="modal_estado_cuenta" tabindex="-1" role="dialog" aria-labelledby="modal_estado_cuenta_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_estado_cuenta_label">Estado de Cuenta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#modal_estado_cuenta').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row mb-3">
                    <!--CLIENTE-->
                    <div class="col-sm-12 col-md-6">
                        <div class="card-lineal">
                            <div class="card-body-lineal" style="height:80px;">
                                <div class="media">
                                    <div class="p-2 rounded-circle badge-info-light mr-3">
                                  <i class="feather icon-user f-26 text-info"></i>
                              </div>
                                  <div class="media-body">
                                    <h6><span class="text-dark">Cliente: </span><span class="text-capitalize" id="cliente_nombre_estado"></span></h6>
                                    <h6><span class="text-dark">RUT:</span> <span id="cliente_rut_estado"></span></h6>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--DEUDA-->
                    <div class="col-sm-12 col-md-6">
                        <div class="card-lineal">
                            <div class="card-body-lineal" style="height:80px;">
                                  <div class="media mr-3">
                                    <div class="p-2 rounded-circle badge-light-success mr-3">
                                      <i class="feather icon-credit-card f-26 text-success"></i>
                                    </div>
                                  <div class="media-body">
                                   <h6 class="font-weight-bold mb-1"><span class="text-dark">Deuda Total</span></h6>
                                   <h5 class="font-weight-bold f-20"> <span id="deuda_total" class="text-danger">$0</span></h5>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <ul class="nav nav-tabs profile-tabs " id="deudas" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active px-5" id="deuda_estado_tab" data-toggle="pill" href="#deuda_estado" role="tab" aria-controls="deuda_estado" aria-selected="true">Estado de deuda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-5" id="registro_pago_tab" data-toggle="pill" href="#registro_pago" role="tab" aria-controls="registro_pago" aria-selected="true">Registro Pago</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 ">
                        <!-- Contenido de Tabs -->
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Tab: Estado de Deuda -->
                            <div class="tab-pane fade show active" id="deuda_estado" role="tabpanel" aria-labelledby="deuda_estado_tab">
                               <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info" role="alert">
                                            <h6 class="font-weight-bold">Deuda Total: <span id="deuda_total" class="text-danger">$0.00</span></h6>
                                        </div>
                                    </div>
                                </div>-->

                                <h6 class="text-dark f-16 mb-3"><i class="feather icon-credit-card"></i> Historial de Pagos</h6>
                                <div class="table-responsive">
                                    <table id="tabla_pagos" class="table table-xs table-striped dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                                <th>Forma de Pago</th>
                                                <th>Documento</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla_pagos_body">
                                            <tr>
                                                <td colspan="6" class="text-center">Cargando...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Tab: Registrar Pago -->
                            <div class="tab-pane fade" id="registro_pago" role="tabpanel" aria-labelledby="registro_pago_tab">
                                <form id="form_registrar_pago">
                                    <!-- Opción para pagar deuda total -->
                                    <div class="form-row mb-3">
                                             <h6 class="text-dark f-16 mb-3"><i class="feather icon-credit-card"></i> Registrar pago</h6>
                                        <div class="form-group col-md-12 alert alert-primary">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="pagar_deuda_total" name="pagar_deuda_total">
                                                <label class="custom-control-label font-weight-bold text-c-blue" for="pagar_deuda_total">
                                                   Pagar deuda total (sin seleccionar pedido específico)
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-negro">Pedido / Orden (*) <small id="pedido_requerido" class="text-danger">(Requerido)</small><small id="pedido_opcional" class="text-muted" style="display:none;">(Opcional)</small></label>
                                            <select class="form-control form-control-sm" id="pago_id_pedido" name="pago_id_pedido" required>
                                                <option value="">Seleccione el pedido a pagar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="contenedor-input">
                                                <label class="floating-label-negro">Monto Pago</label>
                                                <span class="signo">$</span>
                                                <input type="number" class="form-control form-control-sm input-icono" id="pago_monto" name="pago_monto" placeholder="Ingrese el monto pagado" step="0.01" min="0" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-negro">Fecha Pago</label>
                                            <input type="date" class="form-control form-control-sm" id="pago_fecha" name="pago_fecha" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-negro">Forma de Pago</label>
                                            <select class="form-control form-control-sm" id="pago_forma_pago" name="pago_forma_pago">
                                                <option value="">Seleccione</option>
                                                @if(isset($formas_pago) && count($formas_pago) > 0)
                                                    @foreach($formas_pago as $forma_pago)
                                                        <option value="{{ $forma_pago->id }}">{{ $forma_pago->nombre }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-negro">Número Documento</label>
                                            <input type="text" class="form-control form-control-sm" id="pago_numero_doc" name="pago_numero_doc" placeholder="Cheque, transferencia, etc">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-negro">Observaciones</label>
                                            <textarea class="form-control form-control-sm" id="pago_observaciones" name="pago_observaciones" rows="3" placeholder="Observaciones adicionales"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="display: none;">
                <!--<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_estado_cuenta').modal('hide')"><i class="feather icon-x"></i> Cerrar</button>-->
                <button type="button" class="btn btn-info btn-sm" id="btn_guardar_pago" onclick="guardar_pago();"><i class="feather icon-save"></i> Guardar Pago</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('page-script')
<script>
    $(document).ready(function() {
        $('#tabla_clientes').DataTable({
            responsive: true,
        });
         $('#product_cliente').select2();
         $('#product_cliente-edit').select2();
         $('#formas_pago_cliente').select2();
         $('#formas_pago_cliente_edit').select2();




    });

    function agregar_cliente() {
        // Limpiar formulario
        $('#form_agregar_cliente')[0].reset();
        $('#product_cliente').val(null).trigger('change');
        // abrir modal para agregar cliente
        $('#modal_agregar_cliente').modal('show');
    }

    function editar_cliente(id) {
        // Obtener datos del cliente
        $.ajax({
            url: '/Laboratorio/Distribuidores/clientes/' + id + '/editar',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const cliente = response.cliente;

                    // Llenar el formulario de edición
                    $('#form_editar_cliente #rut_cliente').val(cliente.rut);
                    $('#form_editar_cliente #nombre_cliente').val(cliente.nombre);
                    $('#form_editar_cliente #tipo_producto').val(cliente.tipo_producto);
                    $('#form_editar_cliente #direccion_cliente').val(cliente.direccion);
                    $('#form_editar_cliente #telefono_cliente').val(cliente.telefono);
                    $('#form_editar_cliente #email_cliente').val(cliente.email);

                    // Asignar la región
                    $('#form_editar_cliente #region_cliente').val(cliente.region_id);

                    // Cargar ciudades basadas en la región y luego seleccionar la ciudad del cliente
                    buscar_ciudad_editar_cliente(cliente.ciudad_id);

                    // Establecer productos seleccionados
                    if (cliente.productos) {
                        try {
                            const productos = JSON.parse(cliente.productos);
                            $('#product_cliente-edit').val(productos).trigger('change');
                        } catch (e) {
                            console.log('Error parsing productos', e);
                        }
                    }

                    // Establecer formas de pago seleccionadas
                    if (cliente.formas_pago && cliente.formas_pago.length > 0) {
                        const formas_pago_ids = cliente.formas_pago.map(fp => fp.id);
                        $('#formas_pago_cliente_edit').val(formas_pago_ids).trigger('change');
                    }

                    // Guardar el ID del cliente para usar en la actualización
                    $('#form_editar_cliente').data('cliente-id', id);

                    // Mostrar el modal
                    $('#modal_editar_cliente').modal('show');
                } else {
                    swal({
                        title: 'Error',
                        text: response.message || 'Error al obtener los datos del cliente',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(xhr) {
                swal({
                    title: 'Error',
                    text: 'Error al conectar con el servidor',
                    icon: 'error',
                    button: 'Aceptar'
                });
                console.error(xhr);
            }
        });
    }

    function guardar_cliente() {
        // Validar que los campos obligatorios estén completos
        const rut = $('#form_agregar_cliente #rut_cliente').val().trim();
        const nombre = $('#form_agregar_cliente #nombre_cliente').val().trim();
        const tipo_producto = $('#form_agregar_cliente #tipo_producto').val().trim();
        const direccion = $('#form_agregar_cliente #direccion_cliente').val().trim();
        const telefono = $('#form_agregar_cliente #telefono_cliente').val().trim();
        const region = $('#form_agregar_cliente #region_cliente').val();
        const ciudad = $('#form_agregar_cliente #ciudad_cliente').val();
        const email = $('#form_agregar_cliente #email_cliente').val().trim();
        const productos = $('#product_cliente').val();
        const formas_pago = $('#formas_pago_cliente').val();

        if (!rut || !nombre || !tipo_producto || !direccion || !telefono || !region || !ciudad || !email) {
            swal({
                title: 'Campos incompletos',
                text: 'Por favor, complete todos los campos obligatorios',
                icon: 'warning',
                button: 'Aceptar'
            });
            return;
        }

        // Mostrar indicador de carga
        swal({
            title: 'Guardando...',
            allowOutsideClick: false,
            buttons: false
        });

        // Enviar datos al servidor
        $.ajax({
            url: '{{ route("laboratorio.distribucion.guardar_cliente") }}',
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                rut_cliente: rut,
                nombre_cliente: nombre,
                tipo_producto: tipo_producto,
                direccion_cliente: direccion,
                telefono_cliente: telefono,
                region_cliente: region,
                ciudad_cliente: ciudad,
                email_cliente: email,
                product_cliente: productos,
                formas_pago_cliente: formas_pago
            },
            success: function(response) {
                if (response.status === 'success') {
                    swal({
                        title: 'Éxito',
                        text: response.message || 'Cliente guardado correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(function() {
                        $('#modal_agregar_cliente').modal('hide');
                        // Recargar la tabla
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: response.message || 'Error al guardar el cliente',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(xhr) {
                let mensaje = 'Error al guardar el cliente';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    mensaje = Object.values(xhr.responseJSON.errors).flat().join(', ');
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error',
                    button: 'Aceptar'
                });
                console.error(xhr);
            }
        });
    }

    function guardar_edicion_cliente() {
        const cliente_id = $('#form_editar_cliente').data('cliente-id');

        if (!cliente_id) {
            swal({
                title: 'Error',
                text: 'No se encontró el ID del cliente',
                icon: 'error',
                button: 'Aceptar'
            });
            return;
        }

        // Validar que los campos obligatorios estén completos
        const rut = $('#form_editar_cliente #rut_cliente').val().trim();
        const nombre = $('#form_editar_cliente #nombre_cliente').val().trim();
        const tipo_producto = $('#form_editar_cliente #tipo_producto').val().trim();
        const direccion = $('#form_editar_cliente #direccion_cliente').val().trim();
        const telefono = $('#form_editar_cliente #telefono_cliente').val().trim();
        const region = $('#form_editar_cliente #region_cliente').val();
        const ciudad = $('#form_editar_cliente #ciudad_cliente').val();
        const email = $('#form_editar_cliente #email_cliente').val().trim();
        const productos = $('#product_cliente-edit').val();
        const formas_pago = $('#formas_pago_cliente_edit').val();

        if (!rut || !nombre || !tipo_producto || !direccion || !telefono || !region || !ciudad || !email) {
            swal({
                title: 'Campos incompletos',
                text: 'Por favor, complete todos los campos obligatorios',
                icon: 'warning',
                button: 'Aceptar'
            });
            return;
        }

        // Mostrar indicador de carga
        swal({
            title: 'Guardando...',
            allowOutsideClick: false,
            buttons: false
        });

        // Enviar datos al servidor
        $.ajax({
            url: '/Laboratorio/Distribuidores/clientes/' + cliente_id + '/actualizar',
            method: 'PUT',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                rut_cliente: rut,
                nombre_cliente: nombre,
                tipo_producto: tipo_producto,
                direccion_cliente: direccion,
                telefono_cliente: telefono,
                region_cliente: region,
                ciudad_cliente: ciudad,
                email_cliente: email,
                product_cliente: productos,
                formas_pago_cliente: formas_pago
            },
            success: function(response) {
                if (response.status === 'success') {
                    swal({
                        title: 'Éxito',
                        text: response.message || 'Cliente actualizado correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(function() {
                        $('#modal_editar_cliente').modal('hide');
                        // Recargar la tabla
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: response.message || 'Error al actualizar el cliente',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(xhr) {
                let mensaje = 'Error al actualizar el cliente';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    mensaje = Object.values(xhr.responseJSON.errors).flat().join(', ');
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error',
                    button: 'Aceptar'
                });
                console.error(xhr);
            }
        });
    }

    function buscar_ciudad_nuevo_cliente(id_ciudad=0)
    {
        let region = $('#region_cliente').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data != null)
            {
                data = JSON.parse(data);

                let ciudades = $('#ciudad_cliente');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                if(id_ciudad != 0)
                    ciudades.val(id_ciudad);

            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function buscar_ciudad_editar_cliente(id_ciudad=0)
    {
        let region = $('#form_editar_cliente #region_cliente').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data != null)
            {
                data = JSON.parse(data);

                let ciudades = $('#form_editar_cliente #ciudad_cliente');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                // Seleccionar la ciudad del cliente después de cargar las opciones
                if(id_ciudad != 0)
                    ciudades.val(id_ciudad);

            }
            else
            {
                swal({
                    title: 'Error',
                    text: 'Error al cargar las ciudades',
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Error al cargar ciudades:', jqXHR, ajaxOptions, thrownError)
        });
    };

    function cambiar_estado_cliente(cliente_id) {
        // Obtener el estado del checkbox
        const checkbox = $('#activo-' + cliente_id);
        const nuevoEstado = checkbox.is(':checked');

        // Enviar cambio al servidor
        $.ajax({
            url: '/Laboratorio/Distribuidores/clientes/' + cliente_id + '/cambiar-estado',
            method: 'PUT',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                activo: nuevoEstado
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Mostrar mensaje de éxito
                    swal({
                        title: 'Éxito',
                        text: 'Estado del cliente actualizado correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                } else {
                    // Revertir el checkbox si hubo error
                    checkbox.prop('checked', !nuevoEstado);
                    swal({
                        title: 'Error',
                        text: response.message || 'Error al cambiar el estado del cliente',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(xhr) {
                // Revertir el checkbox si hubo error
                checkbox.prop('checked', !nuevoEstado);
                swal({
                    title: 'Error',
                    text: 'Error al cambiar el estado del cliente',
                    icon: 'error',
                    button: 'Aceptar'
                });
                console.error(xhr);
            }
        });
    }

// Variable global para almacenar datos del laboratorio
    let datos_laboratorio_actual = null;

    function ver_estado_cuenta(cliente_id) {
        // Obtener datos del cliente y estado de cuenta
        $.ajax({
            url: '/Laboratorio/Distribuidores/clientes/' + cliente_id + '/estado-cuenta',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Respuesta estado de cuenta:', response);
                if (response.status === 'success') {
                    const cliente = response.cliente;
                    const estado_cuenta = response.estado_cuenta;
                    const id_lugar_atencion = response.id_lugar_atencion ? response.id_lugar_atencion : "{{ $laboratorio->id_lugar_atencion }}";
                    const formas_pago = response.formas_pago_disponibles || [];

                    $('#pago_forma_pago').empty().append('<option value="">Seleccione</option>');
                    formas_pago.forEach(forma => {
                        $('#pago_forma_pago').append('<option value="' + forma.id + '">' + forma.nombre + '</option>');
                    });

                    // Llenar información del cliente
                    $('#cliente_nombre_estado').text(cliente.nombre);
                    $('#cliente_rut_estado').text(cliente.rut);

                    // Mostrar deuda total
                    $('#deuda_total').text('$' + estado_cuenta.deuda_total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','));

                    // Llenar tabla de pagos
                    let tabla_html = '';
                    if (estado_cuenta.pagos && estado_cuenta.pagos.length > 0) {
                        estado_cuenta.pagos.forEach(pago => {
                            const estado_badge = pago.estado === 'confirmado' ?
                                '<span class="badge badge-success">Confirmado</span>' :
                                '<span class="badge badge-warning">Pendiente</span>';

                            tabla_html += `
                                <tr>
                                    <td>${pago.fecha_pago}</td>
                                    <td>$${parseFloat(pago.monto).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')}</td>
                                    <td>${pago.forma_pago_nombre || 'N/A'}</td>
                                    <td>${pago.numero_documento || 'N/A'}</td>
                                    <td>${estado_badge}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-xxs btn-primary" onclick="imprimir_pago(${pago.id})" title="Imprimir pago">
                                            <i class="feather icon-printer"></i> Imprimir
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        tabla_html = '<tr><td colspan="6" class="text-center">No hay registros de pagos</td></tr>';
                    }
                    $('#tabla_pagos_body').html(tabla_html);

                    // Reinicializar DataTable
                    if ($.fn.DataTable.isDataTable('#tabla_pagos')) {
                        $('#tabla_pagos').DataTable().destroy();
                    }
                    // $('#tabla_pagos').DataTable({
                    //     responsive: true,
                    //     language: {
                    //         url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
                    //     }
                    // });

                    // Guardar ID del cliente para el pago
                    $('#form_registrar_pago').data('cliente-id', cliente_id);

                    // Cargar pedidos pendientes del cliente
                    cargar_pedidos_cliente(cliente_id);

                    // Cargar datos del laboratorio si existe id_lugar_atencion
                    if (id_lugar_atencion) {
                        cargar_datos_laboratorio(id_lugar_atencion);
                    }

                    // Mostrar el modal
                    $('#modal_estado_cuenta').modal('show');

                    // Mostrar botón de guardar pago en el tab de pagar
                    mostrar_boton_guardar_pago();
                } else {
                    swal({
                        title: 'Error',
                        text: response.message || 'Error al obtener el estado de cuenta',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(xhr) {
                swal({
                    title: 'Error',
                    text: 'Error al conectar con el servidor',
                    icon: 'error',
                    button: 'Aceptar'
                });
                console.error(xhr);
            }
        });
    }

    function cargar_datos_laboratorio(id_lugar_atencion) {
        $.ajax({
            url: '/Laboratorio/Distribuidores/laboratorio/' + id_lugar_atencion + '/datos',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    datos_laboratorio_actual = response.laboratorio;
                    console.log('Datos del laboratorio cargados:', datos_laboratorio_actual);
                } else {
                    console.log('No se pudieron cargar los datos del laboratorio');
                    datos_laboratorio_actual = null;
                }
            },
            error: function(xhr) {
                console.error('Error al cargar datos del laboratorio:', xhr);
                datos_laboratorio_actual = null;
            }
        });
    }



    function mostrar_boton_guardar_pago() {
        // Mostrar el botón al cambiar de tab
        $('#pills-pagar-tab').on('shown.bs.tab', function() {
            $('#btn_guardar_pago').show();
        });

        $('#pills-deuda-tab').on('shown.bs.tab', function() {
            $('#btn_guardar_pago').hide();
        });

        // Manejar el checkbox de pagar deuda total
        $('#pagar_deuda_total').on('change', function() {
            actualizar_campos_pago_total();
        });

        // Manejar selección de pedido
        $('#pago_id_pedido').on('change', function() {
            const pedido_id = $(this).val();
            if (pedido_id) {
                // Si se selecciona un pedido, desmarcar "pagar deuda total"
                $('#pagar_deuda_total').prop('checked', false);
                actualizar_campos_pago_por_pedido(pedido_id);
            }
        });
    }

// Función para limpiar formato de números (maneja formatos Chileno y Internacional)
    function limpiarFormatoNumero(valor) {
        if (!valor) return 0;
        // Convertir a string y remover espacios
        valor = valor.toString().trim();
        // Remover caracteres no numéricos excepto coma y punto
        valor = valor.replace(/[^\d,.\-]/g, '');

        if (!valor) return 0;

        const cantoPuntos = (valor.match(/\./g) || []).length;
        const cantoComas = (valor.match(/,/g) || []).length;

        // Si hay ambos puntos y comas
        if (cantoPuntos > 0 && cantoComas > 0) {
            // Obtener posiciones del último punto y última coma
            const ultimoPunto = valor.lastIndexOf('.');
            const ultimaComa = valor.lastIndexOf(',');
            const posicionDelUltimo = Math.max(ultimoPunto, ultimaComa);
            const distanciaAlFinal = valor.length - posicionDelUltimo - 1;

            // Si el último separador está a 2-3 posiciones del final, es decimal
            if (distanciaAlFinal >= 2 && distanciaAlFinal <= 3) {
                if (ultimoPunto > ultimaComa) {
                    // Último es punto: formato chileno invertido o internacional
                    // 450,000.00 → remove comas (miles), keep punto (decimal)
                    valor = valor.replace(/,/g, '').replace('.', '.');
                } else {
                    // Último es coma: formato chileno
                    // 1.234.567,50 → remove puntos (miles), replace coma con punto (decimal)
                    valor = valor.replace(/\./g, '').replace(',', '.');
                }
            } else {
                // No hay decimales claros, asumir que el último es decimal
                if (ultimoPunto > ultimaComa) {
                    valor = valor.replace(/,/g, '');
                } else {
                    valor = valor.replace(/\./g, '').replace(',', '.');
                }
            }
        } else if (cantoPuntos > 0) {
            // Solo puntos
            const distanciaAlFinal = valor.length - valor.lastIndexOf('.') - 1;
            if (distanciaAlFinal >= 2 && distanciaAlFinal <= 3) {
                // Es decimal, mantenerlo
                valor = valor; // mantener como está
            } else {
                // Son miles, removerlos
                valor = valor.replace(/\./g, '');
            }
        } else if (cantoComas > 0) {
            // Solo comas
            const distanciaAlFinal = valor.length - valor.lastIndexOf(',') - 1;
            if (distanciaAlFinal >= 2 && distanciaAlFinal <= 3) {
                // Es decimal (formato chileno)
                valor = valor.replace(',', '.');
            } else {
                // Son miles (formato internacional)
                valor = valor.replace(/,/g, '');
            }
        }

        return parseFloat(valor) || 0;
    }

    function actualizar_campos_pago_total() {
        const pagar_total = $('#pagar_deuda_total').is(':checked');
        const deuda_total_texto = $('#deuda_total').text();
        // Extraer número de la deuda total (ej: "$1.234.567" -> 1234567)
        const deuda_total_numero = limpiarFormatoNumero(deuda_total_texto);

        if (pagar_total) {
            // Pagar deuda total
            $('#pago_id_pedido').prop('required', false).prop('disabled', true).val('');
            $('#pago_monto').val(deuda_total_numero).prop('disabled', true);
            $('#pedido_requerido').hide();
            $('#pedido_opcional').show();
        } else {
            // Pagar un pedido específico
            $('#pago_id_pedido').prop('required', true).prop('disabled', false).val('');
            $('#pago_monto').val('').prop('disabled', false);
            $('#pedido_requerido').show();
            $('#pedido_opcional').hide();
        }
    }

    function actualizar_campos_pago_por_pedido(pedido_id) {
        // Obtener datos del pedido seleccionado del option
        const opcionSeleccionada = $('#pago_id_pedido option[value="' + pedido_id + '"]');

        if (opcionSeleccionada.length > 0) {
            // El texto del option contiene: "Pedido #123 - Total: $X (Pendiente: $Y)"
            const textoOption = opcionSeleccionada.text();

            // Extraer el valor pendiente que está entre paréntesis
            const matchPendiente = textoOption.match(/\(Pendiente: \$([^)]+)\)/);

            if (matchPendiente && matchPendiente[1]) {
                const montoPendiente = limpiarFormatoNumero(matchPendiente[1]);
                $('#pago_monto').val(montoPendiente);
            }
        }
    }

    function cargar_pedidos_cliente(cliente_id) {
        $.ajax({
            url: '/Laboratorio/Distribuidores/clientes/' + cliente_id + '/pedidos-pendientes',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    let html = '<option value="">Seleccione el pedido a pagar</option>';
                    if (response.pedidos && response.pedidos.length > 0) {
                        response.pedidos.forEach(pedido => {
                            const saldo = parseFloat(pedido.total) - (pedido.total_pagado || 0);
                            html += `<option value="${pedido.id}" data-saldo="${saldo}">
                                Pedido #${pedido.numero_pedido} -
                                Total: $${parseFloat(pedido.total).toLocaleString('es-CL')}
                                (Pendiente: $${saldo.toLocaleString('es-CL')})
                            </option>`;
                        });
                    } else {
                        html += '<option value="" disabled>No hay pedidos pendientes</option>';
                    }
                    $('#pago_id_pedido').html(html);

                    // Re-adjuntar el evento de cambio después de recargar opciones
                    $('#pago_id_pedido').off('change').on('change', function() {
                        const pedido_id = $(this).val();
                        if (pedido_id) {
                            // Si se selecciona un pedido, desmarcar "pagar deuda total"
                            $('#pagar_deuda_total').prop('checked', false);
                            actualizar_campos_pago_por_pedido(pedido_id);
                        } else {
                            // Si se limpia la selección, limpiar monto
                            $('#pago_monto').val('').prop('disabled', false);
                        }
                    });
                } else {
                    console.error('Error al cargar pedidos:', response.message);
                    $('#pago_id_pedido').html('<option value="">Error al cargar pedidos</option>');
                }
            },
            error: function(xhr) {
                console.error('Error al conectar:', xhr);
                $('#pago_id_pedido').html('<option value="">Error al conectar</option>');
            }
        });
    }

    function imprimir_pago(pago_id) {
        // Calcular posición centrada para la ventana emergente
        const ancho = 900;
        const alto = 700;
        const izquierda = (window.innerWidth - ancho) / 2 + window.screenX;
        const arriba = (window.innerHeight - alto) / 2 + window.screenY;

        // Crear una ventana emergente (popup) con características específicas
        const opciones = `width=${ancho},height=${alto},left=${izquierda},top=${arriba},resizable=yes,scrollbars=yes,toolbar=no,location=no,menubar=no,status=yes`;
        const ventana = window.open('', '_blank', opciones);
        // Obtener datos del pago del DOM
        const tabla_pagos = document.querySelectorAll('#tabla_pagos tbody tr');
        let pago_data = null;

        tabla_pagos.forEach(fila => {
            const botones = fila.querySelectorAll('button');
            botones.forEach(btn => {
                if (btn.onclick && btn.onclick.toString().includes(pago_id)) {
                    const celdas = fila.querySelectorAll('td');
                    pago_data = {
                        fecha: celdas[0].textContent.trim(),
                        monto: celdas[1].textContent.trim(),
                        forma_pago: celdas[2].textContent.trim(),
                        documento: celdas[3].textContent.trim(),
                        estado: celdas[4].textContent.trim()
                    };
                }
            });
        });

        const cliente_nombre = $('#cliente_nombre_estado').text();
        const cliente_rut = $('#cliente_rut_estado').text();

        // Preparar datos del laboratorio
        let logo_html = '';
        let nombre_laboratorio = 'MediChile';

        if (datos_laboratorio_actual) {
            if (datos_laboratorio_actual.foto_perfil) {
                logo_html = `<img src="${datos_laboratorio_actual.foto_perfil}" alt="Logo" style="max-width: 100px; max-height: 100px; margin-bottom: 10px;">`;
            }
            nombre_laboratorio = datos_laboratorio_actual.nombre || 'MediChile';
        }

        const contenido = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Comprobante de Pago</title>
                <style>
                    * { margin: 0; padding: 0; box-sizing: border-box; }
                    body {
                        font-family: 'Arial', sans-serif;
                        margin: 20px;
                        background-color: #f5f5f5;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: white;
                        padding: 30px;
                        border-radius: 8px;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 30px;
                        border-bottom: 2px solid #007bff;
                        padding-bottom: 20px;
                    }
                    .logo-section {
                        text-align: center;
                        margin-bottom: 15px;
                    }
                    .logo-section img {
                        max-width: 100px;
                        max-height: 100px;
                        margin-bottom: 10px;
                    }
                    .header h1 {
                        margin: 10px 0 5px 0;
                        font-size: 22px;
                        color: #333;
                    }
                    .header h2 {
                        margin: 0;
                        font-size: 18px;
                        color: #666;
                        font-weight: normal;
                    }
                    .header p {
                        margin: 5px 0;
                        font-size: 12px;
                        color: #999;
                    }
                    .info {
                        margin-bottom: 25px;
                        background-color: #f9f9f9;
                        padding: 15px;
                        border-left: 4px solid #007bff;
                    }
                    .info-row {
                        display: flex;
                        margin-bottom: 10px;
                        font-size: 14px;
                    }
                    .info-label {
                        font-weight: bold;
                        width: 120px;
                        color: #333;
                    }
                    .info-value {
                        flex: 1;
                        color: #555;
                    }
                    .detalles {
                        margin-top: 25px;
                        border: 2px solid #007bff;
                        padding: 20px;
                        border-radius: 4px;
                        background-color: #f0f8ff;
                    }
                    .detalles h3 {
                        margin: 0 0 15px 0;
                        font-size: 16px;
                        color: #007bff;
                        border-bottom: 1px solid #007bff;
                        padding-bottom: 10px;
                    }
                    .monto-pago {
                        background-color: #d4edda;
                        border: 1px solid #c3e6cb;
                        padding: 15px;
                        border-radius: 4px;
                        text-align: center;
                        margin: 15px 0;
                    }
                    .monto-pago .label {
                        font-size: 12px;
                        color: #155724;
                        margin-bottom: 5px;
                    }
                    .monto-pago .valor {
                        font-weight: bold;
                        font-size: 24px;
                        color: #155724;
                    }
                    .footer {
                        text-align: center;
                        margin-top: 30px;
                        padding-top: 15px;
                        border-top: 1px solid #ddd;
                        font-size: 11px;
                        color: #999;
                    }
                    .estado {
                        display: inline-block;
                        padding: 6px 12px;
                        border-radius: 4px;
                        font-size: 12px;
                        font-weight: bold;
                    }
                    .confirmado {
                        background-color: #d4edda;
                        color: #155724;
                    }
                    .pendiente {
                        background-color: #fff3cd;
                        color: #856404;
                    }
                    .divider {
                        border-top: 1px dashed #ddd;
                        margin: 15px 0;
                    }
                    @media print {
                        body { margin: 0; padding: 0; background: white; }
                        .container { box-shadow: none; }
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <div class="logo-section">
                            ${logo_html}
                        </div>
                        <h1>COMPROBANTE DE PAGO</h1>
                        <h2>${nombre_laboratorio}</h2>
                        <p>Sistema de Distribución</p>
                    </div>

                    <div class="info">
                        <div class="info-row">
                            <div class="info-label">Cliente:</div>
                            <div class="info-value"><strong>${cliente_nombre}</strong></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">RUT:</div>
                            <div class="info-value">${cliente_rut}</div>
                        </div>
                    </div>

                    <div class="detalles">
                        <h3>Detalles del Pago</h3>

                        <div class="info-row">
                            <div class="info-label">Fecha:</div>
                            <div class="info-value">${pago_data.fecha}</div>
                        </div>

                        <div class="monto-pago">
                            <div class="label">MONTO PAGADO</div>
                            <div class="valor">${pago_data.monto}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Forma de Pago:</div>
                            <div class="info-value">${pago_data.forma_pago}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Documento:</div>
                            <div class="info-value">${pago_data.documento || 'N/A'}</div>
                        </div>

                        <div class="divider"></div>

                        <div class="info-row">
                            <div class="info-label">Estado:</div>
                            <div class="info-value">
                                <span class="estado ${pago_data.estado.toLowerCase().includes('confirmado') ? 'confirmado' : 'pendiente'}">
                                    ${pago_data.estado}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="footer">
                        <p><strong>Documento generado el:</strong> ${new Date().toLocaleString('es-CL')}</p>
                        <p>Este es un comprobante de pago registrado en el sistema de distribución MediChile.</p>
                        <p>Para consultas, contacte con el área de facturación.</p>
                    </div>
                </div>
            </body>
            </html>
        `;

        ventana.document.write(contenido);
        ventana.document.close();

        // Esperar a que cargue y luego imprimir
        ventana.onload = function() {
            ventana.print();
        };
    }

    function guardar_pago() {
        const cliente_id = $('#form_registrar_pago').data('cliente-id');
        const pagar_total = $('#pagar_deuda_total').is(':checked');
        const id_pedido = pagar_total ? null : ($('#pago_id_pedido').val() || null);
        const montoRaw = $('#pago_monto').val();
        const monto = limpiarFormatoNumero(montoRaw);
        const fecha = $('#pago_fecha').val();
        const forma_pago = $('#pago_forma_pago').val();
        const numero_doc = $('#pago_numero_doc').val().trim();
        const observaciones = $('#pago_observaciones').val().trim();

        // Validar que haya monto y fecha (pedido es opcional)
        if (!monto || !fecha) {
            swal({
                title: 'Campos incompletos',
                text: 'Por favor, complete monto y fecha',
                icon: 'warning',
                button: 'Aceptar'
            });
            return;
        }

        // Mostrar indicador de carga
        swal({
            title: 'Guardando...',
            allowOutsideClick: false,
            buttons: false
        });

        $.ajax({
            url: '/Laboratorio/Distribuidores/clientes/' + cliente_id + '/registrar-pago',
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id_pedido: id_pedido,
                monto: monto,
                fecha_pago: fecha,
                id_forma_pago: forma_pago,
                numero_documento: numero_doc,
                observaciones: observaciones
            },
            success: function(response) {
                if (response.status === 'success') {
                    swal({
                        title: 'Éxito',
                        text: response.message || 'Pago registrado correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(function() {
                        // Limpiar formulario
                        $('#form_registrar_pago')[0].reset();
                        $('#pagar_deuda_total').prop('checked', false);
                        actualizar_campos_pago_total();
                        // Recargar estado de cuenta
                        if (cliente_id) {
                            ver_estado_cuenta(cliente_id);
                        }
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: response.message || 'Error al registrar el pago',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(xhr) {
                let mensaje = 'Error al registrar el pago';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    mensaje = Object.values(xhr.responseJSON.errors).flat().join(', ');
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error',
                    button: 'Aceptar'
                });
                console.error(xhr);
            }
        });
    }

</script>
@endsection
