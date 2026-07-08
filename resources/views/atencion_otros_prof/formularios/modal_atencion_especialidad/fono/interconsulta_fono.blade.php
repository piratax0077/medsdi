<div id="modal_interfono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interfono" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">INTERCONSULTA </h5>
				<button type="button" class="close text-white" data-dismiss="modal" onclick="$('#modal_interfono').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Rut</label>
                        <input type="person" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Dirección</label>
                        <input type="address" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Región</label>
                        <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                        <option>Región de Valparaíso</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Comuna</label>
                        <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                        <option>Viña del Mar</option>
                        </select>
                    </div>
                </div>
                <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-interconsulta" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-modal active" id="pills-tab-inter-especialidad" data-toggle="pill" href="#pills-inter-especialidad" role="tab" aria-controls="pills-home" aria-selected="true">Interconsulta Especialidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modal" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Responder Interconsulta</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-interconsulta">
                    <div class="tab-pane fade show active" id="pills-inter-especialidad" role="tabpanel" aria-labelledby="pills-tab-inter-especialidad">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre especialidad o especialista</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Hipótesis diagnóstica</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Se desea saber</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                            </div>
                            <div class="col-sm-12 col-md-12 text-center mb-2">
                                <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            </div>
                            <div class="col-md-12 col-sm-12 text-center">
                            <hr><!--
                                <button type="button" class="btn btn-danger">Cancelar</button>
                                <button type="submit" class="btn btn-info">Guardar</button>-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label">Diagnóstico</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label">Tratamiento</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label">Comentario</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                </div>
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-5 col-md-5">
                                    <label class="floating-label">Nombre del profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-5 col-md-5">
                                    <label class="floating-label">Email</label>
                                    <input type="email" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Fecha de control</label>
                                    <input type="date" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="col-sm-6 col-md-6 text-center mb-2">
                                    <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"onclick="$('#modal_interfono').modal('hide')">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('modal_interfono');">Enviar al Paciente</button>
			</div>
		</div>
	</div>
</div>
<script>
    function interfono() {
        $('#modal_interfono').modal('show');
    }
     /** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function  envio_indicaciones_pdf(id_modal){
            let url = "{{ route('indicacion.medica.registro.envio') }}";
            var id_tipo_documento = 1;
            var id_paciente = $('#id_paciente_fc').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var observacion = '';
            // var observacion = $('#observacion').val();
            var documento = '';
            var url_documento = '';
            var cuerpo = '';
            var otro = '';
            var token = CSRF_TOKEN;

            if(id_tipo_documento == 1)
            {
                documento = $('#'+id_modal+' embed').attr('data-documento');
                url_documento = $('#'+id_modal+' embed').attr('data-url');
            }
            else
            {
                // cuerpo = $('#cuerpo').val();
            }
            var datos = {};
            datos._token = token;
            datos.id_tipo_documento = id_tipo_documento;
            datos.id_paciente = id_paciente;
            datos.id_profesional = id_profesional;
            datos.id_ficha_atencion = id_ficha_atencion;
            datos.id_lugar_atencion = id_lugar_atencion;
            datos.observacion = observacion;
            datos.documento = documento;
            datos.url = url_documento;
            datos.cuerpo = cuerpo;
            datos.otro = otro;

            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: datos,
                success: function(data) {
                    // console.log(data);
                    if(data.estado == 1)
                    {
                        var mensaje = '';
                        mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                        if(data.update_correo.estado == 1)
                            mensaje = 'Documento enviado por correo al Paciente.\n';
                        else
                            mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: mensaje,
                            icon: "success",
                        });
                    }
                    else
                    {
                        var texto_error = '';

                        if(data.estado ==  0)
                        {
                            if('error' in data)
                            {
                                $.each(data.error, function (indexInArray, valueOfElement) {
                                    texto_error += indexInArray+': '+valueOfElement+'\n';
                                });
                            }
                        }
                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });
                    }
                }
            });
        }
        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
</script>
