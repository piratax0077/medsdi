<!--Modal Asociar Profesional-->
<div id="asociar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar Profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{--  DIV PARA BUSQUEDA DE PROFESIONAL  --}}
                    <div id="div_agregar_profesional_busqueda" style="display:;" class="col-sm-12 mb-3">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <h6 class="text-c-blue">Escriba rut y seleccione la sucursal</h6>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_int_rut" id="agregar_profesional_int_rut">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-info btn-sm "  id="agregar_profesional_btn_buscar_rut" onclick="buscar_profesional();">Buscar Profesional</button>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    @if($institucion->sucursales == 0)
                                        <label class="floating-label-activo-sm">Casa Matriz</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $institucion->LugarAtencion()->first()->nombre }}" readonly>
                                        <input type="hidden" name="agregar_profesional_int_id_lugar_atencion" id="agregar_profesional_int_id_lugar_atencion" value="{{ $institucion->LugarAtencion()->first()->id }}">
                                    @else
                                        <label class="floating-label-activo-sm">Sucursal</label>
                                        <select class="form-control form-control-sm" name="agregar_profesional_int_id_lugar_atencion" id="agregar_profesional_int_id_lugar_atencion">
                                            <option>Seleccione una opción</option>
                                                <option value="">Sucursal</option>
                                                <option value="1">Sucursal Demo</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  DIV PARA MOSTRAR RESULTADO DE BUSQUEDA DE PROFESIONAL ENCONTRADO  --}}
                    <div id="div_agregar_profesional_ver_info_prof" style="display:none;" class="col-sm-12 mb-3">
                        <input type="hidden" name="agregar_profesional_ver_nombre_profesional" id=" agregar_profesional_ver_nombre_profesional">
                        <input type="hidden" name="agregar_profesional_ver_telefono" id="agregar_profesional_ver_telefono">
                        <input type="hidden" name="agregar_profesional_ver_email" id="agregar_profesional_ver_email">
                        <input type="hidden" name="agregar_profesional_id_profesional" id="agregar_profesional_id_profesional">
                        <div class="row">
                            <div class="col-sm-4"><strong>Nombre: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_nombre_profesional" id="agregar_profesional_texto_ver_nombre_profesional"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Telefono: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_telefono" id="agregar_profesional_texto_ver_telefono"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Email: </strong></div>
                            <div class="col-sm-6" name="agregar_profesional_texto_ver_email" id="agregar_profesional_texto_ver_email"></div>
                        </div>
                        <div class="row m-t-15">
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-info" onclick="regresar_a_busqueda();">Regresar a Busqueda</button>
                            </div>
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-success" onclick="asociar_profesional_existente();">Enviar invitación</button>
                            </div>
                        </div>
                    </div>

                    {{--  DIV PARA CARGAR PROFESIONAL NUEVO  --}}
                    <div id="div_agregar_profesional_formulario_nuevo_prof" style="display:none;" class="col-sm-12 mb-3">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_nombre" id="agregar_profesional_nuevo_nombre">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Apellido Paterno</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_apellido_p" id="agregar_profesional_nuevo_apellido_p">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Apellido Materno</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_apellido_m" id="agregar_profesional_nuevo_apellido_m">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Telefono</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_telefono" id="agregar_profesional_nuevo_telefono">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo">Email</label>
                                    <input type="text" class="form-control form-control-sm" name="agregar_profesional_nuevo_email" id="agregar_profesional_nuevo_email">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-info" onclick="regresar_a_busqueda();">Regresar a Busqueda</button>
                            </div>
                            <div class="col-sm-6 text-center">
                                <button type="button" class="btn btn-success" onclick="asociar_nuevo_profesional();" >Enviar invitación</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
        $("#agregar_profesional_int_rut").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });

    })

    function asociar_profesional() {
        $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
        $('#div_agregar_profesional_busqueda').show();
        $('#div_agregar_profesional_ver_info_prof').hide();
        $('#div_agregar_profesional_formulario_nuevo_prof').hide();
        $('#asociar_profesional_cm').modal('show');
    }

    function regresar_a_busqueda()
    {
        $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
        $('#agregar_profesional_int_rut').val('');

        $('#div_agregar_profesional_busqueda').show();
        $('#div_agregar_profesional_ver_info_prof').hide();
        $('#div_agregar_profesional_formulario_nuevo_prof').hide();

        $('#agregar_profesional_id_profesional').val('');
        $('#agregar_profesional_texto_ver_nombre_profesional').html('');
        $('#agregar_profesional_texto_ver_telefono').html('');
        $('#agregar_profesional_texto_ver_email').html('');
        $('#agregar_profesional_ver_nombre_profesional').val('');
        $('#agregar_profesional_ver_telefono').val('');
        $('#agregar_profesional_ver_email').val('');

        $('#agregar_profesional_nuevo_nombre').val('');
        $('#agregar_profesional_nuevo_apellido_p').val('');
        $('#agregar_profesional_nuevo_apellido_m').val('');
        $('#agregar_profesional_nuevo_telefono').val('');
        $('#agregar_profesional_nuevo_email').val('');
    }

    {{--  BUSQUEDA EN EL MODAL DE ASOCIAR NUEVO PROFESIONAL  --}}
    function buscar_profesional(){

        let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();

        if(id_lugar_atencion == '')
        {
            swal({
                title: "Debe seleccionar una sucursal",
                icon: "error",
            });
            return false;
        }

        $('#agregar_profesional_btn_buscar_rut').attr('disabled', 'disabled');
        var rut = $('#agregar_profesional_int_rut').val();
        if(rut == ''){
            swal({
                title: "Debe ingresar un RUT",
                icon: "error",
            });
            return false;
        }
        if(!$.validateRut(rut))
        {
            swal({
                title: "Debe ingresar un RUT valido",
                icon: "error",
            });
            return false;
        }

        {{--  busqueda  --}}
        let profesional_inter = $('#profesional_inter');
        profesional_inter.find('option').remove();

        let url = "{{ route('profesional.buscador') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                rut: rut
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {
                /** encontrado */
                $('#agregar_profesional_texto_ver_nombre_profesional').html(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                $('#agregar_profesional_texto_ver_telefono').html(data.registros[0].profesional_telefono_uno);
                $('#agregar_profesional_texto_ver_email').html(data.registros[0].profesional_email);
                $('#agregar_profesional_ver_nombre_profesional').val(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                $('#agregar_profesional_ver_telefono').val(data.registros[0].profesional_telefono_uno);
                $('#agregar_profesional_ver_email').val(data.registros[0].profesional_email);

                $('#agregar_profesional_id_profesional').val(data.registros[0].profesionales_id);

                $('#div_agregar_profesional_busqueda').hide();
                $('#div_agregar_profesional_ver_info_prof').show();
                $('#div_agregar_profesional_formulario_nuevo_prof').hide();
            }
            else
            {
                /** no encontrado */
                /** REALIZAR BUSQUEDA TABLA DE PROFESIONALES EXISTENTES EXTERNOS (POR HACER) */
                let url = "{{ route('personas.buscador') }}";
                $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        rut: rut
                    },
                })
                .done(function(data2) {
                    if (data2.estado == 1)
                    {
                        /** encontrado */
                        $('#agregar_profesional_nuevo_apellido_p').val( data2.registros.appaterno );
                        $('#agregar_profesional_nuevo_apellido_m').val( data2.registros.apmaterno );
                        $('#agregar_profesional_nuevo_telefono').val( '' );
                        $('#agregar_profesional_nuevo_email').val( '' );

                        $('#div_agregar_profesional_busqueda').hide();
                        $('#div_agregar_profesional_ver_info_prof').hide();
                        $('#div_agregar_profesional_formulario_nuevo_prof').show();
                    }
                    else
                    {
                        /** no encontrado */
                        $('#agregar_profesional_nuevo_nombre').val();
                        $('#agregar_profesional_nuevo_apellido_p').val();
                        $('#agregar_profesional_nuevo_apellido_m').val();
                        $('#agregar_profesional_nuevo_telefono').val();
                        $('#agregar_profesional_nuevo_email').val();

                        $('#div_agregar_profesional_busqueda').hide();
                        $('#div_agregar_profesional_ver_info_prof').hide();
                        $('#div_agregar_profesional_formulario_nuevo_prof').show();

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function asociar_profesional_existente()
    {
        let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();
        let id_profesional = $('#agregar_profesional_id_profesional').val();
        let url = "{{ route('adm_cm.asociar_profesional_existente')}}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {

                swal({
                    title: "Invitación al Profesional Realizada con Exito.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "success",
                });

                $('#asociar_profesional_cm').modal('hide');

                $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                $('#agregar_profesional_int_rut').val('');

                $('#div_agregar_profesional_busqueda').show();
                $('#div_agregar_profesional_ver_info_prof').hide();
                $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                $('#agregar_profesional_id_profesional').val('');
                $('#agregar_profesional_texto_ver_nombre_profesional').html('');
                $('#agregar_profesional_texto_ver_telefono').html('');
                $('#agregar_profesional_texto_ver_email').html('');
                $('#agregar_profesional_ver_nombre_profesional').val('');
                $('#agregar_profesional_ver_telefono').val('');
                $('#agregar_profesional_ver_email').val('');

                $('#agregar_profesional_nuevo_nombre').val('');
                $('#agregar_profesional_nuevo_apellido_p').val('');
                $('#agregar_profesional_nuevo_apellido_m').val('');
                $('#agregar_profesional_nuevo_telefono').val('');
                $('#agregar_profesional_nuevo_email').val('');
            }
            else
            {
                swal({
                    title: "Invitación al Profesional Fallida.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function asociar_nuevo_profesional()
    {
        let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();
        let nombre = $('#agregar_profesional_nuevo_nombre').val();
        let apellido_p = $('#agregar_profesional_nuevo_apellido_p').val();
        let apellido_m = $('#agregar_profesional_nuevo_apellido_m').val();
        let telefono = $('#agregar_profesional_nuevo_telefono').val();
        let email = $('#agregar_profesional_nuevo_email').val();
        let url = "{{ route('adm_cm.asociar_profesional_nuevo')}}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id_lugar_atencion: id_lugar_atencion,
                nombre: nombre,
                apellido_uno: apellido_p,
                apellido_dos: apellido_m,
                telefono: telefono,
                email: email,
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {

                swal({
                    title: "Invitación al Profesional Realizada con Exito.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "success",
                });

                $('#asociar_profesional_cm').modal('hide');

                $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                $('#agregar_profesional_int_rut').val('');

                $('#div_agregar_profesional_busqueda').show();
                $('#div_agregar_profesional_ver_info_prof').hide();
                $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                $('#agregar_profesional_id_profesional').val('');
                $('#agregar_profesional_texto_ver_nombre_profesional').html('');
                $('#agregar_profesional_texto_ver_telefono').html('');
                $('#agregar_profesional_texto_ver_email').html('');
                $('#agregar_profesional_ver_nombre_profesional').val('');
                $('#agregar_profesional_ver_telefono').val('');
                $('#agregar_profesional_ver_email').val('');

                $('#agregar_profesional_nuevo_nombre').val('');
                $('#agregar_profesional_nuevo_apellido_p').val('');
                $('#agregar_profesional_nuevo_apellido_m').val('');
                $('#agregar_profesional_nuevo_telefono').val('');
                $('#agregar_profesional_nuevo_email').val('');
            }
            else
            {
                swal({
                    title: "Invitación al Profesional Fallida.",
                    text: "Profesional pendiente por confirmar.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
</script>
