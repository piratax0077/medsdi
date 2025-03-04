<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        <label class="floating-label-activo-sm">Pieza N°</label>
                        <input type="text" class="form-control form-control-sm" name="numero_pieza_post_impl{{ $counter }}" id="numero_pieza_post_impl{{ $counter }}">
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Móvil</label>
                            <select name="estab_post_implante{{ $counter }}"  id="estab_post_implante{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estab_post_implante{{ $counter }}','div_estab_post_implante{{ $counter }}','obs_estab_post_implante{{ $counter }}',2);">
                                <option value="0">Seleccione</option>
                                <option value="1" selected>No</option>
                                <option value="2">Sí</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_estab_post_implante{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describa</label>
                            <textarea class="form-control form-control-sm" data-titulo=""  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estab_post_implante{{ $counter }}" id="obs_estab_post_implante{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Posición</label>
                            <select name="posc_post_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="posc_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('posc_post_impl{{ $counter }}','div_posc_post_impl{{ $counter }}','posc_post_vp{{ $counter }}',2);">
                                <option selected  value="1">Correcta</option>
                                <option value="2">Incorrecta(Describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_posc_post_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                            <input type="text"class="form-control form-control-sm" id="posc_post_vp{{ $counter }}">
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">vestíbulo-lingual</label>
                                <input type="text"class="form-control form-control-sm" id="posc_post_vl{{ $counter }}">
                            </div>
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Mesio-distal</label>
                                <input type="text"class="form-control form-control-sm" id="posc_post_md{{ $counter }}">
                            </div>
                            <div class="form-group mt-1">
                                <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                <input type="text"class="form-control form-control-sm" id="posc_post_cc{{ $counter }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Exposición de espiras</label>
                            <select name="exp_esp_post_impl{{ $counter }}"  id="exp_esp_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('exp_esp_post_impl{{ $counter }}','div_exp_esp_post_impl{{ $counter }}','obs_exp_esp_post_impl{{ $counter }}',2);">
                                <option value="0">Seleccione</option>
                                <option value="1" selected>No</option>
                                <option value="2">Sí</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_exp_esp_post_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describa</label>
                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_exp_esp_post_impl{{ $counter }}" id="obs_exp_esp_post_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Supuración</label>
                            <select name="sut_post_impl{{ $counter }}"  id="sut_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sut_post_impl{{ $counter }}','div_sut_post_impl{{ $counter }}','obs_sut_post_impl{{ $counter }}',2);">
                                <option value="0">Seleccione</option>
                                <option value="1" selected>No</option>
                                <option value="2">Sí</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_sut_post_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describa</label>
                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sut_post_impl{{ $counter }}" id="obs_sut_post_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Desgaste del implante</label>
                            <select name="desg_impl"  id="desg_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('desg_impl','div_desg_impl','obs_desg_impl',2);">
                                <option value="1">No</option>
                                <option value="2">Si(describa)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_desg_impl" style="display:none;">
                            <label class="floating-label-activo-sm">Describa otro</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_desg_impl" id="obs_desg_impl"></textarea>
                        </div>
                    </div> --}}
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Estado de la encía</label>
                            <select name="est_encia_post_impl{{ $counter }}" id="est_encia_post_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_encia_post_impl{{ $counter }}','div_est_encia_post_impl{{ $counter }}','obs_est_encia_post_impl{{ $counter }}',2);">
                                <option value="1">Normal</option>
                                <option value="2">Anormal(describa)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_est_encia_post_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describa anormal</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_encia_post_impl{{ $counter }}" id="obs_est_encia_post_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pérdida ósea marginal</label>
                            <input type="text" class="form-control form-control-sm" id="perd_osea_marg_post_impl{{ $counter }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones al control del implante</label>
                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_control_post_implante{{ $counter }}" id="obs_control_post_implante{{ $counter }}"></textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_post_impl()">X</button>
                <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_dental_post_impl({{ $counter }})"><i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>

</div>


<script>
    function ocultar_pieza_dental_post_impl(){
        $('#pieza_post_implantada').empty();
    }

    function guardar_pieza_dental_post_impl(counter){

        let numero_pieza = $('#numero_pieza_post_impl'+counter).val();

        let estab_post_implante = $('#estab_post_implante'+counter).val();
        let estab_post_implante_text = $('#estab_post_implante' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada

        if(estab_post_implante == 2){
            estab_post_implante_text = $('#obs_estab_post_implante'+counter).val();
        }

        let posc_post_impl = $('#posc_post_impl'+counter).val();
        let posc_post_impl_text = $('#posc_post_impl'+counter+' option:selected').text();
        if(posc_post_impl == 2){
            posc_post_impl_text = $('#obs_estab_post_implante'+counter).val();
        }

        let exp_esp_post_impl = $('#exp_esp_post_impl'+counter).val();
        let exp_esp_post_impl_text = $('#exp_esp_post_impl'+counter+' option:selected').text();
        if(exp_esp_post_impl == 2){
            exp_esp_post_impl_text = $('#obs_exp_esp_post_impl'+counter).val();
        }
        let sut_post_impl = $('#sut_post_impl'+counter).val();
        let sut_post_impl_text = $('#sut_post_impl' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(sut_post_impl == 2){
            sut_post_impl_text = $('#obs_sut_post_impl'+counter).val();
        }

        let est_encia_post_impl = $('#est_encia_post_impl'+counter).val();
        let est_encia_post_impl_text = $('#est_encia_post_impl' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada

        if(est_encia_post_impl == 2){
            est_encia_post_impl_text = $('#obs_est_encia_post_impl'+counter).val();
        }

        let perd_osea_marg_post_impl = $('#perd_osea_marg_post_impl'+counter).val();

        let obs_control_post_implante = $('#obs_control_post_implante'+counter).val();


        let valido = 1;
        let mensaje = '';

        if(numero_pieza == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }

        if(valido == 0){
            swal({
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
            return false;
        }

        let data = {
            numero_pieza: numero_pieza,
            estab_post_implante: estab_post_implante,
            estab_post_implante_text: estab_post_implante_text,
            posc_post_impl: posc_post_impl,
            posc_post_impl_text: posc_post_impl_text,
            exp_esp_post_impl: exp_esp_post_impl,
            exp_esp_post_impl_text: exp_esp_post_impl_text,
            est_encia_post_impl: est_encia_post_impl,
            est_encia_post_impl_text: est_encia_post_impl_text,
            sut_post_impl: sut_post_impl,
            sut_post_impl_text: sut_post_impl_text,
            est_encia_post_impl: est_encia_post_impl,
            est_encia_post_impl_text: est_encia_post_impl_text,
            perd_osea_marg_post_impl: perd_osea_marg_post_impl,
            obs_control_post_implante: obs_control_post_implante,
            id_paciente: dame_id_paciente(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_post_impl') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_pieza_post_implantada').empty();
                    $('#contenedor_pieza_post_implantada').append(resp.v);
                    $('#pieza_post_implantada').empty();
                }
            },
            error: function(error){
                console.log(error);
            }
        })

    }
</script>
