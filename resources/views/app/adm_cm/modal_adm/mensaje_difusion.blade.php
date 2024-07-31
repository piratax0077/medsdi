<div id="mensaje_difusion" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mensaje Difusion</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div class="form-group">
                    <label for="de">De:</label>
                    <input type="text" class="form-control" id="de_difusion" name="de_difusion" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="para">Para:</label>

                    <select class="form-control form-control-sm" name="msj_para_difusion" id="msj_para_difusion" multiple="multiple">
                        <option value="0">A todos los roles</option>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>

                </div>
				<div class="form-group">
					<label for="titulo_msj">Título:</label>
					<input type="text" class="form-control" id="titulo_msj_difusion" name="titulo_msj_difusion" required>
				</div>
				<div class="form-group">
					<label for="detalle_msj">Asunto:</label>
					<textarea class="form-control" rows="3" id="detalle_msj_difusion" name="detalle_msj_difusion" required></textarea>
				</div>
				<div class="form-group">
					<label for="mensaje_msj">Mensaje:</label>
					<textarea class="form-control" rows="5" id="mensaje_msj_difusion" name="mensaje_msj_difusion" required></textarea>
				</div>
                <div class="form-group">
                    <div class="card-a">
                        <div class="card-header-a" id="img">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_elim_cicat_pre" aria-expanded="false" aria-controls="imagenes_elim_cicat_pre">
                                Adjuntar archivo
                            </button>
                        </div>
                        <div id="img_cons_dermato_pre-c" class="collapse show" aria-labelledby="img_cons_dermato_pre" data-parent="#img_cons_dermato_pre">
                            <div class="card-body-aten-a">
                                <!-- [ Main Content ] start -->
                                <div class="dropzone" id="mis-imagenes-cons-dermato-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                <!-- [ file-upload ] end -->
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" onclick="enviar_mensaje_difusion_confirmar()">Enviar</button>
			</div>
		</div>
	</div>
</div>

<script>
    var myDropzoneConsDermatoPre;
    function enviar_mensaje_difusion_confirmar(){
        var de = $('#de').val();
        var para = $('#msj_para_difusion').val();
        var titulo = $('#titulo_msj_difusion').val();
        var detalle = $('#detalle_msj_difusion').val();
        var mensaje = $('#mensaje_msj_difusion').val();
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
            url: "{{ route('mensaje_difusion') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                de: de,
                para: para,
                titulo: titulo,
                detalle: detalle,
                mensaje: mensaje
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: "Mensaje Enviado",
                        text: "El mensaje ha sido enviado correctamente",
                        icon: "success",
                    })
                    $('#mensaje_difusion').modal('hide');
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
