var svg_receta = '<svg style="width: 40px;" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"> <g> <g> <g> <path d="m208,177.2h27.7v26.2c0,11.3 9.1,20.4 20.4,20.4 11.3,0 20.4-9.1 20.4-20.4v-26.2h27.7c11.3,0 20.4-9.1 20.4-20.4 0-11.3-9.1-20.4-20.4-20.4h-27.7v-26.2c0-11.3-9.1-20.4-20.4-20.4-11.3,0-20.4,9.1-20.4,20.4v26.2h-27.7c-11.3,0-20.4,9.1-20.4,20.4 0,11.3 9.2,20.4 20.4,20.4z"/> <path d="M440.5,10.8H71.8c-11.3,0-20.4,9.1-20.4,20.4v449.2c0,11.3,9.1,20.4,20.4,20.4h368.7c11.3,0,20.4-9.1,20.4-20.4V31.2 C460.9,20,451.8,10.8,440.5,10.8z M420.1,460H92.2V51.7h327.9V460z"/> <path d="m157.3,318h197.6c11.3,0 20.4-9.1 20.4-20.4 0-11.3-9.1-20.4-20.4-20.4h-197.6c-11.3,0-20.4,9.1-20.4,20.4 0,11.2 9.1,20.4 20.4,20.4z"/> <path d="m157.3,409.6h197.6c11.3,0 20.4-9.1 20.4-20.4 0-11.3-9.1-20.4-20.4-20.4h-197.6c-11.3,0-20.4,9.1-20.4,20.4 0,11.2 9.1,20.4 20.4,20.4z"/> </g> </g> </g></svg>';

$(document).on( "pageshow","#home",function( event ) {
    if($('#uuid').val()!=0)
    checkDevice();
    else
    list_document_user();
});

$(document).on( "pageshow","#autorizaciones_sdi",function( event ) {
    configurarFooterAutorizaciones();
    list_log_device();

    checkDevice(function () {}, true);
});

const volverInicioSegunRol = () => {
    const rolActivo = localStorage.getItem('rolActivo');
    vista(rolActivo === 'Profesional' ? 'inicio-profesional' : 'index', 'fade');
};

const configurarFooterAutorizaciones = () => {
    const esProfesional = localStorage.getItem('rolActivo') === 'Profesional';
    const $pagina = $('#autorizaciones_sdi');

    $pagina.find('.autorizaciones-footer-citas').toggle(!esProfesional);
    $pagina.find('.autorizaciones-footer-principal')
        .toggleClass('col-xs-6', esProfesional)
        .toggleClass('col-xs-4', !esProfesional);
};

// O si usas el evento show de jQuery Mobile
$(document).on('pageshow', '#med_no_insc', function() {
    aplicarFormatoRut();
    limpiarFormularioAtencion();
});

//$(document).on('pageshow', '#buscador_profesional', function() {
  //  limpiarFormularioBusquedaMedico();
//});

const checkDevice = (onReady, silencioso) => {

    var datos = {};

    datos.id_user = _SESSION('id_usuario');
    datos.uuid = typeof obtenerUuidDispositivo === 'function'
        ? obtenerUuidDispositivo()
        : (localStorage.getItem('uuid') || $('#uuid').val());

    if (!datos.uuid || datos.uuid === '0') {
        if (typeof onReady === 'function') {
            onReady(false);
        }
        if (!silencioso) {
            msg('Check Device', 'No fue posible identificar este dispositivo.', 'error');
        }
        return;
    }

    if (!silencioso) {
        cargando(1);
    }

    var api = new Api("user_devices", "ver_registros");
    api.request(
        datos,
        function (resp) {
            LOG('check device:'+resp.estado);
            if (resp.estado == 0) {
                if (typeof onReady === 'function') {
                    onReady(false);
                } else {
                    registrarPasswordShow();
                }
            } else {      
                if(resp.registros[0].estado == 0)
                {
                    if (typeof onReady === 'function') {
                        onReady(false);
                    } else {
                        vista('login','fade');
                        $('#modalRegistroDevice').modal('show');
                    }
                }else{
                    //PASS DEVICE
                    setSession('password', resp.password); 
                    $('#pass_device').val(resp.password);

                    if (typeof onReady === 'function') {
                        if (!silencioso) {
                            cargando(0);
                        }
                        onReady(true);
                        return;
                    }

                    var paginaActiva = $.mobile && $.mobile.activePage
                        ? $.mobile.activePage.attr('id')
                        : null;

                    if (paginaActiva === 'autorizaciones_sdi') {
                        list_log_device();
                    } else if (paginaActiva === 'autorizacion') {
                        // La clave ya quedó cargada en esta pantalla.
                    } else {
                        list_document_user();
                    }
                }
            }
            if (!silencioso) {
                cargando(0);
            }

        },
        function (resp) {
            if (!silencioso) {
                cargando(0);
            }
            msg('Check Device', 'Error de verificación', 'error');
        },
        "GET");
}


const registrarPasswordShow = () => {
    vista('clave_desbloqueo','fade');
}

/*
const registrarPasswordShow = () => {
    navigator.notification.prompt(
        'Debe Ingresar un clave, para registrar el equipo',  // message
        registrarPassword,                  // callback to invoke
        'Clave',            // title
        ['Ingresar','Cerrar'],             // buttonLabels
        ''                 // defaultText
    );
    
}
*/


const registrarPassword = () => {

    var pass = $.trim($('#password_desbloqueo').val());

    if(pass.length>3)
    {
        $('#pass_device').val(pass);
        registerDeviceShow();   
    }else{                
        if($('#uuid').val()!=0){
        navigator.notification.alert('Debe ingresar un password mayor a 3 digitos', ()=>{}, 'Aviso', 'Cerrar');        
        }else{
        alert('Debe ingresar un password mayor a 3 digitos');
        }
    }

}

/*
const registrarPassword = (results) => {

    switch(results.buttonIndex)
    {
        case 1:
            var pass = $.trim(results.input1);
            if(pass.length>3)
            {
                $('#pass_device').val(pass);
                registerDeviceShow();   
            }else{                
                navigator.notification.alert('Debe ingresar un password mayor a 3 digitos', registrarPasswordShow, 'Aviso', 'Cerrar');
            }
        break;
        case 2:
                navigator.notification.alert('Debe ingresar un password mayor a 3 digitos', registrarPasswordShow, 'Aviso', 'Cerrar');
        break;       
    }

}
*/

const registerDeviceShow = () => {
    navigator.notification.confirm(
        'Quiere registrar el dispositivo', // message
         optionDevice,            // callback to invoke with index of button pressed
        'Registrar Dispositivo',           // title
        ['Registrar','Cancelar']     // buttonLabels
    );
}


function optionDevice(btnIndex) {
    //alert('You selected button ' + btnIndex);

    switch(btnIndex)
    {
        case 1:
            registerDevice();
        break;
        case 2:
            vista('login','fade');
        break;
    }
}

