<!-- m_interconsulta_otorrino -->
<div id="m_interconsulta_otorrino" class="modal fade" tabindex="100" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="nombre_paciente_interconasulta"
                            placeholder="ingrese nombre" id="nombre_paciente_interconasulta"
                            value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}"
                            name="rut_paciente_interconasulta" id="rut_paciente_interconasulta">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="edad_paciente_interconasulta"
                            id="edad_paciente_interconasulta"
                            value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="address" class="form-control form-control-sm"
                            name="direccion_paciente_interconasulta" id="direccion_paciente_interconasulta"
                            value="{{ $paciente->Direccion()->first()->direccion }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Regi&oacute;n</label>
                        <select id="region_paciente_interconsulta" name="region_paciente_interconsulta"
                            class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n </option>
                            @foreach ($regiones as $r)
                                @if ($r->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                    <option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
                                @endif
                                <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Ciudad</label>
                        <select id="region_paciente_interconsulta" name="region_paciente_interconsulta"
                            class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n </option>


                            @foreach ($ciudades as $c)
                                @if ($c->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id)
                                    <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
                                @endif
                                <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                            <input type="hidden" name="ficha_id_interconsulta" id="ficha_id_interconsulta"
                                value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                            <input type="hidden" name="paciente_interconsulta" id="paciente_interconsulta"
                                value="{{ $paciente->id }}">
                                <input type="hidden" name="profesion_otorrino" id="profesion_otorrino" value="1">
                                <input type="hidden" name="especialidad_otorrino" id="especialidad_otorrino" value="2">
                                <input type="hidden" name="subtipo_especialidad_otorrino" id="subtipo_especialidad_otorrino" value="20">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Especialidad</label>
                                    <select name="especialidad_interconsulta_otorrino" id="especialidad_interconsulta_otorrino"
                                        class="form-control form-control-sm">
                                            <option value="20">Otorrinolaringología</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="hipotesis_interconsulta_otorrino" id="hipotesis_interconsulta_otorrino">
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Se desea saber</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="2"
                                        name="comentarios_interconsulta_otorrino" id="comentarios_interconsulta_otorrino"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer pt-2 pb-0">
                                <button type="button" class="btn btn-danger" onclick="reset_form('otorrino')"
                                    data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-info" onclick="registrar_interconsulta_odped('otorrino')">Guardar</button>
                            </div>

            </div>
        </div>
    </div>
</div>
<!-- m_interconsulta_fono -->
<div id="m_interconsulta_fono" class="modal fade" tabindex="100" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="nombre_paciente_interconasulta"
                            placeholder="ingrese nombre" id="nombre_paciente_interconasulta"
                            value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}"
                            name="rut_paciente_interconasulta" id="rut_paciente_interconasulta">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="edad_paciente_interconasulta"
                            id="edad_paciente_interconasulta"
                            value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="address" class="form-control form-control-sm"
                            name="direccion_paciente_interconasulta" id="direccion_paciente_interconasulta"
                            value="{{ $paciente->Direccion()->first()->direccion }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Regi&oacute;n</label>
                        <select id="region_paciente_interconsulta" name="region_paciente_interconsulta"
                            class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n </option>
                            @foreach ($regiones as $r)
                                @if ($r->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                    <option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
                                @endif
                                <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Ciudad</label>
                        <select id="region_paciente_interconsulta" name="region_paciente_interconsulta"
                            class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n </option>


                            @foreach ($ciudades as $c)
                                @if ($c->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id)
                                    <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
                                @endif
                                <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                            <input type="hidden" name="ficha_id_interconsulta" id="ficha_id_interconsulta"
                                value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                            <input type="hidden" name="paciente_interconsulta" id="paciente_interconsulta"
                                value="{{ $paciente->id }}">
                                <input type="hidden" name="profesion_fono" id="profesion_fono" value="4">
                                <input type="hidden" name="especialidad_fono" id="especialidad_fono" value="28">
                                <input type="hidden" name="subtipo_especialidad_fono" id="subtipo_especialidad_fono" value="">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Nombre especialidad</label>
                                    <select name="especialidad_interconsulta_fono" id="especialidad_interconsulta_fono"
                                        class="form-control form-control-sm">
                                            <option value="20">Fonoaudiología</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="hipotesis_interconsulta_fono" id="hipotesis_interconsulta_fono">
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Se desea saber</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="2"
                                        name="comentarios_interconsulta_fono" id="comentarios_interconsulta_fono"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer pt-2 pb-0">
                                <button type="button" class="btn btn-danger" onclick="reset_form('fono')"
                                    data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-info" onclick="registrar_interconsulta_odped('fono')">Guardar</button>
                            </div>
            </div>
        </div>
    </div>
</div>
<!-- m_interconsulta_dental -->
<div id="m_interconsulta_dental" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" 
                               name="nombre_paciente_interconasulta"
                               id="nombre_paciente_interconasulta"
                               placeholder="Ingrese nombre"
                               value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input type="text" class="form-control form-control-sm"
                               name="rut_paciente_interconasulta" id="rut_paciente_interconasulta"
                               value="{{ $paciente->rut }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="number" class="form-control form-control-sm"
                               name="edad_paciente_interconasulta" id="edad_paciente_interconasulta"
                               value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="text" class="form-control form-control-sm"
                               name="direccion_paciente_interconasulta" id="direccion_paciente_interconasulta"
                               value="{{ $paciente->Direccion()->first()->direccion }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Regi&oacute;n</label>
                        <select id="region_paciente_interconsulta" name="region_paciente_interconsulta"
                                class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n</option>
                            @foreach ($regiones as $r)
                                @if ($r->id == $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                    <option value="{{ $r->id }}" selected>{{ $r->nombre }}</option>
                                @else
                                    <option value="{{ $r->id }}">{{ $r->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Ciudad</label>
                        <select id="ciudad_paciente_interconsulta" name="ciudad_paciente_interconsulta"
                                class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n</option>
                            @foreach ($ciudades as $c)
                                @if ($c->id == $paciente->Direccion()->first()->Ciudad()->first()->id)
                                    <option value="{{ $c->id }}" selected>{{ $c->nombre }}</option>
                                @else
                                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Campos ocultos -->
                <input type="hidden" name="ficha_id_interconsulta" id="ficha_id_interconsulta"
                       value="@if ($id_ficha_atencion != null){{ $id_ficha_atencion }}@endif">
                <input type="hidden" name="paciente_interconsulta" id="paciente_interconsulta"
                       value="{{ $paciente->id }}">
                <input type="hidden" name="profesion_dental" id="profesion_dental" value="4">
                <input type="hidden" name="especialidad_dental" id="especialidad_dental" value="2">
                <input type="hidden" name="subtipo_especialidad_dental" id="subtipo_especialidad_dental" value="20">

                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre especialidad</label>
                        <select name="especialidad_interconsulta_dental" id="especialidad_interconsulta_dental"
                                class="form-control form-control-sm">
                            <option value="0">Odontología</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                        <input type="text" class="form-control form-control-sm"
                               name="hipotesis_interconsulta_dental" id="hipotesis_interconsulta_dental">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Se desea saber</label>
                        <textarea class="form-control form-control-sm" rows="2"
                                  name="comentarios_interconsulta_dental" id="comentarios_interconsulta_dental"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer pt-2 pb-0">
                <button type="button" class="btn btn-danger" onclick="reset_form('dental')" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_interconsulta_odped('dental')">Guardar</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="profesional_inter" id="profesional_inter" value="{{ $profesional->id }}">
<input type="hidden" name="nombre_profesional_inter" id="nombre_profesional_inter" value="{{ $profesional->nombres . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}">
<script>
    function registrar_interconsulta_odped(esp)
    {
        console.log(esp);
        var  mensaje = '';
        var valido = 1;

        let profesion = $('#profesion_' + esp).val();
        let especialidad = $('#especialidad_' + esp).val();
        let sub_tipo_especialidad = $('#subtipo_especialidad_' + esp).val();
        let profesional_inter = $('#profesional_inter').val();
        let nombre_profesional_inter = $('#nombre_profesional_inter').val();
        let hipotesis_interconsulta = $('#hipotesis_interconsulta_' + esp).val();
        let comentarios_interconsulta = $('#comentarios_interconsulta_' + esp).val();
        let id_fc = $('#id_fc').val();
        let url = "{{ route('ficha_medica.registrar_interconsulta') }}";
        let hora_medica = $('#hora_medica').val();

        if(profesion == '') {
            mensaje += 'Debe ingresar Profesión\n';
            valido = 0;
        }

        if(especialidad == '') {
            mensaje += 'Debe ingresar Especialidad\n';
            valido = 0;
        }

        // if(sub_tipo_especialidad == '') {
        //     mensaje += 'Debe ingresar Sub Tipo Especialidad\n';
        //     valido = 0;
        // }
        // if(profesional_inter == '') {
        //     mensaje += 'Debe ingresar profesional_inter\n';
        //     valido = 0;
        // }
        // if(nombre_profesional_inter == '') {
        //     mensaje += 'Debe ingresar nombre_profesional_inter\n';
        //     valido = 0;
        // }

        if(hipotesis_interconsulta == '') {
            mensaje += 'Debe ingresar Hipótesis diagnóstica\n';
            valido = 0;
        }
        if(comentarios_interconsulta == '') {
            mensaje += 'Debe ingresar que desea saber\n';
            valido = 0;
        }

        if(valido == 1)
        {
            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        profesion: profesion,
                        especialidad: especialidad,
                        sub_tipo_especialidad: sub_tipo_especialidad,
                        profesional_inter: profesional_inter,
                        nombre_profesional_inter: nombre_profesional_inter,
                        hipotesis_interconsulta: hipotesis_interconsulta,
                        comentarios_interconsulta: comentarios_interconsulta,
                        id_fc: id_fc,
                    },
                })
                .done(function(response) {
                    console.log(response);
                    if (response.estado == 1) {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha creado la interconsulta de forma correcta');
                        $('#mensaje').show();
                        $('#modal_interconsulta').modal('hide');
                        ver_pdf_interconsulta(response.id_last);
                    }
                    else
                    {
                        swal({
                            title: "Se ha presentado un problema al registrar." ,
                            icon: "error",
                        })
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);

                })

        }
        else
        {
            swal({
                title: "Complete los datos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
        }
    };

    function reset_form(especialidad){
        // if(especialidad == 'fono'){
        //     $('#profesion_fono').val('');
        //     $('#especialidad_fono').val('');
        //     $('#subtipo_especialidad_fono').val('');
        // }
        // else if(especialidad == 'dental'){
        //     $('#profesion_dental').val('');
        //     $('#especialidad_dental').val('');
        //     $('#subtipo_especialidad_dental').val('');
        // }else{
        //     $('#profesion_otorrino').val('');
        //     $('#especialidad_otorrino').val('');
        //     $('#subtipo_especialidad_otorrino').val('');
        // }
    }
</script>
