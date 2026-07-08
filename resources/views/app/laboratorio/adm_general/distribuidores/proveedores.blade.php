@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Proveedores</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('laboratorio.distribucion_mayor') }}">Distribucion</a></li>
                            <li class="breadcrumb-item"><a href="#">Proveedores</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Proveedores</h4>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-light btn-sm" onclick="agregar_proveedor_lab_dist();"><i class="feather icon-plus"></i>Agregar proveedor</button>
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
                                <th class="text-center align-middle">Proveedor</th>
                                <th class="text-center align-middle">Productos</th>
                                <th class="text-center align-middle">Dirección</th>
                                <th class="text-center align-middle">Teléfono</th>
                                <th class="text-center align-middle">Correo electrónico</th>
                                <th class="text-center align-middle">Editar</th>
                                <th class="text-center align-middle">Habilitar /<br> deshabilitar</th>
                                <th class="text-center align-middle">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedores as $proveedor)
                            <tr>
                                <td class="text-center align-middle">{{ $proveedor->nombre }}</td>
                                <td class="text-center align-middle">{{ $proveedor->tipo_producto }}</td>
                                <td class="text-center align-middle">{{ $proveedor->direccion }}</td>
                                <td class="text-center align-middle">{{ $proveedor->telefono }}</td>
                                <td class="text-center align-middle">{{ $proveedor->email }}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-info btn-sm" onclick="editar_proveedor_lab_dist({{ $proveedor->id }});"><i class="feather icon-edit"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="activo-{{ $proveedor->id }}" >
                                        <label for="activo-{{ $proveedor->id }}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_proveedor_lab_dist({{ $proveedor->id }});"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->