const registerDevice = () => {

    var dateObj = new Date();
    var month = dateObj.getUTCMonth() + 1; //months from 1-12
    var day = dateObj.getUTCDate();
    var year = dateObj.getUTCFullYear();

    if(month<10)
    month = '0'+month;

    if(day<10)
    day = '0'+day;

    newdate = year + "/" + month + "/" + day;

    var datos = {};

    datos.id_user = _SESSION('id_usuario');
    datos.alias = $('#model_device').val();
    datos.uuid = $('#uuid').val();
    datos.password = $('#pass_device').val();
    datos.estado = 0;
    datos.fecha_ingreso = `${year}-${month}-${day} 00:00:00`;
    datos.fecha_termino = `${year+1}-${month}-${day} 00:00:00`;

    cargando(1); 

    var api = new Api("user_devices", "registrar");
    api.request(
        datos,
        function (resp) {
            
            if (resp.estado == 1) {
                navigator.notification.alert(
                    'Dispositivo Registrado',  // message
                    ()=>{ 
                        if (resp.requiere_activacion) {
                            enviarCorreoValidarEquipo();
                        }
                        vista('login','fade');
                        $('#modalRegistroDevice').modal('show'); 
                    },         // callback
                    'Estado Dispositivo',            // title
                    'Cerrar'                  // buttonName
                );
                
            } else {                
                navigator.notification.confirm(
                    'Problemas al Registrar, Quiere volver a registrar el dispositivo', // message
                     optionDevice,            // callback to invoke with index of button pressed
                    'Registrar Dispositivo',           // title
                    ['Registrar','Cancelar']     // buttonLabels
                );
                
            }
            cargando(0); 

        },
        function (resp) { 
            cargando(0); 
            msg('Check Device', 'Error en el registro', 'error');

            navigator.notification.confirm(
                'Problemas al Registrar, Quiere volver a registrar el dispositivo', // message
                 optionDevice,            // callback to invoke with index of button pressed
                'Registrar Dispositivo',           // title
                ['Registrar','Cancelar']     // buttonLabels
            );
        },
        "POST");
}

const list_document_user = ()=>{

    var estructura_html = '';
    $('#list_recetas').html('');
    $('#log_reg_autorizacion').html('');

    var datos = {};

    datos.id_paciente = _SESSION('id_usuario');

    cargando(1); 

    var api = new Api("documento", "ver_registro_recetas");
    api.request(
        datos,
        function (resp) {
            LOG('Recetas estado:'+resp.estado);
            LOG('Cantidad Recetas:'+resp.registros.length);
            if (resp.estado == 1) {

                var html_= `
                            `;
                /*
                <table class="table table-hover table-border">
                            <tr>
                            <td>ID<td>
                            <td>Diagnostico<td>
                            <td>Posologia</td>
                            <td>Fecha</td>
                            <td>Receta</td>
                            <tr>
                */

                resp.registros.forEach(reg => {    
                   
                    /*
                      <tr>
                    <td>${reg.id}<td>
                    <td>${reg.hipotesis_diagnostico}<td>
                    <td>${reg.posologia}</td>
                    <td>${fechaEsp(reg.created_at)}</td>
                    <td><a onclick="openReceta('${api.url}/documento/ver_receta_pdf/${reg.id}')">${svg_receta}</a></td>
                    <tr>
                    */

                    var posologia = reg.posologia==null?'sin registro':reg.posologia;
                    var hipotesis_diagnostico = reg.hipotesis_diagnostico==null?'sin registro':reg.hipotesis_diagnostico;
                    

                    html_+=`                  
                    <div class="box-documento">
                            <p class="color-azul-oscuro size16">Receta</p>
                            <p><b>RID:</b> ${reg.id}</p>
                            <p><b>Diagnóstico:</b> ${hipotesis_diagnostico}</p>
                            <p><b>Posologia:</b> ${posologia}</p>
                            <p><b>Fecha:</b> ${fechaEsp(reg.created_at)}</p>
                            <div class="btn-app5" onclick="openReceta('${api.url}/documento/ver_receta_pdf/${reg.id_ficha}')">VER DOCUMENTO</div>
                        </div>   
                    `;

                    //<td><a target="" href="${api.url}/documento/ver_receta_pdf/${reg.id}">${svg_receta}</a></td>
                    //openReceta
                  
                });

                if(resp.registros.length==0)
                {
                    html_+=`
                    <div class="box-documento">
                        <p class="size20 color-azul">Sin registro de documentos<td>
                    </div>
                    `; 
                }
                 html_+=`</table>`;
                 $('#list_recetas').html(html_);    
            }
            cargando(0); 

        },
        function (resp) { 
            cargando(0); 
            msg('Lista log eventos', 'Error de lista de eventos', 'error');
        },
        "GET");

}

const solicitarFmu = () => {
    var datos = {};
    datos.id_paciente = _SESSION('id_usuario');
    datos.token = "mobile-original-" + Date.now()
    cargando(1);

    var api = new Api("paciente", "mi_ficha_medica");
    api.request(
        datos,
        function (resp) {
            LOG('fmu_user estado:'+resp.estado);
            console.log(resp);

            if (resp.estado == 1) {
                const fmu = resp;
                actualizarTarjetasFMU(fmu);
            } else {
                mostrarSinDatos();
            }
            cargando(0);
        },
        function (resp) {
            console.log(resp);
            cargando(0);
            msg('Formulario FMU', 'Error al cargar datos de FMU', 'error');
            mostrarSinDatos();
        },
        "GET");
}

