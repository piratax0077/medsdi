<div id="llamar_paciente_modal_servicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="llamar_paciente_modal_servicio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-xl">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asignar Paciente Cama <span id="cama_servicio_numero"></span> <span id="cama_servicio_titulo"></span> Sala <span id="sala_servicio_numero"></span></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div id="reserva_agregar_paciente_hora" style="">

                    <div class="row d-none">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="paciente_dependiente" name="paciente_dependiente" onchange="activar_paciente_dependientes();">
                                    <label class="custom-control-label" for="paciente_dependiente">Paciente Dependiente</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-row seccion_reserva_paciente_nuevo">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombres</label>
                                <input type="text" required="" class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">F. Nacimiento</label>
                                <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac" onchange="evaluar_edad();">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Sexo</label>
                                <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                    <option value="0">Selecione una opción</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Previsión</label>
                                <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                    <option value="0">Selecione una opción</option>
                                    <option value="1">Fonasa</option>
                                    <option value="2">Banmédica</option>
                                    <option value="3">Isalud</option>
                                    <option value="4">Colmena Golden Cross</option>
                                    <option value="5">Consalud</option>
                                    <option value="6">Cruz Blanca</option>
                                    <option value="7">Cruz del Norte</option>
                                    <option value="8">Nueva Masvida</option>
                                    <option value="9">Fundación</option>
                                    <option value="10">Vida Tres</option>
                                    <option value="11">Codelco</option>
                                    <option value="12">Control sin costo</option>
                                    <option value="13">Sin Convenio</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección</label>
                                <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required="">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Arica y Parinacota </option>
                                    <option value="2">Tarapacá </option>
                                    <option value="3">Antofagasta </option>
                                    <option value="4">Atacama </option>
                                    <option value="5">Coquimbo </option>
                                    <option value="6">Valparaiso </option>
                                    <option value="7">Metropolitana de Santiago </option>
                                    <option value="8">Libertador General Bernardo OHiggins </option>
                                    <option value="9">Maule </option>
                                    <option value="10">Ñuble </option>
                                    <option value="11">Biobío </option>
                                    <option value="12">La Araucanía </option>
                                    <option value="13">Los Ríos </option>
                                    <option value="14">Los Lagos </option>
                                    <option value="15">Aisén del General Carlos Ibáñez del Campo </option>
                                    <option value="16">Magallanes y de la Antártica Chilena </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required="">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda();" name="reserva_hora_correo" id="reserva_hora_correo">
                                <span id="mensaje_email_reserva" style="display:none"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno" onchange="validar_campo_telefono();">
                            </div>
                            <button class="btn btn-sm btn-info btn-block" type="button" id="btn_reserva_hora_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono();">
                                <i class="feather icon-check"></i> Validar
                            </button>
                            <div class="form-group" style="display:none" name="div_codigo_validador" id="div_codigo_validador">
                                <label class="floating-label-activo-sm">Codigo Validador</label>
                                <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno_codigo_validador" id="reserva_hora_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono();">
                            </div>
                            <input type="hidden" name="result_codigo_validacion" id="result_codigo_validacion" value="0">
                            <div id="div_codigo_validador_mensaje" style="display:none"></div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Diagnóstico</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion_" id="reserva_hora_descripcion_">
                            </div>
                        </div>

                    </div>


                    <div class="form-row seccion_reserva_paciente_nuevo_representante" style="display: none;">
                        <div class="col-sm-12 col-md-12 mb-3">
                            <h6 class="f-14 text-c-blue">Información del Representante Legal o encargado de la
                                reserva:</h6>
                        </div>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">RUT</label>
                                <input type="text" required="" class="form-control form-control-sm" name="reserva_hora_representante_rut" id="reserva_hora_representante_rut" oninput="formatoRut(this);">
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="buscar_rut_representente();"><i class="feather icon-search"></i>
                                Buscar</button>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-5 col-xl-5">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"><span class="text-danger">*</span>Relación</label>
                                <select class="form-control form-control-sm" name="reserva_hora_representante_agregar_relacion" id="reserva_hora_representante_agregar_relacion">
                                    <option value="">Seleccione</option>
                                    <option data-tipo="1" value="Hijo(a)" selected="">Hijo(a)</option>
                                    <option data-tipo="1" value="Sobrino(a)">Sobrino(a)</option>
                                    <option data-tipo="1" value="Nieto(a)">Nieto(a)</option>
                                    <option data-tipo="1" value="Hermano(a)">Hermano(a)</option>
                                    <option data-tipo="1" value="Primo(a)">Primo(a)</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <h6 class="f-14 text-c-blue">Enviar confirmación</h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion" value="">
                                    <label class="custom-control-label" for="reserva_hora_confirmacion">Correo
                                        electrónico</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                    <label class="custom-control-label" for="sms">SMS</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Profesional Asignado</label>
                                <select name="profesional_atiende" id="profesional_atiende" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    @foreach ($servicio->profesionales as $profesional )
                                    <option value="{{ $profesional->id }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sala</label>
                                <select name="sala_atencion_paciente" id="sala_atencion_paciente" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    @for ($i = 1; $i <= $servicio->numero_salas; $i++)
                                    @php
                                        $id_sala_servicio = $servicio->id.'-'.$i;
                                        // Verificamos si la sala correspondiente ya tiene información en $servicio->salas
                                        $salaInfo = $servicio->salas->where('id_sala_servicio', $id_sala_servicio)->first();
                                    @endphp
                                    @if($salaInfo)
                                    <option value="{{ $i }}">Sala {{ $i }}</option>
                                    @endif
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Cama</label>
                                <select name="sala_atencion_paciente" id="sala_atencion_paciente" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="ingresar_paciente_sala();" class="btn btn-info"><i class="feather icon-check"></i>Cobro Ingreso Paciente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ingresar_paciente_sala(){
        // swal({
        //     title:'info',
        //     text:'en construccion',
        //     icon:'info'
        // });
        let nombre_paciente = $('#reserva_hora_nombres_paciente').val();
        let apellido_uno = $('#reserva_hora_apellido_uno').val();
        let apellido_dos = $('#reserva_hora_apellido_dos').val();
        let fecha_nacimiento = $('#reserva_hora_fecha_nac').val();
        let sexo_paciente = $('#reserva_hora_sexo').val();
        let convenio_paciente = $('#reserva_hora_convenio').val();
        let direccion_paciente = $('#reserva_hora_direccion').val();
        let numero_direccion_paciente = $('#reserva_hora_numero_dir').val();
        let region = $('#region_agregar').val();
        let ciudad = $('#ciudad_agregar').val();
        let email = $('#reserva_hora_correo').val();
        let telefono1 = $('#reserva_hora_telefono_uno').val();
        let motivo = $('#reserva_hora_descripcion_').val();
        let profesional_atiende = $('#profesional_atiende').val();

        let valido = 1;
        let mensaje = '';

        if(nombre_paciente == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Nombre paciente</li>';
        }
        if(apellido_uno == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Apellido Uno</li>';
        }
        if(apellido_dos == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Apellido Dos</li>';
        }
        if(fecha_nacimiento == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Fecha de nacimiento</li>';
        }
        if(sexo_paciente == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Sexo Paciente</li>';
        }
        if(convenio_paciente == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Convenio Paciente</li>';
        }
        if(direccion_paciente == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Dirección Paciente</li>';
        }
        if(region == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Región</li>';
        }
        if(ciudad == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Ciudad</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Email</li>';
        }
        if(telefono1 == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Teléfono</li>';
        }
        if(profesional_atiende == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Profesional</li>';
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
            nombre_paciente: nombre_paciente,
            apellido_uno: apellido_uno,
            apellido_dos: apellido_dos,
            fecha_nacimiento: fecha_nacimiento,
            sexo_paciente: sexo_paciente,
            convenio_paciente: convenio_paciente,
            direccion_paciente: direccion_paciente,
            numero_direccion_paciente: numero_direccion_paciente,
            region: region,
            ciudad: ciudad,
            email: email,
            telefono1: telefono1,
            motivo: motivo,
            _token: CSRF_TOKEN
        };

        let url = "{{ ROUTE('adm_hospital.registrar_paciente_servicio') }}";

        $.ajax({
            type:'post',
            data: data,
            url: url,
            success: function(resp){
                console.log(resp);
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function evaluar_edad()
        {
            let fechaNacimiento = new Date($('#reserva_hora_fecha_nac').val());
            let hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

            // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
            if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }

            if( edad < 18 )
            {
                $('.seccion_reserva_paciente_nuevo').removeClass('col-sm-12');
                $('.seccion_reserva_paciente_nuevo_representante').removeClass('col-sm-12');

                $('.seccion_reserva_paciente_nuevo').addClass('col-sm-12');
                $('.seccion_reserva_paciente_nuevo_representante').addClass('col-sm-12');
                $('.seccion_reserva_paciente_nuevo_representante').show();

                $('#agenda_agregar_paciente').children(0).removeClass('modal-md');
                $('#agenda_agregar_paciente').children(0).addClass('modal-xl');

                $('#reserva_hora_correo').attr('onblur', "");
            }
            else
            {
                $('.seccion_reserva_paciente_nuevo').removeClass('col-sm-6');
                $('.seccion_reserva_paciente_nuevo_representante').removeClass('col-sm-6');

                $('.seccion_reserva_paciente_nuevo').addClass('col-sm-12');
                $('.seccion_reserva_paciente_nuevo_representante').addClass('col-sm-12');
                $('.seccion_reserva_paciente_nuevo_representante').hide();

                $('#agenda_agregar_paciente').children(0).removeClass('modal-xl');
                $('#agenda_agregar_paciente').children(0).addClass('modal-md');

                $('#reserva_hora_correo').attr('onblur', "validar_email_agenda();");
            }
        }
</script>

