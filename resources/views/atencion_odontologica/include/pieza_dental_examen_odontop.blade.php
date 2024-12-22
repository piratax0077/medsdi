<div id="pieza_dental_dolor" class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-row">
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <label class="floating-label-activo-sm">Pieza N°</label>
                <input type="text" class="form-control form-control-sm" name="pieza_dental_odontop{{ $counter }}" id="pieza_dental_odontop{{ $counter }}">
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Tipo de Dolor</label>
                    <select name="tipo_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="tipo_dolor_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_dolor{{ $counter }}','div_tipo_dolor{{ $counter }}','obs_tipo_dolor{{ $counter }}',3);">
                        <option selected  value="1">Espontáneo</option>
                        <option value="2">Provocado</option>
                        <option value="3">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_tipo_dolor{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Tipo de dolor</label>
                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor" id="obs_tipo_dolor"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Intensidad</label>
                    <select name="intensidad" data-titulo="Ex_cuello" data-seccion="Cuello"  id="intensidad_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad_odontop{{ $counter }}','div_intensidad{{ $counter }}','obs_intensidad{{ $counter }}',4);">
                        <option selected  value="1">Leve</option>
                        <option value="2">Moderado</option>
                        <option value="3">Intenso</option>
                        <option value="4">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_intensidad{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Intensidad</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $counter }}" id="obs_intensidad{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Modo dolor</label>
                    <select name="modo_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="modo_dolor_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor{{ $counter }}','div_modo_dolor{{ $counter }}','obs_modo_dolor{{ $counter }}',3);">
                        <option selected  value="1">Pulsátil</option>
                        <option value="2">Permanente</option>
                        <option value="3">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_modo_dolor{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Modo dolor</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $counter }}" id="obs_modo_dolor{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Localización</label>
                    <select name="loc_dolor" data-titulo="Ex_cuello" data-seccion="Cuello"  id="loc_dolor_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor_odontop{{ $counter }}','div_loc_dolor{{ $counter }}','obs_loc_dolor{{ $counter }}',3);">
                        <option selected  value="1">Localizado</option>
                        <option value="2">Referido</option>
                        <option value="3">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_loc_dolor{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Localización</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $counter }}" id="obs_loc_dolor{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                    <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor_odontop{{ $counter }}','div_provocacion_dolor{{ $counter }}','obs_provocacion_dolor{{ $counter }}',5);">
                        <option selected  value="1">Frío</option>
                        <option value="2">Calor</option>
                        <option value="3">Actividad</option>
                        <option value="4">Masticación</option>
                        <option value="5">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_provocacion_dolor{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Provocación del Dolor</label>
                    <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $counter }}" id="obs_provocacion_dolor{{ $counter }}"></textarea>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Cuando duele</label>
                    <select name="cdo_duele" data-titulo="Ex_cuello" data-seccion="Cuello"  id="cdo_duele_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cdo_duele{{ $counter }}','div_cdo_duele{{ $counter }}','obs_cdo_duele{{ $counter }}',3);">
                        <option selected  value="1">Palpación</option>
                        <option value="2">Decubito</option>
                        <option value="3">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_cdo_duele{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Cuando duele</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele{{ $counter }}" id="obs_cdo_duele{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Tpo Evolución</label>
                    <select name="tpo_evolucion" data-titulo="Ex_cuello" data-seccion="Cuello"  id="tpo_evolucion_odontop{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_evolucion_odontop{{ $counter }}','div_tpo_evolucion{{ $counter }}','obs_tpo_evolucion{{ $counter }}',3);">
                        <option selected  value="1">Menos de 1 Semana</option>
                        <option value="2">Más de 1 Semana</option>
                        <option value="3">Otro describir</option>
                    </select>
                </div>
                <div class="form-group" id="div_tpo_evolucion{{ $counter }}" style="display:none;">
                    <label class="floating-label-activo-sm">Tpo Evolución</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucion{{ $counter }}" id="obs_tpo_evolucion{{ $counter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Efecto Analgésicos</label>
                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor_odontop{{ $counter }}" id="obs_loc_dolor_odontop{{ $counter }}"></textarea>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_dolor_odontop()">X</button>
                    <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_dental_dolor_odontop({{ $counter }})"><i class="fas fa-save"></i></button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function ocultar_pieza_dental_dolor_odontop(){
        $('#nueva_pieza_dental_odontop').empty();
    }

    function guardar_pieza_dental_dolor_odontop(count){
        let derivado_por = $('#derivado_por_odontop').val();
        let zona_dolor = $('#zona_dolor_odontop').val();
        let historia_anterior = $('#historia_anterior_odontop').val();


        let pieza_dental_odontop = $('#pieza_dental_odontop'+count).val();
        let tipo_dolor_odontop = $('#tipo_dolor_odontop'+count).val();
        let intensidad_odontop = $('#intensidad_odontop'+count).val();
        let modo_dolor_odontop = $('#modo_dolor_odontop'+count).val();
        let loc_dolor_odontop = $('#loc_dolor_odontop'+count).val();
        let provocacion_dolor = $('#provocacion_dolor_odontop'+count).val();
        let cdo_duele_odontop = $('#cdo_duele_odontop'+count).val();
        let tpo_evolucion_odontop = $('#tpo_evolucion_odontop'+count).val();
        let obs_loc_dolor_odontop = $('#obs_loc_dolor_odontop'+count).val();

        let valido = 1;
        let mensaje = '';
        if(derivado_por == ''){
            valido = 0;
            mensaje += 'Debe seleccionar un derivado por.\n';
        }
        if(zona_dolor == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una zona del dolor.\n';
        }
        if(historia_anterior == ''){
            valido = 0;
            mensaje += 'Debe seleccionar un historial anterior.\n';
        }
        if(pieza_dental_odontop == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una pieza dental.\n';
        }
        if(tipo_dolor_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar un tipo de dolor.\n';
        }
        if(intensidad_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar una intensidad del dolor.\n';
        }
        if(modo_dolor_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar un modo del dolor.\n';
        }
        if(loc_dolor_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar una localización del dolor.\n';
        }
        if(provocacion_dolor == 0){
            valido = 0;
            mensaje += 'Debe seleccionar una provocación del dolor.\n';
        }
        if(cdo_duele_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar cuando duele.\n';
        }
        if(tpo_evolucion_odontop == 0){
            valido = 0;
            mensaje += 'Debe seleccionar el tipo de evolución.\n';
        }
        if(obs_loc_dolor_odontop == ''){
            valido = 0;
            mensaje += 'Debe describir el efecto analgésicos.\n';
        }

        if(valido == 0){
            return swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza: pieza_dental_odontop,
            tipo_dolor: tipo_dolor_odontop,
            intensidad: intensidad_odontop,
            modo_dolor: modo_dolor_odontop,
            loc_dolor: loc_dolor_odontop,
            provocacion_dolor: provocacion_dolor,
            cdo_duele: cdo_duele_odontop,
            tpo_evolucion: tpo_evolucion_odontop,
            obs_loc_dolor: obs_loc_dolor_odontop,
            derivado_por: derivado_por,
            zona_dolor: zona_dolor,
            historia_anterior: historia_anterior,
            id_paciente: dame_id_paciente(),
            id_profesional: $('#id_profesional_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            tipo_examen: 'odontopediatria',
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_odontp_dolor') }}";

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if(response.mensaje == 'OK'){
                    $('#contenedor_pieza_dental_od_general').empty();
                    $('#contenedor_pieza_dental_od_general').append(response.v);
                    $('#nueva_pieza_dental_odontop').empty();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        })
    }
</script>
