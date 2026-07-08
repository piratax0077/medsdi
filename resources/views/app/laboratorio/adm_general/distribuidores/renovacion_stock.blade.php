@extends('template.laboratorio.laboratorio_profesional.template')

@section('title', 'Renovación de Stock')

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">RENOVACIÓN DE STOCK</h5>
                        </div>
                        <ul class="breadcrumb mb-2">
                            {{--  <li class="breadcrumb-item"><a href="{{ route('laboratorio.adm_general.distribuidores.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>  --}}
                            <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Renovación de Stock</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0 text-white">
                            <i class="fas fa-sync-alt"></i> Renovación de Stock
                        </h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">
                            Administra la renovación de stock de productos. Revisa los niveles de inventario
                            y solicita nuevas compras según sea necesario.
                        </p>

                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle"></i>
                            Esta sección te permitirá monitorear los productos con bajo stock y generar
                            solicitudes de renovación a proveedores.
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Productos a Renovar</h5>
                                        <p class="display-4 text-warning">{{ $productos_con_stock_bajo ?? 0 }}</p>
                                        <p class="text-muted">Productos con stock bajo</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Solicitudes Pendientes</h5>
                                        <p class="display-4 text-info">--</p>
                                        <p class="text-muted">Solicitudes en proceso</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5>Listado de Productos Disponibles</h5>
                                  <table id="inventario_insumos" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Nº lote /código</th>
                                <th class="text-center align-middle">Imagen</th>
                                <th class="text-center align-middle">Producto</th>
                                <th class="text-center align-middle">Stock Inicial</th>
                                <th class="text-center align-middle">Entradas</th>
                                <th class="text-center align-middle">Salidas</th>
                                <th class="text-center align-middle">Stock actual</th>

                                <th class="text-center align-middle">Proveedor</th>
                                <th class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($productos->count() > 0)
                                @foreach($productos as $producto)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span>{{ $producto->codigo_interno }}</span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <img src="{{ asset('storage/' . $producto->image_path) }}" alt="{{ $producto->nombre }}" class="img-fluid" style="max-width: 50px;"
                                            onerror="this.onerror=null;this.src='{{ asset('storage/images/productos/default.png') }}';">

                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $producto->nombre }}</span><br>
                                            <small class="text-muted">{{ $producto->tipo_producto }}</small>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $producto->stock_minimo }}</span><br>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>-</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>-</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ $producto->stock_actual }}</span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span>{{ $producto->proveedor ?? 'N/A' }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <!--Botón Solicitar a proveedor en caso de stock bajo-->
                                            @if($producto->stock_actual < $producto->stock_minimo)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-id="{{ $producto->id }}"
                                                    data-nombre="{{ $producto->nombre }}"
                                                    data-stock="{{ $producto->stock_actual }}"
                                                    data-minimo="{{ $producto->stock_minimo }}"
                                                    data-proveedor="{{ $producto->proveedor ?? 'N/A' }}"
                                                    onclick="solicitar_proveedor(this);"
                                                ><i class="feather icon-alert-triangle"></i> Solicitar a proveedor</button>
                                            @endif
                                            <!-- editar producto -->
                                            <button type="button" class="btn btn-info btn-sm" onclick="editar_producto_inventario({{ $producto->id }});"><i class="feather icon-edit"></i> Editar</button>
                                            <!-- eliminar producto -->
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_producto({{ $producto->id }});"><i class="feather icon-trash-2"></i> Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <p class="text-muted">No hay productos registrados en las bodegas de tu institución</p>
                                    </td>
                                </tr>
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

<!-- Modal Solicitar a Proveedor -->
<div id="modal_solicitar_proveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_solicitar_proveedor" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white"><i class="feather icon-alert-triangle mr-2"></i>Solicitar reposición al proveedor</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <!-- Info del producto -->
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="feather icon-package mr-2 f-20"></i>
                    <div>
                        <strong>Producto:</strong> <span id="solic_nombre_producto"></span><br>
                        <strong>Stock actual:</strong> <span id="solic_stock_actual" class="text-danger font-weight-bold"></span>
                        &nbsp;/&nbsp;
                        <strong>Stock mínimo:</strong> <span id="solic_stock_minimo"></span>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <strong>Proveedor:</strong> <span id="solic_proveedor"></span>
                    </div>
                </div>

                <!-- Selección tipo de pedido -->
                <h6 class="font-weight-bold mb-3">¿Qué tipo de pedido desea realizar?</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div id="card_pedido_mismo" class="card border-info h-100 cursor-pointer" onclick="seleccionar_tipo_pedido('mismo')" style="cursor:pointer">
                            <div class="card-body text-center">
                                <i class="feather icon-refresh-cw f-30 text-info mb-2"></i>
                                <h6 class="font-weight-bold">Repetir último pedido</h6>
                                <small class="text-muted">Se enviará la misma cantidad y especificaciones del pedido anterior a este proveedor.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="card_pedido_nuevo" class="card border-success h-100 cursor-pointer" onclick="seleccionar_tipo_pedido('nuevo')" style="cursor:pointer">
                            <div class="card-body text-center">
                                <i class="feather icon-plus-circle f-30 text-success mb-2"></i>
                                <h6 class="font-weight-bold">Nuevo pedido</h6>
                                <small class="text-muted">Ingrese manualmente la cantidad y observaciones para este pedido.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario nuevo pedido (oculto por defecto) -->
                <div id="form_nuevo_pedido" class="d-none">
                    <hr>
                    <h6 class="font-weight-bold mb-3">Detalle del nuevo pedido</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cantidad solicitada</label>
                                <input type="number" class="form-control form-control-sm" id="solic_cantidad" name="solic_cantidad" min="1" value="1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Urgencia</label>
                                <select class="form-control form-control-sm" id="solic_urgencia" name="solic_urgencia">
                                    <option value="normal">Normal</option>
                                    <option value="urgente">Urgente</option>
                                    <option value="critica">Crítica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea class="form-control form-control-sm" id="solic_observaciones" name="solic_observaciones" rows="3" placeholder="Indique instrucciones especiales, presentación, marca, etc."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resumen pedido mismo (oculto por defecto) -->
                <div id="resumen_mismo_pedido" class="d-none">
                    <hr>
                    <div id="detalle_ultima_compra_cargando" class="text-center py-3">
                        <i class="feather icon-loader mr-1"></i> Cargando última compra...
                    </div>
                    <div id="detalle_ultima_compra_contenido" class="d-none">
                        <h6 class="font-weight-bold mb-2">Detalle de la última compra registrada</h6>
                        <table class="table table-sm table-bordered mb-0">
                            <tbody>
                                <tr><th class="bg-light" style="width:40%">Proveedor</th><td id="uc_proveedor"></td></tr>
                                <tr><th class="bg-light">N° Factura</th><td id="uc_numero_factura"></td></tr>
                                <tr><th class="bg-light">Fecha emisión</th><td id="uc_fecha_emision"></td></tr>
                                <tr><th class="bg-light">Fecha compra</th><td id="uc_fecha_compra"></td></tr>
                                <tr><th class="bg-light">Cantidad</th><td id="uc_cantidad"></td></tr>
                                <tr><th class="bg-light">Precio unitario</th><td id="uc_precio_compra"></td></tr>
                                <tr><th class="bg-light">Total factura</th><td id="uc_total_final"></td></tr>
                                <tr><th class="bg-light">Lote</th><td id="uc_lote"></td></tr>
                                <tr><th class="bg-light">Vencimiento</th><td id="uc_fecha_vencimiento"></td></tr>
                                <tr><th class="bg-light">Observaciones</th><td id="uc_observaciones"></td></tr>
                            </tbody>
                        </table>
                        <div class="alert alert-info mt-2 mb-0 p-2">
                            <small><i class="feather icon-info mr-1"></i>Se repetirá este pedido con la misma cantidad y proveedor.</small>
                        </div>
                    </div>
                    <div id="detalle_ultima_compra_vacio" class="d-none">
                        <div class="alert alert-warning">
                            <i class="feather icon-alert-circle mr-1"></i>
                            No existe una compra previa registrada para este producto. Se registrará como nueva solicitud sin especificaciones.
                        </div>
                    </div>
                </div>

                <input type="hidden" id="solic_id_producto" value="">
                <input type="hidden" id="solic_tipo_pedido" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning text-white" id="btn_confirmar_solicitud" onclick="confirmar_solicitud_proveedor()" disabled>
                    <i class="feather icon-send mr-1"></i>Enviar solicitud
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Solicitar a Proveedor -->

@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        // $('#inventario_insumos').DataTable({
        //     "language": {
        //         "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        //     },
        //     responsive: true,
        //     "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
        //     "pageLength": 5,
        // });
            $('#tpo_prod_bodega_agregar').select2({
                placeholder: 'Selecciona los tipos de productos',
                width: '100%',
                allowClear: true
            });
            $('#cont_ca_bodega_agregar').select2({
                placeholder: 'Selecciona los materiales e insumos con autorización',
                width: '100%',
                allowClear: true
            });
    });

    function agregar_producto() {
        $('#agregar_producto').modal('show');
    }
     function eliminar_producto(id) {
        $('#quitar_producto').modal('show');
    }
     function editar_producto(id) {
        $('#editar_producto').modal('show');
    }

    function editar_producto_inventario(id){
        dame_producto_inventario(id);
    }

    function guardarCambiosProducto(){
        var id = $('#id_producto_editar').val();
        var nombre = $('#nombre_producto_editar').val();
        var cantidad = $('#cantidad_producto_editar').val();
        var tipo = $('#tipo_producto_editar').val();
        var observaciones = $('#observaciones_producto_editar').val();
        var nueva_imagen = $('#nueva_imagen_producto_editar')[0].files[0];

        var formData = new FormData();
        formData.append('id', id);
        formData.append('nombre', nombre);
        formData.append('cantidad', cantidad);
        formData.append('tipo', tipo);
        formData.append('observaciones', observaciones);
        if(nueva_imagen){
            formData.append('nueva_imagen', nueva_imagen);
        }
        formData.append('_token', "{{ csrf_token() }}");

        var url = "{{ route('bodegas.editar_producto')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data);
                if(data.estado == 'ok'){
                    //cerrar modal
                    $('#editarProductoInventarioModal').modal('hide');
                    swal({
                        title: "Éxito",
                        text: "Producto actualizado correctamente",
                        icon: "success",
                    }).then(() => {
                        location.reload();
                    })
                }
            }
        });
    }

    function eliminar_producto_inventario(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este producto!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_producto_inventario(id);
            }
        });
    }

    function confirmar_eliminar_producto_inventario(id){
        var url = "{{ route('bodegas.eliminar_producto')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                console.log(data);
                if(data == 'ok'){
                    alert('Producto eliminado');
                    location.reload();
                }
            }
        });
    }

    function ver_producto_inventario(id){
        var url = "{{ route('bodegas.dame_producto_inventario')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                console.log(data);
                let image_path = "{{ asset('') }}/" + data.image_path;
                $('#detalle_nombre_producto').text(data.producto);
                $('#detalle_cantidad_producto').text(data.cantidad);
                $('#detalle_tipo_producto').text(data.tipo_producto);
                $('#detalle_observaciones_producto').text(data.observaciones);
                $('#detalle_imagen_producto').attr('src', image_path);
                $('#verDetalleProductoInventarioModal').modal('show');
            }
        });
    }

    function dame_producto_inventario(id){
        var url = "{{ route('bodegas.dame_producto_inventario')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                console.log(data);
                $('#id_producto_editar').val(data.id);
                let image_path = "{{ asset('') }}/" + data.image_path;
                $('#imagen_producto_editar').attr('src', image_path);
                $('#nombre_producto_editar').val(data.producto);
                $('#cantidad_producto_editar').val(data.cantidad);
                $('#tipo_producto_editar').val(data.tipo_producto);
                $('#observaciones_producto_editar').val(data.observaciones);
                $('#editarProductoInventarioModal').modal('show');
            }
        });
    }

    function añadir_bodega_nueva(){
        console.log('añadiendo bodega');
        $('#agregar_bodega').modal('show');
    }

    function añadir_bodega() {
        limpiar_formulario_bodega();
        $('#agregar_bodega_editar').modal('show');
    }

      function guardar_bodega(){
        var nombre = $('#nombre_bodega_agregar').val();
        var ubicacion = $('#direccion_bodega_agregar').val();
        var descripcion = $('#descripcion_bodega_agregar').val();
        var email = $('#email_bodega_agregar').val();
        var telefono = $('#telefono_bodega_agregar').val();
        var tpos_productos = $('#tpo_prod_bodega_agregar').val();
        var cont_ca = $('#cont_ca_bodega_agregar').val();
        var id_institucion = $('#id_institucion').val();

        if(nombre == '' || ubicacion == '' || descripcion == '' || tpos_productos == '' || cont_ca == ''){
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });

        } else {
            var data = {
                nombre: nombre,
                ubicacion: ubicacion,
                descripcion: descripcion,
                email: email,
                telefono: telefono,
                tpos_productos: tpos_productos,
                cont_ca: cont_ca,
                id_institucion: id_institucion,
                distribucion: 1, // para indicar que es una bodega de distribución
                _token: '{{ csrf_token() }}',
            };


            $.ajax({
                url: '{{ route("bodega.guardar_bodega") }}',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data);
                    if (data.mensaje == 'OK') {
                        swal({
                            title: 'Registro guardado',
                            text: 'El registro se ha guardado correctamente',
                            icon: 'success',
                            button: 'Aceptar'

                        });
                        $('#agregar_bodega').modal('hide');
                        $('#contenedor_bodegas').empty();
                        $('#contenedor_bodegas').append(data.v);
                        limpiar_formulario_bodega();
                    } else {
                        alert('Error al guardar el registro');
                    }
                },
                error: function(data) {
                    console.log(data);
                    alert('Error al guardar el registro');
                }
            });
        }

    }

    function limpiar_formulario_bodega(){
        $('#nombre_bodega_agregar').val('');
        $('#direccion_bodega_agregar').val('');
        $('#descripcion_bodega_agregar').val('');
        $('#email_bodega_agregar').val('');
        $('#telefono_bodega_agregar').val('');
        $('#tpo_prod_bodega_agregar').val([]);
        $('#cont_ca_bodega_agregar').val([]);
        // focus
        $('#nombre_bodega_agregar').focus();
    }

    /* ---- Solicitar a proveedor ---- */
    function solicitar_proveedor(btn) {
        var $btn = $(btn);

        // Leer datos desde data attributes del botón
        var id        = $btn.data('id');
        var nombre    = $btn.data('nombre');
        var stock     = $btn.data('stock');
        var minimo    = $btn.data('minimo');
        var proveedor = $btn.data('proveedor');

        // Resetear estado del modal
        $('#solic_id_producto').val(id);
        $('#solic_tipo_pedido').val('');
        $('#btn_confirmar_solicitud').prop('disabled', true);
        $('#form_nuevo_pedido').addClass('d-none');
        $('#resumen_mismo_pedido').addClass('d-none');
        $('#card_pedido_mismo').removeClass('shadow').css('border-width','1px');
        $('#card_pedido_nuevo').removeClass('shadow').css('border-width','1px');
        $('#solic_cantidad').val(1);
        $('#solic_observaciones').val('');
        $('#solic_urgencia').val('normal');

        // Poblar info del producto
        $('#solic_nombre_producto').text(nombre);
        $('#solic_stock_actual').text(stock);
        $('#solic_stock_minimo').text(minimo);
        $('#solic_proveedor').text(proveedor);

        $('#modal_solicitar_proveedor').modal('show');
    }

    function seleccionar_tipo_pedido(tipo) {
        $('#solic_tipo_pedido').val(tipo);
        $('#btn_confirmar_solicitud').prop('disabled', false);

        if (tipo === 'mismo') {
            $('#card_pedido_mismo').addClass('shadow').css('border-width','2px');
            $('#card_pedido_nuevo').removeClass('shadow').css('border-width','1px');
            $('#form_nuevo_pedido').addClass('d-none');
            $('#resumen_mismo_pedido').removeClass('d-none');

            // Resetear estado de carga
            $('#detalle_ultima_compra_cargando').removeClass('d-none');
            $('#detalle_ultima_compra_contenido').addClass('d-none');
            $('#detalle_ultima_compra_vacio').addClass('d-none');

            var idProducto    = $('#solic_id_producto').val();
            var idInstitucion = $('#id_institucion').val();

            $.ajax({
                url: '{{ route("bodegas.ultima_compra_producto") }}',
                type: 'GET',
                data: { id_producto: idProducto, id_institucion: idInstitucion },
                success: function(resp) {
                    console.log(resp);
                    $('#detalle_ultima_compra_cargando').addClass('d-none');
                    if (resp.encontrado) {
                        $('#uc_proveedor').text(resp.proveedor || '-');
                        $('#uc_numero_factura').text(resp.numero_factura || '-');
                        $('#uc_fecha_emision').text(resp.fecha_emision || '-');
                        $('#uc_fecha_compra').text(resp.fecha_compra || '-');
                        $('#uc_cantidad').text(resp.cantidad || '-');
                        $('#uc_precio_compra').text(resp.precio_compra ? '$' + Number(resp.precio_compra).toLocaleString('es-CL') : '-');
                        $('#uc_total_final').text(resp.total_final ? '$' + Number(resp.total_final).toLocaleString('es-CL') : '-');
                        $('#uc_lote').text(resp.lote || '-');
                        $('#uc_fecha_vencimiento').text(resp.fecha_vencimiento || '-');
                        $('#uc_observaciones').text(resp.observaciones || '-');
                        $('#detalle_ultima_compra_contenido').removeClass('d-none');
                    } else {
                        $('#detalle_ultima_compra_vacio').removeClass('d-none');
                    }
                },
                error: function() {
                    $('#detalle_ultima_compra_cargando').addClass('d-none');
                    $('#detalle_ultima_compra_vacio').removeClass('d-none');
                }
            });
        } else {
            $('#card_pedido_nuevo').addClass('shadow').css('border-width','2px');
            $('#card_pedido_mismo').removeClass('shadow').css('border-width','1px');
            $('#resumen_mismo_pedido').addClass('d-none');
            $('#form_nuevo_pedido').removeClass('d-none');
        }
    }

    function confirmar_solicitud_proveedor() {
        var tipo       = $('#solic_tipo_pedido').val();
        var id         = $('#solic_id_producto').val();
        var cantidad   = $('#solic_cantidad').val();
        var urgencia   = $('#solic_urgencia').val();
        var obs        = $('#solic_observaciones').val();
        var institucion = $('#id_institucion').val();

        if (tipo === 'nuevo' && (!cantidad || cantidad < 1)) {
            swal({ title: 'Error', text: 'Ingrese una cantidad válida.', icon: 'error', button: 'Aceptar' });
            return;
        }

        var data = {
            id_producto:    id,
            tipo_pedido:    tipo,
            cantidad:       tipo === 'nuevo' ? cantidad : null,
            urgencia:       tipo === 'nuevo' ? urgencia : null,
            observaciones:  tipo === 'nuevo' ? obs : null,
            id_institucion: institucion,
            _token:         '{{ csrf_token() }}'
        };

        $('#btn_confirmar_solicitud').prop('disabled', true).html('<i class="feather icon-loader mr-1"></i>Enviando...');

        $.ajax({
            url: '{{ route("bodegas.solicitar_proveedor") }}',
            type: 'POST',
            data: data,
            success: function(resp) {
                $('#modal_solicitar_proveedor').modal('hide');
                swal({
                    title: '¡Solicitud enviada!',
                    text: 'La solicitud al proveedor fue registrada correctamente.',
                    icon: 'success',
                    button: 'Aceptar'
                }).then(function() {
                    location.reload();
                });
            },
            error: function(err) {
                $('#btn_confirmar_solicitud').prop('disabled', false).html('<i class="feather icon-send mr-1"></i>Enviar solicitud');
                swal({ title: 'Error', text: 'No se pudo enviar la solicitud. Intente nuevamente.', icon: 'error', button: 'Aceptar' });
            }
        });
    }
</script>
@endsection
