<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="form-row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm" name="n_pieza_pfu{{ $counter }}" id="n_pieza_pfu{{ $counter }}">
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Toma de medida y envío a laboratorio</label>
                            <select name="corona_toma_imp_pfu{{ $counter }}" id="corona_toma_imp_pfu{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('corona_toma_imp_pfu{{ $counter }}','div_corona_toma_imp_pfu{{ $counter }}','det_corona_toma_imp_pfu{{ $counter }}',2)">
                                <option value="0">Seleccione</option>
                                <option value="1">No</option>
                                <option value="2">Si</option>

                            </select>
                        </div>
                        <div class="form-group"   id="div_corona_toma_imp_pfu{{ $counter }}" style="display:none">
                            <label class="floating-label-activo-sm">Nombre Paciente</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_paciente_pfu{{ $counter }}" id="nombre_paciente_pfu{{ $counter }}">
                            <div class="form-group mt-3">
                                <label class="floating-label-activo-sm">Laboratorio</label>
                                <input type="text" class="form-control form-control-sm" name="lab_pfu{{ $counter }}" id="lab_pfu{{ $counter }}">
                            </div>
                            <div class="form-group mt-3">
                                <label class="floating-label-activo-sm">Numero de orden</label>
                                <input type="text" class="form-control form-control-sm" name="n_orden_pfu{{ $counter }}" id="n_orden_pfu{{ $counter }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Prueba de ajuste</label>
                            <select name="prueba_ajuste_cor_pfu{{ $counter }}"  id="prueba_ajuste_cor_pfu{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prueba_ajuste_cor_pfu{{ $counter }}','div_prueba_ajuste_cor_pfu{{ $counter }}','obs_prueba_ajuste_cor_pfu{{ $counter }}',2);">
                                <option selected  value="1">Buena </option>
                                <option value="2">No devuelta a laboratorio</option>

                            </select>
                        </div>
                        <div class="form-group" id="div_prueba_ajuste_cor_pfu{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Otro describa</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prueba_ajuste_cor_pfu{{ $counter }}" id="obs_prueba_ajuste_cor_pfu{{ $counter }}"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pulido</label>
                            <select name="pulido_ajuste_pfu{{ $counter }}" id="pulido_ajuste_pfu{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pulido_ajuste_pfu{{ $counter }}','div_pulido_ajuste_pfu{{ $counter }}','det_pulido_ajuste_pfu{{ $counter }}',2)">
                                <option value="0">Seleccione</option>
                                <option value="1">Satisfactorio</option>
                                <option value="2">Deficiente se cita a control</option>

                            </select>
                        </div>
                        <div class="form-group"   id="div_pulido_ajuste_pfu{{ $counter }}" style="display:none">
                            <label class="floating-label-activo-sm">Detalle <i>(describir)</i></label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_pulido_ajuste_pfu{{ $counter }}" id="det_pulido_ajuste_pfu{{ $counter }}"></textarea>
                        </div>
                    </div>


                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aprec_pfu{{ $counter }}" id="aprec_pfu{{ $counter }}"></textarea>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-danger btn-icon" onclick="ocultar_pieza_dental_pfu()">X</button>
        <button type="button" class="btn btn-primary btn-icon" onclick="guardar_pieza_dental_pfu({{ $counter }})"><i class="fas fa-save"></i></button>
    </div>
</div>

