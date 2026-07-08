<div id="m_dieta_nutri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_dieta_nutri" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 text-uppercase" id="modal_eval_hab_preart">PLAN ALIMENTOS Y DIETA PARA: {{ $paciente->nombres }} {{ $paciente->apellido_uno }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <br />
            <div class="col-sm-12 mt-2">
				<div class="form-group fill">
					<label id="" name="" class="floating-label-activo-sm">DIETA DIARIA PARA:</label>
					<input type="text" class="form-control form-control-sm" name="dt_d_p_nomb" id="dt_d_p_nomb">
				</div>
			</div>
            <div class="modal-body">
                <form>
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono"> DESAYUNO</h6>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Incluya</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dt_d_p_inc_d" id="dt_d_p_inc_d"></textarea>
                            </div>
                        </div>
                       
                    </div>
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono"> MERIENDA</h6>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Incluya</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dt_d_p_inc_m" id="dt_d_p_inc_m"></textarea>
                            </div>
                        </div>

                    </div>
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono"> ALMUERZO</h6>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Incluya</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dt_d_p_inc_a" id="dt_d_p_inc_a"></textarea>
                            </div>
                        </div>

                    </div>
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">MEDIA TARDE</h6>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Incluya</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dt_d_p_inc_mt" id="dt_d_p_inc_mt"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">CENA</h6>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Incluya</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dt_d_p_inc_c" id="dt_d_p_inc_c"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">ALIMENTOS PROHIBIDOS</h6>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Incluyen</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dt_d_p_inc_ap" id="dt_d_p_inc_ap"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <H6 class="form_fono">PUEDE SUSTITUIR</h6>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="form-group fill">
                                    <label id="" name="" class="floating-label-activo-sm">Sustitución</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dt_d_p_inc_ps" id="dt_d_p_inc_ps"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div id="alimentacion_mensual" class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Recomendaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dt_d_p_inc_rec" id="dt_d_p_inc_rec"></textarea>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="generar_pdf_dieta()">Generar PDF</button>
                <button type="button" class="btn btn-info" onclick="guardarYEnviar()"> Guardar y enviar a paciente</button>
            </div>
        </div>
    </div>
</div>

<script>
    function guardarYEnviar() {
        // Lógica para guardar y enviar los datos del formulario
        console.log("Datos guardados y enviados al paciente.");
        let dieta_para = document.getElementById('dt_d_p_nomb').value;
        let desayuno = document.getElementById('dt_d_p_inc_d').value;
        let merienda = document.getElementById('dt_d_p_inc_m').value;
        let almuerzo = document.getElementById('dt_d_p_inc_a').value;
        let mediaTarde = document.getElementById('dt_d_p_inc_mt').value;
        let cena = document.getElementById('dt_d_p_inc_c').value;
        let alimentosProhibidos = document.getElementById('dt_d_p_inc_ap').value;
        let sustitucion = document.getElementById('dt_d_p_inc_ps').value;
        let recomendaciones = document.getElementById('dt_d_p_inc_rec').value;
        let id_profesional = document.getElementById('id_profesional_fc').value; // Asegúrate de tener este campo en tu formulario
        let id_paciente = document.getElementById('id_paciente_fc').value; // Asegúrate de tener este campo en tu formulario

        let valido = 1;
        let mensaje = "";
        if(dieta_para == "") {
            valido = 0;
            mensaje += "Debe ingresar el objetivo de la dieta.\n";
        }

        if (valido == 0) {
            swal({
                title: "Error",
                text: mensaje,
                icon: "error",
                button: "Aceptar",
            });
            return false;
        } else {
            let url = "{{ route('profesional.guardar_dieta_nutricional') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    dieta_para,
                    id_profesional,
                    id_paciente,
                    desayuno,
                    merienda,
                    almuerzo,
                    mediaTarde,
                    cena,
                    alimentosProhibidos,
                    sustitucion,
                    recomendaciones,
                    _token: CSRF_TOKEN
                },
                success: function (response) {
                    console.log(response);
                    swal({
                        title: "Éxito",
                        text: "Datos guardados correctamente.",
                        icon: "success",
                        button: "Aceptar",
                    });
                    $('#m_dieta_nutri').modal('hide'); // Cerrar el modal después de guardar
                },
                error: function (error) {
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al guardar los datos.",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            });
        }
    }

    function generar_pdf_dieta(){
        let id_profesional = document.getElementById('id_profesional_fc').value; // Asegúrate de tener este campo en tu formulario
        let id_paciente = document.getElementById('id_paciente_fc').value;
        let id_ficha_atencion = document.getElementById('id_fc').value; // Asegúrate de tener este campo en tu formulario

        let url = "{{ route('paciente.pdf.dieta') }}";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                id_profesional,
                id_paciente,
                id_ficha_atencion,
                _token: CSRF_TOKEN
            },
            success: function (response) {
                console.log(response);
                if (response.ruta) {
                    window.open(response.ruta, '_blank'); // Abre el PDF en una nueva pestaña
                    swal({
                        title: "Éxito",
                        text: "PDF generado correctamente.",
                        icon: "success",
                        button: "Aceptar",
                    });
                } else {
                    swal({
                        title: "Error",
                        text: "No se recibió la ruta del PDF.",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function (error) {
                swal({
                    title: "Error",
                    text: "Ocurrió un error al generar el PDF.",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    
    }
</script>

	
		

	


	
