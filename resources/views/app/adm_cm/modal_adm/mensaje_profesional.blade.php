<div id="mensaje_profesional" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mensaje Profesional</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div class="form-group fill">
                    <label class="floating-label-activo-sm" for="de">De:</label>
                    <input type="text" class="form-control" id="de" name="de" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group fill">
                    <label class="floating-label-activo-sm" for="para">Para:</label>
                    <input type="text" name="para_destino" class="form-control" id="para_destino" value="" readonly>
                </div>
				<div class="form-group fill">
					<label class="floating-label-activo-sm" for="titulo">Título:</label>
					<input type="text" class="form-control" id="titulo_a_profesional" name="titulo_a_profesional" required>
				</div>
				<div class="form-group fill">
					<label class="floating-label-activo-sm" for="detalle">Asunto:</label>
					<textarea class="form-control" rows="3" id="detalle_a_profesional" name="detalle_a_profesional" required></textarea>
				</div>
				<div class="form-group fill">
					<label class="floating-label-activo-sm" for="mensaje">Mensaje:</label>
					<textarea class="form-control" rows="5" id="mensaje_a_profesional" name="mensaje_a_profesional" required></textarea>
				</div>
                <div class="form-group">
                    <div class="card-a">
                        <div class="card-header-a" id="img">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_elim_cicat_pre" aria-expanded="false" aria-controls="imagenes_elim_cicat_pre">
                                Adjuntar archivo
                            </button>
                        </div>

                        <div class="card-body-aten-a">
                            <!-- [ Main Content ] start -->
                            <div class="dropzone" id="mis-archivos-a-profesional" action="{{ route('profesional.archivo.carga') }}"></div>
                            <!-- [ file-upload ] end -->
                        </div>

                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" id="submit-all-profesional" class="btn btn-primary" onclick="enviar_mensaje_a_profesional()">Enviar</button>
			</div>
		</div>
	</div>
</div>

