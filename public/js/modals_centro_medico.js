/*-Modals personal-*/

/*-Modals profesional de la salud-*/
function registrar_profesional() {
    $('#registrar_profesional_cm').modal('show');
}

function editar_datos_profesional() {
    $('#editar_profesional_cm').modal('show');
}



function asociar_profesional() {
    $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
    $('#div_agregar_profesional_busqueda').show();
    $('#div_agregar_profesional_ver_info_prof').hide();
    $('#div_agregar_profesional_formulario_nuevo_prof').hide();
    $('#asociar_profesional_cm').modal('show');
}


/*-Modals asistentes-*/



function rol_permisos_asistente() {
    $('#rol_permisos_asistente_cm').modal('show');
}

function asociar_asistente() {
    $('#asociar_asistente_cm').modal('show');
}

/*-Modals personal administrativo-*/
function registrar_administrativo() {
    $('#registrar_administrativo_cm').modal('show');
}

function editar_datos_administrativo() {
    $('#editar_administrativo_cm').modal('show');
}

function rol_permisos_administrativo() {
    $('#rol_permisos_administrativo_cm').modal('show');
}

function asociar_administrativo() {
    $('#asociar_administrativo_cm').modal('show');
}

/*-Modals limpieza mantencion-*/
function registrar_limpieza_mantencion() {
    $('#registrar_limpieza_mantencion_cm').modal('show');
}

function editar_datos_limpieza_mantencion() {
    $('#editar_limpieza_mantencion_cm').modal('show');
}

function rol_permisos_limpieza_mantencion() {
    $('#rol_permisos_limpieza_mantencion_cm').modal('show');
}

function asociar_limpieza_mantencion() {
    $('#asociar_limpieza_mantencion_cm').modal('show');
}

/*-Modals insumos-*/
function agregar_producto() {
    $('#agregar_producto_cm').modal('show');
}

function quitar_producto() {
    $('#quitar_producto_cm').modal('show');
}

function editar_producto() {
    $('#editar_producto_cm').modal('show');
}

/*-Gastos-*/
function agregar_gasto() {
    $('#agregar_gasto_cm').modal('show');
}


/*-Proveedores-*/
function agregar_proveedor_lab_dist() {
    $('#agregar_proveedor_lab_dist').modal('show');
}

function editar_proveedor_lab_dist(id) {
    let url = "/Administracion/getProveedor/" + id;
    $.get(url, function (data) {
        let proveedor = data;
        // json_decode(data);
        proveedor = JSON.parse(proveedor);
        console.log(proveedor);
        $('#id_proveedor').val(proveedor.id)

        let detalleLegacy = {};
        if (proveedor.otro2) {
            try {
                detalleLegacy = JSON.parse(proveedor.otro2);
            } catch (e) {
                detalleLegacy = {};
            }
        }

        const esInternacional = Number(proveedor.tipo_procedencia) === 2
            || !!proveedor.pais_internacional
            || !!detalleLegacy.pais_internacional;

        const paisInternacional = proveedor.pais_internacional || detalleLegacy.pais_internacional || '0';
        const ciudadInternacional = proveedor.ciudad_internacional || detalleLegacy.ciudad_internacional || '';
        const referenciasInternacionales = proveedor.referencias_internacionales || detalleLegacy.referencias_internacionales || '';
        const contactoInternacional = proveedor.contacto_internacional || detalleLegacy.contacto_internacional || '';
        const sitioWebInternacional = proveedor.sitio_web_internacional || proveedor.otro || '';

        // agregar el atributo action al formulario de editar proveedor con la ruta post para editar proveedor
        $('#editar_proveedor_lab_dist form').attr('action', '/Administracion/editarProveedor');
        // agregar method post
        $('#editar_proveedor_lab_dist form').attr('method', 'post');

        $('#editar_proveedor_lab_dist').modal('show');
        $('#editar_proveedor_lab_dist #tipo_proveedor_editar').val(esInternacional ? '2' : '1');
        $('#editar_proveedor_lab_dist #nombre_editar').val(proveedor.nombre);

        // Usar el array de IDs de productos del modelo (ya viene parseado)
        $('#editar_proveedor_lab_dist #prov_prod_editar').val(proveedor.productos_ids).trigger('change');

        $('#editar_proveedor_lab_dist #rut_editar').val(proveedor.rut);
        $('#editar_proveedor_lab_dist #rol_editar').val(proveedor.rol_tributario);
        $('#editar_proveedor_lab_dist #direccion_editar').val(proveedor.direccion);
        $('#editar_proveedor_lab_dist #telefono_editar').val(proveedor.telefono);
        $('#editar_proveedor_lab_dist #email_editar').val(proveedor.email);

        $('#editar_proveedor_lab_dist #pais_internacional_editar').val(paisInternacional);
        $('#editar_proveedor_lab_dist #ciudad_internacional_editar').val(ciudadInternacional);
        $('#editar_proveedor_lab_dist #sitio_web_internacional_editar').val(sitioWebInternacional);
        $('#editar_proveedor_lab_dist #referencias_internacionales_editar').val(referenciasInternacionales);
        $('#editar_proveedor_lab_dist #contacto_internacional_editar').val(contactoInternacional);

        $('#editar_proveedor_lab_dist #region_editar').val(proveedor.id_region);
        // lo que se cumpla la funcion buscar_ciudad_editar asignar el valor de id_comuna a comunas_editar
        buscar_ciudad_editar().then(()=>{
            $('#comunas_editar').val(proveedor.id_comuna);
            if (typeof evaluarTipoProveedorEditar === 'function') {
                evaluarTipoProveedorEditar();
            }
        }).catch((error)=>{
            console.error(error);
        });
    });
}

function eliminar_proveedor_lab_dist(id) {
    swal({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                value: null,
                visible: true
            },
            confirm: {
                text: 'Sí, eliminar',
                value: true
            }
        }
    }).then(function(value) {
        if (value) {
            $.ajax({
                url: '/Administracion/eliminarProveedor/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    swal('¡Eliminado!', 'El proveedor ha sido eliminado.', 'success').then(function() {
                        location.reload();
                    });
                },
                error: function(error) {
                    swal('Error', 'No se pudo eliminar el proveedor.', 'error');
                }
            });
        }
    });
}
