<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-row">
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group fill">
                    <label class="floating-label-activo-sm">Pieza N°</label>
                    <input type="text" class="form-control form-control-sm" name="historia_pza" id="historia_pza" value="3.2">
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <div class="form-group fill">
                    <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                    <select name="perdida" id="perdida" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('perdida','div_perdida','obs_perdida',3);">
                        <option selected="" value="1">Espontánea</option>
                        <option value="2">Extracción por Urgencia</option>
                        <option value="3">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_perdida" style="display:none;">
                    <label class="floating-label-activo-sm">Otro motivo</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida" id="obs_perdida"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <div class="form-group fill">
                    <label class="floating-label-activo-sm">Años</label>
                    <select name="anos_perd" id="anos_perd" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anos_perd','div_anos_perd','obs_anos_perd',4);">
                        <option selected="" value="1">< 1 año</option>
                        <option value="2">2 años</option>
                        <option value="3">3 años</option>
                        <option value="4">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_anos_perd" style="display:none;">
                    <label class="floating-label-activo-sm">Años</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd" id="obs_anos_perd"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
            <label class="floating-label-activo-sm">Observaciones Pérdida</label>
            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral" id="obs_ex_oral"></textarea>
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_hist()">X</button>
    <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_hist({{ $counter }})"><i class="fas fa-save"></i></button>
</div>

<script>
    function ocultar_pieza_hist() {
        $('#contenedor_piezas_hist').empty();
    }

    function guardar_pieza_hist() {
        let pieza = $('#historia_pza').val();
        let perdida = $('#perdida').val(); // Obtiene el value del select
        let perdida_texto = $('#perdida option:selected').text(); // Obtiene el texto
        let tiempo = $('#anos_perd').val();
        let tiempo_texto = $('#anos_perd option:selected').text();
        let observaciones = $('#obs_ex_oral').val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();

        // Si la opción seleccionada es "Otro describir", usa el valor del textarea
        if (perdida == "3") {
            perdida_texto = $('#obs_perdida').val().trim(); // Toma el texto ingresado
        }
        if(tiempo == "4"){
            tiempo_texto = $('#obs_anos_perd').val().trim();
        }

        let valido = 1;
        let mensaje = '';

        if (pieza == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar el número de pieza</li>';
        }
        if (perdida == "3" && perdida_texto == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar el motivo de la pérdida</li>';
        }
        if (tiempo == 0) {
            valido = 0;
            mensaje += '<li>Debe indicar el tiempo en años de pérdida</li>';
        }

        if (valido == 1) {
            let data = {
                id_lugar_atencion:id_lugar_atencion,
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                pieza: pieza,
                perdida: perdida, // Value de la opción seleccionada
                perdida_texto: perdida_texto, // Texto del select o el valor del input
                tiempo: tiempo,
                tiempo_texto: tiempo_texto,
                observaciones: observaciones,
                _token: CSRF_TOKEN
            }

            console.log(data); // Aquí puedes ver el resultado antes de enviarlo
            let url = "{{ ROUTE('profesional.guardar_pieza_examen_pieza_hist') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(resp){
                    console.log(resp);
                    if(resp.mensaje == 'OK'){
                        $('#hist_piezas').empty();
                        $('#hist_piezas').append(resp.v);

                        let examenes = resp.examenes;
                        examenes.forEach(examen => {
                            $('#planificacion_examenes_gral').append(
                                `<div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                    <option selected="" value="1">Uniradicular</option>
                                                    <option value="2">Biradicular</option>
                                                    <option value="2">Triradicular</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Convenio</label>
                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                    <option selected="" value="1">Convenio</option>
                                                    <option value="2">Sin Convenio</option>
                                                </select>
                                            </div>
                                        </div>

                                </div>
                    `
                            );
                        });
                        // si es 1 es examen general
                        swal({
                            title: "Pieza dental guardada",
                            text: "La pieza dental para examen ha sido guardada correctamente.",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });

                    }
                },
                error: function(error){
                    console.log(error);
                    return swal({
                        title: "Error al guardar",
                        text: "Ha ocurrido un error al guardar los datos.",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                dangerMode: true,
            });
        }
    }

</script>