<script>
    function enviar_mensaje_a_profesional(){
        var de = $('#de').val();
        var para = $('#para_destino').val();
        var titulo = $('#titulo_a_profesional').val();
        var detalle = $('#detalle_a_profesional').val();
        var mensaje = $('#mensaje_a_profesional').val();

        var valido = 1;
        var msj = '';

        if(titulo == ''){
            valido = 0;
            msj += 'Debe ingresar un título <br>';
        }

        if(detalle == ''){
            valido = 0;
            msj += 'Debe ingresar un asunto <br>';
        }

        if(mensaje == ''){
            valido = 0;
            msj += 'Debe ingresar un mensaje <br>';
        }

        if (valido == 0) {
            swal({
                title: "Error",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: msj
                    },
                },
                icon: "error",
            });
            return;
        }

        // Validar que al menos exista un archivo
        var dropzoneInstance = window.dropzoneProfesional;

        if (!dropzoneInstance) {
            swal({
                title: "Error",
                text: "El sistema de carga de archivos no está disponible. Por favor, recargue la página.",
                icon: "error",
            });
            return;
        }

        var files = dropzoneInstance.files;

        if(files.length == 0){
            swal({
                title: "Advertencia",
                text: "No ha adjuntado ningún archivo. ¿Desea continuar sin archivos?",
                icon: "warning",
                buttons: ["Cancelar", "Continuar"],
            }).then((continuar) => {
                if (continuar) {
                    enviarMensajeSinArchivos();
                }
            });
            return;
        }

        // Eliminar listeners previos para evitar duplicados
        dropzoneInstance.off('sending');
        dropzoneInstance.off('success');
        dropzoneInstance.off('error');
        dropzoneInstance.off('complete');
        dropzoneInstance.off('queuecomplete');

        var archivosSubidos = 0;
        var totalArchivos = files.length;
        var erroresEncontrados = [];
        var archivosGuardados = []; // Array para guardar los nombres de archivos subidos

        console.log('Iniciando proceso de subida de archivos. Total:', totalArchivos);

        // Configurar el dropzone para enviar datos adicionales
        dropzoneInstance.on('sending', function(file, xhr, formData) {
            console.log('→ SENDING - Enviando archivo:', file.name);
        });

        dropzoneInstance.on('success', function(file, response) {
            console.log('→ SUCCESS - Archivo subido:', file.name);
            console.log('→ SUCCESS - Respuesta completa:', response);
            archivosSubidos++;
            console.log('→ SUCCESS - Contador actualizado:', archivosSubidos, '/', totalArchivos);

            // Guardar el nombre del archivo temporal que devuelve el servidor
            if (response && response.archivo && response.archivo.nombre_archivo) {
                archivosGuardados.push(response.archivo.nombre_archivo);
                console.log('→ SUCCESS - Archivo guardado en array:', response.archivo.nombre_archivo);
                console.log('→ SUCCESS - Array actual:', archivosGuardados);
            } else {
                console.warn('→ SUCCESS - No se pudo extraer nombre_archivo de la respuesta');
            }
        });

        dropzoneInstance.on('complete', function(file) {
            console.log('→ COMPLETE - Archivo completado:', file.name, 'Status:', file.status);

            // Verificar si ya se completaron todos los archivos
            var archivosCompletados = dropzoneInstance.files.filter(f => f.status === 'success' || f.status === 'error').length;
            console.log('→ COMPLETE - Archivos completados:', archivosCompletados, '/', totalArchivos);

            if (archivosCompletados === totalArchivos) {
                console.log('→ COMPLETE - TODOS LOS ARCHIVOS COMPLETADOS, ejecutando lógica final...');
                ejecutarEnvioMensaje();
            }
        });

        dropzoneInstance.on('error', function(file, errorMessage, xhr) {
            console.error('Error al subir archivo:', {
                archivo: file.name,
                error: errorMessage,
                xhr: xhr
            });

            var mensajeError = file.name + ': ';

            if (errorMessage && typeof errorMessage === 'object') {
                if (errorMessage.message) {
                    mensajeError += errorMessage.message;
                } else if (errorMessage.errors) {
                    mensajeError += 'Error de validación';
                }
            } else {
                mensajeError += errorMessage || 'Error desconocido';
            }

            erroresEncontrados.push(mensajeError);
        });

        // Función para enviar el mensaje después de que todos los archivos se procesaron
        function ejecutarEnvioMensaje() {
            console.log('=== EJECUTANDO ENVIO DE MENSAJE ===');
            console.log('Archivos subidos:', archivosSubidos);
            console.log('Total archivos:', totalArchivos);
            console.log('Archivos guardados:', archivosGuardados);
            console.log('Errores encontrados:', erroresEncontrados);
            console.log('===================================');

            if (erroresEncontrados.length > 0) {
                swal({
                    title: "Error al subir archivos",
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: '<ul style="text-align: left;">' +
                                erroresEncontrados.map(e => '<li>' + e + '</li>').join('') +
                                '</ul>'
                        }
                    },
                    icon: "error",
                });
                // Resetear contadores
                archivosSubidos = 0;
                erroresEncontrados = [];
                archivosGuardados = [];
            } else if (archivosSubidos === totalArchivos && archivosGuardados.length > 0) {
                console.log('Enviando mensaje al servidor...');
                // Ahora enviar el mensaje con los archivos subidos
                $.ajax({
                    url: "{{ route('mensaje_profesional') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        de: de,
                        para: para,
                        titulo: titulo,
                        detalle: detalle,
                        mensaje: mensaje,
                        id_profesional_mensaje: $('#id_profesional_mensaje').val(),
                        archivos: archivosGuardados, // Enviar array de archivos subidos
                    },
                    success: function(response){
                        console.log('Respuesta del servidor:', response);
                        if(response.estado == 1){
                            swal({
                                title: "Mensaje Enviado",
                                text: "El mensaje y los archivos (" + archivosGuardados.length + ") han sido enviados correctamente",
                                icon: "success",
                            }).then(() => {
                                limpiarFormularioMensajeProfesional();
                                $('#mensaje_profesional').modal('hide');
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: response.msj || "Error al guardar el mensaje",
                                icon: "error",
                            });
                        }
                        // Resetear contadores
                        archivosSubidos = 0;
                        erroresEncontrados = [];
                        archivosGuardados = [];
                    },
                    error: function(xhr, status, error) {
                        console.error('Error AJAX al guardar mensaje:', xhr.responseText);
                        console.error('Status:', status);
                        console.error('Error:', error);
                        swal({
                            title: "Error",
                            text: "Ha ocurrido un error al guardar el mensaje",
                            icon: "error",
                        });
                        // Resetear contadores
                        archivosSubidos = 0;
                        erroresEncontrados = [];
                        archivosGuardados = [];
                    }
                });
            } else {
                console.warn('No se cumplió la condición para enviar el mensaje');
                console.warn('archivosSubidos:', archivosSubidos, 'totalArchivos:', totalArchivos);
                console.warn('archivosGuardados.length:', archivosGuardados.length);
            }
        }

        // Procesar la cola de archivos
        dropzoneInstance.processQueue();
    }

    function enviarMensajeSinArchivos() {
        $.ajax({
            url: "{{ route('mensaje_profesional') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                de: $('#de').val(),
                para: $('#para_destino').val(),
                titulo: $('#titulo_a_profesional').val(),
                detalle: $('#detalle_a_profesional').val(),
                mensaje: $('#mensaje_a_profesional').val(),
                id_profesional_mensaje: $('#id_profesional_mensaje').val(),
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: "Mensaje Enviado",
                        text: "El mensaje ha sido enviado correctamente",
                        icon: "success",
                    }).then(() => {
                        limpiarFormularioMensajeProfesional();
                        $('#mensaje_profesional').modal('hide');
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.msj || "Ha ocurrido un error al enviar el mensaje",
                        icon: "error",
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
                swal({
                    title: "Error",
                    text: "Ha ocurrido un error en la comunicación con el servidor",
                    icon: "error",
                });
            }
        });
    }

    function limpiarFormularioMensajeProfesional() {
        $('#titulo_a_profesional').val('');
        $('#detalle_a_profesional').val('');
        $('#mensaje_a_profesional').val('');
        $('#id_profesional_mensaje').val('');
        if (window.dropzoneProfesional) {
            window.dropzoneProfesional.removeAllFiles(true);
        }
    }
</script>