<!--Modal agregar proveedor laboratorio distribuidores -->
<div id="agregar_proveedor_lab_dist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_proveedor_lab_dist" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar proveedor</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ ROUTE('guardarProveedor') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_institucion" id="id_institucion" value="{{ $institucion->id }}">
                    <input type="hidden" name="id_tipo_proveedor" id="id_tipo_proveedor" value="1">
                    <div class="row">
                        <!--SELECT PARA VER SI ES UN PROVEEDOR NACIONAL O INTERNACIONAL -->

                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de Proveedor</label>
                                <select name="tipo_proveedor" id="tipo_proveedor" class="form-control" onchange="evaluarTipoProveedor()" required>
                                    <option value="0">Seleccione</option>
                                    <option value="1">Nacional</option>
                                    <option value="2">Internacional</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Proveedor</label>
                                <input class="form-control form-control-sm" name="nombre_prov" id="nombre_prov" type="text" required>
                            </div>
                        </div>
						<div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Productos</label>
                                <select name="prov_prod[]" id="prov_prod" class="form-control" multiple required>
                                    <option value="0">Seleccione</option>
                                    @foreach($tipo_producto as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="campos_nacionales_proveedor" class="w-100 d-contents">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input class="form-control form-control-sm" name="rut" id="rut" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Rol</label>
                                <input class="form-control form-control-sm" name="rol" id="rol" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email" required>
                            </div>
                        </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="text" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono_opcional" id="telefono_opcional" type="text" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion" id="direccion" type="text" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" required>
                        </div>
                    </div>

					<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Región</label>
                            <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                class="form-control form-control-sm" required>
                                <option value="0">Seleccione</option>
                                @if (isset($region))
                                    @foreach ($region as $reg)
                                        <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

					<div class="col-sm-6 col-md-6 col-xl-6">
						<div class="form-group fill">
							<label class="floating-label-activo-sm">Ciudad</label>
							<select id="comunas" name="comunas" class="form-control form-control-sm" required>


							</select>
						</div>
					</div>
                        </div>

                        <div id="campos_internacionales_proveedor" class="w-100 d-contents" style="display: none;">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">País</label>
                                    <select name="pais_internacional" id="pais_internacional" class="form-control" disabled>
                                        <option value="0">Seleccione</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Brasil">Brasil</option>
                                        <option value="Canada">Canadá</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Corea del Sur">Corea del Sur</option>
                                        <option value="Espana">España</option>
                                        <option value="Estados Unidos">Estados Unidos</option>
                                        <option value="Francia">Francia</option>
                                        <option value="India">India</option>
                                        <option value="Italia">Italia</option>
                                        <option value="Japon">Japón</option>
                                        <option value="Mexico">México</option>
                                        <option value="Peru">Perú</option>
                                        <option value="Reino Unido">Reino Unido</option>
                                        <option value="Uruguay">Uruguay</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Ciudad / Estado</label>
                                    <input class="form-control form-control-sm" name="ciudad_internacional" id="ciudad_internacional" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Sitio web de la empresa</label>
                                    <input class="form-control form-control-sm" name="sitio_web_internacional" id="sitio_web_internacional" type="url" placeholder="https://empresa.com" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Referencia comercial internacional</label>
                                    <textarea class="form-control form-control-sm" name="referencias_internacionales" id="referencias_internacionales" rows="3" placeholder="Describe referencias, certificaciones, clientes o experiencia internacional" disabled></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Contacto internacional</label>
                                    <input class="form-control form-control-sm" name="contacto_internacional" id="contacto_internacional" type="text" placeholder="Nombre y cargo del contacto" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Agregar proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal editar proveedor laboratorio distribuidores-->
<div id="editar_proveedor_lab_dist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_proveedor_lab_dist" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Editar proveedor
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="row">
                        <input class="form-control form-control-sm" name="id_proveedor" id="id_proveedor" type="hidden">

                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de Proveedor</label>
                                <select name="tipo_proveedor_editar" id="tipo_proveedor_editar" class="form-control" onchange="evaluarTipoProveedorEditar()" required>
                                    <option value="1">Nacional</option>
                                    <option value="2">Internacional</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Proveedor</label>
                                <input class="form-control form-control-sm" name="nombre" id="nombre_editar" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Productos</label>
                                <select class="form-control form-control-sm" name="prov_prod_[]" id="prov_prod_editar" multiple required>
                                    <option value="0">Seleccione</option>
                                    @foreach($tipo_producto as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="campos_nacionales_proveedor_editar" class="w-100 d-contents">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input class="form-control form-control-sm" name="rut" id="rut_editar" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Rol</label>
                                <input class="form-control form-control-sm" name="rol_" id="rol_editar" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email_editar" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono_editar" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion" id="direccion_editar" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Región</label>
                            <select id="region_editar" onchange="buscar_ciudad_editar();" name="region_editar"
                                class="form-control form-control-sm" required>
                                <option value="0">Seleccione</option>
                                @if (isset($region))
                                    @foreach ($region as $reg)
                                        <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

					<div class="col-sm-6 col-md-6 col-xl-6">
						<div class="form-group">
							<label class="floating-label-activo-sm">Ciudad</label>
							<select id="comunas_editar" name="comunas_editar" class="form-control form-control-sm" required>


							</select>
						</div>
					</div>
                        </div>

                        <div id="campos_internacionales_proveedor_editar" class="w-100 d-contents" style="display: none;">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">País</label>
                                    <select name="pais_internacional_editar" id="pais_internacional_editar" class="form-control" disabled>
                                        <option value="0">Seleccione</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Brasil">Brasil</option>
                                        <option value="Canada">Canadá</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Corea del Sur">Corea del Sur</option>
                                        <option value="Espana">España</option>
                                        <option value="Estados Unidos">Estados Unidos</option>
                                        <option value="Francia">Francia</option>
                                        <option value="India">India</option>
                                        <option value="Italia">Italia</option>
                                        <option value="Japon">Japón</option>
                                        <option value="Mexico">México</option>
                                        <option value="Peru">Perú</option>
                                        <option value="Reino Unido">Reino Unido</option>
                                        <option value="Uruguay">Uruguay</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Ciudad / Estado</label>
                                    <input class="form-control form-control-sm" name="ciudad_internacional_editar" id="ciudad_internacional_editar" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Sitio web de la empresa</label>
                                    <input class="form-control form-control-sm" name="sitio_web_internacional_editar" id="sitio_web_internacional_editar" type="url" placeholder="https://empresa.com" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Referencia comercial internacional</label>
                                    <textarea class="form-control form-control-sm" name="referencias_internacionales_editar" id="referencias_internacionales_editar" rows="3" placeholder="Describe referencias, certificaciones, clientes o experiencia internacional" disabled></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Contacto internacional</label>
                                    <input class="form-control form-control-sm" name="contacto_internacional_editar" id="contacto_internacional_editar" type="text" placeholder="Nombre y cargo del contacto" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-script')
<script>
    function alternarValidacionCampos(selectorContenedor, activar) {
        $(selectorContenedor).find('input, select, textarea').each(function () {
            $(this).prop('disabled', !activar);
            $(this).prop('required', activar);

            if (!activar) {
                if (this.tagName === 'SELECT') {
                    $(this).val('0');
                } else {
                    $(this).val('');
                }
            }
        });
    }

    function evaluarTipoProveedor() {
        const tipoProveedor = $('#agregar_proveedor_lab_dist #tipo_proveedor').val();
        const esInternacional = tipoProveedor === '2';

        // En esta vista siempre se registra como proveedor de distribución.
        $('#id_tipo_proveedor').val('1');

        if (esInternacional) {
            $('#campos_nacionales_proveedor').hide();
            $('#campos_internacionales_proveedor').show();
            alternarValidacionCampos('#campos_nacionales_proveedor', false);
            alternarValidacionCampos('#campos_internacionales_proveedor', true);
            $('#agregar_proveedor_lab_dist #email').prop('disabled', false).prop('required', true);
            $('#agregar_proveedor_lab_dist #pais_internacional').focus();
            return;
        }

        $('#campos_nacionales_proveedor').show();
        $('#campos_internacionales_proveedor').hide();
        alternarValidacionCampos('#campos_nacionales_proveedor', true);
        alternarValidacionCampos('#campos_internacionales_proveedor', false);
        $('#agregar_proveedor_lab_dist #email').prop('disabled', false).prop('required', true);
    }

    function evaluarTipoProveedorEditar() {
        const tipoProveedor = $('#editar_proveedor_lab_dist #tipo_proveedor_editar').val();
        const esInternacional = tipoProveedor === '2';

        if (esInternacional) {
            $('#campos_nacionales_proveedor_editar').hide();
            $('#campos_internacionales_proveedor_editar').show();
            alternarValidacionCampos('#campos_nacionales_proveedor_editar', false);
            alternarValidacionCampos('#campos_internacionales_proveedor_editar', true);
            $('#editar_proveedor_lab_dist #email_editar').prop('disabled', false).prop('required', true);
            $('#editar_proveedor_lab_dist #pais_internacional_editar').focus();
            return;
        }

        $('#campos_nacionales_proveedor_editar').show();
        $('#campos_internacionales_proveedor_editar').hide();
        alternarValidacionCampos('#campos_nacionales_proveedor_editar', true);
        alternarValidacionCampos('#campos_internacionales_proveedor_editar', false);
        $('#editar_proveedor_lab_dist #email_editar').prop('disabled', false).prop('required', true);
    }

    $(document).ready(function () {
        evaluarTipoProveedor();
        evaluarTipoProveedorEditar();
        $('#prov_prod').select2({
            dropdownParent: $('#agregar_proveedor_lab_dist'),
            width: '100%',
            placeholder: 'Seleccione un producto',
            allowClear: true
        });
        $('#prov_prod_editar').select2({
            dropdownParent: $('#editar_proveedor_lab_dist'),
            width: '100%',
            placeholder: 'Seleccione un producto',
            allowClear: true
        });
    });
</script>
@endsection


