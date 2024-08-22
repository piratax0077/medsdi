<div id="registrar_contratoprofesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_contratoprofesional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Datos profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="rut_nuevo_profesional" id="rut_nuevo_profesional">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha de Ingreso</label>
                                <input type="date" class="form-control form-control-sm" name="f_ingreso_nuevo_profesional" id="f_ingreso_nuevo_profesional">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_nuevo_profesional" id="nombre_nuevo_profesional" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                <input class="form-control form-control-sm" name="apellido1_nuevo_profesional" id="apellido1_nuevo_profesional" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                <input class="form-control form-control-sm" name="apellido2_nuevo_profesional" id="apellido2_nuevo_profesional" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email_nuevo_profesional" id="email_nuevo_profesional" type="email" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="telefono1_nuevo_profesional" id="telefono1_nuevo_profesional" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono (opcional)</label>
                                <input class="form-control form-control-sm" name="telefono2_nuevo_profesional" id="telefono2_nuevo_profesional" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n N&deg; / Calle</label>
                                <input class="form-control form-control-sm" name="direccion_nuevo_profesional" id="direccion_nuevo_profesional" type="text">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Cargo</label>
                                <select name="cargo_nuevo_profesional" id="cargo_nuevo_profesional" class="form-control form-control-sm">
                                    <option value="0">Seleccione opci&oacute;n</option>
                                    <option value="1">Profesional</option>
                                    <option value="2">Secretaria</option>
                                    <option value="3">Administrativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select class="form-control form-control-sm" onchange="buscar_ciudad_profesional();" id="region_nuevo_profesional">
                                    <option>Seleccione opci&oacute;n</option>
                                    @foreach($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm" id="comuna_nuevo_profesional">

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Profesi&oacute;n</label>
                                <select name="profesion_nuevo_profesional" id="profesion_nuevo_profesional" class="form-control" onchange="dame_tipo_especialidad()">
                                    <option value="0">Seleccione opci&oacute;n</option>
                                    @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Especialidad</label>
                                <select name="especialidad_nuevo_profesional" id="especialidad_nuevo_profesional" class="form-control" onchange="dame_subtipo_especialidad()">

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sub-especialidad</label>
                                <select name="sub_especialidad_nuevo_profesional" id="sub_especialidad_nuevo_profesional" class="form-control">
                                    <option value="0">Seleccione opci&oacute;n</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">D&iacute;as de Atenci&oacute;n</label>
                                <input class="form-control form-control-sm" name="dias_atencion_nuevo_profesional" id="dias_atencion_nuevo_profesional" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Horario</label>
                                <input class="form-control form-control-sm" name="horario_nuevo_profesional" id="horario_nuevo_profesional" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Pacientes por Hora</label>
                                <input class="form-control form-control-sm" name="p_hora_nuevo_profesional" id="p_hora_nuevo_profesional" type="text" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="correo-cont" checked="">
                                    <label for="correo-cont" class="cr"></label>
                                </div>
                                <label>Notificar por correo electr&oacute;nico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Datos Bancarios Para Dep&oacute;sito</h5>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Banco</label>
                                <select class="form-control form-control-sm" name="banco_nuevo_profesional" id="banco_nuevo_profesional">
                                    <option value="0">Seleccione opci&oacute;n</option>
                                    @foreach($bancos as $banco)
                                        <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                <input class="form-control form-control-sm" name="n_cta_nuevo_profesional" id="n_cta_nuevo_profesional" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sucursal</label>
                                <input class="form-control form-control-sm" name="sucursal_nuevo_profesional" id="sucursal_nuevo_profesional" type="text" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_nuevo_profesional()">Registrar profesional</button>
            </div>
        </div>
    </div>
</div>

<script>
    /** buscar ciudad */
    function buscar_ciudad_profesional(id_ciudad=0) {

        let region = $('#region_nuevo_profesional').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#comuna_nuevo_profesional');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if(id_ciudad != 0)
                        ciudades.val(id_ciudad);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });


    };

    function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace('-','');
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }

    function dame_tipo_especialidad(){
        let profesion = $('#profesion_nuevo_profesional').val();
        let url = "{{ route('web.profesional.buscar_tipo_especialidad') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_especialidad: profesion,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    registros = data.registros;

                    let especialidades = $('#especialidad_nuevo_profesional');

                    especialidades.find('option').remove();
                    especialidades.append('<option value="0">seleccione</option>');
                    $(registros).each(function(i, v) { // indice, valor
                        especialidades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las especialidades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function dame_subtipo_especialidad(){
        let especialidad = $('#especialidad_nuevo_profesional').val();
        let url = "{{ route('web.profesional.buscar_sub_tipo_especialidad') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_tipo_especialidad: especialidad,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    registros = data.registros;

                    let subespecialidades = $('#sub_especialidad_nuevo_profesional');

                    subespecialidades.find('option').remove();
                    subespecialidades.append('<option value="0">seleccione</option>');
                    $(registros).each(function(i, v) { // indice, valor
                        subespecialidades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las sub-especialidades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

</script>
