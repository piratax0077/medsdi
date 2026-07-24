
function actualizarEstado(id_usuario){
	query('UPDATE usuario SET estado = 1 WHERE id_usuario=?', [id_usuario], 
		function (tx, response){
			if (response.rows.length >= 1) {		
                console.log('Estado de usuario actualizado.');		
			}
		}, function (tx, response) {
			console.log('Fallo el cambio de estado del usuario.');
			console.log(tx);
			console.log(response);
		}
	);
}

const checkSesionUsuario = () =>{
    query('SELECT * FROM usuario WHERE estado=?', [1], 
    function (tx, response){
        if (response.rows.length >= 1) {		
            console.log('Usuario Activo.');		
            console.log(response);

            var usuarioi = response.rows[0];
            sesionUsuario(usuarioi);        

            vista('home');

        }
    }, function (tx, response) {
        console.log('Fallo el cambio de estado del usuario.');
        console.log(tx);
        console.log(response);
    }
    );

}

const checkSesionUsuario2 = () =>{
    if(_SESSION('user')!=''&&_SESSION('pass')!='')
    {
        $('#user').val(_SESSION('email'));
        $('#pass').val(_SESSION('pass'));
        ingresarLogin();
    }
}

const loginOut = () =>{
    query('UPDATE usuario SET estado = 0', [], 
    function (tx, response){
        if (response.rowsAffected == 1) {
            console.log('Exito LoginOut');
            localStorage.clear();
        }else{
            console.log('problema al login out');
        }
    }, function (tx, response) {
        console.log('Fallo el cambio de estado del usuario.');
        console.log(tx);
        console.log(response);
    }
    );

}


const sesionUsuarioInit = (usuario,pass) => {

    //console.log(usuario);

    var usuarioi = {
        'id_usuario': usuario.id,
        'id_tipo_usuario': '',
        'email': usuario.email,
        'nombre': usuario.name,
        'apellido': '',
        'rut':  '',
        'avatar': '',
        'foto_perfil': usuario.foto_perfil || '',
        'sexo' : usuario.sexo || '',
        'pass':pass
    }
           
    sesionUsuario(usuarioi);
      actualizarHeaderUsuario();
    /*

    query('SELECT * FROM usuario WHERE id_usuario =?', [usuario.id], 
		function (tx, response){
            
			if (response.rows.length >= 1) {		                
                actualizarEstado(usuario.id);          
                
                var usuarioi = response.rows[0];
                sesionUsuario(usuarioi);        
            }else{

                query('INSERT INTO usuario (id_usuario,id_persona,nombre,apellido,rut,email,avatar,estado)VALUES(?,?,?,?,?,?,?,?)', [usuario.id,usuario.id_persona,usuario.persona.nombre,usuario.persona.apellido_materno,usuario.persona.rut,usuario.persona.email,'',1], 
                function (tx, response){
                    
                    if (response.rowsAffected == 1) {		                
                        console.log('Usuario Activado.');         

                        var usuarioi = {
                            'id': usuario.id,
                            'id_persona': usuario.id_persona,
                            'email': usuario.persona.email,
                            'nombre': usuario.persona.nombre,
                            'apellido': usuario.persona.apellido_materno,
                            'rut':  usuario.persona.rut,
                            'avatar': ''    
                        }
                               
                        sesionUsuario(usuarioi);
                    }else{
                        console.log('Problema al activar el usuario.');     
                    }
                    
                    }, function (tx, response) {
                        console.log('Fallo al activar el usuario.');
                        console.log(tx);
                        console.log(response);
                    }
                );
            }
            
		}, function (tx, response) {
			console.log('Fallo el cambio de estado del usuario.');
			console.log(tx);
			console.log(response);
		}
    );
    */
}

const sesionUsuario = (usuario) => {

    //console.log(usuario);

    const {id_usuario,id_persona,id_tipo_usuario,email,nombre,apellido,rut,avatar,foto_perfil,sexo,pass} = usuario;

    /*
    localStorage.setItem('id_usuario', id_usuario);
    localStorage.setItem('id_persona', id_persona); 
    localStorage.setItem('email', email); 
    localStorage.setItem('nombre', nombre); 
    localStorage.setItem('apellido', apellido); 
    localStorage.setItem('rut', rut);                        
    localStorage.setItem('avatar', avatar);    
    */
   setSession('id_usuario', id_usuario);
   //setSession('id_persona', id_persona);
   //setSession('id_tipo_usuario', id_tipo_usuario); 
   setSession('email', email); 
   setSession('nombre', nombre); 
   setSession('pass', pass); 

   
   //setSession('apellido', apellido); 
   //setSession('rut', rut);                        
   //setSession('avatar', avatar);
   setSession('foto_perfil',  foto_perfil);
    setSession('sexo',  sexo);
}

const cerrarSesion = () => {
    // La identidad física del teléfono no pertenece a la sesión del usuario.
    // Se conserva para poder asociar el mismo equipo a otra cuenta.
    const datosDispositivo = {
        uuid: localStorage.getItem('uuid'),
        model_device: localStorage.getItem('model_device'),
        fcmToken: localStorage.getItem('fcmToken')
    };

    localStorage.clear();

    Object.keys(datosDispositivo).forEach(function (clave) {
        if (datosDispositivo[clave]) {
            localStorage.setItem(clave, datosDispositivo[clave]);
        }
    });

    $('#user, #pass').val('');
    vista('login','slide');
}

const actualizarHeaderUsuario = () => {
    const nombre = _SESSION('nombre') || 'Usuario';
    const sexo = _SESSION('sexo') || 'O';
    var foto_perfil = _SESSION('foto_perfil') || '';
    if(foto_perfil=='') {
        if(sexo=='M'){
            foto_perfil = 'www/src/images/ejemplo_dr.jpg';
        }else if(sexo=='F'){
            foto_perfil = 'www/src/images/ejemplo_dra.jpg';
        }else{
            foto_perfil = 'www/src/images/ejemplo_dr.jpg';
        }
    }else{
        foto_perfil = 'https://med-sdi.cl/storage/'+foto_perfil;
    }

    // Actualizar el span del nombre en el header
    $('.header .row h2 span').text(nombre);
    $('.header .row h2 img').attr('src',foto_perfil);
}
