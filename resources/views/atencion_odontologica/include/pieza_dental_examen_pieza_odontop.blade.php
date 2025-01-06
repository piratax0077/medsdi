<div class="form-row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label class="floating-label-activo-sm">Pieza N°</label>
            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp_odontop{{ $counter }}" id="n_pieza_ex_pp_odontop{{ $counter }}">
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Resp.Calor</label>
            <select id="sel_odontopo_resp_calor_odontop{{ $counter }}" name="sel_odontopo_resp_calor_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>

    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Resp.Frio</label>
            <select id="sel_odontopo_resp_frio_odontop{{ $counter }}" name="sel_odontopo_resp_frio_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>

    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Eléctrico</label>
            <select id="sel_odontopo_resp_elect_odontop{{ $counter }}" name="sel_odontopo_resp_elect_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Percusión</label>
            <select id="sel_odontopo_resp_perc_odontop{{ $counter }}" name="sel_odontopo_resp_perc_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Exploración</label>
            <select id="sel_odontopo_resp_expl_odontop{{ $counter }}" name="sel_odontopo_resp_expl_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Cavitaria</label>
            <select id="sel_odontopo_cavitaria_odontop{{ $counter }}" name="sel_odontopo_cavitaria_odontop{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_examen_pieza_odontop()">X</button>
    <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_examen_pieza_odontop({{ $counter }})"><i class="fas fa-save"></i></button>
</div>
<input type="hidden" name="tipo_examen" id="tipo_examen" value="{{ $tipo_examen }}">

<script>
    function guardar_pieza_examen_pieza_odontop(counter) {

        let numero_pieza = $('#n_pieza_ex_pp_odontop' + counter).val();
        let resp_calor = $('#sel_odontopo_resp_calor_odontop' + counter).val();
        let resp_frio = $('#sel_odontopo_resp_frio_odontop' + counter).val();
        let resp_elect = $('#sel_odontopo_resp_elect_odontop' + counter).val();
        let resp_perc = $('#sel_odontopo_resp_perc_odontop' + counter).val();
        let resp_expl = $('#sel_odontopo_resp_expl_odontop' + counter).val();
        let resp_cavitaria = $('#sel_odontopo_cavitaria_odontop' + counter).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();
        let tipo_examen = 'odontop';

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == ''){
            valido = 0;
            mensaje = '<li>Debe ingresar el número de la pieza dental</li>';
        }

        if(valido == 0 ){
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
            resp_calor: resp_calor,
            resp_frio: resp_frio,
            resp_elect: resp_elect,
            resp_perc: resp_perc,
            resp_expl: resp_expl,
            resp_cavitaria: resp_cavitaria,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_ficha_atencion: id_ficha_atencion,
            id_especialidad: id_especialidad,
            tipo_examen: tipo_examen,
            _token: CSRF_TOKEN
        }

        let url = "{{ route('profesional.guardar_pieza_examen_pieza') }}";

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data) {
                console.log(data);


                    if(data.mensaje == 'OK'){
                        let piezas_odontop = data.examenes;
                        $('#contenedor_pieza_dental_odontop_examen').empty();
                        $('#planificacion_examenes_odontop').empty();
                        piezas_odontop.forEach(pieza => {
                            $('#contenedor_pieza_dental_odontop_examen').append(`
                            <div class="mb-3">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp_end${pieza.id}" id="n_pieza_ex_pp_end${pieza.id}" value="${pieza.numero_pieza}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Resp.Calor</label>
                                            <select id="sel_endo_resp_calor1" name="sel_endo_resp_calor1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                <option selected="">N/R  No realizada</option>
                                                <option>↑  Aumentado</option>
                                                <option>↓  Disminuido</option>
                                                <option>N  Normal</option>
                                                <option>(-)  No responde</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Resp.Frio</label>
                                            <select id="sel_endo_resp_frio1" name="sel_endo_resp_frio1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                <option selected="">N/R  No realizada</option>
                                                <option>↑  Aumentado</option>
                                                <option>↓  Disminuido</option>
                                                <option>N  Normal</option>
                                                <option>(-)  No responde</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Eléctrico</label>
                                            <select id="sel_endo_resp_elect1" name="sel_endo_resp_elect1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                <option selected="">N/R  No realizada</option>
                                                <option>↑  Aumentado</option>
                                                <option>↓  Disminuido</option>
                                                <option>N  Normal</option>
                                                <option>(-)  No responde</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Percusión</label>
                                            <select id="sel_endo_resp_perc1" name="sel_endo_resp_perc1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                <option selected="">N/R  No realizada</option>
                                                <option>↑  Aumentado</option>
                                                <option>↓  Disminuido</option>
                                                <option>N  Normal</option>
                                                <option>(-)  No responde</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Exploración</label>
                                            <select id="sel_endo_resp_expl1" name="sel_endo_resp_expl1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                <option selected="">N/R  No realizada</option>
                                                <option>↑  Aumentado</option>
                                                <option>↓  Disminuido</option>
                                                <option>N  Normal</option>
                                                <option>(-)  No responde</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Cavitaria</label>
                                            <select id="sel_endo_cavitaria1" name="sel_endo_cavitaria1" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                <option selected="">N/R  No realizada</option>
                                                <option>↑  Aumentado</option>
                                                <option>↓  Disminuido</option>
                                                <option>N  Normal</option>
                                                <option>(-)  No responde</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_pieza(${pieza.id},'odontop')">X</button>
                                </div>
                            </div>
                            `);
                            $('#planificacion_examenes_odontop').append(`
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Pieza N°</label>
                                            <input type="text" class="form-control form-control-sm" value="${pieza.numero_pieza}">
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
                            `);
                        });
                        $('#nueva_pieza_dental_odontop_examen').empty();
                        swal({
                            title: "Pieza dental guardada",
                            text: "La pieza dental ha sido guardada correctamente",
                            icon: "success",
                            button: "Aceptar",
                        });
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(data.vista_presupuestos);
                        }else{
                            swal({
                            title: "Error al guardar",
                            text: "Ha ocurrido un error al guardar la pieza dental",
                            icon: "error",
                            button: "Aceptar",
                        });
                    }


            }
        })
    }

    function ocultar_pieza_examen_pieza_odontop() {
        $('#nueva_pieza_dental_odontop_examen').empty();
    }
</script>
