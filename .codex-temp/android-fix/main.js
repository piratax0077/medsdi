const load_animate = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: inline-block; padding-top: 8px;" width="25px" height="25px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="17.5" y="30" width="15" height="40" fill="#93dbe9"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate></rect><rect x="42.5" y="30" width="15" height="40" fill="#689cc5"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate></rect><rect x="67.5" y="30" width="15" height="40" fill="#5e6fa3"> <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate> <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate></rect></svg>`;

var historial_index = 0;
var historial_pages = [];

document.addEventListener("deviceready", onDeviceReady, false);
window.onscroll = () => { headerFixed(); };
window.onload = () =>{
    init('login','none');
    initVariablesGlobales();
};

function onDeviceReady() {
    // El plugin cordova-plugin-device no expone `device` en Browser.
    if (typeof device === 'undefined') {
        LOG('Información del dispositivo no disponible en esta plataforma.');
        return;
    }

    LOG('model: '+device.model);
    LOG('cordova: '+device.cordova);
    LOG('model: '+device.model);
    LOG('platform: '+device.platform);
    LOG('uuid: '+device.uuid);
    LOG('version: '+device.version);
    LOG('manufacturer: '+device.manufacturer);
    LOG('isVirtual: '+device.isVirtual);
    LOG('serial: '+device.serial);
    $('#uuid').val(device.uuid);    
    $('#model_device').val(device.model);
    setSession('uuid',device.uuid);
    setSession('model_device',device.model);

    // Si Android restauró una sesión existente, vuelve a asociar el token FCM
    // con el usuario actualmente autenticado (paciente o profesional).
    registrarNotificacionesDeSesion();

    document.addEventListener('resume', registrarNotificacionesDeSesion, false);
}

function registrarNotificacionesDeSesion() {
    if (!_SESSION('authToken')) {
        return;
    }

    if (typeof inicializarNotificacionesPush === 'function') {
        inicializarNotificacionesPush();
    }
}

// Respond to back/forward navigation
$( window ).on( "navigate", function( event, data ){
    event.preventDefault();
    /*
    console.log(data.state.foo);
	if ( data.state.foo ) {
        // Make use of the arbitrary data stored
       
    }
    
    if(data.state.foo==undefined)
    return false; 

	if ( data.state.direction == "back" ) {
        // Make use of the directional information        
        //window.history.back();     
        vista(data.state.foo);   
    }
    */ 

});

const LOG = (text) =>
{
    $('#contenedor-log').append(`<li>${text}</li>`);
}

const initVariablesGlobales = () =>{
    
    var variables = `
    <input type="hidden" id="uuid" value="0" />
    <input type="hidden" id="model_device" value="" />
    <input type="hidden" id="id_usuario" value="1" />
    <input type="hidden" id="user_usuario" value="1" />
    <input type="hidden" id="pass_usuario" value="1" />
    <input type="hidden" id="pass_device" value="0" />
    `;
    $('body').append(variables);

    // Restaura las credenciales del dispositivo al iniciar la app.
    // Sin esto, pass_device conserva el valor inicial "0" hasta que
    // checkDevice termine su consulta al servidor.
    $('#uuid').val(localStorage.getItem('uuid') || '0');
    $('#model_device').val(localStorage.getItem('model_device') || '');
    $('#pass_device').val(localStorage.getItem('password') || '');
}

const _SESSION = (key) => {
    return localStorage.getItem(key);
    //return $('#'+key).val();
}


const setSession = (key,value) => {
    localStorage.setItem(key, value);
    //$('#'+key).val(value);
}

const obtenerUuidDispositivo = () => {
    var uuid = String(localStorage.getItem('uuid') || $('#uuid').val() || '');

    uuid = $.trim(uuid);
    if (!uuid || uuid === '0') {
        return '';
    }

    $('#uuid').val(uuid);
    localStorage.setItem('uuid', uuid);
    return uuid;
};


const backHistorial = () => {
    //window.history.back();    
    if(historial_index>0)
    {
        historial_index= historial_index -2;
        let vista_sel = historial_pages[historial_index];
        vista(vista_sel);        
        historial_pages.slice(historial_pages.length-1,1);
    }
}


const historial = (url) => {

    historial_pages.push(url);
    historial_index++;    
    //var stateObj = { foo: url };
    //history.pushState(stateObj, url); // DEV
    //history.pushState(stateObj, url,url); // DEFAULT
}

const headerFixed = () => {    
    var headerApp = $('#header');
    var scrollY = window.scrollY;        
    if(scrollY<50)
    {
        if(scrollY==0)
        //$('.barra_menu').remove();
        headerApp.removeClass('sticky');
    }else{        
        if($('.barra_menu').length==0)
        //$('.ui-content').prepend('<div class="barra_menu"></div>');
        headerApp.addClass('sticky');
    }
}

const verMenu = () =>{
    $("#menu").trigger( "updatelayout" );
}


const init = (nombre,transition = 'slide') => {
    
    historial(nombre);
    $.mobile.pageContainer.pagecontainer("change", "#"+nombre, { reload : false,changeHash :false , reverse: false });
    /*
    $.mobile.changePage( getPhoneGapPath()+"view/"+nombre+".html", {
        //$.mobile.changePage( nombre+".html", {
        transition: transition,
        reverse: false,
        changeHash: false
    });*/
    
}


/* slide - slideup - none - fade */ 
const vista = (nombre,transition = 'slide') => {       
    historial(nombre);
    $.mobile.pageContainer.pagecontainer("change", "#"+nombre, { reload : false,changeHash :false ,reverse: false });
    /*
    $.mobile.changePage( getPhoneGapPath()+"view/"+nombre+".html", { 
    //$.mobile.changePage( nombre+".html", {
        transition: transition,
        reverse: false,
        changeHash: false
    });*/
    
}

const cambiar_tab_sdi = (tab, elemento) => {

    $('.sdi-tab').removeClass('active');
    $('.sdi-tab-content').removeClass('active');

    $(elemento).addClass('active');

    if (tab === 'autorizaciones') {
        $('#content_autorizaciones').addClass('active');
    }

    if (tab === 'reposo') {
        $('#content_reposo').addClass('active');

        // list_control_reposo();
    }
}

const abrirDependiente = () => {
    var div_dependiente = $('#div_paciente_dependiente');
    div_dependiente.removeClass('hidden');
}

const getPhoneGapPath = () => {  
    'use strict';
    var path = window.location.pathname;
    var phoneGapPath = path.substring(0, path.lastIndexOf('/') + 1);
    return phoneGapPath;
};

const showHiddenBlock = (hidden,show) => {
    for(key in hidden)
    $('#'+hidden[key]).addClass('hidden').removeClass('fade-in');
    for(key in show)
    $('#'+show[key]).addClass('fade-in').removeClass('hidden');
}

const cargando = (estado) => {
    if(estado)
    {
        $.mobile.loading( 'show', {
            text: '',
            textVisible: true,
            theme: 'z',
            html: `
            <div class='cont_cargando'>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;display:block;" width="90px" height="90px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#08454d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" transform="rotate(159.089 50 50)"> <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle><circle cx="50" cy="50" r="23" stroke-width="8" stroke="#01c5dd" stroke-dasharray="36.12831551628262 36.12831551628262" stroke-dashoffset="36.12831551628262" fill="none" stroke-linecap="round" transform="rotate(-159.089 50 50)"> <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;-360 50 50"></animateTransform></circle></svg>
                <p>Cargando...</p>
            </div>`
        });
    }else{
        $.mobile.loading( 'hide');
    }
}

const formato_miles = (num,iva) => {
    var num = parseInt(num);
    if(isNaN(num))
    { return 0;}
    else
    {
        var cadena = ""; var aux;
        var cont = 1,m,k;
        if(num<0)
        {aux=1;}
        else
        {aux=0;}

        num=num.toString();

        for(m=num.length-1; m>=0; m--)
        {
            cadena = num.charAt(m) + cadena;

            if(cont%3 == 0 && m >aux)
            {cadena = "." + cadena;}
            else
            {cadena = cadena;}

            if(cont== 3)
            {cont = 1;}
            else
            {cont++;}

        }

        cadena = cadena.replace(/.,/,",");
        var resultado = '';
        if(iva){
            //resultado = cadena+' + IVA';
            resultado = cadena;
        }else{
            resultado = cadena;
        }
        return resultado;
    }

}


const numerDepato = (number, piso) => {
    var width = 2;
    var numberOutput = Math.abs(number); /* Valor absoluto del nÃºmero */
    var length = number.toString().length; /* Largo del nÃºmero */
    var zero = "0"; /* String de cero */
    var n = '';
    var p = '';

    if (width <= length) {
        n = numberOutput.toString();
    } else {
        n = ((zero.repeat(width - length)) + numberOutput.toString());
    }

    var pisoOutput = Math.abs(piso); /* Valor absoluto del nÃºmero */
    var lengthp = piso.toString().length; /* Largo del nÃºmero */

    if (width <= lengthp) {
        p = pisoOutput.toString();
    } else {
        p = ((zero.repeat(width - lengthp)) + pisoOutput.toString());
    }
    return parseInt(p+''+n);
}


const monedaPesos = (moneda) => {
    //console.log(parseFloat(moneda).toFixed(2).replace('.', ",").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
    return parseFloat(moneda).toFixed(0).replace('.', ",").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
}

const armar_tabla_head = (datos, div_taget) => {
    var html = '<table class="table table-responsive  table-hover size10" id="' + div_taget + '">';
    html += '<thead>';
    html += '<tr>';
    for (var i = 0; i < datos.length; i++)
        html += '<th class="gaccion-' + datos[i][1] +'">' + datos[i][0] + '</th>';
    html += '</tr>';
    html += '</thead>';
    html += '<tbody>';

    return html;
}



const fecha_eng = (fecha) => {
    if(fecha == null || fecha == '')return false;
    var fecha_mod = fecha.split('-');
    return fecha_mod[2]+'-'+fecha_mod[1]+'-'+fecha_mod[0];
}

const removeNull = (registros) => {

    for(var key in registros)
    {
        for(var valor in registros[key])
        {
            if(registros[key][valor]==null)
                registros[key][valor] = '';
        }
    }
    return registros;
}



const revisarDigito = ( dvr ) => {
    dv = dvr + ""
    if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')
    {
        alert("Debe ingresar un digito verificador valido");
        window.document.form1.rut.focus();
        window.document.form1.rut.select();
        return false;
    }
    return true;
}

const revisarDigito2 = ( crut ,div) => {
    largo = crut.length;
    if ( largo < 2 )
    {
        //error("Debe ingresar el rut completo");
        msg('RUT', 'Debe ingresar el rut completo', 'error');
        $('#'+div).focus();
        $('#'+div).select();
        return false;
    }
    if ( largo > 2 )
        rut = crut.substring(0, largo - 1);
    else
        rut = crut.charAt(0);
    dv = crut.charAt(largo-1);
    revisarDigito( dv );

    if ( rut == null || dv == null )
        return 0;

    var dvr = '0';
    suma = 0;
    mul  = 2;

    for (i= rut.length -1 ; i >= 0; i--)
    {
        suma = suma + rut.charAt(i) * mul;
        if (mul == 7)
            mul = 2;
        else
            mul++;
    }
    res = suma % 11;
    if (res==1)
        dvr = 'k';
    else if (res==0)
        dvr = '0';
    else
    {
        dvi = 11-res;
        dvr = dvi + ""
    }
    if ( dvr != dv.toLowerCase() )
    {
        //error("EL rut es incorrecto");
        msg('RUT', 'EL rut es incorrecto', 'error');
        $('#'+div).focus();
        $('#'+div).select();
        return false
    }

    return true
}

const Rut = (texto,div) =>{
    var tmpstr = "";
    for ( i=0; i < texto.length ; i++ )
        if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
            tmpstr = tmpstr + texto.charAt(i);
    texto = tmpstr;
    largo = texto.length;

    if ( largo < 2 )
    {
        //error("Debe ingresar el rut completo");
        msg('RUT', 'Debe ingresar el rut completo', 'error');
        $('#'+div).focus();
        $('#'+div).select();
        return false;
    }

    for (i=0; i < largo ; i++ )
    {
        if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
        {
            //error("El valor ingresado no corresponde a un R.U.T valido");
            msg('RUT', 'El valor ingresado no corresponde a un R.U.T valido', 'error');
            $('#'+div).focus();
            $('#'+div).select();
            return false;
        }
    }

    var invertido = "";
    for ( i=(largo-1),j=0; i>=0; i--,j++ )
        invertido = invertido + texto.charAt(i);
    var dtexto = "";
    dtexto = dtexto + invertido.charAt(0);
    dtexto = dtexto + '-';
    cnt = 0;

    for ( i=1,j=2; i<largo; i++,j++ )
    {
        //alert("i=[" + i + "] j=[" + j +"]" );
        if ( cnt == 3 )
        {
            dtexto = dtexto + '.';
            j++;
            dtexto = dtexto + invertido.charAt(i);
            cnt = 1;
        }
        else
        {
            dtexto = dtexto + invertido.charAt(i);
            cnt++;
        }
    }

    invertido = "";
    for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )
        invertido = invertido + dtexto.charAt(i);

    $('#'+div).val(invertido.toUpperCase());

    if ( revisarDigito2(texto,div) )
        return true;

    return false;
}

const validarEmail = (valor) => {
    var estado = 0;
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
        estado=0;
    } else {
        estado=1;
    }

    return estado;
}

const guardar_config_reposo = () => {

    let datos = {
        activo: $('#reposo_activo').val(),
        radio_km: $('#reposo_radio_km').val(),
        frecuencia_horas: $('#reposo_frecuencia').val(),
        control_medicamentos: $('#reposo_control_medicamentos').val(),
        control_ubicacion: $('#reposo_control_ubicacion').val(),
        direccion: $('#reposo_direccion').val(),
        observaciones: $('#reposo_observaciones').val(),
        id_user_recept: _SESSION('id_usuario')
    };

    console.log('Config reposo:', datos);

    // aquí después llamas a tu API
    // var api = new Api("control_reposo", "guardar_configuracion");
    // api.request(datos, success, error, "POST");
}

const probar_camara_reposo = () => {
    console.log('Abrir cámara para prueba de medicamentos');

    // Aquí después puedes conectar plugin/cámara Cordova
}