<script>
    function ocultar_pieza_dental_pfu(){
        $('#nueva_pieza_dental').empty();
    }

    function guardar_pieza_dental_pfu(counter){
        var n_pieza_pfu = $('#n_pieza_pfu'+counter).val();
        var corona_toma_imp_pfu = $('#corona_toma_imp_pfu'+counter).val();
        var corona_toma_imp_pfu_text = $('#corona_toma_imp_pfu'+counter+' option:selected').text();
        if(corona_toma_imp_pfu == 2){
            var nombre_paciente_pfu = $('#nombre_paciente_pfu'+counter).val();
            var lab_pfu = $('#lab_pfu'+counter).val();
            var n_orden_pfu = $('#n_orden_pfu'+counter).val();
        }
        var prueba_ajuste_cor_pfu = $('#prueba_ajuste_cor_pfu'+counter).val();
        var prueba_ajuste_cor_pfu_text = $('#prueba_ajuste_cor_pfu'+counter+' option:selected').text();
        if(prueba_ajuste_cor_pfu == 2){
            var obs_prueba_ajuste_cor_pfu = $('#obs_prueba_ajuste_cor_pfu'+counter).val();
        }
        var pulido_ajuste_pfu = $('#pulido_ajuste_pfu'+counter).val();
        var pulido_ajuste_pfu_text = $('#pulido_ajuste_pfu'+counter+' option:selected').text();
        if(pulido_ajuste_pfu == 2){
            var det_pulido_ajuste_pfu = $('#det_pulido_ajuste_pfu'+counter).val();
        }
        var aprec_pfu = $('#aprec_pfu'+counter).val();

        var valido = 1;
        var mensaje = '';

        if(n_pieza_pfu == ''){
            mensaje += '<li>Debe ingresar el número de pieza dental</li>';
            valido = 0;
        }

        if(corona_toma_imp_pfu == 0){
            mensaje += '<li>Debe seleccionar si se tomo la corona o no</li>';
            valido = 0;
        }

        if(corona_toma_imp_pfu == 2){
            if(nombre_paciente_pfu == ''){
                mensaje += '<li>Debe ingresar el nombre del paciente</li>';
                valido = 0;
            }

            if(lab_pfu == ''){
                mensaje += '<li>Debe ingresar el laboratorio</li>';
                valido = 0;
            }

            if(n_orden_pfu == ''){
                mensaje += '<li>Debe ingresar el número de orden</li>';
                valido = 0;
            }
        }

        if(prueba_ajuste_cor_pfu == 0){
            mensaje += '<li>Debe seleccionar la prueba de ajuste</li>';
            valido = 0;
        }

        if(prueba_ajuste_cor_pfu == 2){
            if(obs_prueba_ajuste_cor_pfu == ''){
                mensaje += '<li>Debe ingresar la observación de la prueba de ajuste</li>';
                valido = 0;
            }
        }

        if(pulido_ajuste_pfu == 0){
            mensaje += '<li>Debe seleccionar el pulido</li>';
            valido = 0;
        }

        if(pulido_ajuste_pfu == 2){
            if(det_pulido_ajuste_pfu == ''){
                mensaje += '<li>Debe ingresar el detalle del pulido</li>';
                valido = 0;
            }
        }

        if(aprec_pfu == ''){
            mensaje += '<li>Debe ingresar la apreciación</li>';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title:'Campos requeridos',
                content:{
                    element:'span',
                    attributes:{
                        innerHTML:mensaje
                    }
                },
                icon:'warning'
            });
            return false;
        }

        var data = {
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            n_pieza_pfu: n_pieza_pfu,
            corona_toma_imp_pfu: corona_toma_imp_pfu,
            corona_toma_imp_pfu_text: corona_toma_imp_pfu_text,
            nombre_paciente_pfu: nombre_paciente_pfu,
            lab_pfu: lab_pfu,
            n_orden_pfu: n_orden_pfu,
            prueba_ajuste_cor_pfu: prueba_ajuste_cor_pfu,
            prueba_ajuste_cor_pfu_text: prueba_ajuste_cor_pfu_text,
            obs_prueba_ajuste_cor_pfu: obs_prueba_ajuste_cor_pfu,
            pulido_ajuste_pfu: pulido_ajuste_pfu,
            pulido_ajuste_pfu_text: pulido_ajuste_pfu_text,
            det_pulido_ajuste_pfu: det_pulido_ajuste_pfu,
            aprec_pfu: aprec_pfu,
            _token: CSRF_TOKEN
        }

        console.log(data);

        $.ajax({
            url: "{{ route('profesional.adm_dental.guardar_pieza_dental_pfu') }}",
            type: "POST",
            data: data,
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title:'Pieza guardada',
                        text:'La pieza dental ha sido guardada correctamente',
                        icon:'success'
                    });
                    $('#contenedor_piezas_dentales_pfu').empty();
                    $('#contenedor_piezas_dentales_pfu').append(response.v);
                    $('#nueva_pieza_dental').empty();
                }else{
                    alert('Error al guardar la pieza');
                }
            }
        });
    }
</script>

