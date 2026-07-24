
const ingresarLogin = () => {

    var user = $.trim($('#user').val());
    var pass = $.trim($('#pass').val());

    if(user=='')
    {
        msg('Login','Debe ingresar el usuario','warning');
        $('#user').focus().select();
        return false;
    }

    if(pass=='')
    {
        msg('Login','Debe ingresar el password','warning');
        $('#pass').focus().select();
        return false;
    }

    var datos = {};

    datos.user = user;
    datos.pass = pass;

    cargando(1); 

    const enviarSolicitudLogin = () => {
        var api = new Api("user", "login");
        api.request(
        datos,
        function (resp) {
            console.log(resp);
            if (resp.estado == 1) {
                //console.log(resp);
                console.log("LOGIN EXITOSO");
                console.log("Token recibido:", resp.token); // ¡NUEVO!

                // Guardar el token para usarlo en futuras peticiones
                localStorage.setItem('authToken', resp.token);
                if (resp.device_uuid) {
                    localStorage.setItem('uuid', resp.device_uuid);
                    $('#uuid').val(resp.device_uuid);
                }
                inicializarNotificacionesPush();
                sesionUsuarioInit(resp.user,pass);
                prepararSeleccionRoles(resp);
            } else {
                msg('Login', resp.msj || 'No se encontró el usuario o password incorrecto, vuelva a intentarlo.', 'error');
            }
            cargando(0); 

        },
        function (resp) { 
            cargando(0); 
            msg('Login', 'Error de conexión', 'error');
        },
            "POST");
    };

    // El token FCM identifica al teléfono previamente vinculado.
    if (typeof FirebasexMessaging !== 'undefined') {
        FirebasexMessaging.getToken(function (deviceToken) {
            datos.device_token = deviceToken;
            datos.device_uuid = localStorage.getItem('uuid') || $('#uuid').val() || null;
            enviarSolicitudLogin();
        }, function () {
            enviarSolicitudLogin();
        });
    } else {
        enviarSolicitudLogin();
    }
}

const prepararSeleccionRoles = (respuesta) => {
    const roles = (respuesta.roles || []).map(function (rol) {
        return rol.name;
    }).filter(function (nombre) {
        return nombre === 'Paciente' || nombre === 'Profesional';
    });

    localStorage.setItem('rolesDisponibles', JSON.stringify(roles));
    localStorage.setItem('perfilPaciente', JSON.stringify(respuesta.paciente || null));
    localStorage.setItem('perfilProfesional', JSON.stringify(respuesta.profesional || null));

    if (!roles.length) {
        localStorage.removeItem('authToken');
        msg('Acceso', 'Esta cuenta no posee un perfil Paciente o Profesional habilitado.', 'warning');
        return;
    }

    if (roles.length === 1) {
        $('.selector-multiple-roles').hide();
        seleccionarRolApp(roles[0]);
        return;
    }

    $('.selector-multiple-roles').show();
    renderizarSelectorRoles(roles);
    vista('seleccionar-rol', 'fade');
};

const renderizarSelectorRoles = (roles) => {
    const html = roles.map(function (rol) {
        const icono = rol === 'Profesional' ? '🩺' : '👤';
        return '<button type="button" class="selector-rol-card" onclick="seleccionarRolApp(\'' + rol + '\')">' +
            '<span class="selector-rol-icono">' + icono + '</span>' +
            '<span class="selector-rol-titulo">Ingresar como ' + rol + '</span>' +
            '</button>';
    }).join('');

    $('#roles-disponibles').html(html);
};

const seleccionarRolApp = (rol) => {
    let roles = [];
    try {
        roles = JSON.parse(localStorage.getItem('rolesDisponibles') || '[]');
    } catch (error) {
        roles = [];
    }

    if (roles.indexOf(rol) === -1) {
        msg('Acceso', 'El perfil seleccionado no está disponible para esta cuenta.', 'error');
        return;
    }

    localStorage.setItem('rolActivo', rol);
    aplicarPerfilActivo(rol);
    vista(rol === 'Profesional' ? 'inicio-profesional' : 'index', 'fade');

    if (localStorage.getItem('desafioAccesoPendiente') === '1') {
        localStorage.removeItem('desafioAccesoPendiente');
        setTimeout(function () {
            abrirDesafiosAcceso();
        }, 300);
    } else if (localStorage.getItem('autorizacionPendiente') === '1') {
        localStorage.removeItem('autorizacionPendiente');
        setTimeout(function () {
            vista('autorizaciones_sdi', 'fade');
        }, 300);
    }
};

const volverASeleccionRoles = () => {
    let roles = [];
    try {
        roles = JSON.parse(localStorage.getItem('rolesDisponibles') || '[]');
    } catch (error) {
        roles = [];
    }

    if (roles.length < 2) {
        return;
    }

    renderizarSelectorRoles(roles);
    vista('seleccionar-rol', 'fade');
};

