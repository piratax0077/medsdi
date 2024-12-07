<div class="form-row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label class="floating-label-activo-sm">Pieza N°</label>
            <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp{{ $counter }}" id="n_pieza_ex_pp{{ $counter }}">
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group">
            <label class="floating-label-activo-sm">Resp.Calor</label>
            <select id="sel_endo_resp_calor{{ $counter }}" name="sel_endo_resp_calor{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
            <select id="sel_endo_resp_frio{{ $counter }}" name="sel_endo_resp_frio{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
            <select id="sel_endo_resp_elect{{ $counter }}" name="sel_endo_resp_elect{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
            <select id="sel_endo_resp_perc{{ $counter }}" name="sel_endo_resp_perc{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
            <select id="sel_endo_resp_expl{{ $counter }}" name="sel_endo_resp_expl{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
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
            <select id="sel_endo_cavitaria{{ $counter }}" name="sel_endo_cavitaria{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                <option><span>N/R </span> No realizada</option>
                <option><span>↑ </span> Aumentado</option>
                <option><span>↓ </span> Disminuido</option>
                <option><span>N </span> Normal</a></option>
                <option><span>(-) </span> No responde</a></option>
            </select>
        </div>
    </div>
    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_examen_pieza()">X</button>
    <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_examen_pieza({{ $counter }})"><i class="fas fa-save"></i></button>
</div>

<script>
    function ocultar_pieza_examen_pieza() {
        $('#contenedor_nueva_pieza_dental').empty();
    }

    function guardar_pieza_examen_pieza(counter){
        let numero_pieza = $('#n_pieza_ex_pp'+counter).val();
        let resp_calor = $('#sel_endo_resp_calor'+counter).val();
        let resp_frio = $('#sel_endo_resp_frio'+counter).val();
        let resp_elect = $('#sel_endo_resp_elect'+counter).val();
        let resp_perc = $('#sel_endo_resp_perc'+counter).val();
        let resp_expl = $('#sel_endo_resp_expl'+counter).val();
        let resp_cavitaria = $('#sel_endo_cavitaria'+counter).val();
        let id_paciente = dame_id_paciente();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_especialidad = $('#id_especialidad').val();

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza : numero_pieza,
            resp_calor : resp_calor,
            resp_frio : resp_frio,
            resp_elect : resp_elect,
            resp_perc : resp_perc,
            resp_expl: resp_expl,
            resp_cavitaria: resp_cavitaria,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_ficha_atencion: id_ficha_atencion,
            id_especialidad: id_especialidad
        }

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == ''){
            valido = 0;
            mensaje += 'El número de pieza es obligatorio.\n';
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

        let url = "{{ ROUTE('profesional.guardar_pieza_examen_pieza') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_pieza_dental_endo_gral').empty();
                    $('#contenedor_pieza_dental_endo_gral').append(resp.v);
                    $('#contenedor_nueva_pieza_dental').empty();
                    swal({
                        title: "Pieza dental guardada",
                        text: "La pieza dental para examen ha sido guardada correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
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
    }
</script>
