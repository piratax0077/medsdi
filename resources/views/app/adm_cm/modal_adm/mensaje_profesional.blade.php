<div id="mensaje_profesional" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mensaje Profesional</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div class="form-group">
                    <label for="de">De:</label>
                    <input type="text" class="form-control" id="de" name="de" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="para">Para:</label>
                    <input type="text" name="para_destino" class="form-control" id="para_destino" value="" readonly>
                </div>
				<div class="form-group">
					<label for="titulo">Título:</label>
					<input type="text" class="form-control" id="titulo" name="titulo" required>
				</div>
				<div class="form-group">
					<label for="detalle">Asunto:</label>
					<textarea class="form-control" rows="3" id="detalle" name="detalle" required></textarea>
				</div>
				<div class="form-group">
					<label for="mensaje">Mensaje:</label>
					<textarea class="form-control" rows="5" id="mensaje" name="mensaje" required></textarea>
				</div>
                <div class="form-group">
                    <div class="card-a">
                        <div class="card-header-a" id="img">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_elim_cicat_pre" aria-expanded="false" aria-controls="imagenes_elim_cicat_pre">
                                Adjuntar archivo
                            </button>
                        </div>
                        <div id="archivos-msj-profesional-c" class="collapse show" aria-labelledby="archivosMsjProfesional" data-parent="#archivosMsjProfesional">
                            <div class="card-body-aten-a">
                                <!-- [ Main Content ] start -->
                                <div class="dropzone" id="archivosMsjProfesional-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                <!-- [ file-upload ] end -->
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" onclick="enviar_mensaje_a_profesional()">Enviar</button>
			</div>
		</div>
	</div>
</div>

<script>
    function enviar_mensaje_a_profesional(){
        var de = $('#de').val();
        var para = $('#para').val();
        var titulo = $('#titulo').val();
        var detalle = $('#detalle').val();
        var mensaje = $('#mensaje').val();
        if(para == ''){
            swal({
                title: "Error",
                text: "Debe seleccionar un Profesional",
                icon: "error",
            })
            return false;
        }
        if(titulo == ''){
            swal({
                title: "Error",
                text: "Debe ingresar un Título",
                icon: "error",
            })
            return false;
        }
        if(detalle == ''){
            swal({
                title: "Error",
                text: "Debe ingresar un Detalle del Mensaje",
                icon: "error",
            })
            return false;
        }
        if(mensaje == ''){
            swal({
                title: "Error",
                text: "Debe ingresar un Mensaje",
                icon: "error",
            })
            return false;
        }
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
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: "Mensaje Enviado",
                        text: "El mensaje ha sido enviado correctamente",
                        icon: "success",
                    })
                    $('#mensaje_profesional').modal('hide');
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al enviar el mensaje",
                        icon: "error",
                    })
                }
            }
        });
    }
</script>