const aplicarPerfilActivo = (rol) => {
    let perfil = null;
    try {
        perfil = JSON.parse(localStorage.getItem(
            rol === 'Profesional' ? 'perfilProfesional' : 'perfilPaciente'
        ) || 'null');
    } catch (error) {
        perfil = null;
    }

    if (perfil) {
        const nombre = rol === 'Profesional'
            ? [perfil.nombre, perfil.apellido_uno].filter(Boolean).join(' ')
            : [perfil.nombres, perfil.apellido_uno].filter(Boolean).join(' ');

        if (nombre) localStorage.setItem('nombre', nombre);
        if (perfil.foto_perfil) localStorage.setItem('foto_perfil', perfil.foto_perfil);
        if (perfil.sexo) localStorage.setItem('sexo', perfil.sexo);
    }

    actualizarHeaderUsuario();
    $('.rol-activo-label').text(rol);

    // Los desafíos 2FA pertenecen al usuario, tanto Paciente como Profesional.
    $('.acceso-solo-profesional').show();
    $('#contenedor-citas').removeClass('col-xs-12').addClass('col-xs-6');
};


const recuperarContrasena = () =>{

    var texto1 = 'Para recuperar tu contraseña debes ingresar tu correo';    
    $('#texto-recuperar').html(`<span class="size12 fade-in">${texto1}</span>`);

    var html = `
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="col-xs-12 mt15">
            <!--<p class="size16 color-gris opacity0-5">Ingrese su Rut</p>-->
            <input type="text" class="input-app size16 color-gris col-xs-12 icon-3" placeholder="RUT(Ej:123456789)" id="rut">
        </div>
        <div class="col-xs-12 mt15">
        <!--<p class="size16 color-gris opacity0-5">Ingrese su correo</p>-->
        <input type="text" class="input-app size16 color-gris col-xs-12 icon-1" placeholder="Correo" id="correo">
    </div>
    </div>
    `;

    $('#cont_i_form').html(html);


    var html2 = `
    <div class="col-xs-6 padding0">
        <div class="btn-app-2 color-blanco size12 pt15 pb15 lineh3 center-block" onclick="volverLogin()">VOLVER</div>
    </div>
    <div class="col-xs-6 padding0">
        <div class="btn-app-1 color-blanco pt15 pb15 size12 lineh3 text-uppercase" onclick="recuperarPassword()">Recuperar</div>
    </div>
    `;

    $('#cont_btn_form').html(html2);


    var block_hide =  ['cont_i_login','cont_o_contrasena'];
    var block_show = ['cont_i_form','cont_btn_form','cont_btn_registrar'];
    showHiddenBlock(block_hide,block_show);
}


const volverLogin = () => {

    var texto1 = '¡BIENVENIDO!';
    var texto2 = 'A SDI APP DESARROLLO';
    $('#texto-recuperar').html(`<span class="size20 fade-in">${texto1}</span><br><span class="size14 fade-in">${texto2}</span>`);

    var block_hide = ['cont_i_form','cont_btn_form'];
    var block_show =  ['cont_i_login','cont_o_contrasena','cont_btn_registrar'];
    showHiddenBlock(block_hide,block_show);
}

const registrarUsuario = () =>{
    var texto1 = 'Debe llenar todos los datos para registrar el usuario';    
    $('#texto-recuperar').html(`<span class="size12 fade-in">${texto1}</span>`);


    var html = `
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="col-xs-12 mt15">
            <p class="size16 color-blanco opacity0-5">Rut</p>
            <input type="text" class="input-app size20 color-blanco col-xs-12" id="rut_r">
        </div>
        <div class="col-xs-12 mt15">
            <p class="size16 color-blanco opacity0-5">Ingrese su correo</p>
            <input type="text" class="input-app size20 color-blanco col-xs-12" id="correo_r">
        </div>
        <div class="col-xs-12 mt15">
            <p class="size16 color-blanco opacity0-5">User</p>
            <input type="text" class="input-app size20 color-blanco col-xs-12" id="user_r">
        </div>
        <div class="col-xs-12 mt15">
            <p class="size16 color-blanco opacity0-5">Pass</p>
            <input type="password" class="input-app size20 color-blanco col-xs-12" id="pass_r">
        </div>
    </div>
    `;

    $('#cont_i_form').html(html);


    var html2 = `
            <div class="col-xs-6 pl5 pr5">
                <div class="btn-app2 color-blanco size12 pt15 pb15 opacity0-5 center-block" onclick="volverLogin()">VOLVER</div>
            </div>
            <div class="col-xs-6">
                <div class="btn-app1 pt15 pb15 size12 text-uppercase" onclick="">Registrar</div>
            </div>
    `;

    $('#cont_btn_form').html(html2);

    var block_hide =  ['cont_i_login','cont_o_contrasena','cont_btn_registrar'];
    var block_show = ['cont_i_form','cont_btn_form'];
    showHiddenBlock(block_hide,block_show);

}


const recuperarPassword = () =>{
    var rut = $.trim($('#rut').val());
    var correo = $.trim($('#correo').val());

    if(!Rut(rut))
    {
        //msg('Login','Debe ingresar un rut valido','warning');
        $('#rut').focus().select();
        return false;
    }

    if(correo=='')
    {
        msg('Login','Debe ingresar un correo valido','warning');
        $('#correo').focus().select();
        return false;
    }

    var datos = {};

    datos.rut = rut;
    datos.email = correo;

    cargando(1); 

    var api = new Api("usuario", "recuperar_contrasena");
    api.request(
        datos,
        function (resp) {
            
            if (resp.estado == 1) {

                msg('aviso','Se enviara a su correo con su nueva contraseña temporal','success');
                volverLogin();
                
            } else {                
                msg('Login', 'No se encontro el usuario, vuelva a intentarlo.', 'error');
            }
            cargando(0); 

        },
        function (resp) { 
            cargando(0); 
            console.log(resp);        
            msg('Login', 'Error de conexión', 'error');
        },
        "POST");
}
