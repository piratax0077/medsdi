$(document).on( "pageshow","#autorizacion",function( event ) {
    const esProfesional = localStorage.getItem('rolActivo') === 'Profesional';
    const $opcionesFooter = $('#autorizacion')
        .find('[data-role="footer"] .row')
        .first()
        .children();

    $opcionesFooter.eq(0).find('p').attr('onclick', 'volverInicioSegunRol()');
    $opcionesFooter.eq(1).toggle(!esProfesional);
    $opcionesFooter.eq(0).add($opcionesFooter.eq(2))
        .toggleClass('col-xs-4', !esProfesional)
        .toggleClass('col-xs-6', esProfesional);
});


const respuesta = (estado) => {

    var pass_device1 = $.trim($('#password_').val());
    var pass_device2 = localStorage.getItem('password') || $('#pass_device').val();

    // Nunca usar el valor inicial "0" como clave de autorización.
    if (!pass_device2 || pass_device2 === '0') {
        if (typeof checkDevice === 'function') {
            checkDevice(function (claveDisponible) {
                if (claveDisponible) {
                    respuesta(estado);
                    return;
                }

                navigator.notification.alert(
                    'El dispositivo no tiene una clave activa para esta cuenta.',
                    function () {},
                    'Clave no disponible',
                    'Cerrar'
                );
            }, true);
        }
        return false;
    }

    if(pass_device1!=pass_device2)
    {
        if($('#uuid').val()!=0)
        {
            navigator.notification.alert('Clave Incorrecta, vuelva a ingresar.', ()=>{}, ['Clave Incorrecta'], ['Cerrar'])
            $('#password_').val('').focus();
            return false;
        }else{
            alert('Clave Incorrecta');
            $('#password_').val('').focus();
            return false;
        }
    }
    
    var id = $('#id_log').val();

    var datos = {};

    datos.id = id;
    datos.estado = estado;
    datos.id_user_recept = _SESSION('id_usuario');

    cargando(1); 

    var api = new Api("log_user_devices", "estado");
    api.request(
        datos,
        function (resp) {
            
            if (resp.estado == 1 && estado == 1) {
                $('#password_').val('');
                vista('autorizado');
            } else if (resp.estado == 1 && estado == 2) {
                $('#password_').val('');
                vista('rechazado');
            } else if (resp.estado == 2) {
                $('#password_').val('');
                msg('Autorización', resp.msg || 'Esta solicitud ya fue procesada.', 'warning');
                vista('autorizaciones_sdi', 'fade');
                cargando(0);
                return;
            } else {
                msg('Autorización', resp.msg || 'No fue posible registrar la respuesta.', 'error');
                cargando(0);
                return;
            }

            setTimeout(function () {
                vista('autorizaciones_sdi', 'fade');
            }, 700);
            cargando(0);

        },
        function (resp) { 
            cargando(0); 
            msg('Check Device', 'Error de verificación', 'error');
        },
        "POST");

  
}