const solicitarMedicos = () => {
    var datos = {};
    datos.id_paciente = _SESSION('id_usuario');
    cargando(1);

    var api = new Api("paciente", "mis_profesionales");
    api.request(
        datos,
        function (resp) {
            LOG('medicos estado:'+resp.estado);
            console.log(resp);

            if (resp.estado == 1 && resp.medicos && resp.medicos.length > 0) {
                let htmlMedicos = '';
                resp.medicos.forEach(medico => {
                    let imagenMedico;
                    if(medico.foto_perfil && medico.foto_perfil !== '') {
                        imagenMedico = 'https://med-sdi.cl/storage/'+medico.foto_perfil;
                    } else {
                        imagenMedico = medico.sexo === "M" ? 'src/images/ejemplo_dr.jpg' : 'src/images/ejemplo_dra.jpg';
                    }

                    const nombreCompleto = [
                        medico.nombre,
                        medico.apellido_uno,
                        medico.apellido_dos
                    ].filter(Boolean).join(' ').trim() || 'Profesional';
                    const especialidadCompleta = [
                        medico.especialidad || medico.nombre_especialidad,
                        medico.tipo_especialidad || medico.nombre_tipo_especialidad,
                        medico.sub_tipo_especialidad || medico.nombre_sub_tipo_especialidad
                    ].filter(Boolean).filter(function (valor, indice, lista) {
                        return lista.indexOf(valor) === indice;
                    }).join(' - ') || 'Especialidad no informada';
                    const lugarAtencion = medico.nombre_lugar_atencion
                        || medico.lugar_atencion
                        || medico.direccion
                        || 'Lugar de atención por confirmar';

                    // Escapar comillas para evitar errores de sintaxis
                    const nombreEscapado = nombreCompleto.replace(/'/g, "&apos;");
                    const especialidadEscapada = especialidadCompleta.replace(/'/g, "&apos;");

                    htmlMedicos += `
                        <div class="card-button-dos mb20">
                            <div class="row">
                                <div class="col-xs-3 text-center">
                                    <a href="javascript:void(0)" onclick="damePerfilMedico(${medico.id})"> <img class="img-circulo" width="70" src="${imagenMedico}" alt="Foto perfil"> </a>
                                </div>
                                <div class="col-xs-9">
                                    <p class="size16 color-azul mb5">${nombreEscapado}</p>
                                    <p class="letra-small mb5">${especialidadEscapada}</p>
                                    <p class="letra-small mb5"><img class="mr10" width="15" src="src/images/ubicacion.svg">${lugarAtencion}</p>
                                    <div class="btn-app7" style="width: 100%;" onclick="agendarHora(${medico.id}, '${nombreEscapado}', '${especialidadEscapada}')">
                                        Agendar Hora
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    });

                $('#lista-medicos').html(htmlMedicos);
            } else {
                $('#lista-medicos').html(`
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12 text-center pt20 pb20">
                                <p class="size18 color-azul">No hay profesionales asignados</p>
                                <p class="size14">Contacte a su centro médico para asignar profesionales</p>
                            </div>
                        </div>
                    </div>
                `);
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando médicos:', resp);
            cargando(0);
            msg('Médicos', 'Error al cargar datos de médicos', 'error');

            $('#lista-medicos').html(`
                <div class="card-button-dos mb20">
                    <div class="row">
                        <div class="col-xs-12 text-center pt20 pb20">
                            <p class="size18 color-rojo">Error al cargar profesionales</p>
                            <div class="btn-app4 mt10" onclick="solicitarMedicos()">Reintentar</div>
                        </div>
                    </div>
                </div>
            `);
        },
        "GET");
}

const damePerfilMedico = (idMedico) => {
    console.log('Ver perfil médico ID:', idMedico);

    var datos = {
        id_profesional: idMedico
    };

    cargando(1);

    var api = new Api("profesionales", "perfil_profesional");
    api.request(
        datos,
        function (resp) {
            LOG('perfil medico estado:' + resp.estado);
            console.log(resp);

            if (resp.estado == 1 && resp.profesional) {
                const prof = resp.profesional;

                // Determinar imagen del médico
                let imagenMedico;
                if(prof.foto_perfil && prof.foto_perfil !== '') {
                    imagenMedico = 'https://med-sdi.cl/storage/' + prof.foto_perfil;
                } else {
                    imagenMedico = prof.sexo === "M" ? 'src/images/ejemplo_dr.jpg' : 'src/images/ejemplo_dra.jpg';
                }

                // Generar HTML de lugares de atención
                if(prof.lugares_atencion && prof.lugares_atencion.length > 0) {
                    let lugares = '';
                    prof.lugares_atencion.forEach(lugar => {
                        lugares += `<li>${lugar.nombre} - ${lugar.direccion}</li>`;
                    });
                    prof.lugares_atencion_html = `<ul>${lugares}</ul>`;
                } else {
                    prof.lugares_atencion_html = '<p>No hay lugares de atención asignados</p>';
                }

                // Escapar datos antes de usarlos en HTML
                const nombreCompleto = `${prof.nombre} ${prof.apellido_uno} ${prof.apellido_dos || ''}`.trim();
                const especialidadCompleta = `${prof.especialidad?.nombre || 'No especificada'} - ${prof.tipo_especialidad?.nombre || 'No especificado'}`;

                // Escapar comillas para prevenir XSS
                const nombreEscapado = nombreCompleto.replace(/'/g, "&apos;");
                const especialidadEscapada = especialidadCompleta.replace(/'/g, "&apos;");

                $('#perfil-medico-content').html(`
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12 text-center mb20">
                                <img class="img-circulo" width="100" src="${imagenMedico}" alt="Foto perfil">
                                <h3 class="color-azul mt10">${prof.nombre} ${prof.apellido_uno} ${prof.apellido_dos || ''}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="size16 color-azul mb10"><strong>Información Profesional</strong></p>
                                <p class="size14 mb5"><strong>Especialidad:</strong> ${prof.especialidad?.nombre || 'No especificada'}</p>
                                <p class="size14 mb5"><strong>Tipo:</strong> ${prof.tipo_especialidad?.nombre || 'No especificado'}</p>
                                <p class="size14 mb5"><strong>Sub-especialidad:</strong> ${prof.sub_tipo_especialidad?.nombre || 'No especificado'}</p>
                                ${prof.experiencia ? `<p class="size14 mb5"><strong>Experiencia:</strong> ${prof.experiencia}</p>` : ''}
                                ${prof.titulo ? `<p class="size14 mb5"><strong>Título:</strong> ${prof.titulo}</p>` : ''}
                                <p class="size14 mb5"><strong>Lugares de Atención:</strong></p>
                                <div class="size14 mb5">${prof.lugares_atencion_html}</div>
                            </div>
                        </div>
                    </div>
                    ${prof.biografia ? `
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="size16 color-azul mb10"><strong>Biografía</strong></p>
                                <p class="size14">${prof.biografia}</p>
                            </div>
                        </div>
                    </div>` : ''}
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="btn-app7" style="width: 100%;" onclick="agendarHora(${prof.id},'${nombreEscapado}','${especialidadEscapada}')">
                                    <img src="src/images/calendarioblanco.svg" class="ml20 mr10 wid10" alt="Agendar"> Agendar hora
                                </div>
                            </div>
                        </div>
                    </div>
                `);

                vista('perfil_medico', 'fade');
            } else {
                msg('Perfil Médico', 'No se pudo cargar la información del profesional', 'error');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando perfil médico:', resp);
            cargando(0);
            msg('Error', 'Error al cargar perfil del profesional', 'error');
        },
        "GET"
    );
}

const agendarHora = (idMedico, nombreMedico, especialidad) => {
    console.log('Agendar hora con médico ID:', idMedico);

    var datos = {
        id_profesional: idMedico
    };

    cargando(1);

    var api = new Api("profesionales", "mis_lugares_atencion");
    api.request(
        datos,
        function (resp) {
            LOG('lugares atencion estado:' + resp.estado);
            console.log(resp);

            if (resp.estado == 1 && resp.registros && resp.registros.length > 0) {
                // Guardar información del médico en sesión
                setSession('id_medico_seleccionado', idMedico);
                setSession('nombre_medico_seleccionado', nombreMedico);
                setSession('especialidad_medico_seleccionado', especialidad);

                // Actualizar el header con la información del médico y botón de retorno
                $('#lugares_atencion .top-titulos').html(`
                    <p class="letra-bold color-azul-oscuro size20 text-center mt50">Lugares de atención</p>
                    <div class="bg-azul-claro p10 mb20 border-radius-5">
                        <p class="size16 color-azul text-center mb5"><strong>${nombreMedico}</strong></p>
                        <p class="size14 text-center mb0">${especialidad}</p>
                    </div>
                    <div class="btn-app4 text-center size14 mb20" onclick="vista('mis_medicos_buscados');">
                         Volver a profesionales
                    </div>
                    <p class="size14 text-center mb10">Seleccione el lugar de atención</p>
                `);

                // Generar HTML de lugares de atención
                let htmlLugaresAtencion = '';
                resp.registros.forEach(lugar => {
                    htmlLugaresAtencion += `
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12 text-left mb20">
                                <div class="media">
                                    <img src="src/images/clinica.png" class="img-circulo text-center mr10" width="80" alt="Centro médico">
                                    <div class="media-body text-center">
                                        <p class="size14 color-azul">${lugar.nombre}</p>
                                        <p class="size13"><img class="mr10" width="20" src="src/images/ubicacion.svg">  ${lugar.direccion} - ${lugar.ciudad}</p>

                                        <div class="btn-app7" style="width: 100%" onclick="seleccionarLugarAtencion(${lugar.id},${idMedico},'${lugar.nombre}')">
                                            <img src="src/images/calendarioblanco.svg" class="ml20 mr10 wid10" alt="Agendar">  Seleccionar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });

                $('#lista-lugares').html(htmlLugaresAtencion);
                vista('lugares_atencion', 'fade');

            } else {
                msg('Agendar Hora', 'El profesional no tiene lugares de atención asignados.', 'warning');
            }

            cargando(0);
        },
        function (resp) {
            console.error('Error cargando lugares de atención:', resp);
            cargando(0);
            msg('Error', 'Error al cargar lugares de atención del profesional', 'error');
        },
        "GET"
    );
}

const actualizarTarjetasFMU = (fmu) => {
    let antecedentes = fmu.antecedentes;
    let alergias = [];
    let enfermedades = [];
    let medicamentos = [];
    let cirugias = [];
    antecedentes.forEach(antecedente => {
        if(antecedente.id_tipo_antecedente === 6) { // Alergia
            alergias.push(antecedente);
        } else if (antecedente.id_tipo_antecedente === 1 || antecedente.id_tipo_antecedente == 2) { // Enfermedad Crónica
            enfermedades.push(antecedente);
        }else if (antecedente.id_tipo_antecedente === 3) { // Cirugía
            cirugias.push(antecedente);
        } else if (antecedente.id_tipo_antecedente === 4) { // Medicamento Crónico
            medicamentos.push(antecedente);
        }
    });

    // Grupo Sanguíneo
    if (fmu.grupo_sanguineo) {
        $('.cards-grid .card-button:eq(0) h2').text(fmu.grupo_sanguineo.nombre_gs);
    }

    let ultima_alergia = alergias.sort((a, b) => new Date(b.created_at) - new Date(a.created_at))[0];
    fmu.ultima_alergia = ultima_alergia || null;
    // Alergias
    if(fmu.ultima_alergia) {
        const fecha = fechaEsp(fmu.ultima_alergia.created_at);
        $('.cards-grid .card-button:eq(1) .card-list').html(
            `<li>${fmu.ultima_alergia.antecedente_data.nombre}<br><span class="fecha-small">${fecha}</span></li>`
        );
    } else {
        $('.cards-grid .card-button:eq(1) .card-list').html('<li>No existen registros</li>');
    }

    if(enfermedades.length > 0) {
        let htmlEnfermedades = '';
        enfermedades.forEach(enfermedad => {
            htmlEnfermedades += `<li>${enfermedad.antecedente_data.nombre}</li>`;
        });
        $('.cards-grid .card-button:eq(2) .card-list').html(htmlEnfermedades);
    } else {
        $('.cards-grid .card-button:eq(2) .card-list').html('<li>No hay enfermedades crónicas</li>');
    }

    // Medicamentos Crónicos
    if (fmu.medicamentos_cronicos && fmu.medicamentos_cronicos.length > 0) {
        let htmlMedicamentosCronicos = '';
        fmu.medicamentos_cronicos.forEach(medicamento => {
            htmlMedicamentosCronicos += `<li>${medicamento.nombre}</li>`;
        });
        $('.cards-grid .card-button:eq(3) .card-list').html(htmlMedicamentosCronicos);
    } else {
        $('.cards-grid .card-button:eq(3) .card-list').html('<li>No hay medicamentos crónicos</li>');
    }

    // Últimos Medicamentos
    if (fmu.ultimos_medicamentos && fmu.ultimos_medicamentos.length > 0) {
        let htmlUltimosMeds = '';
        fmu.ultimos_medicamentos.forEach(medicamento => {
            const fecha = fechaEsp(medicamento.fecha);
            htmlUltimosMeds += `<li>${medicamento.nombre}<br><span class="fecha-small">${fecha}</span></li>`;
        });
        $('.cards-grid .card-button:eq(4) .card-list').html(htmlUltimosMeds);
    } else {
        $('.cards-grid .card-button:eq(4) .card-list').html('<li>No hay medicamentos recientes</li>');
    }

    // Último Diagnóstico
    if (fmu.fichas && fmu.fichas.length > 0) {
        // Ordenar por fecha descendente y tomar el primero
        const ultimaFicha = fmu.fichas.sort((a, b) => new Date(b.created_at) - new Date(a.created_at))[0];
        const fecha = fechaEsp(ultimaFicha.created_at);
        const diagnostico = `<li>${ultimaFicha.hipotesis_diagnostico}<br><span class="fecha-small">${fecha}</span></li>`;
        $('.cards-grid .card-button:eq(5) .card-list').html(diagnostico);
    } else {
        $('.cards-grid .card-button:eq(5) .card-list').html('<li>No hay diagnósticos recientes</li>');
    }

    let ultima_cirugia = cirugias.sort((a, b) => new Date(b.created_at) - new Date(a.created_at))[0];
    fmu.ultima_cirugia = ultima_cirugia || null;

    // Última Cirugía
    if (fmu.ultima_cirugia) {
        const fecha = fechaEsp(fmu.ultima_cirugia.created_at);
        $('.cards-grid .card-button:eq(6) .card-list').html(
            `<li>${fmu.ultima_cirugia.antecedente_data.procedimiento} - ${fmu.ultima_cirugia.comentario}<br><span class="fecha-small">${fecha}</span></li><br><span class="letra-small">${fmu.ultima_cirugia.antecedente_data.profesional || ''}</span>`
        );
    } else {
        $('.cards-grid .card-button:eq(6) .card-list').html('<li>No existen registros</li>');
    }

    // Prótesis y Ortesis
    if (fmu.protesis_ortesis && fmu.protesis_ortesis.length > 0) {
        let htmlProtesis = '';
        fmu.protesis_ortesis.forEach(item => {
            htmlProtesis += `<li>${item.nombre}</li>`;
        });
        $('.cards-grid .card-button:eq(7) .card-list').html(htmlProtesis);
    } else {
        $('.cards-grid .card-button:eq(7) .card-list').html('<li>No existen registros</li>');
    }

    // Contacto de Emergencia
    if (fmu.contacto_emergencia) {
        $('.card-button:last .col-xs-4:eq(0) .fecha-small').text(fmu.contacto_emergencia.nombre || 'No registrado');
        $('.card-button:last .col-xs-4:eq(1) .fecha-small').text(fmu.contacto_emergencia.parentezco || 'No registrado');
        $('.card-button:last .col-xs-4:eq(2) .fecha-small').text(fmu.contacto_emergencia.telefono || 'No registrado');
    }
}

const mostrarSinDatos = () => {
    // Mostrar mensajes por defecto cuando no hay datos
    $('.cards-grid .card-button:eq(0) h2').text('No disponible');
    $('.cards-grid .card-button .card-list').each(function() {
        $(this).html('<li>No hay datos disponibles</li>');
    });
}

const solicitarMisHorasMedicas = () => {
    var datos = {};
    datos.id_paciente = _SESSION('id_usuario');
    cargando(1);
    var api = new Api("paciente", "mis_horas_medicas");
    api.request(
        datos,
        function (resp) {
            LOG('mis horas estado:'+resp.estado);
            console.log(resp);
            if (resp.estado == 1 && resp.horas && resp.horas.length > 0) {
                let htmlHoras = '';
                resp.horas.forEach(hora => {
                    const fecha = fechaEsp(hora.fecha_consulta);
                    const horaInicio = hora.hora_inicio || 'No especificada';
                    const horaTermino = hora.hora_termino || 'No especificada';
                    const medico = hora ? `${hora.nombre_profesional} ${hora.apellido_uno_profesional}` : 'No asignado';
                    const especialidad = hora && hora.nombre_especialidad ? hora.nombre_especialidad : 'No especificada';
                    const tipo_especialidad = hora && hora.nombre_tipo_especialidad ? hora.nombre_tipo_especialidad : 'No especificada';
                    const sub_tipo_especialidad = hora && hora.nombre_sub_tipo_especialidad ? hora.nombre_sub_tipo_especialidad : '';
                    const estadoHora = hora.id_estado === 1 ? 'Reservada' : (hora.id_estado === 2 ? 'Confirmada' : 'Rechazada');

                    // Generar botones solo si el estado es 1 (Pendiente)
                    const botonesHtml = hora.id_estado === 1 ? `
                        <div class="col-xs-6 text-center">
                            <div class="btn-app8 mt20 mb10" onclick="confirmarHoraMedicaAgendada(${hora.id})">
                                Confirmar hora
                            </div>
                        </div>
                        <div class="col-xs-6 text-center">
                            <div class="btn-anular-hora mt20 mb10" onclick="cancelarHoraMedica(${hora.id})">
                                Anular hora
                            </div>
                        </div>
                    ` : '';

                    const botonAnularHtml = hora.id_estado === 2 ? `
                        <div class="col-xs-12 text-center">
                            <div class="btn-anular-hora mt20 mb10" onclick="cancelarHoraMedica(${hora.id})">
                                Anular hora
                            </div>
                        </div>
                    ` : '';

                    if(hora.foto_perfil && hora.foto_perfil!='')
                    {
                        var imagenMedico = 'https://med-sdi.cl/storage/'+hora.foto_perfil;
                    }else{
                        if(hora.sexo == "M"){
                            var imagenMedico = 'src/images/ejemplo_dr.jpg';
                        }else{
                            var imagenMedico = 'src/images/ejemplo_dra.jpg';
                        }
                    }

                    htmlHoras += `
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12  text-center">
                                <img class="img-circulo text-center"  width="50"  src="${imagenMedico}" alt="Foto perfil">
                                <p class="size14 color-azul">${medico}</p>
                                <p class="letra-small">${especialidad} - ${tipo_especialidad} - ${sub_tipo_especialidad}</p>
                                <hr class="mt10">
                           </div>
                           <div class="col-xs-6 text-left">
                                <p class="d-inline"><img class="mr10" width="20" src="src/images/calendario.svg">${fecha}</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                <p class="d-inline"><img  class="mr10" width="20" src="src/images/hora.svg">${horaInicio} - ${horaTermino}</p>
                            </div>
                            <div class="col-xs-12 text-left mt10">
                                <p><img class="mr10" width="20" src="src/images/ubicacion.svg">${hora.nombre_lugar_atencion}</p>
                                <p class="pl30 letra-small">${hora.direccion_lugar_atencion} ${hora.numero_dir_lugar_atencion ? hora.numero_dir_lugar_atencion : ''}</p>
                                <p class="pl30 letra-small">${estadoHora}</p>
                            </div>
                            ${botonesHtml}
                            ${botonAnularHtml}
                        </div>
                    </div>
                    `;
                });

                $('#lista-horas').html(htmlHoras);
            } else {
                $('#lista-horas').html(`
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12 text-center pt20 pb20">
                                <p class="size18 color-azul">No hay horas médicas agendadas</p>
                                <p class="size14">Contacte a su centro médico para agendar una hora</p>
                            </div>
                        </div>
                    </div>
                `);
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando horas médicas:', resp);
            cargando(0);
            msg('Horas Médicas', 'Error al cargar horas médicas', 'error');
            $('#lista-horas').html(`
                <div class="card-button-dos mb20">
                    <div class="row">
                        <div class="col-xs-12 text-center pt20 pb20">
                            <p class="size18 color-rojo">Error al cargar horas médicas</p>
                            <div class="btn-app4 mt10" onclick="solicitarMisHorasMedicas()">Reintentar</div>
                        </div>
                    </div>
                </div>
            `);
        },
        "GET");
}

const guardarAtencion = () => {
    // Recopilar datos del formulario
    const datos = {
        id_paciente: _SESSION('id_usuario'),
        rut_profesional: $.trim($('#rut_profesional').val()),
        nombre_profesional: $.trim($('#nombre_profesional').val()),
        correo_profesional: $.trim($('#correo_profesional').val()),
        telefono_profesional: $.trim($('#telefono_profesional').val()),
        especialidad: $.trim($('#esp_profesional').val()),
        tipo_especialidad: $.trim($('#tipo_esp_profesional').val()),
        sub_tipo_especialidad: $.trim($('#sub_tipo_esp_profesional').val()),
        diagnosticos: $.trim($('#diagnosticos').val()),
        examenes: $.trim($('#examenes').val()),
        medicamentos: $.trim($('#medicamentos').val()),
        rut_dependiente: $.trim($('#rut_dependiente').val()), // Por si es un dependiente
        token: "mobile-original-" + Date.now()
    };

    // Validaciones básicas
    if (!datos.rut_profesional || !datos.nombre_profesional || !datos.correo_profesional) {
        msg('Atención Médica', 'Debe completar RUT, nombre y correo del profesional', 'warning');
        return;
    }

    if (!datos.diagnosticos && !datos.examenes && !datos.medicamentos) {
        msg('Atención Médica', 'Debe completar al menos un campo: diagnósticos, exámenes o medicamentos', 'warning');
        return;
    }

    // Validar formato de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(datos.correo_profesional)) {
        msg('Atención Médica', 'Ingrese un correo electrónico válido', 'warning');
        return;
    }

    cargando(1);

    var api = new Api("paciente", "ficha-atencion-app");
    api.request(
        datos,
        function (resp) {
            console.log('Respuesta guardar atención:', resp);

            if (resp.estado == 1) {
                msg('Atención Médica', 'Atención guardada correctamente', 'success');
                limpiarFormularioAtencion();
            } else {
                msg('Atención Médica', resp.mensaje || 'Error al guardar la atención', 'error');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error guardando atención:', resp);
            cargando(0);
            msg('Atención Médica', 'Error de conexión al guardar la atención', 'error');
        },
        "POST");
}

const solicitarEspecialidades = (select) => {
    var datos = {};
    cargando(1);
    var api = new Api("profesionales", "especialidades");
    api.request(
        datos,
        function (resp) {
            LOG('especialidades estado:' + resp.estado);
            if (resp.estado == 1 && resp.especialidades) {
                let opciones = '<option value="">Seleccione especialidad</option>';
                resp.especialidades.forEach(esp => {
                    opciones += `<option value="${esp.id}">${esp.nombre}</option>`;
                });
                $(`#${select}`).html(opciones);
            } else {
                $(`#${select}`).html('<option value="">No hay especialidades</option>');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando especialidades:', resp);
            cargando(0);
            msg('Especialidades', 'Error al cargar especialidades', 'error');
            $(`#${select}`).html('<option value="">Error al cargar especialidades</option>');
        },
        "GET");
}

const cargarTipoEspecialidad = (select, selectIdEspecialidad) => {
    const idEspecialidad = $(`#${selectIdEspecialidad}`).val();
    if (!idEspecialidad) {
        $(`#${select}`).html('<option value="">Seleccione especialidad primero</option>');
        return;
    }

    var datos = { id_especialidad: idEspecialidad };
    cargando(1);
    var api = new Api("profesionales", "tipo_especialidades");
    api.request(
        datos,
        function (resp) {
            LOG(resp);
            LOG('tipo especialidades estado:' + resp.estado);
            if (resp.estado == 1 && resp.tipo_especialidades) {
                let opciones = '<option value="">Seleccione tipo de especialidad</option>';
                resp.tipo_especialidades.forEach(tipo => {
                    opciones += `<option value="${tipo.id}">${tipo.nombre}</option>`;
                });
                $(`#${select}`).html(opciones);
            } else {
                $(`#${select}`).html('<option value="">No hay tipos de especialidades</option>');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando tipo-especialidades:', resp);
            cargando(0);
            msg('Tipo-Especialidades', 'Error al cargar tipo-especialidades', 'error');
            $(`#${select}`).html('<option value="">Error al cargar tipo-especialidades</option>');
        },
        "GET"
    );
}

const cargarSubTipoEspecialidad = (select,selectIdTipoEspecialidad) => {
    const idTipoEspecialidad = $(`#${selectIdTipoEspecialidad}`).val();

    if (!idTipoEspecialidad) {
        $(`#${select}`).html('<option value="">Seleccione tipo-especialidad primero</option>');
        return; // Salir temprano de la función
    }

    var datos = { id_tipo_especialidad: idTipoEspecialidad };
    cargando(1);

    var api = new Api("profesionales", "sub_tipo_especialidades");
    api.request(
        datos,
        function (resp) {
            LOG('sub tipo especialidades estado:' + resp.estado);
            if (resp.estado == 1 && resp.sub_tipo_especialidades && resp.sub_tipo_especialidades.length > 0) {
                let opciones = '<option value="">Seleccione sub-tipo especialidad</option>';
                resp.sub_tipo_especialidades.forEach(subtipo => {
                    opciones += `<option value="${subtipo.id}">${subtipo.nombre}</option>`;
                });
                $(`#${select}`).html(opciones);
            } else {
                $(`#${select}`).html('<option value="">No hay sub-tipo especialidades disponibles</option>');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando sub-tipo especialidades:', resp);
            cargando(0);
            msg('Sub-Tipo Especialidades', 'Error al cargar sub-tipo especialidades', 'error');
            $(`#${select}`).html('<option value="">Error al cargar datos</option>');
        },
        "GET"
    );
}

const seleccionarLugarAtencion = (idLugar, idProfesional, nombreLugar) => {
    console.log('Lugar de atención seleccionado ID:', idLugar);

    // Obtener datos del médico desde la sesión
    const nombreMedico = getSession('nombre_medico_seleccionado');
    const especialidadMedico = getSession('especialidad_medico_seleccionado');

    // Guardar en sesión el ID del lugar seleccionado y su nombre
    setSession('id_lugar_seleccionado', idLugar);
    setSession('id_profesional_seleccionado', idProfesional);
    setSession('nombre_lugar_seleccionado', nombreLugar);

    var datos = {
        id_profesional: idProfesional,
        id_lugar: idLugar
    };

    cargando(1);

    var api = new Api("profesionales", "dias_laborales_lugar_atencion");
    api.request(
        datos,
        function (resp) {
            LOG('dias laborales estado:' + resp.estado);
            console.log(resp);

            if (resp.estado == 1 && resp.registros) {
                // Procesar días laborales
                const diasLaborales = resp.registros.horario_agenda_laboral.split(',').map(d => parseInt(d));

                // Generar fechas disponibles para los próximos 30 días
                const fechasDisponibles = generarFechasDisponibles(diasLaborales, 30);

                if (fechasDisponibles.length > 0) {
                    // Actualizar header de la vista con información completa
                    $('#seleccionar_fecha_hora .top-titulos').html(`

                        <p class="letra-bold color-azul-oscuro size20 text-center mt50">Seleccionar fecha y hora</p>
                        <div class="bg-azul-claro p10 mb20 border-radius-5">
                            <p class="size16 color-azul text-center mb5"><strong>${nombreMedico}</strong></p>
                            <p class="size14 text-center mb5">${especialidadMedico}</p>
                            <p class="size13 text-center mb0"><img class="mr5" width="12" src="src/images/ubicacion.svg">${nombreLugar}</p>
                        </div>
                        <div class="btn-app4 text-center size14 mb20" onclick="vista('lugares_atencion');">
                            Volver a lugares
                        </div>
                    `);

                    let htmlSelect = '<select id="fecha_seleccionada" class="form-control form-control-sm text-center mb20">';
                    htmlSelect += '<option value="">Seleccione una fecha</option>';

                    fechasDisponibles.forEach(fecha => {
                        htmlSelect += `<option value="${fecha.valor}">${fecha.texto}</option>`;
                    });

                    htmlSelect += '</select>';

                    let htmlHoras = `
                    <div class="card-button-dos mb20">
                        <div class="row text-center">
                            <div class="col-xs-12 mb20">
                                <p class="size14 color-azul mb10">Seleccione fecha disponible:</p>
                                ${htmlSelect}
                                <div class="btn-app7 text-center" onclick="cargarHorasDisponibles()" style="display:none; width: 100%;" id="btn-cargar-horas">
                                    <img src="src/images/lupa.svg" class="ml20 mr10 wid10" alt="Buscar">  Buscar horarios
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="horarios-disponibles" class="text-center"></div>
                    `;

                    $('#lista-fechas').html(htmlHoras);

                    // Evento para mostrar botón cuando se seleccione fecha
                    $('#fecha_seleccionada').on('change', function() {
                        if ($(this).val()) {
                            $('#btn-cargar-horas').show();
                        } else {
                            $('#btn-cargar-horas').hide();
                        }
                    });

                    vista('seleccionar_fecha_hora', 'fade');
                } else {
                    mostrarSinFechasDisponibles();
                }
            } else {
                mostrarSinFechasDisponibles();
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando días laborales:', resp);
            cargando(0);
            msg('Error', 'Error al cargar días laborales', 'error');
        },
        "GET"
    );
}

const generarFechasDisponibles = (diasLaborales, cantidadDias) => {
    const fechasDisponibles = [];
    const hoy = new Date();
    const nombresDias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    const nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                         'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    for (let i = 1; i <= cantidadDias; i++) { // Empezar desde mañana
        const fecha = new Date(hoy);
        fecha.setDate(hoy.getDate() + i);

        const diaSemana = fecha.getDay(); // 0=Domingo, 1=Lunes, etc.

        // Verificar si el día está en los días laborales
        if (diasLaborales.includes(diaSemana)) {
            const dia = fecha.getDate().toString().padStart(2, '0');
            const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
            const año = fecha.getFullYear();

            fechasDisponibles.push({
                valor: `${año}-${mes}-${dia}`,
                texto: `${nombresDias[diaSemana]} ${dia} de ${nombresMeses[fecha.getMonth()]} ${año}`
            });
        }
    }

    return fechasDisponibles;
}

const cargarHorasDisponibles = () => {
    const fechaSeleccionada = $('#fecha_seleccionada').val();

    if (!fechaSeleccionada) {
        msg('Fecha', 'Debe seleccionar una fecha', 'warning');
        return;
    }

    const datos = {
        id_profesional: getSession('id_profesional_seleccionado'),
        id_lugar: getSession('id_lugar_seleccionado'),
        fecha: fechaSeleccionada
    };

    cargando(1);

    var api = new Api("profesionales", "horas_disponibles_profesional_lugar_atencion");
    api.request(
        datos,
        function (resp) {
            if (resp.estado == 1 && resp.horarios && resp.horarios.length > 0) {
                let htmlHorarios = '<div class="card-button-dos mb20"><div class="row"><div class="col-xs-12 text-left mb10">';
                htmlHorarios += '<p class="size14 color-azul mb10 text-center">Horarios disponibles:</p>';

                resp.horarios.forEach(horario => {
                    htmlHorarios += `
                    <div class="btn-hora-disponible mb10" onclick="confirmarHoraMedica('${horario.id}', '${fechaSeleccionada}', '${horario.hora}')">
                        ${horario.hora}
                    </div>`;
                });

                htmlHorarios += '</div></div></div>';
                $('#horarios-disponibles').html(htmlHorarios);
            } else {
                $('#horarios-disponibles').html(`
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12 text-center pt20 pb20">
                                <p class="size16 color-azul">No hay horarios disponibles para esta fecha</p>
                            </div>
                        </div>
                    </div>
                `);
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando horarios:', resp);
            cargando(0);
            msg('Error', 'Error al cargar horarios disponibles', 'error');
        },
        "GET"
    );
}

const mostrarSinFechasDisponibles = () => {
    $('#lista-fechas').html(`
        <div class="card-button-dos mb20">
            <div class="row">
                <div class="col-xs-12 text-center pt20 pb20">
                    <p class="size18 color-azul">No hay fechas disponibles</p>
                    <p class="size14">Este profesional no tiene días laborales asignados</p>
                </div>
            </div>
        </div>
    `);
    msg('Días Laborales', 'No hay días laborales disponibles para este lugar de atención', 'warning');
}

// Función auxiliar para limpiar el formulario después de guardar
const limpiarFormularioAtencion = () => {
    $('#rut_profesional').val('');
    $('#nombre_profesional').val('');
    $('#correo_profesional').val('');
    $('#telefono_profesional').val('');
    $('#esp_profesional').val('');
    $('#tipo_esp_profesional').html('<option value="">Seleccione especialidad primero</option>');
    $('#sub_tipo_esp_profesional').html('<option value="">Seleccione tipo-especialidad primero</option>');
    $('#diagnosticos').val('');
    $('#examenes').val('');
    $('#medicamentos').val('');
    $('#rut_dependiente').val('');

    // Ocultar el div del dependiente si estaba visible
    $('#div_paciente_dependiente').addClass('hidden');
}

const limpiarFormularioBusquedaMedico = () => {
    $('#especialidad').val(0);
    $('#tipoespecialidad').html('<option value="">Seleccione especialidad primero</option>');
    $('#subtipoespecialidad').html('<option value="">Seleccione tipo-especialidad primero</option>');
    $('#region').val(0);
    $('#ciudad').html('<option value="">Seleccione región primero</option>');
}

const fechaEsp = (fecha) =>{
    var fecha_ = fecha.split('T');
    fecha_ = fecha_[0].split('-');
    return fecha_[2]+'-'+fecha_[1]+'-'+fecha_[0];
}

const enviarCorreoValidarEquipo = () => {

    var datos = {};

    datos.id_user = _SESSION('id_usuario');
    datos.uuid = $('#uuid').val();
        
    var api = new Api("user_devices", "solicitud_registro_equipo");
    api.request(
        datos,
        function (resp) {
            LOG('correo de registro de equipo:'+resp.envio_correo);
            if (resp.envio_correo.estado == 1) {
                msg('Correo de activación', 'Correo Enviado', 'success');  
            }else{
                msg('Correo de activación', 'Problemas al enviar el correo', 'error');
            }            

        },
        function (resp) {             
            msg('Correo de activación', 'Problemas al enviar el correo', 'error');
        },
        "GET");

}
const openReceta = (url) => {
    console.log("Click detectado. URL:", url);
    if (!cordova.InAppBrowser) {
        console.log("InAppBrowser no disponible");
    } else {
        // cordova.InAppBrowser.open(url, '_blank', 'location=yes');
        // console.log("Intento de abrir InAppBrowser");
          const gviewUrl = "https://docs.google.com/gview?embedded=true&url=" + encodeURIComponent(url);
        cordova.InAppBrowser.open(gviewUrl, '_blank', 'location=yes');
    }
}

const formatearRut = (rut) => {
    // Eliminar puntos, guiones y espacios
    rut = rut.replace(/[^0-9kK]/g, '');

    if (rut.length < 2) return rut;

    // Separar número del dígito verificador
    const cuerpo = rut.slice(0, -1);
    const dv = rut.slice(-1).toUpperCase();

    // Formatear el cuerpo con puntos
    let cuerpoFormateado = '';
    for (let i = cuerpo.length; i > 0; i -= 3) {
        const inicio = Math.max(0, i - 3);
        const grupo = cuerpo.slice(inicio, i);
        cuerpoFormateado = grupo + (cuerpoFormateado ? '.' + cuerpoFormateado : '');
    }

    return cuerpoFormateado + (dv ? '-' + dv : '');
}

const calcularDV = (rut) => {
    let suma = 0;
    let multiplicador = 2;

    // Calcular suma
    for (let i = rut.length - 1; i >= 0; i--) {
        suma += parseInt(rut.charAt(i)) * multiplicador;
        multiplicador = multiplicador === 7 ? 2 : multiplicador + 1;
    }

    const resto = suma % 11;
    const dv = 11 - resto;

    if (dv === 11) return '0';
    if (dv === 10) return 'K';
    return dv.toString();
}

const validarRut = (rutCompleto) => {
    if (!rutCompleto || rutCompleto.length < 3) return false;

    const rutLimpio = rutCompleto.replace(/[^0-9kK]/g, '');
    const cuerpo = rutLimpio.slice(0, -1);
    const dv = rutLimpio.slice(-1).toUpperCase();

    if (cuerpo.length < 1 || !/^\d+$/.test(cuerpo)) return false;

    return calcularDV(cuerpo) === dv;
}

// Aplicar formato al campo RUT
const aplicarFormatoRut = () => {
    const campoRut = $('#rut_profesional');

    campoRut.on('input', function() {
        const valorActual = $(this).val();
        const rutFormateado = formatearRut(valorActual);
        $(this).val(rutFormateado);
    });

    campoRut.on('blur', function() {
        const rutCompleto = $(this).val();
        const rutLimpio = rutCompleto.replace(/[^0-9kK]/g, '');

        if (rutLimpio.length >= 2) {
            const cuerpo = rutLimpio.slice(0, -1);
            const dvCalculado = calcularDV(cuerpo);
            const rutConDV = formatearRut(cuerpo + dvCalculado);
            $(this).val(rutConDV);

            // Validar RUT
            if (!validarRut(rutConDV)) {
                $(this).addClass('error');
                msg('RUT Inválido', 'El RUT ingresado no es válido', 'warning');
            } else {
                $(this).removeClass('error');
            }
        }
    });
}

const cancelarHoraMedica = (idHora) => {
    if (!idHora) {
        msg('Anular Hora', 'ID de hora inválido', 'warning');
        return;
    }

    // Confirmación antes de cancelar
    if (!confirm('¿Está seguro que desea anular esta hora médica?')) {
        return;
    }

    const datos = {
        id_hora: idHora,
        token: "mobile-original-" + Date.now()
    };

    cargando(1);

    var api = new Api("paciente", "anular_hora_medica");
    api.request(
        datos,
        function (resp) {
            console.log('Respuesta anular hora:', resp);

            if (resp.estado == 1) {
                msg('Hora Anulada', 'La hora ha sido anulada correctamente', 'success');

                solicitarMisHorasMedicas();
            } else {
                msg('Error', resp.msj || 'Error al anular la hora', 'error');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error anulando hora:', resp);
            cargando(0);
            msg('Error', 'Error de conexión al anular la hora', 'error');
        },
        "POST");
}

const confirmarHoraMedica = (idHora, fecha, hora) => {

    // confirmar que se quiere agendar la hora
    if (!confirm(`¿Está seguro que desea agendar la hora médica el ${fecha} a las ${hora}?`)) {
        return;
    }

    const datos = {
        id_paciente: _SESSION('id_usuario'),
        id_profesional: getSession('id_profesional_seleccionado'),
        id_lugar: getSession('id_lugar_seleccionado'),
        tipo_hora_medica: 'C',
        id_hora: idHora,
        fecha: fecha,
        hora: hora,
        token: "mobile-original-" + Date.now()
    };

    cargando(1);

    var api = new Api("paciente", "agendar_hora_medica");
    api.request(
        datos,
        function (resp) {
            console.log('Respuesta confirmar hora:', resp);

            if (resp.estado == 1) {
                msg('Hora Confirmada', 'La hora ha sido confirmada correctamente', 'success');
            } else {
                msg('Error', resp.msj || 'Error al confirmar la hora', 'error');
            }

            cargando(0);
            solicitarMisHorasMedicas();
        },
        function (resp) {
            console.error('Error confirmando hora:', resp);
            cargando(0);
            msg('Error', 'Error de conexión al confirmar la hora', 'error');
        },
        "POST");
}

const confirmarHoraMedicaAgendada = (idHora) => {
    if (!idHora) {
        msg('Confirmar Hora', 'ID de hora inválido', 'warning');
        return;
    }
    // Confirmación antes de confirmar
    if (!confirm('¿Está seguro que desea confirmar esta hora médica?')) {
        return;
    }
    const datos = {
        id_hora: idHora,
        token: "mobile-original-" + Date.now()
    };
    cargando(1);
    var api = new Api("paciente", "confirmar_hora_medica");
    api.request(
        datos,
        function (resp) {
            console.log('Respuesta confirmar hora:', resp);
            if (resp.estado == 1) {
                msg('Hora Confirmada', 'La hora ha sido confirmada correctamente', 'success');
                solicitarMisHorasMedicas();
            } else {
                msg('Error', resp.msj || 'Error al confirmar la hora', 'error');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error confirmando hora:', resp);
            cargando(0);
            msg('Error', 'Error de conexión al confirmar la hora', 'error');
        },
        "POST");
}

const dameRegiones = (select) => {
    var datos = {};
    cargando(1);
    var api = new Api("paciente", "dame_regiones");
    api.request(
        datos,
        function (resp) {
            LOG('regiones estado:' + resp.estado);
            if (resp.estado == 1 && resp.regiones) {
                let opciones = '<option value="">Seleccione región</option>';
                resp.regiones.forEach(region => {
                    opciones += `<option value="${region.id}">${region.nombre}</option>`;
                });
                $('#region').html(opciones);
            } else {
                $('#region').html('<option value="">No hay regiones</option>');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando regiones:', resp);
            cargando(0);
            msg('Regiones', 'Error al cargar regiones', 'error');
            $('#region').html('<option value="">Error al cargar regiones</option>');
        },
        "GET");
}

const dameCiudades = (select, selectIdRegion) => {
    const idRegion = $(`#${selectIdRegion}`).val();
    if (!idRegion) {
        $(`#${select}`).html('<option value="">Seleccione región primero</option>');
        return;
    }

    var datos = { id_region: idRegion };
    cargando(1);
    var api = new Api("paciente", "dame_ciudades");
    api.request(
        datos,
        function (resp) {
            LOG('provincias estado:' + resp.estado);
            if (resp.estado == 1 && resp.ciudades) {
                let opciones = '<option value="">Seleccione provincia</option>';
                resp.ciudades.forEach(ciudad => {
                    opciones += `<option value="${ciudad.id}">${ciudad.nombre}</option>`;
                });
                $(`#${select}`).html(opciones);
            } else {
                $(`#${select}`).html('<option value="">No hay ciudades</option>');
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error cargando provincias:', resp);
            cargando(0);
            msg('Provincias', 'Error al cargar provincias', 'error');
            $(`#${select}`).html('<option value="">Error al cargar provincias</option>');
        },
        "GET");
}

const buscarProfesionales = () => {

    // validar que se haya seleccionado una especialidad
    if (!$('#especialidad').val()) {
        msg('Búsqueda', 'Debe seleccionar una especialidad para buscar profesionales', 'warning');
        return;
    }
    // validar que se haya seleccionado una región
    if (!$('#region').val()) {
        msg('Búsqueda', 'Debe seleccionar una región para buscar profesionales', 'warning');
        return;
    }


    const datos = {
        id_especialidad: $('#especialidad').val(),
        id_tipo_especialidad: $('#tipoespecialidad').val(),
        id_sub_tipo_especialidad: $('#subtipoespecialidad').val(),
        id_region: $('#region').val(),
        id_ciudad: $('#ciudad').val(),
        nombre_profesional: $.trim($('#nombre_profesional_busqueda').val()),
        token: "mobile-original-" + Date.now()
    };
    cargando(1);
    var api = new Api("profesionales", "buscar_profesionales");
    api.request(
        datos,
        function (resp) {
            LOG('buscar profesionales estado:' + resp.estado);
            console.log(resp.profesionales);
            vista('mis_medicos_buscados', 'fade');
            if (resp.estado == 1 && resp.profesionales && resp.profesionales.length > 0) {
                let htmlProfesionales = '';
                resp.profesionales.forEach(prof => {
                    if(prof.foto_perfil && prof.foto_perfil!=''){
                        var fotoPerfil = 'https://med-sdi.cl/storage/'+prof.foto_perfil;
                    }else{
                        if(prof.sexo && prof.sexo=='F'){
                            var fotoPerfil = 'src/images/ejemplo_dra.jpg';
                        }else{
                            var fotoPerfil = 'src/images/ejemplo_dr.jpg';
                        }
                    }
                    const nombreCompleto = [
                        prof.nombre,
                        prof.apellido_uno,
                        prof.apellido_dos
                    ].filter(Boolean).join(' ').trim() || 'Profesional';
                    const especialidadCompleta = [
                        prof.especialidad || prof.nombre_especialidad,
                        prof.tipo_especialidad || prof.nombre_tipo_especialidad,
                        prof.sub_tipo_especialidad || prof.nombre_sub_tipo_especialidad
                    ].filter(Boolean).filter(function (valor, indice, lista) {
                        return lista.indexOf(valor) === indice;
                    }).join(' - ') || 'Especialidad no informada';
                    const lugarAtencion = prof.nombre_lugar_atencion
                        || prof.lugar_atencion
                        || prof.direccion
                        || 'Lugar de atención por confirmar';

                    htmlProfesionales += `
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-3 text-center">
                                <a href="javascript:void(0)" onclick="damePerfilMedico(${prof.id})"> <img class="img-circulo" width="70" src="${fotoPerfil}" alt="Foto perfil"> </a>
                            </div>
                            <div class="col-xs-9">
                                <p class="size16 color-azul mb5">${nombreCompleto}</p>
                                <p class="letra-small mb5">${especialidadCompleta}</p>
                                <p class="letra-small mb5"><img class="mr10" width="15" src="src/images/ubicacion.svg">${lugarAtencion}</p>
                                <div class="btn-app7" style="width: 100%;" onclick="agendarHora(${prof.id}, '${nombreCompleto}', '${especialidadCompleta}')">
                                    Agendar Hora
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#lista-medicos-buscados').html(htmlProfesionales);
            } else {
                $('#lista-medicos-buscados').html(`
                    <div class="card-button-dos mb20">
                        <div class="row">
                            <div class="col-xs-12 text-center pt20 pb20">
                                <p class="size18 color-azul">No se encontraron profesionales</p>
                                <p class="size14">Intente con otros filtros de búsqueda</p>
                            </div>
                        </div>
                    </div>
                `);
            }
            cargando(0);
        },
        function (resp) {
            console.error('Error buscando profesionales:', resp);
            cargando(0);
            msg('Error', 'Error al buscar profesionales', 'error');
            $('#lista-medicos-buscados').html(`
                <div class="card-button-dos mb20">
                    <div class="row">
                        <div class="col-xs-12 text-center pt20 pb20">
                            <p class="size18 color-rojo">Error al buscar profesionales</p>
                            <div class="btn-app4 mt10" onclick="buscarProfesionales()">Reintentar</div>
                        </div>
                    </div>
                </div>
            `);
        },
        "POST");
}

var listLogDeviceRequestId = 0;

const list_log_device = ()=>{

    var estructura_html = '';
    var requestId = ++listLogDeviceRequestId;
    $('#list_log_reg').html('');
    $('#log_reg_autorizacion').html('');

    var datos = {};

    datos.id_user_recept = _SESSION('id_usuario');

    $('#list_log_reg').html(
        '<p class="text-center color-gris mt20">Cargando autorizaciones...</p>'
    );

    var api = new Api("log_user_devices", "ver_registros");

    api.request(
        datos,
        function (resp) {
            if (requestId !== listLogDeviceRequestId) {
                return;
            }

            LOG('list log device:' + resp.estado);

            $('#list_log_reg').html('');
            $('#log_reg_autorizacion').html('');

            if (resp.estado == 1) {

                resp.registros.forEach(reg => {
                    $('#list_log_reg').append(reg.msg_html);
                });

            } else {
                $('#list_log_reg').append('<li class="mt10">- No se encontraron Registros</li>');
            }

        },
        function (resp) {
            if (requestId !== listLogDeviceRequestId) {
                return;
            }

            $('#list_log_reg').html(
                '<p class="text-center color-rojo mt20">No fue posible cargar las autorizaciones.</p>'
            );
            msg('Lista log eventos', 'Error de lista de eventos', 'error');
        },
        "GET"
    );

}

const getSession = (key) => {
    return localStorage.getItem(key) || sessionStorage.getItem(key);
}
var accion_log_actual = null;

function abrir_autorizacion_log(id_log, accion, btn) {

    accion_log_actual = accion;

    let msg = $(btn)
        .closest('.log-card')
        .find('.msg_estado_log')
        .html();

    $('#id_log').val(id_log);
    $('#log_reg_autorizacion').html(msg);
    $('#password_').val('');

    vista('autorizacion');
}
