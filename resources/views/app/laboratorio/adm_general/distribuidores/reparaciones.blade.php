@extends('template.laboratorio.laboratorio_profesional.template')

@section('style')
<style>
    /* Estilos para el modal elegante */
    .modal-header-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .nav-tabs-custom .nav-link {
        color: #495057;
        border-bottom: 3px solid transparent;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-tabs-custom .nav-link:hover {
        color: #667eea;
        border-bottom-color: #667eea;
    }

    .nav-tabs-custom .nav-link.active {
        color: #667eea;
        border-bottom-color: #667eea;
        background-color: transparent;
    }

    .tab-content-custom {
        padding: 2rem 1rem;
    }

    .btn-action-product {
        padding: 0.4rem 0.8rem;
        font-size: 0.85rem;
        transition: all 0.2s ease;
    }

    .btn-reparar {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        border: none;
    }

    .btn-reparar:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 87, 108, 0.4);
        color: white;
    }

    .btn-reclamar {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        border: none;
    }

    .btn-reclamar:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(79, 172, 254, 0.4);
        color: white;
    }

    .badge-reparacion {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .badge-reclamo {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .producto-info-card {
        background: #f8f9fa;
        border-left: 4px solid #667eea;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .textarea-elegante {
        border: 2px solid #e0e0e0;
        border-radius: 0.5rem;
        padding: 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .textarea-elegante:focus {
        border-color: #667eea;
        background-color: #fafbff;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.1);
    }

    .buscador-productos {
        margin-top: 1.5rem;
        padding: 1.5rem;
        background: #f8f9fa;
        border-radius: 0.5rem;
    }

    .producto-resultado {
        padding: 0.75rem;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        margin-bottom: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .producto-resultado:hover {
        background-color: #e7f3ff;
        border-color: #667eea;
        transform: translateX(4px);
    }

    .producto-resultado.selected {
        background-color: #d4e3ff;
        border-color: #667eea;
        border-width: 2px;
    }
</style>
@endsection

@section('page-script')
<script>
$(document).ready(function() {
    // Event listeners para búsqueda
    $('#termino_busqueda_cliente_post_venta').on('keypress', function(e) {
        if(e.keyCode === 13) {
            buscar_cliente_venta_post_venta();
            return false;
        }
    });
});

/**
 * Buscar cliente por RUT, nombre o email para reparaciones
 */
function buscar_cliente_venta_post_venta() {
    const tipoBusqueda = $('#tipo_busqueda_cliente_post_venta').val() || 'rut';
    const termino = $('#termino_busqueda_cliente_post_venta').val().trim();

    if (!termino) {
        swal({
            title: 'Atención',
            text: 'Por favor ingrese un término de búsqueda',
            icon: 'warning',
            confirmButtonText: 'Aceptar'
        });
        return;
    }

    // Mostrar loader
    $('#resultados_busqueda_cliente_post_venta').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Buscando...</span>
            </div>
            <p class="mt-2">Buscando cliente...</p>
        </div>
    `);

    // Petición AJAX al endpoint
    $.ajax({
        url: "{{ route('laboratorio.distribucion.buscar_cliente_reparaciones') }}",
        method: 'POST',
        dataType: 'json',
        data: {
            termino: termino,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log('Respuesta:', response);
            if (response.status === 'success' && response.cliente) {
                mostrar_resultado_cliente_reparaciones(response);
            } else {
                $('#resultados_busqueda_cliente_post_venta').html(`
                    <div class="alert alert-warning">
                        <i class="feather icon-alert-circle mr-2"></i>
                        ${response.message || 'No se encontró cliente'}
                    </div>
                `);
            }
        },
        error: function(xhr) {
            console.error('Error:', xhr);
            let mensaje = 'Error al buscar cliente.';
            if (xhr.status === 404) {
                mensaje = 'No se encontró cliente con los datos ingresados.';
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                mensaje = xhr.responseJSON.message;
            }
            $('#resultados_busqueda_cliente_post_venta').html(`
                <div class="alert alert-danger">
                    <i class="feather icon-alert-circle mr-2"></i>
                    ${mensaje}
                </div>
            `);
        }
    });
}

/**
 * Mostrar resultado de búsqueda de cliente para reparaciones
 */
function mostrar_resultado_cliente_reparaciones(data) {
    const cliente = data.cliente;
    const productos = data.productos_comprados || [];

    let html = `
        <div class="card border-success mb-3">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0 text-white">
                    <i class="feather icon-check-circle mr-2"></i>
                    Cliente Encontrado
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Nombre:</strong> ${cliente.nombre || 'N/A'}
                        </p>
                        <p class="mb-2">
                            <strong>RUT:</strong> ${cliente.rut || 'N/A'}
                        </p>
                        <p class="mb-0">
                            <strong>Email:</strong> ${cliente.email || 'N/A'}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Teléfono:</strong> ${cliente.telefono || 'N/A'}
                        </p>
                        <p class="mb-2">
                            <strong>Dirección:</strong> ${cliente.direccion || 'N/A'}
                        </p>
                        <p class="mb-0">
                            <strong>Total de productos:</strong> <span class="badge badge-primary">${data.total_productos || 0}</span>
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success btn-sm" onclick="seleccionar_cliente_reparaciones(${cliente.id}, '${cliente.rut}', '${cliente.nombre}')">
                        <i class="feather icon-check mr-1"></i> Seleccionar este cliente
                    </button>
                    <button class="btn btn-secondary btn-sm" onclick="limpiar_busqueda_cliente_post_venta()">
                        <i class="feather icon-search mr-1"></i> Buscar otro
                    </button>
                </div>
            </div>
        </div>
    `;

    // Mostrar productos si existen
    if (productos.length > 0) {
        html += `
            <div class="card border-info mt-3">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0 text-white">
                        <i class="feather icon-package mr-2"></i>
                        Historial de Productos Comprados (${productos.length})
                    </h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Producto</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Precio Unitario</th>
                                    <th class="text-center">Fecha Compra</th>
                                    <th>Pedido</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
        `;

        productos.forEach(function(prod) {
            const precioUnit = parseFloat(prod.precio_unitario || 0).toLocaleString('es-CL', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
            html += `
                <tr>
                    <td>${prod.nombre || 'N/A'}</td>
                    <td class="text-center">${prod.cantidad || 1}</td>
                    <td class="text-center">$${precioUnit}</td>
                    <td class="text-center">${prod.fecha_compra || 'N/A'}</td>
                    <td><span class="badge badge-light">${prod.numero_pedido || 'N/A'}</span></td>
                    <td class="text-center">
                        <button class="btn btn-action-product btn-reparar"
                                onclick="abrir_modal_reparacion_reclamo(${prod.id}, '${prod.nombre.replace(/'/g, "\\'")}', $('#id_cliente_reparaciones').val(), '${cliente.nombre.replace(/'/g, "\\'")}')">
                            <i class="feather icon-tool mr-1"></i> Solicitar
                        </button>
                    </td>
                </tr>
            `;
        });

        html += `
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        `;
    }

    $('#resultados_busqueda_cliente_post_venta').html(html);

    // Cargar reparaciones y reclamosor del cliente
    cargar_reparaciones_cliente(cliente.id);
}

/**
 * Cargar reparaciones y reclamosor del cliente
 */
function cargar_reparaciones_cliente(cliente_id) {
    $.ajax({
        url: "{{ route('laboratorio.distribucion.obtener_reparaciones_cliente') }}",
        method: 'POST',
        dataType: 'json',
        data: {
            cliente_id: cliente_id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.status === 'success' && response.reparaciones.length > 0) {
                mostrar_tabla_reparaciones(response.reparaciones);
            }
        },
        error: function(err) {
            console.log('Error al cargar reparaciones:', err);
        }
    });
}

/**
 * Mostrar tabla de reparaciones/reclamosor
 */
function mostrar_tabla_reparaciones(reparaciones) {
    let html = `
        <div class="card border-warning mt-3">
            <div class="card-header bg-warning text-white">
                <h6 class="mb-0 text-white">
                    <i class="feather icon-alert-circle mr-2"></i>
                    Historial de Reparaciones y Reclamos (${reparaciones.length})
                </h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Tipo</th>
                                <th>Producto</th>
                                <th>Detalles</th>
                                <th class="text-center">Estado</th>
                                <th>Reemplazo</th>
                                <th class="text-center">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
    `;

    reparaciones.forEach(function(rep) {
        const reemplazo = rep.reemplazo ? `<small class="text-success">${rep.reemplazo}</small>` : '<small class="text-muted">-</small>';
        html += `
            <tr>
                <td class="text-center">
                    <span class="badge ${rep.color_tipo}">${rep.tipo_nombre}</span>
                </td>
                <td>${rep.producto}</td>
                <td><small>${rep.detalles}</small></td>
                <td class="text-center">
                    <span class="badge ${rep.color_estado}">${rep.estado_nombre}</span>
                </td>
                <td>${reemplazo}</td>
                <td class="text-center"><small class="text-muted">${rep.fecha}</small></td>
            </tr>
        `;
    });

    html += `
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    `;

    $('#resultados_busqueda_cliente_post_venta').append(html);
}

/**
 * Seleccionar cliente para reparación
 */
function seleccionar_cliente_reparaciones(id_cliente, rut, nombre) {
    $('#id_cliente_reparaciones').val(id_cliente);

    swal({
        title: 'Cliente Seleccionado',
        text: `Nombre: ${nombre}\nRUT: ${rut}`,
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });

    // Aquí puedes agregar lógica adicional como:
    // - Cargar productos disponibles para reparar
    // - Mostrar formulario de reparación
    // - etc.
}

/**
 * Limpiar búsqueda
 */
function limpiar_busqueda_cliente_post_venta() {
    $('#termino_busqueda_cliente_post_venta').val('');
    $('#resultados_busqueda_cliente_post_venta').html('');
    $('#id_cliente_reparaciones').val('');
    $('#termino_busqueda_cliente_post_venta').focus();
}

/**
 * Formato RUT
 */
function formatoRut(input) {
    let valor = input.value.replace(/[^\d\-K]/gi, '').toUpperCase();

    if (valor.length >= 2) {
        let partes = valor.split('-');
        let rut = partes[0].replace(/\D/g, '');
        let dv = partes[1] || '';

        if (rut.length > 2) {
            let rutFormato = '';
            for (let i = rut.length - 3; i >= 0; i -= 3) {
                rutFormato = '.' + rut.substring(i, i + 3) + rutFormato;
            }
            rutFormato = rut.substring(0, (rut.length) % 3 || 3) + rutFormato.substring(1);

            if (dv) {
                valor = rutFormato + '-' + dv;
            } else {
                valor = rutFormato;
            }
        }
    }

    input.value = valor;
}

// ===== FUNCIONES PARA MODAL DE REPARACIÓN/RECLAMO =====

/**
 * Abrir modal para reparación o reclamo
 */
function abrir_modal_reparacion_reclamo(producto_id, producto_nombre, id_cliente, nombre_cliente) {
    // Guardar datos del producto
    $('#modal_producto_id').val(producto_id);
    $('#modal_producto_nombre').val(producto_nombre);
    $('#modal_cliente_id').val(id_cliente);

    // Actualizar título del modal
    $('#modal_titulo_producto').text(producto_nombre);
    $('#modal_cliente_nombre').text(nombre_cliente);

    // Limpiar campos
    $('#textarea_reparacion').val('');
    $('#textarea_reclamo').val('');
    $('#textarea_solucion_esperada').val('');
    $('#buscador_productos_reemplazo').val('');
    $('#resultados_productos_reemplazo').html('');
    $('#producto_reemplazo_id').val('');

    // Resetear a tab de reparación
    $('#tab-reparacion').tab('show');

    // Mostrar modal
    $('#modal_reparacion_reclamo').modal('show');
}

/**
 * Cambiar tipo de acción (Reparación/Reclamo)
 */
function cambiar_tipo_accion(tipo) {
    $('#tipo_accion_seleccionado').val(tipo);

    if (tipo === 'reparacion') {
        $('#tab-reparacion').tab('show');
    } else {
        $('#tab-reclamo').tab('show');
    }
}

/**
 * Buscador de productos de bodega para reemplazo
 */
function buscar_productos_reemplazo() {
    const termino = $('#buscador_productos_reemplazo').val().trim();

    if (!termino || termino.length < 2) {
        $('#resultados_productos_reemplazo').html(`
            <div class="alert alert-info alert-sm mb-0">
                <i class="feather icon-info mr-2"></i> Ingrese al menos 2 caracteres para buscar
            </div>
        `);
        return;
    }

    // Mostrar loader
    $('#resultados_productos_reemplazo').html(`
        <div class="text-center py-2">
            <div class="spinner-border spinner-border-sm text-primary" role="status">
                <span class="sr-only">Buscando...</span>
            </div>
            <p class="mt-2 mb-0 small">Buscando productos...</p>
        </div>
    `);

    // AJAX para buscar productos de bodega
    $.ajax({
        url: "{{ route('laboratorio.distribucion.buscar_productos_bodega') }}",
        method: 'GET',
        dataType: 'json',
        data: {
            termino: termino,
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log('Productos encontrados:', response);
            if (response.status === 'success' && response.productos) {
                mostrar_productos_reemplazo(response.productos);
            } else {
                $('#resultados_productos_reemplazo').html(`
                    <div class="alert alert-warning alert-sm mb-0">
                        <i class="feather icon-alert-circle mr-2"></i> No se encontraron productos
                    </div>
                `);
            }
        },
        error: function() {
            $('#resultados_productos_reemplazo').html(`
                <div class="alert alert-danger alert-sm mb-0">
                    <i class="feather icon-alert-circle mr-2"></i> Error al buscar productos
                </div>
            `);
        }
    });
}

/**
 * Mostrar productos de reemplazo
 */
function mostrar_productos_reemplazo(productos) {
    let html = '';

    productos.forEach(function(prod) {
        const precio = (prod.precio_venta || 0);

        html += `
            <div class="producto-resultado" onclick="seleccionar_producto_reemplazo(${prod.id}, '${prod.nombre_producto}', '${precio}')">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="mb-1">${prod.nombre_producto}</h6>
                        <small class="text-muted">
                            <i class="feather icon-code mr-1"></i>Código: ${prod.codigo_interno || 'N/A'}
                        </small>
                    </div>
                    <span class="badge badge-primary">${precio}</span>
                </div>
                <small class="text-muted d-block mt-2">
                    <i class="feather icon-package mr-1"></i>Stock: ${prod.stock_actual || 0}
                </small>
            </div>
        `;
    });

    $('#resultados_productos_reemplazo').html(html);
}

/**
 * Seleccionar producto de reemplazo
 */
function seleccionar_producto_reemplazo(prod_id, prod_nombre, precio) {
    $('#producto_reemplazo_id').val(prod_id);
    $('#producto_reemplazo_nombre').val(prod_nombre);
    $('#producto_reemplazo_precio').val(precio);

    // Marcar como seleccionado visualmente
    $('.producto-resultado').removeClass('selected');
    event.target.closest('.producto-resultado').classList.add('selected');

    // Mostrar resumen
    $('#resumen_reemplazo').html(`
        <div class="alert alert-success alert-sm">
            <i class="feather icon-check-circle mr-2"></i>
            Producto seleccionado: <strong>${prod_nombre}</strong>
        </div>
    `);
}

/**
 * Guardar reparación o reclamo
 */
function guardar_reparacion_reclamo() {
    const tipo = $('#tipo_accion_seleccionado').val();
    const producto_id = $('#modal_producto_id').val();
    const cliente_id = $('#modal_cliente_id').val();

    let detalles = '';
    let descripcion = '';

    if (tipo === 'reparacion') {
        detalles = $('#textarea_reparacion').val().trim();
        if (!detalles) {
            swal({
                title: 'Falta información',
                text: 'Por favor describa lo que necesita reparar',
                icon: 'warning'
            });
            return;
        }
        descripcion = `Reparación: ${detalles}`;

        const prod_reemplazo = $('#producto_reemplazo_id').val();
        if (prod_reemplazo) {
            descripcion += ` | Reemplazo: ${$('#producto_reemplazo_nombre').val()}`;
        }
    } else {
        detalles = $('#textarea_reclamo').val().trim();
        if (!detalles) {
            swal({
                title: 'Falta información',
                text: 'Por favor argumente su reclamo',
                icon: 'warning'
            });
            return;
        }
        descripcion = `Reclamo: ${detalles}`;

        const solucionEsperada = $('#textarea_solucion_esperada').val().trim();
        if (solucionEsperada) {
            descripcion += ` | Solución esperada: ${solucionEsperada}`;
        }
    }

    // Guardar en servidor (puedes crear el endpoint correspondiente)
    const datosGuardar = {
        tipo: tipo,
        producto_id: producto_id,
        cliente_id: cliente_id,
        detalles: detalles,
        reemplazo_id: $('#producto_reemplazo_id').val() || null,
        _token: '{{ csrf_token() }}'
    };

    // Agregar solución esperada si es reclamo
    if (tipo === 'reclamo') {
        datosGuardar.solucion_esperada = $('#textarea_solucion_esperada').val().trim();
    }

    $.ajax({
        url: "{{ route('laboratorio.distribucion.guardar_reparacion_reclamo') }}",
        method: 'POST',
        dataType: 'json',
        data: datosGuardar,
        success: function(response) {
            console.log('Respuesta al guardar:', response);
            if (response.status === 'success') {
                swal({
                    title: 'Registro guardado',
                    text: tipo === 'reparacion' ? 'Reparación registrada exitosamente' : 'Reclamo registrado exitosamente',
                    icon: 'success'
                }).then(function() {
                    $('#modal_reparacion_reclamo').modal('hide');
                });
            } else {
                swal({
                    title: 'Error',
                    text: response.message || 'Error al guardar',
                    icon: 'error'
                });
            }
        },
        error: function() {
            swal({
                title: 'Error',
                text: 'Error de conexión al guardar',
                icon: 'error'
            });
        }
    });
}
</script>
@endsection
@section('content')
 <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">REPARACIONES, GARANTÍAS Y CAMBIOS</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('adm_cm.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="#">Reparaciones, garantías y cambios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cuerpo-->
            <div class="row">
                <div class="col-sm-12">

                    <!-- Buscador de Cliente - SIEMPRE VISIBLE -->
                    <div class="card border-primary" id="card_busqueda_cliente_post_venta">
                        <div class="card-header bg-primary">
                            <h6 class="text-white mb-0">
                                <i class="feather icon-search mr-2"></i>
                                Buscar Cliente
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Tipo de búsqueda -->
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="font-weight-bold">Buscar por:</label>
                                    <select class="form-control form-control-sm" id="tipo_busqueda_cliente_post_venta" name="tipo_busqueda_cliente_post_venta" disabled>
                                        <option value="rut" selected>RUT</option>
                                        <option value="nombre">Nombre</option>
                                        <option value="email">Email</option>
                                    </select>
                                </div>
                                <!-- Campo de búsqueda -->
                                <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                    <label class="font-weight-bold">Término de búsqueda:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" id="termino_busqueda_cliente_post_venta" oninput="formatoRut(this)" name="termino_busqueda_cliente_post_venta" placeholder="Ingrese RUT, nombre o email del cliente..." onkeypress="if(event.keyCode==13){buscar_cliente_venta_post_venta(); return false;}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="button" onclick="buscar_cliente_venta_post_venta()">
                                                <i class="feather icon-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">
                                        <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                                    </small>
                                </div>
                                <!-- Botón limpiar -->
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <label class="font-weight-bold d-block">&nbsp;</label>
                                    <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_cliente_post_venta()">
                                        <i class="feather icon-x"></i> Limpiar
                                    </button>
                                </div>
                            </div>
                            <!-- Resultados de búsqueda -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div id="resultados_busqueda_cliente_post_venta"></div>
                                    <div id="reserva_agregar_cliente_hora_post_venta" style="display: none;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre empresa</label>
                                                    <input type="text" required class="form-control form-control-sm" name="post_venta_nombres_cliente" id="post_venta_nombres_cliente">
                                                </div>
                                            </div>

                                            <div class="col-sm-9 col-md-9">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                    <input type="address" class="form-control form-control-sm" name="post_venta_direccion" id="post_venta_direccion">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">N&uacute;mero</label>
                                                    <input type="address" class="form-control form-control-sm" name="post_venta_numero_dir" id="post_venta_numero_dir">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Region</label>
                                                    <select id="region_agregar_post_venta" onchange="buscar_ciudad_post_venta();" name="region_agregar_post_venta" class="form-control" required>
                                                        <option value="0">Seleccione Regi&oacute;n</option>
                                                        @if (isset($regiones))
                                                            @foreach ($regiones as $reg)
                                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Ciudad</label>
                                                    <select id="ciudad_agregar_post_venta" name="ciudad_agregar_post_venta" class="form-control" required>
                                                        <option value="0">Seleccione Ciudad</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda_post_venta()" name="post_venta_correo" id="post_venta_correo">
                                                    <span id="mensaje_email_post_venta" style="display:none"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                    <input type="tel" class="form-control form-control-sm" name="post_venta_telefono_uno" id="post_venta_telefono_uno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="guardar_post_venta_cliente" onclick="registrar_cliente_nuevo_post_venta();" class="btn btn-info">
                                                Registrar cliente y Seleccionar
                                            </button>
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

<input type="hidden" name="id_cliente_fc" id="id_cliente_fc" value="">
<input type="hidden" name="id_profesional_fc" id="id_profesional_fc" value="{{ $profesional->id }}">
<input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $laboratorio->id_lugar_atencion }}">
<input type="hidden" name="id_cliente_reparaciones" id="id_cliente_reparaciones" value="">
<input type="hidden" name="id_producto_reparacion" id="id_producto_reparacion" value="">

<!-- Hidden inputs para modal -->
<input type="hidden" name="modal_producto_id" id="modal_producto_id" value="">
<input type="hidden" name="modal_producto_nombre" id="modal_producto_nombre" value="">
<input type="hidden" name="modal_cliente_id" id="modal_cliente_id" value="">
<input type="hidden" name="tipo_accion_seleccionado" id="tipo_accion_seleccionado" value="reparacion">
<input type="hidden" name="producto_reemplazo_id" id="producto_reemplazo_id" value="">
<input type="hidden" name="producto_reemplazo_nombre" id="producto_reemplazo_nombre" value="">
<input type="hidden" name="producto_reemplazo_precio" id="producto_reemplazo_precio" value="">
<input type="hidden" name="textarea_solucion_esperada" id="textarea_solucion_esperada" value="">

<!-- Modal elegante para Reparación/Reclamo -->
<div class="modal fade" id="modal_reparacion_reclamo" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal_reparacion_reclamo_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow-lg">
            <!-- Header con gradiente -->
            <div class="modal-header modal-header-custom border-0 p-4">
                <div>
                    <h5 class="modal-title" id="modal_reparacion_reclamo_label" style="font-size: 1.3rem; font-weight: 700;">
                        <i class="feather icon-tool mr-2"></i>Solicitud de Reparación o Reclamo
                    </h5>
                    <p class="mb-0 mt-2" style="font-size: 0.9rem; opacity: 0.9;">
                        <i class="feather icon-user mr-1"></i><span id="modal_cliente_nombre"></span>
                    </p>
                </div>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-0">
                <!-- Card de información del producto -->
                <div class="producto-info-card mx-4 mt-4">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="badge badge-primary p-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                <i class="feather icon-package" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0" id="modal_titulo_producto" style="font-weight: 600;"></h6>
                            <small class="text-muted">
                                <i class="feather icon-info mr-1"></i>Seleccione el tipo de solicitud que desea realizar
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Tabs para Reparación y Reclamo -->
                <div class="mx-4 mt-4">
                    <ul class="nav nav-tabs nav-tabs-custom" id="tab_reparacion_reclamo" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-reparacion" data-toggle="tab" href="#panel-reparacion" role="tab" aria-controls="panel-reparacion" aria-selected="true" onclick="cambiar_tipo_accion('reparacion')">
                                <i class="feather icon-tool mr-2"></i>Reparación
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-reclamo" data-toggle="tab" href="#panel-reclamo" role="tab" aria-controls="panel-reclamo" aria-selected="false" onclick="cambiar_tipo_accion('reclamo')">
                                <i class="feather icon-message-square mr-2"></i>Reclamo
                            </a>
                        </li>
                    </ul>

                    <!-- Contenido de los tabs -->
                    <div class="tab-content tab-content-custom">
                        <!-- Panel: Reparación -->
                        <div class="tab-pane fade show active" id="panel-reparacion" role="tabpanel" aria-labelledby="tab-reparacion">
                            <div class="form-group">
                                <label class="font-weight-bold mb-3">
                                    <i class="feather icon-edit-3 mr-2" style="color: #f5576c;"></i>
                                    Describa el problema o lo que se necesita reparar
                                </label>
                                <textarea id="textarea_reparacion" class="form-control textarea-elegante" rows="5"
                                    placeholder="Ej: El audífono izquierdo no funciona correctamente, no produce sonido en frecuencias altas..."></textarea>
                                <small class="text-muted mt-2 d-block">
                                    <i class="feather icon-info mr-1"></i>Proporcione detalles específicos del problema
                                </small>
                            </div>

                            <!-- Buscador de productos para reemplazo -->
                            <div class="buscador-productos">
                                <h6 class="font-weight-bold mb-3">
                                    <i class="feather icon-swap-2 mr-2" style="color: #667eea;"></i>
                                    Reemplazo temporal (opcional)
                                </h6>
                                <div class="input-group mb-3">
                                    <input type="text" id="buscador_productos_reemplazo" class="form-control"
                                        placeholder="Buscar producto de reemplazo..."
                                        onkeyup="buscar_productos_reemplazo()">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="button" onclick="buscar_productos_reemplazo()">
                                            <i class="feather icon-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="resultados_productos_reemplazo" class="mt-3"></div>
                                <div id="resumen_reemplazo" class="mt-3"></div>
                            </div>
                        </div>

                        <!-- Panel: Reclamo -->
                        <div class="tab-pane fade" id="panel-reclamo" role="tabpanel" aria-labelledby="tab-reclamo">
                            <div class="form-group">
                                <label class="font-weight-bold mb-3">
                                    <i class="feather icon-alert-triangle mr-2" style="color: #4facfe;"></i>
                                    Argumente su reclamo
                                </label>
                                <textarea id="textarea_reclamo" class="form-control textarea-elegante" rows="5"
                                    placeholder="Ej: El producto no cumple con las características descritas en la publicidad, presenta defectos de fabricación..."></textarea>
                                <small class="text-muted mt-2 d-block">
                                    <i class="feather icon-info mr-1"></i>Explique claramente el motivo de su reclamo
                                </small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold mb-3">
                                    <i class="feather icon-target mr-2" style="color: #00f2fe;"></i>
                                    Solución esperada
                                </label>
                                <textarea id="textarea_solucion_esperada" class="form-control textarea-elegante" rows="4"
                                    placeholder="Ej: Devolución del dinero, cambio del producto, reparación sin costo..."></textarea>
                                <small class="text-muted mt-2 d-block">
                                    <i class="feather icon-info mr-1"></i>Describa qué solución espera que se implemente
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    <i class="feather icon-x mr-1"></i>Cancelar
                </button>
                <button type="button" class="btn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none;" onclick="guardar_reparacion_reclamo()">
                    <i class="feather icon-check mr-1"></i>Registrar Solicitud
                </button>
            </div>
        </div>
    </div>
</div>

<!--Cierre: Container Completo-->
{{--  @include('app.proveedor.lab_profesional.modal_cont_audifono.calibracion_audifono')
@include('app.proveedor.lab_profesional.modal_cont_audifono.reparacion_audifono')  --}}
@endsection
