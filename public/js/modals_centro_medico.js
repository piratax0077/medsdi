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

function editar_gasto() {
    $('#editar_gasto_cm').modal('show');
}

/*-Proveedores-*/
function agregar_proveedor() {
    $('#agregar_proveedor_cm').modal('show');
}

function editar_proveedor() {
    $('#editar_proveedor_cm').modal('show');
}
