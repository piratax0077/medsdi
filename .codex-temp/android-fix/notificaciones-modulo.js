var notificacionesPushInicializadas = false;

const registrarTokenPush = (token) => {
    const authToken = localStorage.getItem('authToken');
    if (!authToken || !token) return;

    $.ajax({
        url: MEDSDI_API_URL + '/mobile/devices',
        method: 'POST',
        data: JSON.stringify({
            token: token,
            platform: 'android',
            device_uuid: localStorage.getItem('uuid') || null
        }),
        contentType: 'application/json',
        dataType: 'json',
        headers: {
            'Accept': 'application/json',
            'X-Auth-Token': authToken
        },
        success: function () {
            localStorage.setItem('fcmToken', token);
            console.log('Token FCM registrado en MED-SDI.');
        },
        error: function (xhr) {
            console.error('No se pudo registrar el token FCM.', xhr.status);
        }
    });
};

const manejarNotificacionPush = (mensaje) => {
    if (!mensaje || (mensaje.type !== 'login_approval' && mensaje.type !== 'authorization_request')) return;

    const esAutorizacion = mensaje.type === 'authorization_request';
    const usuarioDestino = String(mensaje.target_user_id || '');
    const usuarioActivo = String(_SESSION('id_usuario') || '');

    if (mensaje.tap === 'background' || mensaje.tap === 'foreground') {
        if (usuarioDestino && usuarioActivo && usuarioDestino !== usuarioActivo) {
            localStorage.setItem(esAutorizacion ? 'autorizacionPendiente' : 'desafioAccesoPendiente', '1');
            msg(
                'Seguridad',
                'Esta solicitud pertenece a otra cuenta registrada en este teléfono. Cierra sesión e ingresa con esa cuenta para aprobarla.',
                'info'
            );
            return;
        }

        if (!localStorage.getItem('authToken')) {
            localStorage.setItem(esAutorizacion ? 'autorizacionPendiente' : 'desafioAccesoPendiente', '1');
            $('#user, #pass').val('');
            vista('login', 'fade');
            msg('Seguridad', 'Inicia sesión para revisar y aprobar este acceso.', 'info');
            return;
        }

        if (esAutorizacion) {
            if ($.mobile && $.mobile.activePage && $.mobile.activePage.attr('id') === 'autorizaciones_sdi') {
                list_log_device();
            } else {
                vista('autorizaciones_sdi', 'fade');
            }
        } else {
            abrirDesafiosAcceso();
        }
        return;
    }

    // En primer plano el plugin también muestra una notificación del sistema.
    // Actualizamos la lista si el usuario ya está mirando los desafíos.
    if (esAutorizacion && $.mobile && $.mobile.activePage && $.mobile.activePage.attr('id') === 'autorizaciones_sdi') {
        list_log_device();
    } else if (!esAutorizacion && $.mobile && $.mobile.activePage && $.mobile.activePage.attr('id') === 'desafios-acceso') {
        cargarDesafiosAcceso();
    }
};

const inicializarNotificacionesPush = () => {
    if (typeof FirebasexMessaging === 'undefined') {
        console.log('Firebase Messaging no está disponible en esta plataforma.');
        return;
    }

    FirebasexMessaging.grantPermission(function (concedido) {
        if (!concedido) {
            console.warn('El usuario no concedió permiso para mostrar notificaciones.');
            return;
        }

        const channel = {
            id: 'medsdi_security',
            name: 'Seguridad MED-SDI',
            description: 'Solicitudes de acceso y alertas de seguridad',
            sound: 'default',
            vibration: true,
            importance: 'high',
            visibility: 1,
            badge: true
        };

        FirebasexMessaging.createChannel(channel, function () {
            FirebasexMessaging.setDefaultChannel(channel, function () {
                console.log('Canal de seguridad MED-SDI configurado.');
            }, function (error) {
                console.error('No se pudo establecer el canal predeterminado.', error);
            });
        }, function (error) {
            console.error('No se pudo crear el canal MED-SDI.', error);
        });

        FirebasexMessaging.getToken(registrarTokenPush, function (error) {
            console.error('No se pudo obtener el token FCM.', error);
        });
    }, function (error) {
        console.warn('El permiso de notificaciones no fue concedido.', error);
    });

    if (!notificacionesPushInicializadas) {
        FirebasexMessaging.onTokenRefresh(registrarTokenPush, function (error) {
            console.error('Error al renovar el token FCM.', error);
        });
        FirebasexMessaging.onMessageReceived(manejarNotificacionPush, function (error) {
            console.error('Error al recibir una notificación FCM.', error);
        });
        notificacionesPushInicializadas = true;
    }
};
