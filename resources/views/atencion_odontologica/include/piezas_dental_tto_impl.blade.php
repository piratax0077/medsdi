<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        <label class="floating-label-activo-sm">Pieza N°</label>
                        <input type="text" class="form-control form-control-sm" name="numero_pieza_tto_impl{{ $counter }}" id="numero_pieza_tto_impl{{ $counter }}">
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                            <select name="tpo_proc_imp{{ $counter }}" data-titulo="tpo_proc_imp" data-seccion="Implante"  id="tpo_proc_imp{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_imp{{ $counter }}','div_tpo_proc_imp{{ $counter }}','obs_tpo_proc_impo{{ $counter }}',10);">
                                <option selected  value="1">Anclaje de precisión s/implantes</option>
                                <option value="2">Anclaje de presición sobre Implante</option>
                                <option value="3">Barra para prótesis sobre Implante</option>
                                <option value="4">Cirugía Periimplantaria de manejo de tejidos blandos, por sitio</option>
                                <option value="5">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                <option value="6">Conexión de Implante (No incluye valor aditamientos)</option>
                                <option value="7">Corona de cerámica s/metal sobre implante cementada</option>
                                <option value="8">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                <option value="9"> Corona provisional s/implante</option>
                                <option value="10">  Corona Temporal Sobre Implantes</option>
                                <option value="10">  Otro proc Implantes</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_tpo_proc_imp{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_imp{{ $counter }}" id="obs_tpo_proc_imp{{ $counter }}"></textarea>
                            <div class="form-group mt-3">
                                <label class="floating-label-activo-sm">UCO?</label>
                                <input type="text"class="form-control form-control-sm" id="uco_tto{{ $counter }}">
                            </div>
                            <div class="form-group mt-3">
                                <label class="floating-label-activo-sm">Laboratorio</label>
                                <input type="text"class="form-control form-control-sm" id="lab_tto{{ $counter }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Anestesia</label>
                            <select name="anestesia_impl{{ $counter }}" data-titulo="anestesia_impl" data-seccion="anestesia_impl{{ $counter }}"  id="anestesia_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl{{ $counter }}','div_anestesia_impl{{ $counter }}','obs_anestesia_impl{{ $counter }}',4);">
                                <option selected  value="1">Local</option>
                                <option value="2">Local mas sedación consciente</option>
                                <option value="3">Anestesia General</option>
                                <option value="4">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_anestesia_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Otra anestesia</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl{{ $counter }}" id="obs_anestesia_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">N° de tubos</label>
                            <input type="text" class="form-control form-control-sm" name="numero_tubos_impl{{ $counter }}" id="numero_tubos_impl{{ $counter }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Técnica de antestesia</label>
                            <select name="tec_anestesia_impl{{ $counter }}" data-titulo="tec_anestesia_impl{{ $counter }}" data-seccion="tec_anestesia_impl{{ $counter }}"  id="tec_anestesia_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tec_anestesia_impl{{ $counter }}','div_tec_anestesia_impl{{ $counter }}','obs_tec_anestesia_impl{{ $counter }}',10);">
                                <option selected  value="1">Infiltrativa vestibular </option>
                                <option value="2">Infiltrativa palatina/lingual</option>
                                <option value="3">Spix indirecta</option>
                                <option value="4">Spix directa</option>
                                <option value="5">Técnica de tuberosidad</option>
                                <option value="6">Técnica infraorbitaria</option>
                                <option value="7">Técnica carrea</option>
                                <option value="8">Técnica akinosi</option>
                                <option value="9">Técnica gowgates</option>
                                <option value="10">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_tec_anestesia_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Otra anestesia</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tec_anestesia_impl{{ $counter }}" id="obs_tec_anestesia_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Anestésico</label>
                            <select name="anestesico_impl{{ $counter }}" data-titulo="anestesico_impl{{ $counter }}" data-seccion="anestesico_impl"  id="anestesico_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesico_impl{{ $counter }}','div_anestesico_impl{{ $counter }}','obs_anestesico_impl{{ $counter }}',6);">
                                <option selected  value="1">Lidocaína 2% </option>
                                <option value="2">Mepivacaína 3%</option>
                                <option value="3">Articaína 4%</option>
                                <option value="4">Benzocaína 7.5%</option>
                                <option value="5">Bupivacaína 7.5%</option>
                                <option value="6">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_anestesico_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Otro anestesico</label>
                            <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_impl{{ $counter }}" id="obs_anestesico_impl{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Incidentes</label>
                            <select name="incid_col_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl{{ $counter }}','div_incid_col_impl{{ $counter }}','obs_incid_col_impl{{ $counter }}',2);">
                                <option selected  value="1">Sin incidentes</option>
                                <option value="2">Con Incidentes</option>

                            </select>
                        </div>
                        <div class="form-group" id="div_incid_col_impl{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describa Incidente</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl" id="obs_incid_col_impl"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Material de injerto óseo</label>
                            <select name="mat_inj_oseo_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_inj_oseo_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_inj_oseo{{ $counter }}','div_mat_inj_oseo{{ $counter }}','obs_mat_inj_oseo{{ $counter }}',6);">
                                <option selected  value="1">Sin Injerto Óseo</option>
                                <option value="2">autoinjerto</option>
                                <option value="3">aloinjerto</option>
                                <option value="4">xenoinjerto</option>
                                <option value="5">aloplástico</option>
                                <option value="6">Otro (describir)</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_mat_inj_oseo{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseo{{ $counter }}" id="obs_mat_inj_oseo{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Método de injerto óseo</label>
                            <input type="text" name="metodo_injerto_tto{{ $counter }}" id="metodo_injerto_tto{{ $counter }}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Suturas</label>
                            <select name="suturas_impl{{ $counter }}" data-titulo="suturas_impl{{ $counter }}" data-seccion="suturas"  id="suturas_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('suturas_impl{{ $counter }}','div_suturas{{ $counter }}','obs_suturas{{ $counter }}',5);">
                                <option selected  value="1">Catgut</option>
                                <option value="2">Seda</option>
                                <option value="3">Nylon</option>
                                <option value="4">Polipropileno</option>
                                <option value="5">Otro describir</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_suturas{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Describa</label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas{{ $counter }}" id="obs_suturas{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="tiempo_quir_impl{{ $counter }}" class="floating-label-activo-sm">Tiempo quirúrgico</label>
                            <input type="number" class="form-control form-control-sm" id="tiempo_quir_impl{{ $counter }}">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_tto_impl()">X</button>
                <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_dental_tto_impl({{ $counter }})"><i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>

</div>

<script>
    function ocultar_pieza_dental_tto_impl(){
        $('#pieza_dental_tto_impl').empty();
    }

    function guardar_pieza_dental_tto_impl(counter){

        let numero_pieza = $('#numero_pieza_tto_impl'+counter).val();

        let tipo_tto = $('#tpo_proc_imp'+counter).val();
        let tipo_tto_text = $('#tpo_proc_imp' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada

        if(tipo_tto == 10){
            tipo_tto_text = $('#obs_tpo_proc_imp'+counter).val();
        }
        let anestesia_tto = $('#anestesia_impl'+counter).val();
        let anestesia_tto_text = $('#anestesia_impl' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(anestesia_tto == 4){
            anestesia_tto_text = $('#obs_anestesia_impl'+counter).val();
        }

        let numero_tubos = $('#numero_tubos_impl'+counter).val();
        let tecnica_anestesia = $('#tec_anestesia_impl'+counter).val();
        let tecnica_anestesia_text = $('#tec_anestesia_impl'+counter +' option:selected').text();
        if(tecnica_anestesia == 10){
            tecnica_anestesia_text = $('#obs_tec_anestesia_impl'+counter).val();
        }

        let anestesico_tto = $('#anestesico_impl'+counter).val();
        let anestesico_tto_text = $('#anestesico_impl'+counter+' option:selected').text();
        if(anestesico_tto == 6){
            anestesico_tto_text = $('#obs_anestesico_impl'+counter).val();
        }

        let incidente_tto = $('#incid_col_impl'+counter).val();
        let incidente_tto_text = $('#incid_col_impl'+counter+' option:selected').text();
        if(incidente_tto == 2){
            incidente_tto_text = $('#obs_incid_col_impl'+counter).val();
        }

        let material_injerto_tto = $('#mat_inj_oseo_impl'+counter).val();
        let material_injerto_tto_text = $('#mat_inj_oseo_impl'+counter+' option:selected').text();
        if(material_injerto_tto == 6){
            material_injerto_tto_text = $('#obs_mat_inj_oseo'+counter).val();
        }

        let tipo_injerto_tto = $('#metodo_injerto_tto'+counter).val();

        let suturas_tto = $('#suturas_impl'+counter).val();
        let suturas_tto_text = $('#suturas_impl'+counter+' option:selected').text();
        if(suturas_tto == 5){
            suturas_tto_text = $('#obs_suturas'+counter).val();
        }

        let tiempo_quirurgico_tto = $('#tiempo_quir_impl'+counter).val();

        let data = {
            numero_pieza: numero_pieza,
            tipo_tto: tipo_tto,
            tipo_tto_text: tipo_tto_text,
            anestesia_tto: anestesia_tto,
            anestesia_tto_text: anestesia_tto_text,
            numero_tubos: numero_tubos,
            tecnica_anestesia: tecnica_anestesia,
            tecnica_anestesia_text: tecnica_anestesia_text,
            anestesico_tto: anestesico_tto,
            anestesico_tto_text: anestesico_tto_text,
            incidente_tto: incidente_tto,
            incidente_tto_text: incidente_tto_text,
            material_injerto_tto: material_injerto_tto,
            material_injerto_tto_text: material_injerto_tto_text,
            tipo_injerto_tto: tipo_injerto_tto,
            suturas_tto: suturas_tto,
            suturas_tto_text: suturas_tto_text,
            tiempo_quirurgico_tto: tiempo_quirurgico_tto,
            id_paciente: dame_id_paciente(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_tto_impl') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_tto_implantologia').empty();
                    $('#contenedor_tto_implantologia').append(resp.v);
                }
            },
            error: function(error){
                console.log(error);
            }
        })

    }
</script>
